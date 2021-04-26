<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {

	function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->library('session');
         $this->load->model('model_user');
         $this->load->model('model_customer');
      } 
	public function index()
	{	
		$user = $this->input->post('username');
		$pw = $this->input->post('password');
		if($user == "" or $pw == ""){
			$result['heading'] = 'Lỗi đăng nhập!';
			$result['message'] = 'Vui lòng nhập đầy đủ thông tin User và password!';
			$this->load->view('errors/html/error_general',$result);
			return false;
		}
		$result['data'] = $this->model_user->getByUsPw($user,$pw);
		if(count($result['data'])==0){
			$result['heading'] = 'Lỗi đăng nhập!';
			$result['message'] = 'Sai user password vui lòng đăng nhập lại!';
			$this->load->view('errors/html/error_general',$result);
			return false;
		}
		$this->session->set_userdata($result['data']);
		redirect('/', 'refresh');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
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
	public function register(){
		try{
			$data['result'] = 1;
			$data['error'] = '';
			$cusid = $this->randomId();
			$user = $this->input->post('user');
			$phonenumber = $this->input->post('phonenumber');
			$email = $this->input->post('email');
			$pssword = $this->input->post('pssword');
			$day = date('Y-m-d H:i:s');
			$result['data'] = $this->model_user->getByUser($user);
			if(is_array($result['data']) && count($result['data'])!=0){
				$data['result'] = 0;
				$data['error'] = 'Username đã tồn tại!';
			}else{
				$this->db->trans_begin();
				$db = array('id' => $cusid,
							'tenkhachhang' => $user,
							'sodt'=>  $phonenumber,
							'email'=> $email,
							'diemthuong' => '0',
							'createdDate' => $day);
				//print_r($db);
				$result = $this->model_customer->createCustomer($db);
				if ($result != 1){
					$this->db->trans_rollback();
					$data['result'] = 0;
					$data['error'] = 'Đăng ký user thất bại!';
				}else
				{
					$userinfo = array('username' => $user,
							'password'=>  $pssword,
							'idkh'=> $cusid,
							'trangthai' => 1,
							'idrole' => '3',
							'updatedDate' => null,
							'createdDate' => $day);
					//print_r($db);
					$result = $this->model_user->createUser($userinfo);
				}
				
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					$data['result'] = 0;
					$data['error'] = 'Đăng ký user thất bại!';
				}
				else
				{
					$this->db->trans_commit();
					$data['result'] = 1;
					$data['error'] = '';
				}
			}
			echo json_encode($data);
		}
		catch(PHPException $error)
		{	
			print_r($error);
			$data['result'] = 0;
			$data['error'] = 'Đăng ký user thất bại!';
			echo json_encode($data);
		}
	}
}
