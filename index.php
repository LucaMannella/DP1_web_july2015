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
      			<h1>Welcome!<span class="green"></span></h1>
      			<p><strong>Welcome</strong> to our website!<br>
      				<a href="./conferences.php">Here</a> you can see the list of our activities and after a <a href="./signUp.php"><strong>free</strong> registration</a> you can reserve a place for you and your children.</p>
      			<p>Unfortunately your children can't partecipate to our activity without the supervision of an adult, so you have to book also a place for you.<BR>
      				Each registered user can accompany a maximum of 3 children!</p>
      			<p>Have fun with our wonderful activities!</p>
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
