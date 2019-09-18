<?php 
	include_once('../../../config/config.php');

	$idmh = $_POST["idmh"];
	$tenmhsua = $_POST["tenmhsua"];
	$sotinchisua = $_POST["sotinchisua"];
	$thuoclopsua = $_POST["thuoclopsua"];
	$thuochksua = $_POST["thuochksua"];

	if($tenmhsua == NULL || $sotinchisua == NULL || $thuochksua == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `monhoc` SET `TenMH` = '$tenmhsua', `SoTinChi` = '$sotinchisua', `hocky` = '$thuochksua' WHERE
		 `monhoc`.`MaMH` = '$idmh'";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Môn học thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<?php }
?>

<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>