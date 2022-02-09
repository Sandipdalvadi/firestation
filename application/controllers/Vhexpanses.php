<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vhexpanses extends CI_Controller { 
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
		$this->load->view('vhexpanses',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM fsname_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Vhexpanses');
	}
	public function save()
	{
		try 
		{
			//get district of user
			
			
		/*$insertData  = array(	 				 
                     'fs_name' => $_POST['fs_name'],
					 'unit_id' => $this->session->userdata('unit'),
					 'status' => 1
					);
					
		$insert = $this->db->insert('fsname_masters',$insertData);*/
		
		
		 $insertData  = array(
	 				 
                     'vhno' => $_POST['vehicleno'],
					  'financial_year' => $_POST['financial_year'],
					   'amount' => $_POST['amount'],
					   'updated_by' => $_SESSION['name']
					);
				$insert = $this->db->insert('vehicle_expanses',$insertData);;//insert_data('vehicle_expanses', $insert);
				
				
		
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


		
		redirect('Vhexpanses');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */