<?php 
$title = 'Page admin'; 
$description = 'Boutique en ligne, page admin.'; 

ob_start(); ?>

<section class="administration">
    <h2>Bienvenue dans l'administration du site</h2>

    <form method="post" enctype="multipart/form-data" action="">

        <label for="nameProduct">Nom du produit</label>
        <input type="text" id="product" name="nameProduct" placeholder="Nom de produit">

        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Description du produit"></textarea>
    
        <label for="image">Photo</label>
        <input type="file" id="image" name="image">

        <label for="category">Categorie</label>
        <select name="category">
            <?php foreach ($resCat as $value) { ?>
                    <option>
                        <?= $value['type_de_cheveux']?>
                    </option>
            <?php } ?>
        </select><br>
        
        <label for="subCategory">Sous categorie</label>
        <select name="subCategory">
            <?php foreach ($resSubCat as $value) {
                var_dump($value);?>
                <option>
                    <?= $value['nom_du_produit']?>
                </option>
            <?php } ?>
        </select><br>

        <!-- <label for="category">Categorie</label>
        <input type="text" id="category" name="category" placeholder="Categorie du produit"> -->
        
        <!-- <label for="subCategory">Sous-catégorie</label>
        <input type="text" id="subCategory" name="subCategory" placeholder="Sous-catégorie du produit"> -->
       
        <label for="formats">Format</label>
        <select name="formats">
            <option value="S">Grand</option>
            <option value="M">Mini</option>
        </select><br>

        <label for="priceHT">Prix HT</label>
        <input type="text" id="priceHT" name="priceHT" placeholder="Prix HT">

        <label for="TVA">TVA</label>
        <input type="text" id="TVA" name="TVA" placeholder="TVA du produit">

        <label for="priceTTC">Prix TTC</label>
        <input type="text" id="priceTTC" name="priceTTC" placeholder="Prix du produit TTC">
        
        <label for="stock">Stock</label>
        <input type="text" id="stock" name="stock" placeholder="Stock du produit">

        <input type="submit" name="register" value="Enregistrer">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
