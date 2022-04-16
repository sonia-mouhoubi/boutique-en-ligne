<?php $title = 'Page de connexion'; ?>
<?php $description = 'Boutique en ligne, page de connexion'; ?>

<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-error404">
    <h2>Page non trouvée</h2>

    <img src="public/img/error-404.webp" alt="Page non trouvée, erreur 404.">
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
