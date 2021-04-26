<?php
class model_hoadon extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
      public function insertlisttodb($db){
        $this->db->insert('tbl_hoadon',$db);
        //print_r($this->db->last_query());
        return $this->db->affected_rows();
      }
      public function getAllBill(){
        $query = $this->db->get('tbl_hoadon');
        return $query->result();
      }
      public function getBillToBillManager(){
        $query = 'select 
                  idhoadon,
                  tensan,
                  c.id,
                  tenkhachhang,
                  timeStart,
                  timeEnd,
                  tongthanhtoan,
                  ngaydat,
                  b.status
              from
                  tbl_hoadon b
                      inner join
                  tbl_san s ON s.idsan = b.idsan
                      inner join
                  tbl_customer c ON iduser = c.id order by ngaydat desc;';
          $result = $this->db->query($query);
        return $result->result();
      }

      public function duyetdon($input,$id){
        $this->db->where('idhoadon', $id);
        return $this->db->update('tbl_hoadon', $input);
        
      }
  	}
?>