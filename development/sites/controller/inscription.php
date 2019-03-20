<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if(!empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])
		&& preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,3}$#i', $_POST['mail'])){

		$mail = addslashes(htmlspecialchars($_POST['mail']));			
		$password = $_POST['password'];
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);

		// on verirife l'unicité du nouveau membre
		$resultSurfer = mysqli_query($co, "SELECT mail FROM SURFER WHERE mail = '".$mail."' AND password = '".$password."'") or die("Impossible d'exécuter la requête de vérification inscription SURFER.");
		$resultAdmin = mysqli_query($co, "SELECT mail FROM ADMIN WHERE mail = '".$mail."' AND password = '".$password."'") or die("Impossible d'exécuter la requête de vérification inscription ADMIN.");

		// on vérifie si l'utilisateur existe déjà ou pas
		if (mysqli_num_rows($resultSurfer) == 0) $exist = false;
		else $exist = true;

		// traitement en fonction de l'existence
		if (!$exist){
			header('Location:../view/accueil.php');

			$idAvatar = 1;

			if (!getimagesize($_FILES['avatar']['tmp_name']) == false) { // si l'utilisateur a renseigné une photo de profil
		        $image = addslashes($_FILES['avatar']['tmp_name']);
		        $name  = addslashes($_FILES['avatar']['tmp_name']);
		        $image = file_get_contents($image);
		        $image = base64_encode($image);

		        $result = mysqli_query($co, "INSERT INTO IMAGEACCOUNT (picture) VALUES ('$image')") or die("Impossible d'inserer image blob.");
		        $idAvatar = mysqli_insert_id($co);
		    }

			$newMembre = new Surfer($mail, $prenom, $nom);
			$newMembre->inscription($password, $idAvatar);
			$newMembre->connexion();
			
		}else header('Location:../view/pageInscription.php');
		
	}else header('Location:../view/pageInscription.php');
?>