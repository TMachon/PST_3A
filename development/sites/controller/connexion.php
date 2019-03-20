<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if(!empty($_POST['mail']) && !empty($_POST['password'])){

		$mail = addslashes(htmlspecialchars($_POST['mail']));
		$password = $_POST['password'];

		$resultSurfer = mysqli_query($co, "SELECT id_SURFER, mail, password, firstname, lastname FROM SURFER WHERE mail ='".$mail."' AND password = '".$password."'") or die("Impossible d'exécuter la requête de connexion du surfer.");

		// verifier si l'utilisateur est l'un des administrateurs
		$resultAdmin = mysqli_query($co, "SELECT mail, password FROM ADMIN WHERE mail = '".$mail."' AND password = '".$password."'")
		or die("Impossible d'exécuter la requête de connexion de l'admin.");

		if (mysqli_num_rows($resultAdmin) == 0 && mysqli_num_rows($resultSurfer) == 0)
			header('Location:../view/pageConnexion.php');
		else{
			header('Location:../view/accueil.php');
			$row = mysqli_fetch_assoc($resultSurfer);
			$newMembre = new Surfer($mail, $row['firstname'], $row['lastname'], $row['id_SURFER']);
			$newMembre->connexion();
		}
	}else header('Location:../view/pageConnexion.php');
?>