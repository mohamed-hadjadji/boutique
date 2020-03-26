<?php
   session_start();

  include("class.php");
  
   ?>

   <!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="">
</head>

<body class="topic">
    <header>

    <?php 
    include ('bar-nav.php');
     if (!isset($_SESSION["login"]))
  { 

    ?>

    </header>
    
        <section class="conteneur">
        <h1> Inscription </h1>

        <form method='POST' action=''>
           
                <label>Login</label>
                <input type="text" name='login' required />
                       
                <label>Prenom</label>
                <input type="text" name='prenom' required />
                      
                <label>Nom</label>
                <input type="text" name='nom' required />
                        
                <label>Password</label>
                <input type="password" name='mdp1' required />
            
                <label>Confirmation Password</label>
                <input type="password" name='mdp2' required />
            
                <label>Adresse</label>
                <input type="text" name='adresse' required />

                <label>Email</label>
                <input type="text" name='mail'/>

                <label>Téléphone</label>
                <input type="text" name='tele'/>
          
            <input class="bouton" type='submit' name='valider' value='Inscription' />

           <?php

        if (isset($_POST['valider']))
       {
           $register = new user();

           $login = $_POST['login'];
           $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
           $prenom = $_POST['prenom'];
           $nom =$_POST['nom'];
           $adresse=$_POST['adresse'];
           $email=$_POST['mail'];
           $tele=$_POST['tele'];

           $register->register($login,$prenom,$nom,$mdp,$adresse,$email,$tele); 
            
           
        }

    ?> 

        </form>
     </section>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté impossible de s'inscrire !!</p>
    </section>
        <?php
    }
    ?>

