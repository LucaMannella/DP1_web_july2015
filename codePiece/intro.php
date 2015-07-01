<?php	/** --- intro.php --- **/

	#Call this file after have calling one from session.php or sessionMandatory.php

 	/** Force the connection on HTTPS **/
 	if($_SERVER["HTTPS"] != "on") {
 		header("HTTP/1.1 301 Moved Permanently");
 		header( "Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] );
 		die();
 	}
	
	/** cookie **/
	if ( !isset($_SERVER["HTTP_COOKIE"]) )
	{	# If i have a cookie it's impossible to enter in this "if" 
		if( isset($_GET["ExistCookie"]) )	# If i have this GET and i don't have the cookie, the cookies are disabled! 
			die("<p style='color:red'> Your cookies <strong>are disabled</strong>!<br>
				<strong>Without cookies you can't navigate on this website!</strong>.<br>
				<a href='http://www.whatarecookies.com/enable.asp'>Here</a> are the instructions how to enable cookies in all most famous web browser.</p>
				<p>After enabling cookies, please reload the page!</p>");
		else {	# This statement should be executed only the first time that the user visit the page and after the logout
			header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."?ExistCookie=TestValue");
			die();
		}
	}
	
	$db_host = "localhost";
	$db_user = "s222325";
	$db_pass = "argoomog";
	$db_name = "s222325";
?>