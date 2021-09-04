<?php
// session_start();
include('cart.php');
    //dat base connection
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

    //product view 

    $id = $name = $price = $image = 
    $description = $category = $stock = $purchase ='';

    $statement = ('SELECT * FROM Products');
    $result = $connection->query($statement);
  
    //catching user id
    if(empty($_SESSION['username'])){
        $user = "<a href='../Customer/index.php'>login</a>";
    }else{
        // echo $_SESSION['username'];
        $user = $_SESSION['username'];
        $_SESSION['id'];
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelrata &mdash; Products </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">

        <!-- nav -->
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-2">
                        <div id="fh5co-logo"><a href="index.php">Pelrata</a></div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center menu-1">
                        <ul>
                            <li class="has-dropdown">
                                <a href="product.php">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="product.php">Browse Items</a></li>
                                </ul>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li class="has-dropdown">
                                <a href="services.php">Services</a>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                            <li class="has-dropdown">
                                <a href=""><?php echo $user; ?></a>
                                <ul class="dropdown">
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                        <ul>
                            <li class="search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..">
                                    <span class="input-group-btn">
						        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
						      </span>
                                </div>
                            </li>
                            <li class="shopping-cart"><a href="checkout.php" class="cart"><span><small><?php echo $cart; ?></small><i class="icon-shopping-cart"></i></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        <!-- nav end -->

        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../media/shopbg.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>Make your home A better place</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-product">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <!-- <span>Cool Stuff</span> -->
                        <h2>Products</h2>
                        <p>Browse all the products here</p>
                    </div>
                </div>
                <div class="row">
                    <form method="GET" action="">
                    <?php foreach($result as $row){
                           $id = $row['idProduct'];
                           $name = $row['name'];
                           $price = $row['price'];
                           $description = $row['description'];
                           $image = $row['image'];
                           $category = $row['category'];
                           $stock = $row['stock'];

                        echo "<div class='col-md-4 text-center animate-box'>";
                            echo "<div class='product'>";
                                echo "<div class='product-grid' style='background-image:url(../media/$image)'>"; ;
                                    echo "<div class='inner'>";
                                        echo "<p>";
                                            echo "<a href='single.php?idProduct=$id&name=$name&description=$description&price=$price&image=$image' class='icon'><i class='icon-shopping-cart'></i></a>";
                                            echo "<a href='single.php' class='icon'><i class='icon-eye'></i></a>";
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";

                                echo "<div class='desc'>";
                                    echo "<h3><a href='#'>" .$row['name']. "</a><h3>";
                                    echo "<span class='price'>".'$' . $row['price']. "</span>" ."<br>";
                                    // echo "<button class='buy-btn' type='submit' name='orders'><a href='checkout.php?idProduct=$id'>Buy Now</a></button>";
                                    echo "<button class='buy-btn' type='submit' name='orders'><a href='orders.php?idProduct=$id&name=$name&price=$price&
                                        description=$description&image=$image&=category=$category&stock=$stock'>Buy Now</a></button>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }               
                    ?>
                    </form>
                </div>
            </div>
        </div>

        <div id="fh5co-started">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Newsletter</h2>
                        <p>Keep in touch with our latest Products. Subscribe Now and get notify about special offers</p>
                    </div>
                </div>
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2">
                        <form class="form-inline">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-4 fh5co-widget">
                        <h3>Pelrata</h3>
                        <p>Pelrata is one of the Best Furniture Stores You can find. Let's us help you decorate a sweetest home .We Value customer's trust</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                        <ul class="fh5co-footer-links">
                            <li><a href="about.php">About</a></li>
                            <li><a href="services.php">Help</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="about.php">Terms</a></li>
                            <li><a href="contact.php">Meetups</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
                        <ul class="fh5co-footer-links">
                            <li><a href="product.php">Shop</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Handbook</a></li>
                            <li><a href="services.php">Held Desk</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p>
                            <small class="block">&copy; 2021 nayhtetkyaw All Rights Reserved.</small>
                        </p>
                        <p>
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="nayhtetkyaw.github.io" target="blank"><i class="icon-dribbble"></i></a></li>
                            </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

</body>

</html>


