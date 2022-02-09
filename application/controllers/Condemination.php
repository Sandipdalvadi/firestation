<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Condemination extends CI_Controller { 
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
		$this->load->view('condemnationlogistics',$data);
		$this->load->view('includes/footer',$data);
		
	} 
	function condm($id=null)
	{
		$sql = "UPDATE unserviceable_list SET condemnation = 1  WHERE  id = ".$id."";
		$this->db->query($sql);
		redirect('Unserviceable');
	}
	public function getfs2()
	{
	    $id = $_POST["unitId"];
	    $sql = "select * from fsname_masters where unit_id='".$id."'";
	    $result = $this->db->query($sql)->result_array();
	    $options = "<option value=''>Select FS</option>";
	    foreach($result as $key => $value)
	    {
    	        $options .= "<option value='".$value['id']."'>".$value['fs_name']."</option>";
	    }
	    
	    echo $options;
	    die;
	    
	}
	
	
	function getfsitems()
	{
		$fsid = $_POST["fsid"];
		
		$s2 = "select MAX(b.stock_id), a.id as item_id,a.logistics_name,b.fs_current_stock from logistics_kits_masters a INNER JOIN recivestockbytender_new b ON a.id=b.item_id  WHERE  b.to_transfer_id = '".$fsid."' and b.to_transfer_type='FS' group by b.item_id  order by b.stock_id desc ";					
		$rows = $this->db->query($s2)->result_array();
		$array = [];
		$item_idsss = 0;
		foreach($rows  as $key => $value)
		{
			$item_idsss .= ",".$value["item_id"];
			
			//get local stock
			$sql = "select IFNULL(SUM(qty),0) as qqq from local_stock_fs where fs_id='".$fsid."' and  item_id='".$value["item_id"]."'";
			$rrr= $this->db->query($sql)->row_array();
			$array[] = array("item_id"=>$value["item_id"],"logistics_name"=>$value["logistics_name"],"maxstock"=>$value["fs_current_stock"]+$rrr["qqq"]);
		}
		
		
		//get loca stock  with no transfer from district at all.
		$sql_9 = "select SUM(a.qty) as stst,b.logistics_name,c.fs_name,b.id as item_id from local_stock_fs a ,logistics_kits_masters b  
				,fsname_masters c where a.item_id=b.id and c.id = a.fs_id and a.item_id NOT IN (".$item_idsss.") group by a.item_id,a.fs_id";
				$rows_9 = $this->db->query($sql_9)->result_array();
				foreach($rows_9 as $k1 => $value )
				{
					$array[] = array("item_id"=>$value["item_id"],"logistics_name"=>$value["logistics_name"],"maxstock"=>$value["stst"]);
				}
		
		//print_r($array);
		
		 $options = "<option value=''>Select Item</option>";
		 
		 //get District
		 
		 $spp = "select * from fsname_masters where id='".$fsid."'";
		 $rd = $this->db->query($spp)->row_array();
		 //end district
	    foreach($array as $key => $value)
	    {
				//get old unservicable sum qty
				$sql_old = "select IFNULL(SUM(qty),0) as oldqty from unserviceable_list where fs_id='".$fsid."' and item_id='".$value['item_id']."'";
				$row_old = $this->db->query($sql_old)->row_array();
				$value['maxstock'] = $value['maxstock'] - $row_old["oldqty"];
				
    	        $ids = $value['item_id'].':'.$value['maxstock'].':'.$rd["unit_id"];
				$options .= "<option value='".$ids."'>".$value['logistics_name'].'('.$value['maxstock'].")</option>";
	    }
	    
	    echo $options;
	    die;
		
		
		
	}
	
	function save()
	{
				
		//print_r($_POST);
		//die;
		$item_nameArr = explode(":",$_POST['item_name']);

				$insert  = array(	 				 
                     'fs_id' => $_POST['sel_fs_id'],
                     'item_id' => $item_nameArr['0'],
					 'unit_id' => $item_nameArr['2'],
                     'qty' => $_POST['qty'],
                     'entry_date' => $_POST['entry_date'],
                     'remarks' => $_POST['remarks'],
                     'updated_by' => $_SESSION['name'],
					 'status' => 1
					);
		//$update_status = insert_data('unserviceable_list', $insert);
		$update_status = $this->db->insert('unserviceable_list',$insert);
		
		
 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i><b>Updated Successfully !</b></h4></div>');
redirect('Unserviceable');
	}
	
}
?>
