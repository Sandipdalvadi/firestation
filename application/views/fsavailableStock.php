<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--<h1> FS Available Stock</h1>-->
	  
	  
	   <h1> <?php
				/*if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			echo "FS wise Logistics Available Stock";
		}else{
			//$sql = "SELECT * FROM units_masters where id='".$this->session->userdata('unit')."' limit 1";
			//$rowsname = $this->db->query($sql)->row_array();
			 echo "FS wise Available Stock";
			?>
		<?php }
		*/
		echo "FS wise Logistics Available Stock";
		
		
		$iddOnly = 0;
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$iddOnly = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$iddOnly .= ",".$rowMakesD["district_id"];
							}
							//$sql .= " AND id in (".$idd.") ";
						}
			?>
		
		</h1>
	  
	  
	  
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
	  <div class="container-fluid">
	  <?php if(isset($_GET['doneid'])){ ?>
		<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i><b> Record has Been updated Sucessfully !</b></h4>
               
              </div>
		<?php } ?>
			 <script>
				  function populateFS(unitId)
				  {
					  $.ajax({
				url: "<?php echo base_url()?>FswiseDistribution/getfs",
				type: "POST",
				data: {
					unitId: unitId									
				},
				cache: false,
				success: function(dataResult){
					$("#sel_fs_id").html(dataResult);
				}
			});
				  }
				  </script>
  <div class="row">
   <form name="form" method="post" action="<?php echo base_url()?>FsavailableStock">
   <div class="form-group row">
				
				<?php
				$show = 0;
				//if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
				//print_r($_SESSION);	
				if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )
		{
			$show = 1;
			?>
					<label for="example-search-input" class="col-sm-12 col-form-label">Search by District</label>
				  <div class="col-sm-12">
					
					<select class="form-control show-tick select2" name="sel_unit_id" onchange="populateFS(this.value)" >  
						<option value="">All District</option>		
						<?php 
						//$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
						
						
						$sql = "SELECT * FROM units_masters where 1  ";
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							$sql .= " AND id in (".$idd.") ";
						}
						
						$sql .= " ORDER BY id DESC";
						
						
						
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if($_POST["sel_unit_id"] == $rowMakes['id'] ) echo "selected";?> ><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
						
				  </div> 
					<?php }
					?>
					
					
						<?php
						//$_SESSION['fs_name']
				if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
			$show = 1;
			?>
					<label for="example-search-input" class="col-sm-12 col-form-label">Search by FS</label>
				  <div class="col-sm-6">
					
					<select class="form-control show-tick select2" name="sel_fs_id" id="sel_fs_id" >  
						<option value="">All FS</option>
<?php
/*if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )
{
}
else	
		{
		$sql = "select * from fsname_masters where unit_id='".$this->session->userdata('unit')."'";
	    $result = $this->db->query($sql)->result_array();	    
	    foreach($result as $key => $value)
	    {
?><option value="<?php echo $value['id']?>"><?php echo $value['fs_name']?></option>
		<?php }
		}
		*/
