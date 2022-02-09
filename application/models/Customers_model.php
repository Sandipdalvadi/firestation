<?php 
class Customers_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all() {        
		return $this->db->select("*")->from("lab_customers")->get()->result_array();
    }
	
	public function samplecollection() {        
		return $this->db->select("*")->from("lab_sample_collection_charges")->get()->result_array();
    }
	
	public function samplecollectionsave($id,$min_price,$max_price,$sample_charge)
	{
		  $data = array( 
		'min_price'      => $min_price,
		'max_price'      => $max_price,
		'sample_charge'      => $sample_charge,
		);
		$this->db->where('id',$id);
		$this->db->update('lab_sample_collection_charges', $data);
	}
	
	public function externalagentcharges() {        
		return $this->db->select("*")->from("lab_external_agents_collection_charges")->get()->result_array();
    }
	
	public function happycustomers() {        
		return $this->db->select("*")->from("lab_happy_customers_comments")->get()->result_array();
    }
	
	
	public function externalagentsave($id,$min_price,$max_price,$sample_charge,$mode)
	{
		  //die("12343");
		  $data = array( 
		'min_price'      => $min_price,
		'max_price'      => $max_price,
		'sample_charge'      => $sample_charge,
		'mode'      => $mode,
		);
		$this->db->where('id',$id);
		$this->db->update('lab_external_agents_collection_charges', $data);
	}
	
	public function happycustomerssave($data) {        
		$this->db->insert('lab_happy_customers_comments', $data);       
    }
	
	
	
	
	
	
}