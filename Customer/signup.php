<?php
    $username = $password = $conPassword= $email = $full_name = $address = $billing_address =  $country = "";
    $phone = '';
    $submit;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = reg($_POST["username"]);
        $full_name = reg($_POST['full_name']);
        $password = md5($_POST['password']);
        $conPassword = md5($_POST['confirm_password']);
        $email = ($_POST['email']);
        $address = ($_POST['shipping_addr']);
        $billing_address = ($_POST['billing_addr']);
        $country = ($_POST['country']);
        $phone = ($_POST['phone']);
        $submit = ($_POST['submit']);

    }
    
    function reg($dataF){
        $dataF = trim($dataF);
        $dataF = stripslashes($dataF);
        $dataF = htmlspecialchars($dataF);
        return $dataF;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registeration</title>
        <link rel="stylesheet" href="signup.css">
    </head>

    <body>
        <div class="main-container">
            <form method="POST" action="register.php">
            <?php require_once 'messages.php';?>
                <div class="container" onclick="onclick">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="center">
                        <h2>Register New Account</h2>
                        <input type="text" name="username" placeholder="username" required>
                        <input type="name" name="full_name" placeholder="your full name" required>
                        <input type="email" name="email" placeholder="email" required>
                        <input type="password" name="password" placeholder="password" required>   
                        <input type="password" name="confirm_password" placeholder="Please Confirm your password" required>
                        <input type="text" name="shipping_addr" placeholder="Your Shipping Address" required>
                        <input type="text" name="billing_addr" placeholder="Billing Address (OPTIONAL)">
                        <input type="text" name="country" placeholder="Country">
                        <input type="text" name="phone" placeholder="phone number" required>
                        <!-- <h2>&nbsp;</h2> -->
                        <div class="button">
                            <button type="submit" name="submit">
                                SignUp <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                            <button type="button" name="cancel">
                                Cancel <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <p>Login To Your <a style="color:green" href="index.php">Account</a>&nbsp;here</p>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

</html>