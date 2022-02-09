<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialoffers extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Specialoffers_model');
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
		$data["country"]= $this->Specialoffers_model->get_all_offers();
		//var_dump($data["country"]);die;
		$this->load->view('specialoffers',$data);
		$this->load->view('includes/footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');		
		$this->load->view('specialoffers-add');
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data['data'] = $this->Specialoffers_model->getdataById($id);		
		$this->load->view('specialoffers-edit',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkcouponcode()
	{
		$data = $this->input->post();
		$checkresponse = $this->Specialoffers_model->checkExists($data['coupon_code']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Coupon Code already exists");
		}
		else
		{
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	public function checkcouponcodeedit()
	{
		$data = $this->input->post();
		$checkresponse = $this->Specialoffers_model->checkExistsEdit($data['coupon_code'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Coupon Code already exists");
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
		$checkresponse = $this->Specialoffers_model->checkExists($data['coupon_code']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Coupon Code already exists");
		}
		else
		{
			//check coupon amount not exceed original amount.
			if($_REQUEST["discount_mode"] == "PERCENTAGE" )
			{
				if( $_REQUEST["discount_value"] >=100 )
				{
					$response = array("status"=>2,"msg"=>"Discount Value should be less than 100%");
					header('Content-Type: application/json');
					echo json_encode($response);
					die;
				}
			}
			else
			{
				$sql = "select * from site_config";
				$row = $this->db->query($sql)->row_array();
				$reg_amount = $row["registration_amount"];
				if( $reg_amount <= $_REQUEST["discount_value"])
				{
					$response = array("status"=>2,"msg"=>"Discount Value should be less than USD ".$reg_amount);
					header('Content-Type: application/json');
					echo json_encode($response);
					die;
				}
			}
			$this->Specialoffers_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	public function update()
	{
		$data = $this->input->post();
		$checkresponse = $this->Specialoffers_model->checkExistsEdit($data['coupon_code'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Coupon Code already exists");
		}
		else
		{
			
			//check coupon amount not exceed original amount.
			if($_REQUEST["discount_mode"] == "PERCENTAGE" )
			{
				if( $_REQUEST["discount_value"] >=100 )
				{
					$response = array("status"=>2,"msg"=>"Discount Value should be less than 100%");
					header('Content-Type: application/json');
					echo json_encode($response);
					die;
				}
			}
			else
			{
				$sql = "select * from site_config";
				$row = $this->db->query($sql)->row_array();
				$reg_amount = $row["registration_amount"];
				if( $reg_amount <= $_REQUEST["discount_value"])
				{
					$response = array("status"=>2,"msg"=>"Discount Value should be less than USD ".$reg_amount);
					header('Content-Type: application/json');
					echo json_encode($response);
					die;
				}
			}
			$this->Specialoffers_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
			
			$this->Specialoffers_model->update($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Specialoffers_model->changeStatus($id);
		redirect('Specialoffers');
	}
}
