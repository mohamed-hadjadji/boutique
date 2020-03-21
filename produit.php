<?php
   session_start();
  //include("class.php");
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Produit</title>
        <link rel="stylesheet" href="">
    </head>
    <body class="">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <section>
        	<?php 
           $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
           $id = $_GET['id'];

           $requete = $connexion->query("SELECT * FROM produits WHERE id = $id");

           foreach ($requete as list($idpro, $titrepro, $infopro, $prixpro, $categopro, $souspro, $iconpro,$idadmin)) 
           {
           	    echo $titrepro;
                echo "<img height=\"500\" src=\"$iconpro\">";
                echo $infopro;
                echo $prixpro."€";
           }
        	?>
        </section>

    </body>
</html>