 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Vehicle Expense  </h2>
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
	<div class="col-sm-12" style="background-color:#d8e1f0;">
	    <?php  if($_SESSION["loginid"] != 'superadmin' || true )
              {
                  ?><form action="<?php echo base_url()?>Vhexpanses/save" method="post" enctype="multipart/form-data">
            	
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
							if(!empty($_SESSION['district']))
							{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."' OR updated_by = '".$_SESSION['district']."'");
							}else{
							$vehicle_type_masters=mysql_query("SELECT * FROM vehicleD ");    
							}
							if(!empty(mysql_num_rows($vehicle_type_masters) > 0)) {
							while($rowMakes = mysql_fetch_assoc($vehicle_type_masters)){

*/


	
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
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Amount</label>
				  <div class="col-sm-2">
					<input type="text" class="form-control margintop" placeholder="Amount" value="<?php echo $fetch222['amount']; ?>" name="amount">
				  </div>
				  <div class="col-sm-4 margintop">&nbsp;</div>
				    <label for="example-search-input" class="col-sm-4 col-form-label margintop">Financial Year</label>
				  <div class="col-sm-3 margintop">
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
$dates = range('2016', 2030);
foreach($dates as $date){

    if (date('m', strtotime($date)) <= 6) {//Upto June
        $year = ($date-1) . '-' . $date;
    } else {//After June
        $year = $date . '-' . ($date + 1);
    }

    echo "<option value='$year'>$year</option>";
}
?>
</select>
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
              <!--<td>Make</td>
              <td>Type</td>
              <td>Varient</td>
              <td>Alloted Unit</td>
              <td>Alloted FS</td>-->
               <th>Amount</th>
			  <th>financial Year</th>
                
                
               
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			 /* if(!empty($_SESSION['district'])  && ($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 5))
							{
							    //echo "SELECT * FROM vehicleD WHERE financial_year <> '' AND allotedUnit = '".$_SESSION['district']."'";
							$totalInvoices=mysql_query("SELECT * FROM vehicle_expanses WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'");
							//echo "SELECT * FROM vehicle_expanses WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'";
							}else if($_SESSION['login_role'] == 8)
							{
							    	$totalInvoices=mysql_query("SELECT * FROM vehicle_expanses WHERE updated_by = '".$_SESSION['name']."'");
							    	//echo "SELECT * FROM vehicle_expanses WHERE updated_by = '".$_SESSION['name']."'";
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM vehicle_expanses WHERE financial_year <> ''  ORDER BY vhno DESC");
							}
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   */
				   
				   		$count = 0;
					$tot = 0;
							$sql = "SELECT * FROM vehicle_expanses WHERE financial_year <> ''  ORDER BY vhno DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){			
					
					
					
				   $count++;
				    $getvehiclesCompleteDetails = [];// getvehiclesCompleteDetails($row['vhno']);
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['vhno']; ?></td>
					
                
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['financial_year']; ?></td>
               
               
               
			 
               
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