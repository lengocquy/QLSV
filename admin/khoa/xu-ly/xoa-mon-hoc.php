<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `monhoc` WHERE `monhoc`.`MaMH` = '$id'";
	mysqli_query($conn, $sql);
?>