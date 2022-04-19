<?php
 ob_start(); 
?>
<div>
    <h3>Ajouter une nouvelle sous-catégorie</h3>

    <form method="post" enctype="multipart/form-data" action="">
        
        <label for="newSubCategory">Sous-catégorie</label>
        <input type="text" id="newSubCategory" name="newSubCategory" placeholder="Sous-categorie du produit">

        <input type="submit" name="register" value="Enregistrer">
    </form>
</div>

<?php $contentsubcategory = ob_get_clean(); 
require('adminView.php'); ?>