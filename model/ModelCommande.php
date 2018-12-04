<?php
// un getAllCommandes() get() et save()
  class ModelCommande extends Model {
     
    private $idUtilisateur;
    private $dateCommande;
    private $panier;
    
    public function __construct($u = NULL, $d = NULL, $p = NULL) {
      if (!is_null($u) && !is_null($d) && !is_null($p)) {
        $this->idUtilisateur = $u[0];
        $this->dateCommande = $d;
        $this->panier = $p;
      }
    }  

    public static function getAllCommandes(){
        require_once 'Model.php';
        $rep = Model::$pdo->query("SELECT * FROM Commandes");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_commandes = $rep->fetchAll();
        return $tab_commandes;
    }


       public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function save(){

        //on créé la commande
         $sql = "INSERT INTO Commandes (idUtilisateur, dateCommande) VALUES (:i, :d)";

         require_once 'Model.php';

           $req_prep = Model::$pdo->prepare($sql);

           $values = array(
              "i" => $this->idUtilisateur,
              "d" => $this->dateCommande,
          );

         try{
              $req_prep->execute($values);
         }
         catch (PDOException $e){
            echo'1';
            var_dump($e);
             return false;
         }

         //on cherche l'idCommande
         $sql = "SELECT idCommande FROM Commandes WHERE idUtilisateur = :i AND dateCommande = :d";

        require_once 'Model.php';

         $req_prep = Model::$pdo->prepare($sql);

         $values = array(
            "i" => $this->idUtilisateur,
            "d" => $this->dateCommande,
         );

        try{
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_COLUMN, 0);
            $id = $req_prep->fetchAll();
        }
        catch (PDOException $e){
             echo'2';
            echo $e->getMessage();
            return false;
        }

        //on créé des uniteCommande
        for ($i=0; $i < count($this->panier) - 1; $i++) { 
            $sql = "INSERT INTO uniteCommande (idCommande, idProduit, quantite) VALUES (:co, :ch, :q)";

             require_once 'Model.php';
             require_once (File::build_path(array('model','ModelProduit.php')));

               $req_prep = Model::$pdo->prepare($sql);

               $values = array(
                  "co" => $id[0],
                  "ch" => ModelProduit::getId($this->panier['nomProduit'][$i]),
                  "q" => $this->panier['qte'][$i],
              );

             try{
                  $req_prep->execute($values);
             }
             catch (PDOException $e){
                 echo'3';
                echo $e->getMessage();
                 return false;
             }
        }

        return true;
     }   

 
}
?>
