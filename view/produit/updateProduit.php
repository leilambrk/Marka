<h2 class="titlet"> Modifiez l'article. </h2>
<fieldset>
    <p>
      <?php
        //var_dump($idpa = $_GET['idProduit']);
        $idp = ModelProduit::getProduitByIdProduit($_GET['idProduit']);
        $idp = $idp->get('prix');
        //var_dump($idp);
        //var_dump($idpb= $idp->get('idProduit'));
        echo '<label for="new_price" class="bal">Modifiez le prix :</label><input type="price" id="newprice" name="newprice" value="' . $idp . '" required/><label for="€">€</label>';
       ?>
    </p>
    <p>
      <?php
        //var_dump($idpa = $_GET['idProduit']);
        $idp = ModelProduit::getProduitByIdProduit($_GET['idProduit']);
        $idp = $idp->get('description');
        echo '<label for="new_desc" class="bal">Modifiez la description :</label><input type="price" id="newdesc" name="newdesc" value="' . $idp . '" required/>';
       ?>
    </p>
    <p>
      <?php
        //var_dump($idpa = $_GET['idProduit']);
        $idp = ModelProduit::getProduitByIdProduit($_GET['idProduit']);
        $idp = $idp->get('taille');
        echo '<label for="new_size" class="bal">Modifiez la taille :</label><input type="price" id="newsize" name="newsize" value="' . $idp . '" required/>';
       ?>
    </p>

    <p>
      <input type="submit" value="Modifier" />
    </p>

  </fieldset>

</form>
