<?php	/** --- destroySession.php --- **/

	function destroySession() {
		$_SESSION=array();
	
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
	
		session_unset(); 	// empty session
		session_destroy();	// destroy session
	}
	
?>