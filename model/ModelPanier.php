<?php

class ModelPanier extends Model{

  private $commande;
  private $produit;
  private $quantite;

    public function __construct($comm = NULL, $prod = NULL, $quant = NULL) {
      if (!is_null($c) && !is_null($p) && !is_null($q)) {

        $this->idCommande = $comm;
        $this->idProduit = $prod;
        $this->idQuantite = $quant;
      }
    }

    public function getCommande() {
        return $this->idCommande;  
    }

    public function getProduit(){
        return $this->idProduit;
    }      
}
?>
