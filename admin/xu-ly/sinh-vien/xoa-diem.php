<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `diem` WHERE `diem`.`Id` = '$id'";
	mysqli_query($conn, $sql);
?>