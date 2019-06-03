<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Créer un tutoriel</title>
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

				<?php if (!empty($_SESSION)){ ?>

					<h5 class="center">Créer votre propre tutoriel dans n'importe quelle catégorie !</h5>
					<blockquote>
						N'écrivez pas en majuscule, n'utilisez pas le langage SMS et les abréviations, soignez la mise en page de votre message.
					</blockquote>

					<div class="row">
						<form enctype="multipart/form-data" method="POST" action="../controller/creerTutoriel.php" class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">format_list_bulleted</i>
									<select name="choix_categorie">
										<option value="" disabled selected>Choisissez la catégorie du tutoriel</option>
										<?php
											$result = mysqli_query($co, 'SELECT * FROM CATEGORY ORDER BY label') or die("Impossible d'exécuter la requête des categories.");

											while ($row = mysqli_fetch_assoc($result)) {
												echo "
													<option value=\"".$row['id_CATEGORY']."\">".$row['label']."</option>
												</tr>";
											}

										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">title</i>
									<input id="title_tutoriel" name="title_tutoriel_create" class="validate" type="text">
									<label for="title_tutoriel">Titre du tutoriel</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">format_quote</i>
									<textarea id="area_content" name="content_tutoriel_create" class="validate materialize-textarea"></textarea>
									<label for="area_content">Votre tutoriel</label>
								</div>
							</div>
							<div class="row center">
								<div class="card teal darken-4">
									<div class="card-content white-text">
										<div class="file-field input-field">
											<div class="btn">
												<span>Image</span>
												<input multiple="multiple" type="file" class="form-control" onchange="readURLSeveralImages(this);" accept="image/*" name="illustrations[]">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
										</div>
										<br>
											<div class="carousel" id="illustrations"></div>
									</div>
								</div>
							</div>

							<button class="btn waves-effect waves-light center btnCreate" type="submit" name="action">Créer ce tutoriel
								<i class="material-icons right">send</i>
							</button>
						</form>
					</div>

				<?php } else{ ?>
					<blockquote>
						Vous devez vous connecter pour créer un tutoriel.
					</blockquote>

					<form method="post" action="pageConnexion.php">
			        	<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action">Se connecter</button>
					</form>

					<form method="post" action="pageInscription.php">
			        	<button class="waves-effect waves-teal btn-flat purple lighten-5" type="submit" name="action">S'inscrire</button>
					</form>
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