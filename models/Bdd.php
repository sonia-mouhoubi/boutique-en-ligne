<?php

// session_start();

class Bdd {
    protected $db;

    public function __construct() {
        try {
            // $this->db = new PDO('mysql:host=localhost;dbname=boutique-en-ligne;charset=utf8', 'root', '');
            $this->db = new PDO( 
                'mysql:host=localhost;dbname=boutique-en-ligne', 
                'root', 
                '', 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        //pour avoir les erreurs et pouvoir débeugué : donc pour avoir des warning au lieu d'avoir rien du tout
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) 
            ); 
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }   
    }
    
}

?>

