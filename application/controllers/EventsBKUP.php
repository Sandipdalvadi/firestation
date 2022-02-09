<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Events_model');
		$this->load->model('Gallerycat_model');
		$this->load->model('Gallerysubcat_model');
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
		$data["country"]= $this->Events_model->get_all_events();
		//var_dump($data["country"]);die;
		$this->load->view('events',$data);
		$this->load->view('includes/footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');
		$data["cat"]= $this->Gallerycat_model->get_all_countries2();		
		$this->load->view('event-add',$data);
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');		
		$data['data'] = $this->Events_model->getdataById($id);			
		$this->load->view('event-edit',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkExists()
	{
		$data = $this->input->post();
		$checkresponse = $this->Events_model->checkExists($data['title']);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Category Name Already Exists");
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
		$checkresponse = $this->Events_model->checkExistsEdit($data['title'],$data['cid']);
		//$checkresponse = 0;
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Category Name Already Exists");
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
		//$this->Events_model->save($data);
		
		 if ( !empty($_FILES['userfile']['name'])  ) {
			
			 
			 if($this->siteURL() == "http://localhost/")
			 {
				$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/vasavi/uploads/events/';			
			 }
			 else{				
				//$config['upload_path']   = '/home/zzrula3fwzaw/public_html/appointment/admin/uploads/uploads/pat_documents/';
				$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/frontend/uploads/events/';						
			 }
			 
			 
			 
			 
			 $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|GIF|PNG|gif|png'; 
			 $config['max_size']      = 100000000; 
			// $config['max_width']     = 1024; 
			 //$config['max_height']    = 768;  
			 $this->load->library('upload', $config);
		 } 
		
		
		
		//print_r($_FILES);	
         if ( !empty($_FILES['userfile']['name'])  ) {
			
			 if ( ! $this->upload->do_upload('userfile') )
			 {
				 $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error); 
			header('Content-Type: application/json');
			echo json_encode($error);
			die;
			}
			  
		 }
		
		 
		 //print("<pre>");
		 //print_r($this->upload->data());
		// die;
		 
		
		$data = $this->input->post();
		if ( !empty($_FILES['userfile']['name']) )
		{
		$updata = $this->upload->data();		
		$reportsdata['image'] = $updata['file_name'];
		//$test_data['doc_org_name'] = $updata['client_name'];
		}
		
		//$this->db->insert('lab_patient', $test_data);
		//$this->db->where('id', $data['cid']);
		//$this->db->update('lab_appointments', $test_data);
		$reportsdata['title'] = $data['title'];
		$reportsdata['description'] = $data['description'];
		$reportsdata['event_type'] = $data['event_type'];
		$reportsdata['price'] = $data['price'];
		$reportsdata['extra_cost_per_person'] = $data['extra_cost_per_person'];
		$reportsdata['is_deleted'] = 'N';


		$daterange = explode("-",$data["daterange"]);
		
		$start_date = $daterange[0];
		$start_date = explode("/",trim($start_date));
		$reportsdata["start_date"] = $start_date[2]."-".$start_date[0].'-'.$start_date[1];
		
		$end_date = $daterange[1];
		$end_date = explode("/",trim($end_date));
		$reportsdata["end_date"] = $end_date[2]."-".$end_date[0].'-'.$end_date[1];
		
		$this->db->insert('events', $reportsdata);
		$response = array("status"=>1,"msg"=>"Success");
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	function siteURL() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . '/';
    return $protocol . $domainName;
}
	public function update()
	{
		$data = $this->input->post();
		//$this->Events_model->update($data);
				 if ( !empty($_FILES['userfile']['name'])  ) {
			
			 
			 if($this->siteURL() == "http://localhost/")
			 {
				$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/vasavi/uploads/events/';			
			 }
			 else{				
				//$config['upload_path']   = '/home/zzrula3fwzaw/public_html/appointment/admin/uploads/uploads/pat_documents/';
				$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/frontend/uploads/events/';						
			 }
			 
			 
			 
			 
			 $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|GIF|PNG|gif|png'; 
			 $config['max_size']      = 100000000; 
			// $config['max_width']     = 1024; 
			 //$config['max_height']    = 768;  
			 $this->load->library('upload', $config);
		 } 
		
		
		
		//print_r($_FILES);	
         if ( !empty($_FILES['userfile']['name'])  ) {
			
			 if ( ! $this->upload->do_upload('userfile') )
			 {
				 $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error); 
			header('Content-Type: application/json');
			echo json_encode($error);
			die;
			}
			  
		 }
		
		 
		 //print("<pre>");
		 //print_r($this->upload->data());
		// die;
		 
		
		$data = $this->input->post();
		$this->db->where('id', $data['cid']);
		if ( !empty($_FILES['userfile']['name']) )
		{
		$updata = $this->upload->data();		
		$reportsdata['image'] = $updata['file_name'];
		//$test_data['doc_org_name'] = $updata['client_name'];
		}
		
		//$this->db->insert('lab_patient', $test_data);
		//$this->db->where('id', $data['cid']);
		//$this->db->update('lab_appointments', $test_data);
		$reportsdata['title'] = $data['title'];
		$reportsdata['description'] = $data['description'];
		$reportsdata['event_type'] = $data['event_type'];
		$reportsdata['price'] = $data['price'];
		$reportsdata['extra_cost_per_person'] = $data['extra_cost_per_person'];
		$reportsdata['is_deleted'] = 'N';


		$daterange = explode("-",$data["daterange"]);
		
		$start_date = $daterange[0];
		$start_date = explode("/",trim($start_date));
		$reportsdata["start_date"] = $start_date[2]."-".$start_date[0].'-'.$start_date[1];
		
		$end_date = $daterange[1];
		$end_date = explode("/",trim($end_date));
		$reportsdata["end_date"] = $end_date[2]."-".$end_date[0].'-'.$end_date[1];		
		$this->db->update('events', $reportsdata);
		$response = array("status"=>1,"msg"=>"Success");
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Events_model->changeStatus($id);
		redirect('Galleryimage');
	}
}
