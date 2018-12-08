<?php

require_once File::build_path(array("model","Model.php"));

class ModelUtilisateur extends Model {

	protected static $object="utilisateur";
    private $idUser;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $dateInscription;
    private $adresse;
    private $nomVille;
    private $pays;
    private $admin;



		public function __construct($id = null ,$nom = null, $prenom = null, $email = null, $dateInscription = null, $password=null,$adresse = null, $nomVille = null, $pays = null, $admin = 0)
		    {
		        if (!is_null($nom) && !is_null($prenom) && !is_null($email) &&!is_null($dateInscription) && !is_null($password) && !is_null($adresse) && !is_null($nomVille) &&!is_null($pays)){
		        $this->idUser = null;
		        $this->nom = $nom;
		        $this->prenom = $prenom;
		        $this->password = $password;
		        $this->email = $email;
		        $this->dateInscription = $dateInscription;
		        $this->adresse = $adresse;
		        $this->nomVille = $nomVille;
		        $this->pays = $pays;
		        $this->admin=0;

		        }
		    }
		public function save()
		{
				$sql = "INSERT INTO Utilisateur (nom, prenom, email, password, dateInscription, adresse, nomVille, pays) VALUES (:nom, :prenom, :email, :pw, :da, :addre, :nomVille, :pays)";
			// Préparation de la requête
				$req_prep = Model::$pdo->prepare($sql);


				$values = array(
						"nom" => $this->nom,
						"prenom" => $this->prenom,
						"email" => $this->email,
						"pw" => $this->password,
						"da" => $this->dateInscription,
						"addre" => $this->adresse,
						"nomVille" => $this->nomVille,
						"pays" => $this->pays,
				);
				// On donne les valeurs et on exécute la requête
				$req_prep->execute($values);
		}



    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function setId($id){
        $this->idUser = $id;
    }

    public function setNom($nom){
        if (strlen($nom) < 30 && strlen($nom) > 0){
            $this->nom = $nom;
        }
    }

    public function setPrenom($prenom){
        if (strlen($prenom) < 30 && strlen($prenom) > 0) {
            $this->prenom = $prenom;
        }
    }

    public function setEmail($email){
        if (strlen($email) < 50 && strlen($email) > 5) {
            $this->email = $email;
        }
    }

    public function setAdresse($adresse){
        if (strlen($adresse) < 100 && strlen($adresse) > 2){
            $this->adresse = $adresse;
        }
    }

    public function setNomVille($nomVille){
        if (strlen($nomVille) < 30 && strlen($nomVille) > 2){
            $this->nomVille = $nomVille;
        }
    }

    public function setPays($pays){
        if (strlen($pays) < 30 && strlen($pays) > 2){
            $this->pays = $pays;
        }
    }

    public function setAdmin($num){
        $this->admin = $num;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public static function supprimer($idUser){
        $req = Model::$pdo->prepare('DELETE FROM Utilisateur WHERE id = :id');
        $req->bindValue(':id', $idUser);
        $req->execute();
    }

		public static function selectByEmail($email){
		        error_reporting(E_ALL & ~E_NOTICE);
		        $sql = "SELECT * FROM Utilisateur U WHERE email=:email";

		        // Préparation de la requête
		        $req_prep = Model::$pdo->prepare($sql);


		        $values = array(
		            "email" => $email,
		        );
		        // On donne les valeurs et on exécute la requête
		        $req_prep->execute($values);
		        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');

		        $tab = $req_prep->fetchAll();
		        return $tab[0];

		    }
		public function isUse(){
			$sql = "SELECT * FROM utilisateur WHERE email=:nom_tag";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
					"nom_tag" => $this->email,
			);
			$req_prep->execute($values);
			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
			$tab = $req_prep->fetchAll();
			if (empty($tab)){
				return false;
			}
			return true;

		}


    public function checkPW($email, $mdpchiffre)
    {

        $sql = "SELECT * FROM Utilisateur WHERE email=:email";

        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $data = array(
            "email" => $email,);

        $req_prep->execute($data);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');

        $tab = $req_prep->fetchAll();


        return ($tab[0]->email==$email) && ($tab[0]->password==$mdpchiffre);

    }

//------------------------------------------------------------------------

//INSCRIPTIONS ET SESSIONS
    public function isValid (){
        if (strlen($this->nom)>2 && strlen($this->prenom)>2 && strlen($this->email) > 5
            && strlen($this->password)>7 && strlen($this->adresse)>2 && strlen($this->nomVille)>2
            &&strlen($this->pays)>2){
            return true;
        }
        else {
            return false;
        }
    }

}
?>
