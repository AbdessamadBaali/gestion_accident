<section class="w-50 m-auto">
		<h1 class="text-center mt-4">Ajouter un accident</h1>
		<?php
			if(isset($_SESSION['feedback'])) {
		?>
			<div class="alert alert-<?=$_SESSION['alert'] ?> alert-dismissible fade show w-100 " role="alert">
				<strong>
				<?php
					echo $_SESSION['feedback'];
				?>
				</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
			}
		?>
		<form action="index.php" method="post">
			<div class="form-group  my-3">
				<label for="date" class="form-label">Date de l'accident :</label>
				<input type="date" class="form-control" id="date" name="date_acc">
			</div>
			<div class="form-group my-3">
				<label for="type" class="form-label">Type d'accident :</label>
				<select class="form-control" id="type" name="type_acc">
					<option>Chute de hauteur</option>
					<option>Chute d'objet</option>
					<option>Électrocution</option>
					<option>Incendie</option>
					<option>Autre</option>
				</select>
			</div>
			<div class="form-group my-3">
				<label for="description" class="form-label">Description de l'accident :</label>
				<textarea class="form-control" id="description" rows="3" name="desc_acc"></textarea>
			</div>
			<button type="submit" class="btn btn-dark" name="add_accident">Ajouter l'accident</button>
		</form>
</section>
<?php
    unset($_SESSION['feedback']);
    unset($_SESSION['alert']);
