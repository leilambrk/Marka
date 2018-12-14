
<h1 class="titlet">Votre panier</h1>



<article>
<?php

if ($tab != false){
foreach ($tab as $prod => $values) {
  echo '<h3> '. $values[1] .' x </h3>';
  echo '<div><img class="vet" src= "'. htmlspecialchars($values[0]->get('photo')) . '" alt="' . htmlspecialchars($values[0]->get('idProduit')). '"/> <div class="info"><h2>'. htmlspecialchars($values[0]->get('nomProduit')) . '</h2><h5>' . htmlspecialchars($values[0]->get('prix')) . '€ </h5> Taille' . htmlspecialchars($values[0]->get('taille')) . '<p>' . htmlspecialchars($values[0]->get('description')) . '</p></div></div>';
}
if ($tab != false){

  echo '<div class="info"><h2><a href=?action=viderPanier&controller=panier> Vider le panier </a></h2> </div>';
}
if ($tab == false){

  echo '<h3>Votre panier est vide</h3>';

}
echo '<div class="info"><a class="addpanier" href=?action=commander&controller=commande>Passer au paiement </a></div>';


}


?>
</article>
