<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotaallotmentadd extends CI_Controller { 
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
		$this->load->view('quotaallotmentadd',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Quotaallotmentadd');
	}
	public function save()
	{
		try 
		{

		if( $_POST['id'] != 0 )
		{
			$insertData  = array(
	 				 'allotments_type' => 'additional',
                     'vehicle_number' => $_POST['vehicle_number'],
                     'quota_liters' => $_POST['quota_liters'],
					 'status' => 2
					);
					
					
			$this->db->where('id', $_POST['id']);
			$insert = $this->db->update('fuel_quota_allotments', $insertData);
	
		}
		else
		{
		$insertData  = array(
	 				 'allotments_type' => 'additional',
                     'vehicle_number' => $_POST['vehicle_number'],
                     'quota_liters' => $_POST['quota_liters'],
					 'status' => 2
					);
				//$update_status = insert_data('vehicle_allotment', $insert);
				$insert = $this->db->insert('fuel_quota_allotments',$insertData);
		}		
				
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


		
		redirect('Quotaallotmentadd');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */