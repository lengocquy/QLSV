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
include_once('../Header.php');
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
	$sql = "SELECT * FROM `khoa`";
	$qr = mysqli_query($conn, $sql);
		 ?>

			<div class="caption">
			Quản Lý Khoa
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Khoa</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["MaKhoa"]?></td>
							<td><?php echo $row["TenKhoa"]?></td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa" khoa="<?php echo $row["TenKhoa"]?>" idkhoa="<?php echo $row["MaKhoa"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["MaKhoa"]?>" class="btn btn-danger btn-xs" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


<?php } ?><br>
<center>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#themkhoa">THÊM KHOA</button>
</center>


<!-- Modal -->
<div class="modal fade" id="themkhoa">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM KHOA MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaotkhoa"></div>
				Tên Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    <input class="form-control" id="khoamoi" type="text" autofocus="autofocus" placeholder="Tên khoa...">
			    </div></div>
			    <center>
					<button type="button" id="themkhoamoi" class="btn btn-success">THÊM KHOA</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="ModalSuaKhoa">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA KHOA</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosuakhoa"></div>
				Tên Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    <input type="text" id="idkhoa" style="display: none">
			    <input class="form-control" id="suakhoa" type="text" placeholder="Tên khoa...">
			    </div></div>
			    <center>
					<button type="button" id="suakhoamoi" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit Khoa -->

<script>
	$(document).ready(function() {
		$('#themkhoamoi').click(function(){
			$.ajax({
			url: 'xu-ly/them-khoa.php',
			type: 'POST',
			dataType: 'html',
			data: {
				khoamoi: $('#khoamoi').val()
				},
			success: function(data){
				$('#thongbaotkhoa').html(data);
			}
			});
		});

		$('button#xoa').click(function(event) {
 			var id = $(this).attr('xoa');
 			var xoa = confirm("Bạn có thực sự muốn xóa khoa có id: "+id+" ?");
			if (xoa == true) {
			    $.ajax({
			    	url: 'xu-ly/xoa-khoa.php',
			    	type: 'POST',
			    	dataType: 'HTML',
			    	data: {id: id},
			    });
			    alert("Xóa Thành Công!");
			    location.reload();
			}
 		});

		$('button#sua').click(function(event) {
			var khoa = $(this).attr('khoa');
			var idkhoa = $(this).attr('idkhoa');
			$('#ModalSuaKhoa').modal();
			$('#suakhoa').val(khoa);
			$('#idkhoa').val(idkhoa);
		});

		$('#suakhoamoi').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-khoa.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idkhoa: $('#idkhoa').val(),
					suakhoa: $('#suakhoa').val()
				},
			success: function(data){
				$('#thongbaosuakhoa').html(data);
			}
			});
			
		});

	});
</script>
