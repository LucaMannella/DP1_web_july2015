<?php /** Created by Luca on Date: 03/07/2015 at Time: 19:50 **/ ?>

<div id='header'>
    <h1 id='logo'>Reservations<span class='gray'>Conference</span>Hall</h1>
        <h2 id='slogan'>Comfort &amp; Professionality at your service!</h2>
        <ul id='MenuAlto'>
            <li id='Home'><a href='./index.php'><span>Home</span></a></li>
            <li id='Conferences'><a href='./conferences.php'><span>Conferences</span></a></li>
            <?php
            if(isset($loggedIn) && ($loggedIn)) {
                echo "<li id='PersonalPage'><a href='./personalPage.php'><span>Personal Page</span></a></li>";
                echo "<li id='Logout'><a href='./logout.php'><span>Logout</span></a></li>";
            }
            else {
                echo "<li id='SignUp'><a href='./signUp.php'><span>Sign Up</span></a></li>";
                echo "<li id='Login'><a href='./login.php'><span>Login</span></a></li>";
            }
                echo "<li id='About'><a href='./about.php'><span>About</span></a></li>";
            ?>
    </ul>
</div>