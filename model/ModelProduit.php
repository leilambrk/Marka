<?php
//BON
    require_once File::build_path(array("model","ModelGeneric.php"));
    require_once File::build_path(array("model","Model.php"));

    class ModelProduit extends Model{

        private $idProduit;
        private $idVendeur;
        private $nomProduit;
        private $nomCateg;
        private $description;
        private $prix;
        private $genre;
        private $couleur;
        private $taille;
        private $photo;

    public function __construct($idV = NULL, $n = NULL, $cate = NULL, $d = NULL, $pr = NULL, $g = NULL, $coul = NULL, $t = NULL, $ph = NULL) {
        if (!is_null($idV) && !is_null($n) && !is_null($cate) && !is_null($d) && !is_null($pr) && !is_null($g) && !is_null($coul) && !is_null($t)) {
            $this->idVendeur = $idV;
            $this->nomProduit = $n;
            $this->nomCateg = $cate;
            $this->description = $d;
            $this->prix = $pr;
            $this->genre = $g;
            $this->couleur = $coul;
            $this->taille = $t;
            $this->photo = $ph;
        }
    }

    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function setNomProduit($valeur) {
        if (strlen($valeur) < 100) {
            $this->nomProduit = $valeur;
        } else {
            echo "Le nom du produit doit être inferieure à 100 caractères";
        }
    }
 
    public function setCategorie($valeur) {
        if (strlen($valeur) < 50) {
            $this->categorie = $valeur;
        } else {
            echo "Le catégorie du produit doit être inferieure à 50 caractères";
        }
    }

    public function setDescription($valeur) {
        if (strlen($valeur) < 1000) {
            $this->description = $valeur;
        } else {
            echo "La description du produit doit être inferieure à 1000 caractères";
        }
    }

    public function setPrix($valeur) {
        if (strlen($valeur) < 5) {
            $this->prix = $valeur;
        } else {
            echo "Le prix du produit doit être inferieure à 5 caractères";
        }
    }

    public function setGenre($valeur) {
        $this->genre = $valeur;   
    }

    public function setCouleur($valeur) {
        $this->couleur = $valeur;    
    }

    public function setTaille($valeur) {
        $this->taille = $valeur;
    }

    public function setPhoto($valeur) {
        $this->photo = $valeur;
    }

    static public function getAllProduit() {
        $SQL_request = " SELECT * FROM Produit";
        $rep = Model::$pdo->query($SQL_request);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_p = $rep->fetchAll();
        return $tab_p;
    }

    public static function getProduitByCategorie($cate) {
        $sql = "SELECT * from Produits WHERE nomCateg=:nom_tag";
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
        
    public static function getProduitByNameAndGenre($name,$genre) {
        $sql = "SELECT * from Produits WHERE nomProduit LIKE :name2 and genre=:genre2";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "name2" => '%'.$name.'%',
            "genre2"=>$genre,
        ); 
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_p = $req_prep->fetchAll();
        if (empty($tab_p)){
            return $tab_p;
        }
        return $tab_p;
    }        
		
		public static function getProduitByIdProduit($idP) {
            $sql = "SELECT * from Produits WHERE idProduit=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $idP,
            ); 
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_p = $req_prep->fetchAll();
            if (empty($tab_p)){
                return $tab_p;
            }
            return $tab_p[0];
        }
        
        public static function deleteProduitByIdProduit($idP) {
            $sql = "Delete from Produit WHERE idProduit=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $idP,
            );
            return $req_prep->execute($values);
        }		
        
        public function save(){
			$sql = "INSERT INTO `Produits` 
			(`idProduit`, `idVendeur`, `nomProduit`, `categorie`,
			`description`, `prix`, `genre`, `couleur`, `taille`, `photo`)
			VALUES (\"" . "\"" . ","  . "\"" . $this->idVendeur . "\"" . ","  . "\"" . $this->nomProduit."\"" . ","  . "\"" . $this->categorie."\"" . ","  . "\"" . $this->description."\"" . ","  . "\"" . $this->prix."\"" . ","  . "\"" . $this->genre."\"" . ","  . "\"" . $this->couleur."\"" . ","  . "\"" . $this->taille."\"" . ","  . "\"" . $this->photo."\")";
			//car $this->idProduit auto incrémentation donc pas mettre
			
			// ex (NULL, '1', 'Blouson Nike', 'Veste','Très bon état', '55', '0', 'Bleu', '42','veste_nike_team_blue_blue_white_white_645480-463-001-2200px.jpg');
			
            Model::$pdo->query($sql);
            echo"produit enregistée";
        }

        //http://webinfo.iutmontp.univ-montp2.fr/~puechc/PHP/projet/
    }
?>