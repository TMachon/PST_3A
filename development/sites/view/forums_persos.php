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

		<?php include('../model/membre.php'); include('components/banner_accueil.php'); ?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php include 'components/dashboard.php'; ?>
			</div>

			<div class="composant_contenu_body">

				<fieldset>
					<legend>Les forums que vous avez posté</legend>

					<?php
						// On récupère toutes les catégories
						$result = mysqli_query($co, "SELECT id_FORUM, title_forum, dateCreation, likes, dislikes FROM FORUM NATURAL JOIN SURFER WHERE id_SURFER = '".$_SESSION['id_SURFER']."' ORDER BY dateCreation DESC") or die("Impossible d'exécuter la requête des forums persos.");
						
						echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Création</th>
								<th>Likes</th>
								<th>Dislikes</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."</a></td>
									<td>".$row['dateCreation']."</td>
									<td>".$row['likes']."</td>
									<td>".$row['dislikes']."</td>
								</tr>";
							}
						echo "</table>";	
					?>

				</fieldset>
			</div>

			<div class="composant_contenu_body" id="categories"></div>
			
		</div>

	</body>

	<?php include 'components/footer.html'; ?>

	<!--Scripts trigger de Materialize-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
</html>