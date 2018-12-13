<h1>panier</h1>


<article>
<?php

$tab = ControllerPanier::ReadAllPanier();
if ($tab != false){
  foreach ($tab as $key) {
    echo '<div><img class="vet" src= "'. htmlspecialchars($prod->get('photo')) . '" alt="' . htmlspecialchars($prod->get('idProduit')). '"/><h2>'. htmlspecialchars($prod->get('nomProduit')) . '</h2><h5>' . htmlspecialchars($prod->get('prix')) . '€ </h5> Taille' . htmlspecialchars($prod->get('taille')) . '<p>' . htmlspecialchars($prod->get('description')) . '</p></div>';
  }
}


?>
</article>
