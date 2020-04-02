<?php
   session_start();
   include('fonction.php');

  include("class.php");

  if(isset($_POST['req']))
  {
    if(empty($_POST['req']))
    {
     // echo "vide";
    }
    else
    {
      //echo"plein";
      $res=recherche($_POST['req']);
      var_dump($res);
    }
  }  
   ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Notre Boutique</title>
        <link rel="stylesheet" href="">
    </head>
    <body class="">
        <header>
             
            <?php include ('bar-nav.php')?>

        </header>
        <main>
          <div id="optionboutique">
            <form method="post" action="boutique.php" id="f-recherche">
              <input type="text" name="req">
              <input type="submit" name="rech">
            </form>
            <form id="f-option">
              
            </form>
          </div>
          <section >
            
          </section>
        </main>
    </body>
</html>