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
    <!-- Sidebar -->
    <?php $this->load->view('/common/sidebar');?>
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
            <?php if($this->session->userdata('username') == ''){ ?>
                  <input type="button" name="register" class="btn btn-warning btn-register" value="Đăng ký">
                  <input type="button" name="login" class="btn btn-success btn-login" style="margin-right: 10px;" value="Đăng nhập">
             <?php }else{ ?>
                  <div class="form-inline" style="float: right;color: white;display: flex; letter-spacing: 2px;margin-right: 200px;padding-top: 15px;"> 
                    <div class="dropdown d-inline" style="margin: 0 5px;">
                    <a href="#" style="text-decoration: none;color: white;" id="dropdownMenuButton"><?php echo $this->session->userdata('tenkhachhang');?></a>
                      <div class="dropdown-content" style="background-color: #3c763d;color: cornsilk;" aria-labelledby="dropdownMenuButton">
                      <?php if($this->session->userdata('idrole') != 3){?>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Trang quản trị</a></p>
                      <?php }?>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Quản lý tài khoản</a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Thay đổi mật khẩu</a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Điểm thưởng<span style="color: red;"><?php echo $this->session->userdata('diemthuong');?></span></a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="<?php echo base_url();?>logout">Đăng xuất</a></p>
                    </div>
                    </div>
                    <a class="d-inline" href="<?php echo base_url();?>index.php/logout" style="text-decoration: none;color: green;"><img alt="Logout" src="/datsannhanh/image/transparent-logout-icon.png" style="width:20px;"></a>
                  </div>
            <?php };?>
          </div>
      </div>

    <div id="content" style="background-image:none;">
      
      <h1>Trang quản lý hóa đơn</h1>
      <div class="row">
      <p><?php echo $error;?></p>
      <table class="table">
        <thead>
          <tr>
            <th>Mã số hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Tên sân</th>
            <th>Ngày đặt sân</th>
            <th>Thời gian bắt đầu</th>
            <th>Thời gian kết thúc</th>
            <th>Tổng thanh toán</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody id="">
          <?php foreach ($data as $key => $value) {?>
          <tr>
            <td><?php echo $value->idhoadon;?></td>
            <td><?php echo  $value->tenkhachhang;?></td>
            <td><?php echo  $value->tensan;?></td>
            <td><?php echo  $value->ngaydat;?></td>
            <td><?php echo  $value->timeStart;?></td>
            <td><?php echo  $value->timeEnd;?></td>
            <td><?php echo  $value->tongthanhtoan;?></td>
            <td><?php if($value->status == 0){?>
                <input type="button" class="btn btn-danger" name="" id="btnXacNhan" onclick="duyetdon(<?php echo $value->idhoadon;?>,<?php echo $value->id;?>,<?php echo  $value->tongthanhtoan;?>,0);" value="Chờ xác nhận">
              <?php } if($value->status == 1){?>
                <input type="button" class="btn btn-warning" name="" id="btnConfirmThanhToan" onclick="duyetdon(<?php echo $value->idhoadon;?>,<?php echo $value->id;?>,<?php echo  $value->tongthanhtoan;?>,1);" value="Chờ thanh toán">
              <?php } if($value->status == 2){?>
                <input type="button" class="btn btn-success" name="" id="btnSuccess" value="Hoàn tất" disabled="true">
              <?php } ?>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
     
        
      </div>
    </div>
</div>
<!-- Modal dat san -->
<script src="/datsannhanh/js/mdtimepicker.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
function duyetdon(idhoadon,idkhachhang,tongthanhtoan,status){
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "admin/duyetdon",
    dataType: 'json',
    data: {idhoadon: idhoadon,
          idkhachhang: idkhachhang,
          status: status,
          tongthanhtoan : tongthanhtoan},
    success: function(res) {
    if (res.error =="")
    {
      toastr.success('Duyệt đơn thành công!');
      location.reload();
    }
    else{
      toastr.error(res.error);
    }
    },
    error: function(error){

    }
    });
}
</script>
</body>
</html>
