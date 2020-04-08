<?php
session_start();
include('fonction.php');
if(isset($_GET['msg'])&&$_GET['msg']=="yes")
{
	
}
else
{
	if(isset($_POST)&&isset($_SESSION['id']))
{
	if(isset($_POST['type_de_carte'])&&isset($_POST['numero_de_carte'])&&isset($_POST['securite'])&&isset($_POST['nom_porteur']))
	 {
	 	$pan=sql("SELECT id_prod,pannier.quantite,prix,prix*pannier.quantite as total ,produits.quantite FROM `pannier` INNER JOIN produits ON pannier.id_prod=produits.id  WHERE id_user=".$_SESSION['id']." && valider=0");
	 	if(!empty($pan))
	 	{
	 		$pantotal=0;
	 		$json="[";
	 		$i=0;
	 		$tailpan=count($pan);
         	foreach ($pan as $p) 
           {
            $pantotal+=$p[3];
            $json.="{\"id\": $p[0],\"quantite\":  $p[1],\"prix\":$p[2],\"total\": $p[3]}";
            //requette pour les stock
            sql("UPDATE `produits` SET `quantite` = '".($p[4]-$p[1])."' WHERE `produits`.`id` = ".$p[0].";");
            if($i!=$tailpan-1)
            {
            	$json.=",";
            }
            $i++;
           }
           $json.="]";
	 	   sql("INSERT INTO livraison (id_user,cmd,total )VALUES (".$_SESSION['id'].", '".$json."',$pantotal)");
	 	   sql("UPDATE `pannier` SET `valider` = '1' WHERE id_user=".$_SESSION['id']." && valider=0");
	 	   $msg="yes";

	 	}
	 	else
	 	{
	 		$msg="pannier introuvable ou vide";
	 	}
	 	
	 }
	 else
	 {
	 	$msg="hakerman";
	 }
}
else
{
	$msg="hakerman";
}
}

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="camping.css">
    <?php
    	if(isset($_GET['msg']))
    	{

    	}
    	else
    	{
    		?>
    		<meta http-equiv="refresh" content="10;URL=paiment.php?msg=<?=$msg?>">
    		<?php
    	}
    ?>
    <title>Interface de paiment</title>
</head>
	<body class="">
		<?php
    	if(isset($_GET['msg']))
    	{
    		if($_GET['msg']=="yes")
    		{
    		?>
    		validé
    		<?php
    		}
    		else
    		{
    			echo $_GET['msg'];
    		}
    	}
    	else
    	{
    		?>
    		validation en cours
    		<?php
    	}
    ?>
	</body>
</html>