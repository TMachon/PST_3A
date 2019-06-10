<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/forum.php');

	if (isset($_POST['choix_signalement'])){
		header('Location:../view/conf_signalement.php');
	
		$signalement = new Forum();
		$signalement->signaler($_SESSION['id_SURFER'], $_GET['id_for'], $_POST['choix_signalement']);
	}
	else header('Location:../view/pageSignalerForum.php?id_for='.$_GET['id_for']);
?>