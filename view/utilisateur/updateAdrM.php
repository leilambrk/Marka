<?php  if (isset($_SESSION['login'])) { ?>

<form method="post" action="?action=updatedAdrM&controller=utilisateur">
	<fieldset>
    <legend>Modifier votre adresse mail</legend>
    <p>
      <label for="new_adrM">Nouvelle adresse :</label> 
      <input type="text" placeholder="Ex : 3 boulevard des tuileries " name="newadrM" id="newadrM" required/>
    </p>
  </fieldset>
</form>
<?php }
else {?>
<li>Veuillez vous <a href="?action=connect&controller=utilisateur">connecter</a>, ou <a href="?action=create&controller=utilisateur">créer un compte.</a></li>
<?php
}?>