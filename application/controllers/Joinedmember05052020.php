<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Joinedmember extends CI_Controller {

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
		$sql = "select * from admin_users where role='Member' order by id desc ";
		$data["data"] = $this->db->query($sql)->result_array();
		//var_dump($data["country"]);die;
		$this->load->view('joinedmember',$data);
		$this->load->view('includes/footer');
	}
	
	public function changestatus($id,$status){
		
		$sql = "update admin_users set status ='".$status."' where id='".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata('message', 'Member Status Updated Successfully');
		redirect("Joinedmember");
		
	}
	public function view($id)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');
		
		$this->load->helper('url');
	
		$data = array();
		$sql = "select * from admin_users where id = '".$id."'";
		$data['profile'] = $this->db->query($sql)->row_array();
		
		$sql = "select * from child_details where user_id = '".$id."'";
		$data['child'] = $this->db->query($sql)->result_array();
		//print_r($data['child']);die;
		$data["no_child"] = count($data['child']); 
		$this->load->view('viewjoinedmember',$data);
		$this->load->view('includes/footer');
	}
	public function update($id,$status){
		
		$sql = "update admin_users set status ='".$_REQUEST['status']."' where id='".$_REQUEST['id']."'";
		$this->db->query($sql);
		$this->session->set_flashdata('message', 'Member Status Updated Successfully');
		redirect("Joinedmember");
		
	}
	
}
