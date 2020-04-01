<?php
	session_start();

    include("class.php");
	
    if ( !isset($_SESSION['login']) )
    {
    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="">
        <title>Connexion</title>
        </head>
        <body class="">
            <header>
            <?php
    	    include("bar-nav.php");
            ?>
            </header>
            <section id="connexion">
                <?php
                $connect = new user();
                $connect->connect();
                ?>

                <div id="main" class="container">   
                    <form name="loginform" id="loginform" action="#" method="post" class="wpl-track-me"> 
                        <p class="login-username">
                            <label for="user_login">Username</label> 
                            <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="login" required/> 
                        </p> 
                        <p class="login-password"> 
                            <label for="user_pass">Password</label>
                            <input type="password" name="password" id="user_pass" class="input" placeholder="Password" value="" size="20" required/> 
                        </p>    

                        <p class="login-submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Connexion" />
                            <input type="hidden" name="redirect_to" value="#"/>
                        </p>    
                 
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
                    </main>
                    <main class="inscri">
                        <p>Pas encore membre ? <a href="inscription.php" class="btn">Inscrivez-vous gratuitement</a></p>
                    </main>
                     
                </form>
             </div>
                
                 
            </section>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté !!</p>
    </section>
        <?php
    }

    ?>
   
</body>
</html>