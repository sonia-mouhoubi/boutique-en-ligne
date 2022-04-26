<?php

 ob_start(); 
//  session_start();
var_dump($resProduct);

?>
<section class="form-product">
    <h3>Modifier le produit</h3>

    <form method="post" enctype="multipart/form-data" action="">
        <fieldset>
            <label for="nameProduct">Nom du produit</label>
            <input type="text" id="product" name="nameProduct" placeholder="Nom de produit" value="<?= htmlspecialchars($resProduct['nom_produit'])?>">

            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description du produit"><?= htmlspecialchars($resProduct['description'])?></textarea>

            <label for="image">Photo</label>
            <img src="../../public/img/<?= htmlspecialchars($resProduct['image'])?>" alt="Nom du produit">
            <input type="file" id="image" name="image">
        </fieldset>

        <fieldset>
            <label for="idCategory">Categorie</label>
            <p><?= htmlspecialchars($resProduct['type_de_cheveux'])?></p>
            <select name="idCategory">
                <?php foreach ($resCat as $value) { ?>
                        <option>
                            <?= htmlspecialchars($value['type_de_cheveux'])?>
                        </option>
                <?php } ?>
            </select><br>

            <label for="idSubCategory">Sous categorie</label>
            <p><?= htmlspecialchars($resProduct['nom_du_produit'])?></p>
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
            <input type="text" id="priceHT" name="priceHT" placeholder="Prix HT" value="<?= htmlspecialchars($resProduct['prixHT'])?>">

            <label for="TVA">TVA</label required>
            <input type="text" id="TVA" name="TVA" placeholder="TVA du produit" value="<?= htmlspecialchars($resProduct['tauxTVA'])?>">

            <label for="priceTTC">Prix TTC</label>
            <input type="text" id="priceTTC" name="priceTTC" placeholder="Prix du produit TTC" value="<?= htmlspecialchars($resProduct['prixTTC'])?>">
            
            <label for="stock">Stock</label>
            <input type="text" id="stock" name="stock" placeholder="Stock du produit" value="<?= htmlspecialchars($resProduct['stock'])?>">
        </fieldset>

        <input type="submit" name="register" value="Enregistrer">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
</section>

<?php $contentupdateproduct = ob_get_clean(); 
require('adminView.php'); ?>
