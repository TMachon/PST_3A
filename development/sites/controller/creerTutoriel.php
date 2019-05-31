<?php

	include('../model/bd.php');
	include('../model/membre.php');
	include('../model/tutoriel.php');

	if(!empty($_POST['title_tutoriel_create']) && !empty($_POST['content_tutoriel_create'])){

		$stmt = $co->prepare('SELECT title_tutorial FROM TUTORIAL WHERE title_tutorial = ?');
		$stmt->bind_param('s', htmlspecialchars($_POST['title_tutoriel_create']));
		$stmt->execute();
		$resultTitle = $stmt->get_result();
		$stmt->close();

		if (mysqli_num_rows($resultTitle) == 0){
			header('Location:../view/tutorielCree.php');

			$newTutoriel = new Tutoriel(htmlspecialchars($_POST['title_tutoriel_create']), htmlspecialchars($_POST['content_tutoriel_create']));
			$newTutoriel->creation($_SESSION['id_SURFER']);
		}
		else{
			header('Location:../view/creerTutoriel.php');
		}
	}
	else header('Location:../view/creerTutoriel.php');
?>