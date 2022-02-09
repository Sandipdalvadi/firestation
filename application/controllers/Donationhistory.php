<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donationhistory extends CI_Controller {

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
		$sql = "select a.* , b.item_name, b.txn_id,b.payment_currency from orders a LEFT JOIN payment b ON a.id=b.order_id where category='Donation' or category='Registration and Donation' or category='Event and Donation' or category='Paid membership and Donation' or category='Free membership and Donation' order by a.id desc ";
		$data["data"] = $this->db->query($sql)->result_array();
		//var_dump($data["country"]);die;
		$this->load->view('donationhistory',$data);
		$this->load->view('includes/footer');
	}
	
}
