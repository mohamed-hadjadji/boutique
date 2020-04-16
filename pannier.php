<?php
   session_start();
   include('fonction.php');

   include("class.php");

   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Panier</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="bodipa">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <main class="mopan">
          <div class="cadpan">
            
           <?php
        if (isset($_SESSION['login']))
        {
          ?>
          <h1>Votre panier</h1>
          <?php
          if(isset($_POST['supan']))
           {
            sql("DELETE FROM `pannier` WHERE id_user=".$_SESSION['id']." && id_prod=".$_POST['supan']."");
           }

           $pannier=sql("SELECT id_prod,SUM(pannier.quantite),titre,prix,icon FROM `pannier` INNER JOIN `produits` ON id_prod=produits.id WHERE id_user=".$_SESSION['id']."&& valider=0 GROUP BY id_prod");
           //var_dump($pannier);
           if (!empty($pannier)) 
           {
             
           
           $pantotal=0;
            foreach ($pannier as $p) 
             {
              $ptotal=$p[3]*$p[1];
              $pantotal+=$ptotal;
            ?>
          
          <section class="areap">
              <div class="esppan">
                <div class="artpan">
                    <article id="imapan">
                      <img height="120" src="<?=$p[4]?>"/>
                      <a href="produit.php?id=<?=$p[0]?>" ><b>Voir le produit</b></a>
                    </article>
                    <article id="titpan">
                      <h3><b><?=$p[2]?></b></h3>               
                      <p>Prix: <b><?=$p[3]?> €</b></p>
                    </article>
                    <article id="quantpa">
                      <h3><b>Quantité:</b></h3>
                      <p><b><?=$p[1]?></b></p>
                    </article>
                    <article id="totart">
                      <h3>Total:</h3>
                      <p><b><?=$ptotal?> €</b></p>
                    </article>                    
                    <form id="supp" method="post">
                      <button type="submit" name="supan" value="<?=$p[0]?>"><img height="40"src="img/close-button.png"></button>
                    </form>
                 
                </div>
              </div>
            </section>
            <?php       
           }

           ?>
           <section class="validation">
              <article id="totpan">
               <h1>Total du panier: <b><?=$pantotal?> €</b></h1>
             </article>
             <article id="paiment">
                    <form id="paiform" method="post" action="paiment.php">
                      <legend id="ticar"><b>Informations CB</b></legend>
                      <div id="card">
                        <img height="80" src="img/visa.png">
                        <img height="80" src="img/MasterCard.png">
                        <img height="80" src="img/amex.png">
                      </div>
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
                        <input type="submit" name="paim" value="Validation du panier">
                    </form>
                 </article>
            </section>
            
         <!-- simulation de paiment!-->
           <section >
  <?php

            }
            else
            {?>
              <article id="panvide">
              <p><b>est vide !</b></p>
              </article>
            <?php }
           ?> 
             </section>
           </div>
        </main>
        <footer class="footer">
            <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Mohamed & Etienne.</p></aside>
        </footer>
        <?php
        }
        else
        {
        
       ?>
        <div class="notcon">
          <p>Veuillez vous connecter pour accéder à la page !</p>
        </div>
            <?php
        }
        ?>
      
        
    </body>
</html>