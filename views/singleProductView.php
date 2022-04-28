<?php 
$title = 'Page produit'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';


       

ob_start(); 
?>

<section>
        <h2> Produit : <?= $nomProduit  ?>  </h2>
        <img src="./public/img/<?= $image ?>" alt="Nom du produit">
        <h3><?= $description ?></h3>
        <p><?= $description ?></p>
        <p><?= $date ?></p>
 
        <form class="products" action="">
            <p><span>Prix TTC </span><?= $prixTTC ?> €</p>
            <select name="format">
                <option value="dog"><?= $formats ?></option>
                <!-- <option value="dog">Grand</option> -->
                <!-- <option value="cat">Mini</option> -->
            </select>

            <p><span>Stock </span><?= $stock ?></p>
            <input type="number" placeholder="0" name="password">
            <input type="submit" value="Ajouter au panier">
        </form>        
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
