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
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Đặt sân nhanh</h3>
        </div>

        <ul class="list-unstyled components">
            <?php if ($active == 'home'){?>
              <li class="active"/>
            <?php }else{?>
            <li>
            <?php }?>
                <a href="<?php echo base_url();?>">Trang chủ</a>
            </li>
            <?php if ($active == 'loaisan'){?>
              <li class="">
            <?php }else{?>
            <li>
            <?php }?>
            <?php foreach ($type as $key => $value) {?>
              <li ><a class="active" href="<?php echo base_url();?>loaisan/<?php echo $value->idloaisan;?>">Sân <?php echo $value->loaisan;?></a> </li> 
                                
            <?php }?>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Liên hệ</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Số điện thoại: 035.68.68.468</a>
                    </li>
                    <li>
                        <a href="#">Facebook</a>
                    </li>
                    <li>
                        <a href="#">Gmail</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
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
                  <input type="button" name="register" class="btn btn-warning btn-register" onclick="openModal(2)" value="Đăng ký" style="margin-top:5px">
                  <input type="button" name="login" class="btn btn-login" onclick="openModal(1)" style="margin-top:5px;margin-right: 10px;background-color: #FFEBCD;" data-toggle="modal" data-target="#loginModal" value="Đăng nhập">
             <?php }else{ ?>
                    <div class="form-inline" style="float: right;color: white;display: flex; letter-spacing: 2px;margin-right: 200px;padding-top: 15px;"> 
                    <div class="dropdown d-inline" style="margin: 0 5px;">
                    <a href="#" style="text-decoration: none;color: white;" id="dropdownMenuButton"><?php echo $this->session->userdata('tenkhachhang');?></a>
                      <div class="dropdown-content" style="background-color: #3c763d;color: cornsilk;" aria-labelledby="dropdownMenuButton">
                      <?php if($this->session->userdata('idrole') != 3){?>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="<?php echo base_url();?>admin">Trang quản trị</a></p>
                      <?php }?>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="<?php echo base_url();?>acountmanager">Quản lý tài khoản</a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Thay đổi mật khẩu</a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="#">Điểm thưởng<span style="color: red;"><?php echo $this->session->userdata('diemthuong');?></span></a></p>
                      <p class="dropdown-item-menu"><a class="dropdown-item" href="<?php echo base_url();?>logout">Đăng xuất</a></p>
                    </div>
                    </div>
                    <a class="d-inline" href="<?php echo base_url();?>logout" style="text-decoration: none;color: white;"><img alt="Logout" src="/datsannhanh/image/transparent-logout-icon.png" style="width:20px;"></a>
                  </div>
            <?php };?>
          </div>
      </div>

    <div id="content">
       <?php if ($active != 'home'){?>
      <h1>Trang đặt sân nhanh</h1>
      <div class="row">
      <?php foreach ($data as $key => $value) {
        # code...
      ?>
        <div class="col-sm-4 display-pitch text-center">
          <h3 class="text-center pitch-name"><?php echo  $value->tensan ;?></h3>
          <img src="/datsannhanh/image/img-san.png" style="width: 100%;">
          <p class="text-center price-pitch">Giá:<span style="padding-left: 20px;padding-right: 20px;"><?php echo  $value->dongia ;?></span>đ</p>
          <p class="text-center">
            <input type="button" name="datsan" id="btnDatSan" data-toggle="modal" data-target="#" onclick="choosesan(<?php echo  $value->idsan ;?>)" class="btn btn-primary" value="Đặt sân">
          </p>
        </div>
      <?php }?>
        
      </div>
      <?php }else{?>
      <p style="color:white;margin-top:5%;font-size:70px; text-align:center;">ĐẶT SÂN TRỰC TUYẾN</p>
      <p style="color:white;font-size:70px;text-align:center;">UY TÍN - CHẤT LƯỢNG CAO</p>
      <?php } ?>
    </div>
    <?php if ($active == 'home'){ $this->load->view('/common/footer'); }?>
