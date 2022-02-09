<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller { 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Doctor_model');
	}
	
	public function index()
	{
		
		if(($this->session->userdata('loginUser')!=''))
		{
			$data['breadcomeName']='DashBoard';
			$this->load->view('includes/header',$data);
			
			///AVL VEHICLES
			$sql = "SELECT count(*) as cnt FROM vehicleD where 1";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				
			}
			else{
				$sql .= " " ;
			}
			$sql .= "	and vhno NOT IN (select vehicleno from vehicle_allotment )";
			
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt1'] = $row1["cnt"]; 
			///AVL VEHICLES
			
			
			
			///VEHICLES ALLOTMENTS
			$sql = "SELECT count(*) as cnt FROM vehicleD where 1";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				
			}
			else{
				$sql .= " and allotedUnit ='".$this->session->userdata('unit')."'" ;
			}
			
			
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt2'] = $row1["cnt"]; 
			///VEHICLES ALLOTMENTS
			
			
			
			//LOGISTICS ISSUED FROM CO
			$sql = "SELECT SUM(qty) as cnt FROM tenders_details_new_details where 1";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				$data["show3"] = true;
			}
			else{
				$data["show3"] = false;
				//$sql .= " and allotedUnit ='".$this->session->userdata('unit')."'" ;
			}		
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt3'] = $row1["cnt"]; 
			//LOGISTICS ISSUED FROM CO
			
			
			
			//VEHICLE EXPENSES
			$sql = "SELECT SUM(amount) as cnt FROM vehicle_expanses where 1";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				//$data["show3"] = true;
			}
			else{
				//$data["show3"] = false;
				//$sql .= " and allotedUnit ='".$this->session->userdata('unit')."'" ;
			}		
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt4'] = $row1["cnt"]; 
			//LOGISTICS ISSUED FROM CO
			
			
			//VEHICLE EXPENSES
			$sql = "SELECT SUM(qty_recieved) as cnt FROM recivestockbytender_new where to_transfer_type='FS' ";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				
			}
			else{
				
				$sql .= " and from_transfer_id ='".$this->session->userdata('unit')."'" ;
			}		
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt5'] = $row1["cnt"]; 
			//LOGISTICS ISSUED FROM CO
			
			
			
			
			
			
			//UNSERVICABLE
			$sql = "SELECT SUM(qty) as cnt FROM unserviceable_list where 1";
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
			{
				
			}
			else{
				$sql .= " and unit_id ='".$this->session->userdata('unit')."'";
			}

if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and fs_id ='".$this->session->userdata('fs_name')."'";
			
			}

			
			$row1 = $this->db->query($sql)->row_array();
			$data['cnt6'] = $row1["cnt"]; 
			
			
			
			
			$this->load->view('includes/leftmenu');		
			$this->load->view('dashboard',$data);
			$this->load->view('includes/footer',$data);
			//redirect('/');
		}
		else
		{
			redirect('login');
		}
	} 
}

/* End of file my_shop.php */
/* Location: ./application/controllers/my_shop.php */