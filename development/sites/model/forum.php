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

		public function suppression($id_FORUM){
			include('bd.php');

			$stmt = $co->prepare('DELETE FROM SUGGESTION_FORUM WHERE id_FORUM = ?');
			$stmt->bind_param('d', $id_FORUM);
			$stmt->execute();
			$resultDeleteForum = $stmt->get_result();
			$stmt->close();

			$stmt = $co->prepare('DELETE FROM LIKE_FORUM WHERE id_FORUM = ?');
			$stmt->bind_param('d', $id_FORUM);
			$stmt->execute();
			$resultDeleteForum = $stmt->get_result();
			$stmt->close();

			$stmt = $co->prepare('DELETE FROM ANSWER_FORUM WHERE id_FORUM = ?');
			$stmt->bind_param('d', $id_FORUM);
			$stmt->execute();
			$resultDeleteForum = $stmt->get_result();
			$stmt->close();

			$stmt = $co->prepare('DELETE FROM FORUM WHERE id_FORUM = ?');
			$stmt->bind_param('d', $id_FORUM);
			$stmt->execute();
			$resultDeleteForum = $stmt->get_result();
			$stmt->close();
		}

		public function creation($id_SURFER){
			include('bd.php');

			$stmt = $co->prepare('INSERT INTO FORUM (id_SURFER, contents, dateCreation, title_forum)
				VALUES (?, ?, ?, ?)');
			$stmt->bind_param('dsss', $_SESSION['id_SURFER'], $this->contents, date("Y-m-d H:i:s"), $this->title_forum);
			$stmt->execute();
			$resultInsertForum = $stmt->get_result();
			$stmt->close();
		}

		public function like_forum($id_SURFER, $idForum){
			include('bd.php');

			$stmt = $co->prepare('INSERT INTO LIKE_FORUM (id_SURFER, id_FORUM) VALUES (?, ?)');
			$stmt->bind_param('ds', $id_SURFER, $idForum);
			$stmt->execute();
			$resultLikeForum = $stmt->get_result();
			$stmt->close();

			$stmt = $co->prepare('UPDATE FORUM SET likes = likes+1 WHERE id_FORUM = ?');
			$stmt->bind_param('s', $idForum);
			$stmt->execute();
			$resultIncLikes = $stmt->get_result();
			$stmt->close();
		}

		public function dislike_forum($id_SURFER, $idForum){
			include('bd.php');

			$stmt = $co->prepare('DELETE FROM LIKE_FORUM WHERE id_SURFER = ? AND id_FORUM = ?');
			$stmt->bind_param('ds', $id_SURFER, $idForum);
			$stmt->execute();
			$resultDisLikeForum = $stmt->get_result();
			$stmt->close();

			$stmt = $co->prepare('UPDATE FORUM SET likes = likes-1 WHERE id_FORUM = ?');
			$stmt->bind_param('s', $idForum);
			$stmt->execute();
			$resultIncDislikes = $stmt->get_result();
			$stmt->close();
		}
	}
?>