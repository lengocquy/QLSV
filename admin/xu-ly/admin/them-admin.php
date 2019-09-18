<?php 
	include_once('../../../config/config.php');
	$tenadmin = htmlspecialchars($_POST["tenadmin"]);
	$matkhau = sha1(md5($tenadmin));
	$hoadminht= htmlspecialchars($_POST["hoadminht"]);
	$tenadminht= htmlspecialchars($_POST["tenadminht"]);
	$quantrikhoa = htmlspecialchars($_POST["quantrikhoa"]);
	$sdt = htmlspecialchars($_POST["sdt"]);
	$ngaysinh = htmlspecialchars($_POST["ngaysinh"]);

	$kiemtra = "SELECT `MaGV` FROM `giangvien` WHERE `MaGV` = '$tenadmin'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	if($tenadmin == NULL || $tenadminht == NULL || $quantrikhoa == NULL || $sdt == NULL || $ngaysinh == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên tài khoản Admin <span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $tenadmin;?>
      	</span> Đã tồn tại, Vui lòng chọn tên khác.
    	</div>
	<?php } else{
		$themsv = "INSERT INTO `giangvien` (`MaGV`, `HoLot`,`Ten` ,`MatKhau`, `NhomTK`,`QueQuan`, `Email`, `NgaySinh`, `avatarGv` ) VALUES ('$tenadmin', '$hoadminht', '$tenadminht', '$tenadmin', 1, '$quantrikhoa', '$sdt', '$ngaysinh', 'avatardf.png')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
	    	</div>
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>