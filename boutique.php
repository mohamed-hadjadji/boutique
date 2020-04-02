<?php
   session_start();
   include('fonction.php');

  include("class.php");

  if(isset($_POST['req']))
  {
    if(empty($_POST['req']))
    {
     // echo "vide";
    }
    else
    {
      //echo"plein";
      $res=recherche($_POST['req']);
    }
  }
  else
  {
    if(isset($_POST['option']))
    {
      $res=option($_POST);
      
    }
    else
    {
       $res=sql("SELECT * FROM produits ORDER BY RAND()");
    }
  } 
 var_dump($res);
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Notre Boutique</title>
        <link rel="stylesheet" href="">
    </head>
    <body class="">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <main>
          <div id="optionboutique">
            <form method="post" action="boutique.php" id="f-recherche">
              <input type="text" name="req">
              <input type="submit" name="rech">
            </form>
            <form method="post" action="boutique.php" id="f-option">
               <label>Categorie :</label>
               <select type="text" name='catego' required />
                    <option>Aucune</option>
                    <option>Téléphone</option>
                    <option>Accessoire</option>               
                </select>
               <label>Constructeur :</label>
               <select type="text" name='sous' required />
                    <option>AUCUN</option>
                    <option>SAMSUNG</option>                   
                    <option>APPLE iPhone</option>
                    <option>HUAWEI</option>
                    <option>OPPO</option>
                    <option>WIKO</option>
                    <option>XIAOMI</option>
                    <option>SONY Xperia</option>
                </select>
               <label>Trie :</label>
               <select type="text" name='trie' required />
                    <option>Aucun</option>
                    <option>Prix croissant</option>
                    <option>Prix décroissant</option>
                    <option>Plus récents</option>               
                </select>
                <label>Prix supérieur à :</label>
                  <input type="number" name="pr-sup"  min="0">
                <label>Prix inférieur à :</label>
                  <input type="number" name="pr-inf"  min="0">
               <input type="submit" name="option">
            </form>
          </div>
          <section >
            
          </section>
        </main>
    </body>
</html>