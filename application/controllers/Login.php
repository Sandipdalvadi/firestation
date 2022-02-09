<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(E_ALL);
class Login extends CI_Controller { 
	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
		
		
	}
	
	public function index()
	{
        $this->load->view('login');
	}
	
	public function forgotpwd1()
	{
	   
        $this->load->view('forgotpwd1');
	}
	
	
	
	public function check_forgotpwd()
	{
		
		$baseUrl=base_url();
		$user_access = $this->login_model->check_forgotpwd($baseUrl);
		json_encode($user_access);
		
		//print_r($user_access);die;
		if($user_access['resCode']==1){
			//redirect('categories');
			//redirect("Welcome");
			//redirect("/");
			$this->session->set_flashdata('error_message', "<div style='color:GREEN;font-size:20px;text-align:center'>Password sent to your regsitered mobile number</div>");
			redirect('login/forgotpwd1');
		}
		else
		{
			$this->session->set_flashdata('error_message', "<div style='color:RED;font-size:20px;text-align:center'>Invalid IC NUMBER !..</div>");
			redirect('login/forgotpwd1');
		}
	}
	
	
	
	
	public function check_login()
	{
		$baseUrl=base_url();
		$user_access = $this->login_model->check_login($baseUrl);
		json_encode($user_access);
		
		//print_r($user_access);die;
		if($user_access['resCode']==1){
			//redirect('categories');
			//redirect("Welcome");
			redirect("/");
		}
		else
		{
			$this->session->set_flashdata('error_message', "<div style='color:RED;font-size:20px;text-align:center'>Invalid Email or Password !..</div>");
			redirect('login');
		}
	}
	public function logout()
	{
		
		$emp_id=$this->session->userdata('loginUser');
		$login_id=$this->session->userdata('loginId');
		$user_access = $this->login_model->logout($login_id,$emp_id);
		redirect('/');
	}
	
	public function forgot()
	{
		$data['title'] = ucfirst('Forgot Password - Cable Billing System ');
		$this->load->view('forgot_password.php',$data);
	}
	
	public function check_forgot()
	{
		$user_access = $this->login_model->check_forgot();
		if($user_access=='0'){
				$data['title'] = ucfirst('Forgot Password - Cable Billing System ');
				$data['msg'] = "<div style='color:RED;font-size:20px;text-align:center'>Invalid Email / Mobile Number...</div>"; 
				$this->load->view('forgot_password.php',$data);
		}
		elseif($user_access=='1'){
				$data['title'] = ucfirst('Forgot Password - Cable Billing System ');
				$data['msg'] = "<div style='color:GREEN;font-size:20px;text-align:center'>Password Sent to your Mobile..</div>"; 
				$this->load->view('forgot_password.php',$data);
		}
	}
	
	public function register()
	{
		$baseUrl=base_url();
		$user_access = $this->login_model->register($baseUrl);
		echo json_encode($user_access);
		exit;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */