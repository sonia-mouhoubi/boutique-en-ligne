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
    private $first;
    private $bypage;

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

    //(1/2)Création page article selon son id 
    public function getSingleProduct($id)
    {
        $this->id = $id;

        $sql ="SELECT * FROM `produit` WHERE id_produit = $id ";
        // On prépare la requête
        $request = $this->bdd->prepare($sql);
        // On exécute
        $request->execute([$id]);
        // On récupère les valeurs dans un tableau associatif
        // $articles = $request->fetchAll(PDO::FETCH_ASSOC);
        $articles = $request->fetch(PDO::FETCH_ASSOC);
        // var_dump($articles);

        return $articles;
    }
    //(2/2)Création page article selon son id  
    public function countSingleProdu($id)
    {
        $this->id = $id;

        $sql ="SELECT * FROM `produit` WHERE id_produit = $id ";
        // On prépare la requête
        $request = $this->bdd->prepare($sql);
        // On exécute
        $request->execute([$id]);

        $countArt = $request->rowCount();

        return $countArt;

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

     public function allProducts()
    {
        $req = $this->db->prepare("SELECT * FROM produit");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC); 
        // $res = $req->fetchAll(PDO::FETCH_OBJ); 
        // var_dump($res);
        return $res;
    }
    
    // //(1/2) On détermine le nombre total d'articles 
    // public function total_number_articles()
    // {
    //     // On détermine le nombre total d'articles
    //     $sql = 'SELECT COUNT(*) AS nb_articles FROM `produit`;';
    //     // On prépare la requête
    //     $query = $this->db->prepare($sql);
    //     // On exécute
    //     $query->execute();
    //     // On récupère le nombre d'articles
    //     $result = $query->fetch();
    //     //var_dump($result); //OK fonctionne mais problème lors de l'attribution en int
    //     $nbArticles = intval($result['nb_articles']) ;
    //     // var_dump($nbArticles);

    //     return $nbArticles;
    // }
    // //(2/2)le nombre d'articles par page 
    // public function get_by_page($first, $bypage)
    // {
    //     $this->first = $first;      
    //     $this->bypage = $bypage;      

    //     $sql = "SELECT * FROM `produit` ORDER BY `id_produit` ASC LIMIT  $first, $bypage";
    //     // On prépare la requête
    //     $query = $this->db->prepare($sql);
    //     // On exécute
    //     $query->execute([$first, $bypage]);
    //     // On récupère les valeurs dans un tableau associatif
    //     $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    //     // var_dump($articles);

    //     return $articles;
    // }

    //==>PAGE ARTICLES.PHP ==> PAGINATION
    //(1/2) On détermine le nombre total d'articles 
    public function total_number_articles()
    {
        // On détermine le nombre total d'articles
        $sql = 'SELECT COUNT(*) FROM `produit`;';
        // On prépare la requête
        $request = $this->db->prepare($sql);
        // On exécute
        $request->execute();
        // On récupère le nombre d'articles
        $result = $request->fetch();
        //var_dump($result); //OK fonctionne mais problème lors de l'attribution en int
        $nbArticles = intval($result);
        // var_dump($nbArticles);

        return $nbArticles;
    }
    //==>PAGE ARTICLES.PHP  ==> PAGINATION
        //(2/2)le nombre d'articles par page 
    public function get_by_page($first, $bypage)
    {
        $sql = 'SELECT * FROM `produit` ORDER BY `nom_produit` DESC LIMIT :premier, :parpage;';
        // On prépare la requête
        $request = $this->db->prepare($sql);
        $request->bindValue(':premier', $first, PDO::PARAM_INT);
        $request->bindValue(':parpage', $bypage, PDO::PARAM_INT);
        // On exécute
        $request->execute();
        // On récupère les valeurs dans un tableau associatif
        $articles = $request->fetchAll(PDO::FETCH_ASSOC);
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
    $req->execute();
    $resProduct = $req->fetchAll(PDO::FETCH_ASSOC);   

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

        $req = $this->db->prepare("UPDATE `produit` SET `id_produit`=?,`nom_produit`=?,`description`=?,`image`=?,`prixHT`=?,`tauxTVA`=?,`prixTTC`=?,`formats`=?,`stock`=?,`id_categorie`=?,`id_sous_categorie`=? WHERE id_produit");
        $req->execute([$nameProduct, $description, $image, $priceHT, $TVA, $priceTTC, $formats, $stock, $idCategory, $idSubCategory]);
    }
}
?>

