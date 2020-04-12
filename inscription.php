<?php
   session_start();

  include("class.php");
  
   ?>

   <!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bodiprof">
    <header>

    <?php 
    include ('bar-nav.php');
     if (!isset($_SESSION["login"]))
  { 

    ?>

    </header>
      <section class="proform">
        <article id="cadins">
          <h1> Inscription </h1>

          <form class="form" method='POST' action=''>
             
                  <label>Login</label>
                  <input class="inputa" type="text" name='login' required />
                         
                  <label>Prenom</label>
                  <input class="inputa" type="text" name='prenom' required />
                        
                  <label>Nom</label>
                  <input class="inputa" type="text" name='nom' required />
                          
                  <label>Password</label>
                  <input class="inputa" type="password" name='mdp1' required />
              
                  <label>Confirmation Password</label>
                  <input class="inputa" type="password" name='mdp2' required />
              
                  <label>Adresse</label>
                  <input class="inputa" type="text" name='adresse' required />

                  <label>Email</label>
                  <input class="inputa" type="text" name='mail'/>

                  <label>Téléphone</label>
                  <input class="inputa" type="text" name='tele'/>
                <div class="valprof">
                  <input type='submit' name='valider' value='Inscription' />
                </div>
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
        </article>
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

