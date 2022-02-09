<?php 
class Login_model extends CI_Model {
	var $user   = '';
    var $pass   = '';
    var $type   = 0;
    var $from   = ''; //66688
    var $servid = ''; //Bulk360
    var $to;
    var $text;

    var $url    = '';
		
	function __construct() {        
		
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
    }

    
	public function check_login($baseUrl=NULL) {


			extract($_REQUEST);
			//$password=$pwd;
			$this->db->select('*');
			$this->db->where("(loginid='$username')",NULL, FALSE);
			$this->db->where('password', $password); 
					// Run the query
			$query = $this->db->get('users');
			$row = $query->row();
			if ($query->num_rows() > 0) {
				$ipaddress = '';
				if(isset($_SERVER['HTTP_CLIENT_IP']))
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_X_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				else if(isset($_SERVER['REMOTE_ADDR']))
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				else
					$ipaddress = 'UNKNOWN';
				
				$env_info=$_SERVER['HTTP_USER_AGENT'];
				
				/*$data1 = array(
					"emp_id" => $row->admin_id,
					"ip" => $ipaddress,
					"env_info" => $env_info,
					"login_time" => date("Y-m-d H:i:s")
				);
				//$this->db->insert("login_history", $data1);
				//$login_id = $this->db->insert_id();
				// If there is a user, then create session data
				*/
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull",
					"redUrl" => substr($baseUrl,0,-1)
				);
				
				
				/*
				// Set session variables
		$_SESSION["name"] = $fetch222['name'];
		$_SESSION["district"] = $fetch222['district'];
		$_SESSION["fs_name"] = $fetch222['fs_name'];
		$_SESSION["loginid"] = $fetch222['loginid'];
		$_SESSION["mobile_no"] = $fetch222['mobile_no'];
		$_SESSION["access_units"] = $fetch222['access_units'];
		$_SESSION["user_type"] = $fetch222['user_type'];
		if(!empty($fetch222['district']))
		{
		$_SESSION['unit_vehicles'] = getvehiclesbyUnit($fetch222['district']);
		}else{
		  $_SESSION['unit_vehicles'] = getvehiclesbyUsername($fetch222['name']);
		}
		$user_role_masters_id = user_role_masters_id($fetch222['login_role']);
        $_SESSION["login_name"] = $user_role_masters_id;
        $_SESSION["login_role"] = $fetch222['login_role'];
	
		$_SESSION["logintime"] = date('H:m:i');
				*/
				
				$s2 = "select * from units_masters  WHERE  id = '".$row->district."'";					
				$r2= $this->db->query($s2)->row_array();
					
					
				$s3 = "select * from fsname_masters  WHERE  id = '".$row->fs_name."'";
				$r3= $this->db->query($s3)->row_array();
				
				$display_name = '';
				if($r3['fs_name'] != NULL && $r3['fs_name'] != '' )
				{
					$display_name= $r3['fs_name'];
				}
				else if ( $r2['unit_name'] != NULL && $r2['unit_name'] != '')
				{
					$display_name= $r2['unit_name'];
				}
				
				
				$s3role = "select * from user_role_masters  WHERE  id = '".$row->login_role."'";
				$r3role= $this->db->query($s3role)->row_array();
				
					
				$logData = array(
						'loginUser' => $row->id,
						'loginEmail' => $row->email,
						'loginId' => $row->id,
						'login_role' => $row->login_role,						
						'loginType' => $row->user_type,
						'role' => $row->user_type,
						'display_name' => $display_name,
						'name' => $row->name,
						'district' => $row->district,
						'unit' => $row->district,

						'fs_name' => $row->fs_name,
						'mobile_no' => $row->mobile_no,
						'access_units' => $row->access_units,
						'user_type' => $row->user_type,
						'login_name' => $r3role["name"],
						'logintime' => date('H:m:i'),						
						'Login' => TRUE
					);
					$this->session->set_userdata($logData);
				return $output;
			}
			else{
				$output = array(
					"resCode" => "none",
					"msg" => "Entered Email / Username Or Password Incorrect"
				);
				return $output;
			}
		 
	}
	
	
	public function check_forgotpwd($baseUrl=NULL) {
			extract($_REQUEST);
			$password=md5($pwd);
			$this->db->select('id as admin_id,password,contact_no,password,ic_or_pp_name_username as email_id,role as admin_type');
			$this->db->where("(ic_or_pp_name_username='$email')",NULL, FALSE);
			//$this->db->where('password', $pwd);  
			$this->db->where('is_deleted', 'N'); 			// Run the query
			$query = $this->db->get('lab_doctors');
			$row = $query->row();
			if ($query->num_rows() > 0) {
				$ipaddress = '';
				if(isset($_SERVER['HTTP_CLIENT_IP']))
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_X_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				else if(isset($_SERVER['HTTP_FORWARDED']))
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				else if(isset($_SERVER['REMOTE_ADDR']))
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				else
					$ipaddress = 'UNKNOWN';
				
				$env_info=$_SERVER['HTTP_USER_AGENT'];
				
				$data1 = array(
					"emp_id" => $row->admin_id,
					"ip" => $ipaddress,
					"env_info" => $env_info,
					"login_time" => date("Y-m-d H:i:s")
				);
				//$this->db->insert("login_history", $data1);
				//$login_id = $this->db->insert_id();
				// If there is a user, then create session data
				
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull",
					"redUrl" => substr($baseUrl,0,-1)
				);
				 $this->sendsms($row->contact_no, 'CMC: Your password is:  '.$row->password);
				/*$logData = array(
						'loginUser' => $row->admin_id,
						'loginEmail' => $row->email_id,
						'loginId' => $login_id,
						'loginType' => $row->admin_type,
						'Login' => TRUE
					);
					$this->session->set_userdata($logData);*/
				return $output;
			}
			else{
				$output = array(
					"resCode" => "none",
					"msg" => "Entered Email / Username Or Password Incorrect"
				);
				return $output;
			}
		 
	}
	
	
	
  
  	public function forgot_password() {
		$email = $_REQUEST['loginEmail'];
		$this->db->select('admin_id');
		$this->db->where("(email_id='$email' OR mobile='$email')", NULL, FALSE);
		$query = $this->db->get('admin');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'emp_id' => $row->emp_id,
				'email' => $email,
				'Login' => TRUE
			);
		}
		else{
			return 0;
		}
	}
		
	public function logout($login_id,$emp_id) {
			$logout_data = array(
					"logout_time" => date("Y-m-d H:i:s")
			);
			$this->db->where("(login_id='$login_id' AND emp_id='$emp_id')",NULL, FALSE);
			$this->db->update('login_history', $logout_data);
	
			$data = array(
					'loginUser' => '',
					'loginEmail' => '',
					'loginType' => '',
					'Login' => FALSE
				);
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			return $this->session->unset_userdata($data);
	}
	 
}

