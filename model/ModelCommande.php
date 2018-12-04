<?php
// BON
require_once File::build_path(array('model','Model.php'));
  class ModelCommande extends Model {
     
    private $idUser;
    private $idProduit;
    private $dateAchat;

    
    public function __construct($u = NULL, $p = NULL, $d = NULL) {
      if (!is_null($u) && !is_null($d) && !is_null($p)){
        $this->idUser = $u;
        $this->idProduit = $p;
        $this->dateAchat = $d;

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

}
?>
