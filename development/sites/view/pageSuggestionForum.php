<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Suggestion Forum</title>
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
                <?php
                	if (!empty($_GET['id_for'])){

		                $result_for = mysqli_query($co, "SELECT firstname, lastname, mail, id_SURFER, title_forum FROM FORUM NATURAL JOIN SURFER WHERE id_FORUM = ".$_GET['id_for']);
		                $infos_forum = mysqli_fetch_assoc($result_for);
						
						echo "<fieldset>Suggestion à <b>" . $infos_forum['firstname'] . ' ' . $infos_forum['lastname'] . "</b> à propos du forum <b>" . 
                    	$infos_forum['title_forum'] . "</b>" . " :";
                   
                    	$ui = '<form method="POST" action = "../controller/suggestionForum.php?id_for=' . $_GET['id_for'] . '" >';
                    	echo $ui;
                    ?>
					    <input type="text" id="Suggestion" name="Suggestion" placeholder="Rédiger une suggestion">
						<button class ="btn waves-effect waves-light center" type="submit" formethod="put">Envoyer la suggestion</button></form>
						
						</fieldset>
				<?php } ?>
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