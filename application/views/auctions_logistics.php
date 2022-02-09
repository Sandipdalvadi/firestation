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
	  <?php echo  $this->session->flashdata('message'); ?>
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
	     
		 
		 if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
		 $s4 = "SELECT unit_name FROM units_masters where id in (select unit_id from fsname_masters  WHERE  id = '".$_SESSION['fs_name']."')";
		 $nfire = $this->db->query($sql)->num_rows();
		 if($nfire >=1 )
		 {
			 $row444 = $this->db->query($s4)->row_array();
			 $ddd = $row444["unit_name"];
		 }
		}
$numberallotd =  '00'.($treasury_deposit_details + 1).'/'. $ddd.'/'.date('Y'); 	   



	    ?> 
		
		<form action="<?php echo base_url()?>Auctionslogistics/sendauction" method="post"  enctype="multipart/form-data">
		<input type="hidden" name="allottid" value="<?php echo $numberallotd?>" id="allottid">
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Fire Staton Name </td>
                <td> Item Name</td>
				<td>Qty</td>
				<td>Date</td>
				<td>Remarks</td>
				<td>Action</td>
                
              </tr>
            </thead>
            <tbody>
              <?php
              
                /*if($_SESSION["name"] == 'superadmin' || true)
              {
              $totalInvoices = mysql_query("SELECT * FROM unserviceable_list  WHERE auction = 0 AND disbursed = 0 ORDER BY id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_SESSION["name"]."' AND  auction = 0 AND disbursed = 0 ORDER BY id DESC");
              }
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   //$sql = "SELECT * FROM unserviceable_list  WHERE auction = 0 AND disbursed = 0 ORDER BY id DESC";
				   
				   
				    $sql = "SELECT a.*,b.logistics_name as itmnme,c.fs_name as fss FROM unserviceable_list a INNER JOIN logistics_kits_masters b  ON a.item_id=b.id INNER JOIN fsname_masters c ON c.id=a.fs_id  WHERE a.mode = 1 and a.condemnation = 1 and auction = 0 AND disbursed = 0 ORDER BY a.id DESC";
					
					
					
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
               
                <td><?php echo $row['fss']; ?></td>
                <td><?php echo $row['itmnme']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['entry_date']; ?></td>
                <td><?php echo $row['remarks']; ?></td>
               
			   <td> 
			   
			   <input type="checkbox" name="items[]" value="<?php echo $row['id'];  ?>" <?php if(in_array($row['id'], $ids)){ ?> checked <?php } ?> id="basic_checkbox_<?php echo $count; ?>">
					<label for="basic_checkbox_<?php echo $count; ?>"><b style="text-transform:uppercase;"> <?php //echo $count;  ?></b></label>
			   </td>
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="9"><b>No Records Found</b></td>
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
					<input type="text" required class="form-control" placeholder="Treasury Deposit Details " value="" name="treasury_deposit_details">
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
				   
				   $sql = "SELECT a.*,b.logistics_name as item_name  FROM unserviceable_list a LEFT JOIN logistics_kits_masters b on a.item_id=b.id  WHERE a.mode = 1 and a.auction = 1  ORDER BY id DESC";
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
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['lot_number']; ?></td>
                
                <td><?php echo $row['auction_amount']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
              
			 
               
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
  
  
 