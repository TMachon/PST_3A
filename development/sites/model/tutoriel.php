<?php
	class Tutoriel{
		private $connexion; // connexion à la BD MySQL du serveur
		private $title_tutoriel;
		private $contents;

		public function __construct(){
	    	include('bd.php');

	        $this->title_tutoriel = func_get_arg(0);
	        $this->contents = func_get_arg(1);
			$this->connexion = $co;
	    }

		public function suppression($idTutorial){
			$stmt = $this->connexion->prepare('DELETE FROM SUGGESTION_TUTORIAL WHERE id_TUTORIAL = ?');
			$stmt->bind_param('d', $idTutorial);
			$stmt->execute();
			$resultDeleteTutoriel = $stmt->get_result();
			$stmt->close();

			$stmt = $this->connexion->prepare('DELETE FROM LIKE_TUTORIAL WHERE id_TUTORIAL = ?');
			$stmt->bind_param('d', $idTutorial);
			$stmt->execute();
			$resultDeleteTutoriel = $stmt->get_result();
			$stmt->close();

			$stmt = $this->connexion->prepare('DELETE FROM ANSWER_TUTORIAL WHERE id_TUTORIAL = ?');
			$stmt->bind_param('d', $idTutorial);
			$stmt->execute();
			$resultDeleteTutoriel = $stmt->get_result();
			$stmt->close();

			$stmt = $this->connexion->prepare('DELETE FROM TUTORIAL WHERE id_TUTORIAL = ?');
			$stmt->bind_param('d', $idTutorial);
			$stmt->execute();
			$resultDeleteTutoriel = $stmt->get_result();
			$stmt->close();
		}

		public function creation($id_SURFER){
			$stmt = $this->connexion->prepare('INSERT INTO TUTORIAL (id_SURFER, contents, dateCreation, title_tutoriel) VALUES (?, ?, ?, ?)');
			$stmt->bind_param('dsss', $_SESSION['id_SURFER'], $this->contents, date("Y-m-d H:i:s"), $this->title_tutoriel);
			$stmt->execute();
			$resultInsertTutoriel = $stmt->get_result();
			$stmt->close();
		}

		public function like_tutoriel($id_SURFER, $idTutoriel){
			$stmt = $this->connexion->prepare('INSERT INTO LIKE_TUTORIAL (id_SURFER, id_TUTORIAL) VALUES (?, ?)');
			$stmt->bind_param('ds', $id_SURFER, $idTutoriel);
			$stmt->execute();
			$resultLikeTutorial = $stmt->get_result();
			$stmt->close();

			$stmt = $this->connexion->prepare('UPDATE TUTORIAL SET likes = likes+1 WHERE id_TUTORIAL = ?');
			$stmt->bind_param('s', $idTutoriel);
			$stmt->execute();
			$resultIncLikes = $stmt->get_result();
			$stmt->close();
		}

		public function dislike_tutoriel($id_SURFER, $idTutoriel){
			$stmt = $this->connexion->prepare('DELETE FROM LIKE_TUTORIAL WHERE id_SURFER = ? AND id_TUTORIAL = ?');
			$stmt->bind_param('ds', $id_SURFER, $idTutoriel);
			$stmt->execute();
			$resultDisLikeTutorial = $stmt->get_result();
			$stmt->close();

			$stmt = $this->connexion->prepare('UPDATE TUTORIAL SET likes = likes-1 WHERE id_TUTORIAL = ?');
			$stmt->bind_param('s', $idTutoriel);
			$stmt->execute();
			$resultIncDislikes = $stmt->get_result();
			$stmt->close();
		}
	}
?>