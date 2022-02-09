<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> All Vehicles Report</h1>
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
<div class="box-body"> <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>TR Number</th>
						   <th>Vehicle Number</th>
						   <th>Make</th>
						   <th>Type</th>
						   <th>Variant</th>		
						   <th>Description</th>		
						   <th>Category</th>		
						  
				<th>Photo 1</th>
				<th>Photo 2</th>
				<th>Photo 3</th>
				<th>Photo 4</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              	
				   
				   $count = 0;
					$tot = 0;
				   
						$sql = "SELECT * FROM vehicleD";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   
				   $count++;
				    //$tot = $tot+$row['total_income'];
					
					
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
					
					
				    
				   ?>
              <tr>
               
                <td><?php echo $row['trno']; ?></td>
                 <td><?php echo $row['vhno']; ?></td>
                 <td><?php echo $rm1['vehicle_make']; ?></td>
                  <td><?php echo $rm2['vehicle_model']; ?></td>
                   <td><?php echo $rm3['vehicle_type']; ?></td>
                   <td><?php echo $row['vehicle_description']; ?></td>
                   <td><?php echo $row['vhCat']; ?></td>
                   
              
                    <?php 
                    /*$result121 = mysql_query("SELECT * FROM description_by_vehicle_type_masters where name = '".$row['vehicle_description']."'");	
                    $row12121 = mysql_fetch_array($result121);*/
					
					
					$sql = "SELECT * FROM description_by_vehicle_type_masters where name = '".$row['vehicle_description']."'";
					$row12121 = $this->db->query($sql)->row_array();
?>


<td><img src="<?php echo $row12121['image1']; ?>" height="80"></td>
<td><img src="<?php echo $row12121['image2']; ?>" height="80"></td>
<td><img src="<?php echo $row12121['image3']; ?>" height="80"></td>
<td><img src="<?php echo $row12121['image4']; ?>" height="80"></td>
                 
                    
                
			  
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