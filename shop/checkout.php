<?php
// session_start();
include('cart.php');
// include('orders.php');
     // data base connection
    $dsn = 'mysql:dbname=Ecomm;host=localhost';
    $dbuser ='root';
    $dbPassword ='Security-sql1122';

    try{
        $connection = new PDO($dsn , $dbuser, $dbPassword); 

    }catch(PDOException $e){
        // die ('Connection failed!' . $exception ->getMessage());
        $_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
        header('Location:index.php');  
    }

    //config 


    if(isset($_POST['checkout'])){
        $id = $_SESSION['cart'][$index]['idProduct'];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pelrata &mdash; Order cart</title>
        <link rel="stylesheet" href="css/orders.css">
    </head>
    <body>
        <div class="main-container">
                <h1>Shopping Cart</h1>
            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
                    <label class="product-line-price">Total</label>
                </div>

            </div>
        </div>
    </body>
</html>

<?php
// config....

    // $id = $name = $price = $stock = $totalprice = 0;
    // $description = $image = $category = '';
    if(empty($_SESSION['cart'])){
        $empty = 'You have an empty Cart :(';
    }else{
        foreach($_SESSION['cart'] as $i => $value){
            $totalprice = 0;
            $totalcost = 0;
            $id = $_SESSION['cart'][$i]['idProduct'];
            $name = $_SESSION['cart'][$i]['name'];
            $image = $_SESSION['cart'][$i]['image'];
            $price = $_SESSION['cart'][$i]['price'];
            $description = $_SESSION['cart'][$i]['description'];
            $category = $_SESSION['cart'][$i]['category'];
            $quentity = $_SESSION['cart'][$i]['quentity'];
            // $quentity = 1;
    
            if(isset($_POST['edit'.$i])){
                $_SESSION['cart'][$i]['quentity']=$_POST['quentity'.$i];
                
            }
            $quentity=$_SESSION['cart'][$i]['quentity'];
    
            $totalprice = $price*$quentity;
            $totalcost+=$totalprice;
    }


?>
    <div class="main-container">
        
        <div class="shooping-cart">
            <form method="POST">

                <div class="product">
                    
                    <div class="product-image">
                        <img src="<?php echo '../media/'.$image; ?>">
                    </div>
                    <div class="product-details">
                        <div class="product-title"><?php echo $name; ?></div>
                        <p class="product-description"><?php echo $description; ?></p>
                    </div>
                    <div class="product-price">$<?php echo $price; ?></div>
                        <div class="product-quantity">
                        <input type="number" name="quentity<?php echo $i; ?>" value="<?php echo $quentity; ?>" min="1">
                    </div>
                
                    <div class="product-removal">
                        <button class="remove-product" type='submit' name="edit<?php echo $i; ?>">Edit</button>
                        <button class="remove-product"><a href="delete.php?remove=<?php echo $i ?>">Remove</a></button>
                    </div>
                    <div class="product-line-price">$<?php echo $totalprice; ?></div>
                </div>
                    
            </form>
        </div>
    </div>

<?php 
    }
?>
    <form method="POST">
        <div class="t-c">
            <label>Total Amount: $<?php echo $totalcost; ?></label>
        </div>
        <div class="check-out">
            <button class="checkout"><a href='product.php'>Go Back</a></button>
            <button class="checkout" type="submit" name="checkout"><a href='payment.php'>Checkout</a></button>
        </div>
    </form>


