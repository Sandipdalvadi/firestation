<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auctionsvehicle extends CI_Controller { 
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
		$this->load->view('auctions_veh',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Auctionslogistics');
	}
	
	
	public function sendauction()
	{
		if(isset($_POST['final_auction_details']))
{
    
    $target_dir = "uploads/";
$target_filechallan = $target_dir . basename($_FILES["challan"]["name"]);


if (move_uploaded_file($_FILES["challan"]["tmp_name"], $target_filechallan)) {
}
   
    $arr = $_POST['items'];
    foreach ($arr as $id) {
 $sql ="UPDATE unserviceable_list SET auction = 1,condemnation=2 WHERE item_id = ".$id." and mode=2";
 $this->db->query($sql);
 $sql ="UPDATE vehicleD SET auction = 1 WHERE vhId = ".$id."";
 $this->db->query($sql);
 
 
  $sql ="UPDATE unserviceable_list SET disbursed = 1, lot_number = '".$_POST['allottid']."', challan = '$target_filechallan', auction_amount = '".$_POST['auction_amount']."', treasury_deposit_details = '".$_POST['treasury_deposit_details']."'  WHERE item_id = ".$id." and mode=2 ";
  $this->db->query($sql);
    }
   
$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
    redirect('Auctionsvehicle');
    
    //echo "<script>window.location='auctions_logistics.php?doneid=sucsess';</script>";
    //exit;
    
}
	}
	
	public function save()
	{
		try 
		{

		if( $_POST['id'] != 0 )
		{
			$insertData  = array(
	 				 'allotments_type' => 'additional',
                     'vehicle_number' => $_POST['vehicle_number'],
                     'quota_liters' => $_POST['quota_liters'],
					 'status' => 2
					);
					
					
			$this->db->where('id', $_POST['id']);
			$insert = $this->db->update('fuel_quota_allotments', $insertData);
	
		}
		else
		{
		$insertData  = array(
	 				 'allotments_type' => 'additional',
                     'vehicle_number' => $_POST['vehicle_number'],
                     'quota_liters' => $_POST['quota_liters'],
					 'status' => 2
					);
				//$update_status = insert_data('vehicle_allotment', $insert);
				$insert = $this->db->insert('fuel_quota_allotments',$insertData);
		}		
				
				/*$vehicleD = mysql_query("UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'");
				
				$sql = "UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'";
				$this->db->query($sql);*/
				
		
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


		
		redirect('Auctionslogistics');
		}
		catch(Exception $e)
		{
		}
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