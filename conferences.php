<?php	/** --- conferences.php --- **/
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
        <script type="application/javascript" src="library/graphics.js"> </script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/sala-congressi-resized.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<h1>Today <span class="darkgray">Conferences</span></h1><BR>
      			<?php
                /** @var mysqli $conn **/
                $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
	      			if($conn != false) {
		      			$res = mysqli_query($conn, "SELECT name, participants, start_time, end_time FROM booking ORDER BY participants DESC, name ASC");
		      			if (!$res)
		      				echo "<p class='red'> Error in query execution! </p>";

                        else {
                            $row = mysqli_fetch_array($res);
                            if($row == NULL)
                                echo "<BLOCKQUOTE><p><span class='darkgray'>There are no reservations right now.</span></h3></p></BLOCKQUOTE>";
                            while ($row != NULL) {
                                echo "<h2><span class='darkgray'>Conference: </span>".$row['name']."</h2>",
                                    "<p>The conference starts at <span class='cyan'>".substr($row['start_time'], 0, -3)."</span> and end at <span class='cyan'>".substr($row['end_time'], 0, -3)."</span><br>",
                                    "Number of participants to the conference: <span class='cyan'>".$row['participants']."</span> </p><br>";
                                $row = mysqli_fetch_array($res);
                            }
                            mysqli_free_result($res);
                        }
		      			mysqli_close($conn);
	      			}
      			?>
       		</div>
		</div>
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("Conferences"));
        setSpan(document.getElementById("conferences"), "Conferences");
    </script>
	</body>
</html>
