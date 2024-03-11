<!-- post_login.php -->
<?php

include_once('config/mysql.php');

$msg = '';

if (
    isset($_POST['submit']) &&
    !empty($_POST['uname-login']) &&
    !empty($_POST['psw-login'])
) {

    // Securing of variables that we retrieve
    $uname_secur = (htmlentities(addslashes(htmlspecialchars($_POST['uname-login']))));
    $psw_secur = (htmlentities(addslashes(htmlspecialchars($_POST['psw-login']))));

    try {
        $verifPsw = $dbChatServer->prepare("SELECT password FROM users WHERE username = :username");
        $verifPsw->execute([
            'username' => $uname_secur,
        ]);
        $result = $verifPsw->fetchAll(PDO::FETCH_ASSOC);
        $verifPsw->closeCursor();
        $connexion = false;

        if (count($result) == 1) {
            if ($result[0]['password'] == $psw_secur) {
                $verifUser = $dbChatServer->prepare("SELECT COUNT(*)
				AS verification
				FROM users
				WHERE username = :username AND password = :password");
                $verifUser->execute([
                    'username' => $uname_secur,
                    'password' => $psw_secur,
                ]);
                $req_connect = $verifUser->fetchAll(PDO::FETCH_ASSOC);
                $verifUser->closeCursor();

                $connexion = true;

                // session_start();
                // header("Refresh: 5; URL= home.php");
                // include_once("./redirection.php");
                // echo '<h2 class="text-center">Authentication</h2>';
                // echo '<p class="center text-center alert alert-success">Successful authentication ' . $uname_secur . ' ! You will be redirect in 5 seconds...</p>';
                // echo '</body></html>';
                // exit();
            } else {
                $msg = "Wrong password !";
            }
        } else {
            $msg = "Email unknown, please register.";
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Server - Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fontawesome-web/css/all.css">
</head>

<body>
    <h2 class="center text-center">Authentication</h2>
    <!-- si on a pas été redirigé vers home.php, c'est que le login et/ou le mot de passe est incorrect -->
    <p class="center text-center alert alert-danger">Authentication refused.</br><?php echo ($msg); ?></p>
    <p class="center text-center">Back to <a href="./index.php">authentication</a> page.</p>

    <?php
    include_once("./footer.php");
    ?>

</body>

</html>