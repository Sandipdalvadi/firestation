<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallertsubcat extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
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
		$sql = "select a.*,b.title as parenttitle from gallery_category a INNER JOIN gallery_category b ON b.id=a.parent_id and a.is_deleted='N' order by a.title   ";
		$data["subcat"]= $this->db->query($sql)->result_array();
		$this->load->view('gallerysubcat',$data);
		$this->load->view('includes/footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data["cat"]= $this->Gallerycat_model->get_all_countries2();		
		$this->load->view('gallerysubcat-add',$data);
		$this->load->view('includes/footer');
	}
	
	public function edit($id=null)
	{
		$this->load->helper('url');
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu');	
		$data['data'] = $this->Gallerycat_model->getdataById($id);
$data["cat"]= $this->Gallerycat_model->get_all_countries2();		
		$this->load->view('gallerysubcat-edit',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	public function checkExists()
	{
		$data = $this->input->post();
		$checkresponse = $this->Gallerysubcat_model->checkExists($data['title'],$data["parent_id"]);
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
	
	public function checkExistsEdit()
	{
		$data = $this->input->post();
		$checkresponse = $this->Gallerysubcat_model->checkExistsEdit($data['title'],$data['cid'],$data['parent_id']);
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
		$checkresponse = $this->Gallerysubcat_model->checkExists($data['title'],$data["parent_id"]);
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Category Name Already Exists ");
		}
		else
		{
			$this->Gallerycat_model->save($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	public function update()
	{
		$data = $this->input->post();
		$checkresponse = $this->Gallerycat_model->checkExistsEdit($data['title'],$data['cid'],$data['parent_id']);
		//$checkresponse = 0;
		if($checkresponse >= 1 )
		{
			$response = array("status"=>0,"msg"=>"Category Name Already Exists ");
		}
		else
		{
			$this->Gallerycat_model->update($data);
			$response = array("status"=>1,"msg"=>"Success");
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}
	
	
	
	
	
	public function status($id=null)
	{
		$this->Gallerycat_model->changeStatus($id);
		redirect('Gallertsubcat');
	}
}
