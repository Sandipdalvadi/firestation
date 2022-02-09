<?php 
class ComboTestSubPkg_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all_pkg() {        
		//return $this->db->select("*")->from("lab_test")->where("is_deleted", 'N')->get()->result_array();
		$sql = "select a.*,b.name as clientname,p.title as parenttitle from lab_combotest_pkg a,lab_combotest_pkg p,lab_external_clients b where p.id=a.parent_id AND a.client_id =b.id  AND a.is_deleted='N' ";
		return $this->db->query($sql)->result_array();
    }
		
	public function get_all_tests_withprice() {        
		//return $this->db->select("*")->from("lab_test")->where("is_deleted", 'N')->get()->result_array();
		$sql = "select a.*, GROUP_CONCAT(CONCAT(c.currency,'.', b.price) SEPARATOR '<br>')  as amountwithcurr from lab_test a LEFT JOIN lab_test_price b on a.id=b.test_id  LEFT JOIN lab_country c ON c.id = b.currency_id group by a.id";
		return $this->db->query($sql)->result_array();
    }

	
	public function checkExists($title,$client_id=NULL,$parent_id=NULL) {       
	   return $this->db->select("*")->from("lab_combotest_pkg")->where("title", $title)->where("client_id", $client_id)->where("parent_id", $parent_id)->get()->num_rows();
    }
	public function checkExistsEdit($name,$id,$client_id=NULL,$parent_id=NULL) {       
	   return $this->db->select("*")->from("lab_combotest_pkg")->where("id !=" ,$id)->where("client_id", $client_id)->where("title", $name)->where("parent_id", $parent_id)->get()->num_rows();
    }
	
	public function save($data) {
		$test_data['title'] = $data['title'];
		$test_data['client_id'] = $data['client_id'];
		$test_data['parent_id'] =$data['parent_id'];
		$test_data['created_at'] = date("Y-m-d H:i:s");
		
		
		//upload files.
		
		$config['upload_path']   = '../assets/pkg_images/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 1000000; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);			
         if ( ! $this->upload->do_upload('imagename')) {
            $error = array('error' => $this->upload->display_errors()); 
           // $this->load->view('upload_form', $error);
			//echo "Error".print_r($error);
         }			
         else { 
            $dataupload = array('upload_data' => $this->upload->data()); 
           // $this->load->view('upload_success', $data); 
		  // echo "Success".print_r($dataupload);
		  $test_data['imagename'] = $dataupload["upload_data"]["raw_name"].$dataupload["upload_data"]["file_ext"];
         } 		 
		 
		$this->db->insert('lab_combotest_pkg', $test_data);
		$id = $this->db->insert_id();

		return 	$id;	
		
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('id',$id);
	$this->db->update('lab_combotest_pkg', $data);
    }
	public function update($data)
	{
		$test_data['title'] = $data['title'];
		$test_data['client_id'] = $data['client_id'];
		$test_data['parent_id'] =$data['parent_id'];
		//$test_data['created_at'] = date("Y-m-d H:i:s");

		//upload files.
		
		$config['upload_path']   = '../assets/pkg_images/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 1000000; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);			
         if ( ! $this->upload->do_upload('imagename')) {
            $error = array('error' => $this->upload->display_errors()); 
           // $this->load->view('upload_form', $error);
			//echo "Error".print_r($error);
         }			
         else { 
            $dataupload = array('upload_data' => $this->upload->data()); 
           // $this->load->view('upload_success', $data); 
		  // echo "Success".print_r($dataupload);
		  $test_data['imagename'] = $dataupload["upload_data"]["raw_name"].$dataupload["upload_data"]["file_ext"];
         } 		 
		$this->db->where('id',$data['cid']);		
		$this->db->update('lab_combotest_pkg', $test_data);
		
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from("lab_combotest_pkg")->where('id',$id)->get()->row_array();
	}
	
	public function gettestdetailsById($id=null)
	{
		//return $this->db->select('*')->from("lab_combotest_pkg_details")->where('id',$id)->get()->row_array();
		$sql = "select GROUP_CONCAT(test_id SEPARATOR ',')  as test_ids  from lab_combotest_pkg_details group by combo_test_id having combo_test_id=$id";
		return $this->db->query($sql)->row_array();
	}

	public function getpricedataById($id=null)
	{
		return $this->db->select('*')->from('lab_combotest_pkg_price')->where('test_id',$id)->get()->result_array();
	}
}