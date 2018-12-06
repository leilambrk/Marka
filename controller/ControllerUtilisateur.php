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
    $controller ='personne';
    $view = 'create';
    $pagetitle = 'Inscription';
    require File::build_path(array('view','view.php')); 
        //redirige vers la vue create.php (formulaire)
    }

    public static function created() 
    {
    $p = new ModelPersonne($_POST['nomPersonne'],$_POST['prenomPersonne'],$_POST['mailPersonne']); //on recupere les infos du formulaires
    $p->save(); // on les sauve dans la base de donnees
    $controller ='personne';
    $view = 'created';
    $pagetitle = 'Liste des personnes';
    require File::build_path(array('view','view.php'));
        //redirige vers la vue created.php

    }

    public static function connect(){
		$view = 'connect';
		$pagetitle = 'Se connecter';
		require File::build_path(array('view','view.php'));
	}

	public static function connected(){
		if (isset($_POST['email'])&&isset($_POST['password'])){
			$login = $_POST['email'];
			//$pw = Securite::chiffrer($_POST['password']);
			if (ModelUtilisateur::selectByEmail($_POST['email'])){
				echo 'On est la ';
				//if (ModelUtilisateur::selectByEmail($login)->checkPW($login, $pw)){	
				//	$_SESSION['login'] = $login;
				//	$a = ModelUtilisateur::selectByEmail($login);
				//	ControllerProfil::profile();
				//} 
				//else {
				//	self::error();
				//	echo 'Mdp incorrect';
				//}
			} 
			else {
				self::error();
				echo 'email incorrect';
			}	
		} 
		else {
			self::error();
			echo 'erreur de type inconnue, veuillez rééssayer ultérieurement';
		}
	}

    public static function error()
    {
	    $controller ='utilisateur';
	    $view = 'error';
	    $pagetitle = 'Error 404';
	    require File::build_path(array('view','view.php'));
    }

}
?>