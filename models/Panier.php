<?php 
require_once('Products.php');

class Panier extends User{
    private $id;
    private $id_client;
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
    private $id_produit;
    private $id_panier;

    // public function __construct()
    // {
    //     var_dump($_SESSION);
    // }

        public function getVerifProductInPanier($id_produit)
        {

            $req = $this->db->prepare("SELECT * FROM produit WHERE id_produit = ? ");
            // $req = $this->db->prepare("SELECT * FROM produit");
            $req->execute([$id_produit]);
            // $basketInf = $req->fetchall(PDO::FETCH_ASSOC);
            $basketInf = $req->fetch(PDO::FETCH_ASSOC);
            // var_dump($basketInf);

            return $basketInf;
        }

        public function addBasket($id_client, $id_produit, $quantite){
            $req = $this->db->prepare("INSERT INTO `panier`(`id_client`, `id_produit`, `quantite`) VALUES (?, ?, ?)");
            $req->execute([$id_client, $id_produit, $quantite]);
        }

        public function countBasket($id_client){
            $req = $this->db->prepare("SELECT COUNT(quantite) AS quantite FROM panier WHERE id_client = ?");
            $res = $req->execute([$id_client]);
            $res = $req->fetch(PDO::FETCH_ASSOC);

            return $res;
        }

        public function displayBasketId($id_client){
            $req = $this->db->prepare("SELECT * FROM `panier`INNER JOIN produit ON panier.id_produit = produit.id_produit INNER JOIN client ON panier.id_client = client.id_client WHERE panier.id_client = $id_client");
            $res = $req->execute([$id_client]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }

        public function deleteBasketIdSingle($id_panier){
            $req = $this->db->prepare("DELETE FROM `panier` WHERE id_panier = ?");
            $req->execute([$id_panier]);

        }


        




  

}