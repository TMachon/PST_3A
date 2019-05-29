<?php
	include('../model/bd.php');
	include('../model/membre.php');
	include('../model/tutoriel.php');

	header('Location:../view/pageTutoriel.php?id_tuto='.$_GET['id_tuto']);

	if(!empty($_GET['id_tuto']) && !empty($_SESSION['id_SURFER'])){

		$stmt = $co->prepare('SELECT * FROM LIKE_TUTORIAL WHERE id_SURFER = ? AND id_TUTORIAL = ?');
		$stmt->bind_param('dd', $_SESSION['id_SURFER'], $_GET['id_tuto']);
		$stmt->execute();
		$resultLikeTutotial = $stmt->get_result();
		$stmt->close();

		$NewTutoriel = new Tutoriel();
		if (mysqli_num_rows($resultLikeTutotial) == 0) $NewTutoriel->like_tutoriel($_SESSION['id_SURFER'], $_GET['id_tuto']);
		else $NewTutoriel->dislike_tutoriel($_SESSION['id_SURFER'], $_GET['id_tuto']);
	}
?>