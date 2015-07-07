<?php	/** --- registration.php --- **/
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
    			<?php 
    				if(count($_POST)===0) {
    					if( isset($loggedIn) && ($loggedIn) ) {
    						echo "<h2>You are already <span class='green'>logged in</span>.</h2>",
	    						"<p>If you want to create a <span class='green'>new account</span>, you must do the <a href='./logout.php'>log out</a>.</p>";
    					}
    					else
    						echo "<h3>Please before visit this page go <a href='signUp.php'>here</a> and enter your data!</h3>";
    				}
    				elseif( !validRegistrationValues() )
    					echo "<h3>You insert some invalid data! Please go <a href='signUp.php'>here</a> and try again!</h3>";
    				else{
                        /** @var mysqli $conn */
                        $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
    					if($conn !== false) {
	   						$user = sanitizeString($conn, $_POST['username']);
							$pass = md5( sanitizeString($conn, $_POST['password']) );		/* md5 create the hash of the password */
							$confpass = md5( sanitizeString($conn, $_POST['confirmpwd']) );
							
    						if( validUserName($conn, "users", $_POST['username']) ) {
								try {	//in other case it's also possible to use the LOCK but we don't have administrator's privilege
									if(!mysqli_autocommit($conn, FALSE))
										throw new Exception("Impossible to set autocommit to FALSE");
								
									$res = mysqli_query($conn, "SELECT * FROM users LOCK IN SHARE MODE");
									if(!$res)	/* LOCK in SHARE MODE - lock all the table in write mode for preventing a concurrency access */
										throw new Exception("Query 1 (lock table) failed!");
									mysqli_free_result($res);
									
									$res = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
									if (!$res)
										throw new Exception("<p style='color:red'>Insertion avoided! It's impossible to registrate your account!</p>");
										
									if(!mysqli_commit($conn))
										throw new Exception("<p style='color:red'>Impossible to commit the operation!</p>");
									
									echo "<h1>User <strong><span class='darkgray'>$user</span></strong> successfully registered!</h1>";
									echo "<h3>Click <a href='./login.php'>here</a> to login!</h3>";
										
									if(!mysqli_autocommit($conn, TRUE))
										throw new Exception("Impossible to set autocommit to TRUE");
								}
								catch (Exception $e) {
									mysqli_rollback($conn);
									mysqli_autocommit($conn, TRUE);
									echo "Rollback ".$e->getMessage();
								}
    						}
    						else {
    							echo "<h3>The chosen username is already in use.<br>Please go <a href='signUp.php'>back</a> and try another one!</h3>";
    						}
    						mysqli_close($conn);
    					}	
    				}
    			?>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("SignUp"));
        setSpan(document.getElementById("signup"), "SignUp");
    </script>

	</body>
</html>
