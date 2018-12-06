<?php 
require_once File::build_path(array('model','ModelUtilisateur.php'));

class ControllerProfil
{

    protected static $object='Profil';

    public static function profile()
    {   
        if (isset($_SESSION['login'])) {
            $infos = ModelUtilisateur::selectByEmail($_SESSION['login']);      
        }
        $controller ='profil';
        $view = 'voirmonprofil';
        $pagetitle = 'Mon Profil';
        require File::build_path(array('view','view.php')); 
    }

	 public static function error()
    {
    $controller ='profil';
    $view = 'error';
    $pagetitle = 'Error 404';
    require File::build_path(array('view','view.php'));
    }
} ?>