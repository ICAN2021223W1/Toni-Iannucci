<h2><?= $marque->getNom(); ?></h2>

<h3>Liste des modeles de la marque</h3>
<?php
	
	if($modeles->rowCount() >= 1){
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prix</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$liste_modeles = $modeles->fetchAll(PDO::FETCH_CLASS, 'Modele');
					foreach ($liste_modeles as $modele) {
						?>
						<tr>
							<td><?= $modele->getNom(); ?></td>
							<td><?= $modele->getPrix(); ?></td>
							<td>
								<?php
									
								?>
							</td>
							<td>
								<a href="index.php?p=modele_show&modele=<?= $modele->getId(); ?>" class="btn btn-primary">Afficher</a>
								<a href="index.php?p=modele_delete&modele=<?= $modele->getId(); ?>" class="btn btn-danger">Supprimer</a>
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
		echo "<p>Il n'y a aucune modele dans cette marque</p><hr>";
	}
?>



<h2>Modifier la marque</h2>
<form action="index.php?p=marque_update&marque=<?= $_GET['marque']; ?>"  method="POST">
	<input type="hidden" name="id" value="<?= $marque->getId(); ?>">
	<label for="nom">Marque :</label>
	<br>
	<input type="text" name="nom" id="nom" value="<?= $marque->getNom(); ?>">
	<br>
	
	<input type="submit" name="update_classe" value="Mettre à jour" class="btn btn-success">
</form>

<hr>
	
<h2>Ajouter un modele dans la marque</h2>
<form action="index.php?p=modele_insert" method="POST">
	<input type="hidden" name="marque" value="<?= $marque->getId(); ?>">
	<label for="promo">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br>
	<label for="prix">Prix :</label>
	<br>
	<input type="text" name="prix" id="prix">
	<br>
	<input type="submit" name="insert_classe" value="Ajouter" class="btn btn-primary">
</form>