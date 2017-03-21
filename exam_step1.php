<!-- 
$aadhar_no=$_POST['aadhar_no'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$user_id=$_COOKIE['user'];
$level=$_POST['level'];
$skill_id=$_POST['skill_id'];
 -->

<?php 
require_once('config.php');

$aadhar_no='987654321234';
$firstname='peeyusha';
$middlename='pawan';
$lastname='rathi';
$dob='07/11/1996';
$gender='f';
$user_id=2;

$level=2;
$skill_id=3;

if($level>1)
{
	$prev_level=$level-1;
    $str="select * from completed_level where user_id=$user_id and level=$prev_level";
    $r=mysqli_query($conn,$str);

    if(mysqli_num_rows($r)==0)
    {
         echo 0;
         return ;
    }
    
}

$sql="select * from aadhar where aadhar_no='$aadhar_no' and firstname='$firstname' and lastname='$lastname' and middlename='$middlename' and dob='$dob' and gender='$gender'";

$result=mysqli_query($conn,$sql) or die($sql);

if(mysqli_num_rows($result)==1)
{
   $query="insert into exam_registration values($user_id,$skill_id,$level,0)";
   $res=mysqli_query($conn,$query) or die($query);
   $query1="update users set aadhar_no='$aadhar_no' where id=$user_id";
   $res1=mysqli_query($conn,$query1) or die($query1);
   echo 1;

}
else echo 0;

?>