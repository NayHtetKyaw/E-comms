<?php

session_start();

    $data = $_POST;
    if(empty($data['username']) || empty($data['password'])){
        die('Please fill out the username and password (Both Required)');
    }

    $username = $data['username'];
    $password = md5($data['password']);
    // $email = $data['email'];
    

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
    ('SELECT * FROM Customers WHERE username = :username');
    $statement->execute([':username' => $username]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $user = array_shift($result);

    // if(0 === (int) $user['active']){
    //     echo "Please confrim registeration first" ."<br>";
    //     die ('<a href="index.php"> Go back </a>');
    // }
    

    if($user['username'] == $username && $user['password'] == $password){ 
        $_SESSION['username'] = $user['username'];
        $_SESSION['id'] = $user['idCustomer'];
       
       header('Location:../shop/index.php');
    }
    else {
        // die('Incorrect username or password');
        $_SESSION['messages'][] = 'Incorrect username or password!';
        header('Location:index.php');
    
    }
    //if (empty($result)){
    //     // die('No such user is exit');
    //     $_SESSION['messages'][] = 'Incorrect username or Password! Please Try again  ';
    //     header('Location:index.php');
    //     exit;
    // }
    


?>