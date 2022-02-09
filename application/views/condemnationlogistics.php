 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Condemnation Lists   </h1>
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
                <h4><i class="icon fa fa-check"></i><b>Record has beenupdated Sucessfully !</b></h4>
               
              </div>
		<?php } ?>
  <div class="row">
   
    <div class="col-sm-12" style="background-color:#d8e1f0;">
        <?php  if($_SESSION["loginid"] != 'superadmin' || true)
              {
                  ?>
      
				<?php } ?>
				
				</div>
				<div class="col-sm-12"><hr></div>
				 <div class="col-sm-12">
				  
				    
	 <div class="box-body">
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Fire Staton Name </td>
                <td> Item Name</td>
				<td>Qty</td>
				<td>Date</td>
				<td>Remarks</td>
			
                
              </tr>
            </thead>
            <tbody>
              <?php
              
              /*  if($_SESSION["name"] == 'superadmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM unserviceable_list  WHERE condemnation = 1 ORDER BY id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_SESSION["name"]."' AND condemnation = 1 ORDER BY id DESC");
              }
              
             if(isset($_POST['district'])) {
                 $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_POST["district"]."' AND condemnation = 1 ORDER BY id DESC");
             }
              
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   $count = 0;
					$tot = 0;
				   //$sql = "SELECT * FROM unserviceable_list  WHERE condemnation = 1 ORDER BY id DESC";
				   
				   
				    $sql = "SELECT a.*,b.logistics_name as itmnme,c.fs_name as fss FROM unserviceable_list a INNER JOIN logistics_kits_masters b  ON a.item_id=b.id INNER JOIN fsname_masters c ON c.id=a.fs_id  WHERE a.mode=1 and a.condemnation = 1 ORDER BY a.id DESC";
					
					
					
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
               
                <td><?php echo $row['fss']; ?></td>
                <td><?php echo $row['itmnme']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['entry_date']; ?></td>
                <td><?php echo $row['remarks']; ?></td>
               
			 
               
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