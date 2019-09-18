
<?php 
include_once('config/config.php');
 $idhk = $_POST["idhk"];
 $masv = $_POST["masv"];
    $sql = "SELECT * FROM `diem`,`monhoc` WHERE diem.MaMH = monhoc.MaMH and `MSSV` = '$masv' and `IdHocKy` = '$idhk'";
    $qr = mysqli_query($conn,$sql);
	
    $sqlten = "SELECT `TenSV` FROM `sinhvien` WHERE `MSSV` = '$masv'";
    $qrten = mysqli_query($conn,$sqlten);
    $rowten = mysqli_fetch_assoc($qrten);
    $tensv = $rowten["TenSV"];
   ?>
<?php if(mysqli_num_rows($qr) > 0) {?>
<table class="table table-bordered table-responsive">
                 <tr class="chimuc">
                     <th>Mã Môn Học</th>
                     <th>Tên Môn Học</th>
                     <th>Điểm Giữa Kỳ</th>
                     <th>Điểm Cuối Kỳ</th>
                     <th>Thang Điểm 10</th>
                     <th>Thang Điểm 4</th>
                 </tr>
                 <?php while($row = mysqli_fetch_assoc($qr)){?>
                 <tr>
                  <td><?php echo $row["MaMH"]?></td>
                  <td><?php echo $row["TenMH"]?></td>
                  <td><?php echo $row["DiemGK"]?></td>
                  <td><?php echo $row["DiemCK"]?></td>
                  <td><?php echo $row["ThangDiem10"]?></td>
                  <td><?php echo $row["ThangDiem4"]?></td>
                 </tr>
                 <?php } ?>
            </table>

          </div>
<?php } elseif($idhk == NULL){ ?>
      <div class="alert alert-warning fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>ERROR!</strong> Vui lòng chọn Học Kỳ.
        </div>
<?php }
else { ?>
  <div class="alert alert-warning fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>ERROR!</strong> Chưa có bảng điểm của kỳ này.
        </div>
<?php 
  } ?>
