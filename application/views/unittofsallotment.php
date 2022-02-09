<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Unit To FS Transfer  </h2>
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
	<div class="col-sm-12" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>UnittofsAllotment/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Number</label>
				  <div class="col-sm-6">
				      
 
  
				<select id="vehicle_number" class="myselect form-control  show-tick" name="vehicleno" onchange="getComboA(this)" required>  
							<option value="">Select Vehicle </option>		
							<?php /*if(!empty($_SESSION['district']))
							{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."'");
							}else{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit <> ''");    
							}
							if(!empty(mysql_num_rows($vehicle_type_masters) > 0)) {
							while($rowMakes = mysql_fetch_assoc($vehicle_type_masters)){ ?>		 
							<option value="<?php echo $rowMakes['vhno'];?>" <?php if (!empty($_POST['vhmake'])) { if($_POST['vhmake']== $rowMakes['vehicle_type']) { echo 'selected'; } } ?> ><?php echo $rowMakes['vhno'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">Makes Not Available</option>';
							}*/ 
							
							$sql = "SELECT * FROM vehicleD";
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
							</select> 
							<script type="text/javascript">

      $(".myselect").select2();

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
				  </div>
				  <div class="col-sm-12" align="justify"  id="vehicles-details"></div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Allotment Order No</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Allotment Order No" value="<?php echo $fetch222['allotment_no']; ?>" name="allotment_no">
				  </div>
				  
				    <label for="example-search-input" class="col-sm-4 col-form-label margintop">From Unit </label>
				  <div class="col-sm-6 margintop">
					<select  class="form-control show-tick" name="unit_from" id="district_unit"> 
<?php
if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
						}
else {						
					?>
						<option value=""> From Unit</option>		
						<?php }
						?>
						<?php /*$getAllmakes=mysql_query("SELECT * FROM units_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['unit_name'];?>" <?php if(!empty($row['unit_from'])) { if ($rowMakes['unit_name']==$row['unit_from']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        }*/

						//$sql = "SELECT * FROM units_masters";
						
											$sql = "SELECT * FROM units_masters where 1  ";
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							$sql .= " AND id in (".$idd.") ";
						}
						
						$sql .= " ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					   
					   $selected = 0;
					   $selectedchk = "";
					foreach($rows as $key=>$rowMakes){
							



if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							if( $rowMakes['id'] != $_SESSION['unit'] )
							{
								continue;
							}
							else
							{
								$selected++;
								$selectedchk = 'selected';
							}
						}
						else
						{
							//$selected++
							$selected = 0;
							$selectedchk = "";				   
					   
						}
						
						
						
							?>		 
						<option <?php echo $selectedchk?> value="<?php echo $rowMakes['id'];?>" <?php if(!empty($row['unit_to'])) { if ($rowMakes['unit_name']==$row['unit_to']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">District Not Available</option>';
                        } ?>
						
                        </select>
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">To FS </label>
				  <div class="col-sm-6 margintop">
				      
				      <select class="form-control show-tick select2" name="fs" id="fs">  
						<option value="">Select</option>	
						<?php
						if($selectedchk = 'selected' )
						{
							
if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							
							$sql = "SELECT * FROM fsname_masters where unit_id='".$_SESSION['unit']."'";
							$rows = $this->db->query($sql)->result_array();
							foreach($rows as $key=>$rowMakes){
								?>
								<option value="<?php echo $rowMakes['id'];?>"><?php echo $rowMakes['fs_name'];?></option>	
								<?php
							}
						}
						}
						?>
			
						
                        </select> 
				
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Issue Date</label>
				  <div class="col-sm-6 margintop">
					<input type="date" class="form-control" placeholder="issue_date" value="<?php echo $fetch222['issue_date']; ?>" name="issue_date">
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Remarks</label>
				  <div class="col-sm-6 margintop">
					<input type="text" class="form-control" placeholder="Remarks" value="<?php echo $fetch222['remarks']; ?>" name="remarks">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Upload Order</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder="Remarks" value="<?php echo $fetch222['order_upload']; ?>" name="order_upload">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop"></label>
				  <div class="col-md-6 margintop" style="float:right">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>	
				</div>
				
				
				
				
				
				
				</form></div>
          
          
          <div class="col-sm-12"> 
         <div class="box-body">
            
	     <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Vehicle Number</th>
               <th>Allotment Order No</th>
			  <th>Transfered From Unit</th>
			   <th>Transfered To FS</th>
                <th> Issue Date</th>
                <th>Remarks</th>
                <th></th> 
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              /*	if(!empty($_SESSION['district']))
							{
							    $ids = join("','",$_SESSION['unit_vehicles']); 
							$totalInvoices=mysql_query("SELECT * FROM vehicle_allotment WHERE vehicleno IN ('$ids')");
							//echo "SELECT * FROM vehicle_allotment WHERE vehicleno IN ('$ids')";
						
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM vehicle_allotment  ORDER BY allotment_id DESC");
							}
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				    $sql = "SELECT a.*,b.fs_name as unit_name_to,c.unit_name as unit_name_from FROM vehicle_allotment a LEFT JOIN fsname_masters b on a.fs_to=b.id LEFT JOIN units_masters c on a.unit_from=c.id where 1 ";
					
					
					if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and a.unit_from ='".$this->session->userdata('unit')."'" ;
		}
		
		
		
				  
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
				    //$vehicle_make_masters_id = vehicle_make_masters_id($row['vehicle_make_masters_id']);
					$vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				   ?>
				  
              <tr>
               <td><?php echo $row['vehicleno']; ?></td>
                
                <td><?php echo $row['allotment_no']; ?></td>
                  <td><?php echo $row['unit_name_from']; ?></td>
                <td><?php echo $row['unit_name_to']; ?></td>
                <td><?php echo $row['issue_date']; ?></td>
                <td><?php echo $row['remarks']; ?></td>
               <td align="center">	<a target="_blank" download href="<?php echo $row['order_upload']; ?>"><img src="<?php echo base_url()?>assets/img/download-icon.png" height="30"></a></td>
               
			 
               
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
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>