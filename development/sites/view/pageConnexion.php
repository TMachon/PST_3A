<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Se Connecter</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>	
	
	<body>
		<?php include('components/banner.php'); // On inclut la bannière ?>

		<div id="formulaire">
			<form method="POST" action="../controller/connexion.php">
				<div class="row">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input type="email" class="validate" name="mail">
							<label>Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">security</i>
							<input type="password" class="validate" name="password">
							<label>Password</label>
						</div>
					</div>
				</div>

				<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action" onclick="verifConnection()">Se connecter
					<i class="material-icons left">send</i>
				</button>
			</form>

	        <form method="post" action="pageInscription.php">
	        	<button class="waves-effect waves-teal btn-flat" type="submit" name="action">S'inscrire</button>
			</form>

			<form method="post" action="accueil.php">
				<button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action" id="btnAccueil">Retour à l'accueil
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