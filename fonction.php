<?php function sql($sql)
	{
		$bd=mysqli_connect("localhost","root","","boutique");

		$envoit=mysqli_query($bd,$sql);
		if($sql[0]=="S"||$sql[0]=="s")
		{	
			$reception = mysqli_fetch_all($envoit);
			mysqli_close($bd);
			return $reception;
		}
		mysqli_close($bd);	
	}

	function recherche($rech)
	{	$tabrech=explode(" ", $rech);
		$ql="SELECT * FROM `produits` WHERE ";
		$der=array_keys($tabrech);
		$der=end($der);
		$i=0;
		foreach ($tabrech as $t) 
		{

			if(empty($t)||$t=="/"||$t=="$"||$t=="+"||$t=="-"||$t=="*"||$t==";"||$t=="%"||$t=="!"||$t=="_")
			{
				echo "nop";
			}
			else
			{
				var_dump($t);
				$ql.="titre LIKE '%".$t."%' OR info LIKE '%".$t."%' OR categorie LIKE '%".$t."%' OR souscategorie LIKE '%".$t."%'";
			}
			if ($i==$der) 
			{
				$ql.=" ;";
			}
			else
			{
				$ql.=" OR ";
			}
			$i++;
		}
		return sql($ql);
		//echo "SELECT * FROM `produits` WHERE titre LIKE '%x%' OR info LIKE '%x%' OR categorie LIKE '%x%' OR souscategorie LIKE '%x%'";
	}
?>