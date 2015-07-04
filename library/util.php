<?php	/** --- util.php --- **/

	function sanitizeString($conn, $var) {
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		#$var = mysql_real_escape_string($var); /* Remove because deprecated*/
		$var = mysqli_real_escape_string($conn, $var);
		return $var;
		
	}
?>

<?php
	function validRegistrationValues() {
		# empty() { return (isset($var) || $var == false) }
		# my previous check --> if ( !isset($_POST['username']) )||( $_POST['username']==="" )
		$toReturn = true;
		if( empty($_POST['username']) ){
			echo "<p>The username is not set!</p>";
			$toReturn = false;
		}
		if( empty($_POST['password']) ){
			echo "<p>The password is not set!</p>";
			$toReturn = false;	
		}
		if( empty($_POST['confirmpwd']) ){
			echo "<p>You don't fill the field of confirmation password!</p>";
			$toReturn = false;
		}
		if($_POST['confirmpwd']!==$_POST['password']) {
			echo "<p> The 2 password must be equal!</p>";
			$toReturn = false;
		}
		return $toReturn;
	}
	
	function validLoginValues() {
		$toReturn = true;
		if( empty($_POST['username']) ){
			echo "<p>The username is not set!</p>";
			$toReturn = false;
		}
		if( empty($_POST['password']) ){
			echo "<p>The password is not set!</p>";
			$toReturn = false;	
		}
		return $toReturn;
	}
	
	function validUserName($conn, $table, $username) {
		$toReturn = false;
		$res = mysqli_query($conn, "SELECT * FROM $table WHERE username='$username'");
		if (!$res)
			echo "<p>Error during username checking!</p>";
		else {
			$row = mysqli_fetch_array($res);
			if(empty($row['username']))
				$toReturn = true;
		}
		mysqli_free_result($res);
		return $toReturn;
	}
	
	function validLogin($conn, $table, $username, $password) {
		$toReturn = true;
		$res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
		if (!$res)
			echo "<p>Error during username checking!</p>";
		else {
			$row = mysqli_fetch_array($res);
			if((empty( $row['username'] ))||(empty( $row['username'] )))
				$toReturn = false;
		}
		mysqli_free_result($res);
		return $toReturn;
	}
	
	/**
	 * This function create a link to database, if it's impossible to create the connection or it's impossible to set the charset utf-8 the method return false.
	 * Otherwise the method return the link to the connection
	 * @param string $server
	 * @param string $user
	 * @param string $pass
	 * @param string $database
	 * @return boolean|object Returns an object that represent a link to the database, false if something wrong happens.
	 */
	function connectToDB($server, $user, $pass, $database){
		$conn = mysqli_connect($server, $user, $pass, $database);
		if($conn == false){
			echo "Connection Error (".mysqli_connect_errno().")".mysqli_connect_error();
			return false;
		}
		if( !mysqli_set_charset($conn, "utf8") ) {
			echo "Error loading set utf8:" . mysqli_error($conn);
			mysqli_close($conn);
			return false;
		}
		
		return $conn;
	}
?>

<?php 
	/** 
	 * This function draw a drop down menù whit all the values between the second and the third parameters (included). 
	 * The first parameters become the id and the name of the element.
	 **/
	function dropDownMenu($id, $i, $N) {
		echo "<select id='$id' name='$id'>";
		echo "<option selected='selected' value='$i' style='float:right;'> $i </option>";
		
		for($i=$i+1; $i<=$N; $i++) {
			echo "<option value='$i'> $i </option>";
		}
		echo "</select>";
	}
?>