<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Les Forums</title>
		<meta charset="UTF-8">
		<link rel="icon" href="../../../ressources/images/icon.ico" />
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
		<link rel="stylesheet" href="CSS/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>

		<?php
			include('../model/membre.php'); // On inclut le fichier membre.php permettant de récupérer les variables de $_SESSION
											// et la variable de connexion $co à la base de données

			include('components/banner_accueil.php'); // On inclut la bannière ?>

		<div class="contenu_body">

			<div class="composant_contenu_body" id="categories">
				<?php
					include 'components/category_list.php'; // On inclut la liste des catégories affichée sur la gauche de la page
				?>
			</div>

			<div class="composant_contenu_body">
				<div>
					<fieldset id="most_recents">
						<legend>Les plus récents</legend>

						<?php

							// Requête ramenant les 4 derniers forums créés
							$result = mysqli_query($co, 'SELECT id_FORUM, title_forum, contents, firstname, lastname, dateCreation, likes FROM FORUM NATURAL JOIN SURFER ORDER BY dateCreation DESC LIMIT 4') or die("Impossible d'exécuter la requête des derniers forums.");
							// 'or die("msg")'' permet souvent aux développeurs PHP de développer en mode debug : si une erreur survient, la page arrête
							// de charger et affiche le message voulu passé en paramètre
							
							echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Créateur</th>
								<th>Création</th>
								<th>Likes</th>
						    </tr>";

						    // Tranformation des résultats de la requête en tableau -> https://www.php.net/manual/fr/mysqli-result.fetch-assoc.php
						    // qui dit que tant que ce tableau contient des informations, on les lit et on les affiche dans des lignes d'une table HTML.
						    // $row est le tableau : on récupère ses éléments avec $row['champs'], 'champs' correspondant aux champs indiqués dans
						    // le SELECT de la requête SQL

							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."<span>".$row['contents']."</span></a></td>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td>".date("d/m/Y", $row['dateCreation'])."</td>
									<td>".$row['likes']."</td>
								</tr>";
							}
							echo "</table>"; // On ferme la table HTML
						?>

					</fieldset>

					<fieldset id="most_liked">
						<legend>Les plus aimés</legend>

						<?php
							// On récupère toutes les catégories
							$result = mysqli_query($co, 'SELECT id_FORUM, contents, title_forum, firstname, lastname, dateCreation, likes FROM FORUM NATURAL JOIN SURFER ORDER BY likes DESC LIMIT 4') or die("Impossible d'exécuter la requête des forums les plus aimés.");
							
							echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Créateur</th>
								<th>Création</th>
								<th>Likes</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."<span>".$row['contents']."</span></a></td>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td>".date("d/m/Y", $row['dateCreation'])."</td>
									<td>".$row['likes']."</td>
								</tr>";
							}
							echo "</table>";	
						?>

					</fieldset>

					<fieldset id="vrac">
						<legend>Au hasard</legend>

						<?php
							// On récupère toutes les catégories
							$result = mysqli_query($co, 'SELECT id_FORUM, contents, title_forum, firstname, lastname, dateCreation, likes FROM FORUM NATURAL JOIN SURFER ORDER BY RAND(), dateCReation DESC LIMIT 5') or die("Impossible d'exécuter la requête des forums au hasard.");
							
							echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Créateur</th>
								<th>Création</th>
								<th>Likes</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."<span>".$row['contents']."</span></a></td>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td>".date("d/m/Y", $row['dateCreation'])."</td>
									<td>".$row['likes']."</td>
								</tr>";
							}
							echo "</table>";	
						?>

					</fieldset>

				</div>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="CSS/materialize/js/materialize.min.js"></script>
	<script src="CSS/materialize/js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
	
</html>