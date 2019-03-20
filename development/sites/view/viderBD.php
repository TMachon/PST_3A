<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Vider BDD</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>

	<body>
		<?php include('../model/membre.php'); include('components/banner_accueil.php'); // On inclut la bannière?>
		<div class="vider_bdd">
			<fieldset>
				<legend>Vider les tables de la base de données</legend>
					<?php
						include('JS/scripts_vider.php');

						if($_SESSION['statutAdmin'] == true){
							echo "<input type='submit' class=\"btn waves-effect waves-light boutonVider\" onclick='redirectViderBDComptes()' value='Vider tous les comptes'>";
							echo "<input type='submit' class=\"btn waves-effect waves-light boutonVider\" onclick='redirectViderBDTutorial()' value='Vider tous les tutoriels'>";
							echo "<input type='submit' class=\"btn waves-effect waves-light boutonVider\"onclick='redirectViderBDForums()' value='Vider forums'>";
							echo "<input type='submit' class=\"btn waves-effect waves-light boutonVider\" onclick='redirectViderBDAnswerTurorial()' value='Vider toutes les réponses aux tutoriels'>";
							echo "<input type='submit' class=\"btn waves-effect waves-light boutonVider\" onclick='redirectViderBDAnswerForum()' value='Vider toutes les réponses aux forums'><br>";
						}
						else{
							echo "Vous n'êtes pas Administrateur.";
						}
					?>

				<form method="post" action="accueil.php">
					<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action">Retour à l'accueil
						<i class="material-icons left">home</i>
					</button>
				</form>
			</fieldset>
		</div>
	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>