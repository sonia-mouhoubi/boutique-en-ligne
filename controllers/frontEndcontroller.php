<?php
// Require de tous les models 

require_once('models/User.php');
require_once('models/Products.php');
require_once('utility/fonctions.php');

// Controller INSCRIPTION
 
function registerUser()
{
    $user = new User;
    if(isset($_POST['button']))
    {
        /* récupérer les données du formulaire en utilisant la valeur des variable name comme clé*/
        $prenom = valid_donnees($_POST['prenom']);
        $nom = valid_donnees($_POST['nom']);
        $mail = valid_donnees($_POST['mail']);
        $password = valid_donnees($_POST['password']);
        $password2 = valid_donnees($_POST['password2']);


        // Si les champs est différent de vide donc rempli
        if(isset($prenom) &&  isset($nom) && isset($mail) && isset($password) && isset($password2))
        {
            // Si les champs est différent de vide donc rempli
            if(!empty($prenom) && !empty($nom) && !empty($mail) && !empty($password) && !empty($password2)) 
            {
                if($password2 == $password){
                    $password = password_hash($password, PASSWORD_DEFAULT); 
                    //condition pour verifier 
                    if (strlen($prenom) <= 50
                        && preg_match("/[A-Za-z]+$/",$prenom)

                        && strlen($nom) <= 50 
                        && preg_match("/[A-Za-z]+$/",$nom)

                        && filter_var($mail, FILTER_VALIDATE_EMAIL))
                    {
                        // ici je commence par faire une requete pour verifier si l' utilisateur existe bien en bdd
                            if (isset($_POST['mail'])){
                                $registerUser = $user->getuser($mail);

                                if ($registerUser == false) {
                                
                                    $user->register($prenom, $nom, $mail, $password); 
                                    header ('refresh: 1; URL=views/connectionView.php'); 
                                }else{
                                    header ('refresh: 1; URL=views/homeView.php');
                                }
                            }
                    }else{
                        $_SESSION['Error'] = 'identifiant où mot de passe est incorrect.';
                        echo $_SESSION['Error'];
                        header ('refresh: 1; URL=views/registerView.php');
                    }  
                }else{
                    $_SESSION['Error'] = 'Les mots de passe ne sont pas identique.';
                    echo $_SESSION['Error'];
                    header ('refresh: 1; URL=views/registerView.php');
                }  
            }else {
                $_SESSION['Error'] = 'Tous les champs doivent être remplis';
                echo $_SESSION['Error'];
                header ('refresh: 1; URL=views/registerView.php');
            }
        }else {
            $_SESSION['Error'] = 'identifiant où mot de passe inconue';
            echo $_SESSION['Error'];
            // header ('refresh: 1; URL=views/registerView.php');
        }  
    }
    require('views/registerView.php');
}

        

function connectUser()
{
    $user = new User;
    if(isset($_POST['button']))
    {
        /* récupérer les données du formulaire en utilisant la valeur des variable name comme clé*/
        $mail = valid_donnees($_POST['mail']);
        $password = valid_donnees($_POST['password']);
        
        // Si les champs est différent de vide donc rempli
        if(isset($mail) && isset($password))
 
        {
            // Si les champs est différent de vide donc rempli
            if(!empty($mail) && !empty($password) && filter_var($mail, FILTER_VALIDATE_EMAIL)) 
            {
                //condition pour verifier
                    $resultUser = $user->connectUser($mail, $password);
                   
                    if(isset($resultUser))
                    {
                        if (password_verify($password, $resultUser[0]['mot_de_passe'])) {

                            $_SESSION['mail'] = $resultUser[0]['mail'];
                            header ('refresh: 1; URL=views/homeView.php');
                        } else {
                            $_SESSION['error'] = 'le mot de passe est incorrect';
                            echo $_SESSION['error'];
                            header('refresh: 1; URL=views/connectionView.php');
                        }
                    } 
            }else {
                $_SESSION['Error'] = 'Tous les champs doivent etre remplie';
                echo $_SESSION['Error'];
                header ('refresh: 1; URL=views/connectionView.php');
            }   

        }else {
            $_SESSION['Error'] = 'identifiant où mot de passe inconue';
            echo $_SESSION['Error'];
            header ('refresh: 1; URL=views/connectionView.php');
        }
  
    }
    require('views/connectionView.php');
}