</div>
<!-- Modal dat san -->

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: slategrey;">
      <div class="modal-header" style="text-align: center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="modal_cap" style="font-size: -webkit-xxx-large;font-family: -webkit-body;">Đăng nhập</h3>
      </div>
      <form id="form_Login" action="<?php echo base_url();?>index.php/login_controller/index" method="POST">
      <div class="modal-body" style="text-align: center;">
        <img src="/datsannhanh/image/ninja-simple-login.png" alt="login" style="width: 40%;margin-bottom: 20px;">
        <div class="form-inline">
          <label>Tài khoản:</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-inline" style="margin-top: 10px;">
          <label>Mật khẩu:</label>
          <input type="password" name="password" class="form-control" style="margin-left: 4px;">
        </div>
      
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
      </div>
      </form>
      <form id="form_register" action="<?php echo base_url();?>index.php/login_controller/register" method="POST">
      <div class="modal-body" style="text-align: center;">
        <div class="form-inline">
          <input type="text" name="reg_username" id="reg_username" placeholder="Username" class="form-control" style="margin-left: 2%;width:80%;"><span style="color:red;margin-left:10px">*</span>
        </div>
        <div class="form-inline" style="margin-top: 10px;">
          <input type="text" name="reg_phonenumber" id="reg_phonenumber" placeholder="Số điện thoại" class="form-control" style="margin-left: 2%;width:80%;"><span style="color:red;margin-left:10px">*</span>
        </div>
        <div class="form-inline" style="margin-top: 10px;">
          <input type="text" name="reg_username" id="reg_email" placeholder="Email" class="form-control" style="margin-left: 2%;width:80%;"><span style="color:red;margin-left:10px">*</span>
        </div>
        <div class="form-inline" style="margin-top: 10px;">
          <input type="password" name="reg_password" id="reg_password" placeholder="Password" class="form-control" style="margin-left: 2%;width:80%;"><span style="color:red;margin-left:10px">*</span>
        </div>
        <div class="form-inline" style="margin-top: 10px;">
          <input type="password" name="reg_repassword" id="reg_repassword" placeholder="Nhập lại password" class="form-control" style="margin-left: 2%;width:80%;"><span style="color:red;margin-left:10px">*</span>
        </div>
      
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-success" style="width:80%;margin-left:1%;" onClick="register()">Đăng ký</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="/datsannhanh/js/mdtimepicker.js"></script>

<div class="modal fade" id="bookPicthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Đặt sân</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="pitch-name" class="col-form-label">Tên sân:</label>
            <input type="text" class="form-control" id="pitch-name" disabled="true">
            <input type="hidden" name="pitchid" id="pitchid">
          </div>
          <div class="form-group">
            <label for="dp3" class="col-form-label">Ngày đặt sân:</label>
            <input type="text" class="form-control" id="dp3"/>
          </div>
          <div class="form-group">
            <div class="form-inline">
              <div class="form-group" style="width: 50%;float: left;">
                <label for="timestart" class="col-form-label">Thời gian bắt đầu:</label>
                <input type="text" class="form-control" id="timestart" />
              </div>
              <div class="form-group" style="width: 50%;float: left;">
                <label for="timeend" class="col-form-label">Thời gian kết thúc:</label>
                <input type="text" class="form-control" id="timeend" />
              </div>
            </div>
          </div>
           <div class="form-group">
            <label for="pitch-type" class="col-form-label">Loại sân:</label>
            <input type="text" class="form-control" id="pitch-type" disabled="true" />
          </div>
          <div class="form-group">
            
            <label for="pitch-price" class="col-form-label">Giá sân:</label>
            <input type="text" class="form-control" id="pitch-price" disabled="true" />
         
          </div>
         
          <div class="form-group">
            <label for="total-price" class="col-form-label">Tổng tiền cần thanh toán:</label>
            <input type="text" class="form-control" id="total-price" disabled="true" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btndatsan" class="btn btn-primary">Đặt sân</button>
      </div>
    </div>
  </div>
</div>
<!-- <script src="/datsannhanh/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
      //window.prettyPrint && prettyPrint();           
            
      $('#dp3').datepicker();
        
    });
  
