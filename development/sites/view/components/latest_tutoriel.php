<?php
	include '../model/bd.php';
	
	// On récupère toutes les catégories
	$result = mysqli_query($co, 'SELECT id_TUTORIAL, title_tutorial FROM TUTORIAL') or die("Impossible d'exécuter la requête des tutoriels.");
	
	echo "<table id=\"liste_laterales_latest\">
    <tr>
		<th>Derniers tutoriels</th>
    </tr>";
	
	// Afficher les résultats
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
			<td><a href=\"./pageTutoriel.php?id_tuto=".$row['id_TUTORIAL']."\">".$row['title_tutorial']."</a></td>
		</tr>";
	}

	echo "</table>";	
?>