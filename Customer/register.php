<?php
        // ini_set('display_errors', true);
        // error_reporting(E_ALL);
     
    session_start(); 
    // $_SESSION['message'] = array();
          $data = $_POST;
          
            // if(empty($data['username']) ||
            // empty($data['password'])||
            // empty($data['Confirm_password']) ||
            // empty($data['email'])
            // // empty($data['gender'])
            // ){
            //     // die('Please fill out all the fileds');
            //     $_SESSION['messages'][]= 'Please fill out all the fileds!';
            //     header('Location:signup.php' );
            //     exit;
            // }

          if($data['password'] != $data['confirm_password']){
                // die ('Passwords do not MATCH !!');
              $_SESSION['messages'][]= 'Passwords do not MATCH';
                header('Location:signup.php' );
              exit;
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
            header('Location:signup.php' );
            exit;
        }
        
//filter duplicate user
            $statement = $connection -> prepare
            ('SELECT * FROM Customers WHERE username = :username
             OR email = :email');

             if($statement){
                 $statement -> execute([
                     ':username' => $data['username'],
                     ':email' => $data['email'],
                 ]);

                 $result = $statement ->fetchAll(PDO::FETCH_ASSOC);

                 if(!empty($result)){
                    //  die('The username is already exist');
                    $_SESSION['messages'][]= 'This user is already exist';
                    header('Location:signup.php' );
                    exit;
                 }
             }
//creating user database
            $statement = $connection->prepare
            ('INSERT INTO Customers (username, email, password, full_name, address, billing_address, country, phone) 
            VALUES (:username, :email, :password, :full_name, :address, :billing_address, :country, :phone)');
 
if($statement){
    $result = $statement -> execute([
        ':username' =>$data['username'],
        ':email' => $data['email'],
        ':password' => md5($data['password']),
        ':full_name' =>$data['full_name'],
        ':address' =>$data['shipping_addr'],
        ':billing_address' =>$data['billing_addr'],
        ':country' =>$data['country'],
        ':phone' =>$data['phone'],
        ]);

    if($result){
// Token hash
        $_SESSION['token'] = hash('sha256', uniqid());

//confrim reg-email  
        $email = $data['email'];
        $message = sprintf('Hello %s, Please confirm your Registeration 
        at E-comm by the following link > http://localhost/phpForm/confirm.php',
        $data['username'],
        http_build_query([
            'token' => $_SESSION['token'],
            'email' => $email
        ])
    );
        $headers = 'From: nayhtetkyaw.dev@gmail.com';

        mail($email,'[E-comm] User Registeration',$message,$headers, 'toekn');
       
       // echo "<script>alert('You account is registered, Check your email and confirm')</script>";
       $_SESSION['gmessages'][]= 'Your Account is Registered!';
       header('Location:index.php');
       exit;
        
        }
    }
?>