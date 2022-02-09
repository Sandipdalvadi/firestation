  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Vehicle condemnation masters </h1>
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
    
    <div class="col-sm-8" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>Condemnation/index" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Years</label>
				  <div class="col-sm-6">
					<input type="text" class="form-control" placeholder="Year" value="<?php echo $fetch222['years']; ?>" name="years">
				  </div>
				  <!--<label for="example-search-input" class="col-sm-4 col-form-label">&nbsp;</label>
				  <div class="col-sm-6">
				<select class="form-control" name="mcondition">
				    <option value="OR" <?php if($fetch222['mcondition'] == 'OR'){ ?> selected <?php } ?>>OR</option>
				    <option value="AND" <?php if($fetch222['mcondition'] == 'AND'){ ?> selected <?php } ?>>AND</option>
				    </select>
				  </div>-->
				    <label for="example-search-input" class="col-sm-4 col-form-label">KM's Reading</label>
				  <div class="col-sm-6">
					<input type="text" class="form-control" placeholder="KM's Reading" value="<?php echo $fetch222['kms_reading']; ?>" name="kms_reading">
				  </div>
				  <div class="col-sm-3">
					<button name="view_vehciles" class="btn btn-info" type="submit">Show Vehicles</button>
				  </div>
				</div>
				
				
				
				
				
				
				</form></div>

  </div>
  
  
  <div class="col-sm-12" style="background-color:#d8e1f0;">
<div class="box-body"><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Sr. No.</th>
						   <th>Vehicle Number</th>
						   <th>Make</th>
						   <th>Type</th>
						   <th>Variant</th>		
						   <td>Description</td>
                <td>District</td>
                <td>FS name</td>
                <td>Age of Vehicle</td>
                <td>KM Driven</td>
						   <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
               //$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
               if(isset($_POST['view_vehciles']))
              {


					                  /*if($_POST['mcondition'] == 'AND')
                  {
                 if(!empty($_POST['years']) && !empty($_POST['kms_reading']))
                 {
			    $sql = "SELECT * FROM vehicleD WHERE condemnation = 0 AND age_of_vehicle > ".$_POST['years']." AND current_meter_reading >= '".$_POST['kms_reading']."'   ORDER BY vhid DESC";
			 
                 }
                  }else{
                       if(!empty($_POST['years']) || !empty($_POST['kms_reading']))
                 {
			    $sql = "SELECT * FROM vehicleD WHERE condemnation = 0  AND age_of_vehicle > ".$_POST['years']." OR current_meter_reading >= '".$_POST['kms_reading']."'   ORDER BY vhid DESC";
			 
                 }
                  }
				  */
				  $sql = "select * from vehicleD where condemnation = 0 ";
				  if(!empty($_POST['years']))
				  {
					  $sql .= " and age_of_vehicle >= '".$_POST['years']."'";
				  }
				  if(!empty($_POST['kms_reading']))
				  {
					  $sql .= " and current_meter_reading >= '".$_POST['kms_reading']."'";
				  }
				  
				  
				  
				  
				  	$count = 0;
					$tot = 0;
				$rows = $this->db->query($sql)->result_array();
				   //while($row = mysql_fetch_array($totalInvoices)) { 
				   foreach($rows as $key=>$row){		
				  
				    $tot = $tot+$row['total_income'];
					if($row['condemnation'] == 1 )
						continue;
 $count++;
//make
					$rm1['vehicle_make'] = '';
					if($row['vhmake'] != '' && $row['vhmake'] != null )
					{
					$sql = "SELECT * FROM  vehicle_make_masters WHERE id = ".$row['vhmake']."";
					$rm1 = $this->db->query($sql)->row_array();
					}
					//model
					$rm2['vehicle_model'] = '';
					if($row['vhmodel'] != '' && $row['vhmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_variant_masters WHERE id = ".$row['vhmodel']."";
					$rm2 = $this->db->query($sql)->row_array();
					}
					$rm3['vehicle_type'] = '';
					if($row['vhsubmodel'] != '' && $row['vhsubmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_type_masters WHERE id = ".$row['vhsubmodel']."";
					$rm3 = $this->db->query($sql)->row_array();
					}
					
					$sql5 = "SELECT a.*,b.unit_name,c.fs_name FROM vehicleD a, units_masters b,fsname_masters c WHERE a.allotedUnit=b.id and a.allotedFS=c.id and a.vhno = '".$row['vhno']."'";
				$rows5 = $this->db->query($sql5)->row_array();

				    
				   ?>
              <tr>
               
                <td><?php echo $count; ?></td>
                 <td><?php echo $row['vhno']; ?></td>
               
                   
				   
				  <td><?php echo $rm1['vehicle_make']; ?></td>
                  <td><?php echo $rm2['vehicle_model']; ?></td>
                   <td><?php echo $rm3['vehicle_type']; ?></td>
                   <td><?php echo $row['vehicle_description']; ?></td>
                    <!--<td><?php echo $row['allotedUnit']; ?></td>
                    <td><?php echo $row['allotedFS']; ?></td>-->
					
					 <td><?php echo $rows5["unit_name"];//"";//$getvehicles['allotedUnit']; ?></td>
                 <td><?php echo $rows5["fs_name"];//"";//$getvehicles['allotedFS']; ?></td>
                
                <td><?php echo  $row['age_of_vehicle']; ?> Years</td>
                    <td><?php echo $row['current_meter_reading']; ?></td>
                
			   <td align="center"> <a href="<?php echo base_url()?>Condemnation/delete/<?php echo $row['vhId']; ?>"><b>Move To Condemnation</b></a></td>
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="">
              <td align="center" colspan="11"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table></div>
          </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->