<?php 
class Categories_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function add_category() {
			extract($_REQUEST); 
				$data1 = array(
					"lang_id" => $lang_id,
					"cat_name" => $cat_name,
					"cat_desc" => $cat_desc,
					"status" => 1, 
					"dateCreated" => date("Y-m-d H:i:s") 
				);
				$this->db->insert("categories", $data1);
				$login_id = $this->db->insert_id();
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull", 
				); 
				return $output;
	} 
	public function edit_category($cat_id) {
		extract($_REQUEST); 
		$data1 = array(
					"lang_id" => $lang_id,
					"cat_name" => $cat_name,
					"cat_desc" => $cat_desc
				);
			 $this->db->where('cat_id', $cat_id);
       	$this->db->update('categories', $data1);
		$output = array(
					"resCode" => 1,
					"msg" => "Updated Successfully",
				 
				); 
	 	return $output;
    } 
	public function del_category($id) {
			extract($_REQUEST); 
			$query = $this->db->query("DELETE FROM categories WHERE cat_id = $id");
			$output = array(
					"resCode" => 1,
					"msg" => "Successfully Deleted",
				 
				); 
				return $output;
	}			
	public function get_all_categories() {
        $query = $this->db->query("select * from categories");       
        return $query->result_array();
    }
	public function get_category_by_id($id) {
        $query = $this->db->query("select * from categories WHERE cat_id=$id");       
        return $query->result_array();
    }
	/*Sub Categories*/
	public function add_sub_category() {
			extract($_REQUEST); 
		if((!$_FILES['sub_cat_image']['error']) && ($_FILES['sub_cat_image'] !=''))
		{
			$new_image=rand(1,10000)."_".$_FILES['sub_cat_image']['name'];
			move_uploaded_file($_FILES['sub_cat_image']['tmp_name'],"uploads/sub_cat_images/".$new_image);
		}else
		{
			$new_image=$res_img['sub_cat_image'];
		}
				$data1 = array(
					"lang_id" => $lang_id,
					"cat_id"=> $cat_id,
					"sub_cat_name" => $sub_cat_name,
					"sub_cat_desc" => $sub_cat_desc,
					"sub_cat_image"=>$new_image,
					"status" => 1, 
					"dateCreated" => date("Y-m-d H:i:s") 
				);
				$this->db->insert("sub_categories", $data1);
				$login_id = $this->db->insert_id();
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull", 
				); 
				return $output;
	}
	
	
	public function edit_subcategory() {
			extract($_REQUEST);
		$sel_img=mysql_query("select * from sub_categories WHERE sub_cat_id=$sub_cat_id");
		$res_img=mysql_fetch_assoc($sel_img);			
	 	 if($data['sub_cat_image']['image']!='')
		 {
			echo $res_img['sub_cat_image'];
		 }
		
		else if((!$_FILES['sub_cat_image']['error']) && ($_FILES['sub_cat_image'] !=''))
		{
			$new_image=rand(1,10000)."_".$_FILES['sub_cat_image']['name'];
			move_uploaded_file($_FILES['sub_cat_image']['tmp_name'],"uploads/sub_cat_images/".$new_image);
		}
		
		print_r($new_image);
				$data1 = array(
					"lang_id" => $lang_id,
					"cat_id"=> $cat_id,
					"sub_cat_name" => $sub_cat_name,
					"sub_cat_desc" => $sub_cat_desc,
					"sub_cat_image"=>$new_image
					
				);
				
		 $this->db->where('sub_cat_id', $sub_cat_id);
       	$this->db->update('sub_categories', $data1);
		$output = array(
					"resCode" => 1,
					"msg" => "Updated Successfully",
				 
				); 
	 	return $output;
	}
	
	public function get_sub_cat_by_id($id) {
        $query = $this->db->query("select * from sub_categories WHERE sub_cat_id=$id");       
        return $query->result_array();
    }	
	
	
	public function del_sub_category($id) {
		 
			$query = $this->db->query("DELETE FROM sub_categories WHERE sub_cat_id = $id");
			$output = array(
					"resCode" => 1,
					"msg" => "Successfully Deleted",
				 
				); 
				return $output;
	}			
	public function get_all_sub_categories() {
        $query = $this->db->query("select * from sub_categories");       
        return $query->result_array();
    }
	
	/*Product Categories*/
	
	public function add_product_categories() {
			extract($_REQUEST); 
			if((!$_FILES['pro_cat_image']['error']) && ($_FILES['pro_cat_image'] !=''))
				{
					$pro_image=rand(1,10000)."_".$_FILES['pro_cat_image']['name'];
					move_uploaded_file($_FILES['pro_cat_image']['tmp_name'],"uploads/pro_cat_images/".$pro_image);
				}else
				{
					$pro_image=$res_img['pro_cat_image'];
				}
				$data1 = array(
					"lang_id" => $lang_id,
					"sub_cat_id"=> $sub_cat_id,
					"pro_cat_name" => $pro_cat_name,
					"pro_cat_desc" => $pro_cat_desc,
					"pro_cat_image"=>$pro_image,
					"status" => 1, 
					"dateCreated" => date("Y-m-d H:i:s") 
				);
				$this->db->insert("pro_cat_items", $data1);
				$login_id = $this->db->insert_id();
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull", 
				); 
				return $output;
	}
	
	public function edit_procategory() {
			extract($_REQUEST);  
		$sel_img=mysql_query("select * from pro_cat_items WHERE pro_cat_id=$pro_cat_id");
		$res_img=mysql_fetch_assoc($sel_img);	
		 
	 	if((!$_FILES['pro_cat_image']['error']) && ($_FILES['pro_cat_image'] !=''))
		{
			$pro_image=rand(1,10000)."_".$_FILES['pro_cat_image']['name'];
			move_uploaded_file($_FILES['pro_cat_image']['tmp_name'],"uploads/pro_cat_images/".$pro_image);
		}
		
		else
		{ 
			$pro_image=$res_img['pro_cat_image'];
		}
		print_r($new_image);
				$data1 = array(
					"lang_id" => $lang_id,
					"sub_cat_id"=> $sub_cat_id,
					"pro_cat_name" => $pro_cat_name,
					"pro_cat_desc" => $pro_cat_desc,
					"pro_cat_image"=>$pro_image
					
				);
				
		 $this->db->where('pro_cat_id', $pro_cat_id);
       	$this->db->update('pro_cat_items', $data1);
		$output = array(
					"resCode" => 1,
					"msg" => "Updated Successfully",
				 
				); 
	 	return $output;
	}
	
	public function get_pro_cat_by_id($id) {
        $query = $this->db->query("select * from pro_cat_items WHERE pro_cat_id=$id");       
        return $query->result_array();
    }	
	
	
	
	
	public function del_product_category($id) {
			extract($_REQUEST); 
			$query = $this->db->query("DELETE FROM pro_cat_items WHERE pro_cat_id = $id");
			$output = array(
					"resCode" => 1,
					"msg" => "Successfully Deleted",
				 
				); 
				return $output;
	}			
	public function get_all_product_categories() {
        $query = $this->db->query("select * from pro_cat_items");       
        return $query->result_array();
    }
	
	/*Product Information*/
	
	public function add_product_info() {
		print_r($_REQUEST); die;
		extract($_REQUEST);
		if((!$_FILES['pro_image']['error']) && ($_FILES['pro_image'] !=''))
		{
			$pro_info_image=rand(1,10000)."_".$_FILES['pro_image']['name'];
			move_uploaded_file($_FILES['pro_image']['tmp_name'],"uploads/pro_info_images/".$pro_info_image);
		}
		
		 if ((!$_FILES['pro_catelog']['error']) && ($_FILES['pro_catelog'] != '')) {
		   $pro_info_image1 = rand(1, 10000) . "_" . $_FILES['pro_catelog']['name'];
		   move_uploaded_file($_FILES['pro_catelog']['tmp_name'], "uploads/pro_info_images/" . $pro_info_image1);
		  } else {
		   $pro_info_image1 = $res_img['pro_catelog'];
		  }
		  
			if ((!$_FILES['manuals']['error']) && ($_FILES['manuals'] != '')) {
		   $pro_info_image2 = rand(1, 10000) . "_" . $_FILES['manuals']['name'];
		   move_uploaded_file($_FILES['manuals']['tmp_name'], "uploads/pro_info_images/" . $pro_info_image2);
		  } else {
		   $pro_info_image2 = $res_img['manuals'];
		  }
		  
			if ((!$_FILES['datasheet']['error']) && ($_FILES['datasheet'] != '')) {
		   $pro_info_image3 = rand(1, 10000) . "_" . $_FILES['datasheet']['name'];
		   move_uploaded_file($_FILES['datasheet']['tmp_name'], "uploads/pro_info_images/" . $pro_info_image3);
		  } else {
		   $pro_info_image3 = $res_img['datasheet'];
		  }

		$data1 = array(

					"cat_id" => $cat_id,
					"sub_cat_id" => $sub_cat_id,
					"pro_cat_id" => $pro_cat_id,
					"lang_id" => $lang_id,
					"pro_name" => $pro_name,
					 "frame_type" => $frame_type, 
					"pro_short_desc" => $pro_short_desc,
					"pro_price" => $pro_price,
					"pro_desc" => $pro_desc,
					"pro_image" => $pro_info_image,
					"pro_category" => $pro_category,
					"pro_brand" => $pro_brand,
					"pro_dim" => $pro_dim,
					"tot_power" => $tot_power,
					"pro_model" => $pro_model,
					"pro_sku" => $pro_sku,
					"pro_weight" => $pro_weight,
					"carton_weight" => $carton_weight,
					"gr_weight" => $gr_weight,
					"nt_weight" => $nt_weight,
					"input_volt" => $input_volt,
					"no_of_outputs" => $no_of_outputs,
					"output_volt_chnl" => $output_volt_chnl,
					"output_volt_chnl" => $output_volt_chnl,
					"output_volt_chn2" => $output_volt_chn2,

					"mounting_style" => $mounting_style,
					"input_frequency" => $input_frequency,
					"pro_height" => $pro_height,
					"pro_length" => $pro_length,

					"pro_width" => $pro_width,
					"load_regulation" => $load_regulation,
					"isolation_volt" => $isolation_volt,
					"approvals" => $approvals,
					"output_volt" => $output_volt, 
					"output_power" => $output_power,
					"output_crnt" => $output_crnt, 
					"safty" => $safty,
					"series" => $series,
					"specification" => $specification,
					"factory_pack_qty" => $factory_pack_qty,
					"pro_catelog" => $pro_info_image,
					  "manuals" => $pro_info_image1,
						 "datasheet" => $pro_info_image2,
					"pro_prices" => $pro_prices, 
					"pro_1_7_price" => $pro_1_7_price,
					"pro_8_18_price" => $pro_8_18_price,
					"pro_19_44_price" => $pro_19_44_price,
					"pro_45_price" => $pro_45_price,
					"qty" => $qty, 
					"extra_fields" => $extra_fields,
					"status" => 1,
					"dateCreated" => date("Y-m-d H:i:s")
				);
				$this->db->insert("products", $data1);
				$login_id = $this->db->insert_id();
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull", 
				); 
				return $output;
	} 
	public function edit_productinfo() {
		extract($_REQUEST);  
		/*$sel_img=mysql_query("select * from products WHERE prod_id=$prod_id");
		$res_img=mysql_fetch_assoc($sel_img); */
		$query = $this->db->query("select * from products WHERE prod_id=$prod_id");
	        $res_img=$query->result_array();
	        
	 	if((!$_FILES['pro_image']['error']) && ($_FILES['pro_image'] !=''))
		{
			$pro_info_image=rand(1,10000)."_".$_FILES['pro_image']['name'];
			move_uploaded_file($_FILES['pro_image']['tmp_name'],"uploads/pro_info_images/".$pro_info_image);
		} 
		else
		{ 
			$pro_info_image=$res_img[0]['pro_image'];
		}
		if((!$_FILES['datasheet']['error']) && ($_FILES['datasheet'] !=''))
		{
			$pro_info_datasheet=rand(1,10000)."_".$_FILES['datasheet']['name'];
			move_uploaded_file($_FILES['datasheet']['tmp_name'],"uploads/pro_info_datasheet/".$pro_info_datasheet);
		}
		else
		{ 
			$pro_info_datasheet=$res_img[0]['datasheet'];
		}
		if((!$_FILES['manual']['error']) && ($_FILES['manual'] !=''))
		{
			$pro_info_manual=rand(1,10000)."_".$_FILES['manual']['name'];
			move_uploaded_file($_FILES['manual']['tmp_name'],"uploads/pro_info_manual/".$pro_info_manual);
		}
		else
		{ 
			$pro_info_manual=$res_img[0]['manual'];
		}
		
		//print_r($pro_info_image);
				$data1 = array(
					"cat_id"=> $cat_id,
					"sub_cat_id"=> $sub_cat_id,
					"pro_cat_id"=> $pro_cat_id,
					"lang_id" => $lang_id,					
					"pro_name" => $pro_name,
					"pro_short_desc" => $pro_short_desc,					
					"pro_price"=> $pro_price,
					"pro_desc"=> $pro_desc,
					"pro_image"=>$pro_info_image,
					"pro_category"=> $pro_category,
					"pro_brand" => $pro_brand,					
					"pro_dim" => $pro_dim,
					"tot_power" => $tot_power,					
					"pro_model"=> $pro_model,
					"pro_sku"=> $pro_sku,
					"pro_weight"=> $pro_weight,
					"carton_weight" => $carton_weight,					
					"gr_weight" => $gr_weight,
					"nt_weight" => $nt_weight,					
					"input_volt"=> $input_volt,
					"output_volt_chnl"=> $output_volt_chnl,
					"safty"=> $safty,
					"series"=> $series,
					"specification" => $specification,					
					"factory_pack_qty" => $factory_pack_qty,
					"pro_catelog" => $pro_catelog,					
					"pro_prices" => $pro_prices,					
					"extra_fields" => $extra_fields,
					"manuals" => $pro_info_manual,
					"datasheet" => $pro_info_datasheet,
				); 
			$this->db->where('prod_id', $prod_id);
			$this->db->update('products', $data1);
			$output = array(
					"resCode" => 1,
					"msg" => "Updated Successfully",
				 
				); 
	 	return $output;
	} 
	public function get_product_by_id($id) { 
        $query = $this->db->query("select * from products WHERE prod_id = $id");   
        return $query->result_array();
    } 
	public function del_product_info($id) {
			extract($_REQUEST); 
			$query = $this->db->query("DELETE FROM products WHERE prod_id = $id");
			$output = array(
					"resCode" => 1,
					"msg" => "Successfully Deleted",
				 
				); 
				return $output;
	}		 
	public function get_all_product_info() {
        $query = $this->db->query("select * from products");       
        return $query->result_array();
    } 
  	public function forgot_password() {
			 
				$email = $_REQUEST['loginEmail'];
				 
				$this->db->select('admin_id');
				$this->db->where("(email_id='$email' OR mobile='$email')", NULL, FALSE);
			 
				$query = $this->db->get('admin');
				 
				if ($query->num_rows() > 0) {
					// If there is a user, then create session data
				 
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
			return $this->session->unset_userdata($data);
	}
	 
}