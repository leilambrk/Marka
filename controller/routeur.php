<?php
require_once File::build_path(array('controller','ControllerAccueil.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('controller','ControllerCommande.php'));
require_once File::build_path(array('controller','ControllerProduit.php'));
require_once File::build_path(array('controller','ControllerPanier.php'));



/*------ Controllers ------*/
	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
	}else{
		$controller = "accueil";
	}
	$controller_class = "Controller" . ucfirst($controller);



/*------ Actions ------*/
	if(class_exists($controller_class)){
		if(isset($_GET['action'])){ //si l'action est précisée, alors
			$action = $_GET['action']; //on exécute l'action
		}else{
			$action = "homepage"; //sinon, action par défaut
		}

		if(in_array($action, get_class_methods($controller_class))){
			$controller_class::$action();

		}else{
			$pagetitle='Erreur';
	        $view='error';
	        $controller = "accueil";
			require_once (File::build_path(array("view", "view.php")));
		}
	}
	else
	{
		$pagetitle='Erreur';
	    $view='error';
	    $controller = "accueil";
		require_once (File::build_path(array("view", "view.php")));
	}
?>
