<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recivestockbytendernew extends CI_Controller { 
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
		 
		$this->load->view('recivestockbytender-new',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	public function index2()
	{
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');	
		$id= $this->input->post('tender_number');
		 $sql = "select * from tenders_details_new where id='".$id."'";	
		$data["fetch222"] = $this->db->query($sql)->row_array();
		$this->load->view('recivestockbytender-new2',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Recivestockbytendernew');
	}
	public function save()
	{
		try 
		{

//print("<pre>");
//print_r($_POST);
//die;

if($_POST['recivestockbytender'] == 'approve' )
{
	$sql = "SELECT * FROM tenders_details_new_details WHERE tenders_details_new_id ='".$_POST['hidid']."' ORDER BY id DESC";
	$result = $this->db->query($sql)->result_array();
	//print("<pre>");
	//print_r($result);
	foreach($result as $key => $value)
	{
		$sql2 = "select * from recivestockbytender_new where item_id ='".$value["item_id"]."' order by stock_id DESC limit 1 ";
		$num = $this->db->query($sql2)->num_rows();
		/*if($num < 1 )
		{
			//brand new first time
			$insertArray["item_id"] = $value["item_id"];
			$insertArray["qty_recieved"] = $value["qty"];
			$insertArray["actual_qty"] = $value["qty"];
			$insertArray["amount"] = $value["unit_price"];
			$insertArray["tender_id"] = $_POST['hidid'];
			$insertArray["purpose"] = $_POST['purpose'];
			$insertArray["purchase_from"] = $_POST['purchase_from'];
			$insertArray["lci_officer_1"] = $_POST['lci_officer_1'];
			$insertArray["lci_officer_2"] = $_POST['lci_officer_2'];
			$insertArray["lci_officer_3"] = $_POST['lci_officer_3'];
			$insertArray["head_of_account"] = $_POST['head_of_account'];
			$insertArray["notes"] = $_POST['notes'];
			
			$insertArray["to_transfer_id"] = 0;
			$insertArray["to_transfer_type"] = 'Main';
			$insertArray["to_transfer_closing_stock"] = $value["qty"];
			$insertArray["transfer_datetime"] = date("Y-m-d H:i:s");

			$insert = $this->db->insert('recivestockbytender_new',$insertArray);
		}
		else
		{
			$insertArray["qty_recieved"] = $value["qty"];
			$insertArray["actual_qty"] = $value["qty"];

			$row = $this->db->query($sql2)->row_array();
			if($row["from_transfer_type"] == "Main")
			{
				$value["qty"] += $row["from_transfer_closing_stock"];
			}
			if($row["to_transfer_type"] == "Main")
			{
				$value["qty"] += $row["to_transfer_closing_stock"];
			}
			$insertArray["item_id"] = $value["item_id"];
			
			$insertArray["amount"] = $value["unit_price"];
			$insertArray["tender_id"] = $_POST['hidid'];
			$insertArray["purpose"] = $_POST['purpose'];
			$insertArray["purchase_from"] = $_POST['purchase_from'];
			$insertArray["lci_officer_1"] = $_POST['lci_officer_1'];
			$insertArray["lci_officer_2"] = $_POST['lci_officer_2'];
			$insertArray["lci_officer_3"] = $_POST['lci_officer_3'];
			$insertArray["head_of_account"] = $_POST['head_of_account'];
			$insertArray["notes"] = $_POST['notes'];
			
			$insertArray["to_transfer_id"] = 0;
			$insertArray["to_transfer_type"] = 'Main';
			$insertArray["to_transfer_closing_stock"] = $value["qty"];
			$insertArray["transfer_datetime"] = date("Y-m-d H:i:s");

			$insert = $this->db->insert('recivestockbytender_new',$insertArray);
		}
		*/
		
	}

//update tender table with status as received.
 $sql_update = "update tenders_details_new SET lci_officer_1='".$_POST['lci_officer_1']."',
lci_officer_2='".$_POST['lci_officer_2']."',
lci_officer_3='".$_POST['lci_officer_3']."',
 head_of_account='".$_POST['head_of_account']."',purpose='".$_POST['purpose']."',purchase_from='".$_POST['purchase_from']."', status ='received' where id  ='".$_POST['hidid']."'";

$this->db->query($sql_update);

 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Stock received Successfully !</b></h4></div>');
redirect('Recivestockbytendernew');
}
else
{
$sql_update = "update tenders_details_new SET lci_officer_1='".$_POST['lci_officer_1']."',
lci_officer_2='".$_POST['lci_officer_2']."',
lci_officer_3='".$_POST['lci_officer_3']."',head_of_account='".$_POST['head_of_account']."',purpose='".$_POST['purpose']."',purchase_from='".$_POST['purchase_from']."', status ='rejected' where id  ='".$_POST['hidid']."'";
$this->db->query($sql_update);
 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Stock rejected Successfully !</b></h4></div>');
redirect('Recivestockbytendernew');
}
die;
		/*if( $_POST['id'] != 0 )
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
		}*/
		$target_filesupply_order = '';
		$target_filesanction_order = '';
$insertData  =array(
	 				 'tender_number' => $_POST['tender_number'],
                     'item_name' => $_POST['item_name'],
					 'description' => $_POST['description'],
					 'purpose' => $_POST['purpose'],
					 'qty_recieved' => $_POST['qty_recieved'],
					 'actual_qty' => $_POST['qty_recieved'],
					 'amount' => $_POST['amount'],
					 'purchase_from' => $_POST['purchase_from'],
					 'lci_officer_1' => $_POST['lci_officer_1'],
					 'lci_officer_2' => $_POST['lci_officer_2'],
					 'lci_officer_3' => $_POST['lci_officer_3'],
					 'tender_type' => $_POST['tender_type'],
					 'head_of_account' => $_POST['head_of_account'],
					 'notes' => $_POST['notes'],
					 'supply_order' => $target_filesupply_order,
					 'sanction_order' => $target_filesanction_order,
					 'updated_by' => $_SESSION["name"],
					 'status' => $_POST['recivestockbytender']
					);

			//print_r($insertData);die;		
			$insert = $this->db->insert('recivestockbytender',$insertData);	
				/*$vehicleD = mysql_query("UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'");
				
				$sql = "UPDATE vehicleD SET allotedUnit = '".$_POST['unit_to']."', allotedFS = '".$_POST['fs']."' WHERE vhno = '".$_POST['vehicleno']."'";
				$this->db->query($sql);*/
			$status_stcok = "UPDATE tenders_details SET status_stcok = 1 WHERE tender_number = '".$_POST['tender_number']."' AND item_name = '".$_POST['item_name']."' ";
			$this->db->query($status_stcok);			
		
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


		
		redirect('Recivestockbytendernew');
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