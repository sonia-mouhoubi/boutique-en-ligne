<?php
ob_start(); 
 
?>
<section class="form-product">
    <h3>Ajouter une nouveau produit</h3>

    <form method="post" enctype="multipart/form-data" action="">
        <fieldset>
            <label for="nameProduct">Nom du produit</label>
            <input type="text" id="product" name="nameProduct" placeholder="Nom de produit">

            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description du produit"></textarea>

            <label for="image">Photo</label>
            <input type="file" id="image" name="image">
        </fieldset>

        <fieldset>
            <label for="idCategory">Categorie</label>
            <select name="idCategory">
                <?php foreach ($resCat as $value) { ?>
                        <option>
                            <?= htmlspecialchars($value['type_de_cheveux'])?>
                        </option>
                <?php } ?>
            </select><br>

            <label for="idSubCategory">Sous categorie</label>
            <select name="idSubCategory">
                <?php foreach ($resSubCat as $value) { ?>
                    <option>
                        <?= htmlspecialchars($value['nom_du_produit'])?>
                    </option>
                <?php } ?>
            </select><br>
        </fieldset>
        <fieldset>
            <label for="formats">Format</label>
            <select name="formats" required>
                <option value="Grand">Grand</option>
                <option value="Mini">Mini</option>
            </select><br>

            <label for="priceHT">Prix HT</label>
            <input type="text" id="priceHT" name="priceHT" placeholder="Prix HT">

            <label for="TVA">TVA</label required>
            <input type="text" id="TVA" name="TVA" placeholder="TVA du produit">

            <label for="priceTTC">Prix TTC</label>
            <input type="text" id="priceTTC" name="priceTTC" placeholder="Prix du produit TTC">
            
            <label for="stock">Stock</label>
            <input type="text" id="stock" name="stock" placeholder="Stock du produit">
        </fieldset>
        <input type="submit" name="register" value="Enregistrer">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
</section>

<?php $contentproduct = ob_get_clean(); 

require('adminView.php');
?>