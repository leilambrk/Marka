	<h1> Votre profil: </h1>
	<div>
		<ul>
			<li>Nom: <?php echo $infos->get('nom'); ?> </li>
			<li>Prénom: <?php echo $infos->get('prenom'); ?> </li>
			<li>Adresse: <?php echo $infos->get('adresse'). ", " .$infos->get('nomVille'); ?> </li>
			<li>E-mail: <?php echo $infos->get('email'); ?> </li>


		</ul>
	</div>
