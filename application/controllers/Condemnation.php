<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Condemnation extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Doctor_model');
		
		if(($this->session->userdata('loginUser')!=''))
		{
			
			//redirect('/');
		}
		else
		{
			redirect('login');
		}
	}
	
	public function index()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('condemnation-lists',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "UPDATE vehicleD SET condemnation = 1  WHERE  vhId = ".$id."";
		
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Moved to Condemination Sucessfully !</b></h4></div>');
		 redirect('Condemnation');
	}
	
}
?>
