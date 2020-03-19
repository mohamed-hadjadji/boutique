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
        <h1>Création Produits</h1>

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

$produit = new article();
   
$produit->produit();    
 
}

?>
      </form>
    </section>

    <section class="">
        <h1>Modifier Produits</h1>

        <form method='POST' action='' enctype="multipart/form-data">
           
                <label>Produit a Modifier</label>
                <input type="text" name='titre3'/>

                <label>Nouveau Titre</label>
                <input type="text" name='titre2'/>

                <label>Ajouter des Informations</label>
                <input type="text" name='info'/>
                      
                <label>Nouveau Prix</label>
                <input type="text" name='prix2'/>

                 <label>Nouvelle Catégorie</label>
                <input type="text" name='catego'/>

                 <label>Nouvelle Sous-catégorie</label>
                <input type="text" name='sous'/>

                 <label>Modifier l'image de produit</label>
                <input type="file" name='fileToUpload'/>
                <input type="submit" value="Modifier Article" name="modifier">
        
        <?php

if(isset($_POST["modifier"])) {

$moproduit = new article();
   
$moproduit->modifierproduit();    
 
}

?>
       </form>
    </section>

    <section class="">
      <h1>Modifier Produits</h1>

      <form method="post" action="">
          <label>Produit à Effacer</label></br>
          <input type="text" name="titre4" required></br>
          <input type="submit" value="Effacer Article" name="effacer"></br>

           <?php

    if(isset($_POST["effacer"])) {

   $offproduit = new article();
   
   $offproduit->deleteproduit();    
 
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