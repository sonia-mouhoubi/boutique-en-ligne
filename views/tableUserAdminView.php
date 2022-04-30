<?php 
ob_start();
?>
<section class="clientAdmin">
    <h2>Liste des clients</h2>
    
    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Droit</th>
                <th>Fiche client</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tfoot> <!-- Pied de tableau -->
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Droit</th>
                <th>Fiche client</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>

        <tbody> <!-- Corps du tableau -->
            <?php 
            foreach ($res as $value) {?>
            <tr>
                <td> <?= htmlspecialchars($value['prenom'])?> </td>

                <td> <?= htmlspecialchars($value['nom'])?> </td>

                <td> <?= htmlspecialchars($value['mail'])?> </td>

                <td> <?= htmlspecialchars($value['nom_droits'])?> </td>
                <?php $idClient = $value['id_client']?>
                
                <td><a href="./client/fiche-client/<?= $idClient ?>"><img src="../public/img/fiche-client.svg" alt="Fiche client"><a></td>

                <?php $idClient = $value['id_client']?>
                <td><a href="./client/modifier/<?= $idClient ?>"><img src="../public/img/update.svg" alt="Modifier client"><a></td>
                
                <td><a href="./client/supprimer/<?= $idClient ?>"><img src="../public/img/delete.svg" alt="Supprimer client"><a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>

<?php $contentclient = ob_get_clean(); 
require('adminView.php'); ?>

