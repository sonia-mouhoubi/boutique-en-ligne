<?php 
ob_start();
?>
<section class="productAdmin">
    <h2>Liste des produits</h2>

    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Nom du produit</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix HT</th>
                <th>TVA</th>
                <th>Prix TTC</th>
                <th>Formats</th>
                <th>Stock</th>
                <th>Catégorie</th>
                <th>Sous-catégorie</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tfoot> <!-- Pied de tableau -->
            <tr>
                <th>Nom du produit</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix HT</th>
                <th>TVA</th>
                <th>Prix TTC</th>
                <th>Formats</th>
                <th>Stock</th>
                <th>Catégorie</th>
                <th>Sous-catégorie</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>

        <tbody> <!-- Corps du tableau -->
            <?php 
                foreach ($res as $value) {
                var_dump( $value); ?>
                <tr>
                    <td> <?= htmlspecialchars($value['nom_produit'])?> </td>
                
                    <td> <?= htmlspecialchars($value['description'])?> </td>
            
                    <td> <img src="../public/img/<?= htmlspecialchars($value['image'])?>" alt="Nom du produit"> </td>
            
                    <td> <?= htmlspecialchars($value['prixHT'])?> </td>
            
                    <td> <?= htmlspecialchars($value['tauxTVA'])?> </td>
                
                    <td> <?= htmlspecialchars($value['prixTTC'])?> </td>
                
                    <td> <?= htmlspecialchars($value['formats'])?> </td>
                
                    <td> <?= htmlspecialchars($value['stock'])?> </td>
                
                    <td> <?= htmlspecialchars($value['type_de_cheveux'])?> </td>

                    <td> <?= htmlspecialchars($value['nom_du_produit'])?> </td>
   
                    <?php $idProduct = $value['id_produit']?>
                    <td><a href="modification-produit"><img src="../public/img/update.svg" alt="Modifier"><a></td>

                    <td><a href="suppression-produit"><img src="../public/img/delete.svg" alt="Supprimer"><a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<?php $contentpro = ob_get_clean(); 
require('adminView.php'); ?>

