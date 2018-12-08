<h1>Tendances | Collection hommes</h1>


<article>
<?php

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article hommes.';
}else{
	foreach ($tab as $prod){
		echo '<div><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/><h2>'. $prod->get('nomProduit') . '</h2><h5>' . $prod->get('prix') . '€ </h5> Taille' . $prod->get('taille') . '<p>' . $prod->get('description') . '</p></div>';
		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
			echo '<a name=' . $prod->get('idProduit') . '>Modifier</a>  |  ';

			$idp=$prod->get('idProduit');

			echo '<a href=?action=deleteProduit&controller=produit&idProduit=' . $idp . '> Supprimer</a>';

		}
	}
}


?>
</article>