?>		
						
                        </select>
						
				  </div> 
					<?php }
					?>
					
					</div>
					<?php
					if($show ==1 or true )
					{
					?>
					<div class="col-sm-6"><input type="submit" class="btn btn-primary" value="Submit"></div>
					<?php }
					?>
					</form>
      <div class="col-sm-12" style="background-color:#d8e1f0;">
  <div class="box-body">
          <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
             <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
             
			  <th>Item Name</th>
			   <th>FS</th>
             
               <!--<th>Purchase From</th>
			  <th>Discription</th>
                <th> Purpose</th>
              
                <th> Qty Rec</th>
             
                <th> Amount</th>
                <!--<th>Tender Type</th>
                <th>Tender No</th>
                
                <th>Head of Account</th>-->
               
			                     <th> Servicable Stock</th>	
              <th> Un Servicable Stock</th>	
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              /*if($_SESSION["name"] == 'SuperAdmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender    WHERE  transfer = 0 AND  transfer_fs = 0 ORDER BY stock_id DESC"); 
              //echo "SELECT * FROM recivestockbytender    WHERE  transfer = 0 AND  transfer_fs = 0 ORDER BY stock_id DESC";
              }else{
			  $totalInvoices = mysql_query("SELECT DISTINCT item_name FROM recivestockbytender WHERE (updated_by = '".$_SESSION["name"]."') AND fs_name = '' ORDER BY stock_id DESC");
			  //echo "SELECT DISTINCT item_name FROM recivestockbytender WHERE (updated_by = '".$_SESSION["name"]."') AND fs_name = '' ORDER BY stock_id DESC";
              }
			  
			  
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row222 = mysql_fetch_array($totalInvoices)) {*/


						$sql = "SELECT MAX(stock_id) as stock_id,item_id,tender_id,from_transfer_id,to_transfer_id FROM recivestockbytender_new where from_transfer_type='District' AND to_transfer_type='FS' ";
						/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							$sql .= " and to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District' ";
						}
						*/
						
							/*if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and (to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District')
					OR ( from_transfer_id='".$_SESSION['unit']."' and from_transfer_type='District' )
			";
			}
			
			$sql .= " group by item_id ,from_transfer_id  ";
			
			*/
			
			
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			//$sql .= " and  from_transfer_id='".$this->session->userdata('unit')."' and to_transfer_type='FS' ";
			
			}
			if($iddOnly != 0 )
			$sql .= " and  from_transfer_id in (".$iddOnly.") and to_transfer_type='FS' ";
			
			
			
			if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and  to_transfer_id='".$_SESSION['fs_name']."' and to_transfer_type='FS' ";
			
			}
			
			$sql .= " group by item_id ,to_transfer_id  ";
			
	
		
		
						
						//echo $sql;die;
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					   $fs_ids = "0";
					foreach($rows as $key=>$row){


						
				   $count++;
				    $tot = $tot+$row['total_income'];
				    /*if($_SESSION["name"] == 'SuperAdmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
				     $totalInvoicesere =[];// mysql_query("SELECT * FROM recivestockbytender WHERE item_name = '".$row222['item_name']."' AND transfer = 0");
              }else{
                  $totalInvoicesere = [];//mysql_query("SELECT * FROM recivestockbytender WHERE item_name = '".$row222['item_name']."' AND updated_by = '".$_SESSION["name"]."' AND transfer = 0");
              }
                   */
				   
				    // $row = [];//mysql_fetch_array($totalInvoicesere);
				     
				     // tender no
				        $item_name = [];//mysql_query("SELECT tender_number FROM recivestockbytender WHERE item_name LIKE '%".$row222['item_name']."%'");
				        
				    
				     $row24242 = [];//mysql_fetch_array($item_name);
				     
				      $item_name_rec = [];//mysql_query("SELECT actual_qty FROM recivestockbytender WHERE item_name LIKE '%".$row222['item_name']."%' AND actual_qty <> ''");
				        
				    
				     $row24121211 = [];//mysql_fetch_array($item_name_rec);
					 
					  $s2 = "select * from logistics_kits_masters  WHERE  id = '".$row['item_id']."'";
					
					$row222 = $this->db->query($s2)->row_array();
					
					
					$s3 = "select * from tenders_details_new  WHERE  id = '".$row['tender_id']."'";
					
					$row333 = $this->db->query($s3)->row_array();
					
					
					$s4 = "select * from fsname_masters  WHERE  (id = '".$row['to_transfer_id']."' ) ";				
					$row444 = $this->db->query($s4)->row_array();
					
					
					///local stock_id
					
					
					//current stock_id
					
					$sql_stock = "SELECT fs_current_stock  FROM recivestockbytender_new where 1 ";
						/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							$sql .= " and to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District' ";
						}
						*/
						
							if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql_stock .= " and  from_transfer_id='".$this->session->userdata('unit')."' and to_transfer_type='FS' ";
			}
			
			
				
			if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql_stock .= " and  to_transfer_id='".$_SESSION['fs_name']."' and to_transfer_type='FS' ";
			
			}
			
			$sql_stock .= " and item_id='".$row['item_id']."' order by stock_id desc limit 1";
					
			$row_Stock = 	$this->db->query($sql_stock)->row_array();	
			
			
			
			$s4n = "select * from units_masters  WHERE  id = '".$row['from_transfer_id']."'";				
					$row444n = $this->db->query($s4n)->row_array();
					
					$s5n = "select * from fsname_masters  WHERE  id = '".$row['to_transfer_id']."'";				
					$row555n = $this->db->query($s5n)->row_array();
					
					
					if( isset($_POST["sel_unit_id"]) && !empty($_POST["sel_unit_id"]) )
			{
					if($row444n["id"] != $_POST["sel_unit_id"] )	
					{
						continue;
					}
						//echo $sql;die;
			}
					if( isset($_POST["sel_fs_id"]) && !empty($_POST["sel_fs_id"]) )
			{
					if($row555n["id"] != $_POST["sel_fs_id"] )	
					{
						continue;
					}
						//echo $sql;die;
			}
					
				   ?>
				  
              <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
			   <td><?php echo $row222['logistics_name']; ?></td>
			      <td><?php echo $row444['fs_name']; ?></td>
                
              
