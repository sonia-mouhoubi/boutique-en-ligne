<?php 
$title = 'Page produit'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';


       

ob_start(); 
?>

<section>
    <h2> Produit : <?= $nomProduit  ?>  </h2>
    <img src="../public/img/<?= $image ?>" alt="Nom du produit">
    <h3><?= $description ?></h3>

    <form class="products" action=" ../panier/<?= $idProd ?>" method="post">
        <p><span>Prix TTC : </span><?= number_format(htmlspecialchars($prixTTC), 2, ',', ' ') ?> €</p>
        <p><br><span>Stock : </span><?= $stock ?></p>
        <br>
        <input type="number" placeholder="1" name="quantite">
        <input type="submit" name="envoi" value="Ajouter au panier">
    </form>        
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
