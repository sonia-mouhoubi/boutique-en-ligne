<?php
// session_start();

require_once('Bdd.php');
 
class Category extends Bdd {
    private $newCategory;
    private $newSubCategory;
    private $idCategory;
    private $idSubCategory;
    private $nameCategory;
    private $nameSubCategory;


// Pour FORM PRODUIT Permet de récupérer les catégories ds le formulaire des nouveaux produits
    public function getCategory() {
        $req = $this->db->prepare("SELECT * FROM `categorie` ORDER BY `id_categorie` DESC");
        $req->execute();
        $resCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resCat;
    }

// Pour FORM PRODUIT Idem pour les sous-catégories
    public function getSubCategory() {
        $req = $this->db->prepare("SELECT * FROM `sous_categorie` ORDER BY `id_sous_categorie` DESC");
        $req->execute();
        $resSubCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resSubCat;
    }

// Pour FORM PRODUIT afin d'insérer l'id de la catégorie
    public function getCategorybyName($nameCategory) {
        $this->nameCategory = $nameCategory;

        $req = $this->db->prepare("SELECT * FROM `categorie` WHERE type_de_cheveux = ?");
        $req->execute([$nameCategory]);
        $resCatbyName = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resCatbyName;
    }

// Pour FORM PRODUIT idem pour sous-catégories
    public function getSubCategorybyName($nameSubCategory) {
        $this->nameSubCategory = $nameSubCategory;

        $req = $this->db->prepare("SELECT * FROM `sous_categorie` WHERE nom_du_produit = ?");
        $req->execute([$nameSubCategory]);
        $resSubCatbyName = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resSubCatbyName;
    }

    // Permet de liéer les catégories au sous-catégories
    public function getCategorySubCategory() {
        $req = $this->db->prepare("SELECT id_sous_categorie, nom_du_produit FROM sous_categorie INNER JOIN categorie ON sous_categorie.id_sous_categorie = categorie.id_categorie
        ");
        $req->execute();
        $resSousCat = $req->fetchAll(PDO::FETCH_ASSOC);   

        return $resSousCat;
    }
// Enregistrement produits, categories, sous-categorie

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

   

    // public function getNameCategoryById($idCategory) 
    // {
    //     $this->idCategory = $idCategory;

    //     $req = $this->db->prepare("SELECT type_de_cheveux FROM `categorie` WHERE id_categorie = ?");
    //     $req->execute([$idCategory]);
    //     $resNameCat = $req->fetchAll(PDO::FETCH_ASSOC);   

    //     return $resNameCat;
    // }
}
?>

