<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lciemployees extends CI_Controller { 
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
		$this->load->view('lciemp',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM logistics_licofficers_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Lciemployees');
	}
	public function save()
	{
		try 
		{
		$insertData  = array(	 				 
                     'lci_officer' => $_POST['lci_officer'],
					 'rank' => $_POST['rank'],
					 'status' => 1
					);
					
		$insert = $this->db->insert('logistics_licofficers_masters',$insertData);
		
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


		
		redirect('Lciemployees');
		}
		catch(Exception $e)
		{
		}
	}
	
	function getlists()
	{
		$category_id=$_POST["category_id"];
		$str = '<option value="">Select Vehicle Type</option>';
		$sql = "SELECT * FROM logistics_licofficers_masters where vehicle_make_masters_id=$category_id";
		$result = $this->db->query($sql)->result_array();
		//while($row = mysql_fetch_array($result)) {
		foreach($result as $row){

			$str .='<option value='.$row["id"].'>'.$row["vehicle_type"].'</option>';
		}
		echo $str;
	}
}
?>
