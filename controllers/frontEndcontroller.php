<?php
// Require de tous les models 

require_once('models/User.php');
require_once('models/Products.php');
require_once('models/Panier.php');
require_once('utility/fonctions.php');

// Controller INSCRIPTION
function homeView() 
{
    $products = new Products;
    $res = $products->allProductsLimit4();

    require('views/homeView.php');
}

// Controller INSCRIPTION
function registerUser()
{
    $user = new User;
    if (isset($_POST['register'])) {

        /* récupérer les données du formulaire en utilisant la valeur des variable name comme clé*/
        $first_name = valid_donnees($_POST['prenom']);
        $name = valid_donnees($_POST['nom']);
        $mail = valid_donnees($_POST['mail']);
        $password = valid_donnees($_POST['mot_de_passe']);
        $password2 = valid_donnees($_POST['confirMdp2']);


        // Si les champs est différent de vide donc rempli
        if (isset($first_name) &&  isset($name) && isset($mail) && isset($password) && isset($password2)) {
            // Si les champs est différent de vide donc rempli
            if (!empty($first_name) && !empty($name) && !empty($mail) && !empty($password) && !empty($password2)) {
                $first_namelenght = strlen($first_name);
                $namelenght = strlen($name);

                if ($first_namelenght <= 50 && preg_match("/[A-Za-z]+$/", $first_name));
                if ($namelenght <= 50 && preg_match("/[A-Za-z]+$/", $name)) {

                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                        $registerUser = $user->getuser($mail);

                        if ($registerUser == 0) {

                            if ($password == $password2) {

                                $password = password_hash($password, PASSWORD_DEFAULT);

                                $user->register($first_name, $name, $mail, $password);
                                $_SESSION['msg'] = "Votre compte a bien étè crée !";
                                echo $_SESSION['msg'];
                                header('refresh: 1; URL=/plateforme/boutique-en-ligne/connexion');
                            } else {
                                $_SESSION['Error'] = 'Les mots de passe ne sont pas identique.';
                                echo $_SESSION['Error'];
                                header('refresh: 1; URL=/plateforme/boutique-en-ligne/inscription');
                            }
                        } else {
                            $_SESSION['Error'] = "L'Adresse mail n'est pas valide !";
                            echo $_SESSION['Error'];
                        }
                    } else {
                        $_SESSION['Error'] = "Votre adresse mail n'est pas valide !";
                        echo $_SESSION['Error'];
                    }
                } else {
                    $_SESSION['Error'] = 'Votre nom et prenom ne doivent pas dépasser 50 caractères !';
                    echo $_SESSION['Error'];
                }
            } else {
                $_SESSION['Error'] = 'Tous les champs doivent être remplis !';
                echo $_SESSION['Error'];
            }
        } else {
            $_SESSION['Error'] = 'Tous les champs doivent être remplis !';
            echo $_SESSION['Error'];
        }
    }
    require('views/registerView.php');
}

        

// Controller CONNEXION
function connectUser()
{
    $user = new User;
    if (isset($_POST['formconnection'])) {
        /* récupérer les données du formulaire en utilisant la valeur des variable name comme clé*/
        $mail = valid_donnees($_POST['mail']);
        $password = valid_donnees($_POST['mot_de_passe']);

        // Si les champs est différent de vide donc rempli
        if (isset($mail) && isset($password)) {

            // Si les champs est différent de vide donc rempli
            if (!empty($mail) && !empty($password) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                //condition pour verifier
                $resultUser = $user->login($mail, $password);
                // var_dump( $resultUser );

                if (isset($resultUser)) {
                    if (password_verify($password, $resultUser[0]['mot_de_passe'])) {
                        // var_dump($_SESSION['id']);
                        // var_dump($_SESSION['prenom']);
                        // var_dump($_SESSION['nom']);
                        // var_dump($_SESSION['mail']);
                        $_SESSION['id'] = $resultUser[0]['id_client'];
                        $_SESSION['prenom'] = $resultUser[0]['prenom'];
                        $_SESSION['nom'] = $resultUser[0]['nom'];
                        $_SESSION['mail'] = $resultUser[0]['mail'];

                        $_SESSION['msg'] = 'Connexion réussie !';
                        echo $_SESSION['msg'];
                        header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
                    } else {
                        $_SESSION['error'] = 'Le mot de passe est incorrect.';
                        echo $_SESSION['error'];
                        header('refresh: 1; URL=/plateforme/boutique-en-ligne/connexion');
                    }
                }
            } else {
                $_SESSION['Error'] = 'Tous les champs doivent etre remplis.';
                echo $_SESSION['Error'];
                header ('refresh: 1; URL=/plateforme/boutique-en-ligne/connexion');
            }
        } else {
            $_SESSION['Error'] = "L'identifiant ou le mot de passe est inconue.";
            echo $_SESSION['Error'];
            header ('refresh: 1; URL=/plateforme/boutique-en-ligne/connexion');
        }
    }
    require('views/connectionView.php');
}


