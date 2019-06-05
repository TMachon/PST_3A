<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Suggestion Tutoriel</title>
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
                	if (!empty($_GET['id_tuto'])){

		                $result_tuto = mysqli_query($co, "SELECT firstname, lastname, mail, id_SURFER, title_tutorial FROM TUTORIAL NATURAL JOIN SURFER WHERE id_TUTORIAL = ".$_GET['id_tuto']);
		                $infos_tuto = mysqli_fetch_assoc($result_tuto);
						
						echo "<fieldset>Suggestion à <b>" . $infos_tuto['firstname'] . ' ' . $infos_tuto['lastname'] . "</b> à propos du tutoriel <b>" . 
                    	$infos_tuto['title_tutorial'] . "</b>" . " :";
                   
                    	$ui = '<form method="POST" action = "../controller/suggestionTutoriel.php?id_tuto=' . $_GET['id_tuto'] . '" >';
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