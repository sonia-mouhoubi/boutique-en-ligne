<?php 
$title = 'Panier'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section>
    <h1>PANIER</h1>
    <!-- <p><?= var_dump($infoUsers); ?></p> -->
    <!-- <p><?= var_dump($_GET['idProduit']); ?></p> -->
    <p><?= var_dump($_GET); ?></p>
    <!-- <p><?= var_dump($_POST); ?></p> -->


<h2>Votre Panier</h2>
    <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>N°</th>
                <th>Nom du produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Prix total</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody> <!-- Corps du tableau -->
        <?php 
            foreach($infDisplayBask as $key => $value){
                // var_dump($value);
                $idPanier = $value['id_panier'];
                ?>
            <tr>
                <td> <?= htmlspecialchars($key+1)?> </td>
                <td> <?= htmlspecialchars($value['nom_produit'])?> </td>
                <td> <?= htmlspecialchars($value['quantite'])?> </td>
                <td> <?= htmlspecialchars($value['prixHT'])?><em>€</em></td>
                <td> <?= htmlspecialchars($value['prixHT']) * htmlspecialchars($value['quantite'])?><em>€</em></td>
                <td>
                    <a href="./panier/modifier/<?= $idPanier ?>"><input type="number" placeholder="1" name="quantite"><img src="../public/img/update.svg" alt="Modifier">
                    </a>
                    <!-- <a href="./panier/modifier/<?= $idPanier ?>"><input type="number" placeholder="1" name="quantite"><img src="../public/img/update.svg" alt="Modifier">
                    <a> -->
                </td>
                <td>
                    <a href="./panier/supprimer/<?= $idPanier ?>"><img src="../public/img/delete.svg" alt="Supprimer">
                    </a>
                </td>
                <!-- <td><a href=""><img src="../public/img/update.svg" alt="Modifier"><a></td> -->
                <!-- <td><a href=""><img src="../public/img/delete.svg" alt="Supprimer"><a></td> -->
            </tr>
        </tbody>
        <?php } ?>
        </table>  


        <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Quantité Totale</th>
                <th>Prix Total à payer</th>
            </tr>
        </thead>
        <?php 
        $count = 0;
            foreach($infDisplayBask as $value){ ?>

        <tbody> <!-- Corps du tableau -->
            <tr>
            <?php 
                // var_dump($value['prixHT']* htmlspecialchars($value['quantite']));
                $count+= $value['prixHT']* htmlspecialchars($value['quantite']);
            }
            // var_dump($count);
            ?>

                <td> <?= htmlspecialchars($_SESSION['quantite'])?> </td>
                <td> <?= htmlspecialchars($count)?><em>€</em></td>
            </tr>
        </tbody>
        </table>


      
     
        
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
