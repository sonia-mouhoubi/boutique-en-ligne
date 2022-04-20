<?php 
$title = 'Boutique en ligne My Hair. Page admin.'; 
$description = 'Administration du site.';

ob_start();
?> 
<nav class="nav-admin">
    <ul>
        <li><a href="admin/ajout-produit">Ajouter un produit</a></li>
        <li><a href="">Produits</a></li>
        <li><a href="admin/ajout-categorie">Ajouter une categorie</a></li>
        <li><a href="">Catégories</a></li>
        <li><a href="admin/ajout-sous-categorie">Ajouter une sous catégorie</a></li>
        <li><a href="">Sous-catégories</a></li>
        <li><a href="">Client</a></li>
    </ul>
</nav>

<section class="administration">
    <h2>Bienvenue dans l'administration du site</h2>
    <?php 
        if(isset($contentcategory)) {
            echo $contentcategory;
        } 
        elseif(isset($contentproduct)) {
            echo $contentproduct;
        }
        elseif(isset($contentsubcategory)) {
            echo $contentsubcategory;
        }
    ?>   
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
