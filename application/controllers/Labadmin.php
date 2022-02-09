<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(E_ALL);
class Labadmin extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index()
	{
		if(($this->session->userdata('loginUser')!=''))
		{
			$data['breadcomeName']='DashBoard';
			$this->load->view('includes/header',$data);
			$this->load->view('dashboard',$data);
			$this->load->view('includes/footer',$data);
		}
		else
		{
			redirect('login');
		}
	} 
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */