 <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  <nav class="recher">
      <aside id="searchbartop">
        <input type="checkbox" id="searchbartopbtn" />
        <label for="searchbartopbtn"><img title="Recherche" height="40" src="img/recherche.png"></label>
        <form method="post" action="boutique.php" id="recherche bar-nav">
                  <div><input type="text" name="req" ></div>
                  <button type="submit" name="rech"><b>Recherche</b></button>
                  
          </form>
      </aside>
  </nav>
  
  <nav class="menu">
      <p class=""><a href="index.php">Accueil</a></p>
      <p class=""><a href="boutique.php">Boutique</a></p>
      <img height="100" src="img/mobile-shop-logo.png">
      <p class=""><a href="connexion.php">Connexion</a></p>
      <p class=""><a href="inscription.php">Inscription</a></p>
  </nav>
    <li>
      <form method="post" action="boutique.php" id="recherche bar-nav">
              <input type="text" name="req">
              <input type="submit" name="rech">
      </form>
    </li>
    
      

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
       
    ?>

  <nav class="recher">
      <aside id="admin">
      <a href="admin.php"><img title="Page admin" height="44" src="img/admin.png"></a>
      </aside>
      <aside id="searchbartop">
        <input type="checkbox" id="searchbartopbtn" />
        <label for="searchbartopbtn"><img title="Recherche" height="42" src="img/recherche.png"></label>
        <form method="post" action="boutique.php" id="recherche bar-nav">
                  <div><input type="text" name="req" ></div>
                  <button type="submit" name="rech"><b>Recherche</b></button>
                  
          </form>          
      </aside>
      
  </nav>
  <nav class="menu">
      
        <p class=""><a href="index.php">Accueil</a></p>
        <p class=""><a href="boutique.php">Boutique</a></p>
        <img height="100" src="img/mobile-shop-logo.png">
        <p class=""><a href="profil.php">Mon profil</a></p>
        <p class=""><a href="index.php?deconnexion=true">Déconnexion</a></p>
        
  </nav>
 
     <?php
    }
    else
    {   
    ?>
  <nav class="recher">
      <aside id="panier">
         <a href="pannier.php"><img title="Panier" height="40" src="img/panier.png"></a>
      </aside>
      <aside id="searchbartop">
        <input type="checkbox" id="searchbartopbtn" />
        <label for="searchbartopbtn"><img title="Recherche" height="40" src="img/recherche.png"></label>
        <form method="post" action="boutique.php" id="recherche bar-nav">
                  <div><input type="text" name="req" ></div>
                  <button type="submit" name="rech"><b>Recherche</b></button>
                  
          </form>
      </aside>
      
  </nav>
  <nav class="menu">
      
        <p class="menu-item"><a href="index.php">Accueil</a></p>
        <p class=""><a href="boutique.php">Boutique</a></p>
        <img height="100" src="img/mobile-shop-logo.png">
        <p class="menu-itemc"><a href="profil.php">Mon profil</a></p>
        <p class="menu-itemc"><a href="index.php?deconnexion=true">Déconnexion</a></p>
         
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
    
    }
      
  }
             
    ?>