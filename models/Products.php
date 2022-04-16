<?php
require_once('Bdd.php');

class Products extends Bdd {
    private $id;
    private $nameProduct;
    private $description;
    private $image;
    private $priceHT;
    private $priceTTC;
    private $TVA;
    private $formats;
    private $stock;
    private $category;
    private $subcategory;

    // public function __construct() {
       
    // }

    public function getProductsfrizzy() {   
        $req = $this->db->prepare("SELECT * FROM produit WHERE id_categorie = 1");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getProductsStraight() {   
        $req = $this->db->prepare("SELECT * FROM produit WHERE id_categorie = 2");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getProductsCurly() {   
        $req = $this->db->prepare("SELECT * FROM produit WHERE id_categorie = 3");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getSingleProduct($id) {   
        $this->id = $id;

        $req = $this->db->prepare("SELECT * FROM produit WHERE id_produit= ?");
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getShampoing() {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 1");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getApresShampoing() {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 2");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getSoin() {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 3");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getCategory() {
        $req = $this->db->prepare("SELECT * FROM `categorie`");
        $req->execute();
        $resCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resCat;

    }

    public function getSubCategory() {
        $req = $this->db->prepare("SELECT * FROM `sous_categorie`");
        $req->execute();
        $resSubCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resSubCat;

    }

    public function registerProduct($nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $category, $subCategory) { 
        $this->nameProduct = $nameProduct;
        $this->description = $description; 
        $this->image = $image;  
        $this->priceHT = $priceHT; 
        $this->TVA = $TVA;
        $this->priceTTC = $priceHT;    
        $this->formats = $formats;         
        $this->stock = $stock; 
        $this->category = $category;      
        $this->subCategory = $subCategory;      

        $req = $this->db->prepare("INSERT INTO produit (nom_produit, description, image, prixHT, tauxTVA, prixTTC, formats, stock, id_categorie, id_sous_categorie) VALUES (:nom_produit, :description, :image, :prixHT, :tauxTVA, :prixTTC, :formats, :stock, :id_categorie, :id_sous_categorie)");
        $req->execute(['nom_produit'=>$nameProduct, 'description'=>$description, 'image'=>$image, 'prixHT'=>$priceHT, 'tauxTVA'=>$TVA, 'prixTTC'=>$priceTTC, 'formats'=>$formats, 'stock'=>$stock, 'id_categorie'=>$category, 'id_sous_categorie'=>$subCategory]);
    }
}
?>

