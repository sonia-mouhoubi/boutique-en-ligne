<?php $title = 'Ma page d\'accueil'; 
$description = 'Boutique en ligne, page d\'accueil'; 
// $css = 'public/css/styles.css';
ob_start(); 
?> 
<h1>Ma page d'accueil</h1>
    <section class="carousel" aria-label="Gallery">
    <div class="slider">
        <figure>
            <!-- <img src="./public/img/afro.jpg" alt="Nom du produit">
            <img src="./public/img/raide.jpg" alt="Nom du produit">
            <img src="./public/img/boucle.jpg" alt="Nom du produit"> -->
            <img src="./public/img/accueil.jpg" alt="Nom du produit">
            <img src="./public/img/shampoing-olive.jpg" alt="Nom du produit">
            <img src="./public/img/raide.jpg" alt="Nom du produit">
            <img src="./public/img/my-hair.jpg" alt="Nom du produit">
        </figure>
    </div>
    </section>

<!-- Créer une boucle pour afficher des articles en php -->

<div class="articles">
    <p>Mes article ....</p>
</div>

<!-- Fin de la boucle -->

<?php $content = ob_get_clean(); ?> 
<!-- On récupere le code avant avec ob_get_clean (FIN) -->

<?php require('template.php'); ?>