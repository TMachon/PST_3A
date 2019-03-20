<?php
	include('../model/bd.php'); include('../model/membre.php');
	$result = mysqli_query($co, "SELECT image FROM IMAGE_ACCOUNT NATURAL JOIN SURFER WHERE id_SURFER = ".$_SESSION['id_SURFER']."")
	or die("erreur blob");
	$row = mysqli_fetch_array($result);
	header("Content-type: image/png");
    echo $row["image"];
?>