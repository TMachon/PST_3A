<?php
	include('../model/bd.php');
	include('../model/membre.php');

	header('Location:../view/infos_persos.php');

	if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])){

		$nom = htmlspecialchars($_POST['nom']);		
		$prenom = htmlspecialchars($_POST['prenom']);
		$email = htmlspecialchars($_POST['mail']);

		$Membre = new Surfer($_SESSION['mail'], $_SESSION['prenom'], $_SESSION['nom']);
		$Membre->modifInfosPersos($_FILES['avatar']['tmp_name']);	
	}
?>