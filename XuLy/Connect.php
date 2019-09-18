<?php
    $sever = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'qlsv';
	$link = mysql_connect($sever, $user, $pass);
	if(!$link){
		die("Faile connect to php");
	}else{
		$db = mysql_select_db($database, $link);
		if(!$db){
		    echo 'error: ' . mysql_error();
		}
		else{
		    mysql_query("SET NAMES utf8");
		}
	}
	
?>