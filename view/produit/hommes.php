<h1>Tendances | Collection hommes</h1>


<article>
<?php

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article hommes.';
}else{
	foreach ($tab as $prod){
		$idp=$prod->get('idProduit');
		echo '<div><img class="vet" src= "'. htmlspecialchars($prod->get('photo')) . '" alt="' . htmlspecialchars($prod->get('idProduit')). '"/><h2>'. htmlspecialchars($prod->get('nomProduit')) . '</h2><h5>' . htmlspecialchars($prod->get('prix')) . '€ </h5> Taille' . htmlspecialchars($prod->get('taille')) . '<p>' . htmlspecialchars($prod->get('description')) . '</p></div>';
		echo '<a href=?action=ajouterPanier&controller=panier&idProduit=' . rawurlencode($idp) . '> Ajouter au panier </a>';

		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			//$idp=$prod->get('idProduit');
			echo '  |  <a href=?action=updateProduit&controller=produit&idProduit=' . rawurlencode($idp) . '> Modifier</a>  |  ';
			echo '<a href=?action=deleteProduit&controller=produit&idProduit=' . rawurlencode($idp) . '> Supprimer</a>';

		}
	}
}


?>
</article>
