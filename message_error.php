<?php // Apparait uniquement lorsqu'il y a une variable dans l'url

if (isset($_GET['redir'])) {
    if ($_GET['redir'] == "errmdp") {
        $msg = "Mot de passe incorrect !";
    } elseif ($_GET['redir'] == "errmail") {
        $msg = "Email inconnue, veuillez vous inscrire !";
    } elseif ($_GET['redir'] == "unameused") {
        $msg = "This username is already used !";
    } elseif ($_GET['redir'] == "mailused") {
        $msg = "This email adresse is already used !";
    } elseif ($_GET['redir'] == "deco") {
        $msg = "Vous êtes désormais déconnecté !";
    } elseif ($_GET['redir'] == "noconnect") {
        $msg = "Vous devez être connecté pour afficher cette page !";
    } else {
        $msg = "";
    }

    echo "<div class='text-center alert alert-warning error-message'>\n
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        {$msg}
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>\n
    </div>\n";
}
