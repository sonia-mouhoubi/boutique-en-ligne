<?php 
$title = 'Tous les produits'; 
$description = 'Boutique en ligne, shampoing, aprés-shampoing et soins pour tous types de cheveux.'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section class="newArticles">
    <h2>Nouvel arrivage</h2>

    <?php foreach ($products as $value) { 
        //var_dump($products);?>
    <div>
        <a href="./tous-les-produits/<?= $value['id_produit'] ?>"><img src="./public/img/<?= htmlspecialchars($value['image']) ?>" alt="Nom du produit">
        <h3><?= htmlspecialchars($value['nom_produit'])?></h3>
        <p><span>Prix TTC </span><?= number_format(htmlspecialchars($value['prixTTC']), 2, ',', ' ')?> €</p>
        </a>

        <!-- <a class="add" href="./panier/<?= $value['id_produit'] ?>">AJOUTER</a> -->
        <!-- <a class="add" href="./panier">AJOUTER</a> -->
        <form action="./panier/<?= $value['id_produit'] ?>" method="post">
            <input type="submit" name="envoi" value="Ajouter au panier">
            <!-- <a href="./panier/<?= $value['id_produit'] ?>"><input type="submit" name="envoi" value="Ajouter au panier"></a> -->
        </form>
    </div>
    <?php } ?>
   
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
