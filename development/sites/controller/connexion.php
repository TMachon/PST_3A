<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if(!empty($_POST['mail']) && !empty($_POST['password'])){

		$stmt = $co->prepare('SELECT id_SURFER, mail, password, firstname, lastname
			FROM SURFER WHERE mail = ? AND password = ?');
		$stmt->bind_param('ss', htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['password'])); // 's' specifies the variable type => 'string'
		$stmt->execute();
		$resultSurfer = $stmt->get_result();

		if (mysqli_num_rows($resultSurfer) == 0)
			header('Location:../view/pageConnexion.php');
		else{
			header('Location:../view/accueil.php');
			$row = mysqli_fetch_assoc($resultSurfer);
			$newMembre = new Surfer(htmlspecialchars($_POST['mail']), $row['firstname'], $row['lastname'], $row['id_SURFER']);
			$newMembre->connexion();
		}
	}else header('Location:../view/pageConnexion.php');
?>