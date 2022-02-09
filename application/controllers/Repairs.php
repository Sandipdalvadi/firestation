<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repairs extends CI_Controller { 
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
		$this->load->view('repairs',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM vehicle_repairs  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Repairs');
	}
	
	public function viewdoc($id=null)
	{
		$data['breadcomeName']='DashBoard';
		$data["id"] = $id; 
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('repairsdocs',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	
	public function save()
	{
		try 
		{
			//get district of user
			
			$target_fileform63 = '';
			$target_filecompletion_report = '';
			$target_filestanding_order = '';
			$target_fileparticulars_of_vehicle = '';
			$target_filecheck_list = '';
			$target_filequoation = '';
			$target_filecomprative_report = '';
			$target_filework_order = '';
			$target_fileinvoice = '';
			$target_fileadvance_stamp_report = '';
			$target_filebank_details = '';
			$target_filecondemnation_on_proposal = '';
			
			if(!empty($_FILES["form63"]["name"]))
			{
			$target_dir = "uploads/";
			$target_fileform63 = $target_file = $target_dir .uniqid().'-'.basename($_FILES["form63"]["name"]);
			move_uploaded_file($_FILES["form63"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["completion_report"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filecompletion_report = $target_file = $target_dir .uniqid().'-'.basename($_FILES["completion_report"]["name"]);
			move_uploaded_file($_FILES["completion_report"]["tmp_name"], $target_file);
			}
			
			
			if(!empty($_FILES["standing_order"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filestanding_order = $target_file = $target_dir .uniqid().'-'.basename($_FILES["standing_order"]["name"]);
			move_uploaded_file($_FILES["standing_order"]["tmp_name"], $target_file);
			}
			
			if(!empty($_FILES["particulars_of_vehicle"]["name"]))
			{
			$target_dir = "uploads/";
			$target_fileparticulars_of_vehicle = $target_file = $target_dir .uniqid().'-'.basename($_FILES["particulars_of_vehicle"]["name"]);
			move_uploaded_file($_FILES["particulars_of_vehicle"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["check_list"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filecheck_list = $target_file = $target_dir .uniqid().'-'.basename($_FILES["check_list"]["name"]);
			move_uploaded_file($_FILES["check_list"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["quoation"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filequoation = $target_file = $target_dir .uniqid().'-'.basename($_FILES["quoation"]["name"]);
			move_uploaded_file($_FILES["quoation"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["comprative_report"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filecomprative_report = $target_file = $target_dir .uniqid().'-'.basename($_FILES["comprative_report"]["name"]);
			move_uploaded_file($_FILES["comprative_report"]["tmp_name"], $target_file);
			}
			
			
			
			if(!empty($_FILES["work_order"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filework_order = $target_file = $target_dir .uniqid().'-'.basename($_FILES["work_order"]["name"]);
			move_uploaded_file($_FILES["work_order"]["tmp_name"], $target_file);
			}
			
			
			
			
			
			if(!empty($_FILES["invoice"]["name"]))
			{
			$target_dir = "uploads/";
			$target_fileinvoice = $target_file = $target_dir .uniqid().'-'.basename($_FILES["invoice"]["name"]);
			move_uploaded_file($_FILES["invoice"]["tmp_name"], $target_file);
			}
			
			
			if(!empty($_FILES["advance_stamp_report"]["name"]))
			{
			$target_dir = "uploads/";
			$target_fileadvance_stamp_report = $target_file = $target_dir .uniqid().'-'.basename($_FILES["advance_stamp_report"]["name"]);
			move_uploaded_file($_FILES["advance_stamp_report"]["tmp_name"], $target_file);
			}
			
			
			
			if(!empty($_FILES["bank_details"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filebank_details = $target_file = $target_dir .uniqid().'-'.basename($_FILES["bank_details"]["name"]);
			move_uploaded_file($_FILES["bank_details"]["tmp_name"], $target_file);
			}
			
			
			if(!empty($_FILES["condemnation_on_proposal"]["name"]))
			{
			$target_dir = "uploads/";
			$target_filecondemnation_on_proposal = $target_file = $target_dir .uniqid().'-'.basename($_FILES["condemnation_on_proposal"]["name"]);
			move_uploaded_file($_FILES["condemnation_on_proposal"]["tmp_name"], $target_file);
			}
			
			
		$insertData  = array(
	 				 
                     'vehicle_number' => $_POST['vehicleno'],
					 'incharge' => $_POST['incharge'],
					 'repair_tpype' => $_POST['repair_tpype'],
					 'amount' => $_POST['amount'],
					 'expansestillDate' => $_POST['expansestillDate'],
					 'sanction_no' => $_POST['sanction_no'],
					 'budget' => $_POST['budget'],
					 'propsal_document' => $target_filepropsal_document,
					 'sanction_letter' => $target_filesanction_letter,
					 'form63' => $target_fileform63,
					 'completion_report' => $target_filecompletion_report,
					 'standing_order' => $target_filestanding_order,
					 'particulars_of_vehicle' => $target_fileparticulars_of_vehicle,
					 'check_list' => $target_filecheck_list,
					 'quoation' => $target_filequoation,
					 'comprative_report' => $target_filecomprative_report,
					 'work_order' => $target_filework_order,
					 'invoice' => $target_fileinvoice,
					 'advance_stamp_report' => $target_fileadvance_stamp_report,
					 'bank_details' => $target_filebank_details,
					 'condemnation_on_proposal' => $target_filecondemnation_on_proposal
					);
					
		$insert = $this->db->insert('vehicle_repairs',$insertData);
		
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


		
		redirect('Repairs');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */