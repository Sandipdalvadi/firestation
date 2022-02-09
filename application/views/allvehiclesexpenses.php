 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>   Vehicle Expenses Report</h1>
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
  
    
  <div class="col-sm-12" style="background-color:#d8e1f0;">
	 
         <div class="col-sm-12">
            <form action="" method="post">
				         	<div class="form-group row">
				         	    
				 <label for="example-search-input" class="col-sm-1 col-form-label">Vehicle   </label>
				  <div class="col-sm-3">
				  <select class="form-control show-tick select2" name="vhno" id="vhno">  
						<option value=""> Vehicle Number</option>		
						<?php /*if(isset($_SESSION['district']))
							{
							$getAllmakes=mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION['district']."'");
							}else{
							$getAllmakes=mysql_query("SELECT * FROM vehicleD ");    
							}
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						
						
						*/
						
						$sql = "SELECT * FROM vehicleD";
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
	     <div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Vehicle Number</th>
              <th>Alloted Unit</th>
              <th>Alloted FS</th>
              
               <th>Amount</th>
			  <th>financial Year</th>
                
                
               
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              
               if(isset($_POST['vhno']))
              {
                 //$totalInvoices = mysql_query("SELECT * FROM vehicle_expanses WHERE vhno = '".$_POST['vhno']."' AND financial_year <> ''  ORDER BY vhno DESC");  
              }else{
              
                    /* if(!empty($_SESSION['district']) && ($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 5))
							{
							    	$getfsListbyallotedunit = getfsListbyallotedunit($_SESSION['district']);
						//print_r($getfsListbyallotedunit);
							  $ids = join("','",$getfsListbyallotedunit);
							    //echo "SELECT * FROM vehicleD WHERE financial_year <> '' AND allotedUnit = '".$_SESSION['district']."'";
							$totalInvoices=mysql_query("SELECT * FROM vehicle_expanses WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."' OR updated_by  IN ('$ids')");
							//echo "SELECT * FROM vehicle_expanses WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'";
							}else if($_SESSION['login_role'] == 8)
							{
							    	$totalInvoices=mysql_query("SELECT * FROM vehicle_expanses WHERE updated_by = '".$_SESSION['name']."'");
							    	//echo "SELECT * FROM vehicle_expanses WHERE updated_by = '".$_SESSION['name']."'";
							}else {
			  $totalInvoices = mysql_query("SELECT * FROM vehicle_expanses ORDER BY vhno DESC");
							}
							*/
              }
				  	$count = 0;
					$tot = 0;
					/*if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				   
						$sql = "SELECT a.*,b.allotedUnit,b.allotedFS,c.unit_name,d.fs_name as fire FROM vehicle_expanses a LEFT JOIN vehicleD b on a.vhno=b.vhno LEFT JOIN units_masters c on c.id=b.allotedUnit
						LEFT JOIN fsname_masters d  on c.id=b.allotedFS
							";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
			$getvehicles = '';//getvehiclesCompleteDetails($row['vhno']);
				   ?>
				  
              <tr>
               <td><?php echo $row['vhno']; ?></td>
                 <td><?php echo $row['unit_name'];//$getvehicles['allotedUnit']; ?></td>
                 <td><?php echo $row['fire'];//$getvehicles['allotedFS']; ?></td>
               
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['financial_year']; ?></td>
               
               
               
			 
               
             </tr>
			  
			  	
            
            
            <?php 
				  }
				  }?>
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