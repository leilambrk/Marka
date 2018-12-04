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


    public function __construct($id = null , $nom, $prenom, $email, $dateInscription, $adresse, $nomVille, $pays, $admin = 0)
    {
        $this->idUser = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->email = $email;
        $this->confirm_email = $confirm_email;
        $this->dateInscription = $dateInscription;
        $this->adresse = $adresse;
        $this->nomVille = $nomVille;
        $this->pays = $pays;
        $this->rang = $rang;
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
        $req = Model::$pdo->prepare('DELETE FROM Utilisateurs WHERE id = :id');
        $req->bindValue(':id', $idUser);
        $req->execute();
    }


//INSCRIPTIONS ET SESSIONS
    public function isValid (){

        $this->errors = [];

        $valid =  $this->checkNom() && $this->checkPrenom() && $this->checkEmail()
            && $this->checkPassword() && $this->checkAdresse() && $this->checkVille()
            && $this->checkPays();

        if ($valid)
        {
            $this->password = $this->hashPassword($this->password);
        }

        return $this->errors;
    }

    public function checkNom ()
    {
        if (strlen($this->nom) > 2 && strlen($this->nom) <= 30)
        {
            return true;
        }

        $this->errors['nom'] = "Nom trop long ou trop court";
        return false;
    }

    public function checkPrenom ()
    {
        if (strlen($this->prenom) > 2 && strlen($this->prenom) <= 30)
        {
            return true;
        }

        $this->errors['prenom'] = 'Prénom invalide';
        return false;
    }

    public function checkEmail ()
    {

        $valid = 1;

        if (strcmp($this->email, $this->confirm_email) !== 0)
        {
            $valid = 0;
            $this->errors['email'] = 'email ne correspond pas';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $this->errors['email'] = 'email pas valide';
        }

        // On cherche dans la base de donnée si l'email est déjà utiliser
        if ($valid)
        {

            $req = Model::$pdo->prepare('SELECT COUNT(*) AS cpt FROM Utilisateurs WHERE email = :email');
            $req->bindValue(':email', $this->get('email'));
            $req->execute();
            $info_user = $req->fetch();

            if ($info_user['cpt'] >= 1)
            {
                $valid = 0;
                $errors['email'] = 'email est déjà utilisé';
            }

        }

        return $valid;
    }

    public function checkPassword ()
    {

        $valid = 1;

        if (strlen($this->password) < 5)
        {
            $valid = 0;
            $this->errors['password'] = 'password trop court';
        }

        if (strcmp($this->password, $this->confirm_password) !== 0)
        {
            $valid = 0;
            $this->errors['password'] = 'Les mots de passe ne correspond pas';
        }

        return $valid;
    }

    public function checkAdresse ()
    {
        if (strlen($this->adresse) > 2 && strlen($this->adresse) < 100)
        {
            return true;
        }
        $this->errors['adresse'] = 'erreur adresse';

        return false;
    }

    public function checkVille()
    {
        if (strlen($this->nomVille) > 2 && strlen($this->nomVille) < 30)
        {
            return true;
        }
        $this->errors['ville'] = 'erreur ville';
        return false;
    }

    public function checkPays ()
    {
        if (strlen($this->pays) > 2 && strlen($this->pays) < 30)
        {
            return true;
        }
        $this->errors['pays'] = 'error pays';
        return false;
    }

    private function hashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // CONNEXION

    /**
     * Authentification d'un utilisateur
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function auth ($email, $password)
    {

        // On cherche l'utilisateur en fonction de son email et on vérifie que son compte a bien été validé
        $req = Model::$pdo->prepare('SELECT * FROM Utilisateurs WHERE email = :email && confirm_date IS NOT NULL');
        $req->bindValue(':email', $email);
        $req->execute();
        $info_user = $req->fetch();

        // On vérifie que le mot de passe est bien le bon
        if (!empty($password) && password_verify($password, $info_user['password']))
        {
            // On créer un nouveau model
            $user = new ModelUtilisateur(
                $info_user['id'],
                $info_user['nom'],
                $info_user['prenom'],
                $info_user['password'],
                null,
                $info_user['email'],
                null,
                $info_user['dateInscription'],
                $info_user['adresse'],
                $info_user['nomVille'],
                $info_user['pays'],
                $info_user['rang']
            );

            // On connecte le nouvelle utilisateur
            $user->login();

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Connecte l'utilisateur
     */
    private function login ()
    {

        $_SESSION['user'] = array(
            'id' => $this->get('idUser'),
            'nom' => $this->get('nom'),
            'prenom' =>$this->get('prenom'),
            'password' => $this->get('password'),
            'email' => $this->get('email'),
            'dateInscription' => $this->get('dateInscription'),
            'adresse' => $this->get('adresse'),
            'nomVille' => $this->get('nomVille'),
            'pays' => $this->get('pays'),
            'rang' => $this->get('admin')
        );

        $_SESSION['flash'] = 'Bienvenu ' . $this->get('nom') . ' ' . $this->prenom;

    }


    public static function confirmation ($idUser, $token)
    {

        $req = Model::$pdo->prepare('SELECT * FROM Utilisateurs WHERE id = :id');
        $req->bindValue(':id', $idUser);
        $req->execute();
        $info_user = $req->fetch();

        // Si le token est bien le même
        if ($token == $info_user['confirm_token'])
        {
            $update = Model::$pdo->prepare('UPDATE Utilisateurs SET confirm_date = :confirm_date WHERE id = :id');
            $update->bindValue(':confirm_date', date('Y-m-d H:i:s'));
            $update->bindValue(':id', $idUser);
            $update->execute();

            // On créer un nouveau model
            $user = new ModelUtilisateur(
                $info_user['id'],
                $info_user['nom'],
                $info_user['prenom'],
                $info_user['password'],
                null,
                $info_user['email'],
                null,
                $info_user['dateInscription'],
                $info_user['adresse'],
                $info_user['nomVille'],
                $info_user['pays'],
                $info_user['rang']
            );

            // On connecte le nouvelle utilisateur
            $user->login();

            return TRUE;
        }

        return FALSE;
    }


    public static function getAllUser ()
    {
        $req = Model::$pdo->query('SELECT * FROM Utilisateurs');

        // On transforme tous les éléments en object ModelUtilisateur
//         $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUtilisateur');

        $users = [];

        foreach ($req->fetchAll() as $data)
        {
            $user = new ModelUtilisateur(
                $data['id'],
                $data['nom'],
                $data['prenom'],
                $data['password'],
                null,
                $data['email'],
                null,
                $data['dateInscription'],
                $data['adresse'],
                $data['nomVille'],
                $data['pays'],
                $data['rang']
            );
            $users[] =  $user;
        }

        return $users;
    }


    public function save ()
    {

        $date = date('Y-m-d H:i:s');

        $token = Str::random(300);

        $req = Model::$pdo->prepare('INSERT INTO Utilisateurs 
                  (nom, prenom, email, password, dateInscription, adresse, nomVille, pays) 
                  VALUES (:nom, :prenom, :email, :password, :dateInscription, :adresse, :nomVille, :pays)');
        $req->bindValue(':nom', $this->get('nom'));
        $req->bindValue(':prenom', $this->get('prenom'));
        $req->bindValue(':email', $this->get('email'));
        $req->bindValue(':password', $this->get('password'));
        $req->bindValue(':dateInscription', $date);
        $req->bindValue(':adresse', $this->get('adresse'));
        $req->bindValue(':nomVille', $this->get('nomVille'));
        $req->bindValue(':pays', $this->get('pays'));
        $req->bindValue(':confirm_token', $token);
        $req->execute();

        $idUser = Model::$pdo->lastInsertId();

        $message = 'Votre compte a bien été enregistrer cliquer sur le lien suivant pour valider votre compte : http://localhost/vente-en-ligne/?url=confirmation&id=' . $idUser . '&token=' . $token;

        $this->sendMail($message);
    }

    private function sendMail ($message)
    {
        mail($this->email, 'Inscription - Vente en ligne', $message);
    }

}
?>