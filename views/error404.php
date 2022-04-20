<?php $title = 'Page non trouvée'; ?>
<?php $description = 'Boutique en ligne, page d\'erreur.'; 
// $css = 'public/css/styles.css';

ob_start(); 
?>

<section class="section-error404">
    <h2>Page non trouvée</h2>

    <img src="public/img/error-404.webp" alt="Page non trouvée, erreur 404.">
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
