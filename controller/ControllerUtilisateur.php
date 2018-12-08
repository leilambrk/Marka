<?php
//BON
require_once File::build_path(array('model','ModelUtilisateur.php'));
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('lib','Session.php'));
class ControllerUtilisateur{


    protected static $object='utilisateur';

    public static function readAll()
    {
        $tab_pers = ModelPersonne::selectAll();
        //appel au modèle pour gerer la BD
        $view = 'list';
        $pagetitle = 'Liste des personnes';
        require File::build_path(array('view','view.php'));
        //"redirige" vers la vue list.php qui affiche la liste des personnes
    }

	public static function read()
    {
    	$p = $_GET['idPersonne'];

        $p = ModelPersonne::select($p);
        //appel au modèle pour gerer la BD

        if($p)
        {
        $view = 'detail';
        $pagetitle = 'Personnes';
        require File::build_path(array('view','view.php'));
        //"redirige" vers la vue qui affiche les details d'une personne
        }
        else
        {
        $view = 'error';
        $pagetitle = 'Error 404';
        require File::build_path(array('view','view.php'));
        //"redirige" vers la vue erreur.php qui affiche un msg d'erreur
        }
    }

    public static function create()
    {
    $controller ='utilisateur';
    $view = 'create';
    $pagetitle = 'Inscription';
    require File::build_path(array('view','view.php'));
        //redirige vers la vue create.php (formulaire)
    }

public static function created()
    {
    $date = date('Y-m-d H:i:s');
    $mdp=Security::chiffrer($_POST['password']);
    $id=null;
    $admin=null;
    $p = new ModelUtilisateur($id,$_POST['nom'],$_POST['prenom'],$_POST['email'],$date,$mdp,$_POST['adresse'],$_POST['nomVille'],$_POST['pays'],$admin);
    if ($_POST['password']==$_POST['password_valid']){ //on recupere les infos du formulaires
        $p->save(); // on les sauve dans la base de donnees
        $_SESSION['login']=$_POST['email'];
        $_SESSION['admin']=$p->get('admin');
        self::profile();
        //redirige vers la vue monprofil
    }
    else {
        self::error();
    }

    }


    public static function connect(){
		$view = 'connect';
		$pagetitle = 'Se connecter';
		require File::build_path(array('view','view.php'));
	}

  public static function connected(){
          if (isset($_POST['email'])&&isset($_POST['password']))
          {
              $login = $_POST['email'];
              $mdp = Security::chiffrer($_POST['password']);
              $user = ModelUtilisateur::selectByEmail($login);
              if (!empty($user)){
                  if ($user->get('password') == $mdp){
                          $_SESSION['login'] = $login;
                          $_SESSION['admin'] = $user->get('admin');
                          self::profile();
                  }
                  else {
                      $view = 'connect';
                      $pagetitle = 'Erreur de connexion mdp';
                      require File::build_path(array('view','view.php'));
                  }
              }
              else {
                  $view = 'connect';
                  $pagetitle = 'Erreur de connexion mail';
                  require File::build_path(array('view','view.php'));
              }
          }
          else {
              self::error();
         }
      }


    public static function profile()
    {
        if (isset($_SESSION['login'])) {
            $infos = ModelUtilisateur::selectByEmail($_SESSION['login']);
        }
        $controller ='utilisateur';
        $view = 'voirmonprofil';
        $pagetitle = 'Mon Profil';
        require File::build_path(array('view','view.php'));
    }


    public static function error()
    {
	    $controller ='utilisateur';
	    $view = 'error';
	    $pagetitle = 'Error 404';
	    require File::build_path(array('view','view.php'));
    }

      public static function deconnect()
		{
			session_unset();

			ControllerAccueil::homepage();
		}

    public static function updateAdrL(){
      $view = 'updateAdrL';
      $pagetitle = 'Modifier l\'adresse de livraisaon';
      require File::build_path(array('view','view.php'));
    }

    public static function updateAdrM(){
      $view = 'updateAdrM';
      $pagetitle = 'Modifier l\'adresse mail';
      require File::build_path(array('view','view.php'));
    }

    public static function updatePW(){
      $view = 'updatePW';
      $pagetitle = 'Modifier le mot de passe';
      require File::build_path(array('view','view.php'));
    }

    public static function updatedAdrL(){
      $a=$_POST['newadrL'];
      $b=$_POST['newVille'];
      $primary='email';
      $table_name='utilisateur';
      $primary_value=$_SESSION['login'];
      ModelUtilisateur::update($primary, $primary_value, $table_name, array("adresse"=>$a, "nomVille"=>$b));
      self::profile();
    }

    public static function updatedAdrM(){
      $a=$_POST['newadrM'];
      $primary='email';
      $table_name='utilisateur';
      $primary_value=$_SESSION['login'];
      Model::update($primary, $primary_value, $table_name, array("email"=>$a));
      $_SESSION['login']=$a;
      self::profile();
    }

}
?>
