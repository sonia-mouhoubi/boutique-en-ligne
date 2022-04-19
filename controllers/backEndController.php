<?php
session_start();
// Require de tous les models 
require_once('models/Products.php');

// Controller ADMIN PRODUIT
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
                $validExt = array('.jpg', '.jpeg', '.png');

                if($_FILES['image']['error']> 0)
                {
                    // throw new Exception('Une erreur est survenue lors du transfert.');
                    $_SESSION['msg'] = "<p>Une erreur est survenue lors du transfert.</p>";

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
                            $resCatbyId = $products->getCategorybyId($_POST['idCategory']);
                           
                            $_POST['idCategory'] = $resCatbyId[0]['id_categorie'];
                            var_dump($_POST['idCategory']);

                            $resSubCatbyId = $products->getSubCategorybyId($_POST['idSubCategory']);

                            $_POST['idSubCategory'] = $resSubCatbyId[0]['id_sous_categorie'];
                            var_dump($_POST['idSubCategory']);

                            // Enregistrement du produits
                            $products->registerProduct($_POST['nameProduct'], $_POST['description'], $image, $_POST['priceHT'], $_POST['TVA'], $_POST['priceTTC'], $_POST['formats'], $_POST['stock'], $_POST['idCategory'], $_POST['idSubCategory']);   

                            $_SESSION['msg'] = "<p>Produits enregistrés.</p>";

                        }
                }
    }
    
    require('views/adminView.php');
}

function registerNewCategory() {
    $category = new Category;
    $category->registerNewCategory($_POST['newCategory']);

    require('views/adminView.php');
}
function registerNewSubCategory() {
    $category = new Category;
    $category->registerNewCategory($_POST['newCategory']);
    
    require('views/adminView.php');
}



