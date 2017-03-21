<?php 
/*$rand=$_GET['rand'];*/
require_once("config.php");


$rand=$_GET['rand'];
echo $rand;

$query="select id from validity where random='$rand'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$id=$row['id'];

$sql="update users set valid=1 where id=$id";
mysqli_query($conn,$sql) or die("i died");

$del="delete from validity where id=$id";
mysqli_query($conn,$del) or die("we died");



?>