<?php

class user

{
  private $id = '';
  public $login = '';
  public $prenom = '';
  public $nom = '';
  public $mdp= '';
  public $adresse='';
  public $email ='';
  public $tele ='';

  public function register($login,$prenom,$nom,$mdp,$adresse,$email,$tele) 
    {
        $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $login = $_POST['login'];
        $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
        $prenom = $_POST['prenom'];
        $nom =$_POST['nom'];
        $adresse=$_POST['adresse'];
        $email=$_POST['mail'];
        $tele=$_POST['tele'];
         if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $reponse = $connexion->query("SELECT* FROM utilisateurs WHERE login='".$login."'");
            $resultat=$reponse->fetchAll();
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = $connexion->query( "INSERT INTO utilisateurs (login,prenom,nom,password,adresse,email,telephone)
                VALUES ('$login','$prenom','$nom','$mdp','$adresse','$email','$tele')");      
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }

    }
   public function connect()
   {
   	 $connexion =  mysqli_connect("localhost","root","","boutique");

   	 if(isset($_POST['login']) && isset($_POST['password']))
        {
             
            $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login']));
            $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));

            if($login !== "" && $password !== "")
            {
                $requete = "SELECT count(*) FROM utilisateurs where
                login = '".$login."' ";
                $exec_requete = mysqli_query($connexion,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                $requete4 = "SELECT * FROM utilisateurs WHERE login='".$login."'";
                $exec_requete4 = mysqli_query($connexion,$requete4);
                $reponse4 = mysqli_fetch_array($exec_requete4);

                if( $count!=0 && $_SESSION['login'] !== "" && password_verify($password, $reponse4[4]) )
                {
            
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] = $reponse4[0];
               
                header('Location: index.php');
                }
                else
                {
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
        }
            
    }
    public function update()
    {

            $login = $_POST['login'];
            $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));
            $adresse = $_POST['adresse'];
            $email = $_POST['mail'];
            $tele = $_POST['tele'];

            $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe', adresse = '$adresse', email = '$email', telephone = '$tele' WHERE login = '".$_SESSION['login']."'";
            $query2=mysqli_query($connexion,$requete2);
            session_unset();
            header("location:connexion.php?reconnect=1");
          
    }
}

class article
{

  private $id = '';
  public $nomart = '';
  public $infoart = '';
  public $prixart = '';
  public $catart= '';
  public $soucatart='';
  public $target_file='';
  public $iduser='';

  public function produit()
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $nomart = $_POST['titre'];
    $infoart=$_POST['info'];
    $prixart = $_POST['prix'];
    $catart = $_POST['catego'];
    $soucatart = $_POST['sous'];
    $qtt = $_POST['qtt'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    $reponse = $connexion->query("SELECT* FROM produits WHERE titre='".$nomart."'");
            $resultat2=$reponse->fetchAll();
            $trouve=false;
            foreach ($resultat2 as $key => $value) 
            {
            if ($resultat2[$key][1]==$_POST['titre'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Produit existe déja!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            
            $requete = $connexion->query("INSERT INTO produits (titre,info,prix,categorie,souscategorie,quantite,icon,date) VALUES ('$nomart','$infoart','$prixart','$catart','$soucatart','$qtt','$target_file', NOW())");
            
            header("location:admin.php");
           
            echo "<p><b>Produit Créer</b></p>";

              }
  }

   public function modifiernomproduit()
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

    $titre3 = $_POST['titre3'];
    $titre2 = $_POST['titre2'];
    $info = $_POST['info'];
    
    $requetemod = $connexion->query("UPDATE produits SET titre= '$titre2',info= '$info' WHERE titre = '$titre3'");
    echo "<p><b>Produit Modifier</b></p>";
  }
   public function modifiericonproduit()
   {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    
    $titre3 = $_POST['titre3'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    $requetemod = $connexion->query("UPDATE produits SET icon= '$target_file' WHERE titre = '$titre3'");
    echo "<p><b>Produit Modifier</b></p>";
   }

   public function modifierprixproduit()
   {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    
    $titre3 = $_POST['titre3'];
    $prix2 = $_POST['prix2'];
    $qtt2 = $_POST['qtt2'];

    $requetemod = $connexion->query("UPDATE produits SET prix= '$prix2',quantite='$qtt2' WHERE titre = '$titre3'");
    echo "<p><b>Produit Modifier</b></p>";
   }

   public function modifiercatproduit()
   {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    
    $titre3 = $_POST['titre3'];
    $categorie = $_POST['catego'];
    $souscategorie = $_POST['sous'];

    $requetemod = $connexion->query("UPDATE produits SET categorie='$categorie',souscategorie='$souscategorie' WHERE titre = '$titre3'");
    echo "<p><b>Produit Modifier</b></p>";
   }


  public function deleteproduit()
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

    $titre4 = $_POST['titre4']; 
                                    
    $requetedel = $connexion->query("DELETE FROM produits WHERE titre = '$titre4'");
    echo "<p><b>Produit Effacer</b></p>";
  }
}
?>