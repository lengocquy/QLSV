<?php
  include_once('../config/config.php');
  $title = "Sinh Viên - ";
  include_once('../header.php');
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-VN" lang="vi-VN">
<head>
<link rel="stylesheet" href="../Css/reset.css">
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
  <link rel="stylesheet" href="../Css/bootstrap-theme.min.css">
  <script src="../js/jquery-3.1.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/style.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="../Css/ui-lightness/jquery-ui-1.10.2.custom.css" />
    <title> Tra cứu điểm </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../Css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/Menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/head.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/Footer.css" rel="stylesheet" type="text/css" media="all" />
   <link href="../Css/Table.css" rel="stylesheet" type="text/css" media="all" />
   
</head>	
<?php
    if($_SESSION["User"] == NULL){ ?>
      <script>
        window.location.href="../Login.php";
      </script>
    <?php } elseif($_SESSION["nhomtk"] != 1){ ?>
      <div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
          <script>
        window.setTimeout(function(){window.location.href="../index.php";}, 3000);
        </script>
        </div>
    <?php }else {?>
  <!-- Navbar -->
  <div class="hidden-lg hidden-md hidden-md hidden-sm navbar navbar-default navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">
           ADMIN
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../admin/?menu=bangdk" id="bangdk">
            <span class="glyphicon glyphicon-dashboard"></span>
            Bảng Điều Khiển
            </a></li>
            <li><a href="../admin/?menu=them" id="themsv">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm Sinh Viên
            </a></li>
            <li><a href="../admin/?menu=quanlykhoa" id="quanlykhoa">
            <span class="glyphicon glyphicon-cog"></span>
            Quản Lý Khoa
            </a></li>
            <li><a href="../admin/?menu=quanlysv" id="quanlysv">
            <span class="glyphicon glyphicon-wrench"></span>
            Quản Lý Sinh viên
            </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/<?php echo $_SESSION["avatar"]; ?>" alt="Ảnh đại diện" style="width:40px; height:40px; border-radius:3px; padding:3px; border: 1px solid #CCC">
              <?php echo $_SESSION["tensv"]; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="../">
                <span class="glyphicon glyphicon-user"></span>
                Trang Cá Nhân</a></li>
                <li><a href="../Logout.php">
                <span class="glyphicon glyphicon-log-out"></span>
                Đăng Xuất</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- End Navbar -->

    <div class="row" id="thongtinad" style="margin:0">
    <div class="hidden-xs col-sm-3 col-md-3 col-lg-3">
      <div class="thongtinad">
        <img src="../images/banner.jpg" alt="Ảnh bìa">
        <img src="../images/<?php echo $_SESSION["avatar"]; ?>" class="avatar" alt="Ảnh đại diện">
        <a href="../index.php"><p><?php echo $_SESSION["HoTen"]; ?></p></a>
      </div>

      <div class="menu">
        <div class="list-group">
        <a href="../admin/?menu=bangdk" id="bangdk" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-dashboard"></span> <br>
        Bảng Điều Khiển
        </a>
        <a href="../admin/?menu=them" id="themsv" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-plus"></span> <br>
        Thêm Sinh Viên
        </a>
        <a href="../admin/?menu=quanlykhoa" id="quanlykhoa" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-cog"></span> <br>
        Quản Lý Khoa
        </a>
        <a href="../admin/?menu=quanlysv" id="quanlysv" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-wrench"></span> <br>
        Quản Lý Sinh Viên
        <a href="../Logout.php" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-log-out"></span> <br>
        Đăng Xuất
        </a>
      </div>
      </div>
    </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-9 col-md-9 col-lg-9 adminhihi">
      
           <?php 
            $sqlhk = "SELECT *,concat(ten_hoc_ky,' năm học ',NamHoc)as hk FROM `hocky`";
            $qrhk = mysqli_query($conn, $sqlhk);
           ?>

          <div class="list-group-item">
          <div class="caption" style="color:#f8220c">
            Mã Sinh Viên <u><?php echo $_GET["masv"]; ?></u>
          </div>
          <div style="color:#f8220c; font-size: 20px;" >
            BẢNG ĐIỂM SINH VIÊN
          </div>
          <hr><br>
            <div class="form-group hocky">
              <div class="input-group">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </div>
                    <select id="hockydiem" class="form-control">
                    <option value="">Chọn Học Kỳ</option>
                    <?php while($rowhk = mysqli_fetch_assoc($qrhk)){ ?>
                      <option value="<?php echo $rowhk["id_hoc_ky"];?>">
                      <?php echo $rowhk["hk"];?>
                      </option>
                    <?php } ?>
                    </select>
            </div>
          </div>
          <!-- Bảng Điềm -->
          <input type="text" id="masv" value="<?php echo $_GET["masv"]?>" style="display: none">
          <input type="text" id="lop" value="<?php echo $_GET["lop"]?>" style="display: none">
          <div class="alert alert-info fade in" role="alert" id="note">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>NOTE!</strong> Vui lòng chọn Học kỳ để xem bảng điểm.
        </div>
            <div id="dulieudiem"></div>
          <!-- End Bảng điểm -->
    </div>
    <!-- Thông tin Admin -->
    <?php } ?>

</div>
 <?php 
 ?>

 <script>
   $(document).ready(function() {
     $('#hockydiem').change(function(event) {
      $('#note').hide();
      var idhk = $(this).val();
       $.ajax({
         url: 'xu-ly/sinh-vien/du-lieu-diem.php',
         type: 'POST',
         dataType: 'HTML',
         data: {
          idhk: idhk,
          masv: $('#masv').val(),
          lop: $('#lop').val()

        },
       success: function(data){
        $('#dulieudiem').html(data);
       }
       });
       
     });
   });
 </script>

