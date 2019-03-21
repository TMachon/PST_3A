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

		<?php include('../model/membre.php'); include('components/banner_accueil.php'); 

		if (!empty($_SESSION)){ ?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php include 'components/dashboard.php'; ?>
			</div>

			<div class="composant_contenu_body">

				<fieldset><legend>Vos informations personnelles</legend>
					<form enctype="multipart/form-data" action="../controller/modifierCompte.php" method="post">		
						<div class="row">
							<div class="row">
								<div class="input-field col s6">
									<i class="material-icons prefix">account_box</i>
									<input name="prenom" type="text" class="validate" value="<?php echo $_SESSION['prenom']; ?>">
									<label>Prénom</label>
								</div>
								<div class="input-field col s6">
									<input name="nom" type="text" class="validate" value="<?php echo $_SESSION['nom']; ?>">
									<label>Nom de famille</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">email</i>
									<input type="email" class="validate" name="mail" value="<?php echo $_SESSION['mail']; ?>">
									<label>Email</label>
								</div>
							</div>
							<div class="row image_de_profil center">
								<div class="card teal darken-4">
									<div class="card-content white-text">
										<span class="card-title">Choisissez votre avatar<font size="3"> (optionnel)</font></span>
										<input type="file" class="form-control" onchange="readURL(this);" accept="image/*" name="avatar">
		    							<br><img id="previewAvatar" src="#"/>
									</div>
								</div>
							</div>
						</div>
						
						<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action" onclick="verifModifierInfosPersos()">
							Modifier les informations personnelles<i class="material-icons left">edit</i>
						</button>
					</form>
				</fieldset>

				<fieldset><legend>Modifier le mot de passe</legend>

					<form enctype="multipart/form-data" action="../controller/modifierPassword.php" method="post">		
						<div class="row">
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">security</i>
									<input type="password" class="validate" name="ActualPassword">
									<label>Saisissez le mot de passe actuel</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">security</i>
									<input type="password" class="validate" name="NewPassword">
									<label>Saisissez le nouveau mot de passe</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">security</i>
									<input type="password" class="validate" name="ConfirmedNewPassword">
									<label>Confirmer le nouveau mot de passe</label>
								</div>
							</div>
						</div>
						
						<button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action" onclick="verifModifierPassword()">
							Modifier<i class="material-icons left">send</i>
						</button>
					</form>
				</fieldset>
			</div>

			<div class="composant_contenu_body" id="categories"></div>
		</div>

		<?php }
				else echo "<h3 class='title_no_connection'>Vous n'êtes pas connecté.</h3>" ?>

	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>