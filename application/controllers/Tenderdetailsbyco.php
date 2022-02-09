<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenderdetailsbyco extends CI_Controller { 
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
		$this->load->view('tenderdetailsbyco',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM description_by_vehicle_type_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Tenderdetailsbyco');
	}
	public function save()
	{
		try 
		{
		$target_dir = "uploads/";
$target_filee_tender_copy = $target_dir .uniqid().'-'. basename($_FILES["e_tender_copy"]["name"]);

$target_filefinal_spc_copy = $target_dir .uniqid().'-'.  basename($_FILES["final_spc_copy"]["name"]);

$target_filesupply_order = $target_dir .uniqid().'-'.  basename($_FILES["supply_order"]["name"]);

if (move_uploaded_file($_FILES["e_tender_copy"]["tmp_name"], $target_filee_tender_copy)) {
}

if (move_uploaded_file($_FILES["final_spc_copy"]["tmp_name"], $target_filefinal_spc_copy)) {
}


if (move_uploaded_file($_FILES["supply_order"]["tmp_name"], $target_filesupply_order)) {
}
	
	 $insertData  = array(	 				 
                     'financial_year' => $_POST['financial_year'],
					  'tender_type' => $_POST['tender_type'],
					  'tender_date' => $_POST['tender_date'],
					  'rc_number' => $_POST['rc_number'],
					  'tender_number' => $_POST['tender_number'],
					   'supply_order_number' => $_POST['supply_order_number'],
					   'title' => $_POST['title'],
					   'item_name' => $_POST['item_name'],
					   'qty' => $_POST['qty'],
					   'e_tender_copy' => $target_filee_tender_copy,
					 'final_spc_copy' => $target_filefinal_spc_copy,
					 'supply_order' => $target_filesupply_order,
					   'updated_by' => $_SESSION['name']
					);
					
		$insert = $this->db->insert('tenders_details',$insertData);
		
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


		
		redirect('Tenderdetailsbyco');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */