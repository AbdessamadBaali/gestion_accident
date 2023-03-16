<!DOCTYPE html>
<html>
<head>
	<title>Application d'accident - Liste des accidents</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Accidents</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Accueil</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Liste des accidents</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ajouter_accident.php">Ajouter un accident</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Déconnexion</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<h1 class="text-center mt-4">Liste des accidents</h1>
		<table class="table table-striped mt-4">
			<thead>
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Type</th>
					<th>Description</th>
				</tr>
			</thead>
			
	</div>
</body>
</html>