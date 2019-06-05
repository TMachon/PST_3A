<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/suggestion_forum.php');

	header('Location:../view/conf_suggestion.php');
	
	$newSuggestionForum = new Suggestion_Forum($_GET['id_for'], $_SESSION['id_SURFER'], $_POST['Suggestion']);
	$newSuggestionForum->insert_suggestion();
?>