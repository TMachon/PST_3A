<?php
	include('../model/bd.php');
	include('../model/membre.php');
	include('../model/forum.php');

	header('Location:../view/pageForum.php?id_for='.$_GET['id_for']); // On renvoie tout de suite sur le forum actif

	if(!empty($_GET['id_for']) && !empty($_SESSION['id_SURFER'])){

		$stmt = $co->prepare('SELECT * FROM LIKE_FORUM WHERE id_SURFER = ? AND id_FORUM = ?');
		$stmt->bind_param('dd', $_SESSION['id_SURFER'], $_GET['id_for']);
		$stmt->execute();
		$resultLikeForum = $stmt->get_result();
		$stmt->close();

		$NewForum = new Forum();
		if (mysqli_num_rows($resultLikeForum) == 0) $NewForum->like_forum($_SESSION['id_SURFER'], $_GET['id_for']);
		else $NewForum->dislike_forum($_SESSION['id_SURFER'], $_GET['id_for']);
	}
?>