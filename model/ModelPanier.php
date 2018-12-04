<?php

class ModelPanier {

  private $commande;
  private $produit;
  private $quantite;

  public function __construct( $idAdherent = NULL, $typeContrat = NULL, $tailleContrat = NULL, $frequenceContrat = NULL){
        if (!is_null($idAdherent) && !is_null($typeContrat) && !is_null($tailleContrat) && !is_null($frequenceContrat)) {

            $this->idAdherent = $idAdherent;
            $this->typeContrat = $typeContrat;
            $this->tailleContrat = $tailleContrat;
            $this->frequenceContrat = $frequenceContrat;
        }
    }

    
    public static function Panier(){
        require_once 'Model.php';
        $rep = Model::$pdo->query("SELECT * FROM Paniers");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tab_paniers = $rep->fetchAll();
        return $tab_paniers;
    }

    //à faire
    // public static function getAllPaniersDeCommande(){
    //     require_once 'Model.php';
    //     $rep = Model::$pdo->query("SELECT * FROM Chaussures");
    //     $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelChaussure');
    //     $tab_chaussures = $rep->fetchAll();
    //     return $tab_chaussures;
    // }

    // a getter
    public function getCommande() {
        return $this->idCommande;  
    }

    public function getProduit(){
        return $this->idProduit;
    }

     public function getQuantite(){
        return $this->quantite;
    }
        
    // a constructor
    public function __construct($c = NULL, $p = NULL, $q = NULL) {
      if (!is_null($c) && !is_null($p) && !is_null($q)) {
        // If both $m, $c and $i are not NULL, 
        // then they must have been supplied
        // so fall back to constructor with 3 arguments
        $this->idCommande = $c;
        $this->idProduit = $p;
        $this->idQuantite = $q;
      }
    }     
   
}
?>
