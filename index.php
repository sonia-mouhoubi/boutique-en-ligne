<?php

// define()

require('controllers/frontEndController.php');
require('controllers/backEndController.php');
// var_dump($_SERVER);
try {
    // $_GET['url'] = '';
    var_dump($_GET['url']);
    $url = explode('/', $_GET['url']);
    var_dump($url);

    if (isset($_GET['url'])) {
        if ($url[0] == 'accueil') {
            require('views/homeView.php');
        }
        elseif ($url[0] == 'inscription') {
            registerUser();
        }
        elseif ($url[0] == 'connexion') {
            connectUser();
        }
        // elseif ($_GET['url'] == 'profil') {
        //     profileUser();
        // }
        elseif ($url[0] == 'tous-les-produits') {
            total_number_articles();
        }
        elseif ($url[0] == 'cheveux-raides'){

            getProductsStraight();
        }
        elseif ($url[0] == 'cheveux-frises') {
            getProductsCurlyfrizzy();
        }
        elseif ($url[0] == 'cheveux-boucles') {
            getProductsCurly();
        }
        elseif ($url[0] == 'shampoing') {
            getShampoing();
        }
        elseif ($url[0] == 'apres-shampoing') {
            getApresShampoing();
        }
        elseif ($url[0] == 'soin') {
            getSoin();
        }
        elseif ($url[0] == 'produit') {
            getSingleProduct($id);
            var_dump($_GET['url']);

        } 
        elseif ($url[0] == 'admin') {
            getAdmin();
        }   
        elseif ($url[0] == 'admin/ajout-produit') {
            registerProduct();   
        }
        elseif ($url[0] == 'admin/ajout-categorie') {
            registerNewCategory();   
        }
        elseif ($url[0] == 'admin/ajout-sous-categorie') {
            registerNewSubCategory();
        }
        elseif ($url[0] == 'admin/produit') {
            getProduct();
        }
        elseif ($url[0] == 'admin/categorie') {
            getCategory();
        }
        elseif ($url[0] == 'admin/sous-categorie') {
            getSubCategory();
        }
        elseif ($url[0] == "admin/modification-produit/") {
            updateProduct();
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
