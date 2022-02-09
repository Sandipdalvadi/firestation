<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <?php
			/*	if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			echo "District wise Logistics Available Stock";
		}else{
			/*$sql = "SELECT * FROM units_masters where id='".$this->session->userdata('unit')."' limit 1";
			$rowsname = $this->db->query($sql)->row_array();
			 echo "Current Available Stock  of ".$rowsname["unit_name"];*/
			// echo "District wise Logistics Available Stock";
			
			?>
		<?php // }
		 echo "District wise Logistics Available Stock";
		 
		 
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
		
		
		
  <div class="row">
  
  
  <div class="form-group row">
				
				<?php
				
				//print_r($_SESSION);
				
				if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) or 1==1 )	
		{
			
			
						//echo $sql;die;
			?>
					<label for="example-search-input" class="col-sm-12 col-form-label">Search by District</label>
				  <div class="col-sm-12">
					<form name="form" method="post" action="<?php echo base_url()?>districtavailableStock">
					<select class="form-control show-tick select2" name="sel_unit_id" >  
						<option value="">All District</option>		
						<?php 
						$sql = "SELECT * FROM units_masters where 1  ";
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$idd = "";
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
						
						<br/><br/>
						
						
						
						<select class="form-control show-tick select2" name="sel_item_id" >  
						<option value="">All Items</option>		
						<?php 
						$sql = "SELECT * FROM logistics_kits_masters where 1  ";
						/*
						$idd = 0;
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							//$sql .= " AND id in (".$idd.") ";
						}
						*/
						$sql .= " ORDER BY id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if($_POST["sel_item_id"] == $rowMakes['id'] ) echo "selected";?> ><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
							<br/><br/>
						<input type="submit" value="Search">
						
						</form>
				  </div> 
					<?php }
					?>
					</div>
  
      <div class="col-sm-12" style="background-color:#d8e1f0;">
  <div class="box-body">
          <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
             <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
             
			  <th>Item Name</th>
			   <th>District</th>
             
               <!--<th>Purchase From</th>
			  <th>Discription</th>
                <th> Purpose</th>
              
                <th> Qty Rec</th>
             
                <th> Amount</th>
                <!--<th>Tender Type</th>
                <th>Tender No</th>
                
                <th>Head of Account</th>-->
               
			                     <!--<th> Current Available Stock</th>	-->
              <th> Servicable  Stock</th>
              <th> Un Servicable  Stock</th>
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


						$sql = "SELECT * FROM ( SELECT MAX(stock_id) as stock_id,item_id,from_transfer_id,to_transfer_id FROM recivestockbytender_new where from_transfer_type='Main' OR from_transfer_type='District' ";
						/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							$sql .= " and to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District' ";
						}
						*/
						
							if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			////$sql .= " and ( (to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District')
				////	OR ( from_transfer_id='".$_SESSION['unit']."' and from_transfer_type='District' ) )
			////";
			}
			
			if( $iddOnly != 0 )
			{
				$sql .= " and ( (to_transfer_id in (".$iddOnly.") and to_transfer_type='District')
				OR ( from_transfer_id in (".$iddOnly.")  and from_transfer_type='District' ) )";
			}
			
			
		
			$sql .= " group by item_id ,from_transfer_id  ";
			
			
			$sql .= " ) as tmp group by item_id ";
	
		
		
						
						//echo $sql;die;
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
						$itemsss_idds = "0";
				   //while($row = mysqli_fetch_array($totalInvoices)) {
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
					
					
					//$s3 = "select * from tenders_details_new  WHERE  id = '".$row['tender_id']."'";
					
					//$row333 = $this->db->query($s3)->row_array();
					
					
					$s4 = "select * from units_masters  WHERE  (id = '".$row['to_transfer_id']."' or id = '".$row['from_transfer_id']."' ) ";				
					$row444 = $this->db->query($s4)->row_array();
					
					//current stock_id
					
					$sql_stock = "SELECT dist_current_stock  FROM recivestockbytender_new where 1 ";
						/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							$sql .= " and to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District' ";
						}
						*/
						
							if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			////$sql_stock .= " and (to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District')
					////OR ( from_transfer_id='".$_SESSION['unit']."' and from_transfer_type='District' )
			///";
			}
			
			if( $iddOnly != 0 )
			{
				$sql_stock .= " and (to_transfer_id in (".$iddOnly.")  and to_transfer_type='District')
				OR ( from_transfer_id in (".$iddOnly.")  and from_transfer_type='District' )"; ///55555
			}
			
			$sql_stock .= " and item_id='".$row['item_id']."' order by stock_id desc limit 1";
					
			$row_Stock = 	$this->db->query($sql_stock)->row_array();


