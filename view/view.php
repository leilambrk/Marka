<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <div class="burger">
                <img src="images/burger.png" alt="burger" width="50px" height="50px">
                    <ul id="menu2" class="men">
                        <li class="align"><a href="?action=homepage&controller=accueil">Accueil</a></li>
                        <li class="align"><a href="#">Nos produits</a>
                            <ul class="rejoindre">
                                <li id="rej"><a href="?action=display1st&controller=produit">Hommes</a></li>
                                <li id="rej"><a href="?action=display2nd&controller=produit">Femmes</a></li>
                                <li id="rej"><a href="?action=display3rd&controller=produit">Enfants</a></li>
                        </li></ul>
                        <li class="align"><a href="?action=afficherPanier&controller=panier">Panier</a></li>
                        <?php if (isset($_SESSION['login'])){
                          echo'
                        <li class="align"><a href="?action=historique&controller=commande">Mes commandes</a></li>
                        <li class="align"><a href="?action=profile&controller=utilisateur">Mon profil</a></li>

                        <li>';}
                        else { echo '

                          <li class="align">  <a href="?action=create&controller=utilisateur">S\'inscrire</a></li>
                        </li>
                        <li class="align"><a href="?action=connect&controller=utilisateur">Se connecter</a></li>
                    </ul>';}
                    ?>
            </div>
            <nav>
                <div>
                    <ul id="menu" class="nav">
                        <li><a href="?action=homepage&controller=accueil">Accueil</a></li>
                        <li><a href="#">Nos produits</a>
                        <ul>
                                <li><a href="?action=display1st&controller=produit">Hommes</a></li>
                                <li><a href="?action=display2nd&controller=produit">Femmes</a></li>
                                <li><a href="?action=display3rd&controller=produit">Enfants</a></li>
                        </ul></li>
                        <li><a href="?action=afficherPanier&controller=panier">Panier</a></li>
                        <?php  if (!isset($_SESSION['login'])) { ?>
                                                    <li>
                                                        <a href="?action=create&controller=utilisateur">S'inscrire</a>
                                                    </li>
                                                    <li>
                                                        <a href="?action=connect&controller=utilisateur">Se connecter</a>
                                                    </li>
                                               <?php }
                                                    else
                                                        { ?>
                                                          <li><a href="?action=historique&controller=commande">Mes commandes</a></li>
                                                          <li>
                                                              <a href="?action=profile&controller=utilisateur">Mon profil</a>
                                                              <ul>
                                                                <li><a href="?action=profile&controller=utilisateur">Voir mon profil</a></li>
                                                                <li><a href="?action=deconnect&controller=utilisateur">Se deconnecter</a></li>
                                                              </ul>
                                                            </li>
                                            <?php } ?>
                          <?php  if (isset($_SESSION['admin'])) {
                                    if ($_SESSION['admin']==1){?><li><a href="?action=add&controller=produit">Ajouter un article</a></li>
                              <?php }}  ?>


                          </ul>
                </div>
            </nav>
        </header>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
    $filepath = File::build_path(array("view", static::$object, "$view.php"));
    require $filepath;
?>
    </body>
        <footer>
            <div class="footdiv">
                <p> Suivez nous sur les réseaux sociaux ! </p>
                    <a href="https://www.facebook.com/" target="_blank"><img id="logoFB" src="images/facebook.png" alt="logo facebook"> </a>
                    <a href="https://twitter.com/" target="_blank"><img id="logoTT" src="images/twitter.png" alt="logo twitter"> </a>
                    <a href="https://plus.google.com/" target="_blank"><img id="logoGP" src="images/googleplus.png" alt="logo google plus"> </a>
                </div>
        </footer>
</html>



            <!--            <nav>
                <ul>
                    <li>
                        <a href="?action=homepage&controller=accueil">Accueil</a>
                    </li>
                    <li>
                        <a href="?action=display&controller=produit">Nos produits</a>
                        <ul>
                            <li><a href="?action=display1st&controller=produit">Hommes</a></li>
                            <li><a href="?action=display2nd&controller=produit">Femmes</a></li>
                            <li><a href="?action=display3rd&controller=produit">Enfants</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?action=display&controller=panier">Panier</a>
                    </li>
                </ul>
            </nav>




                        <nav>
                <a href="?action=homepage&controller=accueil">Accueil</a>
                <a href="?action=display&controller=produit">Nos produits</a>
                <a href="?action=display1st&controller=produit">Hommes</a>
                <a href="?action=display2nd&controller=produit">Femmes</a>
                <a href="?action=display3rd&controller=produit">Enfants</a>
                <a href="?action=display&controller=panier">Panier</a>
            </nav>
            -->
