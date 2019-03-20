<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Modifier son compte</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Selectionner un Compte à modifier</legend class="titre_legend">
		<?php include('../modeles/bd.php');
			$resultModifC = mysqli_query($co, 'SELECT idenfant, prenomenfant FROM enfant NATURAL JOIN compteenfant NATURAL JOIN parent ORDER BY idenfant') or die("Impossible d'exécuter la requête d'affichage des enfants.");
			?>
			<form method="POST" action="#">
			<?php echo "<select name ='selectModifC' size='".mysqli_num_rows($resultModifC)."'>";
				while($row = mysqli_fetch_array($resultModifC))
					echo "<option value='".$row['idenfant']."'>".$row['prenomenfant']."</option>"; ?>
				</select><br>
			<input type="submit" value="Modifier Compte" id="bouton">
			</form>
	</fieldset>
	
	<?php
		if(isset($_POST['selectModifC'])){ ?>
		<form method="POST" action="../controleurs/modifierCompte.php">
		<fieldset>
			<legend class="titre_legend">Informations modifiables</legend class="titre_legend">
			<?php include('../modeles/bd.php'); session_start();

					$resultC = mysqli_query($co, "SELECT idparent, motdepasse, login, idparent, idenfant, prenomenfant, nomenfant, soldeinitial, nomparent, nomcategorie FROM categorie NATURAL JOIN enfant NATURAL JOIN compteenfant NATURAL JOIN parent WHERE idenfant = '".$_POST['selectModifC']."'") or die("Impossible d'exécuter la requête des enfants.");

					$resultS = mysqli_query($co, "SELECT solde FROM voirsoldechaqueenfant WHERE idenfant = '".$_POST['selectModifC']."'") or die("Impossible d'exécuter la requête des voirsoldechaqueenfant.");
					if(mysqli_num_rows($resultS) == 0) $soldeactuel = 0;
					else{
						$tableau = mysqli_fetch_array($resultS);
						$soldeactuel = $tableau['solde'];
					}

					$tableau = mysqli_fetch_array($resultC);
					$prenomenfant = $tableau['prenomenfant'];
					$nomenfant = $tableau['nomenfant'];
					$login = $tableau['login'];
					$motdepasse = $tableau['motdepasse'];
					$nomparent = $tableau['nomparent'];
					$soldeinitial = $tableau['soldeinitial'];
					$nomcategorie = $tableau['nomcategorie'];
					$_SESSION['idenfant'] = $_POST['selectModifC'];
					$_SESSION['idparent'] = $tableau['idparent']; ?>

					<p>Nouveau prénom de l'enfant</p><input type='text' name='nomEModif' class='champ'
						value=<?php echo $prenomenfant; ?> ></input><br>
					<p>Nouveau Nom de l'enfant</p><input type='text' name='prenomEModif' class='champ'
						value=<?php echo $nomenfant; ?> ></input><br>
					<p>Nouveau Nom du parent</p><input type='text' name='nomPModif' class='champ'
						value=<?php echo $nomparent; ?> ></input><br>
					<p>Nouveau Mot de passe</p><input type='text' name='mdpassePModif' class='champ'
						value=<?php echo $motdepasse; ?> ></input><br>
					<p>Nouveau login</p><input type='text' name='loginPModif' class='champ'
						value=<?php echo $login; ?> ></input><br>
					<p>Ajouter au solde de l'enfant (solde actuel = <?php echo $soldeactuel; ?>)</p>
					<input type='text' name='soldeEModif' class='champ'
						value=0></input><br>

					<p>Nouvelle catégorie</p>

					<?php include('../modeles/bd.php');
					$resultCat = mysqli_query($co, "SELECT nomcategorie FROM categorie ORDER BY idcategorie") or die("Impossible d'exécuter la requête des categorie.");

					echo "<select name ='selectcategorie' size='".mysqli_num_rows($resultCat)."'>";
						while($row = mysqli_fetch_array($resultCat)){
							//préselectionner la catégorie
							if($row['nomcategorie'] == $nomcategorie){ $selected='selected';}
							else{ $selected = '';}

							echo "<option ".$selected.">".$row['nomcategorie'].'</option>';
						} ?>
						</select><br>

					<br><input type="submit" value="Modifier" id="bouton">
					</form>
				</fieldset>
	<?php } ?> <div class="boutonB"><form method="post" action="afficheCompteEnfant.php">
	<input type="submit" value="Retour aux comptes" id="bouton">
	</form></div></div>

</body>
</html>