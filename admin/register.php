<?php
        // ini_set('display_errors', true);
        // error_reporting(E_ALL);
     
session_start(); 

//password match and or match
        if(isset($_POST['submit'])){
            if($_POST['password'] != $_POST['confirm_password']){
                // die ('Passwords do not MATCH !!');
              $_SESSION['messages'][]= 'Passwords do not MATCH';
                header('Location:Admin_signup.php' );
              exit;
          }
        }
          

//database connection
        $dsn = 'mysql:dbname=Ecomm;host=localhost';
        $dbuser ='root';
        $dbPassword ='Security-sql1122';

        try{
            $connection = new PDO($dsn , $dbuser, $dbPassword); 
        }catch(PDOException $exception){
            // die ('Connection failed!' . $exception ->getMessage()); 
            $_SESSION['messages'][]= 'Connection Failed!' . $exception -> getMessage();
            header('Location:Admin_signup.php' );
            exit;
        }
        
        
//filter duplicate user
        $statement = $connection -> prepare
        ('SELECT * FROM admin WHERE username = :username
        OR email = :email');

        if($statement){
            $statement->execute([
                ':username'=>$_POST['username'],
                ':email'=>$_POST['email'],
            ]);

            $result = $statement ->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($result)){
                //  die('The username is already exist');
                $_SESSION['messages'][]= 'This user is already exist';
                header('Location:Admin_signup.php' );
                exit;
            }
        }
             
// creating user database
         
    if(isset($_POST['submit'])){
        $username = ($_POST['username']);
        $full_name = ($_POST['full_name']);
        $password = md5($_POST['password']);
        $email = ($_POST['email']);
        $phone = ($_POST['phone']);

        $statement =("INSERT INTO admin(username,full_name,password,email, phone)
        VALUES('$username','$full_name','$password','$email','$phone')");
        $connection->exec($statement);
        
        $_SESSION['gmessages'][]= 'Your Admin Account is Created!';
        header('Location:index.php');
        exit;
    }
       
?>