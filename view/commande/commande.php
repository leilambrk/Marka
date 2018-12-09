<h1>panier</h1>


<article>
<?php

$tab = ControllerPanier::ReadAllPanier();
if ($tab != false){
  foreach ($tab as $key) {
    echo '<div><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/><h2>'. $prod->get('nomProduit') . '</h2><h5>' . $prod->get('prix') . '€ </h5> Taille' . $prod->get('taille') . '<p>' . $prod->get('description') . '</p></div>';
  }
}


?>
</article>
