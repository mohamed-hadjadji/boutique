
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
//$q = intval($_GET['q']);//recuper val
$q=addslashes($q);
$con = mysqli_connect('localhost','root','','boutique');
$sql="SELECT titre FROM produits WHERE titre LIKE '%".$_GET['q']."%'";
$result = mysqli_query($con,$sql);
$result=mysqli_fetch_all($result);
foreach ($result as $r) 
{
    ?>
    <option value="<?=$r[0]?>">
    <?php
}
?>
</body>
</html> 

