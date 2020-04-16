<?php
	session_start();

    include("class.php");
	
    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="style.css">
        <title>Connexion</title>
        </head>
        <body class="bodiprof">
            <header>
            <?php
    	    include("bar-nav.php");
            ?>
            </header>
                
                    <?php
                if ( !isset($_SESSION['login']) )
                {
                    $connect = new user();
                    $connect->connect();
                    ?>
                <section class="proform">
                    <article id="cadins"> 
                        <h1> Connexion </h1> 
                        <form class="form" name="loginform"  method="post"> 
                            
                                <label for="user_login">Username</label> 
                                <input type="text" class="inputa" placeholder="Username" name="login" required/> 
                           
               
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" class="inputa" placeholder="Password" required/> 
                      
                            <div class="valprof">
                              <input type="submit" name="submit" value="Connexion"/>
                            </div>                    
                            <?php
                            if(isset($_GET['erreur'])){
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2)
                                    echo "<p class='erreur'><b>*Utilisateur ou mot de passe incorrect*</b></p>";
                            }

                            if(isset($_GET['reconnect'])){
                                $con = $_GET['reconnect'];
                                if($con==1 || $con==2)
                                    echo "<p class='new'><b>*Connectez-vous avec le nouveau profil*</b></p>";
                            }
                            
                            ?>
                        
                            <div class="inscri">
                                <p>Pas encore membre ? <a href="inscription.php" class="btn">Inscrivez-vous gratuitement</a></p>
                            </div>
                        
                         
                       </form>
                    </article>
                                   
                </section>
         
            <footer class="footer">
                 <aside id="Copyright"><p> Copyright 2020 Coding School | All Rights Reserved | Project by Mohamed & Etienne.</p></aside>
            </footer>
            <?php
            }
            else 
            {
            ?>
                <div class="notcon">
                  <p>Vous êtes déjà connecté !!</p>
                </div>
            <?php
           }

        ?>
        
   
    </body>
</html>
