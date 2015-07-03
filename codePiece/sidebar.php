<?php /** Created by Luca on Date: 03/07/2015 at Time: 19:56 **/ ?>

<div id="sidebar">
    <?php
        if( isset($goodbye) && ($goodbye) ) {
            echo "<blockquote style='padding: 0 0 0 1px;'><h7>Goodbye:</h7>",
                "<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
            $loggedIn   = false;
            $goodbye    = false;
        }
        elseif( isset($loggedIn) && ($loggedIn) )
            echo "<blockquote style='padding: 0 0 0 1px;'><h7>Welcome:</h7>",
                "<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
    ?>
    <h2> Options </h2>
    <ul class="sidemenu">
        <li><a id="home" href="./index.php"> Home </a></li>
        <li><a id="activities" href="./activities.php"> Activities </a></li>
        <?php
        if( isset($loggedIn) && ($loggedIn) ) {
            echo "<li><a id='personalpage' href='./personalPage.php'> Personal Page </a></li>";
            echo "<li><a id='logout' href='./logout.php'> Logout </a></li>";
        }
        else {
            echo "<li><a id='signup' href='./signUp.php'> Sign Up </a></li>";
            echo "<li><a id='login' href='./login.php'> Login </a></li>";
        }
        ?>
        <li><a id="about" href="./about.php"> About </a></li>
    </ul>
</div>