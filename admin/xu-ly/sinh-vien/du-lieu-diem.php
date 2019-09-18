<?php 
    include_once('../../../config/config.php');
    $idhk = $_POST["idhk"];
    $masv = $_POST["masv"];
    $lop = $_POST["lop"];  
    $sql = "SELECT * FROM `diem`,`monhoc` WHERE diem.MaMH = monhoc.MaMH and `MSSV` = '$masv' and `IdHocKy` = '$idhk'";
    $qr = mysqli_query($conn, $sql);

    $sqlten = "SELECT `TenSV` FROM `sinhvien` WHERE `MSSV` = '$masv'";
    $qrten = mysqli_query($conn, $sqlten);
    $rowten = mysqli_fetch_assoc($qrten);
    $tensv = $rowten["TenSV"];
   ?>
<a class="btn btn-default" id="taixuongxls" href="xls.php?masv=<?php echo $masv;?>&lop=<?php echo $lop;?>&hk=<?php echo $idhk;?>" role="button" style="margin-top: -50px;float: right;">Tải xuống (XLS)</a>
<?php if(mysqli_num_rows($qr) > 0) {?>
<table class="table table-bordered table-responsive">
                 <tr class="chimuc">
                     <th>Tên Môn Học</th>
                     <th>Điểm Giữa Kỳ</th>
                     <th>Điểm Cuối Kỳ</th>
                     <th>Điểm tổng kết MH theo thang điểm 10 </th>
                     <th>Điểm tổng kết MH theo thang điểm 4</th>
                     <th>Quản Lý</th>
                 </tr>
                 <?php while($row = mysqli_fetch_assoc($qr)){?>
                 <tr>
                  <td><?php echo $row["TenMH"]?></td>
                  <td><?php echo $row["DiemGK"]?></td>
                  <td><?php echo $row["DiemCK"]?></td>
                  <td><?php echo $row["ThangDiem10"]?></td>
                  <td><?php echo $row["ThangDiem4"]?></td>
                  <td align="center">
                    <button idmh="<?php echo $row["Id"]?>" class="btn btn-warning btn-xs" id="sua" title="Sửa" ten="<?php echo $row["TenMH"]?>" dqt="<?php echo $row["DiemGK"]?>" dt="<?php echo $row["DiemCK"]?>"><span class="glyphicon glyphicon-edit"></span>
                </button>
                  <button xoa="<?php echo $row["Id"]?>" class="btn btn-danger btn-xs" id="xoa" title="Xóa" ten="<?php echo $row["TenMH"]?>"><span class="glyphicon glyphicon-trash"></span>
                  </button>
                  </td>
                 </tr>
                 <?php } ?>
            </table>
            <br>
            <center>
              <input type="submit" id="themdiemmon" class="btn btn-success" name="themdiemmon" value="THÊM ĐIỂM" data-toggle="modal" data-target="#themdiem">
            </center>

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
        <center>
              <input type="submit" id="themdiemmon" class="btn btn-success" name="themdiemmon" value="THÊM ĐIỂM" data-toggle="modal" data-target="#themdiem">
            </center>
<?php 
  } ?>


<!-- Modal Thêm điểm -->
<div class="modal fade" id="themdiem">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM ĐIỂM</h4>
        </div><div class="container"></div>
        <div class="modal-body">
        <!-- Thêm điểm -->

        <table class="table table-bordered">
            <tr class="chimuc">
              <th>Tên Môn Học</th>
              <th>Điểm Giữa Kỳ</th>
              <th>Điểm Cuối Kỳ</th>
            </tr>
            <tr>
              <td>
                 <?php
                 $sqlmh = "SELECT `MaMH`,`TenMH` FROM `monhoc` WHERE `hocky` = '$idhk' AND `MaMH` NOT IN(SELECT `MaMH` FROM `diem` WHERE `IdHocKy` = '$idhk' AND `MSSV` = '$masv')";
                  $qrmh = mysqli_query($conn, $sqlmh); ?>
                  <select id="monhocdiemsv" class="form-control">
                    <option value="">Chọn Môn Học</option>
                  <?php while($rowmh = mysqli_fetch_assoc($qrmh)){ ?>
                      <option value="<?php echo $rowmh["MaMH"];?>">
                      <?php echo $rowmh["TenMH"];?>
                      </option>
                    <?php } ?>
                    </select>
              </td>
              <td width="150px">
              <input type="text" name="" id="tensv" value="<?php echo $tensv?>" class="hidden">
              <input type="text" name="" id="masinhvien" value="<?php echo $masv?>" class="hidden">
              <input type="text" name="" id="hockydiem" value="<?php echo $idhk?>" class="hidden">
              <input class="form-control" id="diemquatrinh" type="number" placeholder="Điểm giữa kỳ..." autofocus="autofocus">
                </td>
              
              <td width="150px">
              <input class="form-control" id="diemthi" type="number" placeholder="Điểm cuối kỳ...">
                </td>
            </tr>
          </table>
          <br>
          <div id="thongbaothemdiem"></div>
          <center>
          <input type="text" id="idmonhhoc" class="hidden">
          <button type="button" id="themdiemsv" class="btn btn-success">CẬP NHẬT</button>
        </center>
        <!-- End Thêm điểm -->
       </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa Điểm-->
