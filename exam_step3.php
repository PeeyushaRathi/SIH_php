<!-- 
$user_id=$_COOKIE['user'];

$photo=$_POST['photo'];
$sign=$_POST['sign'];

 -->
<?php 
require_once('config.php');

$user_id=1;

$photo='some link';
$sign='second link';


$sql="update users set photo='$photo',signature='$sign' where id=$user_id";
$result=mysqli_query($conn,$sql) or die($sql);


?>