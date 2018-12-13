<h1>Tendances | Collection femmes</h1>


<article>

<?php

//var_dump($tab);

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article femmes.';
}else{
	foreach ($tab as $prod){
		$idp=$prod->get('idProduit');
		echo '<div><div class="item" /><img class="vet" src= "'. htmlspecialchars($prod->get('photo')) . '" alt="' . htmlspecialchars($prod->get('idProduit')). '"/> </div> <div class="info"> <h2>'. htmlspecialchars($prod->get('nomProduit')) . '</h2><h3>Prix: ' . htmlspecialchars($prod->get('prix')) . '€  </h3> Taille :' . htmlspecialchars($prod->get('taille')) . '<p class="descr">Description: ' . htmlspecialchars($prod->get('description')) . '</p></div></div>';
		echo '<div class="info"><a class="addpanier" href=?action=ajouterPanier&controller=panier&idProduit=' . rawurlencode($idp) . '> Ajouter au panier </a></div>';


		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			//$idp=$prod->get('idProduit');
			echo '  |  <a href=?action=updateProduit&controller=produit&idProduit=' . rawurlencode($idp) . '> Modifier</a>  |  ';
			echo '<a href=?action=deleteProduit&controller=produit&idProduit=' . rawurlencode($idp) . '> Supprimer</a>';

		}
	}
}

?>

</article>
