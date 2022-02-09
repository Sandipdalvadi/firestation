<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Gallerycat_model');
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
		$sql = "select * from paypal_config order by id asc limit 1 ";
		$data["data"] = $this->db->query($sql)->row_array();
		//var_dump($data["country"]);die;
		$this->load->view('paypal',$data);
		$this->load->view('includes/footer');
	}
	
	public function save()
	{
		$sql = "update paypal_config SET paypal_live_test_mode='".$_REQUEST['paypal_live_test_mode']."'
										,paypal_business_email_live='".$_REQUEST['paypal_business_email_live']."'
										,paypal_business_email_sandbox='".$_REQUEST['paypal_business_email_sandbox']."'
										,paypal_url_live='".$_REQUEST['paypal_url_live']."'
										,paypal_url_sandbox='".$_REQUEST['paypal_url_sandbox']."'
										where id=1 ";
		$this->session->set_flashdata('message', 'Paypal Setttings  Updated Successfully');
		$this->db->query($sql);
		redirect('Paypal');
	}
	
}
