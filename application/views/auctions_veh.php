<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Auction   </h1>
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
                <h4><i class="icon fa fa-check"></i><b>Record has beenupdated Sucessfully !</b></h4>
               
              </div>
		<?php }


  //$treasury_deposit_details = mysql_query("SELECT * FROM vehicleD WHERE treasury_deposit_details <> ''");

  
	     
	     
//$numberallotd =  '00'.(mysql_num_rows($treasury_deposit_details) + 1).'/'. $_SESSION['district'].'/'.date('Y'); 



 $sql = "SELECT * FROM vehicleD WHERE treasury_deposit_details <> ''";
					$treasury_deposit_details =  $this->db->query($sql)->num_rows();
$numberallotd =  '00'.($treasury_deposit_details + 1).'/'. $_SESSION['district'].'/'.date('Y');					
						//$rows = $this->db->query($sql)->result_array();
						
						
						


		?>
  <div class="row">
   
    
				<div class="col-sm-12"><hr></div>
				 <div class="col-sm-12">
				     
				     
	 <div class="box-body">
	    <?php
	     if($_SESSION["loginid"] != 'superadmin' || true)
              {
				  
				  
				   $sql = "SELECT * FROM unserviceable_list WHERE treasury_deposit_details <> ''";
				  $treasury_deposit_details = $this->db->query($sql)->num_rows();
				   	     
	     $ddd = !empty($this->session->userdata('unit'))?$this->session->userdata('unit'):'0';
	     
$numberallotd =  '00'.($treasury_deposit_details + 1).'/'. $ddd.'/'.date('Y'); 	  


	    ?> <form action="<?php echo base_url()?>Auctionsvehicle/sendauction" method="post"  enctype="multipart/form-data">
	    
		  
		  <input type="hidden" name="allottid" value="<?php echo $numberallotd?>" id="allottid">
		   <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Sr. No.</th>
						   <th>Vehicle Number</th>
						   <th>Make</th>
						   <th>Type</th>
						   <th>Variant</th>		
						   <td>Description</td>
                <td>District</td>
                <td>FS name</td>
                <td>Age of Vehicle</td>
                <td>KM Driven</td>
						   <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              
               
              /*$totalInvoices = mysql_query("SELECT * FROM vehicleD  WHERE condemnation = 1 AND auction = 0 ORDER BY vhId DESC");    
             
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				    $sql = "SELECT * FROM vehicleD  WHERE condemnation = 1 AND auction = 0 ORDER BY vhId DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
						
				   $count++;
				    $tot = $tot+$row['total_income'];
				    
				   ?>
              <tr>
               
               <td><?php echo $count; ?></td>
                 <td><?php echo $row['vhno']; ?></td>
                 <td><?php //echo vehicle_make_masters_id($row['vhmake']); ?></td>
                  <td><?php //echo vehicle_type_masters($row['vhmodel']); ?></td>
                   <td><?php //echo vehicle_variant_masters($row['vhsubmodel']); ?></td>
                   
                   <td><?php echo $row['vehicle_description']; ?></td>
                    <td><?php echo $row['allotedUnit']; ?></td>
                    <td><?php echo $row['allotedFS']; ?></td>
                <td><?php echo  $row['age_of_vehicle']; ?> Years</td>
                    <td><?php echo $row['current_meter_reading']; ?></td>
                
			   <td> 
			   
			   <input type="checkbox" name="items[]" value="<?php echo $row['vhId'];  ?>" <?php if(in_array($row['vhId'], $ids)){ ?> checked <?php } ?> id="basic_checkbox_<?php echo $count; ?>">
					<label for="basic_checkbox_<?php echo $count; ?>"><b style="text-transform:uppercase;"> <?php //echo $count;  ?></b></label>
			   </td>
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="">
              <td align="center" colspan="11"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table>
         
          <hr>
          
          <button type="button" class="btn btn-info" id="generatelotno">Generate LOT No</button>
            <input type="text" class="col-sm-4 form-control" name="generatelotno_op" id="generatelotno_op" disabled style="display: none;" />
       <div class="form-group row">&nbsp;</div>
          <div class="form-group row">
              
           <div class="col-sm-8">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Upload Challan</label>
				  <div class="col-sm-8">
					<input type="file" class="form-control" placeholder="Auction Amount" value="<?php echo $fetch222['challan']; ?>" name="challan">
				  </div>
				  </div>   
           <div class="col-sm-8">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Auction Amount</label>
				  <div class="col-sm-8">
					<input type="text" required class="form-control" placeholder="Auction Amount" value="<?php echo $fetch222['auction_amount']; ?>" name="auction_amount">
				  </div>
				  </div>
				   <div class="col-sm-8">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Treasury Deposit Details </label>
				  <div class="col-sm-8">
					<input type="text" required class="form-control" placeholder="Treasury Deposit Details " value="<?php echo $fetch222['treasury_deposit_details']; ?>" name="treasury_deposit_details">
						<button name="final_auction_details" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				  </div>
				  </div>
          
          </form>
          
          <?php } ?>
          </div>
		  </div>

  </div>
</div>
	  <div class="box-body">
            
	     <table id="example222" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Lot Number</td>
               <td>Auction Amount</td>
			  <td>Lot Items</td>
              
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              
                /*if($_SESSION["loginid"] == 'superadmin' or true )
              {
              $totalInvoices12121 = mysql_query("SELECT * FROM unserviceable_list  WHERE auction = 1  ORDER BY id DESC");    
              }else{
			  $totalInvoices12121 = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_SESSION["name"]."' AND  auction = 1 ORDER BY id DESC");
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices12121) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices12121)) { 
				   */
				   
				   $sql = "SELECT * FROM unserviceable_list  WHERE auction = 1 and mode=2  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
					
					
				   $count++;
				    $tot = $tot+$row['total_income'];
					
					$sql ="select * from vehicleD where vhId = ".$row['item_id']."";
 $vvv = $this->db->query($sql)->row_array();
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['lot_number']; ?></td>
                
                <td><?php echo $row['auction_amount']; ?></td>
                <td><?php echo $vvv['vhno']; ?></td>
              
			 
               
             </form> </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="11"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table></div> 
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  