<?php	/** --- conferences.php --- **/
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservations Conference Hall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="application/javascript" src="library/graphics.js"> </script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/sala-congressi-resized.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<h1>Reserve <span class="gray">a</span> <span class="green">Conference</span></h1><BR>
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

    <script type="text/javascript">
        setCurrent(document.getElementById("Conferences"));
        setSpan(document.getElementById("conferences"), "Conferences");
    </script>
	</body>
</html>
