<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exitingvhlistsfs extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Doctor_model');
		
		if(($this->session->userdata('loginUser')!=''))
		{
			
			//redirect('/');
		}
		else
		{
			redirect('login');
		}
	}
	
	public function index($id=0)
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');	
		$data['fetch222'] = [];
		$data['id'] = $id;
		 if($id != 0 )
		 {
			 $sql = "SELECT * FROM fuel_quota_allotments WHERE id = ".$id;
			 $data['fetch222'] = $this->db->query($sql)->row_array();
		 }		 
		$this->load->view('exitingvhlistsfs',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Quotaallotment');
	}
	public function save()
	{
		
		$insertData["local_entry_fs_id"] = $this->session->userdata('fs_name');
		$insertData["service_type"] = $_POST['service_type'];  //
		$insertData["trno"] = $_POST['trno'];  //
		$insertData["vhno"] =$vhno = $_POST['vhno']; //
		$insertData["vhmake"] =$vhmake = $_POST['vhmake'];  //
		$insertData["vhmodel"] =$vhmodel = $_POST['vhmodel']; //
		$insertData["vhsubmodel"] =$vhsubmodel = $_POST['vhsubmodel'];//
		$insertData["vhCat"] =$vhCat = $_POST['vhCat']; //
		$insertData["fuelType"] =$fuelType = $_POST['fuelType']; //
		//$insertData["invNo"] =$invNo = $_POST['invNo'];
		//$insertData["CostVh"] =$vhCost = $_POST['vhCost'];
		//$insertData["dlrName"] =$dlrName = $_POST['dlrName'];
		//$insertData["dlrMobile"] =$dlrMobile = $_POST['dlrMobile'];
		//$insertData["poNo"] =$pono = $_POST['pono'];
		//$insertData["poDate"] =$poDate = $_POST['poDate'];
		$insertData["deliveryDt"] =$dlrDate = $_POST['dlrDate'];//
		
		$end = date($_POST['dlrDate'], strtotime('+15 years'));
		$insertData["expiryDt"] =$expiryDt = $end;
		//$insertData["stockLedgerNo"] =$stocklNo = $_POST['stocklNo'];
		//$insertData["pageNo"] =$pageNo = $_POST['pageNo'];
		//$insertData["slNo"] =$slNo = $_POST['slNo'];
		$insertData["vehicle_description"] =$vehicle_description = $_POST['vehicle_description']; //
		$insertData["present_condition"] =$present_condition = $_POST['present_condition']; //
		$insertData["gps_status"] =$gps_status = $_POST['gps_status'];//
		$insertData["kmpl"] =$kmpl = $_POST['kmpl']; //
		$insertData["current_meter_reading"] =$current_meter_reading = $_POST['current_meter_reading'];//
		$insertData["updated_by"] =$updated_by = $_SESSION['name'];
		
		$insertData["tender_number"] =$tender_number = $_POST['tender_number'];
		
		$insertData["age_of_vehicle"] =$age_of_vehicle = date("Y") - date("Y", strtotime($dlrDate));
		
		$insertData["chassisNo"] =$chassisNo = $_POST['chassisNo']; //
		$insertData["engineNo"] = $_POST['engineNo']; //

//$insertData["rc_book"] = $target_filerc_book ; 
//$insertData["survey_letter"] = $target_filesurvey_letter ; 		
		$insert = $this->db->insert('vehicleD',$insertData);	
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
		redirect('Exitingvhlistsfs');
		
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */