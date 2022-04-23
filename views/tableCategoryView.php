
<?php 
ob_start(); 
?>
<section class="category">
    <h2>Liste des catégories</h2>

    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Catégorie</th>
                <th>Sous-catégorie liée</th>
                <th>Sous-catégorie liée</th>
                <th>Sous-catégorie liée</th>
            </tr>
        </thead>

        <tbody> <!-- Corps du tableau -->
        <?php 
            foreach($resCat as $value) { ?>
            <tr>
                <td> <?= htmlspecialchars($value['type_de_cheveux'])?> </td>

                <?php foreach($resSubCat as $valueSubCat) { ?>
                <td> <?= htmlspecialchars($valueSubCat['nom_du_produit'])?> </td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>       
</section>

<?php $contentcat = ob_get_clean(); 
require('adminView.php'); ?>
