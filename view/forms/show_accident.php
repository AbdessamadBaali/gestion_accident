<section class="container">
	<h1 class="text-center mt-4">Liste des accidents</h1>
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
	<table id="accident" class="table  mt-4">
		<thead>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Type</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(isset($data)) {
					foreach ($data as $key => $value) {
						
						echo "<tr>";
							echo "<td>".$value->id ."</td>";
							echo "<td>".$value->date_acc ."</td>";
							echo "<td>".$value->type_acc ."</td>";
							echo "<td>".$value->desc_acc ."</td>";
							echo "<td class='d-flex justify-content-evenly'>
									<a href='index.php?delete&id=".$value->id ."' title='supprimer'
										onclick=\"return confirm('Voulez-vous vraiment réinitialiser le mot de passe cet utilisateur ?')\" >
										<i class='fa fa-trash text-danger'></i>
									</a>
								 </td>";
						echo "</tr>";
					}
				}
			?>
		</tbody>
	</table>
</section>