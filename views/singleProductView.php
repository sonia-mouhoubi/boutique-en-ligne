<?php 
$title = 'Page produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 

ob_start(); ?>
<section>
    <?php foreach ($res as $value) { 
        var_dump($value); ?>
        <h2> Produits de la boutique </h2>

        <img src="./public/img/<?= $value['image'] ?>" alt="Nom du produit">

        <h3><?= $value['nom_produit']?></h3>
        <p><?= $value['description']?></p>

        <form class="products" action="">
            <p><span>Prix TTC </span><?= $value['prixTTC']?> €</p>
            <select name="format">
                <option value="dog">Grand</option>
                <option value="cat">Mini</option>
            </select>

            <p><span>Stock </span><?= $value['stock']?></p>
            <input type="number" placeholder="0" name="password">
            <input type="submit" value="Ajouter au panier">
        </form>        
    <?php } ?>
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
