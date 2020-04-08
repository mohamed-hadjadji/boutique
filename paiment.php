<?php
session_start();
include('fonction.php');
var_dump($_POST);
if(1==0)
{
	echo"commande validé";
}
else
{
	if(isset($_POST)&&isset($_SESSION['id']))
{
	if(isset($_POST['type_de_carte'])&&isset($_POST['numero_de_carte'])&&isset($_POST['securite'])&&isset($_POST['nom_porteur']))
	 {
	 	echo "validation en cours";
	 	$pan=sql("SELECT * FROM pannier WHERE id_user=".$_SESSION['id']." && valider=0");
	 	var_dump($pan);
	 	if(!empty($pan))
	 	{
	 		echo "plein";
	 	}
	 	
	 }
	 else
	 {
	 	echo "nop,nop,nop";
	 }
}
else
{
	echo "nop,nop,nop";
}
}

?>