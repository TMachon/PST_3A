<?php

	// On démarre la session
	session_start();

	header("Location:vue.php");
	if(!empty($_POST['text1'])) $_SESSION['texte'] = "Texte saisie !";
	else $_SESSION['texte'] = "Texte vide !";
?>