 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Additional Quoata Allotment (Vehicles) </h1>
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
    <div class="col-sm-6">
	 <div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
     <th>Vehicle </th>
                <th> Quota Liters </th>
				<th> 	Allotment Date </th>
				
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			  /*$totalInvoices = mysql_query("SELECT * FROM fuel_quota_allotments WHERE district = '' ORDER BY id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				   $count = 0;
					$tot = 0;
					
					$sql = "SELECT * FROM fuel_quota_allotments WHERE district IS NULL or district = '' AND allotments_type = 'additional'  ORDER BY id DESC";
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
               
                <td><?php echo $row['vehicle_number']; ?></td>
                <td><?php echo $row['quota_liters']; ?></td>
                <td><?php echo date("d/m/Y", strtotime($row['created_at'])); ?></td>
               
			   <td><a href="<?php echo base_url()?>Quotaallotmentadd/index/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/icon-edit.png" height="20"></a></td>
              
               
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
    <div class="col-sm-6" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>Quotaallotmentadd/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Number</label>
				  <div class="col-sm-6">
				      
 
					<input type="hidden" name="id" value="<?php echo $id?>">
				<select id="vehicle_number" onchange="getComboA(this)"  class="myselect form-control  show-tick" name="vehicle_number" required>  
							<option value="">Select Vehicle </option>		
							<?php 	/*if(isset($_SESSION['district']))
							{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."'");
							}else{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD ");    
							}
							if(!empty(mysql_num_rows($vehicle_type_masters) > 0)) {
							while($rowMakes = mysql_fetch_assoc($vehicle_type_masters)){ ?>		 
							<option value="<?php echo $rowMakes['vhno'];?>" <?php if (!empty($fetch222['vehicle_number'])) { if($fetch222['vehicle_number']== $rowMakes['vhno']) { echo 'selected'; } } ?> ><?php echo $rowMakes['vhno'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">Makes Not Available</option>';
							} */
							
							
							$sql = "SELECT * FROM vehicleD";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){				
							
							
							?>		 
							<option value="<?php echo $rowMakes['vhno'];?>" <?php if (!empty($fetch222['vehicle_number'])) { if($fetch222['vehicle_number']== $rowMakes['vhno']) { echo 'selected'; } } ?> ><?php echo $rowMakes['vhno'];?></option>			 
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
xhr.open('POST', '<?php echo base_url()?>Vhtype/getVehlists', true);

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
	<script  type="text/javascript">
$(document).ready(function() {
	$('#vehicle_number').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "<?php echo base_url()?>Vhtype/getVehlists",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#vehicles-details").html(dataResult);
				}
			});
		
		
	});
});
</script>
				  </div>
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Details</label><div id="vehicles-details" class="col-sm-6 margintop" ></div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Quota Alloted (Liters)</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Quota Alloted ( Liters ) " value="<?php echo $fetch222['quota_liters']; ?>" name="quota_liters">
				  </div>
				 <label for="example-search-input" class="col-sm-4 col-form-label margintop"></label>
				  <div class="col-md-6 margintop" style="float:right">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				</div>
				
				
				
				
				
				
				</form></div>

  </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->