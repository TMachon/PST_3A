<?php
	include('../model/bd.php');
    include('../model/membre.php');
    include('../model/suggestion_tutoriel.php');

	if (!empty($_POST['Suggestion'])){
		header('Location:../view/conf_suggestion.php');
		
		$newSuggestionTutoriel = new Suggestion_Tutoriel($_GET['id_tuto'], $_SESSION['id_SURFER'], htmlspecialchars($_POST['Suggestion']));
		$newSuggestionTutoriel->insert_suggestion();
	}
	else header('Location:../view/pageSuggestionTutoriel.php?id_tuto='.$_GET['id_tuto']);
?>