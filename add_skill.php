<?php
require_once("config.php");

/*$sector_name = $_POST['sector_name'];
$new_skill = $_POST['new_skill'];*/

$sector_name = 'abc';
$new_skill = 'pqr';

$query = "select sector_id from sectors where sector_name= '$sector_name'";
$result = mysqli_query($conn, $query) or die($query);

$row = mysqli_fetch_array($result);

$query2 = "insert into skills values(0, '$new_skill', 0, $row[sector_id])";
$result2 = mysqli_query($conn, $query2) or die ($query2);




?>