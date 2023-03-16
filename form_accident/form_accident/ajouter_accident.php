<?php
if(isset($_POST['ajouter'])){
// Étape 1 : se connecter à la base de données
		$nom="localhost";
         $utilisateur = "root";
         $motepass="DD2022";
         $nom_base_donner = "accident";
		$conn=mysqli_connect($nom,$utilisateur,$motepass,$nom_base_donner);

	if (!$conn) {
    	die('Impossible de se connecter à la base de données : ' . mysqli_connect_error());
	}

// Étape 2 : récupérer les données du formulair

	$type = $_POST['type'];
	$description = $_POST['description'];
	$date = $_POST['date'];
// récupérer d'autres données si nécessaire

// Étape 3 : valider les données
	if (empty($type) || empty($description) || empty($date)) {
    	echo 'Tous les champs sont obligatoires';
    	exit;
	}

// Étape 4 : exécuter une requête SQL INSERT


	$sql = "INSERT INTO ajouteraccident (typee, descriptionn, dateee) VALUES ('$type', '$description', '$date')";

	if (mysqli_query($conn, $sql)) {
   		echo 'L\'accident a été ajouté avec succès';
	} else {
    	echo 'Une erreur s\'est produite lors de l\'ajout de l\'accident : ' . mysqli_error($conn);
}

// Étape 5 : fermer la connexion à la base de données
	mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Application d'accident - Ajouter un accident</title>
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
					<a class="nav-link" href="bienvenu.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="affiche_accidents.php">Liste des accidents</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Ajouter un accident</a>
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
		<h1 class="text-center mt-4">Ajouter un accident</h1>
		<form>
			<div class="form-group">
				<label for="date">Date de l'accident :</label>
				<input type="date" class="form-control" id="date" name="date">
			</div>
			<div class="form-group">
				<label for="type">Type d'accident :</label>
				<select class="form-control" id="type" name="type">
					<option>Chute de hauteur</option>
					<option>Chute d'objet</option>
					<option>Électrocution</option>
					<option>Incendie</option>
					<option>Autre</option>
				</select>
			</div>
			<div class="form-group">
				<label for="description">Description de l'accident :</label>
				<textarea class="form-control" id="description" rows="3" name="description"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="ajouter">Ajouter l'accident</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>