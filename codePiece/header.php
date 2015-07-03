<?php /** Created by Luca on Date: 03/07/2015 at Time: 19:50 **/ ?>

<div id='header'>
    <h1 id='logo'>Reservations<span class='gray'>Conference</span>Hall</h1>
        <h2 id='slogan'>Comfort &amp; Professionality at your service!</h2>
        <ul id='MenuAlto'>
            <li id='current'><a href='./index.php'><span>Home</span></a></li>
            <li><a href='./activities.php'><span>Activities</span></a></li>
            <?php
            if(isset($loggedIn) && ($loggedIn)) {
                echo "<li><a href='./personalPage.php'><span>Personal Page</span></a></li>";
                echo "<li><a href='./logout.php'><span>Logout</span></a></li>";
            }
            else {
                echo "<li><a href='./signUp.php'><span>Sign Up</span></a></li>";
                echo "<li><a href='./login.php'><span>Login</span></a></li>";
            }
                echo "<li><a href='./about.php'><span>About</span></a></li>";
            ?>
    </ul>
</div>