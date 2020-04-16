<?php
   session_start();
   include('fonction.php');

  include("class.php");
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Produit</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="bodip">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <section>
          <?php 
           $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
           $id = $_GET['id'];

           $requete = $connexion->query("SELECT * FROM produits WHERE id = $id");

           foreach ($requete as $p) 
           {
            $qtt= $p[6];
            ?>
             
                <article class="espart">
                  <div id="icoart">
                    <img height='450' src="<?=$p[7]?>">
                  </div>
                  <div id="infart">
                    <h2 id="titre"><b><?=$p[1]?></b></h2>
                    <h4 id="date"><b>En Stock le: <?=$p[8]?></b></h4>
                    <li id="cate">Catégorie: <b><?=$p[4]?></b></li>
                    <li id="marq">Marque: <b><?=$p[5]?></b></li>
                    <li id="pres"><b>Présentation produit:</b></li>
                    <p id="text"><?=$p[2]?></p>
                  </div>
                  <div id="priart">
                    <p id="prix">Prix : <b><?=$p[3]?> €</b></p>
                    <p id="quant">Quantité restée en stock: <b><?=$p[6]?></b></p>   
                  </div>
                </article>
              </section>
             
          <?php
           }
          ?>  
          <section class="espan">
              <article class="boutpan">
                <form class="ajpanier" method="post">
                   <input type="number" name="quant" value="1" min="1" max="<?= $qtt ?>">
                   <input type="submit" name="panier" value="Ajouter au panier">
                </form>
              </article>
              <article class="mespan">
              
          <?php
                if(isset($_POST['panier']))
                {
                  
                  if(isset($_SESSION['id']))
                  {
                    if($_POST['quant']<=$qtt && $_POST['quant']>0)
                    { 

                      $testprod=sql("SELECT quantite FROM pannier WHERE id_prod=".$_GET['id']." && id_user=".$_SESSION['id']." && valider=0;");

                        if(empty($testprod))
                        {
                          sql("INSERT INTO pannier(id_user,id_prod,quantite) VALUES ('".$_SESSION['id']."','".$_GET['id']."','".$_POST['quant']."' )");
                        }
                        else
                        {

                          sql("UPDATE pannier SET quantite= ".($_POST['quant']+$testprod[0][0])." WHERE id_prod=".$_GET['id']." && id_user=".$_SESSION['id']."&& valider=0; ");
                          $_POST['quant']+=$testprod[0][0];
                        }
                        
                        echo "Vous avez ".$_POST['quant']." copie de cette article dans votre panier";
                    }
                    else
                    {
                      echo'bien essayé hackerman';
                    }
                    
                  }
                  else
                  { ?>
                    <p>Vous devez être <a href="connexion.php">connécté</a> pour pouvoir ajouter un produit </p>
         <?php    }
                }
              ?>
          </article>
        </section>
      <?php
        if (isset($_SESSION['login']))
        {
      ?>
      
        <section class="comment">
          <article class="sand">
              <h2>Votre Avis sur le Produit</h2>
              <form action="produit.php?id=<?php echo $id ?>" method="post" id="avform">
                    <label>Poster un commentaire</label></br>
                    <textarea id="area" type="text" name="comment" rows="3" maxlength="100" cols="120"required></textarea></br>
                    <input type="submit" value="Poster" name="submit">
              </form>
        </article>
        <?php
         } 
          if (isset($_POST['submit']))
         { 

          $requeteuser = $connexion->query("SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'");
            $resultat=$requeteuser->fetchAll();

          $avis= $_POST['comment'];
            $iduser =$resultat[0][0]; 

            $requeteavi = $connexion->query("INSERT INTO avis(commentaire, id_utilisateur, id_produit, date) VALUES ('$avis','$iduser','$id',NOW())");
            
            header("location:produit.php?id=$id");
         
          }     
        ?>
        </section>
        <section class="affavi">
          <?php
          $requetemes = $connexion->query("SELECT commentaire, avis.date, login, produits.id FROM avis INNER JOIN utilisateurs ON id_utilisateur= utilisateurs.id INNER JOIN produits ON id_produit = produits.id WHERE id_produit = $id ORDER BY avis.id DESC");

           foreach ($requetemes as $avis)
           {
           ?>
          <article class="messa">
            <div id="user">
              <p>Posté le: <i><?=$avis[1]?></i></p>
              <p>Par: <b><?=$avis[2]?></b></p>
            </div>
            <div id="avis">
              <p><?=$avis[0]?></p>
            </div>

          </article>
           <?php
           }
          ?> 
        </section>

    </body>
</html>