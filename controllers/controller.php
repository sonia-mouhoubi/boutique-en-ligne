<?php
// Require de tous les models 
require('models/User.php');

function msgWelcomeHome()
{
    $msgWelcomeHom = new User;
    $msgWelcomeHom->home();
    require('views/homeView.php');
}

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

function profilUser(){
    $profilUser = new User;
    require('views/profileView.php');
    
}

