<?php

require_once('config.php');


/*  taking user id from cookie
$user_id=$_COOKIE['user_id'];
*/
$user_id=9;


$query="select * from exam_registration where user_id=$user_id";
$result=mysqli_query($conn,$query) or die($query);

$result_array=array();

/*  checking if user has registered first or not*/
if(mysqli_num_rows($result)>0)
{

	/*  getting user info*/
     $row_array['isReg']=1;
     $sql="select * from users where id=$user_id";
     $res=mysqli_query($conn,$sql) or die($sql);

     $row=mysqli_fetch_array($res);

     $row_array['aadhar_no']=$row['aadhar_no'];
     $row_array['address']=$row['address'];
     $row_array['mobile']=$row['mobile'];
     $row_array['photo']=$row['photo'];
     $row_array['signature']=$row['signature'];

$aadhar_no = $row['aadhar_no'];


     $sql1 = "select * from aadhar where aadhar_no = $aadhar_no";
     $result2=mysqli_query($conn,$sql1) or die($sql1);

     $row=mysqli_fetch_array($result2);

     $row_array['firstname']=$row['firstname'];
     $row_array['middlename']=$row['middlename'];
     $row_array['lastname']=$row['lastname'];
     $row_array['dob']=$row['dob'];
     $row_array['gender']=$row['gender'];
     


}
else
{
    $row_array['isReg']=0;
}
array_push($result_array,$row_array);
 echo json_encode($result_array);

?>