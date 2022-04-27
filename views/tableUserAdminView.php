<?php 
ob_start();
foreach ($res as $value) {

        echo htmlspecialchars($value['prenom']);
    
        echo htmlspecialchars($value['nom']);
            
        echo htmlspecialchars($value['mail']);

        echo htmlspecialchars($value['nom_droits'])."<br>";

} 
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
                    
                    <td><a href="fiche-client"><img src="../public/img/fiche-client.svg" alt="Supprimer"><a></td>

                    <?php $idClient = $value['id_client']?>
                    <td><a href="modification-client/<?= $idClient ?>"><img src="../public/img/update.svg" alt="Modifier"><a></td>
                    
                    <td><a href="suppression-client"><img src="../public/img/delete.svg" alt="Supprimer"><a></td>
                    <?php var_dump($idClient)?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<?php $contentclient = ob_get_clean(); 
require('adminView.php'); ?>

