<?php
	class Demande_infos{
		private $connexion; // connexion à la BD MySQL du serveur
		private $id_Information;

		public function __construct(){
	    	include('bd.php');
	        $this->id_Information = func_get_arg(0);
			$this->connexion = $co;
	    }

		public function suppression(){
			$stmt = $this->connexion->prepare('DELETE FROM INFORMATIONS WHERE id_INFORMATIONS = ?');
			$stmt->bind_param('d', $this->id_Information);
			$stmt->execute();
			$resultDeleteDemande = $stmt->get_result();
			$stmt->close();
		}

		public function creation(String $content){
				$stmt = $this->connexion->prepare("INSERT INTO INFORMATIONS (demande, id_SURFER, dateDemande) VALUES
				(?, ?, ?)");
                $stmt->bind_param('sds',$content,$_SESSION['id_SURFER'], date('Y-m-d H:i:s'));
                $stmt->execute();
                $resultinsert_info = $stmt->get_result();
			//PINSARD

		}
	}
?>