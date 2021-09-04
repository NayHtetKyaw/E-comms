<?php
session_start();

    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    echo $_POST['username'];
    echo $_POST['password'];
        
    // if(empty($data['username']) || empty($data['password'])){
    //     die('Please fill out the username and password (Both Required)');
    // }

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

        $statement=$connection->prepare
        ('SELECT * FROM admin WHERE username=:username');

        $statement->execute([':username'=>$username]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $user = array_shift($result);

        if($user['username'] == $username && $user['password'] == $password){

            // echo "<script>alert('Welcome To Admin Panel')</script>";
            header('Location:product_view.php');

        }else{
            $_SESSION['messages'][]= 'Incorrect username or Password!';
            header('Location:index.php');
            exit;
        }
?>