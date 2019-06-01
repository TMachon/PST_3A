<?php
	class Answer_Tutoriel{
        private $connexion; // connexion à la BD MySQL du serveur
        private $contents;
        private $author;
        private $id_tutoriel;

		public function __construct(){
	    	include('bd.php');

            $this->connexion = $co;
            $this->contents = func_get_arg(0);
            $this->author = func_get_arg(1);
            $this->id_tutoriel = func_get_arg(2);
        }
    
        public function insert_answer($session){
            if(!empty($this->contents) && !empty($session)){
                $stmt = $this->connexion->prepare("INSERT INTO ANSWER_TUTORIAL (id_SURFER, id_TUTORIAL, dateResponse_T, contentsAT) VALUES
                (?, ?, ?, ?)");
                $stmt->bind_param('ssss', $this->author, $this->id_tutoriel, date('Y-m-d H:i:s'), $this->contents);
                $stmt->execute();
                $resultinsert_answer = $stmt->get_result();
            }
        }
    }
?>