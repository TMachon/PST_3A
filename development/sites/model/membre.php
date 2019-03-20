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

	    	// permet aux administrateurs d'accéder à d'autres fonctionnalités
    		$resultAdmin = mysqli_query($co, "SELECT mail FROM ADMIN WHERE mail = '".func_get_arg(0)."'") or die("Impossible d'exécuter la requête de verification de l'admin.");

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

			//insertion du nouveau compte surfer
			$resultInsertSurfer = mysqli_query($co, "INSERT INTO SURFER (mail, password, lastname, firstname, id_IMAGE_ACCOUNT) VALUES
			('".$this->mail."','".$password."','".$this->nom."','".$this->prenom."', ".$idAvatar.")") or die("Impossible d'effectuer l'insertion dans compte SURFER.");

			$this->id_SURFER = mysqli_insert_id($co);
		}

		public function modifPassword($NewPassword){
			include('bd.php'); // accès à la BD MySQL

			// modification du mot de passe
			$resultModifPassword = mysqli_query($co, "UPDATE SURFER SET password = '".$NewPassword."' WHERE mail = '".$_SESSION['mail']."'") or die("Impossible d'effectuer la modif du password dans SURFER.");
		}
	}
?>