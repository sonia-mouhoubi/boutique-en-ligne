<?php
require_once('Bdd.php');

class User extends Bdd {
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    private $password;
    private $bdd;


    // Fonction pour enregistrer un nouvel utilisateur

    public function register($prenom, $nom, $mail, $password) {   
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->password = $password;
       
            // // Hachage du mot de passe
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

            $req = $this->db->prepare("INSERT INTO client ( prenom, nom, mail, mot_de_passe) VALUES (:prenom, :nom, :mail, :password)");
            $req->execute(['prenom'=>$prenom, 'nom'=>$nom, 'mail'=>$mail, 'password'=>$password]);
    }

    public function getuser($mail){

        $this->mail = $mail;

        $req = $this->db->prepare('SELECT mail FROM client WHERE mail = :mail');
        $req->execute(['mail'=>$mail]);
        // $req->debugDumpParams();
        $result = $req->fetch();

        return $result;
    }

    public function connectUser($mail, $password){
        $this->mail = $mail;
        $this->password = $password;
    
        $req = $this->db->prepare("SELECT mail , mot_de_passe FROM client  WHERE mail = :mail ");
        $req->debugDumpParams();
        $req->execute(['mail'=>$mail]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($_SESSION);

        return $result;
    }

    public function profileUser(){
       
    }

    public function getUserAdmin() 
    {
        $req = $this->db->prepare("SELECT * FROM `client` INNER JOIN droits ON client.id_droits = droits.id_droits
        ");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    }
}
?>



