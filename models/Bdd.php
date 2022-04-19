<?php

session_start();

class Bdd {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8', 'root', 'root');
            // var_dump($this->db);
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }   
    }
    
}


?>

