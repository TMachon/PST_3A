<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vue 1</title>
</head>
<body>

	<?php

		// On reprend la session en cours
		session_start();

		if(!empty($_SESSION['texte'])){
			// On affiche une alerte avec le contenu de la variable $_SESSION si elle existe
			echo "<script type=\"text/javascript\">alert(\"".$_SESSION['texte']."\")</script>";

			// On supprime la variable de session associée
			unset($_SESSION['texte']);
		}
	?>

	<form action="controlleur.php" method="POST">
		<input type="text" name="text1">
		<button>Test</button>
	</form>
</body>
</html>