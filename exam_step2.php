<!-- 
$user_id=$_COOKIE['user'];

$address=$_POST['address'];
$mobile=$_POST['mobile'];

 -->
<?php 
require_once('config.php');

$user_id=1;

$address='pune';
$mobile='1234567891';

$sql="update users set address='$address',mobile='$mobile' where id=$user_id";
$result=mysqli_query($conn,$sql) or die($sql);


?>