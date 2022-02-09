<?php 
class City_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all() {        
		//return $this->db->select("*")->from("lab_country")->where("is_deleted", 'N')->get()->result_array();
		return $this->db->select('lab_city.*, lab_country.name as country, lab_state.name as state, lab_district.name as district')
         ->from('lab_city')
		  ->join('lab_country', 'lab_city.country_id = lab_country.id')		      
		  ->join('lab_state', 'lab_city.state_id = lab_state.id')
		   ->join('lab_district', 'lab_city.district_id = lab_district.id')
		 ->where("lab_city.is_deleted", 'N')->get()->result_array();

    }	
		public function get_all_city_by_disid($dis_id) { 
	
		return $this->db->select("*")->from("lab_city")->where("district_id", $dis_id)->where("is_deleted", 'N')->get()->result_array();
	}
	public function checkExists($name,$district_id) {       
	   return $this->db->select("*")->from("lab_city")->where("name", $name)->where("is_deleted", 'N')->where("district_id", $district_id)->get()->num_rows();
    }
	public function checkExistsEdit($name,$id,$district_id) {       
	   return $this->db->select("*")->from("lab_city")->where("id !=" ,$id)->where("is_deleted", 'N')->where("name", $name)->where("district_id", $district_id)->get()->num_rows();
    }
	
	public function save($data) {		
		$this->db->insert('lab_city', $data);       
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('id',$id);
	$this->db->update('lab_city', $data);
    }
	public function update($data)
	{
		$this->db->where('id',$data['cid']);
		unset($data['cid']);
		$this->db->update('lab_city', $data);
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from('lab_city')->where('id',$id)->get()->row_array();
	}
}