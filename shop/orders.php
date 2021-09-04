<?php 
session_start();

$id=$_GET['idProduct'];
$name=$_GET['name'];
$price=$_GET['price'];
$description=$_GET['description'];
$image=$_GET['image'];
$category=$_GET['category'];
$quentity=1;

$orders= array();

$orders['idProduct']=$id;
$orders['name']=$name;
$orders['price']=$price;
$orders['description']=$description;
$orders['image']=$image;
$orders['category']=$category;
$orders['quentity']=$quentity;
// $_SESSION['image'] = $_GET['image'];


if(!isset($_SESSION['cart'])){
    $_SESSION['cart']['0'] = $orders;
}else {
    $items = count($_SESSION['cart']);
    $_SESSION['cart'][$items] = $orders;
} 
header('Location:product.php');

?>