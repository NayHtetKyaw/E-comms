<!DOCTYPE html>
<html>
    <head>
        <title>Register Form</title>
    </head>
    <body>
       
<?php
            $username = $password = $conPassword= $email = "";
            // $submit;

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $username = reg($_POST["username"]);
                $password = ($_POST['password']);
                $conPassword = ($_POST['Confirm_password']);
                $email = ($_POST['email']);
                // $submit = ($_POST['submit']);

            }
            
            function reg($dataF){
                $dataF = trim($dataF);
                $dataF = stripslashes($dataF);
                $dataF = htmlspecialchars($dataF);
                return $dataF;
            }
?> 
    <h1>PHP Register form</h1>
    <?php require_once 'messages.php'; ?>

        <form method="POST"
         action="register.php">
                Name : <input type="text" name="username" required><br>
                Email: <input type="email" name="email"required><br>
                Password:<input type="password" name="password" required><br>
                Confirm Password: <input type="password" name="Confirm_password" required><br>
                <!-- Gender:<input type="radio" name="gender" value="Female" required>Female
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Gay">Gay<br> -->
                <input type="submit" name="submit" value="Submit"><br>
        </form>
    </body>
</html>
