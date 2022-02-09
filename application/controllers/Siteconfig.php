<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteconfig extends CI_Controller {

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
		$sql = "select * from site_config order by id asc limit 1 ";
		$data["data"] = $this->db->query($sql)->row_array();
		//var_dump($data["country"]);die;
		$this->load->view('siteconfig',$data);
		$this->load->view('includes/footer');
	}
	
	public function save()
	{
		$sql = "update site_config SET 
		registration_amount='".$_REQUEST['registration_amount']."'
		,paypal_item_id_reg_only='".$_REQUEST['paypal_item_id_reg_only']."'
		,paypal_item_desc_reg_only='".$_REQUEST['paypal_item_desc_reg_only']."'
		,paypal_item_id_donation_only='".$_REQUEST['paypal_item_id_donation_only']."'
		,paypal_item_desc_donation_only='".$_REQUEST['paypal_item_desc_donation_only']."'
		,paypal_item_id_donation_reg_only='".$_REQUEST['paypal_item_id_donation_reg_only']."'
		,paypal_item_desc_donation_reg_only='".$_REQUEST['paypal_item_desc_donation_reg_only']."'
		,paypal_item_desc_event_only='".$_REQUEST['paypal_item_desc_event_only']."'
		,paypal_item_id_event_only='".$_REQUEST['paypal_item_id_event_only']."'
		,paypal_item_id_event_member_only='".$_REQUEST['paypal_item_id_event_member_only']."'
		,paypal_item_desc_event_member_only='".$_REQUEST['paypal_item_desc_event_member_only']."'
		,paypal_item_desc_event_donation_only='".$_REQUEST['paypal_item_desc_event_donation_only']."'
		,paypal_item_id_event_donation_only='".$_REQUEST['paypal_item_id_event_donation_only']."'
		,paypal_item_desc_event_donation_mem_only='".$_REQUEST['paypal_item_desc_event_donation_mem_only']."'
		,paypal_item_id_event_donation_mem_only='".$_REQUEST['paypal_item_id_event_donation_mem_only']."'
										where id=1 ";
		$this->session->set_flashdata('message', 'Setttings  Updated Successfully');
		$this->db->query($sql);
		redirect('Siteconfig');
	}
	
}
