<?php 
$title = 'Tous les produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 

?>

<main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Tous les produits</h1>
                <section class="products">

    <?php foreach ($products as $value){ 
        // var_dump($value); 
    ?>
                    <div class="content-img">
                        <h2><a href="produit/<?= $value['id_produit'] ?>"><?php echo $value['id_produit'] ?></a></h2>
                        <a href="produit/<?= $value['id_produit'] ?>"><img src="./public/img/<?php echo $value['image'] ?>" alt=""></a>
                    </div>

                    <div class="content-text">
                        <h6 class="text-article"><a href="produit/<?= $value['id_produit'] ?>"><?php echo $value['nom_produit'] ?></a></h6>
                        <h6 class="text-article"><a href="produit/<?= $value['id_produit'] ?>"><?php echo $value['prixTTC'] ?></a></h6>
                    </div>
                </a>

        <?php } ?>
            </section>
        </div>
    </main>


<?php $content = ob_get_clean(); 

require('template.php'); 
?>
