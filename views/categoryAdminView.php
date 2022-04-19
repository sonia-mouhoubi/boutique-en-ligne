<?php
 ob_start(); 
?>
<div>
    <h3>Ajouter une nouvelle catégorie</h3>

    <form method="post" enctype="multipart/form-data" action="">
        
        <label for="newCategory">Categorie</label>
        <input type="text" id="newCategory" name="newCategory" placeholder="Categorie du produit">

        <input type="submit" name="register" value="Enregistrer">
    </form>
</div>

<?php $contentcategory = ob_get_clean(); 
require('adminView.php'); ?>