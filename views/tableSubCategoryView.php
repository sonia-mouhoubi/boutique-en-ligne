<?php 
ob_start(); 
?>

<section class="category">
    <h2>Liste des sous-catégories</h2>

    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Sous-catégorie </th>
                <th>Catégorie liée</th>          
                <th></th>
            </tr>
        </thead>

        <tbody> <!-- Corps du tableau -->
        <?php 
            foreach($resSubCat as $resSubCat) { ?>
            <tr>
                <td> <?= htmlspecialchars($resSubCat['nom_du_produit'])?> </td>

                <td><a href="./produit/modifier/"><img src="../public/img/update.svg" alt="Modifier"><a></td>

                <td><a href="./produit/supprimer/"><img src="../public/img/delete.svg" alt="Supprimer"><a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>              
</section>

<?php $contentsubcat = ob_get_clean(); 
require('adminView.php'); ?>

