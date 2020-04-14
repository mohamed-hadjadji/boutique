<?php
   session_start();

  include("class.php");
  
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

		    <?php
            }
		     else 
		    {
		    ?>
		    <section class="notcon">
		      <p>Veuillez vous connecter pour accéder à la page !</p>
		    </section>
		        <?php
		    }
		    ?>
		</main>
	</body>
</html>