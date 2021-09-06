<?php

// session_start();

if(empty($_SESSION['gmessages'])){
    return;
}

$gmessages = $_SESSION['gmessages'];
unset($_SESSION['gmessages']);
?>
<html>
    <style>
        .message{
            transform: translate(235%,1650%);
            width: 255px;
            overflow: auto;
            color: green;
            border-radius: 10px;
        }
    </style>
    <body>
        <div class="message">
        <?php foreach ($gmessages as $message): ?>
                 <?php echo $message; ?>
            <?php endforeach; ?>
        </div>       
    </body>
</html>

    
