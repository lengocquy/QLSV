<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$tenmonhoc = $_POST["tenmonhoc"];
	$sotinchi = $_POST["sotinchi"];
 $mamonhoc = $_POST["mamonhoc"];
  $thuochocky = $_POST["thuochocky"];

	if($tenmonhoc == NULL || $thuochocky == NULL || $mamonhoc == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }
   else{
$sql = "INSERT INTO `monhoc`(`MaMH`, `TenMH`, `SoTinChi`, `hocky`) VALUES ('$mamonhoc','$tenmonhoc', '$sotinchi','$thuochocky')";
      mysqli_query($conn, $sql);

?>

		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm môn học mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<script>
        $('#rfpage').click(function(event) {
             location.reload();
        });
        
        $('#themmhmoi').hide();
      </script>
    	
	<?php }
 ?>


