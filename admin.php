<?php
   session_start();
  include("class.php");
  include("fonction.php");
   ?>

   <!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function stat(t) 
    {
      par = t.parentElement;
      bout = par.getElementsByTagName('button');
      bout[0].hidden = false;
    }
    function fact(t) 
    {
      par = t.parentElement;
      tab = par.getElementsByTagName('table');
      console.log(tab[0].hidden);
      if (tab[0].hidden==true) 
      {
          tab[0].hidden = false;
      }
      else
      {
          tab[0].hidden = true;
      }
      
    }
        function prof(t) 
    {
      par = t.parentElement;
      ul = par.getElementsByTagName('ul');
      if (ul[0].hidden==true) 
      {
          ul[0].hidden = false;
      }
      else
      {
          ul[0].hidden = true;
      }
      
    }
         function cache(t) 
    {      
       t.hidden = true; 
    }

    function cherche(str) 
    {
      console.log(str);
      xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() 
      {
        if (this.readyState==4 && this.status==200) 
        {
          document.getElementById("rech-admin").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","info.php?q="+str,true);
      xmlhttp.send();
    }
    </script>
</head>

<body  class="bodia">
    <header>
    <?php 
      include ('bar-nav.php');
      if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
    {
     ?>
      <nav id="commande">
        <form  class= 'button' method='POST'>
           <input type="submit" value="Créer un article" name="formcr">
           <input type="submit" value="Modifier un article" name="formmo">
           <input type="submit" value="Effacer un article" name="formdel">
           <input type="submit" value="Commandes en cours" name="formcom">
        </form>
      </nav>
    </header>
    <main id="espace">

        <aside id="espaceform">
          <p id="welco"><b>Bienvenue à l'éspace admin</b></p>
        <?php
         
         if(isset($_POST['formcom'])||isset($_POST['changstat']))
         {
          if(isset($_POST['changstat'])) 
          {
            sql("UPDATE `livraison` SET `status` = '".$_POST['modif-stat']."' WHERE `id` =".$_POST['changstat']." ;");
          }
          $livraison=sql("SELECT livraison.id,date,status,cmd,total,adresse,email,login,prenom,nom,telephone FROM `livraison` INNER JOIN `utilisateurs` ON id_user = utilisateurs.id LIMIT 10 ");
          ?>
          <table id="tab-com">
          <tr>
            <td class="td-comm th-comm">Id</td>
            <td class="td-comm th-comm">Date</td>
            <td class="td-comm th-comm">Total</td>
            <td class="td-comm th-comm">Status</td>
            <td class="td-comm th-comm">Commande</td>
            <td class="td-comm th-comm">Adresse de livraison</td>
            <td class="td-comm th-comm">Client</td>
          </tr>
          <?php
          foreach ($livraison as $l) 
          {
            ?>
            <tr>
              <td class="td-comm"><?=$l[0]?></td>
              <td class="td-comm"><?=$l[1]?></td>
              <td class="td-comm"><?=$l[4]?>€</td>
              <td class="td-comm">
              <form method="post" action="admin.php">
                <select name="modif-stat" onclick="stat(this)">
                  <option value="p" <?php if($l[2]=="p"){echo "selected";}  ?> >En preparation</option>
                  <option value="e" <?php if($l[2]=="e"){echo "selected";}  ?> >Expédié</option>
                  <option value="r" <?php if($l[2]=="r"){echo "selected";}  ?> >reçus</option>    
                </select>
                <button type="submit" class="buttype" hidden name="changstat" value="<?=$l[0]?>">modifier</button> 
              </form>
              </td>
              <td class="td-comm">
              <?php 
                $com=json_decode($l[3]);
                ?>
                <button class="buttype" onclick="fact(this)" >voir la facture</button>
                <table class="facture hd-cont" hidden onclick="cache(this)">
                  <tr>
                    <td class="">Article</td>
                    <td class="">Prix</td>
                    <td class="">Quantitées</td>
                    <td class="">Total</td>
                  </tr>
                <?php
                foreach ($com as $art) 
                {
                  $titre=sql("SELECT titre FROM produits WHERE id =".$art->id."");
                  ?>
                  <tr>
                    <td class="td-comm"><?=$titre[0][0] ?></td>
                    <td class="td-comm"><?=$art->prix ?></td>
                    <td class="td-comm"><?=$art->quantite ?></td>
                    <td class="td-comm"><?=$art->total ?>€</td>
                  </tr>
                  <?php
                }  
              ?> 
               </table>               
              </td>
              <td class="td-comm"><?=$l[5]?></td>
              <td class="td-comm">
                <p class="buttype" onclick="prof(this)"><?=$l[7]?></p>
                <ul  class="hd-cont linone"hidden onclick="cache(this)">
                  <li>Login : <?=$l[7]?></li>
                  <li>Nom : <?=$l[9]?></li>
                  <li>Prenom : <?=$l[8]?></li>
                  <li>Email : <?=$l[6]?></li>
                  <li>Telephone : <?=$l[10]?></li>                 
                </ul>  
                </td>
            </tr>
            <?php
          }
          ?>
          </table>
          <?php
         }  

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
                        <input class="inputa" type="text" list="rech-admin" onkeyup="cherche(this.value)" name='titre3'>
                        <datalist id="rech-admin">
                        </datalist>

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
                        <input class="inputa" type="text" list="rech-admin" onkeyup="cherche(this.value)" name='titre3'>
                        <datalist id="rech-admin">
                        </datalist>             
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
                        <input class="inputa" type="text" list="rech-admin" onkeyup="cherche(this.value)" name='titre3'>
                        <datalist id="rech-admin">
                        </datalist>
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
                        <input class="inputa" type="text" list="rech-admin" onkeyup="cherche(this.value)" name='titre3'>
                        <datalist id="rech-admin">
                        </datalist>        
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

                  <form class="form centre" method="post">
                      <label>Produit à Effacer</label></br>
                      <input class="inputa" type="text" list="rech-admin" onkeyup="cherche(this.value)" name='titre4' required></br>
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
  }
  else
  {
    echo"Vous n'avez pas le droit d'accés";
  }

  ?>
  </body>
</html>