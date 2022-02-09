<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ExternalClient_model');
		$this->load->model('Country_model');
		$this->load->model('State_model');
		$this->load->model('District_model');
		$this->load->model('City_model');
		$this->load->model('Locality_model');
		$this->load->model('Adminusers_model');
		if(($this->session->userdata('loginUser')!=''))
		{
			
		}
		else
		{
			redirect('login');
		}		
		

//databasse changes.
//ALTER TABLE `lab_external_clients` ADD `country_id` INT NOT NULL AFTER `address`, ADD `state_id` INT NOT NULL AFTER `country_id`, ADD `district_id` INT NOT NULL AFTER `state_id`, ADD `city_id` INT NOT NULL AFTER `district_id`, ADD `locality_id` INT NOT NULL AFTER `city_id`;
//ALTER TABLE `lab_external_clients` ADD `email` VARCHAR(255) NULL AFTER `name`;		
		 
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
		$data["externaleclients"]= $this->Adminusers_model->get_all_users();
		$data["country"]= $this->Country_model->get_all_countries();
		//var_dump($data["country"]);die;
		$this->load->view('adminuser',$data);
		$this->load->view('includes/footer');
	}
	public function SearchAgents()
	{
		$data["externaleclients"]= $this->Adminusers_model->get_all_users_location();
		$html = $this->load->view('agent-ajax',$data,TRUE);
		echo $html;
		die;
	}
	
	
	
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$data["country"]= $this->Country_model->get_all_countries();
		$this->load->view('includes/leftmenu');		
		$this->load->view('adminuser-add',$data);
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data['data'] = $this->Adminusers_model->getdataById($id);
		$data["country"]= $this->Country_model->get_all_countries();
		$data["state"]= $this->State_model->get_all_state_by_countries($data['data']['country_id']);
		$data["district"]= $this->District_model->get_all_dis_by_stateid($data['data']['state_id']);
		$data["city"]= $this->City_model->get_all_city_by_disid($data['data']['district_id']);
		$data["locality"]= $this->Locality_model->get_all_locality_by_cityid($data['data']['city_id']);		
		$this->load->view('adminusert-edit',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkemail()
	{
		$data = $this->input->post();
		$checkresponse = $this->Adminusers_model->checkemailExists($data['email_id']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Email ID already exists");
		}
		else
		{
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	public function checkmobile()
	{
		$data = $this->input->post();
		$checkresponse = $this->Adminusers_model->checkmobileExists($data['mobile']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Mobile Number already exists");
		}
		else
		{
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	public function checkclientedit()
	{
		$data = $this->input->post();
		$checkresponse = $this->ExternalClient_model->checkExistsEdit($data['name'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"External Client Name already exists");
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
		$checkresponse = $this->Adminusers_model->checkemailExists($data['email_id']);
		$checkresponse1 = $this->Adminusers_model->checkmobileExists($data['mobile']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"EMAIL ID already exists");
		}
		else if($checkresponse1 >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Mobile already exists");
		}
		else
		{
			$this->Adminusers_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	public function update()
	{
		$data = $this->input->post();
		$this->Adminusers_model->update($data);
			$response = array("status"=>1,"msg"=>"Success");
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Adminusers_model->changeStatus($id);
		redirect('Adminusers');
	}
}
