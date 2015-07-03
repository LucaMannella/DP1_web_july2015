<?php	/** --- personalPage.php --- **/
	require_once './codePiece/sessionMandatory.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sporting Club Pinamare</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="images/styles.css" type="text/css" />
		<script type="text/javascript" src="./library/functions.js"></script>
	</head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
        </div>
  		
  		<div id="content-wrap">
            <img src="images/sala-congressi-resized.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    		<?php require_once './codePiece/noscript.php';	?>
    		<?php if($loggedIn):

    			if(count($_POST)!==0) {
	/*******************************/
	/******* ADD RESERVATION *******/
	/*******************************/
    				if( (isset($_POST['id'])) && (isset($_POST['menu'])) ){
	    				$actID = (int)$_POST['id'];
	    				$childs = (int)$_POST['menu'];
	    				if(($childs < 0) ||($childs > 3))	{	/* Checking the constrait on the child's number */
	    					echo "<p style='color:red'> Constrait broken! You can not reserve more then 3 places for your childs! </p></div></div>";
	    					include_once './codePiece/footer.php';
	    					echo "</div></BODY></HTML>";
	    					die();
	    				}
	    				
	    				$conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
	    				if($conn!==false) {
	    					$actID = (int) sanitizeString($conn, $actID);
	    					$childs = (int) sanitizeString($conn, $childs);
	    					try {
	    						if(!mysqli_autocommit($conn, FALSE))
	    							throw new Exception("Impossible to set autocommit to FALSE");

	    						//in other case it's also possible to use the LOCK but we don't have administrator's privilege
	    						$res = mysqli_query($conn, "SELECT availability FROM activities WHERE id=$actID FOR UPDATE");
	    						if(!$res)	/* FOR UPDATE - lock the table for preventing a concurrency access */
	    							throw new Exception("Query 1 (check availability) failed!");
	    						$row = mysqli_fetch_array($res);
	    						$availability = $row['availability'];
	    						mysqli_free_result($res);
	    						if($childs+1 > $availability)	/* Checking the availability */
	    							throw new Exception("<p style='color:red'>Reservation avoided! There are not enough places for your reservation!</p>");
	    						
	    						$res = mysqli_query($conn, "SELECT * FROM reservations WHERE activity=$actID AND username='$username'");
	    						$row = mysqli_fetch_array($res);
	    						if($row!=NULL)	/* No more then 1 reservation for each activity for every user */
	    							throw new Exception("<p style='color:red'>Invalid condition! You can't have 2 reservations in the same activity!</p>");
	    						mysqli_free_result($res);
	    						
	    						$res = mysqli_query($conn, "INSERT INTO reservations(activity, username, childs) VALUES ($actID, '$username', $childs);");
	    						if(!$res)
	    							throw new Exception("Query 3 (insert reservation) failed!");
	    						
	    						$res = mysqli_query($conn, "UPDATE activities SET availability=availability-($childs+1) WHERE id=$actID;");
	    						if(!$res)
	    							throw new Exception("Query 4 (update activity) failed!");
	    						
	    						if(!mysqli_commit($conn))
	    							throw new Exception("<p style='color:red'>Impossible to commit the operation!</p>");
	    						
	    						if(!mysqli_autocommit($conn, TRUE))
	    							throw new Exception("Impossible to set autocommit to TRUE");
	    					}
	    					catch (Exception $e) {
	    						mysqli_rollback($conn);
	    						mysqli_autocommit($conn, TRUE);
	    						echo "Rollback ".$e->getMessage();
	    					}
	    					mysqli_close($conn);
	    				}
    				}
    				
    /**********************************/
    /******* REMOVE RESERVATION *******/
    /**********************************/
    				elseif(isset($_POST['code'])) {
						$code = $_POST['code'];
						
						$conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
						if($conn !== false) {
							$code = sanitizeString($conn, $code);
							try {
								if(!mysqli_autocommit($conn, FALSE))
									throw new Exception("Impossible to set autocommit to FALSE");
								
								$res = mysqli_query($conn, "SELECT * FROM reservations WHERE code=$code");
								if(!$res)	/** Fetch data from the database **/ 
									throw new Exception("Query 1 (fetch reservation's info) failed!");
								$row = mysqli_fetch_array($res);
								$childs = $row['childs'];	$actID = $row['activity'];
								mysqli_free_result($res);
								
								$res = mysqli_query($conn, "DELETE FROM reservations WHERE code=$code");
								if(!$res)	/** Remove reservation from the database **/
									throw new Exception("Query 2 (delete reservation) failed!");
								
								$res = mysqli_query($conn, "UPDATE activities SET availability=availability+($childs+1) WHERE id=$actID	");
								if(!$res)	/** Restore the right availability **/
									throw new Exception("Query 3 (update activity) failed!");
								
								if(!mysqli_commit($conn))
									throw new Exception("<p style='color:red'>Impossible to commit the operation!</p>");
									
								if(!mysqli_autocommit($conn, TRUE))
									throw new Exception("Impossible to set autocommit to TRUE");
							}
							catch (Exception $e) {
								mysqli_rollback($conn);
								mysqli_autocommit($conn, TRUE);
								echo "Rollback ".$e->getMessage();
							}
							mysqli_close($conn);
						}
    				}
	    		}
    			?>

      			<h1>Reservations</h1>
      			<?php	
    /************************************/
    /******* DISPLAY RESERVATIONS *******/
	/************************************/
      				$conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
      				if($conn!==false) {	// fetch the reservations
      					$res = mysqli_query($conn, "SELECT * FROM reservations r, activities a WHERE a.id=r.activity AND username='$username' ORDER BY 'a.name'");
      					if (!$res):
      						echo "<p>Error during the download of the reservations!</p>";
      					else:
      						$row = mysqli_fetch_array($res);
      						if($row==NULL)
      							echo "<BLOCKQUOTE><P><span class='green'>At the moment, you do not have reservations.</span></P></BLOCKQUOTE>";
      						else {
      							$i = 0;
      							while($row!=NULL) {
      								$actID = $row['id'];	$code = $row['code'];	$childs = $row['childs'];
      								echo "<form id='reservation$i' action='./personalPage.php' method='post'>";
      									echo "<TABLE><TR><TH><h7>".$row['name']."</h7></TH><TH><input name='code' value='$code' type='text' readonly style='display:none'/></TH>";
      									if($childs>0)
      										echo "<TR><TD style='text-align: center'> You reserved a place for you and <span class='green'>$childs</span> place(s) for your childs. </TD>";
      									else
      										echo "<TR><TD> You reserved a place for this activity. </TD>";
      									
	      								echo "<TD style='padding-left: 25px;'>";
	      								echo "<input class='button' id='remove$i' type='submit' value='Remove Reservation' style='margin-left: 20px;'/>";	
	      							echo "</TD></TR></TABLE></form>";
	      							$row = mysqli_fetch_array($res);
	      							$i++;
      							}
      						}
      						mysqli_free_result($res);
      					endif;
      			?>

     			<h1>Reservable Activities</h1>
     			<?php
     /*********************************************/
     /******* DISPLAY RESERVABLE ACTIVITIES *******/
     /*********************************************/
     				$query2 = "SELECT activity FROM reservations WHERE username='$username'";
      				$res = mysqli_query($conn, "SELECT id, name, places, availability FROM activities WHERE id NOT IN (".$query2.") AND availability > 0 ORDER BY availability DESC, places ASC");
     				//$res = mysqli_query($conn, "SELECT * FROM reservations r, activities a WHERE a.id=r.activity");
      				if (!$res):
      					echo "<p>Error during the download of the reservations!</p>";
      				else:
      					$row = mysqli_fetch_array($res);
      					if($row==NULL)
      						echo "<BLOCKQUOTE><P><span class='green'>There are no more available activities.</span></h3></P></BLOCKQUOTE>";
      					else {
      						$i = 0;
      						while($row!=NULL) {
      							$actID = $row['id'];
      							echo "<form id='activity$i' action='./personalPage.php' method='post'>";
      								echo "<TABLE><TR><TH><h7>".$row['name']."</h7></TH><TH><input name='id' value='$actID' type='text' readonly style='display:none'/></TH>";
      								echo "<TR><TD> Number of available place: <span id='av$i' class='green'>".$row['availability']."</span> <br>";
      								echo "Total places for the activity: <span id='place$i' class='cyan'>".$row['places']."</span> </TD>";
      								echo "<TD style='padding-left: 25px;'>";	dropDownMenu(('menu'), 0, 3);
      								echo "<input class='button' id='reserve$i' type='submit' value='Reserve' style='margin-left: 20px;' onclick='return checkAvailability($i);'/></TD></TR>";	
      							echo "</TABLE></form>";
      							$row = mysqli_fetch_array($res);
      							$i++;
      						}
      					}
      					mysqli_free_result($res);
      				endif;
      			}
      			?>
      			
      		<?php else: ?>
      			<h3>You can't see this page if you are not a registred user!</h3>
      			<h4>Go <strong><a href='signUp.php'>here</a></strong> for create a new account!</h4>
      			<h4>If you are already registred, please <strong><a href='login.php'>log in</a></strong>!</h4>
      		<?php endif; ?>
      		</div>
		</div>
  		
	  	<?php include_once './codePiece/footer.php';	?>
	</div>
	</body>
</html>