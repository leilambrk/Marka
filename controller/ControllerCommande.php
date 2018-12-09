<?php
require_once File::build_path(array('model','ModelCommande.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('lib','Session.php'));

class ControllerCommande{

    protected static $object='commande';

	public static function afficherPanier(){
		$controller ='commande';
        $view = 'panier';
        $pagetitle = 'Mon panier';
        require File::build_path(array('view', 'view.php'));
	}

	public static function error(){
        $controller ='commande';
        $view = 'error';
        $pagetitle = 'Error 404';
        require File::build_path(array('view','view.php'));
    }

    public static function commander(){
      if (!isset($_SESSION['login'])) {
        ControllerUtilisateur::connect();
      }
      else {
        $prix = ModelPanier::getPrixPanier(unserialize($_COOKIE["panier"]));
        $nombreArticle =ModelPanier::nbProduit(unserialize($_COOKIE["panier"]));
        $numCommande = ModelCommande::getNbOfCommande();
        $view = 'paiement';
        $pagetitle = 'Commande';
        require File::build_path(array('view', 'view.php'));
    }
    }




}
?>
