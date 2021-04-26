<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_controller extends CI_Controller {

	function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->library('session');
         $this->load->database(); 
         $this->load->model('model_san');
         $this->load->model('model_dichvu');
         $this->load->model('model_hoadon');
         $this->load->model('model_hoadonchitiet');
         $this->load->model('model_type');
         $this->load->model('model_customer');
      } 
	public function index()
	{	
		$result['data'] = $this->model_san->getAllsan();
		$data = $this->model_dichvu->getAlldichvu();
		$result['type'] = $this->model_type->getAllType();
		if($data['error']!=''){
			$result['error'] = $data['error'];
			$this->load->view('errors/html/error_db',$result);
			return false;
		}else{
			$result['dichvu'] = $data['dichvu'];
			$result['active'] = 'home';
		}
		$this->load->view('homepage',$result);
	}
	public function getSanById(){
		$id = $this->input->post('id');
		$data['san'] = $this->model_san->getSanById($id);
		echo json_encode($data['san']);
	}
	public function getSanByType($id){
		$result['data'] = $this->model_san->getPitchByType($id);
		$data = $this->model_dichvu->getAlldichvu();
		$result['type'] = $this->model_type->getAllType();
		if($data['error']!=''){
			$result['error'] = $data['error'];
			$this->load->view('errors/html/error_db',$result);
			return false;
		}else{
			$result['dichvu'] = $data['dichvu'];
			$result['active'] = 'loaisan';
		}
		$this->load->view('homepage',$result);
	}
	public function datsan(){
		try{
			$data['result'] = 1;
			$data['error'] = '';

			$idhoadon = $this->randomId();
			$idsan = $this->input->post('idsan');
			$ngaydatsan = $this->input->post('ngaydatsan');
			$thoigianbatdau = $this->input->post('timestart');
			$thoigianketthuc = $this->input->post('timeend');
			$tongthanhtoan = $this->input->post('tongthanhtoan');
			$dichvulist = $this->input->post('dichvulist');
			$day = date('Y-m-d H:i:s');
			$allBill = $this->model_hoadon->getAllBill();

			foreach ($allBill as $key => $value) {
				if(isset($ngaydatsan) && $ngaydatsan == $value->ngaydat){
					if( $thoigianbatdau > $value->timeStart && $thoigianbatdau < $value->timeEnd || $thoigianketthuc > $value->timeStart && $thoigianketthuc < $value->timeEnd){
						$data['result'] = 0;
						$data['error'] = 'Khung giờ bạn chọn đã trùng vui lòng chọn khung giờ khác!';
						break;
					}
				}
			}
			if($data['result'] > 0){
				$this->db->trans_begin();
				$db = array('idhoadon' => $idhoadon,
							'idsan' => $idsan,
							'iduser'=>  $this->session->userdata('id'),
							'timeStart'=> $thoigianbatdau,
							'timeEnd' => $thoigianketthuc,
							'ngaydat' => $ngaydatsan,
							'tongthanhtoan' => $tongthanhtoan,
							'status' => '0',
							'createdDate' => $day);
				//print_r($db);
				$dataInputHoadon = $this->model_hoadon->insertlisttodb($db);
				
				if (is_array($dichvulist) || is_object($dichvulist))
				{
				    foreach ($dichvulist as $key=>$value)
				    {
						$arrayName = array('iddichvu' => $value['iddichvu'],
											'idhoadon'=>$idhoadon,
											'dongia'=>$value['dongia'],
											'soluong'=>$value['soluong'],
											'thanhtien'=>$value['thanhtien'],
											'createdDate'=>$day);
				        //var_dump($value['iddichvu']);
				        $this->model_hoadonchitiet->insertdb($arrayName);
				    }
				}
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					$data['result'] = 0;
				}
				else
				{
					$this->db->trans_commit();
					$data['result'] = 1;
				}
			}
			echo json_encode($data);
		}
		catch(PHPException $error)
		{	
			print_r($error);
		}
	}
	public function updateinfo(){
		$idkhachhang = $this->input->post('idkhachhang');
		$tenkhachhang = $this->input->post('tenkhachhang');
		$sodt = $this->input->post('sodt');
		$diachi = $this->input->post('diachi');
		$gioitinh = $this->input->post('gioitinh');
		$ngaysinh = $this->input->post('ngaysinh');
		$email = $this->input->post('email');
		$inputUpdate = array(
			'tenkhachhang' => $tenkhachhang,
			'sodt'=> $sodt,
			'diachi' => $diachi,
			'gioitinh' => $gioitinh,
			'ngaysinh' => $ngaysinh,
			'email' => $email);
		$this->db->trans_begin();
		$this->model_customer->updateCoin($inputUpdate,$idkhachhang);
		if ($this->db->trans_status() === FALSE)
				{	
					error_log($this->db->last_query());
					$this->db->trans_rollback();
					$data['error'] = "Lỗi thực hiện cập nhật database!";
					$this->load->view('errors/html/error_db',$data);
				}
				else
				{
					$this->db->trans_commit();
					$this->load->view('success');
				}

	}
	public function acountmanager(){
		$data['data'] = $this->model_customer->getCusById($this->session->userdata('id'));
		//printf($data);
		$this->load->view('acountmanager',$data);
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
