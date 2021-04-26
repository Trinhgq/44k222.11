<?php
class model_hoadonchitiet extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
      public function insertdb($db){
        $this->db->insert('tbl_hoadondichvu',$db);
        return $this->db->affected_rows();
      }
  	}
?>