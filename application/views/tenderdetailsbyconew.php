
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Tender Details Entry by Chief Office </h2>
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
<form action="<?php echo base_url()?>Tenderdetailsbyconew/save" method="post" enctype="multipart/form-data">
            	
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
<select name="financial_year" required  class="form-control">
    <option value="">Select Financial Year</option>
   <?php
$dates = range('2010', '2026');
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
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop" >Select Tender Type</label>
				  <div class="col-sm-6 margintop">
				      <select class="form-control " name="tender_type">
				          <option value="E Tender" <?php if($fetch222['tender_type'] == 'E Tender'){ ?>selected<?php } ?>>E Tender</option>
				          <option value="Limited Tender" <?php if($fetch222['tender_type'] == 'Limited Tender'){ ?>selected<?php } ?>>Limited Tender</option>
				          <option value="GEM" <?php if($fetch222['tender_type'] == 'GEM'){ ?>selected<?php } ?>>GEM</option>
				          </select>
				  </div>
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">Tender Date</label>
				   <div class="col-sm-6 margintop">
				       <input type="date" required  class="form-control" placeholder="Amount" value="<?php echo $fetch222['tender_date']; ?>" name="tender_date">
				       </div>
				       
				<label for="example-search-input" class="col-sm-4 col-form-label margintop">RC NO</label>
				   <div class="col-sm-6 margintop">
				       <input type="text" required class="form-control" placeholder="RC NO" value="<?php echo $fetch222['rc_number']; ?>" name="rc_number">
				       </div> 
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label margintop">Tender No</label>
				   <div class="col-sm-6 margintop">
				       <input type="text" required class="form-control" placeholder="Tender No" value="<?php echo $fetch222['tender_number']; ?>" name="tender_number">
				       </div>
				       
				         <!--<label for="example-search-input" class="col-sm-4 col-form-label margintop">Supply Order No</label>
				   <div class="col-sm-6 margintop">
				       <input type="text"  class="form-control" placeholder="Supply Order No" value="<?php echo $fetch222['supply_order_number']; ?>" name="supply_order_number">
				       </div>-->
				       <input type="hidden"  class="form-control"  value="<?php echo $fetch222['supply_order_number']; ?>" name="supply_order_number">
				       <label for="example-search-input" class="col-sm-4 col-form-label margintop">Title</label>
				   <div class="col-sm-6 margintop">
				       <input type="text" required class="form-control" placeholder="Title" value="<?php echo $fetch222['title']; ?>" name="title">
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
				       
				       
				       <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload E-Tender Copy</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['e_tender_copy']; ?>" name="e_tender_copy">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Final SPC Copy</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['final_spc_copy']; ?>" name="final_spc_copy">
				  </div>
				  
				  
				  
				  <!--<label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Supply Order</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['supply_order']; ?>" name="supply_order">
				  </div>-->
				  
				  <hr/>
				  
				  <div style="width:100%;margin-top:20px" class="col-lg-12 attributes margintop">
					  <div class="col-md-12 attr  row margintop" style="width:100%;">
					  <div class="col-md-2">Type:
					  <select  class="form-control  fidstype" name="item_cat[]">
							<option value="Logistics">Logistics</option>
							<option value="Vehicle">Vehicle</option>
							</select>
					  </div>
						<div class="col-md-3">
						 Item Name:<select id="" required name="item_id[]" class="fids form-control select2 ">
						 <option value="">Select</option>
						 <?php
						 $sql = "SELECT * FROM logistics_kits_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){	


							?>		 
						<option value="<?php echo $rowMakes['id'];?>"><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        //echo '<option value="">Not Available</option>';
                        }
						 ?>
						 </select>
						</div>
						<div class="col-md-3">
						 Item Quantity:<input required type="number" class="form-control" placeholder="Item Quantity" value="" name="qty[]">
						</div>
						<div class="col-md-2">
						 Unit Price:<input  required type="number" step="0.01" class="form-control" placeholder="Unit Price" value="" name="price[]">
						</div>
						<div class="col-md-2" style="margin-top:24px"><input value="ADD MORE" type="button" class="btn btn-success add_new_item"></div>
					  
					  </div>
				  </div>
				       
				
				</div>
				
				  <div class="col-sm-2">
					<button name="tenders_details" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
			
				
				
				
				</form>
				
				</div>
          
          
          <div class="col-sm-12"> 
         <div class="box-body">
             
	     <table id="examplecom" class="table table-bordered table-hover display nowrap  table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Financial Year</th>
              <th>Tender Type</th>
              <th>Tender Date</th>
              <th>RC NO</th>
              <th>Tender No</th>
              <th>Supply Order No</th>
               <th>Title</th>
			  <!--<th>Item Name</th>
                
                <th>Qty</th>-->
                <th> E-Tender Copy</th>
                <th>Final SPC Copy</th>
                 <!--<th>Supply Order</th>-->
 <th>Status</th>
               <th></th>
                
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


							
							$sql = "SELECT * FROM tenders_details_new WHERE financial_year <> ''  ORDER BY id DESC";
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
				  
              <tr>
               <td><?php echo $row['financial_year']; ?></td>
               <td><?php echo $row['tender_type']; ?></td>
               
                <td><?php echo date("d/m/Y", strtotime($row['tender_date'])); ?></td>
                
                  <td><?php echo $row['rc_number']; ?></td>
                   <td style='color:red'><?php echo $row['tender_number']; ?></td>
                    <td><?php echo $row['supply_order_number']; ?></td>
                <td><?php echo $row['title']; ?></td>
              <!--<td><?php echo $row['item_name']; ?></td>  
              <td><?php echo $row['qty']; ?></td>  -->
               <td>	<a target="_blank" href="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>" height="40" >--><img src="<?php echo base_url()?>assets/img/download-icon.png" height="40" ></a></td>
               
               <td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>" height="40" download>--><img height="40"  src="<?php echo base_url()?>assets/img/download-icon.png"></a></td>
               
               <!--<td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['supply_order']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['supply_order']; ?>" height="40" download>download</a></td>-->
               <td><?php echo strtoupper($row['status']); ?></td> 
			<td><a href="<?php echo base_url()?>Tenderdetailsbyconew/view/<?php echo $row['id']; ?>" style="color:blue">View Items</a></td>
               
             
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