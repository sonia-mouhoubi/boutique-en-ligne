<?php

function valid_donnees($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

function securityImage()
{
    $maxSize = 50000; 
    $validExt = array('.jpg', '.jpeg', '.png');

    if($_FILES['image']['error']> 0)
    {
        // throw new Exception('Une erreur est survenue lors du transfert.');
        $_SESSION['msg'] = "Une erreur est survenue lors du transfert.";

    }

    $fileSize = $_FILES['image']['size'];

    if($fileSize > $maxSize)
    {
        // throw new Exception('Le fichier ne doit pas dépassé 5 Mo.');
        $_SESSION['msg'] = "<p>Le fichier ne doit pas dépassé 5 Mo.</p>";
    }

    $fileName = $_FILES['image']['name'];
    $fileExt = '.'. strtolower(substr(strrchr($fileName, '.'), 1));

    if(!in_array($fileExt, $validExt))
    {
        // throw new Exception('Le format du fichier n\'est pas accépté.');
        $_SESSION['msg'] = "<p>Le format du fichier n\'est pas accépté.</p>";
    }

    $tmpName = $_FILES['image']['tmp_name']; 
    $uniqueName = md5(uniqid(rand(), true)); // Générer des noms d'images aleatoires

    $fileName = 'public/img/'.$uniqueName.$fileExt; 
    $result = move_uploaded_file( $tmpName, $fileName);

    // On met ds une var le nom et l'extention à enregistrer en bdd
    $image = $uniqueName.$fileExt;
    $image = $_FILES['image'];
    
    return $result;
}