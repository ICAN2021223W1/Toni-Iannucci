<?php
    class Modele {
        private $id;
        private $nom;
        private $prix;

        public function setId( int $id) : self {
            $this->id = $id;
            return $this;
        }

        public function getId() : int {
            return $this->id;
        }

        public function setNom(string $nom) {
            $this->nom = $nom;
            return $this;
        }

        public function getNom() {
            return $this->nom;
        }

        public function setPrix(float $prix) : self 
        {
            $this->prix = $prix;
            return $this;
        }

        public function getPrix() : float 
        {
            return $this->prix;
        }

        public function setMarque(int $marque) : self
	    {
		$this->marque = $marque;
		return $this;
	    }

	    public function getMarque() : int
	    {
		return $this->marque;

	    }
    }
?>