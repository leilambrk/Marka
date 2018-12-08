<h1>Tendances | Collection femmes</h1>


<article>

<?php

//var_dump($tab);

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article femmes.';
}else{
	foreach ($tab as $prod){
		$idp=$prod->get('idProduit');
		echo '<div><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/><h2>'. $prod->get('nomProduit') . '</h2><h5>' . $prod->get('prix') . '€ </h5>' . $prod->get('taille') . '<p>' . $prod->get('description') . '</p></div>';
		echo '<a href=?action=ajouterPanier&controller=panier&idProduit=' . $idp . '> Ajouter au panier </a>';
		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			echo '<a name=' . $prod->get('idProduit') . '>Modifier</a>  |  ';
			echo '<a href=?action=deleteProduit&controller=produit&idProduit=' . $idp . '> Supprimer</a>  ';
		}
	}
}

?>

</article>
