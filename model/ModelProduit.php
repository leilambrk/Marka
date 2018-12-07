<?php
//BON
    require_once File::build_path(array("model","Model.php"));

    class ModelProduit extends Model{

        private $idProduit;
        private $idVendeur;
        private $nomProduit;
        private $categorie;
        private $description;
        private $prix;
        private $taille;
        private $photo;

    public function __construct($idV = NULL, $n = NULL, $cate = NULL, $d = NULL, $pr = NULL, $t = NULL, $ph = NULL) {
        if (!is_null($idV) && !is_null($n) && !is_null($cate) && !is_null($d) && !is_null($pr) && !is_null($t) && !is_null($ph)) {
            $this->idVendeur = $idV;
            $this->nomProduit = $n;
            $this->categorie = $cate;
            $this->description = $d;
            $this->prix = $pr;
            $this->taille = $t;
            $this->photo = $ph;
        }
    }


    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut)){
            return $this->$nom_attribut;}
        return false;
    }


    static public function getAllProduit() {
        $SQL_request = " SELECT * FROM Produit";
        $rep = Model::$pdo->query($SQL_request);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_p = $rep->fetchAll();
        return $tab_p;
    }

    public static function getProduitByCategorie($cate) {
        $sql = "SELECT * from Produit WHERE nomCateg=:nom_tag";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $cate,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_p = $req_prep->fetchAll();
        if (empty($tab_p)){
            return $tab_p;
        }
        return $tab_p;
    }

        public static function deleteProduitByIdProduit($idP) {
            $sql = "DELETE * FROM Produit WHERE idProduit=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $idP,
            );
            return $req_prep->execute($values);
        }

        public function save(){
          $sql = "INSERT INTO produit (nomProduit, taille, prix, nomCateg, photo, description, vendeur) VALUES (:nom, :t, :p, :cat, :photo, :des, :idV)";
          var_dump($sql);
        // Préparation de la requête
          $req_prep = Model::$pdo->prepare($sql);


          $values = array(
              "nom" => $this->nomProduit,
              "t" => $this->taille,
              "p" => $this->prix,
              "cat" => $this->categorie,
              "photo" => $this->photo,
              "des" => $this->description,
              "idV" => $this->idVendeur,
          );
          // On donne les valeurs et on exécute la requête
          $req_prep->execute($values);

        //  http://webinfo.iutmontp.univ-montp2.fr/~puechc/PHP/projet/
    }
  }
?>
