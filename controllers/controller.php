<?php
// Require de tous les models 
require('models/User.php');
require('utility/fonctions.php');

function msgWelcomeHome()
{
    $msgWelcomeHom = new User;
    $msgWelcomeHom->home();
    require('views/homeView.php');
}


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


  
function profileUser()
{


    require('views/profileView.php');
}
