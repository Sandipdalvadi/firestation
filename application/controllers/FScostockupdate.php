<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FScostockupdate extends CI_Controller { 
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
	
	public function index($id=0)
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');	
		$data['fetch222'] = [];
		$data['id'] = $id;
		 if($id != 0 )
		 {
			 $sql = "SELECT * FROM fuel_quota_allotments WHERE id = ".$id;
			 $data['fetch222'] = $this->db->query($sql)->row_array();
		 }		 
		$this->load->view('fscostockupdate',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('FScostockupdate');
	}
	public function save()
	{
		
//$recivestockbytender = mysql_query("UPDATE recivestockbytender SET  rv_number = '".$_POST['rv_number']."', rv_date = '".$_POST['rv_date']."',  updated_by = '".$_SESSION["name"]."' WHERE stock_id = ".$_POST['ID']."");

		$sql = "UPDATE recivestockbytender_new SET  rv_number = '".$_POST['rv_number']."', rv_date = '".$_POST['rv_date']."', transfer_fs=2, updated_by = '".$_SESSION["name"]."' WHERE stock_id = ".$_POST['ID']."";
		$this->db->query($sql);
 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
		redirect('FScostockupdate');
	}
	function getstockdata(){
	$category_id=$_POST["tender_number"];
	//$result = mysql_query("SELECT * FROM tenders_details where tender_number='".$category_id."' AND status_stcok = 0");
	
	$sql = "SELECT * FROM tenders_details where tender_number='".$category_id."' AND status_stcok = 0";
	$row = $this->db->query($sql)->row_array();
	 
	//echo "SELECT * FROM logistics_kits_masters where logistics_name='".$category_id."'";

	//$row = mysql_fetch_array($result);
	//$row['item_description'] = getKitsCategory($row['item_name']);
	
	$find = "SELECT * FROM  logistics_kits_masters WHERE logistics_name LIKE '%".$row['item_name']."%' limit 1";
	$row2 = $this->db->query($sql)->row_array($find);
	$row['item_description'] = $row2['logistics_category'];
	//mysql_query();
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
               // $editres = mysql_fetch_array($find);               
 //return($editres['logistics_category']);
    
    header("Content-Type: application/json; charset=utf-8", true);
    exit( json_encode( $row ) );#terminate		
	}	
		
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */