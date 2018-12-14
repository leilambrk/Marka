<h2 class="titlet"> Ajoutez un nouvel article. </h2>
  <form method="post" action="?action=adder&controller=produit">
    <!-- On recupere les infos avec la methode post et on redirige vers la sauvegarde dans la base de donnees -->

    <fieldset>

        <p>
            <label for="nom" class="bal">Nom de l'article :</label>
            <input type="text" placeholder="Levi's Jeans" name="nom" id="nom" required/>

        </p>
        <p>
            <label for="taille" class="bal">Taille :</label>
            <input type="text" placeholder="Ex : 42" name="taille" id="taille" required/>
        </p>
        <p>
            <label for="prix" class="bal">Prix  :</label>
            <input type="prix" placeholder="Ex : 152" name="prix" id="prix" required/>
            <label for="€">€</label>

        </p>
        <p>
          <label for="categorie" class="bal"> Catégorie :</label>
          <select name='categorie'> <label for="categorie"> Catégorie :</label>
            <option value="Hommes">Hommes</option>
            <option value="Femmes">Femmes</option>
            <option value="Enfants">Enfants</option>
          </select>
        </p>
        <p>
            <label for="photo" class="bal">URL (photo du produit) :</label>
            <input type="photo" placeholder="Ex : http://image.noelshack.com/..... " name="photo" id="photo" required/>
        </p>
        <p>
            <label for="description" class="bal">Description du produit :</label>
            <input type="text" placeholder="Ex : Jean de bonne qualité ..." name="description" id="description"/>
        </p>
        <p>
            <input type="submit" value="Ajouter" />
        </p>
    </fieldset>
</form>
