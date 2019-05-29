<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Demandes d'informations</title>
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
					<legend>Demandes d'informations des utilisateurs</legend>

					<?php
						$result = mysqli_query($co, "SELECT * FROM INFORMATIONS NATURAL JOIN SURFER") or die("Impossible d'exécuter la requête des demandes d'informations.");
						
						echo "<table>
						    <tr>
								<th>Utilisateur</th>
								<th>Date</th>
								<th>Demande</th>
								<th></th>
						    </tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								$dateFormat = new DateTime($row['dateDemande']);
								echo "<tr>
									<td>".$row['firstname']." ".$row['lastname']."</td>
									<td>".$dateFormat->format('d/m/Y')."</td>
									<td>".$row['demande']."</td>
									<td>
								        <button name=\"id_infos\" class=\"btn waves-effect waves-light red darken-3\" type=\"submit\"
								        value=\"".$row['id_INFORMATIONS']."\" onclick='supprimerDemande(".$row['id_INFORMATIONS'].")'>
								        <i class=\"material-icons center\">delete_forever</i></button>
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