<?php	/** --- login.php --- **/
	require_once './codePiece/sessionMandatory.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservations Conference Hall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="text/javascript" src="library/checks.js "></script>
        <script type="application/javascript" src="library/graphics.js" ></script>
    </head>
	
	<body onload="javascript: document.forms[0].Username.focus();">
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/sala-congressi-resized.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<?php if( isset($loggedIn) && ($loggedIn) ): ?>
      				<blockquote> <h2>You are already <span class='green'>logged in</span>.</h2></blockquote>
     			<?php else: 
     				if( (isset($_GET["msg"])) && ($_GET["msg"]=="SessionTimeOutExpired") )
     					echo "<p style='color:red;'>Tmeout expired! You have not interacted with our server for too much time!<br>Please, login again! </p>";	?>
     				<h1>Enter <span class='gray'>Your</span> <span class='green'>Data</span></h1>
     				<blockquote>
     				<form id="UserData" method="post" action="./logon.php" >
	        			<label for="Username"> Username: </label>
	        			<input type="text" id="Username" name="username" maxlength="32" placeholder="Insert your username here" style="width: 200px;">
	        			<label for="Password"> Password: </label>
	        			<input type="password" id="Password" name="password" maxlength="36" placeholder="Insert your password here" style="width: 200px;">
	        			<br><br>
	        			<button type="submit" class="button" onclick="return checkLoginValues()"> Log In </button>
     				</form>
     				</blockquote>
				<?php endif ?>
      		</div>
		</div>
  		<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("Login"));
        setSpan(document.getElementById("login"), "Login");
    </script>

	</body>
</html>
