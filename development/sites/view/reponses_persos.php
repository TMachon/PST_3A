<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Mes commentaires</title>
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
					<legend>Vos réponses aux tutoriels</legend>

					<?php
						$result = mysqli_query($co, "SELECT T.id_TUTORIAL, title_tutorial, dateResponse_T, contentsAT FROM (TUTORIAL T JOIN ANSWER_TUTORIAL AT ON T.id_TUTORIAL = AT.id_TUTORIAL) JOIN SURFER S ON AT.id_SURFER = S.id_SURFER WHERE AT.id_SURFER = '".$_SESSION['id_SURFER']."' ORDER BY dateCreation DESC")
						or die("Impossible d'exécuter la requête des réponses aux tutoriels.");
						
						echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Catégorie</th>
								<th>Date</th>
								<th>Commentaire</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageTutorial.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
									<td>".$row['label']."</td>
									<td>".$row['dateResponse_T']."</td>
									<td>".$row['contentsAT']."</td>
								</tr>";
							}
						echo "</table>";	
					?>

				</fieldset>

				<fieldset>
					<legend>Vos réponses aux forums</legend>

					<?php
						$result = mysqli_query($co, "SELECT F.id_FORUM, title_forum, dateResponse_F, contentsAF FROM (FORUM F JOIN ANSWER_FORUM AF ON F.id_FORUM = AF.id_FORUM) JOIN SURFER S ON AF.id_SURFER = S.id_SURFER WHERE AF.id_SURFER = '".$_SESSION['id_SURFER']."' ORDER BY dateCreation DESC")
						or die("Impossible d'exécuter la requête des réponses aux forums.");
						
						echo "<table>
						    <tr>
								<th>Forums</th>
								<th>Date</th>
								<th>Commentaire</th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."</a></td>
									<td>".$row['dateResponse_F']."</td>
									<td>".$row['contentsAF']."</td>
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