<td><?php 

$slocal= "select IFNULL(sum(qty),0) as localstock,IFNULL(sum(unservcableqty),0) as localstockun from local_stock_fs where fs_id='".$row444["id"]."' and item_id ='".$row222['id']."'";
					$rLOCALST = $this->db->query($slocal)->row_array();
					
					$fs_ids .= ",".$row['item_id'];
					
					
echo $row_Stock['fs_current_stock'] + $rLOCALST["localstock"];//['to_transfer_closing_stock'];//$row222['actual_qty'] - $row222['qty_recieved']; ?></td>
			
             <td><?php echo $rLOCALST['localstockun']; ?></td>   
             </tr>
			  
			  	
            
            
            <?php 
				  }
				  }

				//local stock which r not there is transfer stock brand new local stock
				
				$sql_9 = "select SUM(a.qty) as stst,b.logistics_name,c.fs_name,c.id as fsid from local_stock_fs a ,logistics_kits_masters b  
				,fsname_masters c where a.item_id=b.id and c.id = a.fs_id and a.item_id NOT IN (".$fs_ids.") group by a.item_id,a.fs_id";
				$rows_9 = $this->db->query($sql_9)->result_array();
				foreach($rows_9 as $k1 => $v1 )
				{
					
					
					
					$s4n = "select * from units_masters  WHERE  id = '".$row['from_transfer_id']."'";				
					$row444n = $this->db->query($s4n)->row_array();
					
					$s5n = "select * from fsname_masters  WHERE  id = '".$v1['fsid']."'";				
					$row555n = $this->db->query($s5n)->row_array();
					
					
					if( isset($_POST["sel_unit_id"]) && !empty($_POST["sel_unit_id"]) )
			{
					if($row444n["id"] != $_POST["sel_unit_id"] )	
					{
						continue;
					}
						//echo $sql;die;
			}
					if( isset($_POST["sel_fs_id"]) && !empty($_POST["sel_fs_id"]) )
			{
					if($row555n["id"] != $_POST["sel_fs_id"] )	
					{
						continue;
					}
						//echo $sql;die;
			}
			
			
					?>
					 <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
					  <td><?php echo $v1['logistics_name']; ?></td>
			      <td><?php echo $v1['fs_name']; ?></td>
				   <td><?php echo $v1['stst']; ?></td>
				   </tr>
					<?php 
				}
				  ?>
            </tbody>
            
            
          </table></div> 
  </div>
</div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->