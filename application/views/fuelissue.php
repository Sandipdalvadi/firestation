<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Fuel Issue </h2>
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
	<div class="col-sm-12" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>Fuelissues/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Number</label>
				  <div class="col-sm-6">
				      
 
  
				<!--<select id="vehicle_number" class="myselect form-control  show-tick" name="vehicleno" onchange="getComboA(this)" required>
							<option value="">Select Vehicle </option>		
							<?php /*if($_SESSION['login_role'] == 8)
							{
							    $vehicle_type_masters =mysql_query("SELECT * FROM vehicleD WHERE (allotedFS = '".$_SESSION['fs_name']."' OR updated_by = '".$_SESSION['name']."')");  
							}else
							if(!empty($_SESSION['district']))
							{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."' OR updated_by = '".$_SESSION['name']."'");
							}else{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD ");    
							}
							if(!empty(mysql_num_rows($vehicle_type_masters) > 0)) {
							while($rowMakes = mysql_fetch_assoc($vehicle_type_masters)){ ?>		 
							<option value="<?php echo $rowMakes['vhno'];?>" <?php if (!empty($_POST['vhmake'])) { if($_POST['vhmake']== $rowMakes['vehicle_type']) { echo 'selected'; } } ?> ><?php echo $rowMakes['vhno'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">Makes Not Available</option>';
							} */
							?>
							</select>-->



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
$(document).ready(function() {
	$('#vehicle_number').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get-vehicle-data-for-fuelissue.php",
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
<script  type="text/javascript">
function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
  var xhr = new XMLHttpRequest();
var params = 'vhno='+value;
xhr.open('POST', 'get-vehicle-data-for-fuelissue.php', true);

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
				 
				  
				  
				    <label for="example-search-input" class="col-sm-4 col-form-label margintop">trxno
 </label>
				  <div class="col-sm-6 margintop">
						<input type="text" class="form-control" placeholder="trxno" value="<?php echo $fetch222['trxno']; ?>" name="trxno">
				  </div>
				  
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Fuel Issued
 </label>
				  <div class="col-sm-6 margintop">
						<input type="text" class="form-control" placeholder="Required" value="<?php echo $fetch222['required']; ?>" name="required">
				  </div>
				   
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop"></label>
				  <div class="col-md-6 margintop" style="float:right">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				</div>
				
				
				
				
				
				
				</form></div>
          
          
          
         <div class="box-body">
            
	   <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Vehicle tx no </th>
               <th>issue date  </th>
			  <th>vehicle number</th>
			   <th>issue liters </th>
               <th>Status</th> 
                <th></th> 
                
              </tr>
            </thead>
            
               
             <tbody>
              <?php
			  /*$totalInvoices = mysql_query("SELECT * FROM vhfuelissue  ORDER BY id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   	$sql = "SELECT * FROM vhfuelissue  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){				
				   $count++;
				    //$tot = $tot+$row['total_income'];
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['trxno']; ?></td>
                
                <td><?php echo date("d/m/Y", strtotime($row['date_of_entry'])); ?></td>
                <td><?php echo $row['vhno']; ?></td>
                <td><?php echo $row['required']; ?></td>
               <td><?php echo $row['status']; ?></td>
               	   <td> <a href="<?php echo base_url()?>Fuelissues/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
               
			 
               
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