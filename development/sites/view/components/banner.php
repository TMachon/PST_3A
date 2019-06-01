<nav class="blue lighten-1">
	<div class="nav-wrapper">

		<ul class="left hide-on-med-and-down">
			<li class="<?php
							if(end(explode('/', $_SERVER['REQUEST_URI'])) == 'accueil.php') echo 'active';
						?>"><a href="accueil.php">Accueil</a>
			</li>
		</ul>

		<a href="accueil.php" class="brand-logo center"><img width="60" height="60" src="../../../ressources/images/logo2.png" alt="logo"/> </a>
	</div>
</nav>