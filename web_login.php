<?php
/*$email=$_POST['email'];
$password=$_POST['password'];
*/
require_once('config.php');

$email="ankitg444@gmail.com";
$password="123";
$sql="select id,email_id,password from users where email_id='$email' and password=sha('$password')";
$result = mysqli_query($conn, $sql) or die('die');


$result_array=array();

if(mysqli_num_rows($result)==1)
{
	$row=mysqli_fetch_array($result);
	$user_id=$row['id'];
    $row_array['valid']=1;
    setcookie('user',$user_id,time()+30*24*60*60*1000);
    
}
else
{
     $row_array['valid']=0;
}
     
     array_push($result_array,$row_array);

 echo json_encode($result_array);

?>