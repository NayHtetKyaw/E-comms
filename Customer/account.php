<?php

session_start();

    if(empty($_SESSION['username'])){
        die('You have to log in to your account to visit this page'); 
    }else

    echo 'Welcome ' . $_SESSION['username'] ."!<br>";
    echo "<a href='index.php'>Log out</a>";
?>