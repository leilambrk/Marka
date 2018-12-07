<?php  if (isset($_SESSION['login'])) { ?>

<form method="post" action="?action=updatedPW&controller=utilisateur">
	<fieldset>
    <legend>Modifier votre mot de passe</legend>
    <p>
      <label for="old_pw">Ancien mot de passe :</label> 
      <input type="text" placeholder="Ex : motdepasse1 " name="oldpw" id="oldpw" required/>
    </p>
    <p>
      <label for="new_pw">Nouveau mot de passe :</label> 
      <input type="text" placeholder="Ex : motdepasse2 " name="newpw" id="newpw" required/>
    </p>
    <p>
      <label for="new_pw_c">Confirmation du nouveau mot de passe :</label> 
      <input type="text" placeholder="Ex : motdepasse2 " name="newpw_c" id="newpw_c" required/>
    </p>
  </fieldset>
</form>
<?php }
else {?>
<li>Veuillez vous <a href="?action=connect&controller=utilisateur">connecter</a>, ou <a href="?action=create&controller=utilisateur">créer un compte.</a></li>
<?php
}?>