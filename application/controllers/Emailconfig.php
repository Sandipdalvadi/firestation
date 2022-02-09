<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailconfig extends CI_Controller {

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
		$sql = "select * from email_config order by id asc limit 1 ";
		$data["data"] = $this->db->query($sql)->row_array();
		//var_dump($data["country"]);die;
		$this->load->view('emailconfig',$data);
		$this->load->view('includes/footer');
	}
	
	public function save()
	{
		$sql = "update email_config SET 
		from_email='".$_REQUEST['from_email']."'
		,to_email='".$_REQUEST['to_email']."'
		,cc_emails='".$_REQUEST['cc_emails']."'
		,registration_email_member='".$_REQUEST['registration_email_member']."'
		,registration_email_admin='".$_REQUEST['registration_email_admin']."'
		,paypal_success_transaction='".$_REQUEST['paypal_success_transaction']."'
		where id=1 ";
		$this->session->set_flashdata('message', 'Setttings  Updated Successfully');
		$this->db->query($sql);
		redirect('Emailconfig');
	}
	
}
