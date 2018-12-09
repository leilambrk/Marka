<?php
// BON
require_once File::build_path(array('model','Model.php'));
  class ModelCommande extends Model {

    protected static $object='utilisateur';

    private $idCommande;
    private $client;
    private $date;


    public function __construct($u = NULL, $p = NULL, $d = NULL) {
      if (!is_null($u) && !is_null($d) && !is_null($p)){
        $this->idCommande = $u;
        $this->client = $p;
        $this->date = $d;

      }
    }

    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public static function getAllCommandes(){
        require_once 'Model.php';
        $rep = Model::$pdo->query("SELECT * FROM Commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_commandes = $rep->fetchAll();
        return $tab_commandes;
    }

    public static function getNbOfCommande(){
      $rep = Model::$pdo->query("SELECT MAX(idCommande) FROM commande");
      $rep = $rep->fetchAll();
      return $rep[0][0] + 1;
    }

    public static function savePanier($tab){
      $produit = array();
      foreach ($tab as $id){
      array_push($produit,getProduitByIdProduit($id));
      }
      
    }

}
?>
