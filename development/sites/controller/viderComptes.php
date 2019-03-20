<?php include('../modeles/bd.php');
	header('Location:../vues/confirmViderBD.php');

	$resultMail = mysqli_query($co, "SELECT mail, lastname, firstname FROM ADMIN ") or die("Impossible d'exécuter la requête des mails admin.");
	while($row = mysqli_fetch_assoc($resultMail)) {
	    $to      = $row['mail'];
	    $subject = 'Suppression Comptes Utilisateurs';
	    $message =
		'Bonjour '.$row['firstname'].' '.strtoupper($row['lastname']).' !

		Tous les comptes utilisateurs de CommentFaire.fr ont été réinitialisés.

		A bientôt !';
	    $headers = 'From: commentfaire.esiea@gmail.com';
	    mail($to, $subject, $message, $headers);
	}

	$resultMailSurfer = mysqli_query($co, "SELECT mail, lastname, firstname FROM SURFER ") or die("Impossible d'exécuter la requête des mails surfer.");
	while($row = mysqli_fetch_assoc($resultMailSurfer)) {
	    $to      = $row['mail'];
	    $subject = 'Suppression Comptes Utilisateurs';
	    $message =
		'Bonjour '.$row['firstname'].' '.strtoupper($row['lastname']).' !

		Votre compte utilisateur de CommentFaire.fr a été réinitialisé.

		L\'équipe de CommentFaire.fr !';
	    $headers = 'From: commentfaire.esiea@gmail.com';
	    mail($to, $subject, $message, $headers);
	}

	$resultTruncate = mysqli_query($co, "TRUNCATE SURFER") or die("Impossible d'exécuter la requête de reinitialisation des tables.");
?>