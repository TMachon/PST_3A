<ul class="collection with-header dashboard">
	<li class="collection-header"><h5><a href="./mon_compte.php" class="collection-item">Mon Compte</a></h5></li>
	<li class="collection-item"><a href="./infos_persos.php" class="collection-item"><i class="material-icons left">data_usage</i>Informations personnelles</a></li>
	<li class="collection-item"><a href="./tutos_persos.php" class="collection-item"><i class="material-icons left">mode_edit</i>Vos tutoriels</a></li>
	<li class="collection-item"><a href="./forums_persos.php" class="collection-item"><i class="material-icons left">format_quote</i>Vos forums</a></li>
	<li class="collection-item"><a href="./reponses_persos.php" class="collection-item"><i class="material-icons left">sms</i>Vos réponses</a></li>
	<li class="collection-item"><a href="./alertes_persos.php" class="collection-item"><i class="material-icons left">sms_failed</i>Vos alertes</a></li>
	<?php
		if ($_SESSION['statutAdmin']){ ?>
			<li class="collection-item"><a href="./informations.php" class="collection-item"><i class="material-icons left">question_answer</i>Demandes d'information</a></li>
		<?php }?>
 </ul>