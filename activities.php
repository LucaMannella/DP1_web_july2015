<?php	/** --- activities.php --- **/
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sporting Club Pinamare</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="images/styles.css" type="text/css" />
	</head>
	
	<body>
	<div id="wrap">
  		<div id="header">
    		<h1 id="logo">Sporting<span class="gray">Club</span><span class="green">Pinamare</span></h1>
    		<h2 id="slogan">Sport &amp; Fun for whole the family!</h2>
    		<ul id="MenuAlto">
      			<li><a href="./index.php"><span>Home</span></a></li>
      			<li id="current"><a href="./activities.php"><span>Activities</span></a></li>
      			<?php if($loggedIn) {
      				echo "<li><a href='./reservations.php'><span>Reservations</span></a></li>";
      				echo "<li><a href='./logout.php'><span>Logout</span></a></li>";
      			}
      			else {
      				echo "<li><a href='./signUp.php'><span>Sign Up</span></a></li>";
      				echo "<li><a href='./login.php'><span>Login</span></a></li>";
      			}?>
      			<li><a href="./about.php"><span>About</span></a></li>
    		</ul>
  		</div>
  		
  		<div id="content-wrap">
  			<img src="images/act.jpg" width="950" height="215" alt="headerphoto" class="no-border" style="border-color: #9EC630;" />
    		<div id="sidebar">
    		    <?php if($loggedIn)
    		    	echo "<blockquote style='padding: 0 0 0 1px;'><h7>Welcome:</h7>",
    		    		"<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
    			?>
      			<h2> Options </h2>
      			<ul class="sidemenu">
	      			<li><a href="./index.php"> Home </a></li>
	      			<li><a href="./activities.php"><span> Activities </span></a></li>
	      			<?php if($loggedIn) {
	      				echo "<li><a href='./reservations.php'>Reservations</a></li>";
	      				echo "<li><a href='./logout.php'>Logout</a></li>";
	      			}
      				else {
      					echo "<li><a href='./signUp.php'> Sign Up </a></li>";
      					echo "<li><a href='./login.php'>Login</a></li>"; 
      				}?>
	      			<li><a href="./about.php"> About </a></li>
	    		</ul>
    		</div>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<h1>Reserve <span class="gray">an</span> <span class="green">Activity</span></h1><BR>
      			<?php 
	      			$conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
	      			if($conn !== false) {
		      			$res = mysqli_query($conn, "SELECT name, places, availability FROM activities ORDER BY availability DESC, places ASC");
		      			if (!$res)
		      				die("Error in query execution!");
	      			
		      			$row = mysqli_fetch_array($res);
		      			while($row != NULL) {
		      				$places = $row['places'];
		      				$reserv = $places - $row['availability'];
		      				
		      				echo "<h7>".$row['name']."</h7>";
		      				if($places === $reserv)
		      					echo "<p>Number of reserved place: <span class='gray'>$reserv</span> <br>";
		      				else
		      					echo "<p>Number of reserved place: <span class='green'>$reserv</span> <br>";
		      				
		      				echo "Total places for the activity: <span class='cyan'>$places</span> </p><br>";
		      				$row = mysqli_fetch_array($res);
		      			}
		      			mysqli_free_result($res);
		      			mysqli_close($conn);
	      			}
      			?>
       		</div>
		</div>
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>
	</body>
</html>
