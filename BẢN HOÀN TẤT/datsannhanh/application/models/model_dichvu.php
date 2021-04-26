<?php
class model_dichvu extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
    	public function getAlldichvu(){
        //$this->db->order_by('tensan','asc');
        try{
          $query = $this->db->get('tbl_dichvu');
          $data['dichvu']= $query->result();
          if($query->num_rows()>0){
          $data['error'] = '';
          }
          else{
            $data['error']= 'Lỗi khi thực hiện get data dịch vụ!';
          }
         // return $data;
        }catch(Execption $e){
          $data['error']= 'Lỗi khi thực hiện get data dịch vụ!';
          //return $data['error'];
          //return $data;
        }
      	return $data;
    	}
  	}
?>