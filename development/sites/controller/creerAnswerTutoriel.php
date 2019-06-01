<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/answer_tutoriel.php');

	$id_tuto = $_GET['id_tuto'];
	$url = 'Location:../view/pageTutoriel.php?id_tuto='.$id_tuto;
	header($url);
	$newAnswerTutoriel = new Answer_Tutoriel($_POST['addComment'], $_SESSION['id_SURFER'], $id_tuto);
	$newAnswerTutoriel->insert_answer($_SESSION);
?>