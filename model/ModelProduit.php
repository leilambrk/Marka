
<?php
	
	//dans index $ROOT_FOLDER = "home/ann2/votre_login/~puechc/";
	
	//mettre dans le routeur.php require_once "../lib/File.php";

    require_once File::build_path(array("model","ModelGeneric.php"));
    require_once File::build_path(array("model","Model.php"));
    //faire comme ca pour tous les les require

    class ModelProduit extends ModelGeneric{
		
		protected static $object="produit";

        private $idProduit;
        private $idVendeur;
        private $nomProduit;
        private $categorie;
        private $description;
        private $prix;
        private $genre;
        private $couleur;
        private $taille;
        private $photo;

        // un getter      
        public function getIdProduit() {
            return $this->idProduit;
        }

        // un getter      
        public function getIdVendeur() {
            return $this->idVendeur;
        }

        // un getter      
        public function getNomProduit() {
            return $this->nomProduit;
        }

        // un setter 
        public function setNomProduit($nomProduit2) {
            if (strlen($nomProduit2) < 100) {
                $this->nomProduit = $nomProduit2;
            } else {
                echo "Le nom du produit doit être inferieure à 100 caractères";
            }
        }
        
        // un getter      
        public function getCategorie() {
            return $this->categorie;
        }

        // un setter 
        public function setCategorie($categorie2) {
            if (strlen($categorie2) < 50) {
                $this->categorie = $categorie2;
            } else {
                echo "Le catégorie du produit doit être inferieure à 50 caractères";
            }
        }
		
		// un getter      
        public function getDescription() {
            return $this->description;
        }

        // un setter 
        public function setDescription($description2) {
            if (strlen($description2) < 1000) {
                $this->description = $description2;
            } else {
                echo "La description du produit doit être inferieure à 1000 caractères";
            }
        }
		
		// un getter      
        public function getPrix() {
            return $this->prix;
        }

        // un setter 
        public function setPrix($prix2) {
            if (strlen($prix2) < 5) {
                $this->prix = $prix2;
            } else {
                echo "Le prix du produit doit être inferieure à 5 caractères";
            }
        }
        
        // un getter      
        public function getGenre() {
            return $this->genre;
        }

        // un setter 
        public function setGenre($genre2) {
            $this->genre = $genre2;   
        }
        
        // un getter      
        public function getCouleur() {
            return $this->couleur;
        }

        // un setter 
        public function setCouleur($couleur2) {
            $this->couleur = $couleur2;    
        }
        
		// un getter
        public function getTaille() {
            return $this->taille;
        }

        // un setter 
        public function setTaille($taille2) {
            $this->taille = $taille2;
        }
		
		// un getter
        public function getPhoto() {
            return $this->photo;
        }

        // un setter 
        public function setPhoto($photo2) {
            $this->photo = $photo2;
        }

        public function __construct($idV = NULL, $n = NULL,
		$cate = NULL, $d = NULL, $pr = NULL, $g = NULL, $coul = NULL, $t = NULL,
		$ph = NULL) {
            if (!is_null($idV) && !is_null($n)
				&& !is_null($cate) && !is_null($d) && !is_null($pr) && !is_null($g)
				&& !is_null($coul) && !is_null($t)) {
                // Si aucun de attributs sont nuls,
                // c'est forcement qu'on les a fournis
                // donc on retombe sur le constructeur à 3 arguments
                //$this->idProduit = $idP;
                $this->idVendeur = $idV;
                $this->nomProduit = $n;
				$this->categorie = $cate;
                $this->description = $d;
                $this->prix = $pr;
				$this->genre = $g;
                $this->couleur = $coul;
                $this->taille = $t;
				$this->photo = $ph;
            }
        }

        // une methode d'affichage.
        //public function afficher() {
          //  echo"<br>";
            //echo "Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur)";
        //}

        static public function getAllProduit() {
            $SQL_request = " SELECT * FROM Produits";
            $rep = Model::$pdo->query($SQL_request);

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_p = $rep->fetchAll();

            return $tab_p;
        }

        public static function getProduitByCategorie($cate) {
            $sql = "SELECT * from Produits WHERE categorie=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $cate,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_p = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_p)){
                return $tab_p;
            }
            return $tab_p;
        }
        
        public static function getProduitByNameAndGenre($name,$genre) {
            $sql = "SELECT * from Produits WHERE nomProduit LIKE :name2 and genre=:genre2";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "name2" => '%'.$name.'%',
                "genre2"=>$genre,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_p = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_p)){
                return $tab_p;
            }
            return $tab_p;
        }        
		
		public static function getProduitByIdProduit($idP) {
            $sql = "SELECT * from Produits WHERE idProduit=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $idP,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_p = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_p)){
                return $tab_p;
            }
            return $tab_p[0];
        }
        
        public static function deleteProduitByIdProduit($idP) {
            $sql = "Delete from Produits WHERE idProduit=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $idP,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            

            return $req_prep->execute($values); // 0 si n'a pas delete
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