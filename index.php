<?php
require('controllers/controller.php');

try {
    // $_GET['url'] = '';
    if (isset($_GET['url'])) {
      if ($_GET['url'] == 'accueil') {
            msgWelcomeHome();
        }
        elseif ($_GET['url'] == 'inscription') {
            registerUser();
        }
        elseif ($_GET['url'] == 'profil') {
            profilUser();
        }
        else {
            echo 'error 404';
        }
    }
    else {
        msgWelcomeHome();
        
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
