<?php include('../model/membre.php');
	header('Location:../view/pageConnexion.php');
	$decoMembre = new Surfer($_SESSION['mail']);
	$decoMembre->deconnexion();
?>