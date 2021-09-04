<?php 
    session_start();

    $remove=$_GET['remove'];
    unset($_SESSION['cart'][$remove]);
    header('Location:checkout.php');

?>