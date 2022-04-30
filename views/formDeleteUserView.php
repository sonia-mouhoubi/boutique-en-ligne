<?php
 ob_start(); 

?>
<section class="form-product">
    <h3>Supprimer le client</h3>

    <p>En cliquant sur le bouton supprimer, vous supprimer définitivement le client de votre base de donnée. Cette action est irréversible.</p>

    <form method="post" action="">

        <input type="submit" name="delete" value="Supprimer">
    </form>
</section>

<?php $contentdeleteclient = ob_get_clean(); 
require('adminView.php'); ?>
