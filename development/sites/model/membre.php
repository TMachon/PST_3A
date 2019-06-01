<?php
	session_start(); // ouvre une session pour l'utilisateur sur toutes les pages du site

	class Surfer{
		private $connexion; // connexion à la BD MySQL du serveur
		private $mail;
		private $prenom;
		private $nom;
		private $id_SURFER;
		private $statutAdmin;

		public function __construct(){
			include('bd.php'); // accès à la BD MySQL
			$this->connexion = $co;

			$stmt = $this->connexion->prepare('SELECT mail FROM ADMIN WHERE mail = ?');
			$stmt->bind_param('s', func_get_arg(0));
			$stmt->execute();
			$resultAdmin = $stmt->get_result();

			if (mysqli_num_rows($resultAdmin) == 0) $this->statutAdmin = false;
			else $this->statutAdmin = true;

	        $this->mail = func_get_arg(0);
	        $this->prenom = func_get_arg(1);
	        $this->nom = func_get_arg(2);
	        $this->id_SURFER = func_get_arg(3);
	    }

		public function modifier($newmail){
			$this->mail = $newmail;
			$_SESSION['mail'] = $this->mail;
		}

		public function connexion(){
			$_SESSION['mail'] = $this->mail;
			$_SESSION['prenom'] = $this->prenom;
			$_SESSION['nom'] = $this->nom;
			$_SESSION['id_SURFER'] = $this->id_SURFER;
			$_SESSION['statutAdmin'] = $this->statutAdmin;
		}

		public function deconnexion(){
			session_unset();
			mysqli_close($this->connexion);
		}

		public function inscription($password, $idAvatar){
			$stmt = $this->connexion->prepare('INSERT INTO SURFER (mail, password, lastname, firstname, id_IMAGE_ACCOUNT) VALUES (?, ?, ?, ?, ?)');
			$stmt->bind_param('ssssd', $this->mail, $password, $this->nom, $this->prenom, $idAvatar);
			$stmt->execute();
			$resultInsertSurfer = $stmt->get_result();
			$stmt->close();

			$this->id_SURFER = mysqli_insert_id($this->connexion);
		}

		public function modifInfosPersos($avatar){
			$stmt = $this->connexion->prepare('UPDATE SURFER SET firstname = ?, lastname = ?, mail = ? WHERE id_SURFER = ?');
			$stmt->bind_param('sssd', $this->prenom, $this->nom, $this->mail, $_SESSION['id_SURFER']);
			$stmt->execute();
			$resultModifInfosPersos = $stmt->get_result();
			$stmt->close();
			
			$_SESSION['mail'] = $this->mail;
			$_SESSION['prenom'] = $this->prenom;
			$_SESSION['nom'] = $this->nom;

			// On modifie l'avatar s'il a été renseigné dans le formulaire
			if (!getimagesize($avatar) == false) {
		        $image = addslashes($avatar);
		        $image = file_get_contents($image);
		        $image = base64_encode($image);

		        $stmt = $this->connexion->prepare('SELECT id_IMAGE_ACCOUNT FROM SURFER WHERE id_SURFER = ?');
				$stmt->bind_param('d', $_SESSION['id_SURFER']);
				$stmt->execute();
				$resultModifInfosPersos = $stmt->get_result();
				$row = mysqli_fetch_assoc($resultModifInfosPersos);
				$id_image_account = $row['id_IMAGE_ACCOUNT'];
				$stmt->close();
				
		        $result = mysqli_query($this->connexion, "UPDATE IMAGEACCOUNT SET picture = '$image' WHERE id_IMAGE_ACCOUNT = $id_image_account")
		        or die("Impossible d'inserer image blob avatar modifié.");
		    }
		}

		public function modifPassword($NewPassword){
			$stmt = $this->connexion->prepare('UPDATE SURFER SET password = ? WHERE id_SURFER = ?');
			$stmt->bind_param('sd', $NewPassword, $_SESSION['id_SURFER']);
			$stmt->execute();
			$resultModifPassword = $stmt->get_result();
			$stmt->close();
		}
	}
?>