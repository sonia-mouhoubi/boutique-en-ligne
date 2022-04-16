<?php
// Require de tous les models 
require_once('models/Products.php');

// Controller ADMIN
function registerProduct()
{
    if(isset($_POST['register']))
    {
        if(!empty($_FILES['image']['name']))
        {
            $maxSize = 50000;
            $validExt = array('.jpg', '.jpeg', '.png');

            if($_FILES['image']['error']> 0)
            {
                
                echo 'Une erreur est survenue lors du transfert';
                die;
            }

            $fileSize = $_FILES['image']['size'];

            if($fileSize > $maxSize)
            {
                echo 'Le fichier ne doit pas dépassé 5 Mo.';
                die;
            }

            $fileName = $_FILES['image']['name'];
            $fileExt = '.'. strtolower(substr(strrchr($fileName, '.'), 1));

            if(!in_array($fileExt, $validExt))
            {
                echo "Le fichier n'est pas image !";
                die;
            }

            $tmpName = $_FILES['image']['tmp_name']; 
            $uniqueName = md5(uniqid(rand(), true)); // Générer des noms d'images aleatoires

            $fileName = 'public/img/'.$uniqueName.$fileExt; 
            $result = move_uploaded_file( $tmpName, $fileName);

            if($result)
            {
                echo "Image téléchargé.";
                $image = $uniqueName.$fileExt;
                var_dump($image);
                $admin = new Products; 
                $admin->registerProduct($_POST['nameProduct'], $_POST['description'], $image, $_POST['priceHT'], $_POST['TVA'], $_POST['priceTTC'], $_POST['formats'], $_POST['stock'], $_POST['category'], $_POST['subCategory']);    
                
                echo "Produits enregistrés.";  

            }
        }
    }
    $category = new Products;
    $resCat = $category->getCategory();
    $resSubCat = $category->getSubCategory();


    
    require('views/adminView.php');
}



