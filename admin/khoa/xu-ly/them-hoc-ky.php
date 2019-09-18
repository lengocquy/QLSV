<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$hockymoi = $_POST["hockymoi"];
	$namhocmoi = $_POST["namhocmoi"];
	$cualop = $_POST["cualop"];
	
	$kiemtra = "SELECT * FROM `hocky` WHERE `ten_hoc_ky` = '$hockymoi' and `NamHoc` = '$namhocmoi' and `malop` = '$cualop' ";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);
	
	if($hockymoi == NULL || $cualop == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
        <?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Học kỳ <span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $xem["ten_hoc_ky"];?>
      	</span> Đã tồn tại lớp học <?php echo $xem["malop"];?>
    	</div>
	<?php } else{
		 mysqli_query($conn,"INSERT INTO `hocky` (`ten_hoc_ky`,`NamHoc`, `malop`) VALUES ('$hockymoi','$namhocmoi', '$cualop')"); ?>
		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm học kỳ mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
    	<script>
    		$('#rfpage').click(function(event) {
    			   location.reload();
    		});
    		
    		$('#themhockymoi').hide();
    	</script>

	<?php }
 ?>

