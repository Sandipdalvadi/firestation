<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Tender Order - Distribution Details</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
   
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form action="<?php echo base_url()?>Tenderdistributiondetails/save" method="post" enctype="multipart/form-data">
	  <div class="container-fluid">
	  <?php echo  $this->session->flashdata('message'); ?>
  <div class="row">
    <div class="col-sm-12">
	<div class="col-sm-12" style="background-color:#d8e1f0;">

            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  
				  
				  
				    <label for="example-search-input" class="col-sm-4 col-form-label margintop">Select Financial Year</label>
				  <div class="col-sm-6 margintop">
				<?php
//get the current year
$Startyear=date('Y');
$endYear=$Startyear-10;

// set start and end year range i.e the start year
$yearArray = range($Startyear,$endYear);
?>
<select disabled name="financial_year" required  class="form-control">
    <option value="">Select Financial Year</option>
   <?php
$dates = range('2010', 2026);
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
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Select Tender Type</label>
				  <div class="col-sm-6 margintop">
	<input type="hidden" name="hidid" value="<?php echo $fetch222['id']?>">
				      <select disabled class="form-control" name="tender_type">
				          <option value="E Tender" <?php if($fetch222['tender_type'] == 'E Tender'){ ?>selected<?php } ?>>E Tender</option>
				          <option value="Limited Tender" <?php if($fetch222['tender_type'] == 'Limited Tender'){ ?>selected<?php } ?>>Limited Tender</option>
				          <option value="GEM" <?php if($fetch222['tender_type'] == 'GEM'){ ?>selected<?php } ?>>GEM</option>
				          </select>
				  </div>
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">Tender Date</label>
				   <div class="col-sm-6 margintop">
				       <input disabled  type="date" required  class="form-control" placeholder="Amount" value="<?php echo $fetch222['tender_date']; ?>" name="tender_date">
				       </div>
				       
				<label for="example-search-input" class="col-sm-4 col-form-label margintop">RC NO</label>
				   <div class="col-sm-6 margintop">
				       <input disabled  type="text" required class="form-control" placeholder="RC NO" value="<?php echo $fetch222['rc_number']; ?>" name="rc_number">
				       </div> 
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label margintop">Tender No</label>
				   <div class="col-sm-6 margintop">
				       <input disabled type="text" required class="form-control" placeholder="Tender No" value="<?php echo $fetch222['tender_number']; ?>" name="tender_number">
				       </div>
				       
				         <label for="example-search-input" class="col-sm-4 col-form-label margintop">Supply Order No</label>
				   <div class="col-sm-6 margintop">
				       <input disabled type="text" required class="form-control" placeholder="Supply Order No" value="<?php echo $fetch222['supply_order_number']; ?>" name="supply_order_number">
				       </div>
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label margintop">Title</label>
				   <div class="col-sm-6 margintop">
				       <input  disabled type="text" required class="form-control" placeholder="Title" value="<?php echo $fetch222['title']; ?>" name="title">
				       </div>
				       
				       
				       <!--<label for="example-search-input" class="col-sm-4 col-form-label">Item Name</label>
				   <div class="col-sm-6">
				        <select class="form-control show-tick" name="item_name" id="item_name">  
						<option value=""> Item</option>		-->
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

						*/
						
						/*$sql = "SELECT * FROM logistics_kits_masters  ORDER BY id DESC";
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
                        } */
						?>
                        <!--</select>
				       </div>
				         <label for="example-search-input" class="col-sm-4 col-form-label">Qty</label>
				   <div class="col-sm-6">
				       <input type="text" class="form-control" placeholder="Qty" value="<?php //echo $fetch222['qty']; ?>" name="qty">
				       </div>-->
				       
				       
				       <!--<label for="example-search-input" class="col-sm-4 col-form-label">UPload E-Tender Copy</label>
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
				  </div>-->
				  
				  
				  
				  
				  
				  <hr/>
				  
				 
				
				</div>
				
				
				
				
				
			
				
				</div>
          
          
          
         <div class="box-body">
            
	    <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
             
				
                
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
							
							$sql = "SELECT a.*,b.logistics_name FROM tenders_details_new_details a LEFT JOIN logistics_kits_masters b on a.item_id=b.id WHERE tenders_details_new_id ='".$fetch222['id']."' ORDER BY id DESC";
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
				  
              <tr> <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['logistics_name']; ?></td>
               <td><?php echo $row['qty']; ?></td>
               
                 <td><?php echo $row['unit_price']; ?></td>
                
                 
             
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



<div class="form-group row">
			       
				  
                
			
               
                    <div class="col-sm-4">
				  Purpose
				
				    <input disabled type="text" class="form-control" placeholder="Purpose " value="<?php echo $fetch222['purpose']; ?>" name="purpose">
				  
				   </div>
				
               
                  
			
				   <div class="col-sm-4">
				   Purchase From
				
				    <input disabled type="text" class="form-control" placeholder="Purchase From " value="<?php echo $fetch222['purchase_from']; ?>" name="purchase_from">
				 
                </div>
				  
                
				   
				  
               
				
				       <div class="col-sm-4">
				  LCI Officer 1
				 
					<select disabled  class="form-control show-tick" name="lci_officer_1" id="lci_officer_1">  
						<option value="">LCI Officer 1</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

*/


$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){									?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['lci_officer_1'])) { if ($fetch222['lci_officer_1']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
                    <div class="col-sm-4">
				   LCI Officer 2
				 
					<select disabled class="form-control show-tick" name="lci_officer_2" id="lci_officer_2">  
						<option value="">LCI Officer 2</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
						*/
						$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){

							?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['lci_officer_2'])) { if ($fetch222['lci_officer_2']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  

				  
				  
				 
				       <div class="col-sm-4">
				  
				  LCI Officer 3
				  
					<select disabled class="form-control show-tick" name="lci_officer_3" id="lci_officer_3">  
						<option value="">LCI Officer 3</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

							*/
							$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
							?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['lci_officer_3'])) { if ($fetch222['lci_officer_3']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				   
                    <div class="col-sm-4">
				 Head of Account
				  
					<input disabled type="text" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['head_of_account']; ?>" name="head_of_account">
				  </div>
				  
				  
				     <label for="example-search-input" class="col-sm-3 col-form-label">Upload Supply Order</label>
				  <div class="col-sm-3">
			<input type="file" class="form-control" placeholder=" "  name="sanction_order">
				  </div>   
				  
				  
				   <label for="example-search-input" class="col-sm-3 col-form-label">Upload Distribution Order</label>
				  <div class="col-sm-3">
			<input type="file" class="form-control" placeholder=" "  name="distribution_order">
				  </div>   


 <!--<div class="col-sm-4">
				RV No				  
					<input type="text" class="form-control" placeholder="RV No" value="" name="rv_number">
				  </div>

 <div class="col-sm-4">
				RV Date				  
					<input type="text" class="form-control" placeholder="RV Date" value="" name="rv_date">
				  </div>

 <div class="col-sm-4">
				Distribution Order			  
					<input type="file" class="form-control"  value="" name="distribution_order">
				  </div>-->

				
       
				   <div class="col-sm-4">
				  	<button name="recivestockbytender" value="approve" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>  </div>
				  
				  </div>
				  
				  </div>
                
		  </div>
  
 

  </div>
</div>
	  
 </form>	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
	  