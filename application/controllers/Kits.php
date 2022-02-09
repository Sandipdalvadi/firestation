<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kits extends CI_Controller { 
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
		$this->load->view('kits',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM logistics_kits_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Kits');
	}
	public function save()
	{
		try 
		{
			$target_dir = "uploads/";
			$target_file = $target_dir .uniqid().'-'.basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		 $insertData  = array(	 				 
                     'logistics_name' => $_POST['logistics_name'],
                     'available_aspernorms' => $_POST['available_aspernorms'],
                     'image' => $target_file,
                     'description' => NULL,
                     'logistics_category' => $_POST['logistics_category'],
					 'status' => 1
					);
					
		//print_r($insertData);
		//die;
					
		$insert = $this->db->insert('logistics_kits_masters',$insertData);
		
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


		
		redirect('Kits');
		}
		catch(Exception $e)
		{
		}
	}
	
	/*function getlists()
	{
		$category_id=$_POST["category_id"];
		$str = '<option value="">Select Vehicle Type</option>';
		$sql = "SELECT * FROM logistics_kits_masters where vehicle_make_masters_id=$category_id";
		$result = $this->db->query($sql)->result_array();
		//while($row = mysql_fetch_array($result)) {
		foreach($result as $row){

			$str .='<option value='.$row["id"].'>'.$row["vehicle_type"].'</option>';
		}
		echo $str;
	}
	*/
	
}
?>
