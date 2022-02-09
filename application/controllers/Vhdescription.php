<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vhdescription extends CI_Controller { 
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
		$this->load->view('vhdesc',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM description_by_vehicle_type_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Vhdescription');
	}
	public function save()
	{
		try 
		{
			$image1 = '';
			$image2 = '';
			$image3 = '';
			$image4 = '';
			if(!empty($_FILES["image1"]["name"]))
			{
			$target_dir = "uploads/";
			$image1 = $target_file = $target_dir .uniqid().'-'.basename($_FILES["image1"]["name"]);
			move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["image2"]["name"]))
			{
			$target_dir = "uploads/";
			$image2 = $target_file = $target_dir .uniqid().'-'.basename($_FILES["image2"]["name"]);
			move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["image3"]["name"]))
			{
			$target_dir = "uploads/";
			$image3 = $target_file = $target_dir .uniqid().'-'.basename($_FILES["image3"]["name"]);
			move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);
			}
			if(!empty($_FILES["image4"]["name"]))
			{
			$target_dir = "uploads/";
			$image4 = $target_file = $target_dir .uniqid().'-'.basename($_FILES["image4"]["name"]);
			move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file);
			}
			
		$insertData  = array(	 				 
                     'name' => $_POST['name'],
					 'image1' => $image1,
					 'image2' => $image2,
					 'image3' => $image3,
					 'image4' => $image4,					 
					 'status' => 1
					);
					
		$insert = $this->db->insert('description_by_vehicle_type_masters',$insertData);
		
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


		
		redirect('Vhdescription');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */