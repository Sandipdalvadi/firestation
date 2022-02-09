<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
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
		$this->load->view('changepassword');
		$this->load->view('includes/footer');
	}	
	public function changeit()
	{
		
		$sql = "select count(*) as cnt from  admin_users where id='".$this->session->userdata('loginUser')."' and password='".md5($_REQUEST['old_password'])."'";
		$records = $this->db->query($sql)->row_array();
		$totalRecords = $records['cnt'];
		if($totalRecords  >= 1 )
		{
			$sql = "update admin_users SET password='".md5($_REQUEST['password'])."' where id='".$this->session->userdata('loginUser')."'";
			$this->db->query($sql);
			$response = array("status"=>1,"msg"=>"Password Changed successfully");
		}
		else{
			
			
			$response = array("status"=>0,"msg"=>"Old Password Wrong");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;	
	
	}
	
	
}
