<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> C. O. Stock Update <small>logistics </small> </h2>
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
	      <?php  if($_SESSION['login_role'] != 3 or true)
              {
                  ?>
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td style="width:200px;">Item Name</td>
               <td>Purchase From</td>
			  <td>Discription</td>
                <td> Purpose</td>
                <td> Qty Rec</td>
                <td> Amount</td>
                <td> RV Number</td>
                <td> RV Date</td>
                <td> Dsitribution Order</td>
				<td>Action</td>
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			 
              /*$totalInvoices = mysql_query("SELECT * FROM recivestockbytender  ORDER BY stock_id DESC");    
              
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   */
				   $count = 0;
					$tot = 0;
				  $sql = "SELECT * FROM recivestockbytender  ORDER BY stock_id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
							
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td style="width:200px;"><?php echo $row['item_name']; ?></td>
                
                <td><?php echo $row['purchase_from']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['qty_recieved']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                 <td><input type="text" class="form-control" placeholder="RV No" value="<?php echo $row['rv_number']; ?>" <?php if(!empty($row['rv_number'])){ ?> disabled <?php } ?> name="rv_number"></td>
                  <td>	<input type="date" class="form-control" placeholder="RV Date" value="<?php echo $row['rv_date']; ?>" <?php if(!empty($row['rv_date'])){ ?> disabled <?php } ?>  name="rv_date"></td>
                   <td>	<input type="file" class="form-control" placeholder="RV Date"  name="distribution_order" <?php if(!empty($row['distribution_order'])){ ?> disabled <?php } ?> style="width:100px;"></td>
               
			   <td><button type="submit" name="doSubmit" <?php if(!empty($row['rv_date'])){ ?> disabled <?php } ?>><img src="<?php echo base_url()?>assets/img/save-icon.png" height="30"></button> </td>
              
               
             </form> </tr>
			  
			  	
            
            
            <?php 
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
            
	     <table id="example222" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Item Name</td>
               <td>Purchase From</td>
			  <td>Discription</td>
                <td> Purpose</td>
                <td> Qty Rec</td>
                <td> Amount</td>
                <td> RV Number</td>
                <td> RV Date</td>
                <td> Dsitribution Order</td>
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			   /*if($_SESSION["name"] == 'superadmin' || $_SESSION['login_role'] == 3)
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' ORDER BY stock_id DESC");
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				      $count = 0;
					$tot = 0;
				  $sql = "SELECT * FROM recivestockbytender  ORDER BY stock_id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
						
						
						
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['item_name']; ?></td>
                
                <td><?php echo $row['purchase_from']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['qty_recieved']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                 <td><?php echo $row['rv_number']; ?></td>
                  <td><?php echo $row['rv_date']; ?></td>
                   <td align="center">	<a target="_blank" href="<?php echo $row['distribution_order']; ?>"><img src="<?php echo base_url()?>assets/img/download-icon.png" height="30"></a></td>
               
			 
               
             </form> </tr>
			  
			  	
            
            
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