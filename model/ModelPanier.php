<?php

class ModelPanier extends Model{

  private $idCommande;
  private $idProduit;
  private $quantite;

    public function __construct($comm = NULL, $prod = NULL, $quant = NULL) {
      if (!is_null($c) && !is_null($p) && !is_null($q)) {

        $this->idCommande = $comm;
        $this->idProduit = $prod;
        $this->quantite = $quant;
      }
    }

        public function get($nom_attribut){
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }     
}
?>
