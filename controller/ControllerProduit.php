<?php
//BON
require_once File::build_path(array('model','ModelProduit.php'));
class ControllerProduit{


protected static $object='produit';


    public static function displayerH(){
      $tab = ModelProduit::getProduitByCategorie('Hommes');
      return $tab;
    }

    public static function displayerF(){
      $tab = ModelProduit::getProduitByCategorie('Femmes');
      return $tab;
    }

    public static function displayerE(){
      $tab = ModelProduit::getProduitByCategorie('Enfants');
      return $tab;
    }

    public static function display1st()
    {
        $tab = self::displayerH();
        $controller ='produit';
        $view = 'hommes';
        $pagetitle = 'Collection Homme';
        require File::build_path(array('view','view.php'));
    }

    public static function display2nd()
    {
        $tab = self::displayerF();
        $controller ='produit';
        $view = 'femmes';
        $pagetitle = 'Collection Femme';
        require File::build_path(array('view','view.php'));
    }


    public static function display3rd()
    {
        $tab = self::displayerE();
        $controller ='produit';
        $view = 'enfants';
        $pagetitle = 'Collection Enfant';
        require File::build_path(array('view','view.php'));
    }

    public static function error(){
        $controller ='produit';
        $view = 'error';
        $pagetitle = 'Error 404';
        require File::build_path(array('view','view.php'));
    }

    public static function add(){
      $controller ='produit';
      $view = 'add';
      $pagetitle = 'Ajoutez un article';
      require File::build_path(array('view','view.php'));
    }

    public static function adder(){
      if ( is_numeric($_POST['prix']) && $_SESSION['admin'] == 1)
      {
        $produit = new ModelProduit($_SESSION['login'],$_POST['nom'],$_POST['categorie'],
        $_POST['description'],$_POST['prix'],$_POST['taille'],$_POST['photo']);
        $produit->save();
        $controller ='produit';
        $view = 'add';
        $pagetitle = 'Article ajouté';
        require File::build_path(array('view','view.php'));
      }
      else {
          self::error();
      }


    }


}
?>
