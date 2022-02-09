<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vhlists extends CI_Controller { 
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
	
	public function index()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('vhlists',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM vehicleD  WHERE  vhId = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Vhlists');
	}
	public function save()
	{
		try 
		{
			
			
			/* $target_dir = "uploads/";
$target_filerc_book= $target_dir . basename($_FILES["rc_book"]["name"]);

$target_filesurvey_letter = $target_dir . basename($_FILES["survey_letter"]["name"]);
*/


//update tender table with status as received.
$sql_update = "update tenders_details_new SET status ='received' where tender_number  ='".$_POST['tender_number']."'";
$this->db->query($sql_update);


			$target_filerc_book = '';
			$target_filesurvey_letter   = '';
		    if(!empty($_FILES["survey_letter"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filesurvey_letter = $target_dir .uniqid().'-'.basename($_FILES["survey_letter"]["name"]);
			move_uploaded_file($_FILES["survey_letter"]["tmp_name"], $target_filesurvey_letter);
			}
			if(!empty($_FILES["rc_book"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filerc_book = $target_dir .uniqid().'-'.basename($_FILES["rc_book"]["name"]);
			move_uploaded_file($_FILES["rc_book"]["tmp_name"], $target_filesurvey_letter);
			}
			
			
			

	/*if (move_uploaded_file($_FILES["rc_book"]["tmp_name"], $target_filerc_book)) {

    
}

if (move_uploaded_file($_FILES["survey_letter"]["tmp_name"], $target_filesurvey_letter)) {

    
}
*/


		$insertData["trno"] = $_POST['trno'];
		$insertData["vhno"] =$vhno = $_POST['vhno'];
		$insertData["vhmake"] =$vhmake = $_POST['vhmake'];
		$insertData["vhmodel"] =$vhmodel = $_POST['vhmodel'];
		$insertData["vhsubmodel"] =$vhsubmodel = $_POST['vhsubmodel'];
		$insertData["vhCat"] =$vhCat = $_POST['vhCat'];
		$insertData["fuelType"] =$fuelType = $_POST['fuelType'];
		$insertData["invNo"] =$invNo = $_POST['invNo'];
		$insertData["CostVh"] =$vhCost = $_POST['vhCost'];
		$insertData["dlrName"] =$dlrName = $_POST['dlrName'];
		$insertData["dlrMobile"] =$dlrMobile = $_POST['dlrMobile'];
		$insertData["poNo"] =$pono = $_POST['pono'];
		$insertData["poDate"] =$poDate = $_POST['poDate'];
		$insertData["deliveryDt"] =$dlrDate = $_POST['dlrDate'];
		
		$end = date($_POST['dlrDate'], strtotime('+15 years'));
		$insertData["expiryDt"] =$expiryDt = $end;
		$insertData["stockLedgerNo"] =$stocklNo = $_POST['stocklNo'];
		$insertData["pageNo"] =$pageNo = $_POST['pageNo'];
		$insertData["slNo"] =$slNo = $_POST['slNo'];
		$insertData["vehicle_description"] =$vehicle_description = $_POST['vehicle_description'];
		$insertData["present_condition"] =$present_condition = $_POST['present_condition'];
		$insertData["gps_status"] =$gps_status = $_POST['gps_status'];
		$insertData["kmpl"] =$kmpl = $_POST['kmpl'];
		$insertData["current_meter_reading"] =$current_meter_reading = $_POST['current_meter_reading'];
		$insertData["updated_by"] =$updated_by = $_SESSION['name'];
		
		$insertData["tender_number"] =$tender_number = $_POST['tender_number'];
		
		$insertData["age_of_vehicle"] =$age_of_vehicle = date("Y") - date("Y", strtotime($dlrDate));
		
		$insertData["chassisNo"] =$chassisNo = $_POST['chassisNo'];
		$insertData["engineNo"] = $_POST['engineNo'];

$insertData["rc_book"] = $target_filerc_book ; 
$insertData["survey_letter"] = $target_filesurvey_letter ; 		
		$insert = $this->db->insert('vehicleD',$insertData);
		
		
		
		if (!$insert) {
			$error = $this->db->error();
			if($error['code'] == 1062)
			{
   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record already exists!</b></h4></div>');
			}
} else {
   //other logics here
   $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
}


		
		redirect('Vhlists');
		}
		catch(Exception $e)
		{
		}
	}
	
	
}
?>