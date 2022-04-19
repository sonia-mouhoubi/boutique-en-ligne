<?php 
$title = 'Page produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section class="products">
    <h2>Cheveux crépus</h2>

    <?php foreach ($res as $value) { ?>
    <div>
        <img src="./public/img/<?= htmlspecialchars($value['image'])?>" alt="Nom du produit">
        <h3><?= htmlspecialchars($value['nom_produit'])?></h3>
        <p><span>Prix TTC </span><?= htmlspecialchars($value['prixTTC'])?> €</p>
    </div>    
    <?php } ?>
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
