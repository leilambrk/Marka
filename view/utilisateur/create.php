<?php  if (!isset($_SESSION['login'])) { ?>
<form method="post" action="?action=created&controller=utilisateur">
    <!-- On recupere les infos avec la methode post et on redirige vers la sauvegarde dans la base de donnees -->

    <fieldset>
        <legend>Formulaire d'inscription :</legend>

        <p>
            <label for="nom_id">Nom :</label>
            <input type="text" placeholder="Ex : Mabrouk" name="nom" id="nom" required/>
        </p>
        <p>
            <label for="prenom_id">Prenom :</label>
            <input type="text" placeholder="Ex : Leïla" name="prenom" id="prenom" required/>
        </p>
        <p>
            <label for="mail_id">Adresse mail :</label>
            <input type="email" placeholder="Ex : mabroukl@icloud.com" name="email" id="email" required/>
        </p>
        <p>
            <label for="addpost">Adresse postale :</label>
            <input type="text" placeholder="Ex : 71 chemin des plantiers" name="adresse" id="adresse" required/>
        </p>
        <p>
            <label for="ville">Ville :</label>
            <input type="text" placeholder="Ex : Montpellier" name="nomVille" id="nomVille" required/>
        </p>
        <p>
            <label for="ville">Pays :</label>
            <input type="text" placeholder="Ex : France " name="pays" id="pays" required/>
        </p>
        <p>
            <label for="pw1">Mot de passe :</label>
            <input type="password" placeholder="8 caractères minimum" name="password" id="password"  required/>
        </p>
        <p>
            <label for="pw2">Valider le mot de passe :</label>
            <input type="password" name="password_valid" id="password_valid" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
<?php }
else {?>
<li><a href="?action=profile&controller=utilisateur">Vous vous êtes déjà connecté, cliquez ici pour voir votre profil.</a></li>
<?php
}?>
