<h1  class="titlet">Mes commandes</h1>


<article>
<?php

if ($tab != false){
  foreach ($tab as $key) {

    echo '<div><h5>Commande n°'. htmlspecialchars($key['0']) . '</h5><h5>Date de la commande : ' . htmlspecialchars($key['1']) . ' </h5> Prix total de la commande :' . htmlspecialchars($key['2']) . '€</div>';
  }
}




?>

<h5><a href="?action=clear&controller=commande">Supprimer l'historique des commandes </a></h5>
</article>
