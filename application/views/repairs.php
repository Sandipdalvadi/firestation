 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Repairs</h2>
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
	    <?php  if(true)
              {
                  ?> <form action="<?php echo base_url()?>Repairs/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Number</label>
				  <div class="col-sm-4">
				      
 
  
				<select id="vehicle_number" class="myselect form-control  show-tick" name="vehicleno" onchange="getComboA(this)" required>  
							<option value="">Select Vehicle </option>		
							<?php 
								/*if($_SESSION['login_role'] == 8)
							{
							    $vehicle_type_masters =mysql_query("SELECT * FROM vehicleD WHERE (allotedFS = '".$_SESSION['fs_name']."' OR updated_by = '".$_SESSION['name']."')");  
							}else
							if(isset($_SESSION['district']))
							{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."'  OR updated_by = '".$_SESSION['name']."'");
							}else{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD ");    
							}
							if(!empty(mysql_num_rows($vehicle_type_masters) > 0)) {
							while($rowMakes = mysql_fetch_assoc($vehicle_type_masters)){ 
							
							*/
							//$sql = "SELECT * FROM vehicleD";
							
							$sql = "SELECT * FROM vehicleD where 1 ";
							
								if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
		}
		else{
			$sql .= " and vhno in ( select vehicleno from vehicle_allotment where  fs_to='".$_SESSION['fs_name']."')   ";
			
			}
			
			
			if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and vhno in ( select vehicleno from vehicle_allotment where  unit_to='".$this->session->userdata('unit')."')   ";
			}
			
			
			
			
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){	
							?>		 
							<option value="<?php echo $rowMakes['vhno'];?>" <?php if (!empty($_POST['vhmake'])) { if($_POST['vhmake']== $rowMakes['vehicle_type']) { echo 'selected'; } } ?> ><?php echo $rowMakes['vhno'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">Makes Not Available</option>';
							} ?>
							</select> 
							<script type="text/javascript">

      $(".myselect").select2();

</script>
	<script  type="text/javascript">
function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
  var xhr = new XMLHttpRequest();
var params = 'vhno='+value;
xhr.open('POST', 'get-vehicle.php', true);

//Send the proper header information along with the request
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhr.onload = function() {//Call a function when the state changes.
    if(xhr.status == 200) {
        //alert(this.responseText);
        document.getElementById("vehicles-details").innerHTML = this.responseText;
    }
}
xhr.send(params);
}
</script>
				  </div>
				  <div class="col-sm-12" align="justify"  id="vehicles-details"></div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Incharge</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Incharge" value="<?php echo $fetch222['incharge']; ?>" name="incharge">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Repair Type</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Repair Type" value="<?php echo $fetch222['repair_tpype']; ?>" name="repair_tpype">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Amount</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Repair Amount" value="<?php echo $fetch222['amount']; ?>" name="amount">
				  </div>
				  
				   
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Repair Date</label>
				  <div class="col-sm-6 margintop">
					<input type="date" class="form-control" placeholder="Expanses Till Date" value="<?php echo $fetch222['expansestillDate']; ?>" name="expansestillDate">
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Sanction No</label>
				  <div class="col-sm-6">
					<input type="text" class="form-control margintop" placeholder="Sanction No" value="<?php echo $fetch222['sanction_no']; ?>" name="sanction_no">
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">H.O. Budget</label>
				  <div class="col-sm-6 margintop">
					<div class="radio">
                  	  <input name="budget" type="radio" id="Option_2" value="H.O. Budget">
					  <label for="Option_2">&nbsp;</label>   
                  </div>
				  </div>
				  
				  <label for="basic_checkbox4" class="col-sm-4 col-form-label margintop">Dist. Budget</label>
				  <div class="col-sm-6 margintop">
				  <div class="radio">
                  	  <input name="budget" type="radio" id="Option_1" value="Dist. Budget">
					  <label for="Option_1">&nbsp;</label>                    
                  </div>
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Proposal Document</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['propsal_document']; ?>" name="propsal_document">
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Sanction Letter</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['sanction_letter']; ?>" name="sanction_letter">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Form 63</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['form63']; ?>" name="form63">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Completion Report</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['completion_report']; ?>" name="completion_report">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Standing Order</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['standing_order']; ?>" name="standing_order">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Completion Report</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['completion_report']; ?>" name="completion_report">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Particulars of Vehicles</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['particulars_of_vehicle']; ?>" name="particulars_of_vehicle">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Check List</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['check_list']; ?>" name="check_list">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Quotation / Auth. Dealer Letter</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['quoation']; ?>" name="quoation">
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Comparative Statement</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['comprative_report']; ?>" name="comprative_report">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Work / Supply Order </label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['work_order']; ?>" name="work_order">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Invoice</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['invoice']; ?>" name="invoice">
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Advance Stamp Receipt</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['advance_stamp_report']; ?>" name="advance_stamp_report">
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Bank Details</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['bank_details']; ?>" name="bank_details">
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">UPload Condemnation on proposal</label>
				  <div class="col-sm-6 margintop">
			<input type="file" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['condemnation_on_proposal']; ?>" name="condemnation_on_proposal">
				  </div>
				  
				  
				  
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop"></label>
				  <div class="col-md-6 margintop" style="float:right">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				</div>
				
				
				
				
				
				
				</form>
				<?php } ?>
				</div>
          
          
          
         <div class="box-body">
            
	     <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Vehicle Number</th>
               <th>Incharge</th>
			  <th>Repair Type</th>
                <th> Amount</th>
                <th> Expanses Till Date</th>
                <th> Sanction No</th>
                <th> Budget Type </th>
                <th>View Documents</th>
               
               <th></th>
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			  /*$totalInvoices = mysql_query("SELECT * FROM vehicle_repairs  ORDER BY id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   $count++;
				    $tot = $tot+$row['total_income'];
				   $vehicle_expanses = vehicle_expanses($row['vehicle_number']);*/
				   
				   
				   $count = 0;
					$tot = 0;
							$sql = "SELECT * FROM vehicle_repairs  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
					$vehicle_expanses ='';						
					
					
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['vehicle_number']; ?></td>
                
                <td><?php echo $row['incharge']; ?></td>
                <td><?php echo $row['repair_tpype']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                 <td>Rs. <?php echo $vehicle_expanses; ?></td>
                  <td><?php echo $row['sanction_no']; ?></td>
                   <td><?php echo $row['budget']; ?></td>
                   <td> <a href="<?php echo base_url()?>Repairs/viewdoc/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40"></a></td>
               
                 <td> <a href="<?php echo base_url()?>Repairs/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
			 
               
             </form> </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="10"><b>No Records Found</b></td>
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