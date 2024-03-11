<!-- index.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Chat Server - Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon_io/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fontawesome-web/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <input type="checkbox" id="check">
    <div class="login">
        <?php include_once('login.php'); ?>
    </div>
    <div class="registration">
        <?php include_once('register.php'); ?>
    </div>
    <script type="text/javascript" src="js/passwordIndicator.js"></script>
</body>

</html>