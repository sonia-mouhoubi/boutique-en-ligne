<?php
// session_start();

require_once('Bdd.php');

class Category extends Bdd {
    private $newCategory;
    private $newSubCategory;
    private $idCategory;
    private $idSubCategory;

    // public function __construct() {
       
    // }
// Pour FORM PRODUIT Permet de récupérer les catégories ds le formulaire des nouveaux produits
    public function getCategory() {
        $req = $this->db->prepare("SELECT * FROM `categorie`");
        $req->execute();
        $resCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resCat;
    }
// Pour FORM PRODUIT Idem pour les sous-catégories
    public function getSubCategory() {
        $req = $this->db->prepare("SELECT * FROM `sous_categorie`");
        $req->execute();
        $resSubCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resSubCat;
    }
// Pour FORM PRODUIT afin d'insérer l'id de la catégorie
    public function getCategorybyId($idCategory) {
        $this->idCategory = $idCategory;

        $req = $this->db->prepare("SELECT *FROM `categorie` WHERE type_de_cheveux = ?");
        $req->execute([$idCategory]);
        $resCatbyId = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resCatbyId;
    }
// Pour FORM PRODUIT idem pour sous-catégories
    public function getSubCategorybyId($idSubCategory) {
        $this->idSubCategory = $idSubCategory;

        $req = $this->db->prepare("SELECT * FROM `sous_categorie` WHERE nom_du_produit = ?");
        $req->execute([$idSubCategory]);
        $resCatbyId = $req->fetchAll(PDO::FETCH_ASSOC);   


        return $resCatbyId;
    }


    // public function getMaxIdCategory() {
    //     $req = $this->db->prepare("SELECT id_categorie FROM categorie WHERE id_categorie=(SELECT max(id_categorie) FROM categorie)");
    //     $req->execute();
    //     $resCat = $req->fetchAll(PDO::FETCH_ASSOC);   

    //     return $resCat;
    // }

    // public function registerMaxIdCategory($id_category) {
    //     $this->id_category = $id_category;      

    //     $req2 = $this->db->prepare("INSERT INTO categorie (id_categorie) VALUES (?)");
    //     $req2->execute([$id_category]);

    // }

    // ********************************** produits coté BACK ************************
    // public function registerCategory($category) { 
    //     $this->category = $category;      

    //     $req2 = $this->db->prepare("INSERT INTO categorie (type_de_cheveux) VALUES (?)");
    //     $req2->execute([$category]);
    // }
    
    
    public function registerNewCategory($newCategory) { 
        $this->newCategory = $newCategory;      

        $req = $this->db->prepare("INSERT INTO categorie (type_de_cheveux) VALUES (?)");
        $req->execute([$newCategory]);
    }

    public function registerNewSubCategory($newSubcategory) { 
        $this->newSubcategory = $newSubcategory;      

        $req = $this->db->prepare("INSERT INTO sous_categorie (nom_du_produit) VALUES (?)");
        $req->execute([$newSubcategory]);
    }

}
?>

