<?php
session_start();
$val = substr($_GET['url'], 14);

// define()

require('controllers/frontEndController.php');
require('controllers/backEndController.php');
// var_dump($_SERVER);
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
        // elseif ($_GET['url'] == 'produit') {
        //     getSingleProduct($id);
        // } 
        elseif ($_GET['url'] == 'admin') {
            getAdmin();
        }  
        elseif ($_GET['url'] == 'admin/ajout-produit') {
            registerProduct();   
        }
        elseif ($_GET['url'] == 'admin/ajout-categorie') {
            registerNewCategory();   
        }
        elseif ($_GET['url'] == 'admin/ajout-sous-categorie') {
            registerNewSubCategory();
        }
        elseif ($_GET['url'] == 'admin/produit') {
            getProduct();
        }
        elseif ($_GET['url'] == 'admin/categorie') {
            getCategory();
        }
        elseif ($_GET['url'] == 'admin/sous-categorie') {
            getSubCategory();
        }
        elseif ($_GET['url'] == 'admin/client') {
            getUserAdmin();
        } 
        elseif ($_GET['url'] == "admin/produit/$val") {
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
