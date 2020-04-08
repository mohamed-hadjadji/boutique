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
   $dprod=sql("SELECT * FROM `produits` ORDER BY id LIMIT 5");
   $dtel=sql("SELECT * FROM `produits` WHERE categorie = 'Téléphone' ORDER BY id LIMIT 5 ");
   $dacc=sql("SELECT * FROM `produits` WHERE categorie ='Accessoire' ORDER BY id LIMIT 5 ");
  // var_dump($dprod);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="camping.css">
    <title>Accueil</title>
</head>
<body class="">
  <header class="">
    <?php 
    include("bar-nav.php");
    ?>
    <main id="user">
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et commandez maintenant";
    }
    elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez commandez maintenant.</b></h3>"; 
       }
    }
    ?>
    <section>
      <h>bienvenu sur ...</h>
      <p>texte presentatife</p>
    </section>
    <article>
      <h1>dernier produits :</h1>
      <section>
      <?php
      foreach ($dprod as $p) 
      {
     ?>
      <div>
        <b><?=$p[1]?></b>
        <img src="<?=$p[7]?>">
        <p>Prix : <?=$p[3]?>€</p>
        <a href="produit.php?id=<?=$p[0]?>">voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    <article>
      <h1>dernier telephone:</h1>
      <section>
      <?php
      foreach ($dtel as $t) 
      {
     ?>
      <div>
        <b><?=$t[1]?></b>
        <img src="<?=$t[7]?>">
        <p>Prix : <?=$t[3]?>€</p>
        <a href="produit.php?id=<?=$t[0]?>">voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    <article>
      <h1>dernier accessoire :</h1>
      <section>
      <?php
      foreach ($dacc as $a) 
      {
     ?>
      <div>
        <b><?=$a[1]?></b>
        <img src="<?=$a[7]?>">
        <p>Prix : <?=$a[3]?>€</p>
        <a href="produit.php?id=<?=$a[0]?>">voir plus</a>
      </div>
     <?php   
      }
      ?>
     </section>
    </article>
    
    </main>