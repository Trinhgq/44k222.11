<?php
class model_user extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
      public function getByUsPw($user,$pw){
        $this->db->select('tbl_customer.id,username,tenkhachhang,idrole,gioitinh,diachi,ngaysinh,sodt,diemthuong,email');
        $this->db->from('tbl_taikhoan');
        $this->db->join('tbl_customer','tbl_taikhoan.idkh = tbl_customer.id');
        $this->db->where('username',$user);
        $this->db->where('password',$pw);
        $query = $this->db->get();
        return $query->row_array();
      }
      public function getByUser($user){
        $this->db->select('tbl_customer.id,username,tenkhachhang,idrole,gioitinh,diachi,ngaysinh,sodt,diemthuong,email');
        $this->db->from('tbl_taikhoan');
        $this->db->join('tbl_customer','tbl_taikhoan.idkh = tbl_customer.id');
        $this->db->where('username',$user);
        $query = $this->db->get();
        return $query->row_array();
      }
      public function createUser($input){
        $this->db->insert('tbl_taikhoan',$input);
        //print_r($this->db->last_query());
        return $this->db->affected_rows();
      }
  	}
?>