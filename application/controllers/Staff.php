<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Staff_model');
if(($this->session->userdata('loginUser')!=''))
		{
			
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
		$data["country"]= $this->Staff_model->get_all_countries2();
		//var_dump($data["country"]);die;
		$this->load->view('staff',$data);
		$this->load->view('includes/footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');		
		$this->load->view('staff-add');
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data['data'] = $this->Staff_model->getdataById($id);		
		$this->load->view('staff-edit',$data);
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
		//$checkresponse = $this->Staff_model->checkExistsEdit($data['name'],$data['cid']);
		$checkresponse = 0;
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
	
	public function save()
	{
		$data = $this->input->post();
		$checkresponse = $this->Staff_model->checkExists($data['email']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Email already exists ");
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
			$response = array("status"=>0,"msg"=>"Email already exists ");
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
		redirect('Staff');
	}
}
