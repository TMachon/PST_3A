<?php
	include('../model/tutoriel.php');

	header('Location:../view/tutos_persos.php');
	$TutorialToDelete = new Tutoriel();
	$TutorialToDelete->suppression($_GET['id_tuto']);
?>