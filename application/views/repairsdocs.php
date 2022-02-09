<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2> Repairs</h2>
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
		<?php }


/*$checkQuery = mysql_query("SELECT * FROM vehicle_repairs WHERE id = ".$_GET['id']."");
		 //echo "SELECT * FROM admin WHERE username = '".$_POST['username']."'  AND password = '".$_POST['Password']."' ".mysql_error();
		
	     $fetch222 = mysql_fetch_array($checkQuery);*/
		 
		 
		 $sql = "select * from vehicle_repairs WHERE id = ".$id."";
		 $fetch222 = $this->db->query($sql)->row_array();


		 ?>
  <div class="row">
    <div class="col-sm-12">
	<div class="col-sm-12" style="background-color:#d8e1f0;"><form action="" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				
				   <label for="example-search-input" class="col-sm-3 col-form-label"> Proposal Document</label>
				  <div class="col-sm-3">
				<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['propsal_document']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				   <label for="example-search-input" class="col-sm-3 col-form-label"> Sanction Letter</label>
				  <div class="col-sm-3">
				      	<a target="_blank"  href="<?php echo base_url()?><?php echo $fetch222['sanction_letter']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
		
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Form 63</label>
				  <div class="col-sm-6">
			<a  target="_blank" href="<?php echo base_url()?><?php echo $fetch222['form63']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Completion Report</label>
				  <div class="col-sm-6">
		<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['completion_report']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
	
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Standing Order</label>
				  <div class="col-sm-6">
	<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['standing_order']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>	
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Completion Report</label>
				  <div class="col-sm-6">
	            <a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['completion_report']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>	
		
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Particulars of Vehicles</label>
				  <div class="col-sm-6">
		<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['particulars_of_vehicle']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Check List</label>
				  <div class="col-sm-6">
	    <a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['check_list']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
		
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Quotation / Auth. Dealer Letter</label>
				  <div class="col-sm-6">
	 <a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['quoation']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
		
				  </div>
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Comparative Statement</label>
				  <div class="col-sm-6">
		<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['comprative_report']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
		
		
		
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Work / Supply Order </label>
				  <div class="col-sm-6">
	<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['work_order']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
		
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Invoice</label>
				  <div class="col-sm-6">
			<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['invoice']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label"> Advance Stamp Receipt</label>
				  <div class="col-sm-6">
	<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['advance_stamp_report']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label"> Bank Details</label>
				  <div class="col-sm-6">
		<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['bank_details']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label"> Condemnation on proposal</label>
				  <div class="col-sm-6">
		<a target="_blank" href="<?php echo base_url()?><?php echo $fetch222['condemnation_on_proposal']; ?>"><img src="<?php echo base_url()?>assets/img/documents-icon.png" height="40" download></a>
				  </div>
				  
				  
				  
				  
				  
				
				</div>
				
				
				
				
				
				
				</form></div>
          
          
          
        
		  </div>
  
 

  </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->