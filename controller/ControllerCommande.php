<?php 

class ControllerCommande
{

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
}
?>