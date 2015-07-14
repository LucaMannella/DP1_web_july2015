<?php	/** --- signUp.php --- **/
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
        <script type="text/javascript" src="library/checks.js"></script>
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
    		    <?php if(!$loggedIn) echo "<h1><span class='darkgray'>Enter</span> <span class='gray'>Your</span> Data</h1>"; ?>
      			<blockquote>
      			<?php if($loggedIn): ?>
      				<h2>You are already <span class='darkgray'>logged in</span>.</h2>
      				<p>If you want to create a <span class='darkgray'>new account</span>, you must do the <a href='./logout.php'><span class='darkgray'>log out</span></a>.</p>
     			<?php else: ?>
      				<form id="UserData" method="post" action="registration.php" >
	        			<label for="Username"> Username: </label>
	        			<input type="text" id="Username" name="username" maxlength="36" placeholder="Chose a (unique) username" style="width: 200px;">
	        			<label for="Password"> Password: </label>
	        			<input type="password" id="Password" name="password" maxlength="36" placeholder="Choose a password" style="width: 200px;">
	        			<label for="ConfirmPassword"> Confirm Password: </label>
	        			<input type="password" id="ConfirmPassword" name="confirmpwd" maxlength="36" placeholder="Re-enter the same password" onkeyup="checkPassword();" style="width: 200px;">
	        			<img id="imgpwd" class="no-border" src="" style="height: 25px; width: 25px; position: relative; margin-left: 10px; margin-top: -5px; visibility: hidden;">
	        			<br><br>
	        			<button type="submit" class="button" onclick="return checkRegistrationValues()"> Sign Up </button>
	        			<button type="button" class="button" onclick="resetForm()"> Reset </button>
     				</form>
     			<?php endif ?>
     			</blockquote>
      		</div>
		</div>
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("SignUp"));
        setSpan(document.getElementById("signup"), "Sign Up");
        document.forms[0].Username.focus();

        function resetForm(){
            document.getElementById("imgpwd").style.visibility = "hidden";
            document.getElementById('UserData').reset();
            document.forms[0].Username.focus();
        }
    </script>

	</body>
</html>
