<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Tutoriel</title>
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
					$id_tuto = $_GET['id_tuto'];
					$result = mysqli_query($co, "SELECT * FROM TUTORIAL NATURAL JOIN CATEGORY WHERE id_TUTORIAL = ".$id_tuto);
					$infos_tutoriel = mysqli_fetch_assoc($result);

					$resultImages = mysqli_query($co, "SELECT * FROM TUTORIAL NATURAL JOIN IMAGETUTORIAL WHERE id_TUTORIAL = ".$id_tuto);

					$commentsrequest = mysqli_query($co, "SELECT picture, firstname, lastname, contentsAT, dateResponse_T 
					FROM ANSWER_TUTORIAL NATURAL JOIN SURFER NATURAL JOIN IMAGEACCOUNT WHERE id_TUTORIAL = ".$id_tuto." ORDER BY dateResponse_T");
				?>
					<fieldset>
						<legend><font face="Helvetica"><b><?php echo $infos_tutoriel['title_tutorial']; ?></b></font></legend>

							<div class="row">

								<?php
									if (!empty($_SESSION)){
										$result = mysqli_query($co, "SELECT * FROM LIKE_TUTORIAL WHERE id_TUTORIAL = ".$id_tuto." AND id_SURFER = ".$_SESSION['id_SURFER']);
										if (mysqli_num_rows($result) != 0){
									?>
											<div class="right">
												<form method="post" action="<?php echo "../controller/like_dislike_tutoriel.php?id_tuto=".$_GET['id_tuto']; ?>">
													<button class="btn tooltipped waves-effect waves-light red darken-2 btnSpan" type="submit" name="action" data-position="right"
													data-tooltip="<?php echo $infos_tutoriel["likes"].' likes'; ?>">Unlike
														<i class="material-icons right">thumb_down</i>
													</button>
												</form>
											</div>
									<?php }
										else { ?>
											<div class="right">
												<form method="post" action="<?php echo "../controller/like_dislike_tutoriel.php?id_tuto=".$_GET['id_tuto']; ?>">
													<button class="btn tooltipped waves-effect waves-light green accent-4 btnSpan" type="submit" name="action"  data-position="right"
													data-tooltip="<?php echo $infos_tutoriel["likes"].' likes'; ?>">Like
														<i class="material-icons right">thumb_up</i>
													</button>
												</form>
											</div>
									<?php } ?>
									<div class="right">
										<?php echo '<form method="POST" action = "pageSuggestionTutoriel.php?id_tuto='.$_GET['id_tuto'].'" >'; ?>
											<button style="margin-right: 10px" class="btn waves-effect waves-light right" type="submit" name="action">Suggestion !</button>
										</form>
									</div>
									<div class="right">
										<?php echo '<form method="POST" action = "pageSignalerTuto.php?id_tuto='.$_GET['id_tuto'].'" >'; ?>
											<button style="margin-right: 10px" class="btn waves-effect waves-light red darken-2 right" type="submit" name="action">Signaler
											<i class="material-icons right">report</i>
										</button>
										</form>
									</div>
									<?php } ?>
							</div>

							<fieldset>
								<?php
									$requestid = "SELECT firstname, lastname, picture FROM SURFER NATURAL JOIN IMAGEACCOUNT WHERE id_SURFER = " . $infos_tutoriel['id_SURFER'];
									$resultid = mysqli_query($co, $requestid);
									$infos_id = mysqli_fetch_assoc($resultid);
									$dateFormat = new DateTime($infos_tutoriel['dateCreation']);

									echo "
								    <div class=\"chip blue darken-4 white-text\">
								    		<img src=\"data:image;base64,".$infos_id['picture']."\">";
											echo ucfirst(strtolower($infos_id['firstname']))." ".strtoupper($infos_id['lastname']).
									"</div><br>".nl2br($infos_tutoriel['contents']).'<br>
									<span class="new badge" data-badge-caption="">Posté le '.$dateFormat->format('d/m/Y').'</span>
									<span class="new badge red" data-badge-caption="">'.$infos_tutoriel['label'].'</span>';
								?>
							</fieldset>

							<?php

								if (mysqli_num_rows($resultImages) > 0) echo "<div class=\"carousel carousel-slider\">";
								while($images = mysqli_fetch_assoc($resultImages)) {
									echo "<a class=\"carousel-item\"><img id=\"illustrations\" src=\"data:image;base64,".$images['picture']."\"></a>";
								}
								if (mysqli_num_rows($resultImages) > 0){
									echo "</div>";
									if (mysqli_num_rows($resultImages) > 1) echo "<img width=\"60\" id=\"swipe_gesture\" height=\"60\" src=\"../../../ressources/images/swipe_gesture.png\"/>";
								}

							if(!empty($_SESSION)){
								echo '<form method="POST" action = "../controller/creerAnswerTutoriel.php?id_tuto=' . $id_tuto . '" >'; ?>
								<br><input type="text" id="addComment" name="addComment" placeholder="Ajouter un commentaire">
								<button class ="btn waves-effect waves-light center" type="submit" formethod="put"> Ajouter le commentaire </button>
							</form>

							<?php } else { ?>
								<form method="post" action="pageConnexion.php">
	        						<br><button class="btn waves-effect waves-light center" type="submit" name="action">Se connecter pour ajouter un commentaire</button>
								</form>
							<?php }
						
							echo "<div>";
								while($comments = mysqli_fetch_assoc($commentsrequest)) {
									$dateFormat = new DateTime($comments['dateResponse_T']);

									echo "<div class=\"pagedegarde\">
								    <div class=\"chip blue darken-4 white-text\">
								    		<img src=\"data:image;base64,".$comments['picture']."\">";
											echo ucfirst(strtolower($comments['firstname']))." ".strtoupper($comments['lastname']).
									"</div><br>".nl2br($comments['contentsAT']).'
									<span class="new badge" data-badge-caption="">Posté le '.$dateFormat->format('d/m/Y').'</span></div>';
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