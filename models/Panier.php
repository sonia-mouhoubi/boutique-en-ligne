<?php 
require_once('Products.php');

class Panier extends User{
    private $id;
    private $prenom;
    private $nom;
    private $mail;
    private $password;
    private $bdd;
    private $idProduct;
    private $nameProduct;
    private $description;
    private $image;
    private $priceHT;
    private $priceTTC;
    private $TVA;
    private $formats;
    private $stock;
    private $idCategory;
    private $idSubCategory;


  
    
    // public function getAllInfos()
    // {
    //     // var_dump($id);
    //     // $query = "SELECT * FROM client WHERE id_client = ?";
    //     $req = "SELECT * FROM client";
    //     $res = $this->db->prepare($req);
    //     // $result->bindValue(":id", $id);
    //     // var_dump($res);

    //     // $result->execute(array($_SESSION['user']['id']));
    //     $res->execute();
    //     var_dump($res);

    //     $getAllInf = $res->fetch(PDO::FETCH_ASSOC);
    //     var_dump($getAllInf);

    //     return $getAllInf;
    // }

}