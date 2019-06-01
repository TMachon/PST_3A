<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>S'inscrire</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	</head>

	<body>
		<?php include('components/banner.php'); // On inclut la bannière ?>
		
		<div id="formulaire">
			<form enctype="multipart/form-data" action="../controller/inscription.php" method="post">		
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_box</i>
						<input id="first_name" name="prenom" type="text" class="validate">
						<label for="first_name">Prénom</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" name="nom" type="text" class="validate">
						<label for="last_name">Nom de famille</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input id="email_inline" type="email" class="validate" name="mail">
						<label for="email_inline">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">security</i>
						<input id="password" type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row image_de_profil center">
					<div class="card teal darken-4">
						<div class="card-content white-text">
							<span class="card-title">Choisissez votre avatar<font size="3"> (optionnel)</font></span>
							<div class="file-field input-field">
								<div class="btn">
									<span>Image</span>
									<input type="file" class="form-control" onchange="readURL(this);" accept="image/*" name="avatar">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
							<br><img id="previewAvatar" src="#"/>
						</div>
					</div>
				</div>
				
				<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action" onclick="verifInscription()">S'inscrire
					<i class="material-icons left">send</i>
				</button>
			</form>

			<form method="post" action="pageConnexion.php">
	        	<button class="waves-effect waves-teal btn-flat purple lighten-5" type="submit" name="action">Se connecter</button>
			</form>

			<form method="post" action="accueil.php">
				<button class="btn waves-effect waves-light light-blue darken-4" type="submit" id="btnAccueil" name="action">Retour à l'accueil
					<i class="material-icons left">arrow_back</i>
				</button>
			</form>
		</div>

	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>