<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Vehicles Transferred To FS   </h2>
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
			  /*$totalInvoices = mysql_query("SELECT * FROM vehicle_allotment WHERE fs <> '' ORDER BY allotment_id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				   
						//$sql = "SELECT * FROM vehicle_allotment WHERE fs <> '' ORDER BY allotment_id DESC";
						
						$sql = "SELECT a.*,b.vhmake,b.vhmodel,b.vhsubmodel,c.unit_name as dsunit FROM vehicle_allotment a , vehicleD b ,units_masters c where c.id=a.unit_from and a.vehicleno=b.vhno  ORDER BY a.allotment_id DESC";
						
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				     $getvehiclesCompleteDetails = [];//getvehiclesCompleteDetails($row['vehicleno']);
				   $rm1['vehicle_make'] = '';
					/*if($row['vhmake'] != '' && $row['vhmake'] != null )
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
					*/
					
					$sql = "SELECT * FROM  fsname_masters WHERE id = ".$row['fs_to']."";
					$rm4 = $this->db->query($sql)->row_array();
				   ?>
				  
              <tr>
               <td><?php echo $row['vehicleno']; ?></td>
                
                   
              
                <td><?php echo $row['allotment_no']; ?></td>
                <td><?php echo $row['dsunit']; ?></td>
                <td><?php echo $rm4['fs_name']; ?></td>
                <td><?php echo $row['issue_date']; ?></td>
                <td><?php echo $row['remarks']; ?></td>
               <td align="center">	<a target="_blank" download href="<?php echo $row['order_upload']; ?>"><img src="<?php echo base_url()?>assets/img/download-icon.png" height="30"></a></td>
               
			 
               
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