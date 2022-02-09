<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {

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
	 
	 public function set()
	 {
		 //print("<pre>");
		 //print_r($_REQUEST);
		 $sql = "update lab_permissions SET `view`='0',`add`='0',`edit`='0',`delete`='0',`download`=0 where role='Staff' ";
		 $this->db->query($sql);
		 foreach($_REQUEST['staff'] as $key => $value){
			 foreach( $value as $key2 =>$value2){
				$sql = "update lab_permissions SET `$key2` ='".$value2."' where role='Staff' and module='".$key."'";
				$this->db->query($sql); 
			 }
		 }
		 
		 
		 $sql = "update lab_permissions SET `view`='0',`add`='0',`edit`='0',`delete`='0',`download`=0 where role='Admin' ";
		 $this->db->query($sql);
		 foreach($_REQUEST['admin'] as $key => $value){
			 foreach( $value as $key2 =>$value2){
				$sql = "update lab_permissions SET `$key2` ='".$value2."' where role='Admin' and module='".$key."'";
				$this->db->query($sql); 
			 }
		 }
		 
		 
		 $sql = "update lab_permissions SET `view`='0',`add`='0',`edit`='0',`delete`='0',`download`=0 where role='Superadmin' ";
		 $this->db->query($sql);
		 foreach($_REQUEST['superadmin'] as $key => $value){
			 foreach( $value as $key2 =>$value2){
				$sql = "update lab_permissions SET `$key2` ='".$value2."' where role='Superadmin' and module='".$key."'";
				$this->db->query($sql); 
			 }
		 }
		 
		 
		 $sql = "update lab_permissions SET `view`='0',`add`='0',`edit`='0',`delete`='0',`download`=0 where role='Treasurer' ";
		 $this->db->query($sql);
		 foreach($_REQUEST['Treasurer'] as $key => $value){
			 foreach( $value as $key2 =>$value2){
				$sql = "update lab_permissions SET `$key2` ='".$value2."' where role='Treasurer' and module='".$key."'";
				$this->db->query($sql); 
			 }
		 }
		 
		 
		 
		 $this->session->set_flashdata('message', 'Permission Updated Successfully');
		 redirect('Permissions');
		 //die;
	 }
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');
		//$data["country"]= $this->Staff_model->get_all_countries2();
		$sql = "select * from lab_permissions order by id asc";
		$data["permission"]= $this->db->query($sql)->result_array();
		//print_r($data["permission"]);
		//var_dump($data["country"]);die;
		$this->load->view('permissions',$data);
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
	
	
	
	public function checkcountry()
	{
		$data = $this->input->post();
		$checkresponse = $this->Staff_model->checkExists($data['ic_or_pp_name_username']);
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
		$checkresponse = $this->Staff_model->checkExists($data['name']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"IC or PP name already exists");
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
		$checkresponse = $this->Staff_model->checkExistsEdit($data['name'],$data['cid']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"IC or PP name already exists");
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
