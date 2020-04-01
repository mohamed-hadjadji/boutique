<?php
   session_start();
   include('fonction.php');
   $pannier=sql("SELECT id_prod,SUM(pannier.quantite),titre,prix,icon FROM `pannier` INNER JOIN `produits` ON id_prod=produits.id WHERE id_user=".$_SESSION['id']." GROUP BY id_prod");
   
   var_dump($pannier);
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
        <main>
         <h1>Votre pannier :</h1>
         <?php
         $pantotal=0;
          foreach ($pannier as $p) 
          {
            $ptotal=$p[3]*$p[1];
            $pantotal+=$ptotal;
          ?>
          <div>
            <h><?=$p[2]?></h>
            <img src="<?=$p[4]?>"/>
            <p>prix: <?=$p[3]?>€</p>
            <p>total: <?=$p[3]?> x <?=$p[1]?>= <?=$ptotal?>€</p>
            <a href="produit.php?id=<?=$p[0]?>" >voir le produit</a>

          </div>
          <?php       
          }

         ?> 
         <h1>total du pannier: <?=$pantotal?></h1>
        </main>
    </body>
</html>