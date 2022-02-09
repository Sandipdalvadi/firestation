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
		if($status=='Active')
		{
			//send mail saying that status is active
			//START EMAIL FUNCTIONALITY.
			 //$sql = "INSERT INTO email_verification SET email='".$_REQUEST['email']."',verification_code='".$random."'";
			 //$this->db->query($sql);
			 $sql = "select * from admin_users where id='".$id."'";
			 $row = $this->db->query($sql)->row_array();
			 $from = "info@vasavisociety.org";
			 $to = $row['email'];
			 $subject = "Your status is activated with vasavisociety.org";				 
			 
			 $message = "<b>Dear User,</b><br>Your Profile gets activated<br>Now you can login into the website ";
			 
			 $header = "From:".$from." \r\n";
			 //$header .= "Cc:afgh@somedomain.com \r\n";
			 $header .= "MIME-Version: 1.0\r\n";
			 $header .= "Content-type: text/html\r\n";         
			 $retval = mail ($to,$subject,$message,$header);
			//END EMAIL FUNCTIONALITY.
		}
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
		
		if($status=='Active')
		{
			//send mail saying that status is active
			//START EMAIL FUNCTIONALITY.
			 //$sql = "INSERT INTO email_verification SET email='".$_REQUEST['email']."',verification_code='".$random."'";
			 //$this->db->query($sql);
			 $sql = "select * from admin_users where id='".$id."'";
			 $row = $this->db->query($sql)->row_array();
			 $from = "info@vasavisociety.org";
			 $to = $row['email'];
			 $subject = "Your status is activated with vasavisociety.org";				 
			 
			 $message = "<b>Dear User,</b><br>Your Profile gets activated<br>Now you can login into the website ";
			 
			 $header = "From:".$from." \r\n";
			 //$header .= "Cc:afgh@somedomain.com \r\n";
			 $header .= "MIME-Version: 1.0\r\n";
			 $header .= "Content-type: text/html\r\n";         
			 $retval = mail ($to,$subject,$message,$header);
			//END EMAIL FUNCTIONALITY.
		}
		$this->session->set_flashdata('message', 'Member Status Updated Successfully');
		redirect("Joinedmember");
		
	}
	
}
