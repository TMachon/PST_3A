<?php include('../modeles/bd.php'); session_start();
	
	if(!empty($_POST['selectcategorie']) && !empty($_POST['nomEModif']) && !empty($_POST['prenomEModif']) && 
	   !empty($_POST['soldeEModif']) && !empty($_POST['loginPModif']) && !empty($_POST['mdpassePModif']) &&
	   !empty($_POST['nomPModif'])){
		//header('Location:../vues/afficheCompteEnfant.php');

		//recherche de la catégorie en fonction du select

		$resulCat = mysqli_query($co, "SELECT idcategorie FROM categorie WHERE nomcategorie = '".$_POST['selectcategorie']."'") or die("Impossible d'exécuter la requête de categorie.");

		$tableau = mysqli_fetch_array($resulCat);
		$cat = $tableau['idcategorie'];	

		//mise à jour
		$resultMAJE = mysqli_query($co, "UPDATE enfant
		SET nomenfant = '".$_POST['nomEModif']."', prenomenfant = '".$_POST['prenomEModif']."',
		idcategorie = '".$cat."' WHERE idenfant = '".$_SESSION['idenfant']."'") or die("Impossible d'exécuter la requête de MAJE.");

		$resultMAJP = mysqli_query($co, "UPDATE parent
		SET nomparent = '".$_POST['nomPModif']."', login = '".$_POST['loginPModif']."',
		motdepasse = '".$_POST['mdpassePModif']."'
		WHERE idparent = '".$_SESSION['idparent']."'") or die("Impossible d'exécuter la requête de MAJP.");

		$resultMAJCE = mysqli_query($co, "UPDATE compteenfant
		SET soldeinitial = (soldeinitial + '".$_POST['soldeEModif']."')
		WHERE idenfant = '".$_SESSION['idenfant']."'") or die("Impossible d'exécuter la requête de MAJCE.");

	}else header('Location:../vues/pageModifierCompte.php');
	
?>