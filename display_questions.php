<?php 

require_once('config.php');

/*
$skill_id=(string)$_POST['skill_id'];
$skill_name=$_POST['skill_name'];
$level=$_POST['level'];

*/
$skill_id=(string)1;

$skill_name='java';
$level=1;

$tablename=$skill_name.$skill_id;

$query="select question_id,question_no,question,optionA,optionB,optionC,optionD,count from $tablename where level=$level";
$result=mysqli_query($conn,$query) or die($query);

$result_array=array();

while($row=mysqli_fetch_array($result))
{
	$row_array['question_id']=$row['question_id'];
	$row_array['question_no']=$row['question_no'];
	$row_array['question']=$row['question'];
	$row_array['optionA']=$row['optionA'];
	$row_array['optionB']=$row['optionB'];
	$row_array['optionC']=$row['optionC'];
	$row_array['optionD']=$row['optionD'];
	$row_array['count']=$row['count'];

	array_push($result_array,$row_array);
}

echo json_encode($result_array);


?>