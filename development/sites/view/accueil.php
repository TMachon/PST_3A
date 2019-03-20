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

		<?php include('../model/membre.php'); include('components/banner_accueil.php'); // On inclut la bannière?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php
					include 'components/category_list.php';
				?>
			</div>

			<div class="composant_contenu_body">
				<fieldset>
					<legend>Les plus récents</legend>

					<?php 
						// On récupère toutes les catégories
						$result = mysqli_query($co, 'SELECT id_TUTORIAL, title_tutorial, firstname, lastname, dateCreation, label, likes, dislikes FROM TUTORIAL NATURAL JOIN SURFER NATURAL JOIN CATEGORY ORDER BY dateCreation DESC LIMIT 4') or die("Impossible d'exécuter la requête des derniers tutos.");
						
						echo "<table>
						    <tr>
								<th>Tutoriels</th>
								<th>Catégorie</th>
								<th>Créateur</th>
								<th>Création</th>
								<th>Likes</th>
								<th>Dislikes</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
									<td>".$row['label']."</td>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td>".$row['dateCreation']."</td>
									<td>".$row['likes']."</td>
									<td>".$row['dislikes']."</td>
								</tr>";
							}
						echo "</table>";	
					?>

				</fieldset>

				<fieldset>
					<legend>Les plus aimés</legend>

					<?php
						// On récupère toutes les catégories
						$result = mysqli_query($co, 'SELECT id_TUTORIAL, title_tutorial, firstname, lastname, dateCreation, label, likes, dislikes FROM TUTORIAL NATURAL JOIN SURFER NATURAL JOIN CATEGORY ORDER BY likes DESC LIMIT 4') or die("Impossible d'exécuter la requête des tutos les plus aimés.");
						
						echo "<table>
					    <tr>
							<th>Tutoriels</th>
							<th>Catégorie</th>
							<th>Créateur</th>
							<th>Création</th>
							<th>Likes</th>
							<th>Dislikes</th>
					    </tr>";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
								<td>".$row['label']."</td>
								<td>".$row['firstname']." ".$row['lastname']."</td>
								<td>".$row['dateCreation']."</td>
								<td>".$row['likes']."</td>
								<td>".$row['dislikes']."</td>
							</tr>";
						}
						echo "</table>";	
					?>

				</fieldset>

				<fieldset>
					<legend>Au hasard</legend>

					<?php
						// On récupère toutes les catégories
						$result = mysqli_query($co, 'SELECT id_TUTORIAL, title_tutorial, firstname, lastname, dateCreation, label, likes, dislikes FROM TUTORIAL NATURAL JOIN SURFER NATURAL JOIN CATEGORY ORDER BY RAND(), dateCReation DESC LIMIT 5') or die("Impossible d'exécuter la requête des tutos au hasard.");
						
						echo "<table>
					    <tr>
							<th>Tutoriels</th>
							<th>Catégorie</th>
							<th>Créateur</th>
							<th>Création</th>
							<th>Likes</th>
							<th>Dislikes</th>
					    </tr>";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
								<td>".$row['label']."</td>
								<td>".$row['firstname']." ".$row['lastname']."</td>
								<td>".$row['dateCreation']."</td>
								<td>".$row['likes']."</td>
								<td>".$row['dislikes']."</td>
							</tr>";
						}
						echo "</table>";	
					?>

				</fieldset>
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