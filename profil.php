<?php
   session_start();

  include("class.php");
  include("fonction.php");
   ?>

   <!DOCTYPE html>

<html lang="fr">

	<head>
	    <meta charset="UTF-8">
	    <title>Profil</title>
	    <link rel="stylesheet" href="style.css">
	</head>
	<body class="bodpro">
		<header>
			<?php include ('bar-nav.php')?>
        </header>
        <main class="monprof">
	        <section class="ident">
	            <?php      
	              if (isset($_SESSION['login']))
	              {

	              $connexion = mysqli_connect("localhost","root","","boutique");

			      $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
			      $req = mysqli_query($connexion, $requete);
			      $data = mysqli_fetch_assoc($req); 
	                             
	              $user= $_SESSION['login'];
				?>
			    <article id="loprof">
			    	<h1 >Profil de <?php echo $user ?></h1>
			    </article>
			    <article id="nomprof">
			    	
	                <h3 class="">Nom: <?php echo $data['nom']?></h3>
	                <h3 class="">Prénom: <?php echo $data['prenom']?></h3>
	                
			    </article>
			</section>
		</main>
		<main>
			<section class="proform">
			  <article id="cadprof">
				<h3>Modifier le pseudo & coordonnées </h3>
					<form class="form" method="post">
						<label class="">Login</label> 
		                <input type="text" class="inputa" value="<?php echo $data['login']?>" size="40" name="login"/>
		                
		                <label class="">Password</label>
		                <input type="password" name="mdp" class="inputa"  size="40" required/> 

		                <label class="">Adresse</label> 
		                <input type="text" class="inputa" value="<?php echo $data['adresse']?>" size="40" name="adresse"/>

		                <label class="">Email</label> 
		                <input type="text" class="inputa" value="<?php echo $data['email']?>" size="40" name="mail"/>

		                <label class="">Téléphone</label> 
		                <input type="text" class="inputa" value="<?php echo $data['telephone']?>" size="40" name="tele"/>
		               <div class="valprof">        
		                <input type="submit" name="Modifier" class="" value="Modifier" />
		               </div>
						
					</form>
				<?php
	             if (isset($_POST['Modifier']))
	                    {         
			              $modifier = new user();
			              $modifier->update();
			            }
				?>
			    </article>
				
			</section>
			<section class="sectbo">
                <form  class= 'buthis' method='POST'>
                    <input type="submit" value="Historique de mes commandes" name="histco">
                </form>
            </section>
		</main>
		<main class="mes-com">
            
         <?php
        if(isset($_POST['histco']))
       {
         ?>
			<section class="histori">
			
            <?php

           $commande=sql("SELECT livraison.id,date,status,cmd,total,utilisateurs.id FROM `livraison` INNER JOIN `utilisateurs` ON id_user = utilisateurs.id WHERE id_user = '".$_SESSION['id']."' LIMIT 10 ");
         if (!empty($commande))
         {

            foreach ($commande as $l) 
          {
          	?>
            <p class="dateco"><b>Commande de <i><?=$l[1]?></i></b></p>
          	<?php
           $com=json_decode($l[3]);

             foreach ($com as $art) 
                {
                  $titre=sql("SELECT titre,icon FROM produits WHERE id =".$art->id."");
                  ?>
                  <article id="art-com">
                    <div id="phoart">               
                         <img height='70' src="<?=$titre[0][1] ?>">
                    </div>
                    <div id="art-inf">
		                <b><?=$titre[0][0] ?></b>
		                <b>Prix: <?=$art->prix ?> €</b>
		                <b>Quantité: <?=$art->quantite ?></b>
                    </div>
                  </article>
                  <?php
                }
                ?>
	          	<article id="">
	              
	              <p class="">Total achat: <b><?=$l[4]?> €</b></p>
	           </article>
	           <?php  
             }
         }
         else
         {
         	?>
              <article id="pacom">
                   <p><b>Aucune commande pour l'instant</b></p>
              </article>
            <?php 
         }
      }
            ?>


            </section>
			</main>
			<footer class="footer">
                <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Mohamed & Etienne.</p></aside>
            </footer>

		    <?php
            }
		     else 
		    {
		    ?>
		    <div class="notcon">
		      <p>Veuillez vous connecter pour accéder à la page !</p>
		    </div>
		        <?php
		    }
		    ?>
		

	</body>
</html>