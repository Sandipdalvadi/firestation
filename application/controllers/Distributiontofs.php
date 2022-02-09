<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributiontofs extends CI_Controller { 
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
	
	
		function getavlqty()
	{
	    $itemId = $_POST['itemId'];
	    $fsid = $_POST['fsid']; 
	    /* $sql = "select tenders_details_new_id,qty from tenders_details_new_details where item_id='".$itemId."' order by id desc limit 1";
	    $num = $this->db->query($sql)->num_rows();
	    $pending_main_stock = 0;
	    $tender_id = 0;
	    if($num >=1 )
	    {
	        $row = $this->db->query($sql)->row_array();
	        $pending_main_stock = $row["qty"];
	        $tender_id = $row["tenders_details_new_id"];
	    }
	    
	    $sql = "select tender_id,main_stock from recivestockbytender_new where item_id='".$itemId."' order by stock_id desc limit 1";
	 
	    $num2 = $this->db->query($sql)->num_rows();
	    if($num2 >=1 )
	    {
	         $row2 = $this->db->query($sql)->row_array();
	         $main_stock = $row2['main_stock'];
	         $tender_id2 = $row2["tender_id"];
	         if($tender_id != $tender_id2 )
	         {
	             $pending_main_stock = $pending_main_stock + $main_stock;
	         }
	         else
	         {
	             $pending_main_stock = $main_stock;
	         }
	    }
	    */
	    
	    
	    /////
	    $sql = "select * from fsname_masters  where id='".$fsid."'";
	    $num2 = $this->db->query($sql)->num_rows();
	    $pending_dist_stock = 0;
	    if($num2 >=1 )
	    {
	        $row2 = $this->db->query($sql)->row_array();
	        $did = $row2["unit_id"];
	        $sql = "select dist_current_stock from recivestockbytender_new where item_id='".$itemId."' and ( (to_transfer_id='".$did."' AND to_transfer_type='District' ) or ( from_transfer_id='".$did."' AND from_transfer_type='District' ) )  order by stock_id desc limit 1";
	      
	        $row3 = $this->db->query($sql)->row_array();
	        $pending_dist_stock = $row3['dist_current_stock'];
	    }
	    
	    echo $pending_dist_stock;
	    die;
	    
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
		$this->load->view('distributiontofs',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	
	public function delete($id=null)
	{
		 $sql = "DELETE FROM employee_rank_masters  WHERE  id = '".$id."'";
		  $this->db->query($sql);
		 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been deleted Sucessfully !</b></h4></div>');
		 redirect('Distributiontofs');
	}
	public function save()
	{
		
        
        /*print("<pre>");
        print_r($_POST);
        die;
        */
        
        
        $fsid = $_POST["fs_id"];
        $item_id = $_POST["item_id"];
        $itemId = $_POST["item_id"];
        $ID = $_POST["ID"];
        $description = $_POST["description"];
        $distribution_order_no = $_POST["distribution_order_no"];
        $qty_recieved = $_POST["qty_recieved"];
        $iv_number_fs = $_POST["iv_number_fs"];
        $qty_recieved_old = $_POST["qty_recieved_old"];
        $iv_date_fs = $_POST["iv_date_fs"];
        
        
        $sql = "select * from fsname_masters  where id='".$fsid."'";
	    $num2 = $this->db->query($sql)->num_rows();
	    $pending_dist_stock = 0;
	    $did = 0;
	    if($num2 >=1 )
	    {
	        $row2 = $this->db->query($sql)->row_array();
	        $did = $row2["unit_id"];
	        $sql = "select dist_current_stock from recivestockbytender_new where item_id='".$itemId."' and ( (to_transfer_id='".$did."' AND to_transfer_type='District' ) or ( from_transfer_id='".$did."' AND from_transfer_type='District' ) )  order by stock_id desc limit 1";
	       
	        $row3 = $this->db->query($sql)->row_array();
	        $pending_dist_stock = $row3['dist_current_stock'];
	    }
	    
	   
	   
	   $sql3 = "select * from recivestockbytender_new where item_id ='".$_POST["item_id"]."' order by stock_id desc limit 1 ";
       $row3 = $this->db->query($sql3)->row_array();
       
         $main_total_stock = $row3["main_total_stock"];
         $main_stock = $row3["main_stock"];
         $dist_receive = $row3["dist_receive"];
         $dist_current_stock = $pending_dist_stock - $qty_recieved;
         
         
         //fs current stock
         $sql = "select * from recivestockbytender_new  where item_id ='".$_POST["item_id"]."' and to_transfer_id='".$fsid."' AND to_transfer_type='FS' order by stock_id desc limit 1 ";
	    $num2 = $this->db->query($sql)->num_rows();
	    $fs_stock = 0;
	    if($num2 >=1 )
	    {
	        $row2 = $this->db->query($sql)->row_array();
	        $fs_stock = $row2["fs_current_stock"];
	    }
	    $fs_current_stock = $fs_stock + $qty_recieved;
	    //end fs current stock
         
         $sql = "SELECT * FROM recivestockbytender_new WHERE stock_id=".$_POST['ID']."";

			$fetchrecords = $this->db->query($sql)->row_array();
	 // insert records
	  $insertData  = array(
	 				 
                     'item_id' => $_POST['item_id'],
					 'description' => $_POST['description'],
					 'purpose' => $fetchrecords['purpose'],
					 'qty_recieved' => $_POST['qty_recieved'],
					 'amount' => $fetchrecords['amount'],
					 'purchase_from' => $fetchrecords['purchase_from'],
					 'reieved_from' => $fetchrecords['reieved_from'],
					 'lci_officer_1' => $fetchrecords['lci_officer_1'],
					 'lci_officer_2' => $fetchrecords['lci_officer_2'],
					 'lci_officer_3' => $fetchrecords['lci_officer_3'],
					 'tender_type' => $fetchrecords['tender_type'],
					 'head_of_account' => $fetchrecords['head_of_account'],
					 'notes' => $fetchrecords['notes'],
					 'supply_order' => $fetchrecords['supply_order'],
					 'sanction_order' => $fetchrecords['sanction_order'],
					 'status' => "",					 
					 'distribution_order_no' => $_POST['distribution_order_no'],
					 'iv_number_fs' => $_POST['iv_number_fs'],
					 'iv_date_fs' => $_POST['iv_date_fs'],
					 'updated_by' => $_SESSION["name"],
					 'from_transfer_type' =>'District',
					 'to_transfer_type' =>'FS',
					 'from_transfer_id' =>$did,
					 'to_transfer_id' =>$_POST['fs_id'],
					 'transfer_datetime'=>date("Y-m-d H:i:s"),
					 'from_transfer_closing_stock' =>  $from_transfer_closing_stock,
					 'to_transfer_closing_stock'=>$to_transfer_closing_stock,
					 'transfer_fs' => 1,
					  'dist_receive'=>$dist_receive,
					 'dist_current_stock'=>$dist_current_stock,
					 'main_total_stock'=>$main_total_stock,
					 'main_stock'=>$main_stock,
					 'fs_receive' => $_POST['qty_recieved'],
					 'fs_current_stock' => $fs_current_stock,
					 
					);
					//print("<pre>");
					//print_r($insertData);
					//exit;
				//$update_status = insert_data('recivestockbytender', $insert);
				$insert = $this->db->insert('recivestockbytender_new',$insertData);
    
    
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Record has been updated Sucessfully !</b></h4></div>');
		redirect('Distributiontofs');
		die;
		
		
		try 
		{

		if( $_POST['ID'] != 0 )
		{
			// get district stock qty
$sql2 = "select * from recivestockbytender_new where item_id ='".$_POST["item_id"]."' and(from_transfer_type='District' or to_transfer_type='District') order by stock_id DESC limit 1 ";
		$num = $this->db->query($sql2)->num_rows();
		$from_transfer_closing_stock = 0;
if($num >=1 )
{
	$row = $this->db->query($sql2)->row_array();
	if($row["to_transfer_type"] == 'District' )
	{
	$from_transfer_closing_stock = $row["to_transfer_closing_stock"] - $_POST['qty_recieved'];
	}
else
{
$from_transfer_closing_stock = $row["from_transfer_closing_stock"] - $_POST['qty_recieved'];
}
}
//end get district stock qty

// get fs stock qty
$sql3 = "select * from recivestockbytender_new where item_id ='".$_POST["item_id"]."' and( to_transfer_id='".$_POST['fs_id']."' ) and ( from_transfer_type='District') order by stock_id DESC limit 1 ";
		$num3 = $this->db->query($sql3)->num_rows();
		$to_transfer_closing_stock = 0;
if($num3 >=1 )
{
	$row = $this->db->query($sql3)->row_array();
	if($row["from_transfer_type"] == 'District' )
	{
	$to_transfer_closing_stock = $row["to_transfer_closing_stock"] + $_POST['qty_recieved'];
	}
	else
	{
	$to_transfer_closing_stock = $row["from_transfer_closing_stock"] + $_POST['qty_recieved'];
	}
}
else
{
$to_transfer_closing_stock = $_POST['qty_recieved'];
}
//end get fs stock qty

//$rfetch = mysql_query("SELECT * FROM recivestockbytender_new WHERE stock_id=".$_POST['ID']."");
	 // $fetchrecords = mysql_fetch_array($rfetch);
 $sql = "SELECT * FROM recivestockbytender_new WHERE stock_id=".$_POST['ID']."";

			$fetchrecords = $this->db->query($sql)->row_array();
	 // insert records
	  $insertData  = array(
	 				 
                     'item_id' => $_POST['item_id'],
					 'description' => $_POST['description'],
					 'purpose' => $fetchrecords['purpose'],
					 'qty_recieved' => $_POST['qty_recieved'],
					 'amount' => $fetchrecords['amount'],
					 'purchase_from' => $fetchrecords['purchase_from'],
					 'reieved_from' => $fetchrecords['reieved_from'],
					 'lci_officer_1' => $fetchrecords['lci_officer_1'],
					 'lci_officer_2' => $fetchrecords['lci_officer_2'],
					 'lci_officer_3' => $fetchrecords['lci_officer_3'],
					 'tender_type' => $fetchrecords['tender_type'],
					 'head_of_account' => $fetchrecords['head_of_account'],
					 'notes' => $fetchrecords['notes'],
					 'supply_order' => $fetchrecords['supply_order'],
					 'sanction_order' => $fetchrecords['sanction_order'],
					 'status' => "",					 
					 'distribution_order_no' => $_POST['distribution_order_no'],
					 'iv_number_fs' => $_POST['iv_number_fs'],
					 'iv_date_fs' => $_POST['iv_date_fs'],
					 'updated_by' => $_SESSION["name"],
					 'from_transfer_type' =>'District',
					 'to_transfer_type' =>'FS',
					 'from_transfer_id' =>$_SESSION["unit"],
					 'to_transfer_id' =>$_POST['fs_id'],
					 'transfer_datetime'=>date("Y-m-d H:i:s"),
					 'from_transfer_closing_stock' =>  $from_transfer_closing_stock,
					 'to_transfer_closing_stock'=>$to_transfer_closing_stock,
					 'transfer_fs' => 1
					);
					//print("<pre>");
					//print_r($insertData);
					//exit;
				//$update_status = insert_data('recivestockbytender', $insert);
				$insert = $this->db->insert('recivestockbytender_new',$insertData);

  $db_error = $this->db->error();
//var_dump($db_error);
//die;
	
		}
		else
		{
		
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


		
		redirect('Distributiontofs');
		}
		catch(Exception $e)
		{
			var_dump($e);die;
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