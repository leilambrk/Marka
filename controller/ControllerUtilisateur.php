<?php 
//BON
require_once File::build_path(array('model','ModelUtilisateur.php'));
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
    $p = new ModelUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password'],$date
    ,$_POST['adresse'],$_POST['nomVille'],$_POST['pays']);
    if ($_POST['password']==$_POST['password_valid']){ //on recupere les infos du formulaires
        $p->save(); // on les sauve dans la base de donnees
        $_SESSION['login']=$_POST['email'];
        $view = 'voirmonprofil';
        $pagetitle = 'Liste des personnes';
        require File::build_path(array('view','view.php'));
        //redirige vers la vue created.php
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
       $login = $_POST['email'];
       var_dump(ModelUtilisateur::selectByEmail($login)->get(password));
    //    var_dump($_POST['email']);
	//	if (isset($_POST['email'])&&isset($_POST['password'])){
	//		$login = $_POST['email'];
	//		//$pw = Securite::chiffrer($_POST['password']);
	//		if (ModelUtilisateur::selectByEmail($login)){
    //            if (ModelUtilisateur::selectByEmail($login)->get('password'))==$_POST['password']){	
	//				echo 'on est là mtn';
    //                //$_SESSION['login'] = $login;
	//				//$a = ModelUtilisateur::selectByEmail($login);
	//				//ControllerProfil::profile();
	//			} 
	//			else {
	//				self::error();
	//				echo 'Mdp incorrect';
	//			}
	//		} 
	//		else {
	//			self::error();
	//			echo 'email incorrect';
	//		}	
	//	} 
	//	else {
	//		self::error();
	//		echo 'erreur de type inconnue, veuillez rééssayer ultérieurement';
	//	}
	}


    public static function error()
    {
	    $controller ='utilisateur';
	    $view = 'error';
	    $pagetitle = 'error 404';
	    require File::build_path(array('view','view.php'));
    }

}
?>