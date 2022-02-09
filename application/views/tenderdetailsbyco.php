
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Tender Details Entry by C.O  </h2>
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
	<div class="col-sm-12" style="background-color:#d8e1f0;">
<form action="<?php echo base_url()?>Tenderdetailsbyco/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  
				  
				  
				    <label for="example-search-input" class="col-sm-4 col-form-label">Select Financial Year</label>
				  <div class="col-sm-6">
				<?php
//get the current year
$Startyear=date('Y');
$endYear=$Startyear-10;

// set start and end year range i.e the start year
$yearArray = range($Startyear,$endYear);
?>
<select name="financial_year" class="form-control">
    <option value="">Select Financial Year</option>
   <?php
$dates = range('2010', date('Y'));
foreach($dates as $date){

    if (date('m', strtotime($date)) <= 6) {//Upto June
        $year = ($date-1) . '-' . $date;
    } else {//After June
        $year = $date . '-' . ($date + 1);
    }

    ?>
    <option value='<?php echo $year; ?>' <?php if($fetch222['financial_year'] == $year){ ?>selected<?php } ?>><?php echo $year; ?></option>
    <?php
}
?>
</select>
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label">Select Tender Type</label>
				  <div class="col-sm-6">
				      <select class="form-control" name="tender_type">
				          <option value="E Tender" <?php if($fetch222['tender_type'] == 'E Tender'){ ?>selected<?php } ?>>E Tender</option>
				          <option value="Limited Tender" <?php if($fetch222['tender_type'] == 'Limited Tender'){ ?>selected<?php } ?>>Limited Tender</option>
				          <option value="GEM" <?php if($fetch222['tender_type'] == 'GEM'){ ?>selected<?php } ?>>GEM</option>
				          </select>
				  </div>
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Tender Date</label>
				   <div class="col-sm-6">
				       <input type="date" class="form-control" placeholder="Amount" value="<?php echo $fetch222['tender_date']; ?>" name="tender_date">
				       </div>
				       
				<label for="example-search-input" class="col-sm-4 col-form-label">RC NO</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="RC NO" value="<?php echo $fetch222['rc_number']; ?>" name="rc_number">
				       </div> 
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label">Tender No</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="Tender No" value="<?php echo $fetch222['tender_number']; ?>" name="tender_number">
				       </div>
				       
				         <label for="example-search-input" class="col-sm-4 col-form-label">Supply Order No</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="Supply Order No" value="<?php echo $fetch222['supply_order_number']; ?>" name="supply_order_number">
				       </div>
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label">Title</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="Title" value="<?php echo $fetch222['title']; ?>" name="title">
				       </div>
				       
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label">Item Name</label>
				   <div class="col-sm-6">
				        <select class="form-control show-tick" name="item_name" id="item_name">  
						<option value=""> Item</option>		
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

						*/
						
						$sql = "SELECT * FROM logistics_kits_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){	


							?>		 
						<option value="<?php echo $rowMakes['logistics_name'];?>" <?php if(!empty($_POST['item_name'])) { if ($rowMakes['logistics_name']==$_POST['item_name']) { echo 'selected'; } } ?>><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				       </div>
				         <label for="example-search-input" class="col-sm-4 col-form-label">Qty</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="Qty" value="<?php //echo $fetch222['qty']; ?>" name="qty">
				       </div>
				       
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label">UPload E-Tender Copy</label>
				  <div class="col-sm-6">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['e_tender_copy']; ?>" name="e_tender_copy">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">UPload Final SPC Copy</label>
				  <div class="col-sm-6">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['final_spc_copy']; ?>" name="final_spc_copy">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">UPload Supply Order</label>
				  <div class="col-sm-6">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['supply_order']; ?>" name="supply_order">
				  </div>
				       
				  <div class="col-sm-2">
					<button name="tenders_details" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				</div>
				
				
				
				
				
				
				</form>
				
				</div>
          
          
          
         <div class="box-body">
            
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Financial Year</td>
              <td>Tender Type</td>
              <td>Tender Date</td>
              <td>RC NO</td>
              <td>Tender No</td>
              <td>Supply Order No</td>
               <td>Title</td>
			  <td>Item Name</td>
                
                <td>Qty</td>
                <td> E-Tender Copy</td>
                <td>Final SPC Copy</td>
                <td>Supply Order</td>
               
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			 /* if(!empty($_SESSION['district']))
							{
							    //echo "SELECT * FROM vehicleD WHERE financial_year <> '' AND allotedUnit = '".$_SESSION['district']."'";
							$totalInvoices=mysql_query("SELECT * FROM tenders_details WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'");
							//echo "SELECT * FROM tenders_details WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'";
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM tenders_details WHERE financial_year <> ''  ORDER BY id DESC");
							}
							*/
							
							$sql = "SELECT * FROM tenders_details WHERE financial_year <> ''  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					
						
						
						
				  	$count = 0;
					$tot = 0;
					if($totalInvoices > 0)
					{
				   //while($row = mysql_fetch_array($totalInvoices)) {
					$rows = $this->db->query($sql)->result_array();				  
					foreach($rows as $key=>$row){					 					   
				   $count++;
				   
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['financial_year']; ?></td>
               <td><?php echo $row['tender_type']; ?></td>
               
                <td><?php echo date("d/m/Y", strtotime($row['tender_date'])); ?></td>
                
                  <td><?php echo $row['rc_number']; ?></td>
                   <td><?php echo $row['tender_number']; ?></td>
                    <td><?php echo $row['supply_order_number']; ?></td>
                <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['item_name']; ?></td>  
              <td><?php echo $row['qty']; ?></td>  
               <td>	<a href="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>"><img src="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>" height="40" download></a></td>
               
               <td>	<a href="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>"><img src="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>" height="40" download></a></td>
               
               <td>	<a href="<?php echo base_url()?><?php echo $row['supply_order']; ?>"><img src="<?php echo base_url()?><?php echo $row['supply_order']; ?>" height="40" download></a></td>
               
			 
               
             
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