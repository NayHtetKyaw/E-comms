<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="signup.css">
    </head>

    <body>
        <div class="main-container">
            <form method="POST" action="login.php">
            <?php require_once 'fMessage.php';?>
            <?php require_once 'gMessage.php';?>
                <div class="container" onclick="onclick">
                    <div class="top"></div>
                    <div class="bottom"></div>
                    <div class="center">
                        <h2>Admin Login</h2>
                        <input type="text" name="username" placeholder="username" required>                      
                        <input type="password" name="password" placeholder="password" required>   
                        <!-- <h2>&nbsp;</h2> -->
                        <div class="button">
                            <button type="submit" name="submit">
                                Login <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                            <button type="button" name="cancel">
                                Cancel <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <p>Create New Admin <a style="color:green" href="Admin_signup.php">Account</a>&nbsp;here</p>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>