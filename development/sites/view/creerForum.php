<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Créer un forum</title>
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

				<h5 class="center">Lancez une discussion sur n'importe quel sujet qui vous passe par la tête !</h5>

				<blockquote>
					N'écrivez pas en majuscule, n'utilisez pas le langage SMS et les abréviations, soignez la mise en page de votre message.
				</blockquote>

				<div class="row">
					<form method="POST" action="../controller/creerForum.php" class="col s12">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">title</i>
								<input id="title_forum" name="title_forum_create" class="validate" type="text">
								<label for="title_forum">Titre du forum</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">format_quote</i>
								<textarea id="area_content" name="content_forum_create" class="validate materialize-textarea"></textarea>
								<label for="area_content">Votre question, sujet, débat, ...</label>
							</div>
						</div>

						<button class="btn waves-effect waves-light center btnCreate" type="submit" name="action">Lancer ce forum
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
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