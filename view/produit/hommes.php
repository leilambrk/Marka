//<form method="post" action="?action=diplayerH&controller=produit">

	<h1>Tendances | Mode HOMMES</h1>

<?php
require_once File::build_path(array('model','ModelProduit.php'));
require_once File::build_path(array('controller','ControllerProduit.php'));

		$tab = ControllerProduit::displayerH();
		var_dump($tab);
		foreach ($tab as $key => $value) {
			echo '<h4> ' . $tab[$key]->get('nomProduit') . '</h4>';
			echo '<img src="' . $tab[$key]->get('photo') . '"/><br>';
			echo '<label> ' . $tab[$key]->get('description') . '</label>';
			echo '<h5> ' . $tab[$key]->get('prix') . '€</h5>';
			echo '<label> De taille ' . $tab[$key]->get('taille') . '</label>';
			echo '<br><label> ---------------------------------------------------------------------------------------------------------------------------------------------</label>';


		}
		?>
<img src=""/>
