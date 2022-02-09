<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

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
			$sql = "select * from lab_permissions where module=4 and role='".$this->session->userdata('loginType')."'";
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
		$this->load->view('adminsupermem',$data);
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
		$this->load->view('adminsupermem-add');
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
		$this->load->view('adminsupermem-edit',$data);
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
		redirect('Superadmin');
	}
}
