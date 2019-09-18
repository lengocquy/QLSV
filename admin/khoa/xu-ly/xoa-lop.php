<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `lop` WHERE `lop`.`MaLop` = '$id'";
	mysqli_query($conn, $sql);
?>