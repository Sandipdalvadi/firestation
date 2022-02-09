<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UnittofsAllotment extends CI_Controller { 
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
		$this->load->view('unittofsallotment',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('UnittofsAllotment');
	}
	public function save()
	{
		try 
		{
		/*$insertData  = array(	 				 
                     'name' => $_POST['name'],
					 'status' => 1
					);
					
		$insert = $this->db->insert('employee_rank_masters',$insertData);*/
		
		$target_dir = "uploads/";
$target_fileorder_upload= $target_dir .uniqid().'-'. basename($_FILES["order_upload"]["name"]);

if (move_uploaded_file($_FILES["order_upload"]["tmp_name"], $target_fileorder_upload)) {

    
}
		$insertData  = array(
	 				 
                      'vehicleno' => $_POST['vehicleno'],
					 'allotment_no' => $_POST['allotment_no'],
					 'fs_to' => $_POST['fs'],
					 'unit_from' => $_POST['unit_from'],
					 'issue_date' => $_POST['issue_date'],
					 'remarks' => $_POST['remarks'],
					  'order_upload' =>   $target_fileorder_upload,
					 'status' => 1
					);
				//$update_status = insert_data('vehicle_allotment', $insert);
				$insert = $this->db->insert('vehicle_allotment',$insertData);
				
				
				/*$vehicleD = mysql_query("UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'");
				
				$sql = "UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'";
				$this->db->query($sql);*/
				
		
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


		
		redirect('UnittofsAllotment');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */