<?php

	include('../model/bd.php');
	include('../model/membre.php');
	include('../model/forum.php');

	if(!empty($_POST['title_forum_create']) && !empty($_POST['content_forum_create'])){

		$stmt = $co->prepare('SELECT title_forum FROM FORUM WHERE title_forum = ?');
		$stmt->bind_param('s', htmlspecialchars($_POST['title_forum_create'])); // 's' specifies the variable type => 'string'
		$stmt->execute();
		$resultTitle = $stmt->get_result();
		$stmt->close();

		if (mysqli_num_rows($resultTitle) == 0){
			header('Location:../view/forums.php');

			$newForum = new Forum(htmlspecialchars($_POST['title_forum_create']), htmlspecialchars($_POST['content_forum_create']));
			$newForum->creation($_SESSION['id_SURFER']);
		}
		else{
			header('Location:../view/creerForum.php');
		}
	}
		else header('Location:../view/creerForum.php');
?>