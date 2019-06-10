<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if( !empty($_POST['ActualPassword']) && !empty($_POST['NewPassword']) && !empty($_POST['ConfirmedNewPassword'])
		&& $_POST['NewPassword'] == $_POST['ConfirmedNewPassword']){

		$stmt = $co->prepare('SELECT mail FROM SURFER WHERE mail = ? AND password = ?');
		$stmt->bind_param('ss', htmlspecialchars($_SESSION['mail']), htmlspecialchars($_POST['ActualPassword']));
		$stmt->execute();
		$resultSurfer = $stmt->get_result();

		// on vérifie que le mot de passe est correct
		if (mysqli_num_rows($resultSurfer) == 0) $exist = false;//
		else $exist = true;

		if ($exist){
			header('Location:../view/infos_persos.php');

			$Membre = new Surfer(htmlspecialchars($_SESSION['mail']), htmlspecialchars($_SESSION['prenom']), htmlspecialchars($_SESSION['nom']));
			$Membre->modifPassword(htmlspecialchars($_POST['NewPassword']));
			
		}else header('Location:../view/infos_persos.php');
		
	}else header('Location:../view/infos_persos.php');
?>