<?php
	include '../model/bd.php';
	
	$result = mysqli_query($co, 'SELECT id_FORUM, title_forum FROM FORUM ORDER BY dateCreation DESC LIMIT 10') or die("Impossible d'exécuter la requête des forums.");
	
	echo "<table id=\"liste_laterales_latest\">
    <tr>
		<th>Derniers forums</th>
    </tr>";
	
	// Afficher les résultats
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
			<td><a href=\"./pageForum.php?id_for=".$row['id_FORUM']."\">".$row['title_forum']."</a></td>
		</tr>";
	}

	echo "</table>";	
?>