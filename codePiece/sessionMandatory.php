<?php	/** --- sessionMandatory.php --- **/
	session_start();
	$SessionTime = 120;	#time in seconds (the requirement is 2 minutes)
	
	require_once 'destroySession.php';
	
	/** Check if the user is already loggedIn,
		if the timeout was expired the session is destroyed and the user will be redirect to the login page **/
	if( isset($_SESSION['user222325']) ) {
		$username = $_SESSION['user222325'];
	
		if( isset($_SESSION['time222325']) ) {
			$diff = time() - $_SESSION['time222325'];	#difference between actual time and last interaction time
			if($diff > $SessionTime) {
				$loggedIn = FALSE;
				destroySession();
				header('HTTP/1.1 307 temporary redirect');	#redirect client to login page
				header('Location:login.php?msg=SessionTimeOutExpired');
				exit;
			}
		}
	
		$_SESSION['time222325'] = time();
		$loggedIn = TRUE;
	}
	else
		$loggedIn = FALSE;
?>