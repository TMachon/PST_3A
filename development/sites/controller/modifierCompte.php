<?php
	include('../model/bd.php');
	include('../model/membre.php');

	header('Location:../view/infos_persos.php');

	if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])){
		$Membre = new Surfer(htmlspecialchars($_SESSION['mail']), htmlspecialchars($_SESSION['prenom']), htmlspecialchars($_SESSION['nom']));
		$Membre->modifInfosPersos($_FILES['avatar']['tmp_name']);	
	}
?>