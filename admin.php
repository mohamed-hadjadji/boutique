<?php
   session_start();
  include("class.php");
   ?>

   <!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bodia">
    <header>
    <?php 
      include ('bar-nav.php');
      if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
    {
     ?>
      <nav id="commande">
        <form class= 'button' method='POST'>
           <input type="submit" value="Créer un article" name="formcr">
           <input type="submit" value="Modifier un article" name="formmo">
           <input type="submit" value="Effacer un article" name="formdel">
        </form>
      </nav>
    </header>
    <main id="espace">

        <aside id="espaceform">
          <p id="welco"><b>Bienvenue à l'éspace admin</b></p>
        <?php
                
         if(isset($_POST['formcr']))
         {
        ?>
            <section class="formulaire">
              <article id="cadreform">
                <h1>Création d'un nouveau produit</h1>

                <form class="form" method='POST' enctype="multipart/form-data">
                   
                        <label>Nom de produit</label>
                        <input class="inputa" type="text" name='titre' required />

                        <label>information sur le produit</label>
                        <textarea class="inputa" type="text" name='info' rows="10" required></textarea> 
                              
                        <label>Prix de Vente</label>
                        <input class="inputa" type = " number " min = " 0.00 " max = " 10000.00 " step = " 0.01 " name='prix' required />

                        <label>Catégorie</label>
                        <select class="inputa" type="text" name='catego' required />
                            <option></option>
                            <option>Téléphone</option>
                            <option>Accessoire</option>               
                        </select>

                         <label>Sous-catégorie</label>
                        <select class="inputa" type="text" name='sous' required />
                            <option></option>
                            <option>SAMSUNG</option>                   
                            <option>APPLE iPhone</option>
                            <option>HUAWEI</option>
                            <option>OPPO</option>
                            <option>WIKO</option>
                            <option>XIAOMI</option>
                            <option>SONY Xperia</option>
                        </select>
                        <label>Quantité</label>
                        <input class="inputa" type="text" name='qtt' required />

                         <label>Image de produit</label>
                        <input class="inputa" type="file" name='fileToUpload' required />
                       <div id="valid">
                        <input type="submit" value="Valider" name="submit">
                      </div>
                </form>
              </article>
            </section>
             <?php
             }
              if(isset($_POST["submit"])) 
              {

                 $produit = new article();
                 $produit->produit();  

         
              }
              
          if(isset($_POST['formmo']))
          {
            ?>
            <section class="commod">
                <h1>Modifier un produit</h1>
                <article id="buttonmo">
                  <form id="forbout" method='POST'>
                    <input type="submit" value="Modifier nom & info" name="modifnom">
                    <input type="submit" value="Modifier image" name="modifpic">
                    <input type="submit" value="Modifier quantité & prix" name="modifprix">
                    <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
                  </form>
                </article>
              <?php
          }
              if(isset($_POST['modifnom']))
              {    
               ?>
            
              <article id="buttonmo">
                <form method="post">
                  <input type="submit" value="Modifier image" name="modifpic">
                  <input type="submit" value="Modifier quantité & prix" name="modifprix">
                  <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
                </form>
              </article>
            <section class="formulaire">
              <article id="cadreform">
                <form class="form" method='POST'>
                    <h2>Modifier le nom & les informations</h2>
                   
                        <label>Produit a Modifier</label>
                        <input class="inputa" type="text" name='titre3'/>

                        <label>Nouveau Titre</label>
                        <input class="inputa" type="text" name='titre2'required/>

                        <label>Ajouter des Informations</label>
                        <textarea class="inputa" type="text" name='info'rows="10" required></textarea>
                    <input type="submit" value="Modifier" name="modifiernom">
                </form>
              </article>
            </section>
              <?php
              }
              if(isset($_POST['modifpic']))
              {
              ?>
            
              <article id="buttonmo">
                <form method="post">
                  <input type="submit" value="Modifier nom & info" name="modifnom">
                  <input type="submit" value="Modifier quantité & prix" name="modifprix">
                  <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
                </form>
              </article>
            <section class="formulaire">
              <article id="cadreform">
                <form class="form" method='POST' enctype="multipart/form-data">
                      <h2>Modifier la photo</h2>
                   
                        <label>Produit a Modifier</label>
                        <input class="inputa" type="text" name='titre3'/>              
                        <label>Modifier l'image de produit</label>
                        <input class="inputa" type="file" name='fileToUpload' required/>
                        <input type="submit" value="Modifier" name="modifierpic">         
                </form>
              </article>
            </section>
                <?php
              }
              if(isset($_POST['modifprix']))
              {
              ?>
           
              <article id="buttonmo">
                <form method="post">
                  <input type="submit" value="Modifier nom & info" name="modifnom">
                  <input type="submit" value="Modifier image" name="modifpic">
                  <input type="submit" value="Modifier catégorie & s-catégorie" name="modifcat">
                </form>
              </article>
            <section class="formulaire">
              <article id="cadreform">
                <form class="form" method='POST'>
                  <h2>Modifier le prix & la quantité</h2>
                   
                        <label>Produit à modifier</label>
                        <input class="inputa" type="text" name='titre3'/> 
                        <label>Nouveau prix</label>
                        <input class="inputa" type = " number " min = " 0.00 " max = " 10000.00 " step = " 0.01 " name='prix2'required/>
                        <label>Ajouter quantité</label>
                        <input class="inputa" type="text" name='qtt2'required/>
                        <input type="submit" value="Modifier" name="modifierprix">
                </form>
              </article>
            </section>
               <?php
              }
              if(isset($_POST['modifcat']))
              {
               ?>
            
              <article id="buttonmo">
                <form method="post">
                  <input type="submit" value="Modifier nom & info" name="modifnom">
                  <input type="submit" value="Modifier image" name="modifpic">
                  <input type="submit" value="Modifier quantité & prix" name="modifprix">
                </form>
              </article>
            <section class="formulaire">
              <article id="cadreform">
                <form class="form" method='POST'>
                      <h2>Modifier la catégorie & s.catégorie</h2>
                        <label>Produit à Modifier</label>
                        <input class="inputa" type="text" name='titre3'/>        
                        <label>Nouvelle Catégorie</label>
                        <select class="inputa" type="text" name='catego' required />
                            <option></option>
                            <option>Téléphone</option>
                            <option>Accessoire</option>               
                        </select>

                        <label>Nouvelle Sous-catégorie</label>
                        <select class="inputa" type="text" name='sous' required />
                            <option></option>
                            <option>SAMSUNG</option>                   
                            <option>APPLE iPhone</option>
                            <option>HUAWEI</option>
                            <option>OPPO</option>
                            <option>WIKO</option>
                            <option>XIAOMI</option>
                            <option>SONY Xperia</option>
                        </select>                
                        <input type="submit" value="Modifier" name="modifiercateg">             
                  </form>
                </article>
              </section>
            </section>
                <?php
              }
           
                 $moproduit = new article();

                 if(isset($_POST["modifiernom"])) 
                 {
                  $moproduit->modifiernomproduit();    
                 }

                 if(isset($_POST["modifierpic"])) 
                 { 
                  $moproduit->modifiericonproduit();    
                 }

                 if(isset($_POST["modifierprix"])) 
                 {
                  $moproduit->modifierprixproduit();    
                 }

                  if(isset($_POST["modifiercateg"])) 
                 {  
                  $moproduit->modifiercatproduit();     
                 }
               
                 if(isset($_POST['formdel']))
                 {
                ?>
            <section class="formulaire">
              <article id="cadreform">
                  <h1>Effacer un produit</h1>

                  <form class="form" method="post">
                      <label>Produit à Effacer</label></br>
                      <input class="inputa" type="text" name="titre4" required></br>
                      <input type="submit" value="Effacer" name="effacer"></br>
                  </form>
                </article>
            </section>
               <?php
        }

        if(isset($_POST["effacer"])) 
        {

         $offproduit = new article();
         $offproduit->deleteproduit();    
        }
        ?>
      </aside>
  </main>
    <?php

    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
            $reponse2 = $connexion->query( "SELECT *FROM produits ORDER BY produits.id DESC LIMIT 4");
                
                foreach ($reponse2 as $p) 
                {
                  ?>
              <div class="globprod">
                <div class="espaceprod">
                  <div id="iconprod">
                    <a href="produit.php?id=<?=$p[0]?>"><img height='160' src="<?=$p[7]?>"></a>
                  </div>
                  <div id="infoprod">
                    <a href="produit.php?id=<?=$p[0]?>"><h3><b><?=$p[1]?></b></h3></a>
                    <p><?=$p[2]?></p>
                    <p>Prix : <?=$p[3]?>€</p>
                    <p>Quantité en stock : <?=$p[6]?></p>   
                  </div>
                </div>
              </div>
                 
                  <?php
                }
    
  }
  else
  {
    echo"Vous n'avez pas le droit d'accés";
  }

  ?>
  </body>
</html>