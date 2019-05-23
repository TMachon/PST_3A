<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
	<?php
		if (!isset($_SESSION['statutAdmin'])){
			echo "
			<li><a href=\"pageConnexion.php\">Se connecter</a></li>
			<li><a href=\"pageInscription.php\">S'inscrire</a></li>";
		}
		else{
			echo "
			<li><a href=\"mon_compte.php\">Mon compte</a></li>
			<li><a href=\"../controller/deconnexion.php\">Se déconnecter</a></li>";

			if ($_SESSION['statutAdmin'])
				echo "
				<li class=\"divider\"></li>
				<li><a href=\"viderBD.php\">Vider les BD</a></li>";
		}
	?>
</ul>
<nav class="blue lighten-1">
	<div class="nav-wrapper">
		<a href="accueil.php" class="brand-logo center">
			<img width="60" height="60" src="../../../ressources/images/logo2.png" alt="logo"/>
		</a>

		<ul class="left hide-on-med-and-down">
			<li class="<?php
							if(end(explode('/', $_SERVER['REQUEST_URI'])) == 'accueil.php') echo 'active';
						?>"><a href="accueil.php">Tutoriels</a>
			</li>
			<li class="<?php
							if(end(explode('/', $_SERVER['REQUEST_URI'])) == 'forums.php') echo 'active';
						?>"><a href="forums.php">Forums</a>
			</li>
		</ul>

		<ul class="right hide-on-med-and-down">
			<li>
				<nav class="blue lighten-2 search_nav">
					<div class="nav-wrapper">
						<form method="GET" action="search.php">
							<div class="input-field">
								<input type="search" placeholder="Rechercher" name="search">
								<label class="label-icon"><i class="material-icons">search</i></label>
							</div>
						</form>
					</div>
				</nav>
			</li>
			<!-- Dropdown Trigger -->
			<li>
				<a class="dropdown-trigger" href="#!" data-target="dropdown1">

					<?php include('../model/bd.php');
					    if (isset($_SESSION['mail'])) {
					        $sql = "SELECT picture FROM IMAGEACCOUNT NATURAL JOIN SURFER WHERE id_SURFER='".$_SESSION['id_SURFER']."'";
					        $query = mysqli_query($co, $sql);
					        $line = mysqli_fetch_assoc($query);
					        echo "<div class=\"chip blue darken-4 white-text\">
					        		<img src=\"data:image;base64,".$line['picture']."\">";
			        				echo ucfirst(strtolower($_SESSION['prenom']))." ".strtoupper($_SESSION['nom']).
				    		"</div>";
					    }
					    else echo "Compte";
					?>
					<i class="material-icons right">arrow_drop_down</i>
				</a>
			</li>
		</ul>
	</div>
</nav>