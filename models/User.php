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
            $req = $this->bdd->prepare("INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login,:password)");
            $req->execute(['login'=>$login, 'password'=>$hashed_password]);
        }
    }
    
}
?>

