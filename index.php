<?php /** --- index.php --- **/ 
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reservations Conference Hall</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="application/javascript" src="library/graphics.js" ></script>

	</head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>

  		<div id="content-wrap">
            <img src="images/sala-congressi-resized.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<h1>Welcome!</h1>
      			<p><strong>Welcome</strong> to our website!<br>
      				<a href="./conferences.php">Here</a> you can see the list of today scheduled conferences. For privacy reason you can not see the username of the person who makes the reservation if you are not a registered user.<BR>
                    After a <a href="./signUp.php"><strong>free</strong> registration</a> you can reserve our conference room (or a part of that). </p>
      			<p>Each registered user can reserve a place for a conference more times in the same day but unfortunately you can not make more then one registration if the two reservations are overlapped.<BR></p>
      			<p>Our staff is available for any questions!</p>
				<p>&nbsp;</p>
				<h3>Our Olympic swimming pool</h3>
				<img src="images/pool.jpg" width="700" height="390" alt="Olympic Pool" class="border: 1px solid" style="margin:0 0 0 0;" /><p>&nbsp;</p>
				<div class="float-left">
      				<h2 class="aligh-left">Our football pitch</h2>
      				<img class="float-left" src="images/football.jpg" width="300" height="200" alt="football pitch" class="border: 1px solid" style="margin:0 0 0 0;" /><p>&nbsp;</p>
      			</div>
      			<div class="float-right">
					<h2 class="aligh-right">Our Tennis courts</h2>
      				<img class="float-right" src="images/tennis.jpg" width="300" height="200" alt="Tennis courts" class="border: 1px solid" style="margin:0 8px 0 0;" /><p>&nbsp;</p>
      			</div>	
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("Home"));
        setSpan(document.getElementById("home"), "Home");
    </script>
	</body>
</html>
