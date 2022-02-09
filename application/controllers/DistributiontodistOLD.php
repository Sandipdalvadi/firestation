<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributiontodistold extends CI_Controller { 
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
		$this->load->view('distributiontodist',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('distributiontodist');
	}
	public function save()
	{
		try 
		{

		if(isset($_POST['ID']))
		{
			

// get main stock qty
$sql2 = "select * from recivestockbytender_new where item_id ='".$_POST["item_id"]."' and(from_transfer_type='Main' or to_transfer_type='Main') order by stock_id DESC limit 1 ";
		$num = $this->db->query($sql2)->num_rows();
		$from_transfer_closing_stock = 0;
if($num >=1 )
{
	$row = $this->db->query($sql2)->row_array();
	if($row["to_transfer_type"] == 'Main' )
	{
	$from_transfer_closing_stock = $row["to_transfer_closing_stock"] - $_POST['qty_recieved'];
	}
else
{
$from_transfer_closing_stock = $row["from_transfer_closing_stock"] - $_POST['qty_recieved'];
}
}
//end get main stock qty

// get district stock qty
$sql3 = "select * from recivestockbytender_new where item_id ='".$_POST["item_id"]."' and(from_transfer_id='".$_POST['district']."' or to_transfer_id='".$_POST['district']."' ) and (from_transfer_type='Main' or from_transfer_type='District') order by stock_id DESC limit 1 ";
		$num3 = $this->db->query($sql3)->num_rows();
		$to_transfer_closing_stock = 0;
if($num3 >=1 )
{
	$row = $this->db->query($sql3)->row_array();
	if($row["from_transfer_type"] == 'Main' )
	{
	$to_transfer_closing_stock = $row["to_transfer_closing_stock"] - $_POST['qty_recieved'];
	}
	else
	{
	$to_transfer_closing_stock = $row["from_transfer_closing_stock"] - $_POST['qty_recieved'];
	}
}
else
{
$to_transfer_closing_stock = $_POST['qty_recieved'];
}
//end get district stock qty
			//die("Cat");
			 $sql = "SELECT * FROM recivestockbytender_new WHERE stock_id=".$_POST['ID']."";

			$fetchrecords = $this->db->query($sql)->row_array();
			
			
			$insertData  = array(
	 				 
                     'item_id' => $_POST['item_id'],					 
					 'description' => $_POST['description'],
					 'purpose' => $fetchrecords['purpose'],
					 'qty_recieved' => $_POST['qty_recieved'],
					 'actual_qty' => $_POST['qty_recieved'],
					 'amount' => $fetchrecords['amount'],
					 'purchase_from' => $fetchrecords['purchase_from'],
					 'lci_officer_1' => $fetchrecords['lci_officer_1'],
					 'lci_officer_2' => $fetchrecords['lci_officer_2'],
					 'lci_officer_3' => $fetchrecords['lci_officer_3'],
					 'tender_type' => $fetchrecords['tender_type'],
					 'head_of_account' => $fetchrecords['head_of_account'],
					 'notes' => $fetchrecords['notes'],
					 'supply_order' => $fetchrecords['supply_order'],
					 'sanction_order' => $fetchrecords['sanction_order'],
					 'status' => $fetchrecords['status'],
					 'district' => $_POST['district'],
					 'distribution_order_no' => $_POST['distribution_order_no'],
					 'iv_number' => $_POST['iv_number'],
					 'updated_by' => $_SESSION["name"],
					 'iv_date' => $_POST['iv_date'],
					 'from_transfer_type' =>'Main',
					 'to_transfer_type' =>'District',
					 'from_transfer_id' =>0,
					 'to_transfer_id' =>$_POST['district'],
					 'transfer_datetime'=>date("Y-m-d H:i:s"),
					 'from_transfer_closing_stock' =>  $from_transfer_closing_stock,
					 'to_transfer_closing_stock'=>$to_transfer_closing_stock,
					 'transfer' => 1
					);
/*print("<pre>");
print_r($insertData);
die;
*/
				//$update_status = insert_data('recivestockbytender', $insert);
				$insert = $this->db->insert('recivestockbytender_new',$insertData);
				//$qtyremaining = $_POST['qty_recieved_old'] - $_POST['qty_recieved'];
				
				/*$sql2 = "UPDATE recivestockbytender SET qty_recieved = ".$qtyremaining.", distribution_order_no = '".$_POST['distribution_order_no']."', iv_number = '".$_POST['iv_number']."', iv_date = '".$_POST['iv_date']."', district = '".$_POST['district']."', updated_by = '".$_SESSION["name"]."' WHERE stock_id = ".$_POST['ID']."";
				$this->db->query($sql2);*/

		//}
		
				
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

}
		
		redirect('distributiontodist');
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