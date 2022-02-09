 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> FS Stock Update <small>Vehicle </small> <small>(Receive Stock) </small> </h2>
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
    <div class="col-sm-12">
        <div class="box-body">
            <?php  if($_SESSION["loginid"] != 'superadmin' || true)
              {
                  ?>
	     <table  class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td style="width:200px;">Vehicle No.</td>
               <td>FS</td>
			
			   <td> Distri Order No</td>
                <td> Purpose</td>
                <!--<td> Qty Rec</td>-->
               
                <td> RV Number</td>
                <td> RV Date</td>
               
				<td>Action</td>
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              /*if($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 3)
              {
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE district <> '' AND district LIKE '%".$_SESSION['name']."%' AND transfer = 1  ORDER BY stock_id DESC");
			  //echo "SELECT * FROM recivestockbytender  WHERE district <> '' AND district LIKE '%".$_SESSION['name']."%' AND transfer = 1  ORDER BY stock_id DESC";
              }else{
                  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE district <> '' ORDER BY stock_id DESC"); 
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   $count = 0;
					$tot = 0;
					
						//$sql = "SELECT a.*,b.logistics_name FROM recivestockbytender_new a,logistics_kits_masters b where a.item_id=b.id and a.to_transfer_id='".$this->session->userdata('unit')."' AND transfer = 1";
						
						 $sql = "select a.*,u.fs_name as disttts,u.id as diid,c.purpose from vehicle_allotment a LEFT JOIN vehicleD b on a.vehicleno=b.vhno

						LEFT JOIN tenders_details_new c ON c.tender_number=b.tender_number
						LEFT JOIN fsname_masters u ON u.id=a.fs_to

						where 1 and a.rv_number_fs IS NULL AND a.fs_to IS NOT NULL
						";
						
						
						if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and  a.fs_to='".$_SESSION['fs_name']."'  ";
			
			}
			
			
			//echo $sql;die;
					
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
					
					/*if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							if( $row['diid'] != $_SESSION['unit'] )
							{
								continue;
							}
						}
						*/
						
//					
				   
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				     if($row['qty_recieved'] > 0 || true)
				    {
				   ?>
				  
              <tr><form action="<?php echo base_url()?>Fscostockupdatevehicle/save" method="post">  <input type="hidden" name="ID" value="<?php echo $row['allotment_id']; ?>">
               <td style="width:200px;"><?php echo $row['vehicleno']; ?></td>
                
                <td><?php echo $row['disttts']; ?></td>
             
                <td><?php //echo $row['distribution_order_no']; ?>
				
				<?php
				if( $row['order_upload'] != '' && $row['order_upload'] != NULL && $row['order_upload'] != null && strlen($row['order_upload']) >10 )
				{
				?>
				<a target="_blank" href="<?php echo base_url()?><?php echo $row['order_upload']; ?>">
				
				<img src="<?php echo base_url()?>assets/img/download-icon.png" height="40px">
				</a>
				<?php }
				?>
				</td>
                <td><?php echo $row['purpose']; ?></td>
                <!--<td><?php echo $row['qty_recieved']; ?></td>-->
             
                 <td><input required  type="text" class="form-control" required placeholder="RV No" value="<?php echo $row['rv_number']; ?>"  <?php if(!empty($row['rv_number'])){ ?>  <?php } ?> name="rv_number"></td>
                  <td>	<input required type="date" class="form-control" placeholder="RV Date" value="<?php echo $row['rv_date']; ?>"  <?php if(!empty(rv_date)){ ?>  <?php } ?> name="rv_date"></td>
                  
			   <td><button type="submit" name="doSubmit" <?php if(!empty($row['rv_number'])){ ?> disabled <?php } ?>><img src="<?php echo base_url()?>assets/img/save-icon.png" height="30"></button> </td>
              
               
             </form> </tr>
			  
			  	
            
            
            <?php 
				    }
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="9"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table>
          	<?php } ?>
          </div>  <div class="col-sm-12" style="background-color:#d8e1f0;">
	 <div class="box-body">
	     
	     <table id="examplecom" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Vehicle No.</td>
               <td>FS</td>
			  <td>Purposes</td>
                <td> Distribution Order No</td>
                <!--<td> Qty Recieved</td>-->
                
                <td> RV Number</td>
                <td> RV Date</td>
                <!--<td>Available Stock</td>-->
				
                
              </tr>
            </thead>
            <tbody>
              <?php
			   /*if($_SESSION["name"] == 'superadmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND localpurchase = 0 AND transfer_fs = 0  ORDER BY stock_id DESC");
			  //echo "SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer_fs = 0 ORDER BY stock_id DESC";
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) {
*/
$count = 0;
					$tot = 0;
