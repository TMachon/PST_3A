<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Signalements</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>

		<?php include('../model/membre.php'); include('components/banner_accueil.php');

		if (!empty($_SESSION)){ ?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php include 'components/dashboard.php'; ?>
			</div>

			<div class="composant_contenu_body">

				<fieldset>
					<legend>Demandes de signalement des tutoriels</legend>

					<?php
						$result = mysqli_query($co, "
							SELECT motif, T.id_TUTORIAL, title_tutorial, S1.lastname AS lnC, S1.firstname AS fnC,  S2.lastname AS lnD, S2.firstname AS fnD
							FROM TUTORIAL T, SIGNALEMENT_TUTORIAL ST, SURFER S1, SURFER S2, MOTIF_SIGNALEMENT M
							WHERE T.id_TUTORIAL=ST.id_TUTORIAL
							AND ST.id_SURFER=S2.id_SURFER
							AND T.id_SURFER=S1.id_SURFER
							AND ST.id_MOTIF_SIGNALEMENT=M.id_MOTIF_SIGNALEMENT") or die("Impossible d'exécuter la requête des demandes de signalements des tutoriels.");
						
						echo "<table>
						    <tr>
								<th>Demandeur</th>
								<th>Tutoriel</th>
								<th>Créateur</th>
								<th>Motif</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>".$row['fnD']." ".$row['lnD']."</td>
									<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
									<td>".$row['fnC']." ".$row['lnC']."</td>
									<td>".$row['motif']."</td>
								</tr>";
							}
						echo "</table>";	
					?>

				</fieldset>

				<fieldset>
					<legend>Demandes de signalement des forums</legend>

					<?php
						$result = mysqli_query($co, "
							SELECT motif, F.id_FORUM, title_forum, S1.lastname AS lnC, S1.firstname AS fnC,  S2.lastname AS lnD, S2.firstname AS fnD
							FROM FORUM F, SIGNALEMENT_FORUM SF, SURFER S1, SURFER S2, MOTIF_SIGNALEMENT M
							WHERE F.id_FORUM=SF.id_FORUM
							AND SF.id_SURFER=S2.id_SURFER
							AND F.id_SURFER=S1.id_SURFER
							AND SF.id_MOTIF_SIGNALEMENT=M.id_MOTIF_SIGNALEMENT") or die("Impossible d'exécuter la requête des demandes de signalements des forums.");
						
						echo "<table>
						    <tr>
								<th>Demandeur</th>
								<th>Forum</th>
								<th>Créateur</th>
								<th>Motif</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>".$row['fnD']." ".$row['lnD']."</td>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."</a></td>
									<td>".$row['fnC']." ".$row['lnC']."</td>
									<td>".$row['motif']."</td>
								</tr>";
							}
						echo "</table>";	
					?>

				</fieldset>
			</div>

			<div class="composant_contenu_body" id="categories"></div>

		</div>

		<?php }
				else echo "<h3 class='title_no_connection'>Vous n'êtes pas connecté.</h3>"; ?>

	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>