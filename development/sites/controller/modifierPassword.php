<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if( !empty($_POST['ActualPassword']) && !empty($_POST['NewPassword']) && !empty($_POST['ConfirmedNewPassword'])
		&& $_POST['NewPassword'] == $_POST['ConfirmedNewPassword']){

		$ActualPassword = addslashes(htmlspecialchars($_POST['ActualPassword']));			
		$NewPassword = $_POST['NewPassword'];
		$ConfirmedNewPassword = htmlspecialchars($_POST['ConfirmedNewPassword']);

		// on verirife que le mot de passe correspond bien à celui associé au mail dans la session
		$resultSurfer = mysqli_query($co, "SELECT mail FROM SURFER WHERE mail = '".$_SESSION['mail']."' AND password = '".$ActualPassword."'") or die("Impossible d'exécuter la requête de vérification modif password.");

		// on vérifie que le mot de passe est correct
		if (mysqli_num_rows($resultSurfer) == 0) $exist = false;//
		else $exist = true;

		if ($exist){
			header('Location:../view/infos_persos.php');

			$Membre = new Surfer($_SESSION['mail'], $_SESSION['prenom'], $_SESSION['nom']);
			$Membre->modifPassword($NewPassword);
			
		}else header('Location:../view/infos_persos.php');
		
	}else header('Location:../view/infos_persos.php');
?>