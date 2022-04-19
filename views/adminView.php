<?php 
$title = 'Boutique en ligne My Hair. Page admin.'; 
$description = 'Administration du site.';

ob_start();
?> 

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
