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
     //view data 
    $ID = $name = $price = $image = 
    $description = $thumbnail = $category = $stock = $submit ='';

    $statement = ('SELECT * FROM Products');
    $result = $connection->query($statement);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products View</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="nav/style.css">

</head>
     <!-- product table  -->
     <style>
            body {
                background: #c4d3f6;
            }
            .container{
                display: flex;
                flex-direction: column;
                justify-content: center;
                width: max-content;
            }
            .table {
                
                position:auto;
                width: 100%;
                height: 650px;
                max-height: 80%;
                overflow: scroll;
                padding: 10px;
                /* top: 50%; */
            }
            
            .htable {
                background-color: #6c7ae0;
                opacity: 0.9;
                color: white;
                font-family: 'Courier New', Courier, monospace;
            }
            
            .btable {
                background: #ffffff;
                opacity: 1;
            }
            
            .btable a {
                text-decoration: none;
                color: #000000;
                cursor: grab;
            }
            
            .btable a:hover {
                color: #ff0000;
                cursor: grab;
            }
            
            th {
                padding: 8px;
                border-radius: 2px;
                /* text-align: center; */
            }
            
            td {
                padding: 10px;
                border-radius: 3px;
            }
           
            .footer{
                height: 30px;
                background-color: #5161ce;
                color: #ffffff;
                text-align: center;
                margin: 10px;
                padding: 5px;
                width: 100%;
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
        <!-- nav bar -->
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
                    <li class="nav-item active">
                        <a class="nav-link" href="product_view.php"><i class="fa fa-table"></i>View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_update.php"><i class="fa fa-arrow-circle-up"></i>Update</a>
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
        
        <div class="container">
            <div class="option">

                <div class="select-box">
                    <div class="select-box__current" tabindex="1">
                        <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked"/>
                            <p class="select-box__input-text">View Product Records</p>
                        </div>
                            <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="4" value="5" name="Ben"/>
                            <p class="select-box__input-text">View Customer Records</p>
                        </div><img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                    </div>
                    <ul class="select-box__list">
                        <li>
                            <a href=''>
                                <label class="select-box__option" for="0" aria-hidden="aria-hidden">Products</label>
                            </a>
                        </li>
                        <li>
                            <a href='customer_view.php'>
                                <label class="select-box__option" for="1" aria-hidden="aria-hidden">Customers</label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <div class="table">
                <form method="GET" action=""> 
                    
                <table>
                    <thead class="htable">
                        <tr>
                            <th>ProductID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <!-- <th>Thumbnail</th> -->
                            <th>Images</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <?php foreach($result as $row){
                        
                        echo "<tbody class='btable'>";
                        $image = $row['image'];
                        $ID = $row['idProduct'];
                            echo "<tr>";
                                echo"<td>". $row['idProduct']."</td>";
                                echo"<td>". $row['name']."</td>";
                                echo"<td>". $row['price']."</td>";
                                echo"<td>". $row['description']."</td>";
                                // echo"<td><img src='media/$thumbnail' width='60px' height='60px'></td>";
                                echo"<td><img src='../media/$image' width='100px' height='100px'></td>";
                                echo"<td>". $row['category']."</td>";
                                echo"<td>". $row['stock']."</td>";
                                echo"<td>"."<a href='product_update.php?idProduct=$ID'>Edit Details</a>"."</td>";
                            echo "</tr>";
                        echo "</tbody>";
                    }
                    ?>   
                </table>

                </form>
            </div>
            <div class="footer">
                <p>nayhtetkyaw 2021 All Rights Reserved</p>
            </div>
        </div>
       
            <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
            <script src="nav/script.js"></script>
    </body>
</html>
