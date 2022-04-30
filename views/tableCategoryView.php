
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
                <th></th>
            </tr>
        </thead>

        <tbody> <!-- Corps du tableau -->
        <?php foreach($resCat as $value) { 
                $idCat = $value['id_categorie'];?>
            <tr>
                <td> <?= htmlspecialchars($value['type_de_cheveux'])?> </td>

                <td><a href="./categorie/modifier/<?= $idCat ?>"><img src="../public/img/update.svg" alt="Modifier"><a></td>

                <td><a href="./categorie/supprimer/<?= $idCat ?>"><img src="../public/img/delete.svg" alt="Supprimer"><a></td> 
            </tr>
        <?php } ?>
        </tbody>
    </table>  
         
</section>

<?php $contentcat = ob_get_clean(); 
require('adminView.php'); ?>
