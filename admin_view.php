<?php

require_once("config.php");

$query = "select sectors.sector_name, skills.skill_name, skills.no_of_levels from skills JOIN sectors on sectors.sector_id = skills.sector_id";
$result = mysqli_query($conn, $query) or die($query);
$result_array=array();

while($row=mysqli_fetch_array($result))
{
	$row_array['sector_name']=$row['sector_name'];
	$row_array['skill_name']=$row['skill_name'];
	$row_array['levels']=$row['no_of_levels'];

	array_push($result_array,$row_array);
}

echo json_encode($result_array);


?>
