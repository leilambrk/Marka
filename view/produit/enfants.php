<h1>Tendances | Collection enfants</h1>


<article>

<?php

//var_dump($tab);

if (!$tab){
	echo 'Rupture totale ! Revenez vite pour plus d\'article enfants.';
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




<!--<h1>Tendances | Mode ENFANTS</h1>

<aside class="aside">
<h3 id="pageHomme">Collection Filles</h3>

<ul class="list1">
	<li><a href="">Jeans</a></li>
	<li><a href="">T-shirt</a></li>
	<li><a href="">Robes</a></li>
	<li><a href="">Vestes</a></li>
	<li><a href="">Tenues de fêtes</a></li>
</ul>


<h3  id="pageHomme">Collection Garçons</h3>

<ul class="list1">
	<li><a href="">Jeans</a></li>
	<li><a href="">Chemises</a></li>
	<li><a href="">Pull</a></li>
	<li><a href="">Vestes</a></li>
	<li><a href="">Tenues de fêtes</a></li>





</aside>

<img src="images">



<h2 class="h2"> Filles </h2>
<img src="images/salopette.jpeg" alt="Jean" class="vet" />
<img src="images/robefille.jpg" alt="Pull" class="vet" />
<img src="images/tshirtfille.jpeg" alt="T-shirt" class="vet" />






<h2 class="h2"> Garçons </h2>
<img src="images/veste.jpg" alt="Veste" class="vet" />
<img src="images/chemise.jpg" alt="chemise" class="vet" />
<img src="images/pullg.jpg" alt="Pull" class="vet" />-->
