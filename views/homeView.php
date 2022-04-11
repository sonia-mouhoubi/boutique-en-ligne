<?php $title = 'Ma page d\'accueil'; ?>
<?php $description = 'Boutique en ligne, page d\'accueil'; ?>

<!-- Permet de mettre pleins de code dans une variable (DEBUT) -->
<?php ob_start(); ?> 
<h1>Ma page d'accueil</h1>
<p>Mes derniers articles : </p>

<!-- Créer une boucle pour afficher des articles en php -->

<div class="articles">
    <p>Mes article ....</p>
</div>

<!-- Fin de la boucle -->

<?php $content = ob_get_clean(); ?> 
<!-- On récupere le code avant avec ob_get_clean (FIN) -->

<?php require('template.php'); ?>