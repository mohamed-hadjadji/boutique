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
           
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }

    }
   public function connect($login, $password)
   {
   	 $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

   	 
            
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
               echo "<p class='erreur'><b>Produit déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $requeteadmin = $connexion->query("SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'");
            $resultat=$requeteadmin->fetchAll();

            $iduser =$resultat[0][0];

            $requete = $connexion->query("INSERT INTO produits (titre,info,prix,categorie,souscategorie,icon,id_utilisateur) VALUES ('$nomart','$infoart','$prixart','$catart','$soucatart','$target_file','$iduser')");

            echo "<p><b>Produit Créer</b></p>";

            $reponse2 = $connexion->query( "SELECT *FROM produits ORDER BY produits.id DESC");
                $i=0;
                foreach ($reponse2 as list($id,$nompro,$infopro,$prixpro,$categopro,$souscategopro,$iconpro,$idadmin)) 
                {
                  echo $nompro;
                  echo "<img height=\"250\" src=\"$iconpro\">";
                  echo $infopro;
                  echo $prixpro."€";
                }
              }
  }

   public function modifierproduit()
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $titre3 = $_POST['titre3'];
    $titre2 = $_POST['titre2'];
    $prix2 = $_POST['prix2'];
    $info = $_POST['info'];
    $categorie = $_POST['catego'];
    $souscategorie = $_POST['sous'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    $requetemod = $connexion->query("UPDATE produits SET titre= '$titre2',info= '$info',prix= '$prix2',categorie='$categorie',souscategorie='$souscategorie',icon= '$target_file' WHERE titre = '$titre3'");
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