<?php 
    $title = 'Page recherche'; 
    $description = 'Boutique en ligne, page recherche'; 
    $css = 'public/css/styles.css';
    
ob_start(); 

?>


<form action="" method="POST">
    <input type="search" name="search" placeholder="Rechercher un produit">
    <input type="submit" name="envoyer">
</form>

<section class="afficher_produit"> 
    <?php
    if(isset($result)){

    
        foreach($result  as $article => $key){ ?>
            <div>
                <!-- <img src="./public/img/<?= htmlspecialchars($key['image'])?>" alt="Nom du produit"> -->
                <h3><?= htmlspecialchars($key['nom_produit'])?></h3>
            </div>
    <?php }
    } ?>  
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); 

require('template.php'); 
?>

