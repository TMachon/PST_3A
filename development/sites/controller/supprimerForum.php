<?php
	include('../model/forum.php');

	header('Location:../view/forums_persos.php');
	if(!empty($_GET['id_for'])){
		$ForumToDelete = new Forum();
		$ForumToDelete->suppression($_GET['id_for']);
	}else header('Location:../view/forums_persos.php');
?>