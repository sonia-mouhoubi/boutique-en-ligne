<?php
class Bdd {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=boutique-en-ligne;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }   
    }
    
}


?>

