<?php 
$title = 'Page de modification client'; 
$description = 'Boutique en ligne, page de modification client'; 
$css = 'public/css/styles.css';

ob_start(); 
var_dump($resClient);
?>

<section>
    <form class="form" action="" method="post">
        <label for="prenom">Prenom</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($resClient['prenom'])?>">
      
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($resClient['nom'])?>">

        <label for="mail">Mail</label>
        <input type="email" id="mail" name="mail" value="<?= htmlspecialchars($resClient['mail'])?>">

        <label for="droit">droit</label>
        <input type="text" id="droit" name="droit" value="<?= htmlspecialchars($resClient['nom_droits'])?>">

        <label for="code_postal"><?= htmlspecialchars($resDelivry['code_postal_livraison'])?></label>
        <input type="text" id="code_postal" name="code_postal">

        <label for="ville"><?= htmlspecialchars($resDelivry['ville__livraison'])?></label>
        <input type="text" id="ville" name="ville">

        <input type="submit" id="button" name="update" value="modifier">
    </form>
            <?php //$user->error()?>
</section>

<?php $contentupdateclient = ob_get_clean();
require('adminView.php'); ?>

