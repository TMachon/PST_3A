<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Forum</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	
	<body>
		<?php include('../model/membre.php'); include('components/banner_accueil.php'); // On inclut la bannière ?>
		
		<div class="contenu_body">

			<div class="composant_contenu_body">
				<?php
					include 'components/category_list.php';
				?>
			</div>

			<div class="composant_contenu_body">
                <?php $id_for = $_GET['id_for'];
                $result_for = mysqli_query($co, "SELECT id_SURFER, title_forum FROM FORUM WHERE id_FORUM = $id_for");
                $infos_forum = mysqli_fetch_assoc($result_for);

                $id_surfer = $infos_forum['id_SURFER'];
                $result_surfer = mysqli_query($co, "SELECT firstname, lastname, mail FROM SURFER WHERE id_SURFER = $id_surfer");
                $infos_surfer = mysqli_fetch_assoc($result_surfer);

				?>
					<fieldset>
                        <?php echo "Suggestion à " . $infos_surfer['firstname'] . ' ' . $infos_surfer['lastname'] . " à propos du forum \"" . 
                        $infos_forum['title_forum'] . "\"" . " :"; ?> 

                        <?php $ui = '<form method="POST" action = "../controller/envoyerSuggestionForum.php>';?>
					    <input type="text" id="Suggestion" name="Suggestion" placeholder="Rédiger une suggestion">
                        <?php echo '/!\ Attention le bouton ne fonctionne pas encore ! /!\<br>';?>
						<button class ="btn waves-effect waves-light center" type="submit" formethod="put">Envoyer la suggestion</button></form>
                        <?php echo "ENVOI DE LA SUGGESTION A L'ADRESSE " . $infos_surfer['mail'];?>
						<br><br>



					</fieldset>
				<?php
				?>
			</div>

			<div class="composant_contenu_body">
				<?php
					include 'components/latest_tutoriel.php';
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