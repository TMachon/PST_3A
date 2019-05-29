<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Mes tutoriels postés</title>
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
					<legend>Les tutoriels que vous avez posté</legend>

					<?php
						// On récupère toutes les catégories
						$result = mysqli_query($co, "SELECT id_TUTORIAL, title_tutorial, label, dateCreation, likes FROM TUTORIAL NATURAL JOIN SURFER NATURAL JOIN CATEGORY WHERE id_SURFER = '".$_SESSION['id_SURFER']."' ORDER BY dateCreation DESC") or die("Impossible d'exécuter la requête des tutoriels persos.");
						
						echo "<table>
						    <tr>
								<th>Tutoriels</th>
								<th>Catégorie</th>
								<th>Création</th>
								<th>Likes</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
									<td>".$row['label']."</td>
									<td>".date("d/m/Y", $row['dateCreation'])."</td>
									<td>".$row['likes']."</td>
									<td>
								        <button name=\"id_tuto\" class=\"btn waves-effect waves-light red darken-3\" type=\"submit\" value=\"".$row['id_TUTORIAL']."\" onclick='supprimerTutoriel(".$row['id_TUTORIAL'].")'>
											<i class=\"material-icons center\">delete_forever</i>
										</button>
									</td>
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