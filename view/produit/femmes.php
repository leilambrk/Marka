<h1>Tendances | Collection femme</h1>


<article>

<?php

//var_dump($tab);

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article femmes.';
}else{
	foreach ($tab as $prod){
		echo '<div><img class="vet" src= "'. $prod->get('photo') . '" alt="' . $prod->get('idProduit'). '"/><h2>'. $prod->get('nomProduit') . '</h2><h5>' . $prod->get('prix') . '€ </h5>' . $prod->get('taille') . '<p>' . $prod->get('description') . '</p></div>';
	}
}

?>

</article>


