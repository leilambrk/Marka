<h1>Panier</h1>


<article>
<?php

if ($tab != false){
foreach ($tab as $prod => $values) {
  echo '<h3> '. $values[1] .' x </h3>';
  echo '<div><img class="vet" src= "'. htmlspecialchars($values[0]->get('photo')) . '" alt="' . htmlspecialchars($values[0]->get('idProduit')). '"/><h2>'. htmlspecialchars($values[0]->get('nomProduit')) . '</h2><h5>' . htmlspecialchars($values[0]->get('prix')) . '€ </h5> Taille' . htmlspecialchars($values[0]->get('taille')) . '<p>' . htmlspecialchars($values[0]->get('description')) . '</p></div>';
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
