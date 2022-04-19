<?php
class User {
    private $id;
    private $login;
    private $password;
    private $bdd;

    public function __construct() {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost; dbname=boutique_en_ligne; charset=utf8',
                'root',
                '');
        } catch (PDOExeption $e) {
            
            die('Erreur :'.$e->getMessage());
        }
    }

    // Fonction pour enregistrer un nouvel utilisateur
    public function home() {
        echo 'salut';
    }

    public function register($login, $password) {   
        $this->login = $login;
        $this->password = $password;

        if(isset($_POST['button'])) {
            // Hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
            $req = $this->bdd->prepare("INSERT INTO `utilisateurs`( 'login', 'password') VALUES (:login,:password)");
            $req->execute(['login'=>$login, 'password'=>$hashed_password]);
        }
    }

    // public function profil(){
        public function updatelogin($login)
        {
            if (isset($_SESSION['user']) && isset($login))
            {
                $this->login = $login;
    
                $infos2 = "SELECT * FROM utilisateurs WHERE login = :login ";
                $result2 = $this->bdd->prepare($infos2);
                $result2->setFetchMode(PDO::FETCH_ASSOC);
                $result2->execute(array(
                    ":login" => $login,
                ));
    
                $verifyLogin = $result2->fetchAll();
    
    
                if (!$verifyLogin)
                {
                    $update = "UPDATE utilisateurs SET login= :login  WHERE id = :id ";
                    $result = $this->bdd->prepare($update);
    
                    $result->execute(array(
                        ":id" => $_SESSION['user']['id'],
                        ":login" => $login,
                    ));
                }
                if ($login !== $_SESSION['user']['login']) {
                    $update = "UPDATE utilisateurs SET login= :login  WHERE id = :id ";
                    $result = $this->bdd->prepare($update);
                    $result->execute(array(
                        ":id" => $_SESSION['user']['id'],
                        ":login" => $login,
                    ));
                    $_SESSION['user']['login'] = $login;
    
                         $_SESSION['error'] = "<p> les informations de l'utilisateurs ont bien été modifiées.</p>";
                }
                else
                {
                    $_SESSION['error'] = "<p>Vous ne pouvez pas utiliser ce login, car c'est votre login actuel.</p>";
                }
            }
            
        }
    
        public function updateEmail($email)
        {
            if (isset($_SESSION['user']) && isset($email))
            {
                $this->email = $email;
    
                $infos2 = "SELECT * FROM utilisateurs WHERE email = :email ";
                $result2 = $this->bdd->prepare($infos2);
                $result2->setFetchMode(PDO::FETCH_ASSOC);
                $result2->execute(array(
                    ":email" => $email,
                ));
    
                $verifyEmail = $result2->fetchAll();
    
    
                if (!$verifyEmail)
                {
                    $update = "UPDATE utilisateurs SET email= :email  WHERE id = :id ";
                    $result = $this->bdd->prepare($update);
    
                    $result->execute(array(
                        ":id" => $_SESSION['user']['id'],
                        ":email" => $email,
                    ));
                }
                if ($email !== $_SESSION['user']['email']) {
                    $update = "UPDATE utilisateurs SET email= :email  WHERE id = :id ";
                    $result = $this->bdd->prepare($update);
                    $result->execute(array(
                        ":id" => $_SESSION['user']['id'],
                        ":email" => $email,
                    ));
                    $_SESSION['user']['email'] = $email;
    
                         $_SESSION['error-email'] = "<p> les informations de l'utilisateurs ont bien été modifiées.</p>";
                }
                else
                {
                    $_SESSION['error-email'] = "<p>Vous ne pouvez pas utiliser cet email, car c'est votre email actuel ou c'est vide.</p>";
                }
            }
            
        }
    
    
        public function updatepassword($password, $passwordConfirm)
        {
    
    
                if ($password == $passwordConfirm)
                {
                    $cryptedpass = password_hash($passwordConfirm, PASSWORD_BCRYPT);
                    $update = "UPDATE utilisateurs SET password= :password WHERE id = :id ";
                    $result = $this->bdd->prepare($update);
    
                    $result->execute(array(
                        ":id" => $_SESSION['user']['id'],
                        ":password" => $cryptedpass,
                    ));
                    $_SESSION['error'] = "les informations de l'utilisateurs ont bien été modifiées";
                }
                else
                {
                    $_SESSION['error'] = "Les mots de passes doivent être identiques.";
                }
            }
            
    }    
// }
?>