if( isset($_POST["sel_unit_id"]) && !empty($_POST["sel_unit_id"]) )
			{
					if($row["from_transfer_id"] != $_POST["sel_unit_id"] && $row["to_transfer_id"] != $_POST["sel_unit_id"]  )	
					{
						continue;
					}
						//echo $sql;die;
			}
			
			
			if( isset($_POST["sel_item_id"]) && !empty($_POST["sel_item_id"]) )
			{
					if($row["item_id"] != $_POST["sel_item_id"]  )	
					{
						continue;
					}
						//echo $sql;die;
			}
									
					$itemsss_idds .= ",".$row222['id'];
				   ?>
				  
              <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
			   <td><?php echo $row222['logistics_name']; ?></td>
			      <td><?php echo $row444['unit_name']; ?></td>
                 <?php if(false){ ?>
                <td><?php echo $row['purchase_from']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
               
                <td><?php echo $row['qty_recieved']; ?></td>
                 <?php } ?>
                 <?php if(false){ ?>
                <td><?php echo $row['amount']; ?></td>
                 <!--<td><?php echo $row333['tender_type']; ?></td>
                  <td><?php echo $row333['tender_number']; ?></td>-->
                 
                  <td><?php echo $row['head_of_account']; ?></td>
                   <?php } ?>
<td><?php 

$slocal= "select IFNULL(sum(qty),0) as localstock , IFNULL(sum(unservcableqty),0) as localstockun  from local_stock_unit where unit_id='".$row444["id"]."' and item_id ='".$row222['id']."'";
					$rLOCALST = $this->db->query($slocal)->row_array();

echo $row_Stock['dist_current_stock']+ $rLOCALST["localstock"];//['to_transfer_closing_stock'];//$row222['actual_qty'] - $row222['qty_recieved']; ?></td>
			
 <td><?php 

echo $row_Stock['dist_current_stock']+ $rLOCALST["localstock"]-$rLOCALST["localstockun"]; ?></td>              
             </tr>
			  
			  	
            
            
            <?php 
				  }
				  }



//local stock which r not there is transfer stock brand new local stock
				
				$sql_9 = "select SUM(a.qty) as stst,SUM(a.unservcableqty) as ststun,b.logistics_name,b.id as logid,c.unit_name,c.id as u_id from local_stock_unit a ,logistics_kits_masters b  
				,units_masters c where a.item_id=b.id and c.id = a.unit_id and a.item_id NOT IN (".$itemsss_idds.") group by a.item_id,a.unit_id";
				$rows_9 = $this->db->query($sql_9)->result_array();
				foreach($rows_9 as $k1 => $v1 )
				{
					
					
					if( isset($_POST["sel_unit_id"]) && !empty($_POST["sel_unit_id"]) )
			{
					if($rows_9["u_id"] != $_POST["sel_unit_id"]  )	
					{
						continue;
					}
						//echo $sql;die;
			}
			
			
			
			if( isset($_POST["sel_item_id"]) && !empty($_POST["sel_item_id"]) )
			{
					if($rows_9["logid"] != $_POST["sel_item_id"]  )	
					{
						continue;
					}
						//echo $sql;die;
			}
					
					
					
					?>
					 <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
					  <td><?php echo $v1['logistics_name']; ?></td>
			      <td><?php echo $v1['unit_name']; ?></td>
				   <td><?php echo $v1['stst']; ?></td>
				   <td><?php echo $v1['ststun']; ?></td>
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