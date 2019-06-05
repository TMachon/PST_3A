<?php
	class Suggestion_Tutoriel{
        private $connexion; // connexion à la BD MySQL du serveur
        private $contents;
        private $surfer;
        private $id_tutoriel;

		public function __construct(){
	    	include('bd.php');

            $this->connexion = $co;
            $this->contents = func_get_arg(2);
            $this->surfer = func_get_arg(1);
            $this->id_tutoriel = func_get_arg(0);
        }
    
        public function insert_suggestion(){
            if(!empty($this->contents)){
                $stmt = $this->connexion->prepare("INSERT INTO SUGGESTION_TUTORIAL (id_SURFER, id_TUTORIAL, suggestion_tutorial) VALUES (?, ?, ?)");
                $stmt->bind_param('dds', $this->surfer, $this->id_tutoriel, $this->contents);
                $stmt->execute();
                $resultinsert_suggestion = $stmt->get_result();
                $stmt->close();
            }
        }
    }
?>