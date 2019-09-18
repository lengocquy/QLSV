<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `giangvien` WHERE `giangvien`.`MaGV` = '$id'";
	mysqli_query($conn, $sql);
?>