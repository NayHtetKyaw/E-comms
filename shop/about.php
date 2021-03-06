<?php include('cart.php');

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
    <title>New World Mart &mdash; About us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

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
                        <div id="fh5co-logo"><a href="index.php">New World Mart</a></div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center menu-1">
                        <ul>
                            <li class="has-dropdown">
                                <a href="product.php">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="product.php">Browse Items</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="about.php">About</a></li>
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

        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/about-us.png);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>About Us</h1>
                                <h2 style="text-align: center;">
                                    <p>One of the best Furniture stores</p>
                                    <p>Welcome to New World Mart, your number one source for all Furniture
                                        .We're dedicated to giving you the very best of products, with a focus on customer's need.</p>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-about">
            <div class="container">
                <div class="about-content">
                    <div class="row animate-box">
                        <div class="col-md-6">
                            <div class="desc">
                                <h3>Company History</h3>
                                <p>Founded in [year] by [founder name], New World Mart has come a long way from its beginnings in [starting location]. When [founder name] first started out,
                                     [his/her/their] passion for [brand message - e.g. "eco-friendly cleaning products"] drove them to start their own business.
                                    We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.    
                                </p>
                            </div>
                            <div class="desc">
                                <h3>Mission &amp; Vission</h3>
                                <p>We aim to be Earth???s most customer centric company. Our mission is to continually raise the
                                     bar of the customer experience by using the internet and technology to help consumers find,
                                      discover and buy anything, and empower businesses and content creators to maximise their success.

                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" src="images/vision.jpeg" alt="about">
                        </div>
                    </div>
                </div>
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>Productive Staff</span>
                        <h2>Meet Our Team</h2>
                        <p>We are More than welcome to our Customers and we would support everything customers need.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <img src="images/person1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>Nay Htet Kyaw</h3>
                            <strong class="role">Chief Executive Officer</strong>
                            <!-- <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p> -->
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <img src="images/person2.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>Lexi</h3>
                            <strong class="role">Co-Owner</strong>
                            <!-- <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p> -->
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <img src="images/person3.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>Anascence</h3>
                            <strong class="role">Co-Owner</strong>
                            <!-- <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p> -->
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
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
                        <h3>New World Mart</h3>
                        <p>New World Mart is one of the Best Furniture Stores You can find. Let's us help you decorate a sweetest home .We Value customer's trust</p>
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