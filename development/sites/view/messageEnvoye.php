<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Message envoyé !</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>

		<?php include('../model/membre.php'); include('components/banner_accueil.php'); // On inclut la bannière?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php
					include 'components/category_list.php';
				?>
			</div>

			<div class="composant_contenu_body corps">
				<h5>Votre message a bien été prit en compte !<br>Nous vous répondrons dans les plus brefs délais !<br><br> Merci !</h5>

				<form method="post" action="accueil.php">
		        	<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action">Revenir à l'accueil</button>
				</form>
			</div>

			<div class="composant_contenu_body">
				<?php
					include 'components/latest_forum.php';
				?>
			</div>
		</div>

		<?php include 'components/floating_button.php'; ?>

	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>