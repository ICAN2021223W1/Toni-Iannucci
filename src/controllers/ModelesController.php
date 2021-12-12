<?php
    class ModelesController {
        public function list() {
            ob_start();
            $mac = new MarqueManager();
            $marques = $mac->findAll();
            $liste_marques = $marque->fetchAll()(PDO::FETCH_CLASS, 'Marque');
            require_once 'src/views/listeMarque.php';
            $contenu = ob_get_clean();
            echo $contenu;

        }

	public function save(){
		if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix'])){
			$ma = new MarqueManager();
			$marque = $ma->findOneById($_POST['marque']);
			if($marque->rowCount() == 1){
				$cm = new ModeleManager();
				$cm->setNom($_POST['nom'])
                    ->setPrix($_POST['prix'])
					->setMarque($_POST['marque']);
				if($cm->save()->rowCount() == 1){
					echo "<p class='text-success'>Modele sauvegardée.</p>";
				}
				else{
					echo "<p class='text-danger'>Une erreur est survenue lors de la sauvegarde.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>Marque introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
	}

        public function show(){
            ob_start();
            if(isset($_GET['modele']) && !empty($_GET['modele'])){
                $mo = new ModeleManager();
                $modele = $mo->findOneById($_GET['modele']);
                if($modele->rowCount() == 1){
                    $modele = $modele->fetchObject('Modele');
                    require_once 'src/views/showModele.php';
                }
                else{
                    echo "<p class='text-danger'>Marque introuvable2.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Marque introuvable3.</p>";
            }

            $contenu = ob_get_clean();
            echo $contenu;
        }

        public function update() {
            if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['id']) && !empty($_POST['id'])){
			$cm = new ModeleManager();
			$modele = $cm->findOneById($_POST['id']);
			if($modele->rowCount() == 1){
				$cm->setId($_POST['id'])
					->setID($_POST['nom'])
					->setPrix($_POST['prix']);
				if($cm->update()->rowCount() >= 1){
					echo "<p class='text-success'>Modele mise à jour.</p>";
				}
				else{
					echo "<p class='text-danger'>Les données sont identiques.</p>";
				}
			}
			else{
				echo "<p class='text-danger'>Modele introuvable.</p>";
			}
		}
		else{
			echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";
		}
    
        }

        
    }
?>