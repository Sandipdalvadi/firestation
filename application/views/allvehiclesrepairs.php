 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Vehicle Repairs  Report</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
	  <div class="container-fluid">
	  <?php if(!empty($_GET['doneid'])){ ?>
		<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i><b> Record has Been updated Sucessfully !</b></h4>
               
              </div>
		<?php } ?>
  <div class="row">
  
    
  <div class="col-sm-12" style="background-color:#d8e1f0;">
	
            <div class="col-sm-12">
            <form action="<?php echo base_url()?>allvehiclesrepairs" method="post">
				         	<div class="form-group row">
				         	    
				 <label for="example-search-input" class="col-sm-1 col-form-label">Vehicle   </label>
				  <div class="col-sm-3">
				  <select class="form-control show-tick select2" name="vhno" id="vhno">  
						<option value=""> Vehicle Number</option>		
						<?php /*if(!empty($_SESSION['district']))
							{
							$getAllmakes=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."'");
							}else{
							$getAllmakes=mysql_query("SELECT * FROM vehicleD ");    
							}
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						*/
						
						
						$sql = "SELECT * FROM vehicleD where 1 ";
						
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
						
						?>		 
						<option value="<?php echo $rowMakes['vhno'];?>" <?php if(!empty($_POST['vhno'])) { if ($rowMakes['vhno']==$_POST['vhno']) { echo 'selected'; } } ?>><?php echo $rowMakes['vhno'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div>         	    
				  
				  
				  
				   <div class="col-sm-1">
					<button name="search_unrecivable" type="submit"><img src="<?php echo base_url()?>assets/img/searchbtn.png" height="30"></button>
				  </div>
			</div>
				     </form>
				     </div>
	      
		   <div class="box-body">
		  <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Vehicle Number</th>
              <th>Alloted Unit</th>
              <th>Alloted FS</th>
               <th>Incharge</th>
			  <th>Repair Type</th>
                <th> Amount</th>
                <th> Expanses Till Date</th>
                <th> Sanction No</th>
                <th> Budget Type </th>
                <th>View Documents</th>
              
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              
              /*if(!empty($_POST['vhno']))
              {
                 $totalInvoices = mysql_query("SELECT * FROM vehicle_repairs  WHERE vehicle_number = '".$_POST['vhno']."' ORDER BY id DESC");  
              }else{
              
              if(!empty($_SESSION['district']))
							{
							    $ids = join("','",$_SESSION['unit_vehicles']); 
							$totalInvoices=mysql_query("SELECT * FROM vehicle_repairs WHERE vehicle_number IN ('$ids')");
							
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM vehicle_repairs  ORDER BY id DESC");
							}
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) {
*/

$sql = "SELECT * FROM vehicle_repairs where 1 ";
if( isset($_POST["vhno"]) && !empty($_POST["vhno"]) )
			{
	$sql .= " and vehicle_number='".$_POST["vhno"]."'"; 
			}
$sql .="  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
					   
				   $count++;
				    $tot = $tot+$row['total_income'];
				   $vehicle_expanses = [];//vehicle_expanses($row['vehicle_number']);
			$getvehicles = [];//getvehiclesCompleteDetails($row['vehicle_number']);
			
			/*
			$vehicles = array();
   $vehicle_type_masters=mysql_query("SELECT * FROM vehicleD WHERE vhno = '".$dist."'");
   $row=mysql_fetch_array($vehicle_type_masters);
   return($row);
			*/
				$sql5 = "SELECT a.*,b.unit_name,c.fs_name FROM vehicleD a, units_masters b,fsname_masters c WHERE a.allotedUnit=b.id and a.allotedFS=c.id and a.vhno = '".$row['vehicle_number']."'";
				$rows5 = $this->db->query($sql5)->row_array();
				
				
				$sql6 = "SELECT IFNULL(SUM(amount),0) AS amount FROM vehicle_expanses WHERE vhno = '".$row['vehicle_number']."'";
				$rows6 = $this->db->query($sql6)->row_array();
				
				 if(empty($rows6['amount']))
   {
  $ex = '0.00';
   }else{
      $ex = $rows6['amount'];//number_format($rows6['amount'], 2); 
   }
   
   
   
				?>
				  
              <tr>
               <td><?php echo $row['vehicle_number']; ?></td>
                <td><?php echo $rows5["unit_name"];//"";//$getvehicles['allotedUnit']; ?></td>
                 <td><?php echo $rows5["fs_name"];//"";//$getvehicles['allotedFS']; ?></td>
                
                <td><?php echo $row['incharge']; ?></td>
                <td><?php echo $row['repair_tpype']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                 <td><?php echo $ex;//$vehicle_expanses; ?></td>
                  <td><?php echo $row['sanction_no']; ?></td>
                   <td><?php echo $row['budget']; ?></td>
                  <td> <a href="view_documents.php?id=<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40"></a></td>
               
                 
               
             </tr>
			  
			  	
            
            
            <?php 
				  }
				  } ?>
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