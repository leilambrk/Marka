<?php
require_once File::build_path(array('model','ModelPanier.php'));

class ControllerPanier{

    protected static $object='panier';

	public static function afficherPanier(){
    $tab = ControllerPanier::ReadAllPanier();
    $view = 'panier';
    $pagetitle = 'Mon panier';
    require File::build_path(array('view', 'view.php'));
	}

  public static function ajouterPanier(){
    if (!isset($_COOKIE["panier"])){
      $tab = array(
      $_GET['idProduit']
      );
      $produit=serialize($tab);
      setcookie("panier", $produit , time()+3600);
      ControllerAccueil::homepage();
    }
    else {
      $tab = array(
        $_GET['idProduit']
      );
      array_push($tab,unserialize($_COOKIE["panier"]));
      $produit=serialize($tab);
      setcookie("panier", $produit , time()+3600);
      ControllerAccueil::homepage();
    }
  }


  public static function ReadAllPanier(){
    if (isset($_COOKIE["panier"])){
        $tab = unserialize($_COOKIE["panier"]);
        $produits = ModelPanier::getAllPanier($tab);
        return $produits;
    }
    return false;
  }

	public static function error(){
        $controller ='panier';
        $view = 'error';
        $pagetitle = 'Error 404';
        require File::build_path(array('view','view.php'));
    }

    public static function viderPanier(){
      setcookie ("panier", "", time() - 1);
      ControllerAccueil::homepage();
    }
}
?>