//Controller PROFIL
function profileUser()
{
    $user = new User;
    if (isset($_SESSION['id'])) 
    {
        $user = new User;
        $infousers = $user->getAllInfos($_SESSION);
    }

    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {

        $first_name = valid_donnees($_POST["prenom"]);

        $user->updatechamps('prenom', $first_name);
        $_SESSION['prenom'] = $first_name;
        $_SESSION['msg'] = 'Votre prénom a bien été modifié.';
        echo $_SESSION['msg'];
        header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
    } else {
        $_SESSION['Error'] = "Votre prénom n'a pas été modifié !";
        echo $_SESSION['Error'];
    }


    if (isset($_POST['nom']) && !empty($_POST['nom'])) {

        $name = valid_donnees($_POST["nom"]);

        $user->updatechamps('nom', $name);
        $_SESSION['nom'] = $name;
        $_SESSION['msg'] = 'Votre nom a bien été modifié.';
        echo $_SESSION['msg'];
        header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
    } else {
        $_SESSION['Error'] = "Votre nom n'a pas été modifié !";
        echo $_SESSION['Error'];
    }


    if (isset($_POST['nouveauMail']) && !empty($_POST['nouveauMail'])) {

        $mail = valid_donnees($_POST["nouveauMail"]);

        $user->updatechamps('mail', $mail);
        $_SESSION['mail'] = $mail;
        $_SESSION['msg'] = 'Votre mail a bien été modifié.';
        echo $_SESSION['msg'];
        header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
    } else {
        $_SESSION['Error'] =  "Votre mail n'a pas été modifié ! ";
        echo $_SESSION['Error'];
    }
    

    if (isset($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe']) && isset($_POST['nouveaumot_de_passe']) && !empty($_POST['nouveaumot_de_passe'])) 
    {
        $password = valid_donnees($_POST["mot_de_passe"]);
        $password2 = valid_donnees($_POST["nouveaumot_de_passe"]);

        if($password == $password2){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $user->updatechamps('mot_de_passe', $password);
            $_SESSION['msg'] = 'Vos identifiants on été modifié.';
            echo $_SESSION['msg'];
            header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
        } else {
            $_SESSION['Error'] = 'Vos mots de passe ne sont pas identiques !';
            echo $_SESSION['Error'];
        }
       
    }
    require('views/profileView.php');    
    // $resSession = $profilUser->getAllInfos();
    // var_dump($resSession);
    // var_dump($_SESSION);
}


// Controller 
function contactUser()
{

    $user = new User;
    if (isset($_POST['submit'])) {

        $first_name = valid_donnees($_POST["prenom"]);
        $name = valid_donnees($_POST["nom"]);
        $mail = valid_donnees($_POST["mail"]);
        $message = valid_donnees($_POST["message"]);
    }
    require('views/contactView.php');
}

// Barre de recherche
function searchBarre()
{
    // $products = new Products;
    $products = new Products;
    // $idSearch = substr($_GET['url'],17);


        // var_dump($_POST['search']);
        if(isset($_POST['envoyer'])  AND !empty($_POST['envoyer'])){
        $recherche = valid_donnees($_POST['search']);
        // $recherche = $_GET['envoyer'];
        // $result = $products->searchReq($idSearch);
        $result = $products->searchReq($recherche);
        
    // var_dump($re sult);
    // var_dump($result);

        
        // return $result;
       
    }
    require('views/searchView.php');

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
    
    require('views/conditionerView.php');
}

function getSingleProduct()
{
    $products = new Products;
    $idSingleProductFront = substr($_GET['url'], 18);

    $resProduct = $products->getProductByID($idSingleProductFront);

    // var_dump($resProduct);

    // $singleprod = $products->getSingleProduct($id);

    if(isset($idSingleProductFront) AND !empty($idSingleProductFront))
    {
        $idSingleProductFront = htmlspecialchars($idSingleProductFront);
        $idSingleProductFront = (int)($idSingleProductFront);
        $singleProduct = $products->getSingleProduct($idSingleProductFront);
        var_dump($idSingleProductFront);

        $countArt  = $products->countSingleProdu($idSingleProductFront);
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
            $stock =  $singleProduct['stock'];
        } else {
            die("Cet article n'existe pas !");
        }

    } else {
        header('refresh: 1; URL=/plateforme/boutique-en-ligne/profil');
    }
    
    require('views/singleProductView.php');
}

    

//pagination + affichage de tous les produits
function total_number_articles(){
    $allProducts = new Products;

    $products = $allProducts->allProducts();
    
    // var_dump($products);

    // TROUVER SOLUTION PAGINATION (stagnation des produits par page identique même si page différente)
    // ==> voir fichier standbypagination.php : met au cas o^le temps pour revenir pour le résoudre
    // On détermine sur quelle page on se trouve
        // if(isset($_GET['page']) && !empty($_GET['page'])){
        //     $currentPage = (int)($_GET['page']);
        // }else{
        //     $currentPage = 1;
        //     var_dump($currentPage);
        // }

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

////////////PANIER ///////////////////
function check_session_basket(){

    $user = new User;
    $infoUsers = $user->getAllInfos($_SESSION);
    // if(isset($_SESSION['user'])){
    //     $userinfos = $profilUser->getAllInfos();
    // }
    var_dump($infoUsers);

    // $basket = new User;
    // $baskets = $basket->getAllInfos();

    require('views/panierView.php');


}