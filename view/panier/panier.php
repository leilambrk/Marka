<h1>Panier</h1>


<article>
<?php

if ($tab != false){
foreach ($tab as $prod) {
  echo '<div><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/><h2>'. $prod->get('nomProduit') . '</h2><h5>' . $prod->get('prix') . '€ </h5> Taille' . $prod->get('taille') . '<p>' . $prod->get('description') . '</p></div>';
}
if ($tab != false){

  echo '<h3><a href=?action=viderPanier&controller=panier> Vider le panier </a></h3>';
}
if ($tab == false){

  echo '<h3>Votre panier est vide</h3>';

}
echo '<h3><a href=?action=commander&controller=commande>Passer au paiement </a></h3>';


}


?>
</article>
