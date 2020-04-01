<?php
   session_start();
   include('fonction.php');

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
          <form method="post">
             <input type="number" name="quant" value="1" min="1" max="<?= $qtt ?>">
             <input type="submit" name="panier" value="ajouter au pannier">
          </form>
          <?php
            if(isset($_POST['panier']))
            {
              
              if(isset($_SESSION['id']))
              {
                if($_POST['quant']<=$qtt && $_POST['quant']>0)
                {
                    sql("INSERT INTO pannier(id_user,id_prod,quantite) VALUES ('".$_SESSION['id']."','".$_GET['id']."','".$_POST['quant']."' )");
                    echo $_POST['quant']." article(s) dans votre panier";
                }
                else
                {
                  echo'bien essayé hackerman';
                }
                
              }
              else
              { ?>
                <p>vous devez étre <a href="connexion.php">connécté</a> pour pouvoir ajouter un produit </p>
     <?php    }
            }
          ?>
        </section>
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
         
          }     
        ?>
        <section>
        	<?php
        	$requetemes = $connexion->query("SELECT avis.id, commentaire, avis.date, utilisateurs.id, login, produits.id, titre FROM avis INNER JOIN utilisateurs ON id_utilisateur= utilisateurs.id INNER JOIN produits ON id_produit = produits.id WHERE id_produit = $id ORDER BY avis.id DESC");

        	 foreach ($requetemes as list($idavis, $msg, $date, $iduser, $user, $idpro, $nompro))
        	 {
        	 	echo $user;
        	 	echo $msg;
        	 	echo $date;
        	 }
        	?> 
        </section>

    </body>
</html>