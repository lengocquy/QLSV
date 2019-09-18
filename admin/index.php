
 <?php
	$title = "Quản Trị - ";
	include_once('../Header.php');
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-VN" lang="vi-VN">
<head>
<link rel="stylesheet" href="../Css/reset.css">
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
  <link rel="stylesheet" href="../Css/bootstrap-theme.min.css">
  <script src="../js/jquery-3.1.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/style.js"></script>

    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="../Css/ui-lightness/jquery-ui-1.10.2.custom.css" />
    <title> Tra cứu điểm </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../Css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/Menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/head.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/Footer.css" rel="stylesheet" type="text/css" media="all" />
   <link href="../Css/Table.css" rel="stylesheet" type="text/css" media="all" />
   
</head>	
<div class="container-fluid">
	<?php
		if($_SESSION["User"] == NULL){ ?>
			<script>
				window.location.href="../Login.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
			<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="../index.php";}, 3000);
	    	</script>
		    </div>
		<?php }else {
			include_once('quantri.php');
		}
	 ?>
</div>
