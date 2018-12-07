<?php  if (isset($_SESSION['login'])) { ?>

	<h1> Votre profil: </h1>
	<div>
		<ul>
			<li>Nom: <?php echo $infos->get('nom'); ?> </li>
			<li>Prénom: <?php echo $infos->get('prenom'); ?> </li>
			<li>Adresse: <?php echo $infos->get('adresse'). ", " .$infos->get('nomVille'); ?> </li>
			<li>E-mail: <?php echo $infos->get('email'); ?> </li>


		</ul>
	</div>
<?php }
else {?>
<li><a href="?action=create&controller=utilisateur">Vous vous êtes déjà connecté, cliquez ici pour voir votre profil.</a></li>
<?php
}?>
