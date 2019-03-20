<?php include('../modeles/bd.php');
	header('Location:../vues/confirmViderBD.php');

	$resultMail = mysqli_query($co, "SELECT mail, lastname, firstname FROM ADMIN ") or die("Impossible d'exécuter la requête des mails admin.");
	while($row = mysqli_fetch_assoc($resultMail)) {
	    $to      = $row['mail'];
	    $subject = 'Suppression Tutoriels';
	    $message =
		'Bonjour '.$row['firstname'].' '.strtoupper($row['lastname']).' !

		Tous les tutoriels de CommentFaire.fr ont été réinitialisés ainsi que tous leurs commentaires.

		A bientôt !';
	    $headers = 'From: commentfaire.esiea@gmail.com';
	    mail($to, $subject, $message, $headers);
	}

	$resultMailSurfer = mysqli_query($co, "SELECT mail, lastname, firstname, title_tutorial FROM SURFER NATURAL JOIN TUTORIAL") or die("Impossible d'exécuter la requête des mails surfer.");
	while($row = mysqli_fetch_assoc($resultMailSurfer)) {
	    $to      = $row['mail'];
	    $subject = 'Suppression Tutoriels';
	    $message =
		'Bonjour '.$row['firstname'].' '.strtoupper($row['lastname']).' !

		Votre tutoriel '.$row['title_tutorial'].' a été supprimé ainsi que tous ses commentaires. Pour plus d\'informations, veuillez nous contacter à commentfaire.esiea@gmail.com .

		L\'équipe de CommentFaire.fr !';
	    $headers = 'From: commentfaire.esiea@gmail.com';
	    mail($to, $subject, $message, $headers);
	}

	$resultTruncate = mysqli_query($co, "TRUNCATE ANSWER_TUTORIAL") or die("Impossible d'exécuter la requête de reinitialisation de answer_tutorial.");
	$resultTruncate = mysqli_query($co, "TRUNCATE TUTORIAL") or die("Impossible d'exécuter la requête de reinitialisation de tutorial.");
?>