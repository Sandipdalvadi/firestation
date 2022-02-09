<?php 
class Agent_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function get_all_users() {        
		//return $this->db->select("*")->from("admin")->where("is_deleted", 'N')->where("admin_type", '2')->get()->result_array();
		$sql = "select a.*,GROUP_CONCAT(b.name ORDER BY b.name) localityname from admin a INNER JOIN lab_locality b ON FIND_IN_SET(b.id, a.locality_id) > 0 AND  a.is_deleted='N' and a.admin_type=2 GROUP   BY a.admin_id  ";
		return $this->db->query($sql)->result_array();
		
    }	
	public function get_all_users_location() {
		//	$find = " FIND_IN_SET('".$_REQUEST['locality_id']."', locality_id)";
		//$sql = "select * from admin where is_deleted='N' AND admin_type=2 AND ".$find ;
		//echo $sql;
		$sql = "select a.*,GROUP_CONCAT(b.name ORDER BY b.name) localityname from admin a INNER JOIN lab_locality b ON FIND_IN_SET(b.id, a.locality_id) > 0 AND  a.is_deleted='N' and a.admin_type=2   ";
		if(!empty($_REQUEST['locality_id']))
		{ 
			$sql .= " AND ( ";
			$index = 0;
			foreach($_REQUEST['locality_id'] as $key => $value ){
				$index++;
				if($index == 1 ){
					$sql .= " FIND_IN_SET('".$value."', a.locality_id)";
				}
				else{
					$sql .= " OR FIND_IN_SET('".$value."', a.locality_id)";
				}
				
				
				
			}
			$sql .= " ) ";
		}
		$sql .= " GROUP   BY a.admin_id ";
		//echo $sql;
		return $this->db->query($sql)->result_array();
    }	
	public function checkExists($name) {       
	   return $this->db->select("*")->from("lab_external_clients")->where("name", $name)->get()->num_rows();
    }
	
	public function checkemailExists($email) {       
	   return $this->db->select("*")->from("admin")->where("email_id", $email)->get()->num_rows();
    }
	
	public function checkmobileExists($mobile) {       
	   return $this->db->select("*")->from("admin")->where("mobile", $mobile)->get()->num_rows();
    }
	
	
	public function checkExistsEdit($name,$id) {       
	   return $this->db->select("*")->from("lab_external_clients")->where("id !=" ,$id)->where("name", $name)->get()->num_rows();
    }
	
	public function save($data) {
		$data["admin_type"] = 2;		
		$data["password"] = md5($data['org_password']);
		$data["locality_id"] = implode(",",$data["locality_id"]);	
		$this->db->insert('admin', $data);       
    }
	public function changeStatus($id) {	   
		   $data = array( 
		'is_deleted'      => 'Y' 
		);
	$this->db->where('admin_id',$id);
	$this->db->update('admin', $data);
    }
	public function update($data)
	{	
		
		$this->db->where('admin_id',$data['cid']);
		unset($data['cid']);
		$data["locality_id"] = implode(",",$data["locality_id"]);
		$this->db->update('admin', $data);
	}
	public function getdataById($id=null)
	{
		return $this->db->select('*')->from('admin')->where('admin_id',$id)->get()->row_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* TO BE DELTEDD BELOW CODE NOT USING...*/
	public function add_category() {
		extract($_REQUEST);
		if((!$_FILES['cat_image1']['error']) && ($_FILES['cat_image1'] !=''))
		{
			$new_image1=rand(1,10000)."_".$_FILES['cat_image1']['name'];
			move_uploaded_file($_FILES['cat_image1']['tmp_name'],"uploads/cat_images/".$new_image1);
		}
				$data1 = array(
					"cat_name" => $cat_name,
					"cat_desc" => $cat_desc,
					"cat_image" => $new_image1,
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
	
	public function edit_category() {
		extract($_REQUEST);
		$query = $this->db->query("select * from categories WHERE cat_id='$cat_id'");
        $res_img= $query->result_array();
		if((!$_FILES['cat_image1']['error']) && ($_FILES['cat_image1'] !=''))
		{
			$pro_image=rand(1,10000)."_".$_FILES['cat_image1']['name'];
			move_uploaded_file($_FILES['cat_image1']['tmp_name'],"uploads/cat_images/".$pro_image);
		} 
		else
		{ 
			$pro_image=$res_img[0]['cat_image'];
		}
		$data1 = array(
					"cat_name" => $cat_name,
					"cat_desc" => $cat_desc,
					"cat_image" => $pro_image
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
	
	public function get_all_categories_new() {
        $query = $this->db->query("select * from category where parent_id=0");       
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
		}
		
		if((!$_FILES['sub_cat_image1']['error']) && ($_FILES['sub_cat_image1'] !=''))
		{
			$new_image1=rand(1,10000)."_".$_FILES['sub_cat_image1']['name'];
			move_uploaded_file($_FILES['sub_cat_image1']['tmp_name'],"uploads/sub_cat_images/".$new_image1);
		} 
		
				$data1 = array(
					"cat_id"=> $cat_id,
					"sub_cat_name" => $sub_cat_name,
					"sub_cat_desc" => $sub_cat_desc,
					"sub_cat_image"=>$new_image,
					"sub_cat_banner_image"=>$new_image1,
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
		// $sel_img=mysql_query("select * from sub_categories WHERE sub_cat_id=$sub_cat_id");
		// $res_img=mysql_fetch_assoc($sel_img);	
		// $query = $this->db->query("select * from sub_categories WHERE sub_cat_id=$sub_cat_id");       
        // $res_img= $query->result_array();
		
		$query = $this->db->query("select * from sub_categories WHERE sub_cat_id=$sub_cat_id");       
        $res_img= $query->result_array();
		
		if((!$_FILES['sub_cat_image']['error']) && ($_FILES['sub_cat_image'] !=''))
		{
			$pro_image=rand(1,10000)."_".$_FILES['sub_cat_image']['name'];
			move_uploaded_file($_FILES['sub_cat_image']['tmp_name'],"uploads/sub_cat_images/".$pro_image);
		} else
		{ 
			$pro_image=$res_img[0]['sub_cat_image'];
		}
		if((!$_FILES['sub_cat_image1']['error']) && ($_FILES['sub_cat_image1'] !=''))
		{
			$pro_image1=rand(1,10000)."_".$_FILES['sub_cat_image1']['name'];
			move_uploaded_file($_FILES['sub_cat_image1']['tmp_name'],"uploads/sub_cat_images/".$pro_image1);
		} else
		{ 
			$pro_image1=$res_img[0]['sub_cat_image1'];
		}
		 
		$data1 = array(
			"cat_id"=> $cat_id,
			"sub_cat_name" => $sub_cat_name,
			"sub_cat_desc" => $sub_cat_desc,
			"sub_cat_image"=>$pro_image,
			"sub_cat_banner_image"=>$pro_image1,  
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
				} 
				if((!$_FILES['pro_cat_image1']['error']) && ($_FILES['pro_cat_image1'] !=''))
				{
					$pro_image1=rand(1,10000)."_".$_FILES['pro_cat_image1']['name'];
					move_uploaded_file($_FILES['pro_cat_image1']['tmp_name'],"uploads/pro_cat_images/".$pro_image1);
				} 
				$data1 = array(
					"sub_cat_id"=> $sub_cat_id,
					"pro_cat_name" => $pro_cat_name,
					"pro_cat_desc" => $pro_cat_desc,
					"pro_cat_image"=>$pro_image,
					"pro_cat_banner_image"=>$pro_image1, 
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
		// $sel_img=mysql_query("select * from pro_cat_items WHERE pro_cat_id=$pro_cat_id");
		// $res_img=mysql_fetch_assoc($sel_img);	
		
		 $query = $this->db->query("select * from pro_cat_items WHERE pro_cat_id=$pro_cat_id");       
        $res_img= $query->result_array();
		 
	 	if((!$_FILES['pro_cat_image']['error']) && ($_FILES['pro_cat_image'] !=''))
		{
			$pro_image=rand(1,10000)."_".$_FILES['pro_cat_image']['name'];
			move_uploaded_file($_FILES['pro_cat_image']['tmp_name'],"uploads/pro_cat_images/".$pro_image);
		}
		else
		{ 
			$pro_image=$res_img[0]['pro_cat_image'];
		}
		if((!$_FILES['pro_cat_image1']['error']) && ($_FILES['pro_cat_image1'] !=''))
		{
			$pro_image1=rand(1,10000)."_".$_FILES['pro_cat_image1']['name'];
			move_uploaded_file($_FILES['pro_cat_image1']['tmp_name'],"uploads/pro_cat_images/".$pro_image1);
		}
		else
		{
			$pro_image1=$res_img[0]['pro_cat_banner_image'];
		}
				$data1 = array(
					"sub_cat_id"=> $sub_cat_id,
					"pro_cat_name" => $pro_cat_name,
					"pro_cat_desc" => $pro_cat_desc,
					"pro_cat_image"=>$pro_image,
					"pro_cat_banner_image"=>$pro_image1
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
					"msg" => "Successfully Deleted"
				); 
				return $output;
	}
	
	public function get_all_product_categories() {
        $query = $this->db->query("select * from pro_cat_items");       
        return $query->result_array();
    }
	
	/*Product Information*/
	
	public function add_product_info() {
		extract($_REQUEST);
		// print_r($_REQUEST);die;
		if((!$_FILES['pro_image']['error']) && ($_FILES['pro_image'] !='')){
			$pro_info_image=rand(1,10000)."_".$_FILES['pro_image']['name'];
			move_uploaded_file($_FILES['pro_image']['tmp_name'],"uploads/pro_info_images/".$pro_info_image);
		}
		if((!$_FILES['pro_image_2']['error']) && ($_FILES['pro_image_2'] !='')){
			$pro_info_image_2=rand(1,10000)."_".$_FILES['pro_image_2']['name'];
			move_uploaded_file($_FILES['pro_image_2']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_2);
		}
		if((!$_FILES['pro_image_3']['error']) && ($_FILES['pro_image_3'] !='')){
			$pro_info_image_3=rand(1,10000)."_".$_FILES['pro_image_3']['name'];
			move_uploaded_file($_FILES['pro_image_3']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_3);
		}
		if((!$_FILES['pro_image_4']['error']) && ($_FILES['pro_image_4'] !='')){
			$pro_info_image_4=rand(1,10000)."_".$_FILES['pro_image_4']['name'];
			move_uploaded_file($_FILES['pro_image_4']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_4);
		}
		if((!$_FILES['pro_image_5']['error']) && ($_FILES['pro_image_5'] !='')){
			$pro_info_image_5=rand(1,10000)."_".$_FILES['pro_image_5']['name'];
			move_uploaded_file($_FILES['pro_image_5']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_5);
		}
			$data1 = array(
					"cat_id" => $cat_id,
					"sub_cat_id" => $sub_cat_id,
					"pro_cat_id" => $pro_cat_id,
					"pro_name" => $pro_name,
					"pro_short_desc" => $pro_short_desc,
					"pro_model" => $pro_model,
					"pro_price" => $pro_price,
					"pro_prices" => $pro_prices,
					"pro_desc" => $summernote1,
					"pro_image" => $pro_info_image,
					"pro_image_2" => $pro_info_image_2,
					"pro_image_3" => $pro_info_image_3,
					"pro_image_4" => $pro_info_image_4,
					"pro_image_5" => $pro_info_image_5,
					"qty" => $qty,
					"status" => 1,
					"name" => $pro_name,
					"category_id" => $sub_cat_id,
					"offer_price" => $pro_prices,
					"discount_price" => $pro_price,
					"dateCreated" => date("Y-m-d H:i:s")
				);
				$this->db->insert("products", $data1);
				$login_id = $this->db->insert_id();
				
				//start insert into products attributes table added by venkat on 11022019
				foreach($catattr as $keyp=>$valuep)
				{
					$data2 = array();
					$data2["product_id"] = $login_id;
					$data2["category_attributes_id"] = $keyp;
					$data2["category_attributes_value"] = $valuep;					
					$this->db->insert('products_attributes',$data2);
				}
				//end insert into products attributes table added by venkat on 11022019 
			if($login_id)
			{
				$output = array(
					"resCode" => 1,
					"msg" => "Successfull", 
				);
			}
		return $output;
	}
	
	public function edit_productinfo() {
		extract($_REQUEST);
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
		if((!$_FILES['pro_image_2']['error']) && ($_FILES['pro_image_2'] !=''))
		{
			$pro_info_image_2=rand(1,10000)."_".$_FILES['pro_image_2']['name'];
			move_uploaded_file($_FILES['pro_image_2']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_2);
		} 
		else
		{
			$pro_info_image_2=$res_img[0]['pro_image_2'];
		}
		if((!$_FILES['pro_image_3']['error']) && ($_FILES['pro_image_3'] !=''))
		{
			$pro_info_image_3=rand(1,10000)."_".$_FILES['pro_image_3']['name'];
			move_uploaded_file($_FILES['pro_image_3']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_3);
		} 
		else
		{
			$pro_info_image_3=$res_img[0]['pro_image_3'];
		}
		if((!$_FILES['pro_image_4']['error']) && ($_FILES['pro_image_4'] !=''))
		{
			$pro_info_image_4=rand(1,10000)."_".$_FILES['pro_image_4']['name'];
			move_uploaded_file($_FILES['pro_image_4']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_4);
		} 
		else
		{
			$pro_info_image_4=$res_img[0]['pro_image_4'];
		}
		if((!$_FILES['pro_image_5']['error']) && ($_FILES['pro_image_5'] !=''))
		{
			$pro_info_image_5=rand(1,10000)."_".$_FILES['pro_image_5']['name'];
			move_uploaded_file($_FILES['pro_image_5']['tmp_name'],"uploads/pro_info_images/".$pro_info_image_5);
		} 
		else
		{
			$pro_info_image_5=$res_img[0]['pro_image_5'];
		}
		
				$data1 = array(
					//"cat_id" => $cat_id,
					//"sub_cat_id" => $sub_cat_id,
					"pro_cat_id" => $pro_cat_id,
					"lang_id" => $lang_id,
					"pro_name" => $pro_name,
					"pro_short_desc" => $pro_short_desc,
					"pro_price" => $pro_price,
					"pro_prices" => $pro_prices,
					"pro_model" => $pro_model,
					"pro_desc" => $summernote1,
					"pro_image" => $pro_info_image,
					"pro_image_2" => $pro_info_image_2,
					"pro_image_3" => $pro_info_image_3,
					"pro_image_4" => $pro_info_image_4,
					"pro_image_5" => $pro_info_image_5,
					"name" => $pro_name,
					//"category_id" => $sub_cat_id,
					"offer_price" => $pro_prices,
					"discount_price" => $pro_price,
					"qty" => $qty
				); 
			$this->db->where('prod_id', $prod_id);
			$this->db->update('products', $data1);
			
			
			//start insert into products attributes table added by venkat on 11022019
				foreach($catattr as $keyp=>$valuep)
				{
					//$data2 = array();
					//$data2["product_id"] = $login_id;
					//$data2["category_attributes_id"] = $keyp;
					//$data2["category_attributes_value"] = $valuep;					
					//$this->db->insert('products_attributes',$data2);
					$sql = "update products_attributes SET category_attributes_value ='".$valuep."' where product_id='".$prod_id."' and category_attributes_id ='".$keyp."' ";
					$this->db->query($sql);
				}
				//end insert into products attributes table added by venkat on 11022019 
				
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
        $query = $this->db->query("select * from products ORDER BY prod_id DESC");       
        return $query->result_array();
    } 
	
	public function get_search_product_info() {
		extract($_REQUEST);
			$qry = "select * from products WHERE 1=1 ";
			if((isset($cat_id) && $cat_id!=''))
			{
				$qry.=" AND cat_id='$cat_id'";
			}
			if(isset($sub_cat_id) && $sub_cat_id!='')
			{
				$qry.=" AND sub_cat_id='$sub_cat_id'";
			}
			if(isset($pro_cat_id) && $pro_cat_id!='')
			{
				$qry.=" AND pro_cat_id='$pro_cat_id'";
			}
			 $qry.=" ORDER BY prod_id DESC";
			$query = $this->db->query($qry);  
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
	
	public function get_sub_cat($cat=NULL){
        $query = $this->db->query("select * from sub_categories WHERE cat_id='$cat' ORDER BY sub_cat_name ASC");       
        return $query->result_array();
    }
	
	public function get_sub_cat_new($cat=NULL){
        $query = $this->db->query("select * from category WHERE parent_id='$cat' ORDER BY name ASC");       
        return $query->result_array();
    }
	
	public function get_pro_attr($id)
	{
		$query = $this->db->query("select a.* , b.name as attrname  from products_attributes a,category_attributes b   WHERE a.category_attributes_id=b.id and a.product_id='$id' ORDER BY b.id ASC");       
        return $query->result_array();
	}
	
	
	public function get_pro_cat($subcat=NULL){
        $query = $this->db->query("select * from pro_cat_items WHERE sub_cat_id='$subcat' ORDER BY pro_cat_name ASC");       
        return $query->result_array();
    }
	
	
	public function get_pro_cat_new($subcat=NULL){
        $query = $this->db->query("select * from category_attributes WHERE cat_id='$subcat' ORDER BY name ASC");       
        return $query->result_array();
    }
	
	
	
	public function get_users_list(){
        $query = $this->db->query("select * from users WHERE user_status!=0");
        return $query->result_array();
    }
	
	public function get_orders_list(){
        $query = $this->db->query("select u.first_name,u.last_name,u.mobile,u.email_id,u.address1,u.address2,u.city,od.order_no,od.pro_qty,od.pro_price,od.order_total,od.order_status,od.dateCreated,od.order_id,p.pro_name from orders as od right join users as u ON od.user_id=u.user_id right join products as p ON od.pro_id=p.prod_id WHERE od.order_no!='' group by od.order_no");
        return $query->result_array();
    }
	
	public function get_orders_product_list($od=NULL){

        $query = $this->db->query("select p.prod_id,p.pro_name,p.pro_short_desc,od.pro_qty,od.pro_price,od.order_total from products as p right join orders as od ON p.prod_id=od.pro_id where od.order_no='".$od."'");
        return $query->result_array();
    }
	
	public function view_order($order=NULL){
        $query = $this->db->query("select u.first_name,u.last_name,u.mobile,u.email_id,u.address1,u.address2,u.city,od.order_no,od.pro_qty,od.pro_price,od.order_total,od.order_status,od.dateCreated,p.pro_name,od.egg_option,od.delivery_time,od.specials,od.weight from orders as od right join users as u ON od.user_id=u.user_id right join products as p ON od.pro_id=p.prod_id WHERE od.order_no!='' AND od.order_no='$order'");
        return $query->result_array();
	}
	
	public function add_add_on() {
		extract($_REQUEST);
		if((!$_FILES['addon_image']['error']) && ($_FILES['addon_image'] !=''))
		{
			$new_image1=rand(1,10000)."_".$_FILES['addon_image']['name'];
			move_uploaded_file($_FILES['addon_image']['tmp_name'],"uploads/addon_images/".$new_image1);
		}
		$data1 = array(
			"add_on_name" => $add_on_name,
			"add_on_image" => $new_image1,
			"add_on_price" => $add_on_price,
			"dateCreated" => date("Y-m-d H:i:s")
		);
		$this->db->insert("add_ons", $data1);
		$login_id = $this->db->insert_id();
		$output = array(
			"resCode" => 1,
			"msg" => "Successfull",
		);
		return $output;	
	}
	
	public function get_add_ons(){
		$query = $this->db->query("select * from add_ons");
		return $query->result_array();
	}
	
	public function get_vendor_orders_list(){
 
        $query = $this->db->query("select u.first_name,u.last_name,u.mobile,u.email_id,u.address1,u.address2,u.city,od.order_no,od.pro_qty,od.pro_price,od.order_total,od.order_status,od.dateCreated,od.order_id,p.pro_name from orders as od right join users as u ON od.user_id=u.user_id right join products as p ON od.pro_id=p.prod_id WHERE od.order_no!='' group by od.order_no order by od.order_id DESC");
        return $query->result_array();
    }
	
	public function get_vendor_order_by_id($order_id=NULL){
 //"select od.order_no,od.pro_qty,od.pro_price,od.order_total,od.order_status,od.dateCreated,od.order_id,p.pro_name,od.order_remarks,od.message,od.size,od.delivery_date,od.delivery_time,od.specials,od.order_address,ua.user_id,ua.first_name,ua.last_name,ua.email_id,ua.mobile,ua.address1,ua.address2,ua.landmark,ua.city from orders as od right join products as p ON od.pro_id=p.prod_id right join users as ua ON od.user_id=ua.user_id WHERE od.order_id='$order_id' AND od.order_status!=5"
        $query = $this->db->query("select od.order_no,od.pro_qty,od.pro_price,od.order_total,od.order_status,od.dateCreated,od.order_id,p.pro_name,od.order_remarks,od.message,od.size,od.delivery_date,od.delivery_time,od.specials,od.order_address,ua.user_id,ua.first_name,ua.last_name,ua.email_id,ua.mobile,ua.address1,ua.address2,ua.city from orders as od right join products as p ON od.pro_id=p.prod_id right join users as ua ON od.user_id=ua.user_id WHERE od.order_id='$order_id'");
        $temp=$query->result_array();
		if(count($temp) > 0){
  			return (array) $temp;
  		}
		return false;
    }
	
	public function update_order() {
		extract($_REQUEST);
		$data1 = array(
			"order_status" => $order_status,
			"updatedOn" => date("Y-m-d H:i:s")
		);
		$this->db->where("order_id", $oId);
		$this->db->update("orders", $data1);
		$affected=$this->db->affected_rows();
		if($affected>0)
		{
			return true;
		}
		return false;
	}
	
	public function get_user_info($user_id=NULL){
        $query = $this->db->query("select u.first_name,u.last_name,u.mobile,u.email_id,u.address1,u.address2,u.city from users as u WHERE u.user_id='$user_id'");
        $temp=$query->result_array();
		if(count($temp) > 0){
  			return (array) $temp[0];
  		}
		return false;
    }
	
	public function get_addons_by_order($specials=NULL){
        $query = $this->db->query("select GROUP_CONCAT(add_on_name) as spls from add_ons WHERE add_on_id IN ($specials)");
        $temp=$query->result_array();
		if(count($temp) > 0){
  			return (array) $temp[0];
  		}
		return false;
    }
	
	public function get_add_on_info($add_on=NULL){
		$query = $this->db->query("select * from add_ons where add_on_id='$add_on'");
		$temp=$query->result_array();
		if(count($temp) > 0){
  			return (array) $temp[0];
  		}
		return false;
	}
	
	public function update_add_on() {
		extract($_REQUEST);
		$temp=$this->db->get_where("add_ons",array("add_on_id" => $id))->result_array();
		if((!$_FILES['addon_image']['error']) && ($_FILES['addon_image'] !=''))
		{
			$new_image1=rand(1,10000)."_".$_FILES['addon_image']['name'];
			move_uploaded_file($_FILES['addon_image']['tmp_name'],"uploads/addon_images/".$new_image1);
		}
		else
		{
			$new_image1=$temp[0]['add_on_image'];
		}
		$data1 = array(
			"add_on_name" => $add_on_name,
			"add_on_image" => $new_image1,
			"add_on_price" => $add_on_price,
			"dateCreated" => date("Y-m-d H:i:s")
		);
		$this->db->where("add_on_id", $id);
		$this->db->update("add_ons", $data1);
		$output = array(
			"resCode" => 1,
			"msg" => "Successfull",
		);
		return $output;
	}
	
	public function delete_add_on($add_on=NULL){
		$query = $this->db->query("select add_on_id from add_ons where add_on_id='$add_on'");
		$temp=$query->result_array();
		if(count($temp) > 0){
  			$temp2 = $this->db->query("delete from add_ons where add_on_id='$add_on'");
			return true;
  		}
		return false;
	}
	
	public function get_all_vendors(){
        $query = $this->db->query("select * from admin where admin_type=2");
        return $query->result_array();
    }
	
	public function get_vendor_by_id($vendor=NULL){
        $query = $this->db->query("select * from admin where admin_type=2 AND admin_id='$vendor'");
        $res=$query->result_array();
		if(count($res)>0)
		{
			return $res[0];
		}
		return false;
    }
	
	public function save_vendor($data){
		$this->db->insert("admin", $data);
		$lastid = $this->db->insert_id();
		if($lastid)
		{
			return true;
		}
		return false;
	}
	
	public function update_vendor($data,$id){
		$this->db->where("admin_id", $id);
		$this->db->update("admin", $data);
		$affected = $this->db->affected_rows();
		if($affected>0)
		{
			return true;
		}
		return false;
	}
	
	public function delete_vendor_by_id($id=NULL){
		$query = $this->db->query("select admin_id from admin where admin_id='$id'");
		$temp=$query->result_array();
		if(count($temp) > 0){
  			$temp2 = $this->db->query("delete from admin where admin_id='$id'");
			return true;
  		}
		return false;
	}
}