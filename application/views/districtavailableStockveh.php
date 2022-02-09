<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> District Available Vehicle Stock</h1>
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
				if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			?>
					<label for="example-search-input" class="col-sm-12 col-form-label">Search by District</label>
				  <div class="col-sm-12">
					<form name="form" method="post" action="<?php echo base_url()?>DistrictavailableStockveh">
					<select class="form-control show-tick select2" name="sel_unit_id" onchange="javascript:this.form.submit()">  
						<option value="">All District</option>		
						<?php 
						$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
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
             
			  <th>Vehicle Description</th>
			   <th>District</th>
             
               <!--<th>Purchase From</th>
			  <th>Discription</th>
                <th> Purpose</th>
              
                <th> Qty Rec</th>
             
                <th> Amount</th>
                <!--<th>Tender Type</th>
                <th>Tender No</th>
                
                <th>Head of Account</th>-->
               
			                     <th> Current Available Stock</th>	
              
              
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


						/*$sql = "SELECT * FROM ( SELECT MAX(stock_id) as stock_id,item_id,from_transfer_id,to_transfer_id FROM recivestockbytender_new where from_transfer_type='Main' OR from_transfer_type='District' ";*/
						/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							$sql .= " and to_transfer_id='".$_SESSION['unit']."' and to_transfer_type='District' ";
						}
						*/
						$sql = "select count(*) as cnt,a.unit_to as to_transfer_id ,c.name as descptn from vehicle_allotment a , vehicleD b , description_by_vehicle_type_masters c  where  a.vehicleno=b.vhno and c.id=b.vehicle_description and a.unit_to IS NOT NULL AND fs_to IS NULL ";
						
							if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and a.unit_to ='".$this->session->userdata('unit')."'";
			}
			
			
		
			$sql .= " group by b.vehicle_description  ";
			
			
			

		
		
						
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
				        
				    $s4 = "select * from units_masters  WHERE  id = '".$row['to_transfer_id']."'  ";				
					$row444 = $this->db->query($s4)->row_array();



if( isset($_POST["sel_unit_id"]) && !empty($_POST["sel_unit_id"]) )
			{
					if($row444["id"] != $_POST["sel_unit_id"] )	
					{
						continue;
					}
						//echo $sql;die;
			}
									
					//$itemsss_idds .= ",".$row222['id'];
				   ?>
				  
              <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
			   <td><?php echo $row['descptn']; ?></td>
			      <td><?php echo $row444['unit_name']; ?></td>

 
<td><?php 

/*$slocal= "select IFNULL(sum(qty),0) as localstock from local_stock_unit where unit_id='".$row444["id"]."' and item_id ='".$row222['id']."'";
					$rLOCALST = $this->db->query($slocal)->row_array();

echo $row_Stock['dist_current_stock']+ $rLOCALST["localstock"];//['to_transfer_closing_stock'];//$row222['actual_qty'] - $row222['qty_recieved']; ?></td>
			
  */
 echo $row['cnt']; ?>
             </tr>
			  
			  	
            
            
            <?php 
				  }
				  }



//local stock which r not there is transfer stock brand new local stock
				
				/*$sql_9 = "select SUM(a.qty) as stst,b.logistics_name,c.unit_name from local_stock_unit a ,logistics_kits_masters b  
				,units_masters c where a.item_id=b.id and c.id = a.unit_id and a.item_id NOT IN (".$itemsss_idds.") group by a.item_id,a.unit_id";
				$rows_9 = $this->db->query($sql_9)->result_array();
				foreach($rows_9 as $k1 => $v1 )
				{
					?>
					 <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
             
					  <td><?php echo $v1['logistics_name']; ?></td>
			      <td><?php echo $v1['unit_name']; ?></td>
				   <td><?php echo $v1['stst']; ?></td>
				   </tr>
					<?php 
				}*/
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