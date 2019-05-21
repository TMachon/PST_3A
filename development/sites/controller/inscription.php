<?php
	include('../model/bd.php');
	include('../model/membre.php');

	if(!empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])
		&& preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,3}$#i', $_POST['mail'])){

		$stmt = $co->prepare('SELECT mail FROM SURFER WHERE mail = ?');
		$stmt->bind_param('s', htmlspecialchars($_POST['mail'])); // 's' specifies the variable type => 'string'
		$stmt->execute();
		$resultSurfer = $stmt->get_result();

		$stmt = $co->prepare('SELECT mail FROM ADMIN WHERE mail = ?');
		$stmt->bind_param('s', htmlspecialchars($_POST['mail'])); // 's' specifies the variable type => 'string'
		$stmt->execute();
		$resultAdmin = $stmt->get_result();

		// on vérifie si le mail existe déjà ou pas
		if (mysqli_num_rows($resultSurfer) == 0 && mysqli_num_rows($resultAdmin) == 0) $exist = false;
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

			$newMembre = new Surfer(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom']));
			$newMembre->inscription(htmlspecialchars($_POST['password']), $idAvatar);
			$newMembre->connexion();
			
		}else header('Location:../view/pageInscription.php');
		
	}else header('Location:../view/pageInscription.php');
?>