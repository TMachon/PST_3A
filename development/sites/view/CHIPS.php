<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>CHIPS</title>
		<link rel="stylesheet" href="CSS/materialize/css/materialize.min.css" media="screen, projection">
	</head>
	<body>
		<?php include('../model/bd.php');
		    
		    $result = mysqli_query($co, "SELECT picture, firstname, lastname FROM IMAGEACCOUNT NATURAL JOIN SURFER");

		    while ($row = mysqli_fetch_assoc($result)) {
		    	// On affiche toute les chips
		        echo "
		        <div class=\"chip blue darken-4 white-text\">
		        		<img src=\"data:image;base64,".$row['picture']."\">";
						echo ucfirst(strtolower($row['firstname']))." ".strtoupper($row['lastname']).
				"</div><br>";
			}
		?>
	</body>
</html>