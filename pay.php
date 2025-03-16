<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $room_id = isset($_GET['room_id']) ? $_GET['room_id'] : '';
    ?>
    <div style="text-align: center; margin-top: 50px;">
        <a href="payment.php?denom=full&room_id=<?php echo $room_id; ?>" class="button" style="display: inline-block; padding: 15px 30px; margin: 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 18px;">Pay Full Amount</a>
        <a href="payment.php?denom=half&room_id=<?php echo $room_id; ?>" class="button" style="display: inline-block; padding: 15px 30px; margin: 10px; background-color: #008CBA; color: white; text-decoration: none; border-radius: 5px; font-size: 18px;">Pay Half Amount</a>
    </div></div>
</body>
</html>