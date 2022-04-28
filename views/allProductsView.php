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

    <?php foreach ($get_page as $value){ ?>
                    <div class="content-img">
                        <a href="produits?id=<?php echo $value['id_produit'] ?>">
                        <!-- <a href="./tous-les-produits?id=<?php //echo $value['id_produit'] ?>"> -->
                        <img src="./public/img/<?php echo $value['image'] ?>" alt="">
                    </div>

                    <div class="content-text">
                        <h6 class="text-article"><?php echo $value['nom_produit'] ?></h6>
                        <h6 class="text-article"><?php echo $value['prixTTC']  ?> €</h6>
                    </div>
                </a>

        <?php } ?>
        
                <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <!-- <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"> -->
                            <!-- <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a> -->
                        </li>
                        <!-- <?php for($page = 1; $page <= $pages; $page++): ?> -->
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <!-- <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>"> -->
                                <!-- <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a> -->
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <!-- <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>"> -->
                            <!-- <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a> -->
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main>


<?php $content = ob_get_clean(); 

require('template.php'); 
?>
