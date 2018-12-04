<h1> Inscription </h1>

<p> Inscrivez vous afin de bénéficier des nouveautés sur le site. </p>

<form action="/inscription" method="post">
    <div>
        <label for="name">Nom :</label>
        <input type="text" placeholder="Dupont" id="name" name="user_name">
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" placeholder="Jacque" id="name" name="prenom">
    </div>
    <div>
        <label for="mail">E-mail :</label>
        <input type="email" placeholder="marka@gmail.com" id="mail" name="user_mail">
    </div>
     <div>
        <label for="mail">Mot de passe :</label>
        <input type="password" placeholder="8 caractère minimum" id="password" name="password" size=20 >
    </div>
    <div>
        <label for="mail">Date de naissance :</label>
        <input type="date" placeholder="JJ/MM/AAAA" id="date" name="date_naissance">
    </div>
    <div>
    <input type="submit" value="Envoyer" />
	</div>
</form>