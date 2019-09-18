<?php 
	include_once('../../config/config.php');
	$idhk = $_POST["idhk"];
	$lop = $_POST["lop"];
	$sql = "SELECT DISTINCT monhoc.MaMH,monhoc.TenMH FROM `monhoc`,`diem` WHERE monhoc.MaMH=diem.MaMH  AND `IdHocKy` = '$idhk'";
	$qr = mysqli_query($conn, $sql);
	if(mysqli_num_rows($qr) == 0){ ?>
		<option value="" disabled>Không Có Dữ Liệu Môn Học.</option>
	<?php } else {
	?>
		<option value="" disabled>Danh Sách Môn Học</option>
	<?php
	while($row = mysqli_fetch_assoc($qr)){ ?>
		<option value="<?php echo $row["MaMH"];?>">
			<?php echo $row["TenMH"];?>
		</option>
	<?php }}
 ?>