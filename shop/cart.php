<?php 
session_start();

        if(!isset($_SESSION['cart'])){
            $cart = 0;
        }else{
            $cart=count($_SESSION['cart']);
        }
?>