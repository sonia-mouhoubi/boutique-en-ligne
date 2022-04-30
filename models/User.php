<?php
require_once('Products.php');

class User extends Products {
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    private $password;
    private $bdd;


    // Fonction pour enregistrer un nouvel utilisateur
    public function register($first_name, $name, $mail, $password)
    {

        $this->first_name = $first_name;
        $this->name = $name;
        $this->mail = $mail;
        $this->password = $password;

        // // Hachage du mot de passe
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        $req = $this->db->prepare('INSERT INTO client ( prenom, nom, mail, mot_de_passe) VALUES (:prenom, :nom, :mail, :password)');
        $req->execute(['prenom' => $first_name, 'nom' => $name, 'mail' => $mail, 'password' => $password]);
    }

    public function getUser($mail)
    {

        $this->mail = $mail;

        $reqmail = $this->db->prepare('SELECT mail FROM client WHERE mail = :mail');
        $reqmail->execute(['mail' => $mail]);
        // $req->debugDumpParams();
        $result = $reqmail->fetch();

        return $result;
    }

    public function login($mail, $password){

        $this->mail = $mail;
        $this->password = $password;
    
        $req = $this->db->prepare("SELECT * FROM client  WHERE mail = :mail ");
        // $req->debugDumpParams();
        $req->execute(['mail'=>$mail]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllInfos($getId)
    {
        $getId = $_SESSION['id'];
        // $this->id = $getId;

        // $req = $this->db->prepare("SELECT * FROM client WHERE id_client = $getid");
        $req = $this->db->prepare("SELECT * FROM client WHERE id_client = $getId");
        $req->execute([$getId]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        // var_dump($getId);

        return $result;
    }


    public function updatechamps($champs, $pre)
    {
        $getid = $_SESSION['id'];

            $req = $this->db->prepare("UPDATE client SET $champs = :pre WHERE id_client = '$getid'");
            $req->execute(['pre' => $pre]);
    }


    public function contact($first_name, $name, $mail, $message)
    {

            $this->prenom = $first_name;
            $this->nom =  $name;
            $this->mail = $mail;
            $this->message = $message;

            $req = $this->db->prepare("");
            $req->execute([]);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);

           return  $result;
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



