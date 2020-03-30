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
     <form method='POST'>
     <input type="submit" value="Création Article" name="formcr">
     <input type="submit" value="Modifier Article" name="formmo">
     <input type="submit" value="Effacer Article" name="formdel">
   </form>
    </header>
    <?php
            $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
            $reponse2 = $connexion->query( "SELECT *FROM produits ORDER BY produits.id DESC");
                
                foreach ($reponse2 as list($id,$nompro,$infopro,$prixpro,$categopro,$souscategopro,$qtt,$iconpro,$datepro)) 
                {
                  ?>
                  <a href="produit.php?id=<?php echo $id ?>"><?php echo $nompro ?></a>
                  <?php
                  echo "<img height=\"250\" src=\"$iconpro\">";
                  echo $infopro;
                  echo $prixpro."€";
                }

     if(isset($_POST['formcr']))
     {
    ?>
    <section class="">
        <h1>Création Produits</h1>

        <form method='POST' action='' enctype="multipart/form-data">
           
                <label>Nom de produit</label>
                <input type="text" name='titre' required />

                <label>information sur produit</label>
                <textarea type="text" name='info' required></textarea> 
                      
                <label>Prix de Vente</label>
                <input type = " number " min = " 0.00 " max = " 10000.00 " step = " 0.01 " name='prix' required />

                <label>Catégorie</label>
                <select type="text" name='catego' required />
                    <option></option>
                    <option>Téléphone</option>
                    <option>Accessoire</option>               
                </select>

                 <label>Sous-catégorie</label>
                <select type="text" name='sous' required />
                    <option></option>
                    <option>SAMSUNG</option>                   
                    <option>APPLE iPhone</option>
                    <option>HUAWEI</option>
                    <option>OPPO</option>
                    <option>WIKO</option>
                    <option>XIAOMI</option>
                    <option>SONY Xperia</option>
                </select>
                <label>Quantité</label>
                <input type="text" name='qtt' required />

                 <label>Image de produit</label>
                <input type="file" name='fileToUpload' required />

                <input type="submit" value="Valider" name="submit">
        </form>
    </section>
     <?php
     }
      if(isset($_POST["submit"])) 
      {

         $produit = new article();
         $produit->produit();  

 
      }
      
  if(isset($_POST['formmo']))
  {
    ?>
    <section class="">
        <h1>Modifier Produits</h1>
         <form method='POST'>
            <input type="submit" value="Modifier nom & info" name="modifnom">
            <input type="submit" value="Modifier image" name="modifpic">
            <input type="submit" value="Modifier quantité & prix" name="modifprix">
            <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
       </form>
      <?php
  }
      if(isset($_POST['modifnom']))
      {    
       ?>

        <form method='POST' action=''>
           
                <label>Produit a Modifier</label>
                <input type="text" name='titre3'/>

                <label>Nouveau Titre</label>
                <input type="text" name='titre2'/>

                <label>Ajouter des Informations</label>
                <textarea type="text" name='info'></textarea>
            <input type="submit" value="Modifier" name="modifiernom">

            <input type="submit" value="Modifier image" name="modifpic">
            <input type="submit" value="Modifier quantité & prix" name="modifprix">
            <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
        </form>
      <?php
      }
      if(isset($_POST['modifpic']))
      {
      ?>
        <form method='POST' action='' enctype="multipart/form-data">
           
                <label>Produit a Modifier</label>
                <input type="text" name='titre3'/>              
                <label>Modifier l'image de produit</label>
                <input type="file" name='fileToUpload'/>
                <input type="submit" value="Modifier" name="modifierpic">

                <input type="submit" value="Modifier nom & info" name="modifnom">
                <input type="submit" value="Modifier quantité & prix" name="modifprix">
                <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
        </form>
        <?php
      }
      if(isset($_POST['modifprix']))
      {
      ?>
        <form method='POST' action=''>
           
                <label>Produit a Modifier</label>
                <input type="text" name='titre3'/> 
                <label>Nouveau Prix</label>
                <input type = " number " min = " 0.00 " max = " 10000.00 " step = " 0.01 " name='prix2'/>
                <label>Ajouter quantité</label>
                <input type="text" name='qtt2'/>
                <input type="submit" value="Modifier" name="modifierprix">

                <input type="submit" value="Modifier nom & info" name="modifnom">
                <input type="submit" value="Modifier image" name="modifpic">
                <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
        </form>
       <?php
      }
      if(isset($_POST['modifcat']))
      {
       ?>
        <form method='POST' action=''>
           
                <label>Produit a Modifier</label>
                <input type="text" name='titre3'/>        
                <label>Nouvelle Catégorie</label>
                <select type="text" name='catego' required />
                    <option></option>
                    <option>Téléphone</option>
                    <option>Accessoire</option>               
                </select>

                <label>Nouvelle Sous-catégorie</label>
                <select type="text" name='sous' required />
                    <option></option>
                    <option>SAMSUNG</option>                   
                    <option>APPLE iPhone</option>
                    <option>HUAWEI</option>
                    <option>OPPO</option>
                    <option>WIKO</option>
                    <option>XIAOMI</option>
                    <option>SONY Xperia</option>
                </select>                
                <input type="submit" value="Modifier" name="modifiercateg">

                <input type="submit" value="Modifier nom & info" name="modifnom">
                <input type="submit" value="Modifier image" name="modifpic">
                <input type="submit" value="Modifier quantité & prix" name="modifprix">
                
          </form>
    </section>
        <?php
      }
   
   $moproduit = new article();

   if(isset($_POST["modifiernom"])) 
   {
    $moproduit->modifiernomproduit();    
   }

   if(isset($_POST["modifierpic"])) 
   { 
    $moproduit->modifiericonproduit();    
   }

   if(isset($_POST["modifierprix"])) 
   {
    $moproduit->modifierprixproduit();    
   }

    if(isset($_POST["modifiercateg"])) 
   {  
    $moproduit->modifiercatproduit();     
   }
 
   if(isset($_POST['formdel']))
   {
  ?>
    <section class="">
      <h1>Modifier Produits</h1>

      <form method="post" action="">
          <label>Produit à Effacer</label></br>
          <input type="text" name="titre4" required></br>
          <input type="submit" value="Effacer" name="effacer"></br>
      </form>
   </section>
           <?php
    }

    if(isset($_POST["effacer"])) 
    {

     $offproduit = new article();
     $offproduit->deleteproduit();    
    }
    
  }
  else
  {
    echo"Vous n'avez pas le droit d'accés";
  }

  ?>