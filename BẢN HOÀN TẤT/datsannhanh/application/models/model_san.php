<?php
class model_san extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
    	public function getAllsan(){
        $this->db->select('idsan,tensan,tbl_san.loaisan as idloaisan,dongia,tbl_loaisan.loaisan,tbl_san.createdDate');
        $this->db->from('tbl_san');
        $this->db->join('tbl_loaisan','tbl_san.loaisan = tbl_loaisan.idloaisan');
        $this->db->order_by('tensan','asc');
      	$query = $this->db->get();
        return $query->result();
    	}
      public function getSanById($id){
        $this->db->select('idsan,tensan,dongia,tbl_loaisan.loaisan');
        $this->db->from('tbl_san');
        $this->db->join('tbl_loaisan','tbl_san.loaisan = tbl_loaisan.idloaisan');
         $this->db->where('idsan',$id);
        $query = $this->db->get();
        return $query->row();
      }
      public function getPitchByType($id){
        $this->db->where('loaisan',$id);
        $query = $this->db->get('tbl_san');
        return $query->result();
      }
      public function updateSan($input,$id){
        $this->db->where('idsan', $id);
        return $this->db->update('tbl_san', $input);
        
      }
      public function insertSan($db){
        $this->db->insert('tbl_san',$db);
        //print_r($this->db->last_query());
        return $this->db->affected_rows();
      }
      public function deleteSan($id){
        $this->db->where('idsan', $id);
        $this->db->delete('tbl_san');
        return $this->db->affected_rows();
      }
  	}
?>
