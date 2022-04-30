<?php
// session_start();

// require_once('Bdd.php');
require_once('Category.php');


class Infos extends Category {
    private $val;

  public function getProductByIDVal($val) {   
    $req = $this->db->prepare("SELECT * FROM `produit` INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie INNER JOIN sous_categorie ON produit.id_sous_categorie = sous_categorie.id_sous_categorie WHERE id_produit = ?");
    $req->execute([$val]);
    $resProduct = $req->fetch(PDO::FETCH_ASSOC);   

    return $resProduct;
} 

    
}
?>

