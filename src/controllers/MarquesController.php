<?php
    class MarqueController {
        public function list(){
            ob_start();
            $em = new MarqueManager();
            $marques = $em->findAll();
            $liste_marques = $marques->fetchAll(PDO::FETCH_CLASS, 'Marque');
            require_once 'src/views/listeMarque.php';
            $contenu = ob_get_clean();
            echo $contenu;
        }

        public function save() {
            if(isset($_POST['nom']) && !empty($_POST['nom'])) {
                $mac = new MarqueManager();
                $mac->setNom($_POST['nom']);
                if($mac->save()->rowCount() == 1) {
                    echo "<p class= 'text-success'>La marque est sauvegardée</p>";
                }else {
                    echo "<p class='text-danger'>Erreur";
                }
            }else {
                echo "<p class='text-danger'>Renseignez tous les champs";
            }
        }

        public function show(){
            ob_start();
            if(isset($_GET['marque']) && !empty($_GET['marque'])){
                $mac= new MarqueManager();
                $marque = $mac->findOneById($_GET['marque']);
                if($marque->rowCount() == 1) {
                    $marque = $marque->fetchObject('Marque');
                    $moc = new ModeleManager();
                    $modeles = $moc->findByMarque($marque->getId());
                    require_once 'src/views/showMarque.php';
                }else{
                    echo "<p class='text-danger'>Marque non trouvée </p>";
                }
            }else{
                echo "<p class='text-danger'>Marques non trouvées</p>";
            }

            $contenu = ob_get_clean();
            echo $contenu;
        }
        
        public function deleteMarque(){
            if(isset($_GET['marque']) && !empty($_GET['marque'])) {
                    $mac = new MarqueManager();
                    $marque = $mac->findOneById($_GET['marque']);
                    if($marque->rowCount() == 1){
                        $mac->setId($_GET['marque']);
                        if($mac->delete()->rowCount() >= 1){
                            echo "<p class='text-warning'>La marque a été supprimée </p>";
                        }
                        else{
                            echo "<p class='text-danger'>Erreur</p>";
                        }
                    }
                    else{
                        echo "<p class='text-danger'>Marque non trouvée.</p>";
                    }
            }
        }

        public function deleteModele() {
            if(isset($_GET['modele']) && !empty($_GET['modele'])) {
                
                $moc = new ModeleManager();
                $modele = $moc->findOneById($_GET['modele']);
                if($modele->rowCount() == 1){
                    $moc->setId($_GET['modele']);
                    if($moc->deleteModele()->rowCount() >= 1){
                        echo "<p class='text-warning'>Le modéle est supprimée.</p>";
                    }
                    else{
                        echo "<p class='text-danger'>Erreur.</p>";
                    }
                }
                else{
                    echo "<p class='text-danger'>Marque non trouvée</p>";
                }
            }else{
                echo 'Bon';
            }
        }

        public function updateMarque() {
            if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['id']) && !empty($_POST['id'])){
                $mac = new MarqueManager();
                $marque = $mac->findOneById($_POST['id']);
                if($marque->rowCount() == 1){
                    $mac->setId($_POST['id'])
                        ->setNom($_POST['nom']);
                    if($mac->updateMarque()->rowCount() >= 1){
                        echo "<p class='text-success'>Marque mise à jour.</p>";
                    }
                    else{
                        echo "<p class='text-danger'>Les données sont identiques.</p>";
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

        
    }
?>