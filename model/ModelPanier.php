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

    
    public static function Panier(){
        require_once 'Model.php';
        $rep = Model::$pdo->query("SELECT * FROM Paniers");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tab_paniers = $rep->fetchAll();
        return $tab_paniers;
    }


       
}
?>
