<?php
class Bdd {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', '');
            var_dump($this->db);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }   
    }
    
}


?>

