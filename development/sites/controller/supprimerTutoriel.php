<?php
	include('../model/tutoriel.php');

	header('Location:../view/tutos_persos.php');
	if(!empty($_GET['id_tuto'])){
		$TutorialToDelete = new Tutoriel();
		$TutorialToDelete->suppression($_GET['id_tuto']);
	}else header('Location:../view/tutos_persos.php');
?>