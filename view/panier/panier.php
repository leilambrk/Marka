
<h1 class="titlet">Votre panier</h1>



<article>
<?php

if ($tab != false){
foreach ($tab as $prod => $values) {
  
  echo '<div><img class="pan" src= "'. htmlspecialchars($values[0]->get('photo')) . '" alt="' . htmlspecialchars($values[0]->get('idProduit')). '"/> <h3 class="qte">Quantité: '. $values[1] .' x </h3> <div class="info"><h2 class="titlea">'. htmlspecialchars($values[0]->get('nomProduit')) . '</h2><h5 class="textbienvenue">' . htmlspecialchars($values[0]->get('prix')) . '€ </h5> <h5 class="textbienvenue">Taille' . htmlspecialchars($values[0]->get('taille')) . '</h5><p class="textbienvenue">' . htmlspecialchars($values[0]->get('description')) . '</p></div></div>';
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
