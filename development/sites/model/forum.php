<?php
	class Forum{
		private $connexion; // connexion à la BD MySQL du serveur

		private $title_forum;
		private $contents;

		public function __construct(){
	    	include('bd.php');

	        $this->title_forum = func_get_arg(0);
	        $this->contents = func_get_arg(1);
			$this->connexion = $co;
	    }

		public function suppression(){
			// TODO
		}

		public function creation($id_SURFER){
			include('bd.php');

			//insertion du nouveau forum
			$resultInsertForum = mysqli_query($co, "INSERT INTO FORUM (id_SURFER, contents, dateCreation, title_forum) VALUES
			(".$_SESSION['id_SURFER'].", '".$this->contents."', '".date("Y-m-d H:i:s")."', '".$this->title_forum."')") or die("Impossible d'effectuer l'insertion dans compte SURFER.");
		}
	}
?>