<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/suggestion_forum.php');

	if (!empty($_POST['Suggestion'])){
		header('Location:../view/conf_suggestion.php');
		
		$newSuggestionForum = new Suggestion_Forum($_GET['id_for'], $_SESSION['id_SURFER'], htmlspecialchars($_POST['Suggestion']));
		$newSuggestionForum->insert_suggestion();
	}
	else header('Location:../view/pageSuggestionForum.php?id_for='.$_GET['id_for']);
?>