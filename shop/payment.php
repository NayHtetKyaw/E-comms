<?php 
    session_start();

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

    $customerID = $_SESSION['id'];
    if(isset($_POST['submit'])){

        $card_number=$_POST['card_number'];
        $method= strtoupper($_POST['method']);
        $name = $_SESSION['username'];

        $statement = ("INSERT INTO Payments(idPayment,customer_id,cardNo,Customer_Name)
        VALUES('$method','$customerID','$card_number','$name')");

        $connection->exec($statement);

    }

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pelrata &mdash; Services</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/payment.css">
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
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="index.php">Pelrata</a></div>
				</div>
                <div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li>Pay With &mdash; </li>
                        <li> </li>
                        <li> Visa Card</li>
                        <li>, Master Card</li>
                        <li>, JCB / MPU</li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

    <div class="main-container">
        <form method="POST">
            <div id="card-success" class="hidden">
                <i class="fa fa-check"></i>
                <p>Payment Successful!</p>
            </div>
            <div id="form-errors" class="hidden">
                <i class="fa fa-exclamation-triangle"></i>
                <p id="card-error">Card error</p>
            </div>
            <div id="form-container">

                <div id="card-front">
                        <div id="shadow"></div>
                        <div id="image-container">
                            <span id="amount">paying: <strong>$99</strong></span>
                            <span id="card-image"></span>
                        </div>
                    <!--- end card image container --->

                    <label for="card-number">Card Number</label>
                    <input type="text" name="card_number" id="card-number" placeholder="1234 5678 9101 1112" length="16" required>
                    <div id="cardholder-container">
                        <label for="card-holder">Card Holder</label>
                        <input type="text" name="name" id="card-holder" placeholder="e.g. John Doe" />
                        <input style="margin-top: 7px; width:150px" type="text" name="method" id="payment mehtod" placeholder="e.g. Visa Card" required/>

                    </div>
                    <!--- end card holder container --->
                    <div id="exp-container">
                        <label for="card-exp">Expire Date</label>
                        <input id="card-month" type="text" placeholder="MM" length="2" required>
                        <input id="card-year" type="text" placeholder="YY" length="2" required>
                    </div>
                    <div id="cvc-container">
                        <label for="card-cvc"> CVC/CVV</label>
                        <input id="card-cvc" placeholder="XXX-X" type="text" min-length="3" max-length="4" required>
                        <p>Last 3 or 4 digits</p>
                    </div>
                    <!--- end CVC container --->
                    <!--- end exp container --->
                </div>
                <!--- end card front --->
                <div id="card-back">
                    <div id="card-stripe"></div>
                </div>
                <!--- end card back --->
                <input type="text" id="card-token" />
                <div class="btns">
                    <button type="button" class="goback-btn"><a href='checkout.php'>Go Back</a></button>
                    <button type="submit" name="submit" class="done-btn"><a href='index.php'>Done</a></button>
                </div>


            </div>
            <!--- end form container --->

        </form>
    </div>

	<footer style='margin-top:100px' id="fh5co-footer" role="contentinfo">
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


<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Pelrata &mdash; Payment </title>
        
    </head>
    <body>
       
    </body>
</html> -->