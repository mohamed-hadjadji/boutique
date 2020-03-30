<?php
   session_start();
   include('fonction.php');
   $dprod=sql("SELECT * FROM `produits` ORDER BY id LIMIT 5");
   $dtel=sql("SELECT * FROM `produits` WHERE souscategorie = 'smartphone' ORDER BY id LIMIT 5");
   $dsamsung=sql("SELECT * FROM `produits` WHERE categorie ='Samsung' ORDER BY id LIMIT 5 ");
   $dhuawei=sql("SELECT * FROM `produits` WHERE categorie ='HUAWEI' ORDER BY id LIMIT 5 ");
   $darnaque=sql("SELECT * FROM `produits` WHERE categorie ='APPLE' ORDER BY id LIMIT 5 ");
   var_dump($dprod);
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

    </main>