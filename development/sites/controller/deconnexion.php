<?php include('../model/membre.php');
	header('Location:../view/pageConnexion.php');
	$decoMembre = new Surfer(htmlspecialchars($_SESSION['mail']));
	$decoMembre->deconnexion();
?>