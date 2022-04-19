<?php
require_once('Bdd.php');

class User extends Bdd {
    private $id;
    private $login;
    private $password;

    // public function __construct() {
       
    // }

    public function register($login, $password) {   
        $this->login = $login;
        $this->password = $password;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
        $req = $this->db->prepare("INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login,:password)");
        $req->execute(['login'=>$login, 'password'=>$hashed_password]);
    }  
}
?>

