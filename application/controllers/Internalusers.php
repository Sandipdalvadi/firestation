<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internalusers extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Staff_model');
if(($this->session->userdata('loginUser')!=''))
		{
			//get permission from database			
			$sql = "select * from lab_permissions where module IN (1,2,4,5) and role='".$this->session->userdata('loginType')."' and view = 1";
			$permissions = $this->db->query($sql)->row_array();
			$this->permissions = $permissions;
			$this->load->vars('permissions', $permissions);
			//print_r($data['permissions']);
			//die;
		}
		else
		{
			redirect('login');
		}				
		 
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');
		$data["country"]= $this->Staff_model->get_all_countries4();
		//var_dump($data["country"]);die;
		//$this->load->view('adminsupermem',$data);
		
		if($this->permissions['view'] == 1 )
		{
			
			$sql = "select * from lab_permissions where module IN (1,2,4,5) and role='".$this->session->userdata('loginType')."'";
			$result =  $this->db->query($sql)->result_array();
			$role = 'NoRole';
			$add = 'NoAdd';
			$edit = array();
			$delete = array();
			foreach( $result as $key=> $value )
			{
				if($value["view"] == 1 && $value["module"] ==1 )
				{
					$role.= ",Staff";
				}
				else if($value["view"] == 1 && $value["module"] ==5 )
				{
					$role.= ",Treasurer";
				}
				else if($value["view"] == 1 && $value["module"] ==2 )
				{
					$role.= ",Admin";
				}
				else if($value["view"] == 1 && $value["module"] ==4 )
				{
					$role.= ",Superadmin";
				}
				
				//add permission.
				if($value["add"] == 1 && $value["module"] ==1 )
				{
					$add.= ",Staff";
				}
				else if($value["add"] == 1 && $value["module"] ==5 )
				{
					$add.= ",Treasurer";
				}
				else if($value["add"] == 1 && $value["module"] ==2 )
				{
					$add.= ",Admin";
				}
				else if($value["add"] == 1 && $value["module"] ==4 )
				{
					$add.= ",Superadmin";
				}
				
				
				//edit permission.
				if($value["edit"] == 1 && $value["module"] ==1 )
				{
					$edit[] =  "Staff";
				}
				else if($value["edit"] == 1 && $value["module"] ==5 )
				{
					$edit[] = "Treasurer";
				}
				else if($value["edit"] == 1 && $value["module"] ==2 )
				{
					$edit[] = "Admin";
				}
				else if($value["edit"] == 1 && $value["module"] ==4 )
				{
					$edit[] =  "Superadmin";
				}
				
				
				
				//delete permission.
				if($value["delete"] == 1 && $value["module"] ==1 )
				{
					$delete[] =  "Staff";
				}
				else if($value["delete"] == 1 && $value["module"] ==5 )
				{
					$delete[] = "Treasurer";
				}
				else if($value["delete"] == 1 && $value["module"] ==2 )
				{
					$delete[] = "Admin";
				}
				else if($value["delete"] == 1 && $value["module"] ==4 )
				{
					$delete[] =  "Superadmin";
				}
				
				
				
			}
			$role_array = explode(",",$role);
			$data['addpermissions'] = explode(",",$add);
			$data['editpermissions'] = $edit;
			$data['deletepermissions'] = $delete;
			$data['users'] = $this->db->select("*")->from("admin_users")->where("is_deleted", 'N')->where_in('role',$role_array)->get()->result_array();
			$this->load->view('internalusers',$data);
		}
		else{
		$this->load->view('nopermissions',$data);
		}
		
		
		
		$this->load->view('includes/footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');		
		//$this->load->view('adminsupermem-add');
		if($this->permissions['add'] == 1 )
		{
			$sql = "select * from lab_permissions where module IN (1,2,4,5) and role='".$this->session->userdata('loginType')."'";
			$result =  $this->db->query($sql)->result_array();
			$role = 'NoRole';
			$add = array();
			foreach( $result as $key=> $value )
			{
				if($value["view"] == 1 && $value["module"] ==1 )
				{
					$role.= ",Staff";
				}
				else if($value["view"] == 1 && $value["module"] ==5 )
				{
					$role.= ",Treasurer";
				}
				else if($value["view"] == 1 && $value["module"] ==2 )
				{
					$role.= ",Admin";
				}
				else if($value["view"] == 1 && $value["module"] ==4 )
				{
					$role.= ",Superadmin";
				}
				
				//add permission.
				if($value["add"] == 1 && $value["module"] ==1 )
				{
					$add[] =  "Staff";
				}
				else if($value["add"] == 1 && $value["module"] ==5 )
				{
					$add[] = "Treasurer";
				}
				else if($value["add"] == 1 && $value["module"] ==2 )
				{
					$add[] = "Admin";
				}
				else if($value["add"] == 1 && $value["module"] ==4 )
				{
					$add[] =  "Superadmin";
				}
			}
			$role_array = explode(",",$role);
			$data['addpermissions'] = $add;
		$this->load->view('internalusers-add',$data);
		}
		else{
		$this->load->view('nopermissions',$data);
		}
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data['data'] = $this->Staff_model->getdataById($id);		
		//$this->load->view('adminsupermem-edit',$data);
		if($this->permissions['edit'] == 1 )
		{
			$sql = "select * from lab_permissions where module IN (1,2,4,5) and role='".$this->session->userdata('loginType')."'";
			$result =  $this->db->query($sql)->result_array();
			$role = 'NoRole';
			$edit = array();
			foreach( $result as $key=> $value )
			{
				if($value["view"] == 1 && $value["module"] ==1 )
				{
					$role.= ",Staff";
				}
				else if($value["view"] == 1 && $value["module"] ==5 )
				{
					$role.= ",Treasurer";
				}
				else if($value["view"] == 1 && $value["module"] ==2 )
				{
					$role.= ",Admin";
				}
				else if($value["view"] == 1 && $value["module"] ==4 )
				{
					$role.= ",Superadmin";
				}
				
				//edit permission.
				if($value["edit"] == 1 && $value["module"] ==1 )
				{
					$edit[] =  "Staff";
				}
				else if($value["edit"] == 1 && $value["module"] ==5 )
				{
					$edit[] = "Treasurer";
				}
				else if($value["edit"] == 1 && $value["module"] ==2 )
				{
					$edit[] = "Admin";
				}
				else if($value["edit"] == 1 && $value["module"] ==4 )
				{
					$edit[] =  "Superadmin";
				}
			}
			$role_array = explode(",",$role);
			$data['addpermissions'] = $edit;
			
		$this->load->view('internalusers-edit',$data);
		}
		else{
		$this->load->view('nopermissions',$data);
		}
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkExists()
	{
		$data = $this->input->post();
		$checkresponse = $this->Staff_model->checkExists($data['email']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Email already exists");
		}
		else
		{
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	public function checkcountryedit()
	{
		$data = $this->input->post();
		$checkresponse = $this->Staff_model->checkExistsEdit($data['name'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"IC or PP name already exists");
		}
		else
		{
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	public function save()
	{
		$data = $this->input->post();
		$checkresponse = $this->Staff_model->checkExists($data['email']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Email already exists");
		}
		else
		{
			$this->Staff_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	public function update()
	{
		$data = $this->input->post();
		//$checkresponse = $this->Staff_model->checkExistsEdit($data['name'],$data['cid']);
		$checkresponse = 0;
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Email already exists");
		}
		else
		{
			$this->Staff_model->update($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Staff_model->changeStatus($id);
		redirect('Internalusers');
	}
}
