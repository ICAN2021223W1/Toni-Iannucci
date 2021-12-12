<h2>Marques</h2>
<h3>Ajouter une marque</h3>

<?php

	if($marques->rowCount() > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Je parcours ce tableau PHP
					foreach ($liste_marques as $marque) {
						?>
						<tr>
							<td><?= $marque->getNom(); ?></td>
							<td>
								<a href="index.php?p=marque_show&marque=<?= $marque->getId(); ?>" class="btn btn-primary">Afficher</a>
								<a href="index.php?p=marque_delete&marque=<?= $marque->getId(); ?>" class="btn btn-danger">Supprimer</a>
					
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<?php
	}
	else{
		echo "<p>Il n'y a aucune marque</p><hr>";
	}
?>

<form action="index.php?p=marque_insert" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br>
	<input type="submit" name="ajout_marque" value="Ajouter" class="btn btn-primary">
</form>




