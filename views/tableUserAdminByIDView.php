<?php 
ob_start();
?>
<section class="clientAdmin">
    <h2>Liste des clients</h2>
    
    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Droit</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Mail</th>
                <th>Fiche client</th>
                <th>Commande</th>
                <th>Panier</th>
            </tr>
        </thead>

        <tfoot> <!-- Pied de tableau -->
            <tr>
                <th>Droit</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Mail</th>
                <th>Fiche client</th>
                <th>Commande</th>
                <th>Panier</th>
            </tr>
        </tfoot>

        <tbody> <!-- Corps du tableau -->
            <tr>
                <td> <?= htmlspecialchars($resClient['prenom'])?> </td>

                <td> <?= htmlspecialchars($resClient['nom'])?> </td>

                <td> <?= htmlspecialchars($resClient['mail'])?> </td>

                <td> <?= htmlspecialchars($resClient['nom_droits'])?> </td>
                <?php $idClient = $resClient['id_client']?> 
            </tr>
        </tbody>
    </table>
</section>

<?php $contentclientfile = ob_get_clean(); 
require('adminView.php'); ?>

