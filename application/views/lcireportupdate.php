<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Tenders Orders - LCI Report Update  </h2>
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
	  
                </div>
          
          
          
         <div class="box-body">
            
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Select Row</td>
              <td>Financial Year</td>
              <td>Tender Type</td>
              <td>Tender Date</td>
              <td>RC NO</td>
              <td>Tender No</td>
              <td>Supply Order No</td>
               <td>Title</td>
			  <td>Item Name</td>
                
                <td>Qty</td>
                <td> E-Tender Copy</td>
                <td>Final SPC Copy</td>
                <td>Supply Order</td>
                <td>LCI Report</td>
               
				
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			  if(1)
							{
							   
				   
				   
				   	$sql = "SELECT * FROM tenders_details WHERE financial_year != '' ";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){				
					
					
					
					
				   $count++;
				   
				   
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td>	<a href="?id=<?php echo $row['id']; ?>&Action=Update"><img src="<?php echo base_url()?>assets/img/icon-edit.png" height="40" download></a></td>
               <td><?php echo $row['financial_year']; ?></td>
               <td><?php echo $row['tender_type']; ?></td>
               
                <td><?php echo date("d/m/Y", strtotime($row['tender_date'])); ?></td>
                
                  <td><?php echo $row['rc_number']; ?></td>
                   <td><?php echo $row['tender_number']; ?></td>
                    <td><?php echo $row['supply_order_number']; ?></td>
                <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['item_name']; ?></td>  
              <td><?php echo $row['qty']; ?></td>  
               <td>	<a href="<?php echo $row['e_tender_copy']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a></td>
               
               <td>	<a href="<?php echo $row['final_spc_copy']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a></td>
               
               <td>	<a href="<?php echo $row['supply_order']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a></td>
                 <td>	<a href="<?php echo $row['lci_report']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a></td>
               
			 
               
             
             </form> </tr>
			  
			  	
            
            
					<?php  }
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