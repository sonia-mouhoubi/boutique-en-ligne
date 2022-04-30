<?php
session_start();

require('controllers/frontEndController.php');
require('controllers/backEndController.php');
try {

    if (isset($_GET['url'])) {
        $id_url = explode("/",$_GET['url']);
        $id_url = end($id_url);
        var_dump($id_url); 

        if ($_GET['url'] == 'accueil') {
            homeView();
        }
        elseif ($_GET['url'] == 'inscription') {
            registerUser();
        }
        elseif ($_GET['url'] == 'connexion') {
            connectUser();
        }
        // elseif ($_GET['id_url'] == 'profil') {
        //     profileUser();
        // }
        elseif ($_GET['url'] == 'tous-les-produits') {
            total_number_articles();
        }
        elseif ($_GET['url'] == "tous-les-produits/$id_url") {
            getSingleProduct();
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
        elseif ($_GET['url'] == 'admin') {
            getAdmin();
        }  
        elseif ($_GET['url'] == 'admin/produit') {
            getProduct();
        }
        elseif ($_GET['url'] == 'admin/ajout-produit') {
            registerProduct();   
        }
        elseif ($_GET['url'] == "admin/produit/modifier/$id_url") {
            updateProduct();
        }
        elseif ($_GET['url'] == "admin/produit/supprimer/$id_url") {
            deleteProduct();
        }
        elseif ($_GET['url'] == 'admin/categorie') {
            getCategory();
        }
        elseif ($_GET['url'] == 'admin/ajout-categorie') {
            registerNewCategory();   
        }
        elseif ($_GET['url'] == "admin/categorie/modifier/$id_url") {
            // updateCategory();
        }
        elseif ($_GET['url'] == "admin/categorie/supprimer/$id_url") {
            deleteCategory();
        }
        elseif ($_GET['url'] == 'admin/sous-categorie') {
            getSubCategory();
        }
        elseif ($_GET['url'] == 'admin/ajout-sous-categorie') {
            registerNewSubCategory();
        }
        elseif ($_GET['url'] == "admin/sous-categorie/modifier/$id_url") {
            // updateSubCategory();
        }
        elseif ($_GET['url'] == "admin/sous-categorie/suprimer/$id_url") {
            deleteSubCategory();
        }
        elseif ($_GET['url'] == 'admin/client') {
            getUserAdmin();
        } 
        elseif ($_GET['url'] == "admin/client/fiche-client/$id_url") {
            getUserAdminByID();
        }
        elseif ($_GET['url'] == "admin/client/modifier/$id_url") {
            updateUserByAdmin();
        }
        elseif ($_GET['url'] == "admin/client/supprimer/$id_url") {
            deleteUserByAdmin();
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