<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/answer_forum.php');

	header('Location:../view/pageForum.php?id_for='.$_GET['id_for']);	
	$newAnswerForum = new Answer_Forum(htmlspecialchars($_POST['addComment']), $_SESSION['id_SURFER'], $_GET['id_for']);
	$newAnswerForum->insert_answer($_SESSION);
?>