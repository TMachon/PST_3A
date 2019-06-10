<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/answer_tutoriel.php');

	header('Location:../view/pageTutoriel.php?id_tuto='.$_GET['id_tuto']);
	$newAnswerTutoriel = new Answer_Tutoriel(htmlspecialchars($_POST['addComment']), $_SESSION['id_SURFER'], $_GET['id_tuto']);
	$newAnswerTutoriel->insert_answer($_SESSION);
?>