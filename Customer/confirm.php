<?php

session_start(); 

    
    if(empty($_GET['token'])||empty($_GET['email'])){
        header('Location:signup.php');
    }

    if(empty($_SESSION['token'])){
        // die('Token has been expired');
        $_SESSION['messages'][] = 'Token has been expired';
        header('Location:signup.php');
    }

    $token = $_GET['token'];
    $$email = $_GET['email'];
    if($_SESSION['token'] === $token){
        $dsn = 'mysql:dbname=Ecomm;host=localhost';
        $dbuser ='root';
        $dbPassword ='Security-sql1122';

        try{
            $connection = new PDO($dsn , $dbuser, $dbPassword); 
        }catch(PDOException $exception){
            // die ('Connection failed!' . $exception ->getMessage()); 
            $_SESSION['messages'][] = 'Connection Failed!' . $exception -> getMessage();
            header('Location:signup.php');
            exit;
        }
        
        $statement = $connection->prepare('SELECT * FROM users WHERE email = :email');
        $statement->execute([':email' => $email]);
        $result =  $statement->fetchAll(PDO::FETCH_ASSOC);

        if(empty($result)){
            $_SESSION['messages'][] = 'No such user exist';
            header('Location:signup.php');
            exit;
        }

        $statement = $connection->prepare
        ('UPDATE users SET active = :active WHERE email = :email');
        $result = $statement->execute([':active' => 1, ':email' => $email]);

        echo "You have successfully confirmed your email for account registeration";
        echo "<a href='index.php'>Login</a>";

        unset($_SESSION['token']);

    }else {
        $_SESSION['messages'][] = 'Token has been expired';
        header('Location:signup.php' );
        
    }

?>