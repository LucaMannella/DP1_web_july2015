<?php	/** --- session.php --- **/
	session_start();
	$SessionTime = 120;	#time in seconds (the requirement is 2 minutes)
	
	require_once 'destroySession.php';
	
	/** Check if the user is already loggedIn,
		if the timeout was expired the session is destroyed **/
	if( isset($_SESSION['user']) ) {
		$username = $_SESSION['user'];
		$loggedIn = TRUE;
	
		if( isset($_SESSION['time']) ) {
			$diff = time() - $_SESSION['time'];	#difference between actual time and last interaction time
			if($diff > $SessionTime) {
				$loggedIn = FALSE;
				destroySession();
				$TimeoutExpired = TRUE;
			}
			else
				$_SESSION['time'] = time();
		}
		else
			$_SESSION['time'] = time();
	}
	else
		$loggedIn = FALSE;
?>