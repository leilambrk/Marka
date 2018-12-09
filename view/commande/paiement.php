<h1>Paiement</h1>


<article>
<?php
echo '<li><label Commande n°  : ' . $numCommande . '</label></li>';
echo '<li><label> Nombre d\'article  : ' . $nombreArticle . '</label></li>';
echo '<li><label> Prix : ' . $prix . ' €</label></li>';
?>

<form id=paiement>
    <legend>Informations CB</legend>
      <li>
        <fieldset>
          <legend>Type de carte bancaire</legend>
            <li>
              <input id=visa name=type_de_carte type=radio>
              <label for=visa>VISA</label>
            </li>
            <li>
              <input id=amex name=type_de_carte type=radio>
              <label for=amex>AmEx</label>
            </li>
            <li>
              <input id=mastercard name=type_de_carte type=radio>
              <label for=mastercard>Mastercard</label>
            </li>
        </fieldset>
      </li>
      <li>
        <label for=numero_de_carte>N° de carte</label>
        <input id=numero_de_carte placeholder="XXXX - XXXX - XXXX - XXXX" name=numero_de_carte type=number required>
      </li>
      <li>
        <label for=securite>Code sécurité</label>
        <input id=securite placeholder="123" name=securite type=number required>
      </li>
      <li>
        <label for=nom_porteur>Nom du porteur</label>
        <input id=nom_porteur placeholder="Mabrouk" name=nom_porteur type=text placeholder="Même nom que sur la carte" required>
      </li>
  </fieldset>

  <fieldset>
    <button type=submit>J'achète !</button>
  </fieldset>
</form>

</article>
