 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> District Stock Update <small>logistics </small> <small>(Receive Stock) </small> </h2>
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
            <?php  if($_SESSION["loginid"] != 'superadmin')
              {
                  ?>
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td style="width:200px;">Item Name</td>
               <!--<td>District</td>-->
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
							
						}
						
						
						
					
						$sql = "SELECT a.*,b.logistics_name FROM recivestockbytender_new a,logistics_kits_masters b where a.item_id=b.id   AND transfer = 1 ";
						if($idd != 0 )
							$sql .= " and a.to_transfer_id in (".$idd.")";
						
						
						//echo $sql;die;
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
				  
              <tr><form action="<?php echo base_url()?>Districtcostockupdate/save" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td style="width:200px;"><?php echo $row['logistics_name']; ?></td>
                
                <!--<td><?php echo $row['district']; ?></td>-->
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


$sql = "SELECT a.*,b.logistics_name FROM recivestockbytender_new a,logistics_kits_masters b where a.item_id=b.id and  transfer = 2 ";


	if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and a.to_transfer_id='".$this->session->userdata('unit')."'" ;
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
				    
				    $sss = "select * from units_masters where id='".$row['district']."'";
					$www= $this->db->query($sss)->row_array();
				    
				   ?>
              <tr>
               <td><?php echo $row['logistics_name']; ?></td>
                
                <td><?php echo $www['unit_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['distribution_order_no']; ?></td>
                <td><?php echo $qty_recieved['qty_recieved']; ?></td>
              
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