<div class="modal fade" id="ModalSuaDiem">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA ĐIỂM</h4>
        </div><div class="container"></div>
        <div class="modal-body">
            
        <table class="table table-bordered">
            <tr class="chimuc">
              <th>Tên Môn Học</th>
              <th>Điểm Giữa Kỳ</th>
              <th>Điểm Cuối Kỳ</th>
            </tr>
            <tr>
              <td id="hienthiten" style="font-weight: bold; color:#f8f8f8;">
              <input class="form-control hidden" id="tenmonhoc" type="text">
              </td>
              <td width="150px">
              <input class="form-control" id="diemquatrinhsua" type="number" placeholder="Điểm giữa kỳ..." autofocus="autofocus">
                </td>
              
              <td width="150px">
              <input class="form-control" id="diemthisua" type="number" placeholder="Điểm cuối kỳ...">
                </td>
            </tr>
          </table>
          <br>
          <div id="thongbaosuadiem"></div>
          <center>
          <input type="text" id="idmonhhocsua" class="hidden">
          <button type="button" id="suadiem" class="btn btn-success">CẬP NHẬT</button>
        </center>
       </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit lop -->

<script>
$(document).ready(function() {
  $('button#xoa').click(function(event) {
      var id = $(this).attr('xoa');
      var ten = $(this).attr('ten');
      var xoa = confirm("Bạn có thực sự muốn điểm môn: "+ten+" ?");
      if (xoa == true) {
          $.ajax({
            url: 'xu-ly/sinh-vien/xoa-diem.php',
            type: 'POST',
            dataType: 'HTML',
            data: {id: id},
          });
          alert("Xóa Thành Công!");
          location.reload();
      }
    });

  $('button#sua').click(function(event) {
      var ten = $(this).attr('ten');
      var dqt = $(this).attr('dqt');
      var dt = $(this).attr('dt');
      var idmh = $(this).attr('idmh');
      $('#ModalSuaDiem').modal();
      $('#hienthiten').text(ten);
      $('#idmonhhocsua').val(idmh);
      $('#tenmonhoc').val(ten);
      $('#diemquatrinhsua').val(dqt);
      $('#diemthisua').val(dt);
    });


  $('#suadiem').click(function(event) {
    $.ajax({
      url: 'xu-ly/sinh-vien/sua-diem.php',
      type: 'POST',
      dataType: 'HTML',
      data: {
        dqt: $('#diemquatrinhsua').val(),
        dt: $('#diemthisua').val(),
        idmh: $('#idmonhhocsua').val()
      },
    success: function(data){
      $('#thongbaosuadiem').html(data);
    }
    });
  });


  $('#themdiemsv').click(function(event) {
    $.ajax({
      url: 'xu-ly/sinh-vien/them-diem.php',
      type: 'POST',
      dataType: 'HTML',
      data: {
        tensv: $('#tensv').val(),
        masv: $('#masinhvien').val(),
        idhk: $('#hockydiem').val(),
        tenmh: $('#monhocdiemsv').val(),
        dqt: $('#diemquatrinh').val(),
        dt: $('#diemthi').val()
      },
    success: function(data){
      $('#thongbaothemdiem').html(data);
    }
    });
  });

});
  
</script>