//$sql = "SELECT * FROM recivestockbytender";
//$sql = "SELECT * FROM recivestockbytender_new where to_transfer_id='".$this->session->userdata('unit')."' AND (transfer = 1 or transfer = 2 ) ";

/*
$sql = "SELECT a.*,b.logistics_name FROM recivestockbytender_new a,logistics_kits_masters b where a.item_id=b.id and a.to_transfer_id='".$this->session->userdata('unit')."' AND (transfer = 2 )";

$sql = "select a.*,u.unit_name as disttts,c.purpose from vehicle_allotment a LEFT JOIN vehicleD b on a.vehicleno=b.vhno

						LEFT JOIN tenders_details_new c ON c.tender_number=b.tender_number
						LEFT JOIN units_masters u ON u.id=a.unit_to

						where 1 and a.rv_number IS NOT NULL
						";
					*/	
						
						
						 $sql = "select a.*,u.fs_name as disttts,u.id as diid,c.purpose from vehicle_allotment a LEFT JOIN vehicleD b on a.vehicleno=b.vhno

						LEFT JOIN tenders_details_new c ON c.tender_number=b.tender_number
						LEFT JOIN fsname_masters u ON u.id=a.fs_to

						where 1 and a.rv_number_fs IS NOT NULL AND fs_to IS NOT NULL
						";
						
							if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and  a.fs_to='".$_SESSION['fs_name']."'  ";
			
			}
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){					   
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				    /*$totalInvoicesqty_recieved = mysql_query("SELECT SUM(qty_recieved) AS qty_recieved FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer_fs = 1 AND item_name = '".$row['item_name']."' ORDER BY stock_id DESC");
				    $qty_recieved = mysql_fetch_array($totalInvoicesqty_recieved);*/
					
					
					$sql = "SELECT SUM(qty_recieved) AS qty_recieved FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer_fs = 1 AND item_name = '".$row['item_name']."' ORDER BY stock_id DESC";
				    $qty_recieved = $this->db->query($sql)->row_array();
				    
				     $qty_recieved['qty_recieved'] =  $qty_recieved['qty_recieved'] + $row['qty_recieved'];
				    
				    
				    
				   ?>
              <tr>
               <td><?php echo $row['vehicleno']; ?></td>
                
                <td><?php echo $row['disttts']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td>
				<?php
				if( $row['order_upload'] != '' && $row['order_upload'] != NULL && $row['order_upload'] != null && strlen($row['order_upload']) >10 )
				{
				?>
				<a target="_blank" href="<?php echo base_url()?><?php echo $row['order_upload']; ?>"><img src="<?php echo base_url()?>assets/img/download-icon.png" height="40px"></a>
				<?php }
				?>
				
				
				</td>
                <!--<td><?php echo $qty_recieved['qty_recieved']; ?></td>-->
              
                 <td><?php echo $row['rv_number_fs']; ?></td>
                  <td><?php echo $row['rv_date_fs']; ?></td>
                    <!--<td><?php echo $row['to_transfer_closing_stock']; ?></td>-->
			  
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }?>
            </tbody>
            
            
          </table></div>
		  </div>
  
 
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