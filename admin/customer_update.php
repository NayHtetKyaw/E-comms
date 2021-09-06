<?php
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

// config.....

   if(isset($_GET['idCustomer'])){
    $ID = $_GET['idCustomer'];

    $statement = "SELECT * FROM Customers WHERE idCustomer='$ID' ";
    $result = $connection->query($statement);

        foreach($result as $row){
            $id = $row['idCustomer'];
            $username = $row['username'];
            $email = $row['email'];
            $password  = md5($row['password']);
            $full_name = $row['full_name'];
            $ship_address = $row['address'];
            $bill_address = $row['billing_address'];
            $country = $row['country'];
            $phone = $row['phone'];
        }
    }else{
        $id = "";
        $username = "";
        $email = "";
        $password  = "";
        $full_name = "";
        $ship_address = "";
        $bill_address = "";
        $country = "";
        $phone = "";
    }
  
//update products
    
        if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password  = $_POST['password'];
            $full_name = $_POST['full_name'];
            $ship_address = $_POST['ship_address'];
            $bill_address = $_POST['bill_address'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];

            $statement = ("UPDATE Customers SET username='$username', email='$email',
            password='$password', full_name='$full_name', address='$ship_address',
            billing_address='$bill_address', country='$country', phone='$phone'
            WHERE idCustomer='$ID'");

            $connection->exec($statement);        
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Products</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="nav/style.css">

</head>
<style>
        body{
            display: flex;
            flex-direction: column;
            background: #c4d3f6;
        }
        .main-body{

            flex-direction: column;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Open Sans,
            Ubuntu, Fira Sans, Helvetica Neue, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
           
        }
        .main-body h1{
            display: flex;
            justify-content: center;
            /* border-bottom: 1px solid; */
            padding: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            width: 100%;
            max-width: 480px;
            margin: auto;
            padding: 1rem;
            display: grid;
            grid-gap: 30px;
            border: 1px solid;
            border-radius: 10px;
            background-color: #ffff;
        }
        .field__input {
            --uiFieldPlaceholderColor: var(--fieldPlaceholderColor, #767676);

            background-color: transparent;
            border-radius: 0;
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            font-family: inherit;
            font-size: inherit;
        }

        .field__input:focus::-webkit-input-placeholder {
            color: var(--uiFieldPlaceholderColor);
        }

        .field__input:focus::-moz-placeholder {
            color: var(--uiFieldPlaceholderColor);
        }

        .field {
            --uiFieldBorderWidth: var(--fieldBorderWidth, 2px);
            --uiFieldPaddingRight: var(--fieldPaddingRight, 1rem);
            --uiFieldPaddingLeft: var(--fieldPaddingLeft, 1rem);
            --uiFieldBorderColorActive: var(--fieldBorderColorActive, rgba(22, 22, 22, 1));
            display: var(--fieldDisplay, inline-flex);
            position: relative;
            font-size: var(--fieldFontSize, 1rem);
        }

        .field__input {
            box-sizing: border-box;
            width: var(--fieldWidth, 100%);
            height: var(--fieldHeight, 3rem);
            padding: var(--fieldPaddingTop, 1.25rem) var(--uiFieldPaddingRight)
            var(--fieldPaddingBottom, 0.5rem) var(--uiFieldPaddingLeft);
            border-bottom: var(--uiFieldBorderWidth) solid
            var(--fieldBorderColor, rgba(0, 0, 0, 0.25));
        }

        .field__input:focus {
            outline: none;
        }

        .field__input::-webkit-input-placeholder {
            opacity: 0;
            transition: opacity 0.2s ease-out;
        }

        .field__input::-moz-placeholder {
            opacity: 0;
            transition: opacity 0.2s ease-out;
        }

        .field__input:focus::-webkit-input-placeholder {
            opacity: 1;
            transition-delay: 0.2s;
        }

        .field__input:focus::-moz-placeholder {
            opacity: 1;
            transition-delay: 0.2s;
        }

        .field__label-wrap {
            box-sizing: border-box;
            pointer-events: none;
            cursor: text;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .field__label-wrap::after {
            content: "";
            box-sizing: border-box;
            width: 100%;
            height: 0;
            opacity: 0;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .field__input:focus ~ .field__label-wrap::after {
            opacity: 1;
        }

        .field__label {
            position: absolute;
            left: var(--uiFieldPaddingLeft);
            top: calc(50% - 0.5em);
            line-height: 1;
            font-size: var(--fieldHintFontSize, inherit);
            transition: top 0.2s cubic-bezier(0.9, -0.15, 0.1, 1.15),
            opacity 0.2s ease-out, font-size 0.2s ease-out;
            will-change: bottom, opacity, font-size;
        }

        .field__input:focus ~ .field__label-wrap .field__label,
        .field__input:not(:placeholder-shown) ~ .field__label-wrap .field__label {
            --fieldHintFontSize: var(--fieldHintFontSizeFocused, 0.75rem);
            top: var(--fieldHintTopHover, 0.25rem);
        }
        .field_v1 .field__label-wrap::after {
            border-bottom: var(--uiFieldBorderWidth) solid var(--uiFieldBorderColorActive);
            transition: opacity 0.2s ease-out;
            will-change: opacity;
        }
        input[type="file"] {
            font-size: 12px; 
        }
        button{
            width: auto;
            height: 50px;
            padding: 5px;
            opacity: 0.9;
            border-radius: 10px;
            background-color: #8e9bef;
        }
        button:hover{
            opacity: 0.7;
            box-shadow: 10px 5px 5px rgb(136, 123, 136);
           
        }
        .footer{
            height: 30px;
            background-color: #5161ce;
            color: white;
            text-align: center;
            margin: 10px;
            padding: 5px;
        }

        form{
            padding: 20px;
        }

        .option{
                display: felx;
                width: auto;
            }

            .select-box {
                position: relative;
                display: block;
                width: max-content;
                margin: 0 auto;
                font-family: "Open Sans", "Helvetica Neue", "Segoe UI", "Calibri", "Arial", sans-serif;
                font-size: 18px;
                color: #60666d;
                margin: 10px;
                left: 23%;
            }
            @media (min-width: 768px) {
                .select-box {
                width: 70%;
                }
            }
            @media (min-width: 992px) {
                .select-box {
                width: 50%;
                }
            }
            @media (min-width: 1200px) {
                .select-box {
                    width: 50%;
                }
            }

            .select-box__current {
                position: relative;
                box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                outline: none;
            }
            .select-box__current:focus + .select-box__list {
                opacity: 1;
                -webkit-animation-name: none;
                animation-name: none;
            }
            .select-box__current:focus + .select-box__list .select-box__option {
                cursor: pointer;
            }
            .select-box__current:focus .select-box__icon {
                transform: translateY(-50%) rotate(180deg);
            }
            .select-box__icon {
                position: absolute;
                top: 50%;
                right: 15px;
                transform: translateY(-50%);
                width: 20px;
                opacity: 0.3;
                transition: 0.2s ease;
            }
            .select-box__value {
                display: flex;
            }
            .select-box__input {
                display: none;
            }
            .select-box__input:checked + .select-box__input-text {
                display: block;
            }
            .select-box__input-text {
                display: none;
                width: 100%;
                margin: 0;
                padding: 15px;
                background-color: #fff;
            }
            .select-box__list {
                position: absolute;
                width: 100%;
                padding: 0;
                list-style: none;
                opacity: 0;
                -webkit-animation-name: HideList;
                        animation-name: HideList;
                -webkit-animation-duration: 0.5s;
                        animation-duration: 0.5s;
                -webkit-animation-delay: 0.5s;
                        animation-delay: 0.5s;
                -webkit-animation-fill-mode: forwards;
                        animation-fill-mode: forwards;
                -webkit-animation-timing-function: step-start;
                        animation-timing-function: step-start;
                box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
                z-index: 1;
                background-color:#c4d3f6;
            }
            
            .select-box__list a{
                text-decoration: none;
                color: #60666d;
            }

            .select-box__option {
                display: block;
                padding: 15px;
                background-color: #fff;
            }
            .select-box__option:hover, .select-box__option:focus {
                color: #546c84;
                background-color: #fbfbfb;
            }

            @-webkit-keyframes HideList {
                from {
                    transform: scaleY(1);
                }
                to {
                    transform: scaleY(0);
                }
            }

            @keyframes HideList {
                from {
                    transform: scaleY(1);
                }
                to {
                    transform: scaleY(0);
                }
            }

    </style> 
<body>
    <!-- partial:index.partial.html -->
    <nav class="navbar navbar-expand-custom navbar-mainbg">
            <a class="navbar-brand navbar-logo" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <div class="hori-selector">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_insert.php"><i class="fa fa-plus"></i>Insert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_view.php"><i class="fa fa-table"></i>View</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="customer_update.php"><i class="fa fa-arrow-circle-up"></i>Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_delete.php"><i class="fa fa-trash"></i>Delete</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-copy"></i>Documents</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="nav/script.js"></script>
    
        <div class='main-body'>

            <div class="option">

                <div class="select-box">
                    <div class="select-box__current" tabindex="1">
                        <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked"/>
                            <p class="select-box__input-text">Update Customer Records</p>
                        </div>
                            <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="4" value="5" name="Ben"/>
                            <p class="select-box__input-text">Update Product Records</p>
                        </div><img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                    </div>
                    <ul class="select-box__list">
                        <li>
                            <a href=''>
                                <label class="select-box__option" for="0" aria-hidden="aria-hidden">Customer</label>
                            </a>
                        </li>
                        <li>
                            <a href='product_update.php'>
                                <label class="select-box__option" for="1" aria-hidden="aria-hidden">Products</label>
                            </a>
                        </li>
                    </ul>
                 </div>

            </div>
            <form class='form' enctype="multipart/form-data" method="POST" action="">
            
            <div class="container">
                <label class="field field_v1">
                    <input class="field__input" type="text" name='username' value="<?php echo $username; ?>" placeholder="e.g username">
                        <span class="field__label-wrap">
                            <span class="field__label">Username</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" type="text" value="<?php echo $email; ?>" name='email' placeholder="e.g example@gmail.com">
                        <span class="field__label-wrap">
                            <span class="field__label">Email</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" type="text" value="<?php echo $password; ?>" name='password' placeholder="user's new password">
                        <span class="field__label-wrap">
                            <span class="field__label">Password</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" type="text" value="<?php echo $full_name; ?>" name='full_name' placeholder="e.g Stephen Hawking">
                        <span class="field__label-wrap">
                            <span class="field__label">Full Name</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" type="text" value="<?php echo $ship_address; ?>" name='ship_address' placeholder="e.g Yangon,Hlae Dan, Pyay road, No.29">
                        <span class="field__label-wrap">
                            <span class="field__label">Shipping Address</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" value="<?php echo $bill_address; ?>" name='bill_address' placeholder="e.g Yangon, Hlae Dan">
                        <span class="field__label-wrap">
                            <span class="field__label">Billing Address</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" value="<?php echo $country; ?>" name='country' placeholder="e.g. Myanmar">
                        <span class="field__label-wrap">
                            <span class="field__label">Country</span>
                        </span>
                </label>

                <label class="field field_v1">
                    <input class="field__input" value="<?php echo $phone; ?>" name='phone' placeholder="e.g. +959xxxxxxxxx">
                        <span class="field__label-wrap">
                            <span class="field__label">Phone</span>
                        </span>
                </label>
                <button type="submit" name="submit" value="update">
                    Update
                </button>
                <button type="botton" name="reset" value="clear">
                    Reset
                </button>
            </div>
            </form>
            <div class="footer">
                <p>&copy;Copyright nayhtetkyaw 2021 All Rights Resevered</p>
            </div>
        </div>
        <script>

        </script>
    </body>
</html>
