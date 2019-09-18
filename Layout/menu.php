<?php session_start();?>
<?php
   /* if (isset($_REQUEST['frame'])){?>
    	<li id="noselect"><a href="http://www.ou.edu.vn/"><span>Trang chủ OU</span></a></li>
        <li <?php if($_REQUEST['frame'] == 'search') echo 'id="select"'; else echo 'id="noselect"' ?>><a href="./?frame=search"><span>Tra cứu điểm</span></a></li>
        <li <?php if($_REQUEST['frame'] == 'information') echo 'id="select"'; else echo 'id="noselect"' ?>><a href="./?frame=information"><span>Thông tin sinh viên</span></a></li>
    <?php }else { ?>
        <li id="noselect"><a href="http://www.ou.edu.vn/"><span>Trang chủ OU</span></a></li>
        <li id="select"><a href="./?frame=search"><span>Tra cứu điểm</span></a></li>
        <li id="noselect"><a href="./?frame=information"><span>Thông tin sinh viên</span></a></li><?php
    }*/
?>
<div id="nav"> 
		<div  id="menu" > 
			<a href="index.php">Trang chủ</a> |  
			<a href="./?frame=search">Tìm kiếm</a>	|
			<a href="./?frame=information">Giới thiệu</a>		 
		</div>		 
		<div  id="login" > 
			<?php 
				// lấy cookie đăng nhập tự động
				 
				if (isset($_SESSION["loggedin"])){
					if($_SESSION["Type"]=="sv"){
					echo "Xin chào <a href='sinhvien.php' id='sinhvien'>". $_SESSION["HoTen"]."</a>";
					}else{
						echo "Xin chào <a href='http://localhost/ql_sinhvien/admin.php' id='sinhvien'>". $_SESSION["HoTen"]."</a>";
						}
				}else {
					
					echo "<a href='login.php'>Đăng nhập</a>";
				}
			?>
		</div>
		</div> <!-- End of Navigation menu --> 
