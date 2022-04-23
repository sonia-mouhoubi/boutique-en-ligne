<?php
require('controllers/frontEndController.php');
require('controllers/backEndController.php');

try {
    // $_GET['url'] = '';
    if (isset($_GET['url'])) {
        if ($_GET['url'] == 'accueil') {
            require('views/homeView.php');
        }
        elseif ($_GET['url'] == 'inscription') {
            registerUser();
        }

        elseif ($_GET['url'] == 'connexion') {
            connectUser();
        }

        // elseif ($_GET['url'] == 'profil') {
        //     profileUser();
        // }
        elseif ($_GET['url'] == 'tous-les-produits') {
            total_number_articles();
        }
        elseif ($_GET['url'] == 'cheveux-raides'){

            getProductsStraight();
        }
        elseif ($_GET['url'] == 'cheveux-frises') {
            getProductsCurlyfrizzy();
        }
        elseif ($_GET['url'] == 'cheveux-boucles') {
            getProductsCurly();
        }
        elseif ($_GET['url'] == 'shampoing') {
            getShampoing();
        }
        elseif ($_GET['url'] == 'apres-shampoing') {
            getApresShampoing();
        }
        elseif ($_GET['url'] == 'soin') {
            getSoin();
        }
        elseif ($_GET['url'] == 'produit') {
            getSingleProduct($id);
        }
        elseif ($_GET['url'] == 'admin') {
            registerProduct();   
            if ($_GET['url'] == 'admin/ajout-categorie') {
                require('views/categoryAdminView.php');
            }   
        }
        elseif ($_GET['url'] == 'admin/ajout-categorie') {
            require('views/categoryAdminView.php');
        }
        elseif ($_GET['url'] == 'admin/ajout-sous-categorie') {
            require('views/subCategoryAdminView.php');
        }
        elseif ($_GET['url'] == 'admin/ajout-produit') {
            require('views/productAdminView.php');
        }
        else {
            require('views/error404.php');
        }
    }
    else {
        require('views/homeView.php');
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
