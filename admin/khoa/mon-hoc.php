<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-VN" lang="vi-VN">
<head>
<link rel="stylesheet" href="../../Css/reset.css">
  <link rel="stylesheet" href="../../Css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Css/bootstrap-theme.min.css">
  <script src="../../js/jquery-3.1.0.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/style.js"></script>
 
    <script type="text/javascript" src="../../js/script.js"></script>
    <script type="text/javascript" src="../../js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="../../Css/ui-lightness/jquery-ui-1.10.2.custom.css" />
    <title> Tra cứu điểm </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../../Css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../Css/Menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../Css/head.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../Css/Footer.css" rel="stylesheet" type="text/css" media="all" />
   <link href="../../Css/Table.css" rel="stylesheet" type="text/css" media="all" />
   
<?php include_once('../../config/config.php');
 session_start();
		if($_SESSION["User"] == NULL){ ?>
			<script>
				window.location.href="../../Login.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../../index.php";
	    	</script>
		    </div>
		<?php }else {
	$sql = "SELECT * FROM `monhoc`";
	$qr = mysqli_query($conn, $sql);
		 ?>

			<div class="caption">
			Quản Lý Môn Học
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Môn Học</th>
						<th>Số Tín Chỉ</th>
						<th>Thuộc Học Kỳ</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["MaMH"]?></td>
							<td><?php echo $row["TenMH"]?></td>
							<td>
							<?php echo $row["SoTinChi"]?>
							</td>
							<td>
								<?php 
								$idhk = $row["hocky"];
								$sqlhk = "SELECT ten_hoc_ky FROM hocky WHERE id_hoc_ky = '$idhk'";
								$qrhk = mysqli_query($conn, $sqlhk);
								$rowhk = mysqli_fetch_assoc($qrhk);
								echo $rowhk["ten_hoc_ky"]?>
							</td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa" mh="<?php echo $row["TenMH"]?>" idmh="<?php echo $row["MaMH"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" class="btn btn-danger btn-xs" title="Xóa" id="xoa" xoa="<?php echo $row["MaMH"]?>"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


<?php } ?><br>
<center>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#themmonhoc">THÊM MÔN HỌC</button>
</center>

<!-- Modal Thêm môn học -->
<div class="modal fade" id="themmonhoc">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM MÔN HỌC MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaotmh"></div>
          		Mã Môn Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-list-alt"></span>
			    </div>
			    <input class="form-control" id="mamonhoc" type="text" autofocus="autofocus" placeholder="Tên môn học...">
			    </div>
			    </div>

				Tên Môn Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-list-alt"></span>
			    </div>
			    <input class="form-control" id="tenmhmoi" type="text" autofocus="autofocus" placeholder="Tên môn học...">
			    </div>
			    </div>

			    Số Tín Chỉ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-stats"></span>
			    </div>
			    <select id="sotinchi" class="form-control">
			    	<option value="1">1</option>
			    	<option value="2">2</option>
			    	<option value="3">3</option>
                    <option value="4">4</option>
			    </select>
			    </div>
			    </div>


			    Thuộc Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuochk" class="form-control">
		    		<option value="">Chọn Học Kỳ</option>
		    		<?php
		    		$sqlhk = "SELECT * FROM `hocky`";
		    		$chayhk = mysqli_query($conn,$sqlhk);
		    		while($xemhk = mysqli_fetch_assoc($chayhk)){
		    		 ?>
		    		<option value="<?php echo $xemhk["id_hoc_ky"];?>">
		    			<?php echo $xemhk["ten_hoc_ky"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <br>
			    <center>
					<button type="button" id="themmhmoi" class="btn btn-success">THÊM MÔN HỌC</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa Môn học-->
<div class="modal fade" id="ModalSuaMH">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA MÔN HỌC</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosmh"></div>
            
				Tên Môn Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-list-alt"></span>
			    </div>
			    <input type="text" id="idmh" style="display: none;">
			    <input class="form-control" id="tenmhsua" type="text" autofocus="autofocus" placeholder="Tên môn học...">
			    </div>
			    </div>

			    Số Tín Chỉ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-stats"></span>
			    </div>
			    <select id="sotinchisua" class="form-control">
			    	<option value="1">1</option>
			    	<option value="2">2</option>
			    	<option value="3">3</option>
                    <option value="4">4</option>
			    </select>
			    </div>
			    </div>

			    Thuộc Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuochksua" class="form-control">
		    		<option value="">Chọn Học Kỳ</option>
		    		<?php
		    		$sqlhk = "SELECT * FROM `hocky`";
		    		$chayhk = mysqli_query($conn,$sqlhk);
		    		while($xemhk = mysqli_fetch_assoc($chayhk)){
		    		 ?>
		    		<option value="<?php echo $xemhk["id_hoc_ky"];?>">
		    			<?php echo $xemhk["ten_hoc_ky"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <center>
					<button type="button" id="suamonhoc" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit lop -->

<script>
	$(document).ready(function() {
		$('#themmhmoi').click(function(){
			$.ajax({
			url: 'xu-ly/them-mon-hoc.php',
			type: 'POST',
			dataType: 'html',
			data: {
				tenmonhoc: $('#tenmhmoi').val(),
				sotinchi: $('#sotinchi').val(),
				mamonhoc: $('#mamonhoc').val(),
				thuochocky: $('#thuochk').val()
				},
			success: function(data){
				$('#thongbaotmh').html(data);
			}
			});
		});

		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Môn Học có id: "+id+" ?");
			if (xoa == true) {
		    $.ajax({
		    	url: 'xu-ly/xoa-mon-hoc.php',
		    	type: 'POST',
		    	dataType: 'HTML',
		    	data: {id: id},
		    });
		    alert("Xóa Thành Công!");
		    location.reload();
			}
		});

		$('button#sua').click(function(event) {
			var mh = $(this).attr('mh');
			var idmh = $(this).attr('idmh');
			$('#ModalSuaMH').modal();
			$('#tenmhsua').val(mh);
			$('#idmh').val(idmh);
		});

		$('#suamonhoc').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-mon-hoc.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idmh: $('#idmh').val(),
					tenmhsua: $('#tenmhsua').val(),
					sotinchisua: $('#sotinchisua').val(),
					thuoclopsua: $('#thuoclopsua').val(),
					thuochksua: $('#thuochksua').val()
				},
			success: function(data){
				$('#thongbaosmh').html(data);
			}
			});
			
		});

	});
</script>