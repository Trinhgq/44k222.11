<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_controller extends CI_Controller {

	function __construct() { 
        parent::__construct(); 
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->load->database(); 
        $this->load->model('model_san');
        $this->load->model('model_dichvu');
        $this->load->model('model_hoadon');
        $this->load->model('model_hoadonchitiet');
        $this->load->model('model_customer');
        $this->checkRole();
      }
  public function index(){
    $result['data'] = $this->model_hoadon->getBillToBillManager();
    $result['error'] = '';
    if(count($result['data'])==0){
      $result['error'] = 'Hiện tại chưa có hóa đơn nào được đặt!';
      //$this->load->view('quan-ly-bill',$result);
    }
    $this->load->view('admin/quan-ly-bill',$result);
  }

  public function duyetdon(){
    $result['data'] = '';
    $result['error'] = '';
    $input = '';
    $status = $this->input->post('status');
    $idhoadon = $this->input->post('idhoadon');
    $idkhachhang = $this->input->post('idkhachhang');
    $tongthanhtoan = $this->input->post('tongthanhtoan');
    $diemthuong = round(floatval($tongthanhtoan)/1000) + $this->session->userdata('diemthuong');
    if($status == 0){
      $arrayStatus = array('status' => 1);
      $arrayCoin = '';
    }
    if ($status == 1) {
      $arrayStatus = array('status' => 2);
      $arrayCoin = array('diemthuong' => $diemthuong);
        $this->session->unset_userdata('diemthuong');
        $this->session->set_userdata('diemthuong',$diemthuong);
    }

    $this->db->trans_begin();
    
    //Update trạng thái đơn
    $this->model_hoadon->duyetdon($arrayStatus,$idhoadon);

    if ($arrayCoin != '') {
      //Update điểm thưởng
      $this->model_customer->updateCoin($arrayCoin, $idkhachhang);
    }
    if ($this->db->trans_status() === FALSE)
        {
          log_message('error', $this->db->last_query());
          $this->db->trans_rollback();
          $result['data'] = 0;
          $result['error'] = 'Lỗi khi thực hiện cập nhật dữ liệu!';
        }
        else
        {
          log_message('info', $this->db->last_query());
          $this->db->trans_commit();
          $result['data'] = 1;
          $result['error'] = '';
        }
    echo json_encode($result);
  }

  public function checkRole(){
    if(is_null($this->session->userdata('username')) || $this->session->userdata('idrole') == '3'){
      redirect('/', 'refresh');
    }
  }
  public function quanlysan(){
    $data['data'] = $this->model_san->getAllsan();
    $data['error'] = '';
    $this->load->view('pitchmanager',$data);
  }
	public function CreateSan(){
    $result['data'] = '';
    $result['error'] = '';
    $input = '';
    $idsan = $this->randomId();
    $tensan = $this->input->post('pitch-name');
    $loaisan = $this->input->post('pitch-type');
    $dongia = $this->input->post('pitch-price');
    $day = date('Y-m-d H:i:s');
    $this->db->trans_begin();
    $db = array('idsan' => $idsan,
							'tensan'=>  $tensan,
							'loaisan'=> $loaisan,
							'dongia' => $dongia,
							'createdDate' => $day);
    //Update trạng thái đơn
    $this->model_san->insertSan($db);
    if ($this->db->trans_status() === FALSE)
        {
          log_message('error', $this->db->last_query());
          $this->db->trans_rollback();
          $result['heading'] = 'Thêm sân không thành công!';
          $result['message'] = 'Vui lòng liên hệ quản trị viên để được hỗ trợ!';
          $this->load->view('errors/html/error_general',$result);
          return false;
        }else{
          log_message('info', $this->db->last_query());
          $this->db->trans_commit();
        }
      redirect('/admin/quan-ly-san', 'refresh');
  }
  public function updateSan()
	{	
		$idsan = $this->input->post('idsan');
    $txtPitchName = $this->input->post('txtPitchName');
    $txtUnitPrice = $this->input->post('txtUnitPrice');
    $loaisan= $this->input->post('slLoaiSan');
    $day = date('Y-m-d H:i:s');
    $input = array('tensan' => $txtPitchName, 'dongia' => $txtUnitPrice, 'loaisan' => $loaisan,'updatedDate' => $day);
		$result['data'] = $this->model_san->updateSan($input,$idsan);
		if($result['data']==0){
			$result['heading'] = 'Update sân không thành công!';
			$result['message'] = 'Vui lòng liên hệ quản trị viên để được hỗ trợ!';
			$this->load->view('errors/html/error_general',$result);
			return false;
		}
		redirect('/admin/quan-ly-san', 'refresh');
	}
	public function deleteSan(){
    $idsan = $this->input->post('idsandelete');
    $result['data'] = $this->model_san->deleteSan($idsan);
		if($result['data']==0){
			$result['heading'] = 'Xóa sân không thành công!';
			$result['message'] = 'Vui lòng liên hệ quản trị viên để được hỗ trợ!';
			$this->load->view('errors/html/error_general',$result);
			return false;
		}
    redirect('/admin/quan-ly-san', 'refresh');
  }
  public function randomId(){
		$digits_needed=10;

		$random_number=''; // set up a blank string

		$count=0;

		while ( $count < $digits_needed ) {
		    $random_digit = mt_rand(0, 9);
		    
		    $random_number .= $random_digit;
		    $count++;
		}

		return $random_number;
	}
}
?>
