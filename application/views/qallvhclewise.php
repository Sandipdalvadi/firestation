<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Quota Allotment Vehicles  Report</h1>
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
	 <div class="box-body">  <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
	  <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
             <th>Vehicle </th>
               <th>ALloted Unit </th>
                <th>Alloted FS </th>
                <th> Quota Liters </th>
				<th> 	Allotment Date </th>
				
                
              </tr>
            </thead>
            <tbody>
              <?php
              /*if(isset($_SESSION['district']))
							{
							$totalInvoices=mysql_query("SELECT * FROM fuel_quota_allotments");
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM fuel_quota_allotments  ORDER BY id DESC");
							}
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   $count = 0;
					$tot = 0;
					
						$sql = "SELECT * FROM fuel_quota_allotments  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $getvehiclesCompleteDetails = [];//getvehiclesCompleteDetails($row['vehicle_number']);
					
					$s4n = "select * from units_masters  WHERE  id = '".$row['district']."'";				
					$row444n = $this->db->query($s4n)->row_array();
					
					
					$sss= "select * from vehicle_allotment where vehicleno='".$row['vehicle_number']."' limit 1" ;
					$s1 = $this->db->query($sss)->row_array();
					
					$ppp = "SELECT * FROM `fsname_masters` where id='".$s1["fs_to"]."'";
					$p1 = $this->db->query($ppp)->row_array();
				   ?>
              <tr>
               
                <td><?php echo $row['vehicle_number']; ?></td>
                <td><?php echo $row444n['unit_name']; ?></td>
                  <td><?php echo $p1["fs_name"]?$p1["fs_name"]:'Not Allocated';//$getvehiclesCompleteDetails['allotedFS']; ?></td>
                <td><?php echo $row['quota_liters']; ?></td>
                <td><?php echo date("d/m/Y", strtotime($row['created_at'])); ?></td>
               
			  
               
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
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->