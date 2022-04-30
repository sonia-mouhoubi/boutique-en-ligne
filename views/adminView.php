<?php 
$title = 'Boutique en ligne My Hair. Page admin.'; 
$description = 'Administration du site.';

ob_start();
?> 

<nav class="nav-admin">
    <ul>
        <li><a href="./ajout-produit">Ajouter un produit</a></li>
        <li><a href="./produit">Produits</a></li>
        <li><a href="./ajout-categorie">Ajouter une categorie</a></li>
        <li><a href="./categorie">Catégories</a></li>
        <li><a href="./ajout-sous-categorie">Ajouter une sous catégorie</a></li>
        <li><a href="./sous-categorie">Sous-catégories</a></li>
        <li><a href="./client">Clients</a></li>
    </ul>
</nav>

<section class="administration">
    <h2>Bienvenue dans l'administration du site</h2>
    <?php 
        if(isset($contentproduct)) {
            echo $contentproduct;
        }
        elseif(isset($contentcategory)) {
            echo $contentcategory;
        } 
        elseif(isset($contentsubcategory)) {
            echo $contentsubcategory;
        }
        elseif(isset($contentpro)) {
            echo $contentpro;
        }
        elseif(isset($contentcat)) {
            echo $contentcat;
        }
        elseif(isset($contentsubcat)) {
            echo $contentsubcat;
        }
        elseif(isset($contentupdateproduct)) {
            echo $contentupdateproduct;
        }
        elseif(isset($contentdeleteproduct)) {
            echo $contentdeleteproduct;
        }
        elseif(isset($contentclient)) {
            echo $contentclient;
        }
        elseif(isset($contentclientfile)) {
            echo $contentclientfile;
        }
        elseif(isset($contentupdateclient)) {
            echo $contentupdateclient;
        }
        elseif(isset($contentdeleteclient)) {
            echo $contentdeleteclient;
        }
        elseif(isset($contentdeletecategory)) {
            echo $contentdeletecategory;
        }
        elseif(isset($contentdeletesubcategory)) {
            echo $contentdeletesubcategory;
        }
    ?>   
</section>

<?php $content = ob_get_clean(); 

require('template.php'); 
?>
