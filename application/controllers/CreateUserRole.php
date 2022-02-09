<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateUserRole extends CI_Controller { 
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
		$this->load->view('createuserroles',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function permissions()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('permissionsedit',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	public function showpermissions()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('permissionsedit',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	public function setpermission()
	{
		$data = $this->input->post();
		$sql = "select * from user_role_permissions where role_id='".$data["role_id"]."' and permission_id='".$data["permission_id"]."'";
		$num = $this->db->query($sql)->num_rows();
		if($num < 1 )
		{
			$mode = $data["mode"];
			$access = $data["access"];
			
			if($mode == "VIEW" )
			{
				$post_data["role_id"] = $data["role_id"];
				$post_data["permission_id"] = $data["permission_id"];				
				$post_data["view"] =  $access;
			}
			else if($mode == "ADD" )
			{
				$post_data["role_id"] = $data["role_id"];
				$post_data["permission_id"] = $data["permission_id"];
				$post_data["add"] =  $access;
			} 
			else if($mode == "EDIT" )
			{
				$post_data["role_id"] = $data["role_id"];
				$post_data["permission_id"] = $data["permission_id"];
				$post_data["edit"] =  $access;
			} 
			else if($mode == "DELETE" )
			{
				$post_data["role_id"] = $data["role_id"];
				$post_data["permission_id"] = $data["permission_id"];
				$post_data["delete"] =  $access;
			}
			$this->db->insert('user_role_permissions',$post_data);
		}
		else
		{
			$mode = $data["mode"];
			$access = $data["access"];
			
			if($mode == "VIEW" )
			{
				//$post_data["role_id"] = $data["role_id"];
				//$post_data["permission_id"] = $data["permission_id"];				
				$post_data["view"] =  $access;
			}
			else if($mode == "ADD" )
			{
				//$post_data["role_id"] = $data["role_id"];
				//$post_data["permission_id"] = $data["permission_id"];
				$post_data["add"] =  $access;
			} 
			else if($mode == "EDIT" )
			{
				//$post_data["role_id"] = $data["role_id"];
				//$post_data["permission_id"] = $data["permission_id"];
				$post_data["edit"] =  $access;
			} 
			else if($mode == "DELETE" )
			{
				//$post_data["role_id"] = $data["role_id"];
				//$post_data["permission_id"] = $data["permission_id"];
				$post_data["delete"] =  $access;
			}
			//$this->db->insert('user_role_permissions',$post_data);
			$this->db->update('user_role_permissions',$post_data,array('role_id' => $data["role_id"],'permission_id'=>$data["permission_id"]));
		}
		
		
		echo "success";die;
	}
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM user_role_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('CreateUserRole');
	}
	public function save()
	{
		try 
		{

	
	 $insertData  = array(	 				 
                     'name' => $_POST['name'],
					  'status' => 1
					);
					
		$insert = $this->db->insert('user_role_masters',$insertData);
		
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


		
		redirect('CreateUserRole');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */