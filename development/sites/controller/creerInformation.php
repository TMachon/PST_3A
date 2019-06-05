<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/Demande_infos.php');

	$url = 'Location:../view/messageEnvoye.php';

	header($url);
	
	$newDemande = new Demande_infos();
	$newDemande->creation($_POST['demandeInfo']);
?>