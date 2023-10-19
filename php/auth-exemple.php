<?php
session_start();

/*vérification du formulaire*/
if (
	isset($_POST['envoi']) && !empty($_POST['identifiant']) &&
	!empty($_POST['password'])
) {

	/*on sécurise le login et le password*/
	$id_secur = (htmlentities(addslashes(htmlspecialchars($_POST['identifiant']))));
	$mdp_secur = (htmlentities(addslashes(htmlspecialchars($_POST['password']))));

	/*requête de connexion*/
	try {
		$connect = $bdd->prepare("
				SELECT COUNT(*)
				AS verification
				FROM connexion
				WHERE login = ? AND password = ?
			");
		$connect->execute(array($id_secur, $mdp_secur));
		$req_connect = $connect->fetchAll(PDO::FETCH_ASSOC);
		$connect->closeCursor();
		$connexion = false;
		foreach ($req_connect as $valeur) {
			if ($valeur['verification'] == '0') {
				$connexion = false;
			} else {
				$connexion = true;
				/*redirection vers mon site */
				header("Refresh: 5; URL= trombinouc.php");
				include("./redirection.php");
				echo '<p class="w3-center">Authentification réussite ' . $id_secur . ' ! Vous allez être redirigé dans 5 secondes...</p>';
				include("./footer.php");
				echo '</body></html>';
				exit();
			}
		}
	} catch (Exception $e) {
		echo 'Erreur : ' . $e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html>
<title>Trombinouc</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">

<body>

	<header>Authentification</header>
	<!-- si on a pas été redirigé vers trombinouc.php, c'est que le login et/ou le mot de passe est incorrect -->
	<div class="imgcontainer">
		<img src="./Images/avatar3" alt="Avatar" class="avatar">
	</div>
	<p class="w3-center">Authentification refusée.</p>
	<p class="w3-center redirection">Retournez à la page d'<a href="./index.php">authentification</a>.</p>

	<?php
	include("./footer.php");
	?>

</body>

</html>