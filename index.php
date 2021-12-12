<?php

include_once 'inc.header.php';

require_once 'src/class/BDD.php';

require_once 'src/orms/Marque.php';
require_once 'src/orms/Modele.php';

require_once 'src/models/marqueManager.php';
require_once 'src/models/modeleManager.php';

require_once 'src/controllers/MarquesController.php';
require_once 'src/controllers/ModelesController.php';

if(isset($_GET['p'])){

	switch ($_GET['p']) {
		case 'index':
			$mac = new MarqueController();
			$mac->list();
			break;

		
		case 'marque_insert':
			$mac = new MarqueController();
			$mac->save();
			break;

		
		case 'marque_show':
			$mac = new MarqueController();
			$mac->show();
			break;

		case 'marque_delete';
			$mac = new MarqueController();
			$mac->deleteMarque();
			break;

		case 'marque_update';
			$mac = new MarqueController();
			$mac->updateMarque();
			break;
		

		case 'modele_show':
			$cc = new ModelesController();
			$cc->show();
			break;

		case 'modele_delete':
			$cc = new MarqueController();
			$cc->deleteModele();
			break;

		case 'modele_insert':
			$cc = new ModelesController();
			$cc->save();
			break;

		case 'modele_update':
			$moc = new ModelesController();
			$moc->update();
			break;

		default:
			echo "<p class='alert alert-danger'>Erreur 404</p>";
			break;
	}
}
else{
	echo "<p class='alert alert-danger'>Erreur 404</p>";
}

include_once 'inc.footer.php';