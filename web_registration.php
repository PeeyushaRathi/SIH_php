<!-- Website registration 
$email=$_POST['email'];
$password=$_POST['password'];

-->


<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

require_once("config.php");
require './PHPMailer-master/PHPMailerAutoload.php';

$email="kenil.mehta@techva.org";
$password="001";

$str="SELECT email_id FROM `users` WHERE email_id = '$email'"; 

$result = mysqli_query($conn, $str) or die('die');

$result_array=array();

if(mysqli_num_rows($result)>0)
{ $row_array['exist']=0;}
 else 
 {
  $row_array['exist']=1;
  $query="insert into users values(0,'$email',sha('$password'),0,'','','','')";
  $result = mysqli_query($conn, $query) or die($query);

  $exists=false;

  while(!$exists)
  {
    $random=generateRandomString(10);
    $query="select random from validity where random='$random'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)==0)
    {
    	$exists=true;
    }  	
  } 

 $query2 = "select id from users where email_id = '$email'";
 $res2 = mysqli_query($conn, $query2) or die ($query2);
 $row = mysqli_fetch_array($res2);
 $id = $row['id'];
 echo $id;

 $query1 = "insert into validity(id, random) values ($id, '$random')";
 $res1 = mysqli_query($conn, $query1) or die($query1);


 
 $subject = "Test Mail";
 $bodytext = 'Please click here for confirmation <a href="confirm_registration.php?rand='.$random.'">Click here</a>';
 echo $bodytext;
    $mail = new PHPMailer();
    $mail->IsHTML(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
  
    $mail->Host = "sg2plcpnl0182.prod.sin2.secureserver.net"; 
    $mail->SMTPAuth = true;   
    $mail->Username = "techadmin@mithibaikshitij.com"; 
    $mail->Password = "dharin@123";
    $mail->port = 465;

    $mail->addReplyTo($email);
    $mail->setFrom('techadmin@mithibaikshitij.com');

    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $bodytext;

            /* if($mail->Send()) {
              echo ("You message was sent SUCCESSFULLY");
              
             } else {
              echo ("Technical Problems:Your message was not sent");
             }
/*
  $body='Please click here for confirmation<a href="confirm_registration.php?rand=$random">Click here</a>';
  $headers = 'From: CodeBusters' . "\r\n" ;
   		$headers .='Reply-To: '. $to . "\r\n" ;
   		$headers .='X-Mailer: PHP/' . phpversion();
   		$headers .= "MIME-Version: 1.0\r\n";
  		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

  mail($to,$subject,$body,$headers);
*/



 		}

 array_push($result_array,$row_array);

 echo json_encode($result_array);   

?>