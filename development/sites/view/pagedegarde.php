<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>CommentFaire.fr</title>
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

			<div class="composant_contenu_body pagedegarde">
				<font color ="#0095ba" size="+3">
					<strong> Qui sommes-nous ? </strong>
				</font>

				<br/>
				<p> Bonjour &agrave; toutes et &agrave; tous !<br><br>
				Nous sommes la team Commentfaire.fr et nous vous souhaitons la bienvenue sur notre site DIY !<br><br>
				Site o&ugrave; nous mettons l'accent sur tous les aspects du DIY : autant le lifestyle, que l'informatique et bien 
				d'autres cat&eacute;gories ;)<br><br>
				Nous nous engageons &agrave; r&eacute;aliser des tutoriels simples et efficaces pour vous offrir une exp&eacute;rience de 
				lecture agr&eacute;able et instructive.<br><br>
				Bonne Lecture :) </p><br>

				<font size="+3" color ="#00ba00">
					<strong> R&egrave;gles et Comportement </strong>
				</font>

				<p> Commentfaire.fr est un lieu d'entraide et de partage.<br><br>
				Afin de vous assurer une navigation sans encombre sur notre site, nous vous demendons de bien vouloir respecter les r&egrave;gles de base en restant poli et respectueux nottament dans les sections commentaires et sur le forum.</p>

				<p> Merci &agrave; tous !</p> <br/>

				<font size="+3" color ="#ba004a">
					<strong> Nous contacter ? </strong>
				</font>

				<form method="POST" action="../view/messageEnvoye.php">
					<div class="row">
						<div class="input-field col s12">
							<textarea name="message" id="message" class="materialize-textarea"></textarea>
							<label for="message">Votre message</label>
						</div>
					</div>

					<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action">Envoyer
						<i class="material-icons left">contact_mail</i>
					</button>
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