<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đặt sân nhanh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/ico" href="/datsannhanh/icon/favicon.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
 
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="/datsannhanh/css/style2.css">
  <link rel="stylesheet" href="/datsannhanh/css/datepicker.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="/datsannhanh/css/mdtimepicker.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
   <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">
    <!-- Page Content -->
    <div class="header-web">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                
            </div>
        </nav> -->
        <img src="/datsannhanh/image/logo-school.png" style="margin-left:20px;height: 50px;float: left;vertical-align: middle;">
        <img src="/datsannhanh/image/logo-pitch.png" style="margin-left:10px;height: 50px;float: left;vertical-align: middle;">
          <div class="form-inline">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <a href="<?php echo base_url();?>" style="text-decoration: none;float: left;color: white;font-size: 20px;">Trang chủ</a>
            <?php if($this->session->userdata('username') == ''){ ?>
                  <input type="button" name="register" class="btn btn-warning btn-register" value="Đăng ký">
                  <input type="button" name="login" class="btn btn-success btn-login" style="margin-right: 10px;" data-toggle="modal" data-target="#loginModal" value="Đăng nhập">
             <?php }else{ ?>
                    <div class="form-inline" style="float: right;color: white;display: flex; letter-spacing: 2px;margin-right: 200px;padding-top: 15px;"> 
                    <div class="dropdown d-inline" style="margin: 0 5px;">
                    <a href="#" style="text-decoration: none;color: white;" id="dropdownMenuButton"><?php echo $this->session->userdata('tenkhachhang');?></a>
                      <div class="dropdown-content" style="background-color: #3c763d;color: cornsilk;" aria-labelledby="dropdownMenuButton">
                      <?php if($this->session->userdata('idrole') != 3){?>
                      <p class="dropdown-item-menu" ><a class="dropdown-item" href="<?php echo base_url();?>admin">Trang quản trị</a></p>
                      <?php }?>
                      <p class="dropdown-item-menu" ><a class="dropdown-item" href="#">Quản lý tài khoản</a></p>
                      <p class="dropdown-item-menu" ><a class="dropdown-item" href="#">Thay đổi mật khẩu</a></p>
                      <p class="dropdown-item-menu" ><a class="dropdown-item" href="#">Điểm thưởng<span style="color: red;"><?php echo $this->session->userdata('diemthuong');?></span></a></p>
                      <p class="dropdown-item-menu" ><a class="dropdown-item" href="<?php echo base_url();?>logout">Đăng xuất</a></p>
                    </div>
                    </div>
                    <a class="d-inline" href="<?php echo base_url();?>logout" style="text-decoration: none;color: green;"><img alt="Logout" src="/datsannhanh/image/transparent-logout-icon.png" style="width:20px;"></a>
                  </div>
            <?php };?>
          </div>
      </div>

    <div id="content col-lg-13" style="margin: auto;width: 30%;margin-top: 100px;background-image:none;">
      
      <h1>Quản lý tài khoản</h1>
      <form id="formUpdateInfo" action="<?php echo base_url();?>accountmanager/updateinfo" method="POST">
        <div class="form-group">
          <label>Họ và tên</label>
          <input type="text" class="form-control input-sm" name="tenkhachhang" value="<?php echo $data->tenkhachhang;?>">
          <input type="hidden" name="idkhachhang" value="<?php echo $this->session->userdata('id');?>">
        </div>
        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control input-sm" name="sodt" value="<?php echo $this->session->userdata('sodt');?>">
        </div>
        <!-- <div class="form-group">
          <label>Địa chỉ</label>
          <input type="text" class="form-control input-sm" name="diachi" value="<?php echo $this->session->userdata('diachi');?>">
        </div> -->
        <!-- <div class="form-group">
          <label>Giới tính</label>
          <input type="text" class="form-control input-sm" name="gioitinh" value="<?php echo $this->session->userdata('gioitinh');?>">
        </div>
        <div class="form-group">
          <label>Ngày tháng năm sinh</label>
          <input type="text" class="form-control input-sm" name="ngaysinh" value="<?php echo $this->session->userdata('ngaysinh');?>">
        </div> -->
        <div class="form-group">
          <label>Email</label>
          <input type="Email" class="form-control input-sm" name="email" value="<?php echo $this->session->userdata('email');?>">
        </div>
        <div class="form-group">
          <label>Diểm thưởng</label>
          <input type="number" class="form-control input-sm" value="<?php echo $this->session->userdata('diemthuong');?>" disabled ="true">
        </div>
        <p style="text-align:center;">
          <input type="button" value="Cập nhật thông tin" class="btn btn-warning" data-toggle="modal" data-target="#confirm" id="btnUpdateInfo">
        </p>
      </form>
    </div>
</div>
<!-- Modal dat san -->

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #f7f7f7;">
      <div class="modal-header" style="text-align: center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Xác nhận</h3>
      </div>
      <form action="<?php echo base_url();?>login_controller/index" method="POST">
      <div class="modal-body" style="text-align: center;">
        <p>Bạn có muốn cập nhật thông tin tài khoản không?</p>
      </div>
      <div class="modal-footer" style="text-align: center;"">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="btnExcuteUpdate">Cập nhật</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#btnExcuteUpdate').on('click',function(){
      $('#formUpdateInfo').submit();
    });
  });
</script>

</body>
</html>
