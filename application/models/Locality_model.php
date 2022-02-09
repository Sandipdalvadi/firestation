<?php 
class Locality_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all() {        
		//return $this->db->select("*")->from("lab_country")->where("is_deleted", 'N')->get()->result_array();
		return $this->db->select('lab_locality.*, lab_country.name as country, lab_state.name as state, lab_district.name as district, lab_city.name as city')
         ->from('lab_locality')
		  ->join('lab_country', 'lab_locality.country_id = lab_country.id')		      
		  ->join('lab_state', 'lab_locality.state_id = lab_state.id')
		   ->join('lab_district', 'lab_locality.district_id = lab_district.id')
		    ->join('lab_city', 'lab_city.id = lab_locality.city_id')
		 ->where("lab_locality.is_deleted", 'N')->get()->result_array();

    }	
	
	public function get_all_locality_by_cityid($city_id) { 
	
		return $this->db->select("*")->from("lab_locality")->where("city_id", $city_id)->where("is_deleted", 'N')->get()->result_array();
	}
	
	
	
	
	
	public function checkExists($name,$city_id) {       
	   return $this->db->select("*")->from("lab_locality")->where("name", $name)->where("is_deleted", 'N')->where("city_id", $city_id)->get()->num_rows();
    }
	public function checkExistsEdit($name,$id,$city_id) {       
	   return $this->db->select("*")->from("lab_locality")->where("id !=" ,$id)->where("is_deleted", 'N')->where("name", $name)->where("city_id", $city_id)->get()->num_rows();
    }
	
	public function save($data) {		
		$this->db->insert('lab_locality', $data);       
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('id',$id);
	$this->db->update('lab_locality', $data);
    }
	public function update($data)
	{
		$this->db->where('id',$data['cid']);
		unset($data['cid']);
		$this->db->update('lab_locality', $data);
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from('lab_locality')->where('id',$id)->get()->row_array();
	}
}