<?php
// session_start();

// require_once('Bdd.php');
require_once('Category.php');

 
class Products extends Category {
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

    public function getSingleProduct($id) 
    {   
        $this->id = $id;

        $req = $this->db->prepare("SELECT * FROM produit WHERE id_produit= ?");
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);   

        return $res;
    } 

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

    //PAGINATION
    //  public function allProducts()
    // {
    //     $req = $this->db->prepare("SELECT * FROM produit");
    //     $req->execute();
    //     $res = $req->fetchAll(PDO::FETCH_ASSOC); 

    //     return $res;
    // }
    
    //(1/2) On détermine le nombre total d'articles 
    //==>PAGE ARTICLES.PHP ==> PAGINATION
    public function total_number_articles()
    {
        // On détermine le nombre total d'articles
        $sql = 'SELECT COUNT(*) AS nb_articles FROM `produit`;';
        // On prépare la requête
        $query = $this->db->prepare($sql);
        // On exécute
        $query->execute();
        // On récupère le nombre d'articles
        $result = $query->fetch();
        //var_dump($result); //OK fonctionne mais problème lors de l'attribution en int
        $nbArticles = intval($result['nb_articles']) ;
        // var_dump($nbArticles);

        return $nbArticles;
    }
    
    //(2/2)le nombre d'articles par page 
    //==>PAGE ARTICLES.PHP  ==> PAGINATION
    public function get_by_page($first, $bypage)
    {
        $sql = 'SELECT * FROM `produit` ORDER BY `id_produit` ASC LIMIT :premier, :parpage;';
        // On prépare la requête
        $query = $this->db->prepare($sql);
        $query->bindValue(':premier', $first, PDO::PARAM_INT);
        $query->bindValue(':parpage', $bypage, PDO::PARAM_INT);
        // On exécute
        $query->execute();
        // On récupère les valeurs dans un tableau associatif
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($articles);

        return $articles;
    }


    // //OK articles.php
    // //PAGINATION 1/4
    // public function pag_count()
    // {
    //     $req = $this->db->prepare("SELECT * FROM produit");
    //     $req->execute();
    //     $countArt = $req->rowCount();

    //     return $countArt;
    // }

    // //OK articles.php
    // //PAGINATION 2/4
    // public function pag_recup($start, $articlesByPages)
    // {
    //     $req = $this->db->prepare("SELECT * FROM produit ORDER BY id_produit DESC LIMIT $start, $articlesByPages");
    //     $req->execute();
    //     $artInfos = $req->fetchAll(PDO::FETCH_ASSOC); 

    //     return $artInfos;
    // }

    // //OK articles.php
    // //PAGINATION 3/4
    // public function pag_recup_id($id_categorie)
    // {
    //     $req = $this->db->prepare("SELECT * FROM produit WHERE id_categorie = ? ORDER BY date DESC");
    //     $req->execute([$id_categorie]);
    //     $artInfos = $req->fetchall(PDO::FETCH_ASSOC);

    //     return $artInfos;
    // }

    // //OK articles.php
    // //PAGINATION 4/4
    // public function page_get_info_cat($id_categorie)
    // {
    //     $req = $this->db->prepare("SELECT * FROM produit WHERE id = ?");
    //     $getInfoCat = $req->fetchall();

    //     return $getInfoCat;

      
    // }

    
    
  // ********************************** Affichage produit coté BACK ************************

    // public function getCategory() {
    //     $req = $this->db->prepare("SELECT * FROM `categorie`");
    //     $req->execute();
    //     $resCat = $req->fetchAll(PDO::FETCH_ASSOC);   

    //     return $resCat;
    // }

    // public function getSubCategory() {
    //     $req = $this->db->prepare("SELECT * FROM `sous_categorie`");
    //     $req->execute();
    //     $resSubCat = $req->fetchAll(PDO::FETCH_ASSOC);   

    //     return $resSubCat;
    // }

    
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

    // public function registerNewCategory($newCategory) { 
    //     $this->newCategory = $newCategory;      

    //     $req = $this->db->prepare("INSERT INTO categorie (type_de_cheveux) VALUES (?)");
    //     $req->execute([$newCategory]);
    // }

    // public function registerSubCategory($newSubcategory) { 
    //     $this->newSubcategory = $newSubcategory;      

    //     $req = $this->db->prepare("INSERT INTO sous_categorie (nom_du_produit) VALUES (?)");
    //     $req->execute([$newSubcategory]);
    // }

    // public function registerProductNewCat($nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $newCategory, $newSubCategory) { 
    //     $this->nameProduct = $nameProduct;
    //     $this->description = $description; 
    //     $this->image = $image;  
    //     $this->priceHT = $priceHT; 
    //     $this->TVA = $TVA;
    //     $this->priceTTC = $priceHT;    
    //     $this->formats = $formats;         
    //     $this->stock = $stock;    
    //     $this->newCategory = $newCategory;    
    //     $this->subCategory = $newSubCategory;      

    //     $req = $this->db->prepare("INSERT INTO produit (nom_produit, description, image, prixHT, tauxTVA, prixTTC, formats, stock, id_categorie, id_sous_categorie) VALUES (:nom_produit, :description, :image, :prixHT, :tauxTVA, :prixTTC, :formats, :stock, :id_categorie, :id_sous_categorie)");
    //     $req->execute(['nom_produit'=>$nameProduct, 'description'=>$description, 'image'=>$image, 'prixHT'=>$priceHT, 'tauxTVA'=>$TVA, 'prixTTC'=>$priceTTC, 'formats'=>$formats, 'stock'=>$stock, 'id_categorie'=>$newCategory, 'id_sous_categorie'=>$newSubCategory]);
    // }
}
?>

