<?php
   session_start();
   include('fonction.php');

   include("class.php");

   if(isset($_POST['supan']))
   {
    sql("DELETE FROM `pannier` WHERE id_user=".$_SESSION['id']." && id_prod=".$_POST['supan']."");
   }

   $pannier=sql("SELECT id_prod,SUM(pannier.quantite),titre,prix,icon FROM `pannier` INNER JOIN `produits` ON id_prod=produits.id WHERE id_user=".$_SESSION['id']."&& valider=0 GROUP BY id_prod");
   //var_dump($pannier);

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
         if (!empty($pannier)) 
         {
           
         
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
            <form method="post">
              <button type="submit" name="supan" value="<?=$p[0]?>">suprimer</button>
            </form>
          </div>
          <?php       
           }

           ?><h1>total du pannier: <?=$pantotal?>€</h1>
                <form method="post" action="paiment.php">
                  <legend>Informations CB</legend>
                    <ul>
                      <li>
                        <legend>Type de carte bancaire</legend>
                        <ul>
                          <li>
                            <input id=visa name=type_de_carte type=radio>
                            <label for=visa>VISA</label>
                          </li>
                          <li>
                            <input id=amex name=type_de_carte type=radio>
                            <label for=amex>AmEx</label>
                          </li>
                          <li>
                            <input id=mastercard name=type_de_carte type=radio>
                            <label for=mastercard>Mastercard</label>
                          </li>
                        </ul>
                      </li>
                      <li>
                         <label for=numero_de_carte>N° de carte</label>
                         <input id=numero_de_carte name=numero_de_carte type=number required>
                      </li>
                      <li>
                         <label for=securite>Code sécurité</label>
                         <input id=securite name=securite type=number required>
                      </li>
                      <li>
                         <label for=nom_porteur>Nom du porteur</label>
                         <input id=nom_porteur name=nom_porteur type=text placeholder="Même nom que sur la carte" required>
                      </li>
                    </ul>
                    <input type="submit" name="paim" value="validation du pannier">
          </form>
         <!-- simulation de paiment!-->
<?php

          }
          else
          {?>
            <p>votre pannier est vide</p>
          <?php }
         ?> 
        </main>
    </body>
</html>