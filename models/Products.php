<?php
// session_start();

// require_once('Bdd.php');
require_once('Category.php');


class Products extends Category {
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

    // public function __construct() {
       
    // }

    // ********************************** Message de succées et d'erreurs ************************
    public function message() { 
        // $_SESSION['msg'] = '';
        if(isset($_SESSION['msg'])) {
            return $_SESSION['msg'];
        }
    } 

    // ********************************** Affichage produit coté FRONT ************************
    public function getProduct() {   
        $req = $this->db->prepare("SELECT * FROM `produit` INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie INNER JOIN sous_categorie ON produit.id_sous_categorie = sous_categorie.id_sous_categorie ORDER BY `produit`.`id_produit` DESC");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

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

    public function getProductsCurly() 
    {   
        $req = $this->db->prepare("SELECT * FROM produit WHERE id_categorie = 3");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    // public function getSingleProduct($id) 
    // {   
    //     $this->id = $id;

    //     $req = $this->db->prepare("SELECT * FROM produit WHERE id_produit= ?");
    //     $req->execute([$id]);
    //     $res = $req->fetch(PDO::FETCH_ASSOC);   

    //     return $res;
    // } 

    public function getShampoing() 
    {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 1");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getApresShampoing() 
    {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 2");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 

    public function getSoin() 
    {   
        $req = $this->db->prepare("SELECT * FROM `produit` WHERE id_sous_categorie = 3");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $res;
    } 
    
  // ********************************** Enregistrement produit coté BACK ************************

    public function registerProduct($nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $idCategory, $idSubCategory) { 
        $this->nameProduct = $nameProduct;
        $this->description = $description; 
        $this->image = $image;  
        $this->priceHT = $priceHT; 
        $this->TVA = $TVA;
        $this->priceTTC = $priceHT;    
        $this->formats = $formats;         
        $this->stock = $stock;    
        $this->idCategory = $idCategory;    
        $this->idSubCategory = $idSubCategory;      

        $req = $this->db->prepare("INSERT INTO produit (nom_produit, description, image, prixHT, tauxTVA, prixTTC, formats, stock, id_categorie, id_sous_categorie) VALUES (:nom_produit, :description, :image, :prixHT, :tauxTVA, :prixTTC, :formats, :stock, :id_categorie, :id_sous_categorie)");
        $req->execute(['nom_produit'=>$nameProduct, 'description'=>$description, 'image'=>$image, 'prixHT'=>$priceHT, 'tauxTVA'=>$TVA, 'prixTTC'=>$priceTTC, 'formats'=>$formats, 'stock'=>$stock, 'id_categorie'=>$idCategory, 'id_sous_categorie'=>$idSubCategory]);
    }

  // ********************************** Modification du produits*

  public function getProductByID($idProduct) {   
    $req = $this->db->prepare("SELECT * FROM `produit` INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie INNER JOIN sous_categorie ON produit.id_sous_categorie = sous_categorie.id_sous_categorie WHERE id_produit = ?");
    $req->execute([$idProduct]);
    $resProduct = $req->fetch(PDO::FETCH_ASSOC);   

    return $resProduct;
} 

    public function updateProduct($nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $idCategory, $idSubCategory) { 
        $this->nameProduct = $nameProduct;
        $this->description = $description; 
        $this->image = $image;  
        $this->priceHT = $priceHT; 
        $this->TVA = $TVA;
        $this->priceTTC = $priceHT;    
        $this->formats = $formats;         
        $this->stock = $stock;    
        $this->idCategory = $idCategory;    
        $this->idSubCategory = $idSubCategory;      

        $req = $this->db->prepare("UPDATE produit SET nom_produit=?,description=?, image=?, prixHT=?, tauxTVA=?, prixTTC=?, formats=?,stock=?, id_categorie=?, id_sous_categorie=? WHERE id_produit = id_produit");
        $req->execute([$nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $idCategory, $idSubCategory]);
    }
}
?>

