<?php $title = 'Ma page d\'accueil'; 
$description = 'Boutique en ligne, page d\'accueil'; 
// $css = 'public/css/styles.css';
ob_start(); 
?> 
<!-- <h1>Ma page d'accueil</h1> -->
<section class="carousel" aria-label="Gallery">
    <div class="slider">
        <figure>
            <img src="./public/img/accueil.jpg" alt="Nom du produit">
            <img src="./public/img/shampoing-olive.jpg" alt="Nom du produit">
            <img src="./public/img/shampoing-accueil.jpg" alt="Nom du produit">
            <img src="./public/img/my-hair.jpg" alt="Nom du produit">
            <!-- <img src="./public/img/game-cheveux.jpg" alt="Nom du produit"> -->
            <img src="./public/img/cheveux-femme.jpg" alt="Nom du produit">
        </figure>
    </div>
</section>

<!-- Créer une boucle pour afficher des articles en php -->

<section class="newArticles">
    <h2>Nouvel arrivage</h2>

    <?php foreach ($res as $value) { ?>
    <div>
        <img src="./public/img/<?= htmlspecialchars($value['image']) ?>" alt="Nom du produit">
        <h3><?= htmlspecialchars($value['nom_produit'])?></h3>
        <p><span>Prix TTC </span><?= htmlspecialchars($value['prixTTC'])?> €</p>
    </div>    
    <?php } ?>
</section>

<section class="livraison">
    
</section>

<?php $content = ob_get_clean(); ?> 
<!-- On récupere le code avant avec ob_get_clean (FIN) -->

<?php require('template.php'); ?>