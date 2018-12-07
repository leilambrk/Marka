<?php  if (!isset($_SESSION['login'])) { ?>

<form method="post" action="?action=connected&controller=utilisateur">


  <fieldset>
    <legend>Se connecter :</legend>
    <p>
      <label for="login_id">Adresse Mail</label> :
      <input type="text" placeholder="Ex : mabroukl@icloud.com" name="email" id="email" required/>
    </p>
    <p>
      <label for="pw_id">Mot de passe</label> :
      <input type="password" placeholder="Ex : motdepasse " name="password" id="password" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>

  </fieldset>
    <a href="?action=create&controller=utilisateur">S'inscrire</a>
</form>
<?php }
else {

}?>
<li><a href="?action=profile&controller=utilisateur">Vous vous êtes déjà connecté, cliquez ici pour voir votre profil.</a></li>
<?php}?>