// Controller PRODUITS
function getProductsCurlyfrizzy()
{
    $products = new Products;
    $res = $products->getProductsfrizzy();
    
    require('views/productsfrizzyView.php');
}

function getProductsStraight()
{
    $products = new Products;
    $res = $products->getProductsStraight();
    
    require('views/productsStraightView.php');
}

function getProductsCurly()
{
    $products = new Products;
    $res = $products->getProductsCurly();
    
    require('views/productsStraightView.php');
}

function getShampoing()
{
    $products = new Products;
    $res = $products->getProductsfrizzy();
    
    require('views/shampoingView.php');
}

function getApresShampoing()
{
    $products = new Products;
    $res = $products->getApresShampoing();
    
    require('views/conditionerView.php');
}

function getSoin()
{
    $products = new Products;
    $res = $products->getSoin();
    
    require('views/soinView.php');
}
 
function getSingleProduct($id)
{
    $products = new Products;
    // $singleprod = $products->getSingleProduct($id);

    if(isset($_GET['id']) AND !empty($_GET['id']))
    {
        $getId = htmlspecialchars($_GET['id']);
        $getId = (int)($_GET['id']);
        $singleProduct = $products->getSingleProduct($getId);
        // var_dump($singleProduct);

        $countArt  = $products->countSingleProdu($getId);
        // var_dump($countArt);
        $countArt = (int)$countArt;
        // var_dump($countArt);

        //vérifie si l'article existe bien






        
        if($countArt == 1)
        {       
            $nomProduit =  $singleProduct['nom_produit'];
            $image =  $singleProduct['image'];
            $description =  $singleProduct['description'];
            $prixTTC =  $singleProduct['prixTTC'];
            $formats =  $singleProduct['formats'];
            $stock =  $singleProduct['stock'];
            $date =  date_format(date_create($singleProduct['date']), 'd/m/Y H:i:s');


        } else {
            die("Cet article n'existe pas !");
        }

    } else {
        header('Location : accueil');
    }
    
    require('views/singleProductView.php');
}

function profilUser(){
    $profilUser = new User; 
    require('views/profileView.php');
}

//pagination + affichage de tous les produits
function total_number_articles(){
    $allProducts = new Products;
    $products = $allProducts->allProducts();
    // var_dump($products);

    //TROUVER SOLUTION PAGINATION (stagnation des produits par page identique même si page différente)
    // ==> voir fichier standbypagination.php : met au cas o^le temps pour revenir pour le résoudre
     // On détermine sur quelle page on se trouve
 if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int)($_GET['page']);
}else{
    $currentPage = 1;
    // var_dump($currentPage); 
}

$nbArticles = $allProducts->total_number_articles();
// var_dump($nbArticles);

// On détermine le nombre d'articles par page
$parPage = 6;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;
// var_dump($premier);
$get_page = $allProducts->get_by_page($premier,$parPage);
// var_dump($get_page);



// $nbArticles = $allProducts->total_number_articles();
// // var_dump($nbArticles);

// // On détermine le nombre d'articles par page
// $parPage = 2;
// // On calcule le nombre de pages total
// $pages = ceil($nbArticles / $parPage);

// // Calcul du 1er article de la page
// $premier = ($currentPage * $parPage) - $parPage;
// // var_dump($premier);
// $get_page = $allProducts->get_by_page($premier,$parPage);
// var_dump($get_page);
   
    require('views/allProductsView.php');
}



