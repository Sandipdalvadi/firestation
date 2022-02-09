<?php 
class TestByConditions_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all_tests() {        
		return $this->db->select("*")->from("lab_test_by_conditions")->where("is_deleted", 'N')->get()->result_array();
    }
	
	
	public function get_all_tests_includes($id) {        
		$data1 =  $this->db->select("id,include_lab_test_id")->from("lab_test_by_conditions_details_test_includes")->where("lab_test_id", $id)->where("is_deleted", 'N')->get()->result_array();		
		$data = array();
		if($data1){
			foreach($data1 as $key => $value){
            $data[$value['id']] = $value["include_lab_test_id"];
			}
           
        }
		return $data;
    }
	public function get_all_tests_precautuons($id) {        
		$data1 =  $this->db->select("id,lab_test_precautions_id")->from("lab_test_by_conditions_details_precautions")->where("lab_test_id", $id)->get()->result_array();		
		$data = array();
		if($data1){
			foreach($data1 as $key => $value){
            $data[$value['id']] = $value["lab_test_precautions_id"];
			}
           
        }
		return $data;
    }
	
		
	public function get_all_tests_withprice() {        
		//return $this->db->select("*")->from("lab_test")->where("is_deleted", 'N')->get()->result_array();
		$sql = "select a.*, GROUP_CONCAT(CONCAT(c.currency,'.', b.price) SEPARATOR '<br>')  as amountwithcurr from lab_test_by_conditions a LEFT JOIN lab_test_price b on a.id=b.test_id  LEFT JOIN lab_country c ON c.id = b.currency_id group by a.id";
		return $this->db->query($sql)->result_array();
    }

	
	public function checkExists($name) {       
	   return $this->db->select("*")->from("lab_test_by_conditions")->where("name", $name)->get()->num_rows();
    }
	
	public function checkExistsCode($name) {       
	   return $this->db->select("*")->from("lab_test_by_conditions")->where("code", $name)->get()->num_rows();
    }
	
	
	
	public function checkExistsEdit($name,$id) {       
	   return $this->db->select("*")->from("lab_test_by_conditions")->where("id !=" ,$id)->where("name", $name)->get()->num_rows();
    }
	
	public function save_tests_clients(){
		
		foreach($_REQUEST['location'] as $key => $value ){
			$client_id = $_REQUEST["source"];
			$location_id = $value;
			$test_id = $_REQUEST["hid_test_id"];
			for($currency=1;$currency<=2;$currency++){
				$actual_price = $_REQUEST["testprices"][$_REQUEST["hid_test_id"]][$currency];
				$discount_price = $_REQUEST["testprices_dis"][$_REQUEST["hid_test_id"]][$currency];
				
				$sql = "select * from lab_test_by_conditions_price_all_clients where client_id ='".$client_id."' 
				AND location_id = '".$location_id."' AND test_id='".$test_id."' AND currency_id ='".$currency."'";
				$num = $this->db->query($sql)->num_rows();
				if($num){
					$row = $this->db->query($sql)->row_array();
					$data = array();
					$data['client_id'] = $client_id;
					$data['location_id'] = $location_id;
					$data['test_id'] = $test_id;
					$data['currency_id'] = $currency;
					$data['actual_price'] = $actual_price;
					$data['discount_price'] = $discount_price;
					$this->db->where('id',$row['id']);		
					$this->db->update('lab_test_by_conditions_price_all_clients', $data);
				}
				else{
					$data = array();					
					$data['client_id'] = $client_id;
					$data['location_id'] = $location_id;
					$data['test_id'] = $test_id;
					$data['currency_id'] = $currency;
					$data['actual_price'] = $actual_price;
					$data['discount_price'] = $discount_price;
					$this->db->insert('lab_test_by_conditions_price_all_clients', $data);			
				}
					
			}	
		}
		
	}
	
	public function save($data) {
		
		$test_data['name'] = $data['name'];
		$test_data['code'] = $data['code'];
		$test_data['test_type'] = $data['test_type'];
		$test_data['pre_test_info'] = $data['pre_test_info'];		
		$test_data['description'] = $data['description'];
		$this->db->insert('lab_test_by_conditions', $test_data);
		$test_id = $this->db->insert_id();
		$index = -1;
		/*foreach($data['amount'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['test_id'] = $test_id;
			$price['currency_id'] = $data['currency'][$index];
			$price['price'] = $value;
			$this->db->insert('lab_test_by_conditions_price', $price);			
		}*/
		if( $test_data['pre_test_info'] == "Yes" ){	
			if( isset($data['precautions']) && count($data['precautions']) >=1 ){		
				foreach($data['precautions'] as $key => $value )
				{
					$price = array();
					$index++;
					$price['lab_test_id'] = $test_id;
					$price['lab_test_precautions_id'] =  $value;
					$price['is_deleted'] = 'N';
					$this->db->insert('lab_test_by_conditions_details_precautions', $price);			
				}
			}
		}
		
		if( isset($data['test_includes']) && count($data['test_includes']) >=1 ){
			foreach($data['test_includes'] as $key => $value )
				{
					$price = array();
					$index++;
					$price['lab_test_id'] = $test_id;
					$price['include_lab_test_id'] =  $value;
					$price['is_deleted'] = 'N';
					$this->db->insert('lab_test_by_conditions_details_test_includes', $price);			
				}
			}	
		
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('id',$id);
	$this->db->update('lab_test_by_conditions', $data);
    }
	public function update($data)
	{
		$test_data['name'] = $data['name'];
		$test_data['code'] = $data['code'];
		$test_data['test_type'] = $data['test_type'];
		$test_data['pre_test_info'] = $data['pre_test_info'];	
		$test_data['description'] = $data['description'];
		$this->db->where('id',$data['cid']);		
		$this->db->update('lab_test_by_conditions', $test_data);
		$index = -1;
		
		//delete prious price.
		/*$this->db->where('test_id', $data['cid']);
		$this->db->delete('lab_test_by_conditions_price'); 
		foreach($data['amount'] as $key => $value )
		{
			$price = array();
			$index++;
			$price['test_id'] = $data['cid'];
			$price['currency_id'] = $data['currency'][$index];
			$price['price'] = $value;
			$this->db->insert('lab_test_by_conditions_price', $price);			
		}	
		*/
		
		$conditionArray = $data['test_includes'];
		$this->db->where_not_in("include_lab_test_id", $conditionArray);
		$this->db->where('lab_test_id',$data['cid']);	
		$this->db->update('lab_test_by_conditions_details_test_includes', array("is_deleted" => 'Y'));
				
				
		if( isset($data['test_includes']) && count($data['test_includes']) >=1 ){				
				foreach($data['test_includes'] as $key => $value )
				{
					
					$index++;									
					$sql = "select * from lab_test_by_conditions_details_test_includes where lab_test_id ='".$data['cid']."' AND include_lab_test_id ='".$value."' AND is_deleted = 'N' ";		
					$num = $this->db->query($sql)->num_rows();
					if($num == 0 ){
						
						$price = array();
						$index++;
						$price['lab_test_id'] = $data['cid'];
						$price['include_lab_test_id'] =  $value;
						$price['is_deleted'] = 'N';
						try{
						$this->db->insert('lab_test_by_conditions_details_test_includes', $price);							
						}
						catch(Error $e){
							echo $e->getMessage();//die;
						}
					}
				}



				
			
			}
	
		
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from('lab_test_by_conditions')->where('id',$id)->get()->row_array();
	}

	public function getpricedataById($id=null)
	{
		return $this->db->select('*')->from('lab_test_by_conditions_price')->where('test_id',$id)->get()->result_array();
	}
}