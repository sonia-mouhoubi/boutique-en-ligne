<?php
// session_start();
// Require de tous les models 
require_once('models/Products.php');
require_once('models/Category.php');
require_once('models/User.php');
require_once('utility/fonctions.php');


function getAdmin() {
    require('views/adminView.php');
}

// ********************* Enregistrement produits, catégories, sous-catégories *******************
function registerProduct()
{
    // Afficher les catégories et sous catégories dans le formulaire.
    $products = new Products;
    $category = new Category;

    $resCat = $category->getCategory(); 
    $resSubCat = $category->getSubCategory();
    $message = $products->message();

    if(isset($_POST['register']))
    {
                // Avant d'upload l'image on initialise une taille max à 5mo et les formats autorisés
                $maxSize = 50000; 
                $validExt = array('.jpg', '.jpeg', '.png', '.svg');

                if($_FILES['image']['error']> 0)
                {
                    // throw new Exception('Une erreur est survenue lors du transfert.');
                    $_SESSION['msg'] = "Une erreur est survenue lors du transfert.";

                }

                $fileSize = $_FILES['image']['size'];

                if($fileSize > $maxSize)
                {
                    // throw new Exception('Le fichier ne doit pas dépassé 5 Mo.');
                    $_SESSION['msg'] = "<p>Le fichier ne doit pas dépassé 5 Mo.</p>";
                }

                $fileName = $_FILES['image']['name'];
                $fileExt = '.'. strtolower(substr(strrchr($fileName, '.'), 1));

                if(!in_array($fileExt, $validExt))
                {
                    // throw new Exception('Le format du fichier n\'est pas accépté.');
                    $_SESSION['msg'] = "<p>Le format du fichier n\'est pas accépté.</p>";
                }

                $tmpName = $_FILES['image']['tmp_name']; 
                $uniqueName = md5(uniqid(rand(), true)); // Générer des noms d'images aleatoires

                $fileName = 'public/img/'.$uniqueName.$fileExt; 
                $result = move_uploaded_file( $tmpName, $fileName);

                if($result)
                {
                    // On met ds une var le nom et l'extention à enregistrer en bdd
                    $image = $uniqueName.$fileExt;

                
                        if(isset($_POST['nameProduct']) || isset($_POST['description']) || isset($_FILES['image']) || isset($_POST['priceHT']) || isset($_POST['TVA']) || isset($_POST['priceTTC']) || isset($_POST['formats']) || isset($_POST['stock']) || isset($_POST['idCategory']) || isset($_POST['idSubCategory']) && !empty($_POST['nameProduct']) && !empty($_POST['description']) && !empty($_FILES['image']) && !empty($_POST['priceHT']) && !empty($_POST['TVA']) && !empty($_POST['priceTTC']) && !empty($_POST['formats']) && !empty($_POST['stock']) && !empty($_POST['idCategory']) && !empty($_POST['idSubCategory']))
                        {
                            $resCatbyName = $category->getCategorybyName($_POST['idCategory']);
                           
                            $_POST['idCategory'] = $resCatbyName[0]['id_categorie']; 
                            // var_dump($_POST['idCategory']);

                            $resSubCatbyName = $category->getSubCategorybyName($_POST['idSubCategory']);

                            $_POST['idSubCategory'] = $resSubCatbyName[0]['id_sous_categorie'];
                            // var_dump($_POST['idSubCategory']);

                            // Enregistrement du produits
                            $products->registerProduct($_POST['nameProduct'], $_POST['description'], $image, $_POST['priceHT'], $_POST['TVA'], $_POST['priceTTC'], $_POST['formats'], $_POST['stock'], $_POST['idCategory'], $_POST['idSubCategory']);   

                            $_SESSION['msg'] = "<p>Produits enregistrés.</p>";
                            $c = $products;
                            var_dump($c);

                        }
                }
    }
     
    require('views/productAdminView.php');
}

function registerNewCategory() {
    if(isset($_POST['register']))
    {
        $category = new Category;
        $category->registerNewCategory($_POST['newCategory']);
    }
    require('views/categoryAdminView.php');
}

