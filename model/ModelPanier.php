<?php
// BON
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelProduit.php'));

  class ModelPanier extends Model {

    protected static $object='panier';

    private $idProduit;


    public function __construct($u = NULL, $p = NULL, $d = NULL) {
      if (!is_null($u) && !is_null($d) && !is_null($p)){
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
      if (is_array($tab)){
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
      else {
        $sql = "SELECT * from produit WHERE idProduit=:id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "id" => $tab,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_p = $req_prep->fetchAll();
        return $tab_p;
      }




    }

}
?>
