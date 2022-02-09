<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateUser extends CI_Controller { 
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
		$this->load->view('createusers',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM users  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('CreateUser');
	}
	public function save()
	{
		try 
		{

	
	 $insertData  =  array(
	 				 
                     'name' => $_POST['name'],
                     'mobile_no' => $_POST['mobile_no'],
                     // 'district' => $_POST['district'],
                      'fs_name' => $_POST['fs_name'],
                       'loginid' => $_POST['loginid'],
                     'login_role' => $_POST['login_role'],
                     'password' => $_POST['password'],
                     'verified_opt' => 1,
                     'user_type' => 1,
					 'status' => 1
					);
					
		$insert = $this->db->insert('users',$insertData);
		$insert_id = $this->db->insert_id();
		if(isset($_POST['district']) && is_array($_POST['district']) && !empty($_POST['district']) )
		{
			foreach($_POST['district'] as $key =>$value)
			{
				$dis["user_id"] = $insert_id ;
				$dis["district_id"] = $value;
				$this->db->insert('users_districts',$dis);
			}
		}
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


		
		redirect('CreateUser');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */