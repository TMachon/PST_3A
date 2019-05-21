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

			$stmt = $co->prepare('SELECT mail FROM ADMIN WHERE mail = ?');
			$stmt->bind_param('s', func_get_arg(0));
			$stmt->execute();
			$resultAdmin = $stmt->get_result();

			if (mysqli_num_rows($resultAdmin) == 0) $this->statutAdmin = false;
			else $this->statutAdmin = true;

	        $this->mail = func_get_arg(0);
	        $this->prenom = func_get_arg(1);
	        $this->nom = func_get_arg(2);
	        $this->id_SURFER = func_get_arg(3);
			$this->connexion = $co;
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
			include('bd.php'); // accès à la BD MySQL

			$stmt = $co->prepare('INSERT INTO SURFER (mail, password, lastname, firstname, id_IMAGE_ACCOUNT) VALUES (?, ?, ?, ?, ?)');
			$stmt->bind_param('ssssd', $this->mail, $password, $this->nom, $this->prenom, $idAvatar);
			$stmt->execute();
			$resultInsertSurfer = $stmt->get_result();

			$this->id_SURFER = mysqli_insert_id($co);
		}

		public function modifInfosPersos($nom, $prenom, $email){
			include('bd.php'); // accès à la BD MySQL

			$stmt = $co->prepare('UPDATE SURFER SET firstname = ?, lastname = ?, mail = ? WHERE id_SURFER = ?');
			$stmt->bind_param('sssd', $prenom, $nom, $email, $_SESSION['id_SURFER']);
			$stmt->execute();
			$resultModifInfosPersos = $stmt->get_result();
			
			$_SESSION['mail'] = $email;
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
		}

		public function modifPassword($NewPassword){
			include('bd.php'); // accès à la BD MySQL

			$stmt = $co->prepare('UPDATE SURFER SET password = ? WHERE id_SURFER = ?');
			$stmt->bind_param('sd', $NewPassword, $_SESSION['id_SURFER']);
			$stmt->execute();
			$resultModifPassword = $stmt->get_result();
		}
	}
?>