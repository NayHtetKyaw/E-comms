<?php

session_start();

if(empty($_SESSION['messages'])){
    return;
}

$messages = $_SESSION['messages'];
unset($_SESSION['messages']);
?>
<html>
    <style>
        .message{
            transform: translate(245%,1020%);
            width: 255px;
            overflow: auto;
            color: #ff0000;
            border-radius: 10px;
        }
    </style>
    <body>
        <div class="message">
        <?php foreach ($messages as $message): ?>
                 <?php echo $message; ?>
            <?php endforeach; ?>
        </div>       
    </body>
</html>

    
