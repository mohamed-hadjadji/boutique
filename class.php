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

  public function produit($nomart,$infoart,$prixart,$catart,$soucatart,$target_file)
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    
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
           }
  }
}
?>