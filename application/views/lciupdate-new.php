<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Line Committee Inspection Report update by AEO</h1>
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
  
    <div class="col-sm-12" style="background-color:#d8e1f0;">
        
        <form action="<?php echo base_url()?>Lcireportupdate/index2" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="item_name" id="item_name_new">
            	<input type="hidden" name="qty_recieved" id="qty_new">
				<div class="form-group row">&nbsp;</div>
			  <div class="form-group row">
			        <div class="col-sm-4">
				  Tender Number
				  
				    <select class="form-control show-tick myselect" required name="tender_number" id="tender_number">  
						<option value=""> Select tender number</option>		
						<?php /*$tenders_details=mysql_query("SELECT DISTINCT tender_number FROM tenders_details");
						if(!empty(mysql_num_rows($tenders_details)))
						 {
					
						while($rowMakes = mysql_fetch_array($tenders_details)){*/

					$sql = "SELECT id, tender_number FROM tenders_details_new where status='received' order by id desc ";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){		

						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($row['tender_number'])) { if ($rowMakes['tender_number']==$row['tender_number']) { echo 'selected'; } } ?>><?php echo $rowMakes['tender_number'];?></option>			 
                        <?php  }
                        }else{
                       // echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
                    
				
       
				  


				  
						</div>

  <div class="col-sm-2">
					<button name="tenders_details" value="Submit" type="submit" class="btn btn-success">Submit</button>
				  </div>
                </div>
				   
				</div>
				
				
				
				
				
				
				</form>
				
			
				</div>

</div>
	  