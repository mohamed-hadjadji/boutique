<?php
   session_start();

  include("class.php");
  
   ?>

   <!DOCTYPE html>

<html lang="fr">

	<head>
	    <meta charset="UTF-8">
	    <title>Profil</title>
	    <link rel="stylesheet" href="">
	</head>
	<body>
		<header>
			<?php include ('bar-nav.php')?>
        </header>
        <section id="">
            <?php      
              if (isset($_SESSION['login']))
              {

              $connexion = mysqli_connect("localhost","root","","boutique");

		      $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
		      $req = mysqli_query($connexion, $requete);
		      $data = mysqli_fetch_assoc($req); 
                             
              $user= $_SESSION['login'];
			?>
		    <article class="">
		    	<h1 class="">Profil de <?php echo $user ?></h1>
		    </article>
		    <article class="">
		    	
                <h3 class="profform">Nom: <?php echo $data['nom']?></h3>
                <h3 class="profform">Prénom: <?php echo $data['prenom']?></h3>
                
		    </article>
		</section>
		<section id="">
			<h3>Modifier le pseudo & coordonnées </h3>
			<form class="" method="post">
				<label class="">Login</label> 
                <input type="text" class="input" value="<?php echo $data['login']?>" size="40" name="login"/>
                
                <label class="">Password</label>
                <input type="password" name="mdp" class="input"  size="40" required/> 

                <label class="">Adresse</label> 
                <input type="text" class="input" value="<?php echo $data['adresse']?>" size="40" name="adresse"/>

                <label class="">Email</label> 
                <input type="text" class="input" value="<?php echo $data['email']?>" size="40" name="mail"/>

                <label class="">Téléphone</label> 
                <input type="text" class="input" value="<?php echo $data['telephone']?>" size="40" name="tele"/>
                       
                <input type="submit" name="Modifier" class="" value="Modifier" />
				
			</form>
			<?php
             if (isset($_POST['Modifier']))
                    {         
		              $modifier = new user();
		              $modifier->update();
		            }
			?>
			
		</section>

		    <?php
            }
		     else 
		    {
		    ?>
		    <section id="notcon">
		      <p>Veuillez vous connecter pour accéder à votre page !</p>
		    </section>
		        <?php
		    }
		    ?>
		
	</body>
</html>