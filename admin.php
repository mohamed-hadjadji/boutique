<?php
   session_start();
  include("class.php");
   ?>

   <!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
    <link rel="stylesheet" href="">
</head>

<body class="">
    <header>
    <?php 
    include ('bar-nav.php');
     if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
  {
     ?>
    </header>
    <section class="">
        <h1>Creation Produits</h1>

        <form method='POST' action='' enctype="multipart/form-data">
           
                <label>Nom de produit</label>
                <input type="text" name='titre' required />

                <label>information sur produit</label>
                <input type="text" name='info' required />
                      
                <label>Prix de Vente</label>
                <input type="text" name='prix' required />

                 <label>Catégorie</label>
                <input type="text" name='catego' required />

                 <label>Sous-catégorie</label>
                <input type="text" name='sous' required />

                 <label>Image de produit</label>
                <input type="file" name='fileToUpload' required />
                <input type="submit" value="Création Article" name="submit">
        
        <?php

if(isset($_POST["submit"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
$produit = new article();

    $nomart = $_POST['titre'];
    $infoart=$_POST['info'];
    $prixart = $_POST['prix'];
    $catart = $_POST['catego'];
    $soucatart = $_POST['sous'];
   
$produit->produit($nomart,$infoart,$prixart,$catart,$soucatart,$target_file);    
 
}

?>
</form>
    </section>

    <?php
  }
  else
  {
    echo"Vous n'avez pas le droit d'accés";
  }

  ?>