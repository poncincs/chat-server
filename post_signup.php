<!-- post_signup.php -->
<?php
session_start();

include_once('config/mysql.php');

if (
    isset($_POST['submit']) &&
    !empty($_POST['full-name']) &&
    !empty($_POST['email-signup']) &&
    !empty($_POST['uname-signup']) &&
    !empty($_POST['psw-signup']) &&
    !empty($_POST['psw-repeat']) &&
    !empty($_POST['gender'])
) {
    if ($_POST['psw-signup'] === $_POST['psw-repeat']) {

        // Securing of variables that we retrieve
        $full_name = (htmlentities(addslashes(htmlspecialchars($_POST['full-name']))));
        $email_secur = (htmlentities(addslashes(htmlspecialchars($_POST['email-signup']))));
        $uname_secur = (htmlentities(addslashes(htmlspecialchars($_POST['uname-signup']))));
        $psw_secur = (htmlentities(addslashes(htmlspecialchars($_POST['psw-signup']))));
        $gender_secur = (htmlentities(addslashes(htmlspecialchars($_POST['gender']))));

        try {
            $uname = $dbChatServer->prepare("SELECT username
				FROM users
				WHERE username = :username");
            $uname->execute([
                'username' => $uname_secur,
            ]);
            $result = $uname->fetchAll(PDO::FETCH_ASSOC);
            $uname->closeCursor();
            if (count($result) != 0) {
                $msg = "This username is already used !";
                exit();
            }

            $email = $dbChatServer->prepare("SELECT email
				FROM users
				WHERE email = :email");
            $email->execute([
                'email' => $email_secur,
            ]);
            $result = $email->fetchAll(PDO::FETCH_ASSOC);
            $uname->closeCursor();
            if (count($result) != 0) {
                $msg = "This email adresse is already used !";
                exit();
            }

            $addUser = $dbChatServer->prepare("INSERT INTO users(full_name, email, username, password, gender) VALUES (:full_name, :email, :username, :password, :gender)");
            $addUser->execute([
                'full_name' => $full_name,
                'email' => $email_secur,
                'username' => $uname_secur,
                'password' => $psw_secur,
                'gender' => $gender_secur,
            ]);

            $connexion = true;

            // header("Refresh: 5; URL= home.php");
            // include_once("./redirection.php");
            // echo '<h2 class="text-center">Registration</h2>';
            // echo '<p class="center text-center alert alert-success">Successful registration ' . $uname_secur . ' ! You will be redirect in 5 seconds...</p>';
            // echo '</body></html>';
            // exit();
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Server - Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fontawesome-web/css/all.css">
</head>

<body>
    <h2 class="center text-center">Registration</h2>
    <!-- si on a pas été redirigé vers home.php, c'est que le login et/ou le mot de passe est incorrect -->
    <p class="center text-center alert alert-danger">Registration refused.</p>
    <p class="center text-center">Back to <a href="./index.php">registration</a> page.</p>

    <?php
    include_once("./footer.php");
    ?>

</body>

</html>