<?php
	class Suggestion_Forum{
        private $connexion; // connexion à la BD MySQL du serveur
        private $contents;
        private $surfer;
        private $id_forum;

		public function __construct(){
	    	include('bd.php');

            $this->connexion = $co;
            $this->contents = func_get_arg(2);
            $this->surfer = func_get_arg(1);
            $this->id_forum = func_get_arg(0);
        }
    
        public function insert_suggestion($session){
            if(!empty($this->contents) && !empty($session)){
                mysqli_query($this->connexion,"INSERT INTO SUGGESTION_FORUM (id_SURFER, id_FORUM,suggestion_forum) VALUES
                (" . $this->surfer . ", " . $this->id_forum . ", '" . addslashes($this->contents) . "')");
            }
        }
    }
?>