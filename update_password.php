<?php

require_once("config.php");
/*$new_password = $_POST['password'];
$id = $_POST['id'];*/

$new_password = '123';
$id = 3;
$query = "update users set password = sha('$new_password') where id = $id";
mysqli_query($conn, $query) or die($query); 

?>
