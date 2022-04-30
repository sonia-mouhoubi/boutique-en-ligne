<?php 
$title = 'Panier'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section>
    <h1>PANIER</h1>
    <!-- <p><?= var_dump($infoUsers); ?></p> -->
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
