<?php 
$title = 'Tous les produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section class="col-12">
<h1>Liste des articles</h1>
    <div class="home">
        <div class="row">
            <div class="wrap">
                <?php  foreach($products as $value){ ?>
                <div class="box">
                    <div class="product full">
                        <a href="./tous-les-produits/">
                            <img src="./public/img/" alt="Nom du produit">
                        </a>
                        <div class="description">
                        <?= $value['nom_produit'] ?>
                        <a href="" class="price"><?= number_format(htmlspecialchars($value['prixTTC']), 2, ',', ' ') ?> €</a>
                        </div>
                        <a class="gift" href="#">
                            Gift
                        </a>
                        <div class="rating">
                            <span>Rating :</span>
                            <ul>
                                <li><a href=""></a></li>
                                <li> <a href="" class="off"></a></li>
                            </ul>
                            <a class="class" href="">
                                add
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="pagination">

        </div>
    </div>
    
    <nav>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <!-- <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"> -->
                <!-- <a href="/<?= $currentPage - 1 ?>" class="page-link">Précédente</a> -->
            </li>
            <!-- <?php for($page = 1; $page <= $pages; $page++): ?> -->
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <!-- <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>"> -->
                <!-- <a href="/<?= $page ?>" class="page-link"><?= $page ?></a> -->
            </li>
            <!-- <?php endfor ?> -->
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <!-- <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>"> -->
                <!-- <a href="/<?= $currentPage + 1 ?>" class="page-link">Suivante</a> -->
            </li>
        </ul>
    </nav>
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
