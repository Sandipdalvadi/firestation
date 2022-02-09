<?php 
class ComboTest_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all_tests() {        
		//return $this->db->select("*")->from("lab_test")->where("is_deleted", 'N')->get()->result_array();
		//$sql = "select a.*, GROUP_CONCAT(CONCAT(c.currency,'.', b.a) SEPARATOR '<br>')  as amountwithcurr from lab_combo_test a LEFT JOIN lab_combo_test_price b on a.id=b.test_id  LEFT JOIN lab_country c ON c.id = b.currency_id group by a.id having is_deleted='N' ";
		$sql = "select a.*, b.is_deleted as bdeleted, GROUP_CONCAT(CONCAT(c.currency,'.', b.actual_price) SEPARATOR '<br>')  as actual_price, GROUP_CONCAT(CONCAT(c.currency,'.', b.discount_price) SEPARATOR '<br>')  as discount_price from lab_combo_test a LEFT JOIN lab_combo_test_price b on a.id=b.test_id AND b.is_deleted='N'   LEFT JOIN lab_country c ON c.id = b.currency_id group by  a.id  having a.is_deleted='N' ";
		return $this->db->query($sql)->result_array();
    }
		
	public function get_all_tests_withprice() {        
		//return $this->db->select("*")->from("lab_test")->where("is_deleted", 'N')->get()->result_array();
		$sql = "select a.*, GROUP_CONCAT(CONCAT(c.currency,'.', b.price) SEPARATOR '<br>')  as amountwithcurr from lab_test a LEFT JOIN lab_test_price b on a.id=b.test_id  LEFT JOIN lab_country c ON c.id = b.currency_id group by a.id";
		return $this->db->query($sql)->result_array();
    }

	
	public function checkExists($name) {       
	   return $this->db->select("*")->from("lab_combo_test")->where("name", $name)->get()->num_rows();
    }
	public function checkExistsEdit($name,$id) {       
	   return $this->db->select("*")->from("lab_combo_test")->where("id !=" ,$id)->where("name", $name)->get()->num_rows();
    }
	
	public function save($data) {
		
		//print("<pre>");
		//print_r($data);
		//die;
		$test_data['name'] = $data['name'];
		$test_data['code'] = $data['code'];
		$test_data['description'] = $data['description'];
		$test_data['client_id'] = $data['client_id'];
		$test_data['package_id'] = $data['package_id'];
		$test_data['sub_package_id'] = $data['sub_package_id'];
		$this->db->insert('lab_combo_test', $test_data);
		$test_id = $this->db->insert_id();
		
		
		foreach($data['location'] as $kloc => $location_id )
		{
			$index = -1;
			foreach($data['amount'] as $key => $value )
			{
				$price = array();
				$index++;
				$price['test_id'] = $test_id;
				$price['currency_id'] = $data['currency'][$index];
				$price['price'] = $value;
				$price['actual_price'] = $data['actual_price'][$index];
				$price['discount_price'] = $data['discount_price'][$index];
				$price['location_id'] = $location_id;
				$this->db->insert('lab_combo_test_price', $price);			
			}
		}
		$index = -1;
		foreach($data['hid_test_id'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['combo_test_id'] = $test_id;
			$price['test_id'] = $value;//$data['hid_test_id'][$index];			
			$this->db->insert('lab_combo_test_details', $price);			
		}
		
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('id',$id);
	$this->db->update('lab_combo_test', $data);
    }
	public function update($data)
	{
		$test_data['name'] = $data['name'];
		$test_data['code'] = $data['code'];
		$test_data['description'] = $data['description'];
		$this->db->where('id',$data['cid']);		
		$this->db->update('lab_combo_test', $test_data);
		$index = -1;
		//delete prious price.
		//$this->db->where('test_id', $data['cid']);
		//$this->db->delete('lab_combo_test_price'); 
		
		
		 $data1 = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('test_id',$data['cid']);
	$this->db->update('lab_combo_test_price', $data1);
		
		
	
		/*foreach($data['amount'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['test_id'] = $data['cid'];
			$price['currency_id'] = $data['currency'][$index];
			$price['price'] = $value;
			$price['actual_price'] = $data['actual_price'][$index];
			$price['discount_price'] = $data['discount_price'][$index];
			$this->db->insert('lab_combo_test_price', $price);			
		}*/
		
		foreach($data['location'] as $kloc => $location_id )
		{
			$index = -1;
			foreach($data['amount'] as $key => $value )
			{
				$price = array();
				$index++;
				$price['test_id'] = $data['cid'];
				$price['currency_id'] = $data['currency'][$index];
				$price['price'] = $value;
				$price['actual_price'] = $data['actual_price'][$index];
				$price['discount_price'] = $data['discount_price'][$index];
				$price['location_id'] = $location_id;
				$this->db->insert('lab_combo_test_price', $price);			
			}
		}
		
		
		$index = -1;
		$this->db->where('combo_test_id', $data['cid']);
		$this->db->delete('lab_combo_test_details'); 
		/*foreach($data['test_id'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['combo_test_id'] = $data['cid'];
			$price['test_id'] = $data['test_id'][$index];			
			$this->db->insert('lab_combo_test_details', $price);			
		}*/
		foreach($data['hid_test_id'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['combo_test_id'] = $data['cid'];//$test_id;
			$price['test_id'] = $value;//$data['hid_test_id'][$index];			
			$this->db->insert('lab_combo_test_details', $price);			
		}
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from("lab_combo_test")->where('id',$id)->get()->row_array();
	}
	
	public function gettestdetailsById($id=null)
	{
		//return $this->db->select('*')->from("lab_combo_test_details")->where('id',$id)->get()->row_array();
		$sql = "select GROUP_CONCAT(test_id SEPARATOR ',')  as test_ids  from lab_combo_test_details group by combo_test_id having combo_test_id=$id";
		return $this->db->query($sql)->row_array();
	}

	public function getpricedataById($id=null)
	{
		return $this->db->select('*')->from('lab_combo_test_price')->where('test_id',$id)->where("is_deleted", 'N')->get()->result_array();
	}
}