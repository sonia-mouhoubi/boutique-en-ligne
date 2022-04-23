<?php 
$title = 'Tous les produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 

?>

<main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des articles</h1>
                <section class="products">
    <h2>Tous les produits</h2>

    <?php foreach ($products as $value){ ?>
                    <div class="content-img">
                        <a href="./tous-les-produits?id=<?php echo $value['id_produit'] ?>">
                        <img src="./public/img/<?php echo $value['image'] ?>" alt="">
                    </div>

                    <div class="content-text">
                        <h6 class="text-article"><?php echo $value['nom_produit'] ?></h6>
                        <h6 class="text-article"><?php echo $value['prixTTC'] ?></h6>
                    </div>
                </a>

        <?php } ?>
            </section>
        </div>
    </main>


<?php $content = ob_get_clean(); 

require('template.php'); 
?>
