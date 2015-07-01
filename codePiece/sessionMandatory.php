<?php	/** --- sessionMandatory.php --- **/
	session_start();
	$SessionTime = 120;	#time in seconds (the requirement is 2 minutes)
	
	require_once 'destroySession.php';
	
	/** Check if the user is already loggeIn,
		if the timeout was expired the session is destroyed and the user will be redirect to the login page **/
	if( isset($_SESSION['user']) ) {
		$username = $_SESSION['user'];
	
		if( isset($_SESSION['time']) ) {
			$diff = time() - $_SESSION['time'];	#difference between actual time and last interaction time
			if($diff > $SessionTime) {
				$loggedIn = FALSE;
				destroySession();
				header('HTTP/1.1 307 temporary redirect');	#redirect client to login page
				header('Location:login.php?msg=SessionTimeOutExpired');
				exit;
			}
		}
	
		$_SESSION['time'] = time();
		$loggedIn = TRUE;
	}
	else
		$loggedIn = FALSE;
?>