<?php
   session_start();
                   if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
   include('fonction.php');
   $dprod=sql("SELECT * FROM `produits` ORDER BY id DESC LIMIT 5");
   $dtel=sql("SELECT * FROM `produits` WHERE categorie = 'Téléphone' ORDER BY id DESC LIMIT 5 ");
   $dacc=sql("SELECT * FROM `produits` WHERE categorie ='Accessoire' ORDER BY id DESC LIMIT 5 ");
  // var_dump($dprod);
?>
<html>
<head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Accueil</title>
</head>
<body id="body-ind" class="">
  <header class="">
    <?php 
    include("bar-nav.php");
    ?>
  </header>
    <main id="main-ind" >
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et commandez maintenant</h3>";
    }
    elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour $user, vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour $user, vous êtes connecté vous pouvez commandez maintenant.</b></h3>"; 
       }
    }
    ?>
    <section id="first-sec">
      <h>Bienvenue sur Mobileshop</h>
      <p>En gammel manns mani
Jeg ble vant til det
For å pynte på ensomheten min med aksentene til denne sangen
Når jeg tenker på Fernande
Jeg bånd, jeg bånd
Når jeg tenker på Félicie så bandasje jeg også
Når jeg tenker på Leonore
Herregud, jeg band fremdeles
Men når jeg tenker på Lulu
Jeg er ikke i bandasje lenger
Pappasbandasjen, den kan ikke bestilles
Det er denne mannlige avståelsen
Denne virile antifonen
Det høres ut i porthuset
Valiant vakthold
Når jeg tenker på Fernande
Jeg bånd, jeg bånd
Når jeg tenker på Félicie så bandasje jeg også
Når jeg tenker på Leonore
Herregud, jeg band fremdeles
Men når jeg tenker på Lulu
Jeg er ikke i bandasje lenger
Pappasbandasjen, den kan ikke bestilles

</p>
    </section>
    <article class="art-ind">
      <h1>Dernier produits :</h1>
      <section class="sec-ind">
      <?php
      foreach ($dprod as $p) 
      {
     ?>
      <div class="div-ind">
        <b><?=$p[1]?></b>
        <img src="<?=$p[7]?>">
        <p>Prix : <?=$p[3]?>€</p>
        <a href="produit.php?id=<?=$p[0]?>">Voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    <article class="art-ind">
      <h1>Dernier telephone :</h1>
      <section class="sec-ind">
      <?php
      foreach ($dtel as $t) 
      {
     ?>
      <div class="div-ind">
        <b><?=$t[1]?></b>
        <img src="<?=$t[7]?>">
        <p>Prix : <?=$t[3]?>€</p>
        <a href="produit.php?id=<?=$t[0]?>">Voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    <article class="art-ind">
      <h1>Dernier accessoire :</h1>
      <section class="sec-ind">
      <?php
      foreach ($dacc as $a) 
      {
     ?>
      <div class="div-ind">
        <b><?=$a[1]?></b>
        <img src="<?=$a[7]?>">
        <p>Prix : <?=$a[3]?>€</p>
        <a href="produit.php?id=<?=$a[0]?>">Voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    
    </main>
    <footer class="footer">
        <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Mohamed & Etienne.</p></aside>
    </footer>
  </body>
</html>