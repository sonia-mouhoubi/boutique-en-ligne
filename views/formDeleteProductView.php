<?php
 ob_start(); 
?>
<section class="form-product">
    <h3>Supprimer le produit</h3>

    <p>En cliquant sur le bouton supprimer, vous supprimer définitivement le produit de votre base de donnée. Cette action est irréversible.</p>
    <form method="post" action="">

        <input type="submit" name="delete" value="Supprimer">
    </form>
</section>

<?php $contentdeleteproduct = ob_get_clean(); 
require('adminView.php'); ?>
