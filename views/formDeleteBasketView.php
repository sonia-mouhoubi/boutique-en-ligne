<?php

 ob_start(); 
//  session_start();
// var_dump($resDeleteProduct);

?>
<section class="form-product">
    <h3>Supprimer le produit du panier</h3>

    <!-- <p><a href="../produit">Revenir à la page produit</a></p> -->

    <p>En cliquant sur le bouton supprimer, vous supprimer définitivement le produit de votre panier. Cette action est irréversible.</p>
    <form method="post" enctype="multipart/form-data" action="">

        <input type="submit" name="delete" value="Supprimer">
    </form>

</section>

<?php $contentdeleteproduct = ob_get_clean(); 
require('panierView.php'); ?>
