<?php
require('Bdd.php');

class User extends Bdd {
    private $id;
    private $login;
    private $password;

    // public function __construct() {
       
    // }

    public function home() {
        echo 'salut';
    }

    public function register($login, $password) {   
        $this->login = $login;
        $this->password = $password;

        if(isset($_POST['button'])) {
            // Hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
            $req = $this->db->prepare("INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login,:password)");
            $req->execute(['login'=>$login, 'password'=>$hashed_password]);
        }
    }
    
}
?>

