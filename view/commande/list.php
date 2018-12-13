<h1>Mes commandes</h1>


<article>
<?php

if (!empty($tab)){
foreach ($tab as $prod) {
  echo '<div><img class="vet" src= "'. $prod['photo'] . '"/><h2>'. $prod['nomProduit'] . '</h2><h5>' . $prod['prix'] . '€ </h5> Taille' . $prod['taille'] . '<p>' . $prod['description'] . '</p></div>';
}
}
else {

  echo '<h3>Vous n\'avez pas encore passer de commande</h3>';

}




?>

<a href="?action=clear&controller=commande">Supprimer l'historique des commandes </a>
</article>
