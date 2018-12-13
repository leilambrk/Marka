<?php
require_once File::build_path(array('model','ModelCommande.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('lib','Session.php'));

class ControllerCommande{

    protected static $object='commande';


	public static function error(){
        $controller ='commande';
        $view = 'error';
        $pagetitle = 'Error 404';
        require File::build_path(array('view','view.php'));
    }

     	public static function historique(){
      if (isset($_SESSION['login'])){
      $tab=ModelCommande::getAllCommandes();
      $view='list';
      $pagetitle = 'Mes commandes';
      require File::build_path(array('view','view.php'));
    }
    else {
      self::error;
    }
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

    public static function buy(){
      if (isset($_SESSION['login']) && isset($_COOKIE['panier'])){
        ModelCommande::savePanier(unserialize($_COOKIE['panier']));
        setcookie ("panier", "", time() - 1);
        ControllerAccueil::homepage();
      }
      else {
        self::error();
      }

    }

    public static function clear(){
      if (isset($_SESSION['login'])){
        ModelCommande::clearHistorique();
        ControllerAccueil::homepage();
      }
      else {
        self::error();
      }
    }




}
?>
