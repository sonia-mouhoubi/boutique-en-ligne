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
                <th>Catégorie liée</th>
                <th>Catégorie liée</th>
                <th>Catégorie liée</th>
            </tr>
        </thead>

        <tbody> <!-- Corps du tableau -->
        <?php 
            foreach($resSubCat as $resSubCat) { ?>
            <tr>
                <td> <?= htmlspecialchars($resSubCat['nom_du_produit'])?> </td>

                <?php foreach($resCat as $value) { ?>
                <td> <?= htmlspecialchars($value['type_de_cheveux'])?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>              
</section>

<?php $contentsubcat = ob_get_clean(); 
require('adminView.php'); ?>

