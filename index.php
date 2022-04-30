<?php
session_start();

require('controllers/frontEndController.php');
require('controllers/backEndController.php');
try {
    if (isset($_GET['url'])) {
        // var_dump($_GET);

        $val1 = substr($_GET['url'], 23);
        $val2 = substr($_GET['url'], 24);
        $idSingleProductFront = substr($_GET['url'],18);
        // $idSearch = substr($_GET['url'],17);
            // var_dump($idSearch);

        // var_dump( $val1);
        // var_dump($idSingleProductFront);

        if ($_GET['url'] == 'accueil') {
            homeView();
        }
        elseif ($_GET['url'] == "recherche") {
            searchBarre();
        }
        elseif ($_GET['url'] == 'inscription') {
            registerUser();
        }
        elseif ($_GET['url'] == 'connexion') {
            connectUser();
        }
        elseif ($_GET['url'] == 'profil') {
            profileUser();
        }
        elseif ($_GET['url'] == 'tous-les-produits') {
            total_number_articles();
        }
        elseif ($_GET['url'] == "tous-les-produits/$idSingleProductFront") {
            getSingleProduct();
        }
        elseif ($_GET['url'] == "panier") {
            check_session_basket();
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
        elseif ($_GET['url'] == "tous-les-produits/$val") {
            getSingleProduct($id);
        } 

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
        elseif ($_GET['url'] == "admin/produit/modifier/$val1") {
            updateProduct();
        }
        elseif ($_GET['url'] == "admin/produit/supprimer/$val2") {
            deleteProduct();
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