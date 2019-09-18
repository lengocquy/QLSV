<?php 
	include_once('../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `sinhvien` WHERE `sinhvien`.`MSSV` = '$id'";
	mysqli_query($conn, $sql);
?>