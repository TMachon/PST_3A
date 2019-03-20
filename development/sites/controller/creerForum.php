<?php

	include('../model/bd.php');
	include('../model/membre.php');
	include('../model/forum.php');

	if(!empty($_POST['title_forum_create']) && !empty($_POST['content_forum_create'])){

		$title_forum_create = addslashes(htmlspecialchars($_POST['title_forum_create']));
		$content_forum_create = addslashes(htmlspecialchars($_POST['content_forum_create']));

		// deux titres egaux ne sont pas autorisés
		$resultTitle = mysqli_query($co, "SELECT title_forum FROM FORUM WHERE title_forum = '".$title_forum_create."'") or die("Impossible d'exécuter la requête de verification du titre forum.");

		if (mysqli_num_rows($resultTitle) == 0){
			header('Location:../view/forumCree.php');

			$newForum = new Forum($title_forum_create, $content_forum_create);
			$newForum->creation($_SESSION['id_SURFER']);
		}
		else{
			header('Location:../view/creerForum.php');
		}
	}
		else header('Location:../view/creerForum.php');
?>