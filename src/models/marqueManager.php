<?php
    class MarqueManager extends Marque{

         public function findAll(){
             $bdd = new BDD();
             $connexion = $bdd->getCo();
             $sql = "SELECT * FROM marque"; 
             $req = $connexion->prepare($sql);
             $req->execute();
             return $req;
         }

         public function save() {
             $bdd = new BDD();
             $connexion = $bdd->getCo();
             $sql = "INSERT INTO marque(nom) VALUES (:n);";
             $req = $connexion->prepare($sql);
             $req->execute([
                 'n' => $this->getNom(),
             ]);
             return $req;
         }

         public function findOneById($id){
             $bdd = new BDD();
             $connexion = $bdd->getCo();
             $sql = "SELECT * FROM marque WHERE id = :id";
             $req = $connexion->prepare($sql);
             $req->execute(['id' => $id]);
             return $req;
         }

         public function delete(){
            $bdd = new BDD();
            $connexion = $bdd->getCo();
            $sql = "DELETE FROM marque WHERE id = :id;";
            $req = $connexion->prepare($sql);
            $req->execute([
                'id'=> $this->getId()
            ]);
            return $req;
        }

       

        public function updateMarque() {
            $bdd = new BDD();
            $connexion = $bdd->getCo();
            $sql = "UPDATE marque SET nom = :n WHERE id = :id;";
            $req = $connexion->prepare($sql);
            $req->execute([
                'n' => $this->getNom(),
                'id'=> $this->getId()
            ]);
            return $req;
        }

        


    }
?>