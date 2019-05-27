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
            echo "Entrée dans la fonction \n";
            var_dump($this->contents);
            if(!empty($this->contents) && !empty($session)){
                echo "Entrée dans la boucle \n";
                mysqli_query($this->connexion,"INSERT INTO ANSWER_TUTORIEL (id_SURFER, id_TUTORIEL, dateResponse_F, contentsAF) VALUES
                (" . $this->author . ", " . $this->id_tutoriel . ", '" . date('Y-m-d H:i:s') . "', '" . addslashes($this->contents) . "')");
            }
        }
    }
?>