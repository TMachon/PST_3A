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

					$commentsrequest = mysqli_query($co, "SELECT picture, firstname, lastname, contentsAF, dateResponse_F 
					FROM ANSWER_FORUM NATURAL JOIN SURFER NATURAL JOIN IMAGEACCOUNT WHERE id_FORUM = $id_for ORDER BY dateResponse_F");
				?>
					<fieldset>
						<legend><?php echo $infos_forum['title_forum']; ?></legend>

							<div class="row">

								<?php
									if (!empty($_SESSION)){
										$result = mysqli_query($co, "SELECT * FROM LIKE_FORUM WHERE id_FORUM = ".$id_for." AND id_SURFER = ".$_SESSION['id_SURFER']);
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
									$requestid = "SELECT firstname, lastname, picture FROM SURFER NATURAL JOIN IMAGEACCOUNT WHERE id_SURFER = " . $infos_forum['id_SURFER'];
									$resultid = mysqli_query($co, $requestid);
									$infos_id = mysqli_fetch_assoc($resultid);
									$dateFormat = new DateTime($infos_forum['dateCreation']);

									echo "
								    <div class=\"chip blue darken-4 white-text\">
								    		<img src=\"data:image;base64,".$infos_id['picture']."\">";
											echo ucfirst(strtolower($infos_id['firstname']))." ".strtoupper($infos_id['lastname']).
									"</div><br><br>".$infos_forum['contents'].'<br><span class="new badge" data-badge-caption="">Posté le '.$dateFormat->format('d/m/Y').'</span><br><br>';
								?>
							</fieldset>

							<?php if(!empty($_SESSION)){
								$ui = '<form method="POST" action = "../controller/creerAnswerForum.php?id_for=' . $id_for . '" >';
								echo $ui;?>
								<input type="text" id="addComment" name="addComment" placeholder="Ajouter un commentaire">
								<button class ="btn waves-effect waves-light center" type="submit" formethod="put"> Ajouter le commentaire </button>
							</form>

							<?php } else { ?>
								<form method="post" action="pageConnexion.php">
	        						<button class="btn waves-effect waves-light center" type="submit" name="action">Se connecter pour ajouter un commentaire</button>
								</form>
							<?php }
						
							echo "<div>";
								while($comments = mysqli_fetch_assoc($commentsrequest)) {
									$dateFormat = new DateTime($comments['dateResponse_F']);

									echo "<div class=\"pagedegarde\">
								    <div class=\"chip blue darken-4 white-text\">
								    		<img src=\"data:image;base64,".$comments['picture']."\">";
											echo ucfirst(strtolower($comments['firstname']))." ".strtoupper($comments['lastname']).
									"</div><br><br>".$comments['contentsAF'] . '<br>
									<span class="new badge" data-badge-caption="">Posté le '.$dateFormat->format('d/m/Y').'</span><br></div>';
								}?>
							</div>
					</fieldset>
				<?php
				?>
			</div>

			<div class="composant_contenu_body">
				<?php
					include 'components/latest_forum.php';
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