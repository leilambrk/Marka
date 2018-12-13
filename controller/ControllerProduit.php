<?php 
//BON
require_once File::build_path(array('model','ModelProduit.php'));
class ControllerProduit{


protected static $object='produit';

    public static function display()
    {
        $controller ='produit';
        $view = 'produits';
        $pagetitle = 'Nos produits';
        //require File::build_path(array('Model','ModelProduit.php')); 
        $tab_p = ModelProduit::getAllProduit();
        require File::build_path(array('view','view.php')); 
    }
    public static function display1st()
    {
        $controller ='produit';
        $view = 'hommes';
        $pagetitle = 'Collection Homme';
        require File::build_path(array('view','view.php')); 
    }
    public static function display2nd()
    {
        $controller ='produit';
        $view = 'femmes';
        $pagetitle = 'Collection Femme';
        require File::build_path(array('view','view.php')); 
    }
    public static function display3rd()
    {
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

    


} 
?>