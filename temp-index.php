<!-- index.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Chat Server</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon_io/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fontawesome-web/css/all.css">
</head>

<body>
    <main>
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1" class="fa-user-plus">Sign Up</label>
        <input id="tab2" type="radio" name="tabs">
        <label for="tab2" class="fa-right-to-bracket">Login</label>
        <section id="content1">

            <?php include_once('signup.php'); ?>

        </section>
        <section id="content2">

            <?php include_once('login.php'); ?>

        </section>
    </main>

</body>

</html>