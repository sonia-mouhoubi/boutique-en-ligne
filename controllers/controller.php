<?php
// Require de tous les models 
require_once('models/User.php');
require_once('models/Products.php');

// Controller INSCRIPTION
function registerUser()
{
    $user = new User;
    if(isset($_POST['button'])) {
        if(isset($_POST["login"])) {
        
            $user->register($_POST["login"], $_POST["password"]);

        }
    }
    require('views/registerView.php');
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
    
    require('views/apresShampoingView.php');
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
    $res = $products->getSingleProduct($id);
    
    require('views/singleProductView.php');
}
