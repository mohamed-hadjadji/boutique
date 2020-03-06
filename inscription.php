<?php
   session_start();

  $connexion =  mysqli_connect("localhost","root","","boutique");
  if (!isset($_SESSION["login"]))
  {

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

    <?php include 'bar-nav.php' ?>

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
            $login = $_POST['login'];
            $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
          $prenom = $_POST['prenom'];
          $nom =$_POST['nom'];
          $adresse=$_POST['adresse'];
          $email=$_POST['mail'];
          $tele=$_POST['tele'];

            if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,prenom,nom,password,adresse,email,telephone)
                VALUES ('$login','$prenom','$nom','$mdp','$adresse','$email','$tele')";
            $query=mysqli_query($connexion,$sql);
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
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

