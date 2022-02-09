 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> FS Stock Update <small>logistics </small> <small>(Receive Stock) </small> </h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
	  <div class="container-fluid">
	 <?php echo  $this->session->flashdata('message'); ?>
  <div class="row">
    <div class="col-sm-12">
        <div class="box-body">
            <?php  if($_SESSION["loginid"] != 'superadmin' or true )
              {
                  ?>
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td style="width:200px;">Item Name</td>
               <td>District</td>
			  <td>Discription</td>
			   <td> Distri Order No</td>
                <td> Purpose</td>
                <td> Qty Rec</td>
               
                <td> RV Number</td>
                <td> RV Date</td>
               
				<td>Action</td>
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
             // print_r($_SESSION);
              /*if($_SESSION['login_role'] == 8)
			    {
			     $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE fs_name <> '' AND fs_name LIKE '%".$_SESSION['fs_name']."%' AND transfer_fs = 1  ORDER BY stock_id DESC");   
			     //echo "SELECT * FROM recivestockbytender  WHERE fs_name <> '' AND fs_name LIKE '%".$_SESSION['fs_name']."%' AND transfer_fs = 1  ORDER BY stock_id DESC";
			    }else{
                  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE fs_name <> '' ORDER BY stock_id DESC"); 
              }
			  */
				  	$count = 0;
					$tot = 0;
					/*if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				  // $sql = "SELECT * FROM recivestockbytender  WHERE fs_name <> '' ORDER BY stock_id DESC";

$sql = "SELECT a.*,b.logistics_name,c.fs_name as fss,u.unit_name FROM recivestockbytender_new a,logistics_kits_masters b ,fsname_masters c,units_masters u  where u.id=a.from_transfer_id and  a.to_transfer_id=c.id and  a.item_id=b.id  AND (transfer_fs = 1) and a.to_transfer_type='FS'";

	if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and  a.from_transfer_id='".$this->session->userdata('unit')."' and a.to_transfer_type='FS' ";
			
			}
			
			
			if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and  a.to_transfer_id='".$_SESSION['fs_name']."' and a.to_transfer_type='FS' ";
			
			}
			
			
$sql .=" order by a.stock_id desc";


//echo $sql;
/*print_r($_SESSION);
die;
*/
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				     if($row['qty_recieved'] > 0)
				    {
				   ?>
				  
              <tr><form action="<?php echo base_url()?>FScostockupdate/save" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td style="width:200px;"><?php echo $row['logistics_name']; ?></td>
                
                <td><?php echo $row['unit_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['distribution_order_no']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['qty_recieved']; ?></td>
             
                 <td><input type="text" class="form-control" placeholder="RV No" value="<?php echo $row['rv_number']; ?>"  <?php if(!empty($row['rv_number'])){ ?> disabled <?php } ?> name="rv_number"></td>
                  <td>	<input type="date" class="form-control" placeholder="RV Date" value="<?php echo $row['rv_date']; ?>"  <?php if(!empty($row['rv_number'])){ ?> disabled <?php } ?> name="rv_date"></td>
                  
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
          </div>
	 <div class="box-body">
	     
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Item Name</td>
               <td>District</td>
			  <td>Discription</td>
                <td> Distribution Order No</td>
                <td> Qty Recieved</td>
                
                <td> RV Number</td>
                <td> RV Date</td>
                <td>Available Stock</td>
				
                
              </tr>
            </thead>
            <tbody>
              <?php
			  /* if($_SESSION["name"] == 'superadmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND localpurchase = 0 AND transfer_fs = 1  ORDER BY stock_id DESC");
			  //echo "SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer_fs = 0 ORDER BY stock_id DESC";
              }
			  */
				  	$count = 0;
					$tot = 0;
				//	if(mysql_num_rows($totalInvoices) > 0)
					//{
				   //while($row = mysql_fetch_array($totalInvoices)) { 
				     //$sql = "SELECT * FROM recivestockbytender  ORDER BY stock_id DESC";


$sql = "SELECT a.*,b.logistics_name,c.fs_name as fss,u.unit_name FROM recivestockbytender_new a,logistics_kits_masters b ,fsname_masters c,units_masters u  where u.id=a.from_transfer_id and  a.to_transfer_id=c.id and  a.item_id=b.id and a.to_transfer_id='".$this->session->userdata('fs_name')."' AND (transfer_fs = 2) order by a.stock_id desc";


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
				    $qty_recieved = mysql_fetch_array($totalInvoicesqty_recieved);
				    
				    
				     $qty_recieved['qty_recieved'] =  $qty_recieved['qty_recieved'] + $row['qty_recieved'];*/
					 
					 
					 /*$sql = "SELECT SUM(qty_recieved) AS qty_recieved FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer_fs = 1 AND item_name = '".$row['item_name']."' ORDER BY stock_id DESC";
					 $qty_recieved = $this->db->query($sql)->row_array();
				    $qty_recieved['qty_recieved'] =  $qty_recieved['qty_recieved'] + $row['qty_recieved'];
				    */
				    
				   ?>
              <tr>
               <td><?php echo $row['logistics_name']; ?></td>
                
                <td><?php echo $row['unit_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['distribution_order_no']; ?></td>
                <td><?php echo $row['qty_recieved']; ?></td>
              
                 <td><?php echo $row['rv_number']; ?></td>
                  <td><?php echo $row['rv_date']; ?></td>
                    <td><?php echo $row['to_transfer_closing_stock']; ?></td>
			  
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="9"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
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