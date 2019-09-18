<?php 
include_once('config/config.php');
require "Header.php";

 ?>
 <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="Css/ui-lightness/jquery-ui-1.10.2.custom.css" />


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-VN" lang="vi-VN">
<head>
    <title> Tra cứu điểm </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="Css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/Menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/head.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/Footer.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/Table.css" rel="stylesheet" type="text/css" media="all" />
</head>	
<body>
<div id="wrapper_body" class="clr">
	<div class="main-wrapper_body">
 		<div class="container">
<div class="group-box" style="padding:0px">
	
	<div class="title">Đăng nhập</div> 
	<div align="center">
	<?php 
	// nếu nút Logout được nhấn
	if (isset($_GET["logut"])){
		// hủy bỏ session
		unset($_SESSION["loggedin"]);
		unset($_SESSION["User"]);
		unset($_SESSION["HoTen"]);
		unset($_SESSION["Type"]);
		// xóa cookies
		setcookie("User","",time()-3600);
		setcookie("Password","",time()-3600);
		setcookie("Type","",time()-3600);
		// chuyển đến trang login 
		header("location: login.php");
		exit();
	}
	
	// trong trường hợp đã đăng nhập, chuyển đến trang index
	if(isset($_SESSION["loggedin"])){
		header("location: index.php");
		exit();
	} 
		// trường hợp đã nhớ mật khẩu trước đó
		// gọi hàm auto_login() trong thư viện libs/common.php
		// hàm này được gọi trong file header.php để đảm bảo khi truy cập vào
		// trang nào cũng tự đăng nhập, không nhất thiết là vào login.php mới tự đăng nhập
		
		//auto_login();
		 
	 
	
	
	
	
	// trường hợp chưa đăng nhập, không lưu cookie trước đó
	// nếu người dùng nhấn nút "Đăng nhập"
	if (isset($_POST["btnDangNhap"])){
		$user = $_POST["txtTenDangNhap"];
		$pass = $_POST["txtMatKhau"];
		$type = $_POST["rdodn"];
		
		if ($type == "sv"){
			$sql = "SELECT * ".
				" FROM sinhvien WHERE MSSV='".$user."' ".
					" AND MatKhau ='".$pass."'";
			$retval = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($retval);
			if(mysqli_num_rows($retval) > 0 ){	
			// tạo session		 
			$_SESSION["loggedin"]= true;
			$_SESSION["User"] = $row["MSSV"];
			$_SESSION["HoTen"] = $row["TenSV"];
			$_SESSION["Type"] = $type;
			$_SESSION["khoasv"]=$row["MaKhoa"];
			$_SESSION["lopsv"]=$row["MaLop"];
			$_SESSION["ns"]=$row["NgaySinh"];
			$_SESSION["qq"]=$row["QueQuan"];
			$_SESSION["nhomtk"]=$row["NhomTK"];
			$_SESSION["avatar"]=$row["avatar"];
			// nếu người dùng chọn "Nhớ mật khẩu"
			if (isset($_POST["chkNhoMK"])){
				setcookie("User",$row["User"],time()+3600*24 );
				setcookie("Password",$row["MatKhau"],time()+3600*24);
				setcookie("Type",$type,time()+3600*24);
				 
			}
			header("location: sinhvien.php");
			}
		}else{
			$sql = "SELECT MaGV as User, concat(Holot,' ', Ten) as HoTen,NgaySinh,QueQuan,MatKhau,NhomTK,avatarGV".
					" FROM giangvien WHERE MaGV='".$user."' ".
					" AND MatKhau ='".$pass."'";
			$retval = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($retval);
			if(mysqli_num_rows($retval) >0 ){	
			// tạo session		 
			$_SESSION["loggedin"]= true;
			$_SESSION["User"] = $row["User"];
			$_SESSION["HoTen"] = $row["HoTen"];
			$_SESSION["Type"] = $type;
			$_SESSION["ns"]=$row["NgaySinh"];
			$_SESSION["qq"]=$row["QueQuan"];
			$_SESSION["nhomtk"]=$row["NhomTK"];
			$_SESSION["avatar"]=$row["avatarGV"];
			// nếu người dùng chọn "Nhớ mật khẩu"
			if (isset($_POST["chkNhoMK"])){
				setcookie("User",$row["User"],time()+3600*24 );
				setcookie("Password",$row["MatKhau"],time()+3600*24);
				setcookie("Type",$type,time()+3600*24);
				 
			}
			header("location: admin.php");
			}
		}
		 
		
		// nếu xác thực thành công
		if(!$row = mysql_fetch_array($retval )){	
		 // trường hợp nhập username và password không đúng
			
			// hiển thị thông báo lỗi, link đến trang đăng nhập lại
			echo "<div class='error'><br><div align='center'>Tên đăng nhập và mật khẩu không hợp lệ. <br>";
			echo " <a href='".$_SERVER["PHP_SELF"]."'> Thử lại </a> </div> </div><br>";
		}
	}else { // trong trường hợp lần đầu tiên mở form hoặc đã nhấn logout thì hiển thị form đăng nhập	
	?>	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="frmLogin">
		<br>		 
		<table class=frm>
		<tr> 
			<td align="right"><label for="txtTenDangNhap"> Tên Đăng nhập: </label> </td>
			<td align="left"><input type="text" name="txtTenDangNhap" placeholder="tên đăng nhập"> </td>
		</tr>
		<tr>
			<td align="right"> <label for="txtMatKhau"> Mật khẩu: </label></td>
			 <td align="left"> <input type="password" name="txtMatKhau" placeholder="mật khẩu"> <br /> </td>
		</tr>		
		<tr>
			<td>&nbsp;   </td>				
			<td> <input type="radio" name="rdodn" value="sv" checked>Sinh Viên 
				 <input type="radio" name="rdodn" value="gv" >Giảng Viên 
			  </td>
		</tr>
		<tr>
			<td>&nbsp;  </td> 
			<td><input type="checkbox" name="chkNhoMK" value=1> Nhớ mật khẩu?  </td>
		</tr>
		<tr>
			<td>&nbsp;  </td> 
			<td> <button type="submit" name="btnDangNhap" class="btn" >Đăng nhập</button></td>
		</tr>
		</table>		 
		<br>
	</form>	
<?php 
	} // else 
	
?>
	</div>
</div>
</div>
</div>
</div>
</body>
   
<?php include 'Layout/Footer.php';?>