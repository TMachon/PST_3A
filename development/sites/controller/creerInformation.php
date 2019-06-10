<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/Demande_infos.php');

	header('Location:../view/messageEnvoye.php');
	$newDemande = new Demande_infos();
	$newDemande->creation(htmlspecialchars($_POST['demandeInfo']));
?>