</script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
  function openModal(i){
    if (i == 2){
      $('#loginModal').modal('show');
      $("#modal_cap").text("Đăng ký");
      $("#form_Login").hide();
      $("#form_register").show();
      $(".modal-content").css('background-color' , 'white');
    }else{
      $("#modal_cap").text("Đăng nhập");
      $("#form_Login").show();
      $("#form_register").hide();
      $(".modal-content").css('background-color' , 'slategrey');
    }
  }
  function register(){
    var username = $.trim($('#reg_username').val());
    var phonenumber = $.trim($('#reg_phonenumber').val());
    var email = $.trim($('#reg_email').val());
    var password = $.trim($('#reg_password').val());
    var repassword = $.trim($('#reg_repassword').val());
    if (username.length == 0 || email.length == 0 || password.length == 0 || repassword.length == 0 ) {
      toastr.error("Vui lòng nhập đây đủ thông tin bắt buộc!");
      return;
    }
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    if(phonenumber !==''){
        if (vnf_regex.test(phonenumber) == false) 
        {
            toastr.error('Số điện thoại của bạn không đúng định dạng!');
            return;
        }
    }else{
        toastr.error('Bạn chưa điền số điện thoại!');
        return;
    }
    if(ValidateEmail(email) == false){
      toastr.error('EMail không đúng định dạng!');
      return;
    }
    if (password != repassword) {
      toastr.error("Mật khẩu không khớp!");
      return;
    }
    var datainput = { 
                      'user':username,
                      'phonenumber':phonenumber,
                      'email':email,
                      'pssword':password
                    };
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/login_controller/register",
      dataType: 'json',
      data: datainput,
      success: function(res) {
        if (res.result > 0)
        {
          toastr.success('Đăng ký thành công!');
          $('#loginModal').modal('hide');
        }
        else
        {
          toastr.error(res.error);
        }
      },
      error:function(e){
        toastr.error('Đăng ký user thất bại!');
      }
    });
  }
  function ValidateEmail(mail) 
  {
   if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
    {
      return (true)
    }
      return (false)
  }
  $(document).ready(function () {
    var strUrl = window.location.href
    if(strUrl.includes("loaisan")) // This doesn't work, any suggestions?
    {
      $("#content").css('background-image' , 'none');
    }else{
      //$("#content").empty();
    }
    $("#dp3").datepicker();
    $("#dp3").datepicker("option", "dateFormat", "yy-mm-dd");
    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    // $(window).resize(function(){
    //   var width = $(window).width();
    //   //console.log(width);
    //   if (width > 768){
    //       $('#sidebar').toggleClass('active');
    //   }
    // });
    $('#timestart').mdtimepicker({format: 'hh:mm'});
    $('#timeend').mdtimepicker({format: 'hh:mm'});
    $("#bookPicthModal").on('hide.bs.modal', function(){
      // var c = confirm('Bạn có muốn xóa tất cả dữ liệu vừa nhập không?');
      // if(c == false){
      // return;
      // }
      $('#timestart').val('');
      $('#timeend').val('');
      //dichvudachon.splice(0,dichvudachon.length);
      //$('#danhmucdichvu input[type=checkbox]').each(function(){
        //$(this).prop('checked',false);
    //});
    //loaddichvu();
    $('#total-price').val('');
  });
    $('#btndatsan').on('click',function(){
      var timestart = $('#timestart').val();
      var timeend = $('#timeend').val();
      var tongthanhtoan = $('#total-price').val();
      var ngaydatsan = $("#dp3").val();
      var idsan = $('#pitchid').val();
      if (ngaydatsan.length == 0) {
        toastr.warning("Vui lòng chọn ngày đặt sân trước khi thực hiện đặt sân!");
        return;
      }
      if (timestart.length == 0 || timeend.length == 0) {
        toastr.warning("Vui lòng chọn thời gian bắt đầu và kết thúc trước khi thực hiện đặt sân!");
        return;
      }
      if (parseInt(timeend.substring(3,5)) != 30 && parseInt(timeend.substring(3,5)) != 0 || parseInt(timestart.substring(3,5))!= 30 && parseInt(timestart.substring(3,5))!= 0) {
        toastr.warning("Vui lòng chọn thời gian là bội của 30 phút!");
        return;
      }
      if(parseInt(timeend.substring(0,2)) <  parseInt(timestart.substring(0,2)) || parseInt(timeend.substring(0,2)) ==  parseInt(timestart.substring(0,2)) && parseInt(timeend.substring(3,5)) <  parseInt(timestart.substring(3,5))){
        toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
        return;
      }
      var datainput = { 
                        idsan:idsan,
                        timestart:timestart,
                        timeend: timeend,
                        ngaydatsan: ngaydatsan,
                        tongthanhtoan:tongthanhtoan
                        //dichvulist:dichvudachon
                      };
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/homepage_controller/datsan",
        dataType: 'json',
        data: datainput,
        success: function(res) {
          if (res.result > 0)
          {
            toastr.success('Đặt sân thành công!');
            $('#bookPicthModal').modal('hide');
          }
          else
          {
            toastr.error(res.error);
          }
        },
        error:function(e){
          toastr.error('Đặt sân thất bại!');
        }
      });
    });
});
  function choosesan(id){
    //var keywords = $("#ipkeyword").val();
     var username = '<?php echo $this->session->userdata('username');?>';
     if(username ==''){
      alert('Bạn phải đăng nhập mới có thể đặt sân!');
      $('.btn-login').click();
      return false;
     }
     else{
      $('#bookPicthModal').modal('show');
     }
    
    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "index.php/homepage_controller/getSanById",
    dataType: 'json',
    data: {id: id},
    success: function(res) {
    if (res != "")
    {
      $('#pitch-name').val(res.tensan);
      $('#pitch-price').val(res.dongia);
      $('#pitch-type').val(res.loaisan);
      $('#pitchid').val(res.idsan);
    }
    }
    });
  }
  //var dichvudachon=[];
  // function chooseService(id){
  //   var soluong = $(".soluongchon-"+id).val();
  //   var iddichvu = $('.dichvuchon-'+id).attr('data-id');
  //   var tendichvu = $('.dichvuchon-'+id).attr('data-name');
  //   var dongia = $('.dichvuchon-'+id).attr('data-price');
  //   if($('.dichvuchon-'+id).prop('checked')==true){
  //     var dichvu = {
  //       iddichvu : iddichvu,
  //       tendichvu: tendichvu,
  //       dongia : dongia,
  //       soluong: soluong,
  //       thanhtien: parseInt(dongia) * parseInt(soluong)
  //     };
  //     dichvudachon.push(dichvu);
  //     caculator();
  //     loaddichvu();
  //   }else{
  //     for (var i = 0; i < dichvudachon.length; i++) {
  //       if(dichvudachon[i].iddichvu == $('.dichvuchon-'+id).attr('data-id')){
  //         dichvudachon.splice(i,1);
  //       }
  //     }
  //     caculator();
  //     loaddichvu();
  //   }
    
  // }
  // function deletesv(id){
  //   for (var i = 0; i < dichvudachon.length; i++) {
  //       if(dichvudachon[i].iddichvu == id){
  //         $('#danhmucdichvu input[type=checkbox]').each(function(){
  //           if($(this).attr('data-id') == id){
  //             $(this).prop('checked',false);
  //           }
  //         });
  //         dichvudachon.splice(i,1);

  //       }
  //     }
  //     caculator();
  //     loaddichvu();
  // }
  $('#timestart').on('change',function(){
    var timestart = $('#timestart').val();
    var timeend = $('#timeend').val();
    if(parseInt(timeend.substring(0,2)) <  parseInt(timestart.substring(0,2)) || parseInt(timeend.substring(0,2)) ==  parseInt(timestart.substring(0,2)) && parseInt(timeend.substring(3,5)) <  parseInt(timestart.substring(3,5))){
    toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
    return;
      }
    caculator();
  });
  $('#timeend').on('change',function(){
     var timestart = $('#timestart').val();
    var timeend = $('#timeend').val();
    if(parseInt(timeend.substring(0,2)) <  parseInt(timestart.substring(0,2)) || parseInt(timeend.substring(0,2)) ==  parseInt(timestart.substring(0,2)) && parseInt(timeend.substring(3,5)) <  parseInt(timestart.substring(3,5))){
    toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
    return;
      }
    if(parseInt(timeend.substring(0,2)) ==  parseInt(timestart.substring(0,2))){
      if( parseInt(timeend.substring(3,5)) <=  parseInt(timestart.substring(3,5))){
        toastr.warning('Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu!');
        return;
      }
    
    }
    caculator();
  });
