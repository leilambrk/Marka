<h1 class="titlet">Paiement</h1>
 <form <form id="paiement"> <!-- action = "?action=buy&controller=commande" > -->
<li>
<fieldset>

<?php
echo '<li><label> Commande n°  : ' . $numCommande . '</label></li>';
echo '<li><label> Nombre d\'article  : ' . $nombreArticle . '</label></li>';
echo '<li><label> Prix : ' . $prix . ' €</label></li>';
?>
</fieldset>
</li>

      <li>
        <fieldset>
            <li>
              <input  name=type_de_carte type=radio>
              <label for=visa>VISA</label>
            </li>
            <li>
              <input name=type_de_carte type=radio>
              <label for=amex>AmEx</label>
            </li>
            <li>
              <input name=type_de_carte type=radio>
              <label for=mastercard>Mastercard</label>
            </li>
        </fieldset>
      </li>
      <fieldset>

      <p>
          <label for="nom_id">N° de carte :</label>
          <input type="text" placeholder="Ex : xxxx-xxxx-xxxx-xxxx" name="nom" id="nom" required/>
      </p>
      <p>
          <label for="prenom_id">Cryptogramme :</label>
          <input type="text" placeholder="Ex : 123" name="prenom" id="prenom" required/>
      </p>
      <p>
          <label for="mail_id">Nom inscrit sur la carte :</label>
          <input type="text" placeholder="Ex : Mabrouk" name="email" id="email" required/>
      </p>
  </fieldset>

  <!-- <fieldset>
    <input type="submit" value="Payer" />
  </fieldset> -->
</form>
<a href="?action=buy&controller=commande">Payer</a>
