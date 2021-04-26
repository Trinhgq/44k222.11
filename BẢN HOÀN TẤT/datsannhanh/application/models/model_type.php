<?php
class model_type extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
    	public function getAllType(){
       $query = $this->db->get('tbl_loaisan');
       return $query->result();
  	}
  }
?>