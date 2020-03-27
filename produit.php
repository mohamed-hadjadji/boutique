<?php
   session_start();
  //include("class.php");
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Produit</title>
        <link rel="stylesheet" href="">
    </head>
    <body class="">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <section>
        	<?php 
           $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
           $id = $_GET['id'];

           $requete = $connexion->query("SELECT * FROM produits WHERE id = $id");

           foreach ($requete as list($idpro, $titrepro, $infopro, $prixpro, $categopro, $souspro,$qtt, $iconpro, $idadmin)) 
           {
           	    echo $titrepro;
                echo "<img height=\"500\" src=\"$iconpro\">";
                echo $infopro;
                echo $prixpro."€";
           }
        	?>
        </section>
        <section>
        	<h2>Votre Avis sur le Produit</h2>
         <form action="produit.php?id=<?php echo $id ?>" method="post" class="">
                <label>Votre Commentaire</label></br>
                <textarea type="text" name="comment" rows="3" maxlength="50" cols="120"required></textarea></br>
                <input type="submit" value="Poster" name="submit">
        </form>
        <?php 
          if (isset($_POST['submit']))
         { 

         	$requeteuser = $connexion->query("SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'");
            $resultat=$requeteuser->fetchAll();

         	$avis= $_POST['comment'];
            $iduser =$resultat[0][0]; 

            $requeteavi = $connexion->query("INSERT INTO avis(commentaire, id_utilisateur, id_produit, date) VALUES ('$avis','$iduser','$id',NOW())");
            
            header("location:produit.php?id=$id");
            var_dump($requeteavi);
          }     
        ?>
        </section>

    </body>
</html>