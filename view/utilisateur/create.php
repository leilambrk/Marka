<?php  if (!isset($_SESSION['login'])) { ?>

<h2 class="titlet"> Bienvenue sur le site Marka, inscrivez vous pour bénéficier de nos offres. </h2>

<form class="form2" method="post" action="?action=created&controller=utilisateur">
    <!-- On recupere les infos avec la methode post et on redirige vers la sauvegarde dans la base de donnees -->

    <fieldset class="connect2">
        
        <p>
            <label for="nom_id" class="bal">Nom :</label>
            <input class="label" type="text" placeholder="Ex : Mabrouk" name="nom" id="nom" required/>
        </p>
        <p>
            <label for="prenom_id" class="bal">Prenom :</label>
            <input class="label" type="text" placeholder="Ex : Leïla" name="prenom" id="prenom" required/>
        </p>
        <p>
            <label for="mail_id" class="bal">Adresse mail :</label>
            <input class="label" type="email" placeholder="Ex : mabroukl@icloud.com" name="email" id="email" required/>
        </p>
        <p>
            <label for="addpost" class="bal">Adresse postale :</label>
            <input class="label" type="text" placeholder="Ex : 71 chemin des plantiers" name="adresse" id="adresse" required/>
        </p>
        <p>
            <label for="ville" class="bal">Ville :</label>
            <input class="label" type="text" placeholder="Ex : Montpellier" name="nomVille" id="nomVille" required/>
        </p>
        <p>
            <label for="ville" class="bal">Pays :</label>
            <input class="label" type="text" placeholder="Ex : France " name="pays" id="pays" required/>
        </p>
        <p>
            <label for="pw1" class="bal">Mot de passe :</label>
            <input class="label" type="password" placeholder="8 caractères minimum" name="password" id="password"  required/>
        </p>
        <p>
            <label for="pw2" class="bal">Valider le mot de passe :</label>
            <input class="label" type="password" name="password_valid" id="password_valid" required/>
        </p>
        <p>
            <input type="submit" value="S'inscrire" />
        </p>
    </fieldset>
</form>
<?php }
else {?>
<li><a href="?action=profile&controller=utilisateur">Vous vous êtes déjà connecté, cliquez ici pour voir votre profil.</a></li>
<?php
}?>
