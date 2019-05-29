<?php
	include('../model/forum.php');

	header('Location:../view/forums_persos.php');
	$ForumToDelete = new Forum();
	$ForumToDelete->suppression($_GET['id_for']);
?>