<?php
 
 require_once('config.php');

/* $skill_id = (string)$_POST['skill_id'];
 $skill_name = $_POST['skill_name'];
 $user_id = $_POST['user_id'];
 $question_id = $_POST['question_id'];
 $response = $_POST['response'];
*/

$skill_id = '1' ;
 $skill_name = 'java' ;
 $user_id = 2;
 $question_id = 1;
 $response = '1';

$table_name = $skill_name.$skill_id.'_response';

$query = "delete from $table_name where question_id = $question_id and user_id = $user_id";
mysqli_query($conn, $query) or die($query); 


?>