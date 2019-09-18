<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `hocky` WHERE `hocky`.`id_hoc_ky` = '$id'";
	mysqli_query($conn, $sql);
?>