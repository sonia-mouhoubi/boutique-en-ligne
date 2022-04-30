<?php
 ob_start(); 
?>
<section class="form-product">
    <h3>Supprimer la catégorie</h3>

    <p>En cliquant sur le bouton supprimer, vous supprimer définitivement le categorie de votre base de donnée. Cette action est irréversible.</p>

    <form method="post" action="">
        <input type="submit" name="delete" value="Supprimer">
    </form>
</section>

<?php $contentdeletecategory = ob_get_clean(); 
require('adminView.php'); ?>
