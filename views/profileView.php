<?php $title = 'Page profil'; ?>
<?php $description = 'Boutique en ligne, page profil'; ?>

<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-connexion">
    <h2>Profil</h2>

    
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
