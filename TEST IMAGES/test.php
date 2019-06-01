<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen, projection">
		<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<form enctype="multipart/form-data" action="#" method="post">
			<div class="row center">
				<div class="card teal darken-4">
					<div class="card-content white-text">
						<div class="file-field input-field">
							<div class="btn">
								<span>Image</span>
								<input multiple type="file" class="form-control" onchange="readURLSeveralImages(this);" accept="image/*" name="avatar">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<br>
							<div class="carousel" id="illustrations"></div>
					</div>
				</div>
			</div>
		</form>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="materialize/js/materialize.min.js"></script>
	<script src="app.js"></script>
</html>