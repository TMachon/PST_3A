<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Forum</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	
	<body>
		<?php include('../model/membre.php'); include('components/banner_accueil.php'); // On inclut la bannière ?>
		
		<div class="contenu_body">

			<div class="composant_contenu_body">
				<?php
					include 'components/category_list.php';
				?>
			</div>

			<div class="composant_contenu_body">
				<?php
					$id_for = $_GET['id_for'];
					$result = mysqli_query($co, "SELECT * FROM FORUM WHERE id_FORUM = $id_for");
					$infos_forum = mysqli_fetch_assoc($result);

					$commentsrequest = mysqli_query($co, "SELECT firstname, lastname, contentsAF, dateResponse_F 
					FROM ANSWER_FORUM NATURAL JOIN SURFER WHERE id_FORUM = $id_for ORDER BY dateResponse_F");

					$date = substr($infos_forum['dateCreation'],0,10);
					$heure = substr($infos_forum['dateCreation'],11,18);
				?>
					<fieldset>
						<legend><?php echo $infos_forum['title_forum']; ?></legend>

							<div class="row">

								<?php
								$result = mysqli_query($co, "SELECT * FROM LIKE_FORUM WHERE id_FORUM = ".$id_for." AND id_SURFER = ".$_SESSION['id_SURFER']);
									if (!empty($_SESSION)){
										if (mysqli_num_rows($result) != 0){
									?>
											<div class="col s6">
												<form method="post" action="<?php echo "../controller/like_dislike_forum.php?id_for=".$_GET['id_for']; ?>">
													<button class="btn tooltipped waves-effect waves-light red darken-2 btnSpan" type="submit" name="action" id="btnAccueil" data-position="right"
													data-tooltip="<?php echo $infos_forum["likes"].' likes'; ?>">Dislike
														<i class="material-icons left">thumb_down</i>
													</button>
												</form>
											</div>
									<?php }
										else { ?>
											<div class="col s6">
												<form method="post" action="<?php echo "../controller/like_dislike_forum.php?id_for=".$_GET['id_for']; ?>">
													<button class="btn tooltipped waves-effect waves-light green accent-4 btnSpan" type="submit" name="action" id="btnAccueil" data-position="right"
													data-tooltip="<?php echo $infos_forum["likes"].' likes'; ?>">Like
														<i class="material-icons left">thumb_up</i>
													</button>
												</form>
											</div>
									<?php } ?>
									<div class="col s6">
										<?php $ui = '<form method="POST" action = "pageSuggestion.php?id_for=' . $id_for . '" >';
											echo $ui;?>
											<button class="btn waves-effect waves-light right" type="submit" name="action">Envoyer une suggestion</button>
										</form>
									</div>
									<?php } ?>
							</div>

							<fieldset>
								<?php
									$requestid = "SELECT firstname, lastname FROM SURFER WHERE id_SURFER = " . $infos_forum['id_SURFER'];
									$resultid = mysqli_query($co, $requestid);
									$infos_id = mysqli_fetch_assoc($resultid);

									echo $infos_forum['contents'].'<br><br><br>'.'Posté le '.date("d/m/Y", $date).' à '.$heure.' par '.$infos_id['firstname'].' '.
									$infos_id['lastname'].'<br>';
								?>
							</fieldset>

							<?php if(!empty($_SESSION)){
								$ui = '<form method="POST" action = "../controller/creerAnswerForum.php?id_for=' . $id_for . '" >';
								echo $ui;?>
								<input type="text" id="addComment" name="addComment" placeholder="Ajouter un commentaire">
								<button class ="btn waves-effect waves-light center" type="submit" formethod="put"> Ajouter le commentaire </button>
								<br><br>
							</form>

							<?php } else { ?>
								<form method="post" action="pageConnexion.php">
	        						<button class="btn waves-effect waves-light center" type="submit" name="action">Se connecter pour ajouter un commentaire</button>
								</form>
							<?php }
						
							echo "<div>";
								while($comments = mysqli_fetch_assoc($commentsrequest)) {
									$date_answer = substr($comments['dateResponse_F'],0,10);
									$heure_answer = substr($comments['dateResponse_F'],11,18);
									echo '<B>' . $comments['firstname'] . ' ' . $comments['lastname'] . '</B> : <br>' .
									$comments['contentsAF'] . '<br> <i> Posté le ' . $date_answer . ' à ' . $heure_answer . '</i> <br> <br>';
								}?>
							</div>
					</fieldset>
				<?php
				?>
			</div>

			<div class="composant_contenu_body">
				<?php
					include 'components/latest_tutoriel.php';
				?>
			</div>

		</div>

		<?php include 'components/floating_button.php'; ?>
		
	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>