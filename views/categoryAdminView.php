<?php
 ob_start(); 
?>
<section class="category">
    <h3>Ajouter une nouvelle catégorie</h3>

    <form method="post" enctype="multipart/form-data" action="">
        
        <label for="newCategory">Categorie</label>
        <input type="text" id="newCategory" name="newCategory" placeholder="Categorie du produit">

        <input type="submit" name="register" value="Enregistrer">
    </form>
</section>

<?php $contentcategory = ob_get_clean(); 
require('adminView.php'); ?>