function registerNewSubCategory() {
    if(isset($_POST['register']))
    {
        $category = new Category;
        $category->registerNewSubCategory($_POST['newSubCategory']);
    }
    require('views/subCategoryAdminView.php');
}

// ********************* Affichage clients, produits, catégories, sous-catégories *******************
function getUserAdmin() {
    $user = new User;
    $res = $user->getUserAdmin();

    require('views/tableUserAdminView.php');
}

function getProduct() {
    $products = new Products;
    $res = $products->getProduct();

    require('views/tableProductView.php');
}

function getCategory() {
    $category = new Category;
    $resCat = $category->getCategory();
    $resSubCat = $category->getCategorySubCategory();

    require('views/tableCategoryView.php');
}

function getSubCategory() {
    $category = new Category;
    $resSubCat = $category->getCategorySubCategory();
    // $resSubCat = $category->getSubCategory();
 
    $resCat = $category->getCategory();
    require('views/tableSubCategoryView.php');
}

// ********************* Modifications produits, catégories, sous-catégories *******************

function updateProduct() {
    $products = new Products;
    $category = new Category;
    $val = substr($_GET['url'], 14);
    // Permet d'afficher la fiche produit
    $resProduct = $products->getProductByID($val);
    $resCat = $category->getCategory();
    $resSubCat = $category->getSubCategory();

    if(isset($_POST['register']))
    {
        $maxSize = 50000; 
        $validExt = array('.jpg', '.jpeg', '.png');

        if($_FILES['image']['error']> 0)
        {
            // throw new Exception('Une erreur est survenue lors du transfert.');
            $_SESSION['msg'] = "Une erreur est survenue lors du transfert.";

        }

        $fileSize = $_FILES['image']['size'];

        if($fileSize > $maxSize)
        {
            // throw new Exception('Le fichier ne doit pas dépassé 5 Mo.');
            $_SESSION['msg'] = "<p>Le fichier ne doit pas dépassé 5 Mo.</p>";
        }

        $fileName = $_FILES['image']['name'];
        $fileExt = '.'. strtolower(substr(strrchr($fileName, '.'), 1));

        if(!in_array($fileExt, $validExt))
        {
            // throw new Exception('Le format du fichier n\'est pas accépté.');
            $_SESSION['msg'] = "<p>Le format du fichier n\'est pas accépté.</p>";
        }

        $tmpName = $_FILES['image']['tmp_name']; 
        $uniqueName = md5(uniqid(rand(), true)); // Générer des noms d'images aleatoires

        $fileName = 'public/img/'.$uniqueName.$fileExt; 
        $result = move_uploaded_file( $tmpName, $fileName);

        if($result)
        {
            // On met ds une var le nom et l'extention à enregistrer en bdd
            $image = $uniqueName.$fileExt;

            if(!empty($_POST['nameProduct']) && !empty($_POST['description']) && !empty($_FILES['image']) && !empty($_POST['priceHT']) && !empty($_POST['TVA']) && !empty($_POST['priceTTC']) && !empty($_POST['formats']) && !empty($_POST['stock']) && !empty($_POST['idCategory']) && !empty($_POST['idSubCategory'])) 
            {
                $_POST['idCategory'] = $resProduct['id_categorie'];
                // $resProduct['id_categorie'] = $_POST['idCategory'];
                $_POST['idSubCategory'] = $resProduct['id_sous_categorie'];

                // $idProduct = $resProduct['id_produit'];
                // Modification du produit
                $products->updateProduct($_POST['nameProduct'], $_POST['description'], $image, $_POST['priceHT'], $_POST['TVA'], $_POST['priceTTC'], $_POST['formats'], $_POST['stock'], $_POST['idCategory'], $_POST['idSubCategory'], $val);  
                $b = $products;
                var_dump($b);
                $_SESSION['msg'] = "<p>Produits enregistrés.</p>"; 
                header("Refresh:0");
            }
        }
    }
    require('views/formUpdateProductView.php');
 
}



