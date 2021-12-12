<?php

class ModeleManager extends Modele {
    public function findByMarque(int $id){
		$bdd = new BDD();
		$connexion = $bdd->getCo();
		$sql = "SELECT * FROM modele WHERE marque = :id";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id' => $id
		]);
		return $req;
	}

	public function findNbModeles(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();
		$sql = "SELECT mo.id FROM marque ma INNER JOIN modele e ON mo.marque = c.id WHERE c.id = :id";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id' => $this->getId()
		]);
		return $req;
	}

     public function findAll() {
         $bdd = new BDD();
         $connexion = $bdd->getCo();
         $sql = "SELECT * FROM modele";
         $req = $connexion->prepare($sql);
         $req->execute();
         return $req;
     }

	public function save(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();
		$sql = "INSERT INTO modele(nom, prix, marque) VALUES (:n, :p, :m);";
		$req = $connexion->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
            'p' => $this->getPrix(),
			'm' => $this->getMarque()
		]);

		return $req;
	}

      public function findOneById($id){
          $bdd = new BDD();
          $connexion = $bdd->getCo();
          $sql = "SELECT * FROM modele WHERE id = :id";
          $req = $connexion->prepare($sql);
          $req->execute(['id' => $id]);
          return $req;
      }

	  public function updateModele() {
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
	
	public function deleteModele(){
		$bdd = new BDD();
		$connexion = $bdd->getCo();
		$sql = "DELETE FROM modele WHERE id = :id;";
		$req = $connexion->prepare($sql);
		$req->execute([
			'id'=> $this->getId()
		]);
		return $req;
	}
}