function caculator(){
  var timestart = $('#timestart').val();
  var timeend = $('#timeend').val();
  var sum = 0;
 
  // for (var i = 0; i < dichvudachon.length; i++) {
  //   sum += parseInt(dichvudachon[i].dongia) * parseInt(dichvudachon[i].soluong);
  // }
  if (timeend != '' && timestart != '' ){
    var sumtime = (parseInt(timeend.substring(0,2)) * 60 + parseInt(timeend.substring(3,5))) - (parseInt(timestart.substring(0,2)) * 60 + parseInt(timestart.substring(3,5)));
    sum += parseInt($('#pitch-price').val()) * (sumtime/60);
  }else{
    sum += parseInt($('#pitch-price').val());
  }
  $('#total-price').val(Math.round(sum));
  //return sum;
}
// function loaddichvu(){
// 
 $('#dichvudachon').empty();
//   for (var i = 0; i < dichvudachon.length; i++) {
//     var html = '<tr>'
//                 +'<td class="text-center">'+ (i+1) +'</td>'
//                 +'<td class="text-center">'+dichvudachon[i].tendichvu+'</td>'
//                 +'<td class="text-center">'+dichvudachon[i].soluong+'</td>'
//                 +'<td class="text-center"><input type="checkbox" class="delete-dichvu" onclick="deletesv('+dichvudachon[i].iddichvu+')"></td></tr>';
//     $('#dichvudachon').append(html);
//   }

// }

</script>

</body>
</html>
