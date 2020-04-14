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
  if(isset($_POST['panier'])&&isset($_SESSION['id'])) 
  {

      $testprod=sql("SELECT quantite FROM pannier WHERE id_prod=".$_POST['panier']." && id_user=".$_SESSION['id']." && valider=0;");

                   
                    if(empty($testprod))
                    {
                      sql("INSERT INTO pannier(id_user,id_prod,quantite) VALUES ('".$_SESSION['id']."','".$_POST['panier']."','1' )");
                      $testprod[0][0]=1;
                    }
                    else
                    {

                      sql("UPDATE pannier SET quantite= ".(1+$testprod[0][0])." WHERE id_prod=".$_POST['panier']." && id_user=".$_SESSION['id']."&& valider=0; ");

                      $testprod[0][0]++;
                    }
  }
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Notre Boutique</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="body-bout">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <main id="main-bout">
          <div id="optionboutique">
            <form method="post" action="boutique.php" id="f-recherche">
              <input type="text" name="req" placeholder="taper votre recherche ici">
              <input type="submit" name="rech" class="buttype" value="Rechercher" >
            </form>
            <form method="post" action="boutique.php" id="f-option">
               <label>Categorie :&nbsp;
               <select type="text" name='catego' required />
                    <option>Aucune</option>
                    <option>Téléphone</option>
                    <option>Accessoire</option>               
                </select></label>
               <label>Constructeur :&nbsp;
               <select type="text" name='sous' required />
                    <option>AUCUN</option>
                    <option>SAMSUNG</option>                   
                    <option>APPLE iPhone</option>
                    <option>HUAWEI</option>
                    <option>OPPO</option>
                    <option>WIKO</option>
                    <option>XIAOMI</option>
                    <option>SONY Xperia</option>
                </select></label>
               <label>Trie :&nbsp;
               <select type="text" name='trie' required />
                    <option>Aucun</option>
                    <option>Prix croissant</option>
                    <option>Prix décroissant</option>
                    <option>Plus récents</option>               
                </select></label>
                <label>Prix supérieur à :&nbsp;
                  <input type="number" name="pr-sup" step="50" min="0"></label>
                <label>Prix inférieur à :&nbsp;
                  <input type="number" name="pr-inf" step="50" min="50"></label>
               <input type="submit" name="option" class="buttype">
            </form>
          </div>
          <div id="cont-bout">
          <section id="res-bout">
            <?php
              foreach ($res as $r) 
              {
              ?>
              <div class="prod-bout">
                <h1 class="titre-prod" ><?=$r[1]?></h1>
                <img src="<?=$r[7]?>">
                <p>Description :<br><?=$r[2]?></p>
                <h>Prix : <?=$r[3]?>€</h>
                <section>
                <a class="buttype" href="produit.php?id=<?=$r[0]?>">voir plus</a>
                <?php
                  if(isset($_SESSION['id']))
                  {
                    ?>
                    <form method="post">
                      <button class="buttype" type="submit" name="panier" value="<?=$r[0]?>">ajouter au pannier</button>
                    </form>

                  <?php
                    if(isset($testprod[0][0])&&$r[0]==$_POST['panier']) 
                    {
                      ?>
                      <b> <?=$testprod[0][0]?> dans votre pannier</b>
               <?php
                    }
                  }
                ?>
                </section>
              </div>
              <?php  
              }
            ?>
          </section>
          </div>
        </main>
    </body>
</html>