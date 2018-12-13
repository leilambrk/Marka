<h1>Tendances | Collection hommes</h1>


<article>
<?php

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article hommes.';
}else{
	foreach ($tab as $prod){
		$idp=$prod->get('idProduit');
		echo '<div><div class="item" /><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/> </div> <div class="info"> <h2>'. $prod->get('nomProduit') . '</h2><h3>Prix: ' . $prod->get('prix') . '€ </h3> Taille' . $prod->get('taille') . '<p class="descr">Description: ' . $prod->get('description') . '</p></div></div>';
		echo '<div class="info"><a class="addpanier" href=?action=ajouterPanier&controller=panier&idProduit=' . $idp . '> Ajouter au panier </a></div>';

		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			//$idp=$prod->get('idProduit');
			echo '  |  <a href=?action=updateProduit&controller=produit&idProduit=' . $idp . '> Modifier</a>  |  ';
			echo '<a href=?action=deleteProduit&controller=produit&idProduit=' . $idp . '> Supprimer</a>';

		}
	}
}


?>
</article>
