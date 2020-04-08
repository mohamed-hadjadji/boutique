 <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  
    <li class=""><a href="index.php">Accueil</a></li>
    <li class=""><a href="boutique.php">boutique</a></li>
    <li class=""><a href="connexion.php">Connexion</a></li>
    <li class=""><a href="inscription.php">Inscription</a></li>
    <li>
      <form method="post" action="boutique.php" id="recherche bar-nav">
              <input type="text" name="req">
              <input type="submit" name="rech">
      </form>
    </li>
    
  
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
       
    ?>
    <nav class="menu">
      
        <li class=""><a href="index.php">Accueil</a></li>
        <li class=""><a href="boutique.php">boutique</a></li>
        <li class=""><a href="profil.php">Profil</a></li>
        <li class=""><a href="admin.php">Administrateur</a></li>
        <li class=""><a href="index.php?deconnexion=true">Déconnexion</a>
        <li>
          <form method="post" action="boutique.php" id="recherche bar-nav">
              <input type="text" name="req">
              <input type="submit" name="rech">
          </form>
    </li>      
      
    </nav>
 
     <?php
    }
    else
    {   
    ?>
    <nav class="menu">
      
        <li class="menu-item"><a href="index.php">Accueil</a></li>
         <li class=""><a href="boutique.php">boutique</a></li>
        <li class="menu-itemc"><a href="profil.php">Profil</a></li>
        <li class="menu-itemc"><a href="pannier.php">Pannier</a></li>

        <li class="menu-itemc"><a href="index.php?deconnexion=true">Déconnexion</a>
        <li>
          <form method="post" action="boutique.php" id="recherche bar-nav">
              <input type="text" name="req">
              <input type="submit" name="rech">
          </form>
        </li>
     
    
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