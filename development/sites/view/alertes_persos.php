<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>CommentFaire.fr</title>
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
					<legend>Vos alertes de suggestions pour vos forums</legend>

					<?php
						// On récupère toutes les catégories
						$result = mysqli_query($co, "SELECT from_.firstname, from_.lastname, title_forum, suggestion_forum, F.id_FORUM FROM SURFER from_ NATURAL JOIN SUGGESTION_FORUM SF, SURFER to_ NATURAL JOIN FORUM F	WHERE SF.id_FORUM = F.id_FORUM AND to_.id_SURFER = ".$_SESSION['id_SURFER']." ORDER BY F.dateCreation DESC") or die("Impossible d'exécuter la requête des suggestions persos.");
						
						echo "<table>
						    <tr>
								<th>Suggestionneur</th>
								<th>Forum</th>
								<th>Suggestion</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."</a></td>
									<td>".$row['suggestion_forum']."</td>
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