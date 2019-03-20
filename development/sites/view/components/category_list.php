<?php
	include '../model/bd.php';
	$result = mysqli_query($co, 'SELECT label, id_CATEGORY FROM CATEGORY') or die("Impossible d'exécuter la requête des categories.");
	
	echo "<table id=\"liste_laterales_cat\">
    <tr>
		<th>Catégories</th>
    </tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
			<td><a href=\"./pageAllCategory.php?id_cat=".$row['id_CATEGORY']."\">".$row['label']."</a></td>
		</tr>";
	}
	echo "</table>";	
?>