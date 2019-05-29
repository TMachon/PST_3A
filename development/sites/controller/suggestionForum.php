<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/suggestion_forum.php');

    $id_for = $_GET['id_for'];
	$url = 'Location:../view/conf_suggestion_forum.php?id_for=' . $id_for;

	header($url);
	
	$newSuggestionForum = new Suggestion_Forum($id_for,$_SESSION['id_SURFER'],$_POST['Suggestion']);
	$newSuggestionForum->insert_suggestion($_SESSION);
?>