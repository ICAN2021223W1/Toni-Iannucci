<h2>Modele du véhicule</h2>
<td><?= $modele->getNom(); ?></td>
<h2>Prix du véhicule</h2>
<td><?= $modele->getPrix(); ?></td>

<h2>Modifier le modele</h2>
<form action="index.php?p=modele_update&modele=<?= $_GET['modele']; ?>" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br>
	<label for="prix">Prix :</label>
	<br>
	<input type="text" name="prix" id="prix">
	<br>
	<input type="submit" name="update_modele" value="Mettre à jour" class="btn btn-success">
</form>

<hr>






