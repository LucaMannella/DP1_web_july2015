<?php	/** --- signUp.php --- **/
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
		<script type="text/javascript" src="./library/functions.js"></script>
	</head>
	
	<body onload="document.forms[0].Username.focus();">
	<div id="wrap">
  		<div id="header">
    		<h1 id="logo">Sporting<span class="gray">Club</span><span class="green">Pinamare</span></h1>
    		<h2 id="slogan">Sport &amp; Fun for whole the family!</h2>
    		<ul id="MenuAlto">
      			<li><a href="./index.php"><span>Home</span></a></li>
      			<li><a href="./activities.php"><span>Activities</span></a></li>
      			<?php if($loggedIn) {
      				echo "<li><a href='./reservations.php'><span>Reservations</span></a></li>";
      				echo "<li><a href='./logout.php'><span>Logout</span></a></li>";
      			}
      			else {
      				echo "<li id='current'><a href='./signUp.php'><span>Sign Up</span></a></li>";
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
	      			<li><a href="./activities.php"> Activities </a></li>
	      			<?php if($loggedIn) {
	      				echo "<li><a href='./reservations.php'> Reservations </a></li>";
	      				echo "<li><a href='./logout.php'> Logout </a></li>";
	      			}
      				else {
      					echo "<li><a href='./signUp.php'><span> Sign Up </span></a></li>";
      					echo "<li><a href='./login.php'> Login </a></li>"; 
      				}?>
	      			<li><a href="./about.php"> About </a></li>
	    		</ul>
    		</div>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
    		    <?php if(!$loggedIn) echo "<h1>Enter <span class='gray'>Your</span> <span class='green'>Data</span></h1>"; ?>
      			<blockquote>
      			<?php if($loggedIn): ?>
      				<h2>You are already <span class='green'>logged in</span>.</h2>
      				<p>If you want to create a <span class='green'>new account</span>, you must do the <a href='./logout.php'><span class='green'>log out</span></a>.</p>
     			<?php else: ?>
      				<form id="UserData" method="post" action="./registration.php" >
	        			<label for="Username"> Username: </label>
	        			<input type="text" id="Username" name="username" maxlength="32" placeholder="Chose a (unique) username" style="width: 200px;">
	        			<label for="Password"> Password: </label>
	        			<input type="password" id="Password" name="password" maxlength="36" placeholder="Choose a password" style="width: 200px;">
	        			<label for="ConfirmPassword"> Confirm Password: </label>
	        			<input type="password" id="ConfirmPassword" name="confirmpwd" maxlength="36" placeholder="Re-enter the same password" onkeyup="checkPassword();" style="width: 200px;">
	        			<img id="imgpwd" class="no-border" src="" style="height: 25px; width: 25px; position: relative; margin-left: 10px; margin-top: -5px; visibility: hidden;">
	        			<br><br>
	        			<button type="submit" class="button" onclick="return checkRegistrationValues()"> Sign Up </button>
	        			<button type="button" class="button" onclick="javascript: document.getElementById('UserData').reset(); document.forms[0].Username.focus();"> Reset </button>
     				</form>
     			<?php endif ?>
     			</blockquote>
      		</div>
		</div>
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>
	</body>
</html>
