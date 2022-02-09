<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Doctor_model');
		$this->load->model('Room_model');
if(($this->session->userdata('loginUser')!=''))
		{
			//get permission from database			
			$sql = "select * from lab_permissions where module=5 and role='".$this->session->userdata('loginType')."'";
			$permissions = $this->db->query($sql)->row_array();
			$this->permissions = $permissions;
			$this->load->vars('permissions', $permissions);
			//print_r($data['permissions']);
			//die;
			
			
			//get permission from database			
			$sql2 = "select * from lab_permissions where module=7 and role='".$this->session->userdata('loginType')."'";
			$permissions2 = $this->db->query($sql2)->row_array();
			$this->permissions_rooms = $permissions2;
			$this->load->vars('permissions_rooms', $permissions2);
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
		$data["country"]= $this->Doctor_model->get_all_countries();
		//var_dump($data["country"]);die;
		//$this->load->view('doctor',$data);
		if($this->permissions['view'] == 1 )
		{
		$this->load->view('doctor',$data);
		}
		else{
		$this->load->view('nopermissions',$data);
		}
		$this->load->view('includes/footer');
	}
	public function room()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');
		$data["country"]= $this->Doctor_model->get_all_countries();
		$data["room"]= $this->Room_model->get_all_countries();
		//var_dump($data["country"]);die;
		//$this->load->view('doctorroom',$data);
		if($this->permissions_rooms['view'] == 1 )
		{
		$this->load->view('doctorroom',$data);
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
		//$this->load->view('doctor-add');
		if($this->permissions['add'] == 1 )
		{
		$this->load->view('doctor-add');
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
		$data['data'] = $this->Doctor_model->getdataById($id);		
		//$this->load->view('doctor-edit',$data);
		if($this->permissions['edit'] == 1 )
		{
		$this->load->view('doctor-edit',$data);
		}
		else{
		$this->load->view('nopermissions',$data);
		}
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkcountry()
	{
		$data = $this->input->post();
		$checkresponse = $this->Doctor_model->checkExists($data['ic_or_pp_name_username']);
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
	
	public function checkcountryedit()
	{
		$data = $this->input->post();
		$checkresponse = $this->Doctor_model->checkExistsEdit($data['name'],$data['cid']);
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
		$checkresponse = $this->Doctor_model->checkExists($data['name']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"IC or PP name already exists");
		}
		else
		{
			$this->Doctor_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	public function assignroom()
	{
		$data = $this->input->post();
		$rooms = $data['rooms'];
		$arr = explode("$$$",$rooms);
		$sql = "update lab_doctors SET room='".$arr[1]."' where id='".$arr[0]."'";
		$this->db->query($sql);
		$response = array("status"=>1,"msg"=>"Success");
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	public function update()
	{
		$data = $this->input->post();
		$checkresponse = $this->Doctor_model->checkExistsEdit($data['name'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"IC or PP name already exists");
		}
		else
		{
			$this->Doctor_model->update($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Doctor_model->changeStatus($id);
		redirect('Doctor');
	}
}
