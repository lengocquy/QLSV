<?php 
	include_once('../../../config/config.php');

	$idsua = $_POST["idsua"];
	$tenadmins = $_POST["tenadmins"];
	$tenadminhts = $_POST["tenadminhts"];
	$hoadminhts = $_POST["hoadminhts"];
	$quantrikhoas = $_POST["quantrikhoas"];
	$sdts = $_POST["sdts"];
	$ngaysinhs = $_POST["ngaysinhs"];

	if($tenadmins == NULL || $tenadminhts == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR! </strong> Tên Admin không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `giangvien` SET `HoLot` = '$hoadminhts', `Ten` = '$tenadminhts', `QueQuan` = '$quantrikhoas', `Email` = '$sdts', `NgaySinh` = '$ngaysinhs' WHERE `giangvien`.`MaGV` = '$idsua'";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Admin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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