<?php 
$title = 'Page produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 

ob_start(); ?>

<section class="produits">
    <h2>Soin</h2>

    <?php foreach ($res as $value) { ?>
    <div>
        <img src="./public/img/<?= $value['image'] ?>" alt="Nom du produit">
        <h3><?= $value['nom_produit']?></h3>
        <p><span>Prix TTC </span><?= $value['prixTTC']?> €</p>
    </div>    
    <?php } ?>
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
