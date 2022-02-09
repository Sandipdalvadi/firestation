<?php 
require_once APPPATH."/third_party/PHPExcel.php";
class Import_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function save_import()
	{
		if((!$_FILES['import_customer']['error']) && ($_FILES['import_customer'] !=''))
		{
			$new_image=rand(1,10000)."_".$_FILES['import_customer']['name'];
			move_uploaded_file($_FILES['import_customer']['tmp_name'],"import/".$new_image);
		}
			$file = "import/".$new_image;
				//load the excel library
				$this->load->library('excel');
				//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				//get only the Cell Collection
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
				//extract to a PHP readable array format
				foreach ($cell_collection as $cell) {
					$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
					//header will/should be in row 1 only. of course this can be modified to suit your need.
					if ($row == 1) {
						$header[$row][$column] = $data_value;
					} else {
						$arr_data[$row][$column] = $data_value;
					}
				}
				//send the data in an array format
				$data['header'] = $header;
				$data['values'] = $arr_data; 
				$length=sizeof($data['values']);
				// $import=mysql_fetch_assoc(mysql_query("select * from import_customers where id=1"));
					foreach($data['values'] as $key=>$val) 
					{
						// extract($import);
						$query = $this->db->query("select * from products WHERE pro_name = '".$val['A']."'");
						$res=$query->result_array();						// print_r($res);die;
						if($res[0]['prod_id']!='')
						{
							if(isset($val['B']) && $val['B']!=''){ $pro_1_7_price=$val['B'];}else{ $pro_1_7_price=$res[0]['pro_1_7_price'];}
							if(isset($val['C']) && $val['C']!=''){ $pro_8_18_price=$val['C'];}else{ $pro_8_18_price=$res[0]['pro_8_18_price'];}
							if(isset($val['D']) && $val['D']!=''){ $pro_19_44_price=$val['D'];}else{ $pro_19_44_price=$res[0]['pro_19_44_price'];}
							if(isset($val['E']) && $val['E']!=''){ $pro_45_price=$val['E'];}else{ $pro_45_price=$res[0]['pro_45_price'];}
							$qty=$res[0]['qty'];							$qty=$val['F'];
							$data = array(
									"pro_prices" =>$pro_1_7_price,
									"pro_1_7_price" =>$pro_1_7_price,
									"pro_8_18_price" => $pro_8_18_price,
									"pro_19_44_price" => $pro_19_44_price,
									"pro_45_price" => $pro_45_price,
									"qty" => $qty
									// "updatedOn" => date('Y-m-d H:i:s')
								);
							$this->db->where("prod_id", $res[0]['prod_id']);
							$this->db->update("products", $data);
							 
							$data2 = array(
									"pro_id" =>$res[0]['prod_id'],
									"pro_qty" =>$val['F'],
									"login_id" => $this->session->userdata('loginUser'),
									"dateCreated" => date('Y-m-d H:i:s')
								);
							 $this->db->insert("products_qty_history", $data2);
						}
					}
				unlink($file);
		return 1;
	}
}