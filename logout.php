<?php	/** --- logout.php --- **/
	require_once './codePiece/sessionMandatory.php';
	require_once './codePiece/intro.php';
	
	if (!$loggedIn) {
		$result = "<h2>You are not logged in!</h2>";
		if( isset($TimeoutExpired)&&($TimeoutExpired) )
			$result = $result."<p style='color:red;'>Tmeout expired! You have not interacted with our server for too much time!</p>";
	}
	else {
		destroySession();
		$result = "<h2>You have been succesfully <span class='green'>logged out</span>.</h2>"
				."<p>Did you make a mistake? Click <a href='./login.php'><span class='green'>here</span></a> to login again!</p>";		
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sporting Club Pinamare</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="images/styles.css" type="text/css" />
		<script type="text/javascript" src="./library/functions.js"></script>
	</head>
	
	<body onload="javascript: document.forms[0].Username.focus();">
	<div id="wrap">
  		<div id="header">
    		<h1 id="logo">Sporting<span class="gray">Club</span><span class="green">Pinamare</span></h1>
    		<h2 id="slogan">Sport &amp; Fun for whole the family!</h2>
    		<ul id="MenuAlto">
      			<li><a href="./index.php"><span>Home</span></a></li>
      			<li><a href="./activities.php"><span>Activities</span></a></li>
      			<li><a href="./signUp.php"><span>Sign Up</span></a></li>
      			<li><a href="./login.php"><span>Login</span></a></li>
      			<li><a href="./about.php"><span>About</span></a></li>
    		</ul>
  		</div>
  		
  		<div id="content-wrap">
  			<img src="images/act.jpg" width="950" height="215" alt="headerphoto" class="no-border" style="border-color: #9EC630;" />
    		<div id="sidebar">
      			<?php if($loggedIn)
    		    	echo "<blockquote style='padding: 0 0 0 1px;'><h7>Goodbye:</h7>",
    		    		"<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
    			?>
    			<h2> Options </h2>	
      			<ul class="sidemenu">
	      			<li><a href="./index.php"> Home </a></li>
	      			<li><a href="./activities.php"> Activities </a></li>
	      			<li><a href="./signUp.php"> Sign Up </a></li>
	      			<li><a href="./login.php"> Login </a></li>
	      			<li><a href="./about.php"> About </a></li>
	    		</ul>
    		</div>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<blockquote> <?php echo $result; ?>	</blockquote>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>
	</body>
</html>
