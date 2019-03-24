<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])){
		header('Location:../view/infos_persos.php');

		$nom = addslashes(htmlspecialchars($_POST['nom']));			
		$prenom = addslashes(htmlspecialchars($_POST['prenom']));
		$email = addslashes(htmlspecialchars($_POST['mail']));

		$Membre = new Surfer($_SESSION['mail'], $_SESSION['prenom'], $_SESSION['nom']);
		$Membre->modifInfosPersos($nom, $prenom, $email);
		
	}else header('Location:../view/infos_persos.php');
?>