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

			if(empty($t)||$t=="/"||$t=="$"||$t=="+"||$t=="-"||$t=="*"||$t==";"||$t=="%"||$t=="!"||$t=="_"||$t==" ")
			{}
			else
			{
				$ql.="titre LIKE '%".$t."%' OR info LIKE '%".$t."%' OR categorie LIKE '%".$t."%' OR souscategorie LIKE '%".$t."%'";
				if ($i==$der) 
				{
					$ql.=";";
				}
				else
				{
					$ql.=" OR ";
				}
			}
			
			$i++;
		}
		$rest = substr($ql, -3);
		if($rest=="OR ")
		{
			$ql=substr($ql, 0, -3);
		}
		return sql($ql);
		//echo "SELECT * FROM `produits` WHERE titre LIKE '%x%' OR info LIKE '%x%' OR categorie LIKE '%x%' OR souscategorie LIKE '%x%'";
	}
	function option($tri)
	{	$ql="SELECT * FROM produits ";
		if ($tri['catego']=="Aucune"&&$tri['sous']=="AUCUN"&&empty($tri['pr-sup'])&&empty($tri['pr-inf'])) 
		{
			
		}
		else
		{
			$ql.="WHERE ";
			if($tri['catego']=="Aucune")
			{

			}
			else
			{
				$ql.=" categorie ='".$tri['catego']."'";
			}

			if($tri['sous']=="AUCUN")
			{

			}
			else
			{	
				echo "||".substr($ql, -6)."||";
				if(substr($ql, -6)=="WHERE ")
				{
					$ql.=" souscategorie ='".$tri['sous']."'";
				}
				else
				{
					$ql.=" && souscategorie ='".$tri['sous']."'";
				}	
				
			}


			if (empty($tri['pr-inf'])) 
			{

			}
			else
			{
				if(substr($ql, -6)=="WHERE ")
				{
					$ql.=" prix <= ".$tri['pr-inf'];
				}
				else
				{
					$ql.=" && prix <= ".$tri['pr-inf'];
				}
			}

			if (empty($tri['pr-sup'])) 
			{
				
			}
			else
			{
				if(substr($ql, -6)=="WHERE ")
				{
					$ql.=" prix >= ".$tri['pr-sup'];
				}
				else
				{
					$ql.=" && prix >= ".$tri['pr-sup'];
				}
			}

		}

		switch ($tri['trie']) 
		{
			case 'Aucun':
				$ql.=" ORDER BY RAND()";
				break;
			case 'Prix croissant':
				$ql.=" ORDER BY prix DESC";
				break;
			case 'Prix décroissant':
				$ql.=" ORDER BY prix ASC";
				break;
			case 'Plus récents':
				$ql.=" ORDER BY id DESC";
				break;
			
			default:
				
				break;
		}
		
		
		return sql($ql);
	}
?>