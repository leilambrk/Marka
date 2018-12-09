<?php
// BON
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelProduit.php'));

  class ModelPanier extends Model {

    protected static $object='panier';

    private $idProduit;


    public function __construct($p = NULL) {
      if (!is_null($p)){
        $this->idProduit = $p;

      }
    }

    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut)){
            return $this->$nom_attribut;
          }
        return false;
    }

    public static function getAllPanier($tab){
        $tab_prod = array();
        foreach ($tab as $id){
          $sql = "SELECT * from produit WHERE idProduit=:id";
          $req_prep = Model::$pdo->prepare($sql);
          $values = array(
              "id" => $id,
          );
          $req_prep->execute($values);
          $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
          $tab_p = $req_prep->fetchAll();
          array_push ($tab_prod, $tab_p[0]);
        }
        return $tab_prod;
    }

      public static function getPrixPanier($tab){
          $somme = 0;
          foreach ($tab as $id){
            $sql = "SELECT prix from produit WHERE idProduit=:id";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "id" => $id,
            );
            $req_prep->execute($values);
            $rep = $req_prep->fetchAll();
            $somme = $somme + $rep[0]['prix'];
        }
        return $somme;


      }

        public static function nbProduit($tab){
          $nb = 0;
            foreach ($tab as $id){
              $nb = $nb + 1;
            }
          return $nb;
        }


}
?>
