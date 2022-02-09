<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenderdistributiondetails extends CI_Controller { 
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
		//echo "a";
		$data['breadcomeName']='DashBoard';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/leftmenu');		
		$this->load->view('tenderdistributiondetails-new',$data);
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
		$this->load->view('tenderdistributiondetails-new2',$data);
		$this->load->view('includes/footer',$data);
		
	} 	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM description_by_vehicle_type_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Tenderdistributiondetails');
	}
	public function save()
	{
		try 
		{
			$target_dir = "uploads/";
			$target_sanction_order_copy = '';
			$target_distribution_order_copy = '';
if(!empty($_FILES["sanction_order"]["name"]))
{	
$target_sanction_order_copy = $target_dir .uniqid().'-'. basename($_FILES["sanction_order"]["name"]);
if (move_uploaded_file($_FILES["sanction_order"]["tmp_name"], $target_sanction_order_copy)) {
}
}
if(!empty($_FILES["distribution_order"]["name"]))
{
$target_distribution_order_copy = $target_dir .uniqid().'-'.  basename($_FILES["distribution_order"]["name"]);
if (move_uploaded_file($_FILES["distribution_order"]["tmp_name"], $target_distribution_order_copy)) {
}
}
			
				//update tender table with status as received.
$sql_update = "update tenders_details_new SET 
sanction_order='".$target_sanction_order_copy."',
distribution_order='".$target_distribution_order_copy."',
status ='sanctioned and distribution order done' where id  ='".$_POST['hidid']."'";
$this->db->query($sql_update);

$sql5 = "select * from tenders_details_new  where id  ='".$_POST['hidid']."'";
$trans = $this->db->query($sql5)->row_array();

//print("<pre>");
//print_r($trans);die;


$sql = "SELECT * FROM tenders_details_new_details WHERE tenders_details_new_id ='".$_POST['hidid']."' and item_cat IS NOT NULL ORDER BY id DESC";
	$result = $this->db->query($sql)->result_array();
	//print("<pre>");
	//print_r($result);
	foreach($result as $key => $value)
	{
		$sql2 = "select * from recivestockbytender_new where item_id ='".$value["item_id"]."' order by stock_id DESC limit 1 ";
		$num = $this->db->query($sql2)->num_rows();
		if($num < 1 )
		{
			//brand new first time
			$insertArray["item_id"] = $value["item_id"];
			$insertArray["qty_recieved"] = $value["qty"];
			$insertArray["actual_qty"] = $value["qty"];
			$insertArray["amount"] = $value["unit_price"];
			$insertArray["tender_id"] = $_POST['hidid'];
			$insertArray["purpose"] = $trans['purpose'];
			$insertArray["purchase_from"] = $trans['purchase_from'];
			$insertArray["lci_officer_1"] = $trans['lci_officer_1'];
			$insertArray["lci_officer_2"] = $trans['lci_officer_2'];
			$insertArray["lci_officer_3"] = $trans['lci_officer_3'];
			$insertArray["head_of_account"] = $trans['head_of_account'];
			//$insertArray["notes"] = $trans['notes'];
			
			$insertArray["to_transfer_id"] = 0;
			$insertArray["to_transfer_type"] = 'Main';
			$insertArray["to_transfer_closing_stock"] = $trans["qty"];
			$insertArray["main_total_stock"] = $value["qty"];
			$insertArray["main_stock"] = $value["qty"];
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
			$insertArray["item_id"] = $row["item_id"];
			
			$insertArray["amount"] = $value["unit_price"];
			$insertArray["tender_id"] = $_POST['hidid'];
			$insertArray["purpose"] = $trans['purpose'];
			$insertArray["purchase_from"] = $trans['purchase_from'];
			$insertArray["lci_officer_1"] = $trans['lci_officer_1'];
			$insertArray["lci_officer_2"] = $trans['lci_officer_2'];
			$insertArray["lci_officer_3"] = $trans['lci_officer_3'];
			$insertArray["head_of_account"] = $trans['head_of_account'];
			//$insertArray["notes"] = $trans['notes'];
			
			$insertArray["to_transfer_id"] = 0;
			$insertArray["to_transfer_type"] = 'Main';
			$insertArray["to_transfer_closing_stock"] = $trans["qty"];
			
			$insertArray["main_total_stock"] = $value["qty"];
			$insertArray["main_stock"] = $row["main_stock"] + $value["qty"];
			
			
			$insertArray["transfer_datetime"] = date("Y-m-d H:i:s");

			$insert = $this->db->insert('recivestockbytender_new',$insertArray);
			//$this->db->_error_message();
		}
		
		
	}	

 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Updated Successfully !</b></h4></div>');
redirect('Tenderdistributiondetails');



		$target_dir = "uploads/";
$target_filee_tender_copy = $target_dir .uniqid().'-'. basename($_FILES["e_tender_copy"]["name"]);

$target_filefinal_spc_copy = $target_dir .uniqid().'-'.  basename($_FILES["final_spc_copy"]["name"]);

$target_filesupply_order = $target_dir .uniqid().'-'.  basename($_FILES["supply_order"]["name"]);

if (move_uploaded_file($_FILES["e_tender_copy"]["tmp_name"], $target_filee_tender_copy)) {
}

if (move_uploaded_file($_FILES["final_spc_copy"]["tmp_name"], $target_filefinal_spc_copy)) {
}


if (move_uploaded_file($_FILES["supply_order"]["tmp_name"], $target_filesupply_order)) {
}
	
	 $insertData  = array(	 				 
                     'financial_year' => $_POST['financial_year'],
					  'tender_type' => $_POST['tender_type'],
					  'tender_date' => $_POST['tender_date'],
					  'rc_number' => $_POST['rc_number'],
					  'tender_number' => $_POST['tender_number'],
					   'supply_order_number' => $_POST['supply_order_number'],
					   'title' => $_POST['title'],
					   'item_name' => $_POST['item_name'],
					   'qty' => $_POST['qty'],
					   'e_tender_copy' => $target_filee_tender_copy,
					 'final_spc_copy' => $target_filefinal_spc_copy,
					 'supply_order' => $target_filesupply_order,
					   'updated_by' => $_SESSION['name']
					);
					
		$insert = $this->db->insert('tenders_details',$insertData);
		
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


		
		redirect('Tenderdistributiondetails');
		}
		catch(Exception $e)
		{
		}
	}
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */