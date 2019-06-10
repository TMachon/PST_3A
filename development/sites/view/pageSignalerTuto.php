<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Signaler Tutoriel</title>
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
                	if (!empty($_GET['id_tuto'])){ ?>

						<fieldset>

	                		<h4>Choisissez le motif de signalement :</h4>
							<form method="POST" action = "../controller/signaler_tutorial.php?id_tuto=<?php echo $_GET['id_tuto']; ?>" >
								<select name="choix_signalement">
									<option disabled selected>Motif de signalement du tutoriel</option>
									<?php
										$result = mysqli_query($co, 'SELECT * FROM MOTIF_SIGNALEMENT ORDER BY motif') or die("Impossible d'exécuter la requête des motifs de signalement.");

										while ($row = mysqli_fetch_assoc($result)) {
											echo "
												<option value=\"".$row['id_MOTIF_SIGNALEMENT']."\">".$row['motif']."</option>
											</tr>";
										}
									?>
								</select>

								<button class ="btn waves-effect waves-light center" type="submit" formethod="put">Envoyer le signalement</button>
							</form>
						
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