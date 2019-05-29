<?php
	include('../model/Demande_infos.php');

	header('Location:../view/informations.php');
	$Demande_infosObject = new Demande_infos($_GET['id_demande']);
	$Demande_infosObject->suppression();
?>