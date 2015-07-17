<?php /** --- about.php --- **/
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservations Conference Hall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="application/javascript" src="library/graphics.js" ></script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/2g.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
				<?php require_once './codePiece/noscript.php';	?>
      			<h1><span class="gray">Some</span> <span class="darkgray">Additional</span> Informations</h1>
                <p> Hotel I Due Gabbiani is located in <strong>Andora</strong>, overlooking one of the most beautiful coasts of Liguria and Italy, the Riviera di Ponente. </p>
                <p> The Hotel is ideal for a holiday by the sea close to the beach, very close to the beach, offers a beach resort with every comfort.
                    You will have the opportunity to book at discounted rates directly to the 0182/684852. E 'recommended hotel guests to book well in advance the place on the beach for the months of July and August so to be assured of a place reserved. </p>
                <p> Strategically located, is well connected with the center of Andora and is a great starting point for discovering the charm of the Riviera. </p>
                <p> The Hotel I Due Gabbiani offers all the comforts for a pleasant stay: American bar, restaurant, cozy lounge, TV room, game room, elevator, car park. </p>
                <p> The restaurant service offers a choice of three starters, three main courses, vegetables cooked and fresh, desserts and fruit. Buffet breakfast, welcome cocktail and gala dinner. </p>
                <p> Helpful and professional, the hotel staff will respond promptly to guests' needs, so that every holiday is a unique experience. </p>

                <p><strong>Andora is located in the western part of the Riviera, between the bays of Capo Mele (to the east) and Cape Mimosa (to the west),</strong>
                    at the mouth of the river that runs through it: Merula. Its extensive beaches are considered among the most beautiful in the Ligurian Riviera and stretching for almost 2 km in length.</p>
                <p>Continuously since 1986, the resort boasts a Blue Flag for the excellent quality of marine waters.
                    It is 55 km from the provincial capital Savona, 15 km from Imperia, 40 km from Sanremo and 100 km from Genoa and Monaco.</p>
                <p> A 5 min away we find two little towns certified for years as <strong>"The Most Beautiful Villages of Italy"</strong>: Laigueglia and Cervo.<br>
                    These old Towns are practicable only on foot and have been preserved with their buildings, centuries old, and their cobbled streets where you will find shops of artisans and artists.</p>
                <br>
                <h2>Seascape of Andora</h2>
                <img src="images/andora.jpg" width="700" height="230" alt="Andora's seascape." class="no-border" style="margin:0 0 30px 0;" />
                <br>
                <p> <span style="color:red">Disclaimer</span>:<br> All material relating to the hotels is owned by the Hotel<strong> I 2 Gabbiani&copy;</strong> (Andora) and <strong>Artemide Centro Congressi&copy;</strong> (Castel San Pietro). I do not hold any rights on them.<br>
                    I chose to represent these hotels in my website for creating a more concrete work and to pay homage to a place where I grew up (the first one) and a place that I was very impressed.</p>
                <br>
				<div class="maps">
					<h2>Where to find us</h2>
					<p>Hotel I 2 Gabbiani <br> Via Mezz'acqua 2 - Andora (SV) - Italy</p>
                    <iframe height="350" width="500" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2872.216116052667!2d8.150782699999999!3d43.9548943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d242b486e1c053%3A0x37370071d3296c7d!2sHotel+I+Due+Gabbiani!5e0!3m2!1sit!2sit!4v1436134947670" frameborder="0" style="border: 0; margin: 0 0 30px 0;" allowfullscreen></iframe>
				</div>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>
    <script type="text/javascript">
        setCurrent(document.getElementById("About"));
        setSpan(document.getElementById("about"), "About");
    </script>
	</body>
</html>
