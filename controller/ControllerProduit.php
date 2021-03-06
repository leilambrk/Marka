<?php
//BON
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('model','ModelProduit.php'));
class ControllerProduit{


protected static $object='produit';


    // public static function displayerH(){
    //   $tab = ModelProduit::getProduitByCategorie('Hommes');
    //   return $tab;
    // }
    //
    // public static function displayerF(){
    //   $tab = ModelProduit::getProduitByCategorie('Femmes');
    //   return $tab;
    // }
    //
    // public static function displayerE(){
    //   $tab = ModelProduit::getProduitByCategorie('Enfants');
    //   return $tab;
    // }

    public static function display1st()
    {
        $tab = ModelProduit::getProduitByCategorie('Hommes');
        $controller ='produit';
        $view = 'hommes';
        $pagetitle = 'Collection Homme';
        require File::build_path(array('view','view.php'));
    }

    public static function display2nd()
    {
        $tab = ModelProduit::getProduitByCategorie('Femmes');
        $controller ='produit';
        $view = 'femmes';
        $pagetitle = 'Collection Femme';
        require File::build_path(array('view','view.php'));
    }


    public static function display3rd()
    {
        $tab = ModelProduit::getProduitByCategorie('Enfants');
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
      if (isset($_SESSION['login']) && ($_SESSION['admin'] == 1) ) {
        $controller ='produit';
        $view = 'add';
        $pagetitle = 'Ajoutez un article';
        require File::build_path(array('view','view.php'));
      }
      else {
        self::error();
      }
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

    public static function deleteProduit(){

      //var_dump($_GET['idProduit']);
      if ($_SESSION['login'] == 1) {
        self::error();
      }
      else {
        ModelProduit::deleteProduitByIdProduit($_GET['idProduit']);
        $view = 'hommes';
        $pagetitle = 'Article supprimé';
        $tab = ModelProduit::getProduitByCategorie('Hommes');
        require File::build_path(array('view','view.php'));
      }
    }

      //  //var_dump($_GET['idProduit']);
      //  ModelProduit::deleteProduitByIdProduit($_GET['idProduit']);
      //  $tab = ModelProduit::getProduitByCategorie('Hommes');
      //  ControllerAccueil::homepage();


    public static function updateProduit(){
      if ($_SESSION['admin'] == 1){
      $controller='produit';
      $view = 'updateProduit';
      $pagetitle = 'Modifier l\'article';
      require File::build_path(array('view','view.php'));
    }
    else {
      self::error();
    }
    }

    public static function updated(){
      if ($_SESSION['admin'] == 1){
      $a=$_POST['newprice'];
      $b=$_POST['newsize'];
      $c=$_POST['newdesc'];
      $primary='idProduit';
      $table_name='produit';
      $primary_value=$_GET['idProduit'];
      //var_dump($_GET['idProduit']);
      Model::update($primary, $primary_value, $table_name, array("prix"=>$a, "taille"=>$b, "description"=>$c));
      //ModelUtilisateur::update($primary, $primary_value, $table_name, array("adresse"=>$a, "nomVille"=>$b));
      ControllerUtilisateur::profile();
    }
    else {
      self::error();
    }
    }



}
?>
