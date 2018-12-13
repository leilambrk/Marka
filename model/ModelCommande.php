<?php
// BON
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelProduit.php'));

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

    // public static function getAllCommandes(){
    //       $sql = "SELECT * FROM commande c
    //         JOIN achat a on c.idCommande = a.idCommande
    //         WHERE client=:e ";
    //       $req_prep = Model::$pdo->prepare($sql);
    //       $values = array(
    //           "e" => $_SESSION['login'],
    //       );
    //     $req_prep->execute($values);
    //     $tab = $req_prep->fetchAll();
    //     //$tab1 = array_count_values($tab);
    //     var_dump($tab);
    //     return $tab;
    // }

    public static function getAllCommandes(){
          $sql = "SELECT achat.idCommande,date,SUM(prix)
            FROM achat JOIN commande
            On achat.idCommande=commande.idCommande
            WHERE client=:e
            GROUP BY (achat.idCommande) ";
          $req_prep = Model::$pdo->prepare($sql);
          $values = array(
              "e" => $_SESSION['login'],
          );
        $req_prep->execute($values);
        $tab = $req_prep->fetchAll();
        return $tab;
    }




    public static function getNbOfCommande(){
      $rep = Model::$pdo->query("SELECT MAX(idCommande) FROM commande");
      $rep = $rep->fetchAll();
      return $rep[0][0] + 1;
    }

    public static function savePanier($tab){
      $produit = array();
      foreach ($tab as $id){
      array_push($produit,ModelProduit::getProduitByIdProduit($id));
      }
        $sql = "INSERT INTO commande (date, client) VALUES (:d, :cli)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "d" => date('Y-m-d H:i:s'),
            "cli" => $_SESSION['login'],
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        foreach ($produit as $tab) {
          $sql = "INSERT INTO achat (idCommande, nomProduit, description, prix, photo, taille) VALUES (:idC, :n, :d, :prix, :p, :t)";
          $req_prep = Model::$pdo->prepare($sql);
          $values = array(
              ":idC" => self::getNbOfCommande()-1,
              ":n" => $tab->get('nomProduit'),
              ":d" => $tab->get('description'),
              ":prix" => $tab->get('prix'),
              ":p" => $tab->get('photo'),
              ":t" => $tab->get('taille'),
          );
          // On donne les valeurs et on exécute la requête
          $req_prep->execute($values);
        }

      }

      public static function clearHistorique(){
        $sql = "DELETE FROM achat WHERE achat.idCommande IN (
          Select commande.idCommande from commande
          WHERE client=:c)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "c" => $_SESSION['login'],
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);
      }


}
?>
