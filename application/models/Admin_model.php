<?php 
class Admin_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function add_cat() {
			extract($_REQUEST); 
				$data1 = array(
					"cat_id" => $cat_id,
					"cat_name" => $cat_name,
					"cat_desc" => $cat_desc,										
					"status" => $status,
					"dateCreated" => date("Y-m-d H:i:s") 
				);
				$this->db->insert("categories", $data1);
				$login_id = $this->db->insert_id();
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull",
				 
				); 
				return $output;
	}
	
	
  public function get_cat_list() {
        $query = $this->db->query("select * from categories");       
        return $query->result_array();
    }
}