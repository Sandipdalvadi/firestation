<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vhtype extends CI_Controller { 
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
		$this->load->view('vhtype',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM vehicle_type_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Vhtype');
	}
	public function save()
	{
		try 
		{
		$insertData  = array(	 				 
                     'vehicle_type' => $_POST['vehicle_type'],
					 'vehicle_make_masters_id' => $_POST['vehicle_make_masters_id'],
					 'status' => 1
					);
					
		$insert = $this->db->insert('vehicle_type_masters',$insertData);
		
		if (!$insert) {
			$error = $this->db->error();
			if($error['code'] == 1062)
			{
   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record already exists!</b></h4></div>');
			}
} else {
   //other logics here
   $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
}


		
		redirect('Vhtype');
		}
		catch(Exception $e)
		{
		}
	}
	function getVehlists()
	{
		$category_id=$_POST["vhno"];
		$str = '';
		$sql = "SELECT * FROM vehicleD where vhno='".$category_id."'";
		$result = $this->db->query($sql)->result_array();
		foreach($result as $row){
$str .='<ul style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">
    <li><i class="fa fa-car"></i> &nbsp;vehicle No &nbsp;&nbsp;&nbsp;'.$row['vhno'].'</li>
    <li><i class="fa fa-car"></i> &nbsp; alloted Unit &nbsp;&nbsp;&nbsp;'.$row['allotedUnit'].'</li>
    <li><i class="fa fa-car"></i> &nbsp;vehicle Make &nbsp;&nbsp;&nbsp;'.$this->getMakenameById($row['vhmake']).'</li>
    <li><i class="fa fa-car"></i> &nbsp;vehicle model &nbsp;&nbsp;&nbsp;'.$this->getModelnameById($row['vhmodel']).'</li>
    <li><i class="fa fa-car"></i> &nbsp;vehicle Category &nbsp;&nbsp;&nbsp;'.$row['vhCat'].'</li></ul>';
}

echo $str;die;

	}
	function getMakenameById($id=null)
	{
		$sql = "SELECT * FROM vehicle_make_masters where id=$id";
		$row = $this->db->query($sql)->row_array();
		return $row["vehicle_make"];
	}
	function getModelnameById($id=null)
	{
		$sql = "SELECT * FROM vehicle_type_masters where id=$id";
		$row = $this->db->query($sql)->row_array();
		return $row["vehicle_type"];
	}
	function getlists()
	{
		$category_id=$_POST["category_id"];
		$str = '<option value="">Select Vehicle Type</option>';
		$sql = "SELECT * FROM vehicle_type_masters where vehicle_make_masters_id=$category_id";
		$result = $this->db->query($sql)->result_array();
		//while($row = mysql_fetch_array($result)) {
		foreach($result as $row){

			$str .='<option value='.$row["id"].'>'.$row["vehicle_type"].'</option>';
		}
		echo $str;
	}
	function getFS()
	{
		$category_id=$_POST["category_id"];
		$str = '<option value="">Select FS Type</option>';
		$sql = "SELECT * FROM fsname_masters where unit_id='".$category_id."'";
		$result = $this->db->query($sql)->result_array();
		//while($row = mysql_fetch_array($result)) {
		foreach($result as $row){

			$str .='<option value='.$row["id"].'>'.$row["fs_name"].'</option>';
		}
		echo $str;
	}
	function getDataVarient()
	{
		//$category_id=$_POST["category_id"];
		$category_id=$_POST["category_id"];
	$vhmake=$_POST["vhmake"];
		$str = '<option value="">Select Vehicle Type</option>';
		$sql = "SELECT * FROM vehicle_variant_masters where vehicle_make_masters_id= ".$vhmake." AND vehicle_type_masters_id = ".$category_id;
		$result = $this->db->query($sql)->result_array();
		//while($row = mysql_fetch_array($result)) {
		foreach($result as $row){

			$str .='<option value='.$row["id"].'>'.$row["vehicle_variant"].'</option>';
		}
		echo $str;
	}
}
?>
