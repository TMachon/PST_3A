<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/tutoriel.php');

	if (isset($_POST['choix_signalement'])){
		header('Location:../view/conf_signalement.php');
	
		$signalement = new Tutoriel();
		$signalement->signaler($_SESSION['id_SURFER'], $_GET['id_tuto'], $_POST['choix_signalement']);
	}
	else header('Location:../view/pageSignalerTuto.php?id_tuto='.$_GET['id_tuto']);
?>