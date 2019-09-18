<?php 
	include_once('../../config/config.php');
	$idsv = (int)$_POST["idsv"];
	$masv = htmlspecialchars($_POST["masv"]);
	$matkhau = sha1(md5($masv));
	$tensv = htmlspecialchars($_POST["tensv"]);
	$svkhoa = htmlspecialchars($_POST["svkhoa"]);
	$svlop = htmlspecialchars($_POST["svlop"]);
	$sdt = htmlspecialchars($_POST["sdt"]);
	$ngaysinh = htmlspecialchars($_POST["ngaysinh"]);
	$nhanxet = htmlspecialchars($_POST["nhanxet"]);

	$sqlkhoa = "SELECT `TenKhoa` FROM `khoa` WHERE `MaKhoa` = '$svkhoa'";
	$qrkhoa = mysqli_query($conn, $sqlkhoa);
	$rowkhoa = mysqli_fetch_assoc($qrkhoa);
	$ten_khoa = $rowkhoa["TenKhoa"];

	$sqlmonhoc = "SELECT * FROM `monhoc` WHERE   AND `hocky` = '$hk'";
	$qrmonhoc = mysqli_query($conn, $sqlmonhoc);

	if($masv == NULL || $tensv == NULL || $svkhoa == NULL || $svlop == NULL || $sdt == NULL || $ngaysinh == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR! </strong> Các trường nhập không được để trống.
    	</div>
	<?php }
	else
	{
		$suasv = "UPDATE `sinhvien` SET `MatKhau` = '$matkhau', `TenSV` = '$tensv', `MaLop` = '$svlop', `MaKhoa` = '$svkhoa',  `NgaySinh` = '$ngaysinh' WHERE `sinhvien`.`MSSV` = '$masv'";
		mysqli_query($conn, $suasv); ?>

			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Sửa thành công cho Sinh viên <strong><?php echo $tensv;?></strong>,<br> Vui lòng <a href="#" id="rfpage" title="Tải Lại Trang" style="color: #FFF;font-weight: bold;">TẢI LẠI TRANG.</a>
	    	</div>

		<?php } ?>
<script>
	$(document).ready(function() {

		$('#rfpage').click(function(event) {
			location.reload();
		});
	});
</script>