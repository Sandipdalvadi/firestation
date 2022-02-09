<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Tender Order - Distribution Details</h1>
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
        
        <form action="<?php echo base_url()?>Tenderdistributiondetails/index2" method="post" enctype="multipart/form-data">
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

					//$sql = "SELECT id, tender_number FROM tenders_details_new where status='line committee inspected' order by id desc ";
					$sql = "SELECT id, tender_number FROM tenders_details_new where status='received' or status='line committee inspected' order by id desc ";
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
                        //echo '<option value="">Makes Not Available</option>';
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
				
				
				
				  <div class="col-sm-12"> 
         <div class="box-body">
             
	     <table id="examplecom" class="table table-bordered table-hover display nowrap  table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Financial Year</th>
              <th>Tender Type</th>
              <th>Tender Date</th>
              <th>RC NO</th>
              <th>Tender No</th>
              <th>Supply Order No</th>
               <th>Title</th>
			  <!--<th>Item Name</th>
                
                <th>Qty</th>-->
                <th> E-Tender Copy</th>
                <th>Final SPC Copy</th>
                <!--<th>Supply Order</th>-->
				<th>Supply Order</th>
				<th>Distribution Order</th>
 <th>Status</th>
               <th></th>
                
              </tr>
            </thead>
            
               
            <tbody>
              <?php
			 /* if(!empty($_SESSION['district']))
							{
							    //echo "SELECT * FROM vehicleD WHERE financial_year <> '' AND allotedUnit = '".$_SESSION['district']."'";
							$totalInvoices=mysql_query("SELECT * FROM tenders_details WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'");
							//echo "SELECT * FROM tenders_details WHERE financial_year <> '' AND updated_by = '".$_SESSION['district']."'";
							}else{
			  $totalInvoices = mysql_query("SELECT * FROM tenders_details WHERE financial_year <> ''  ORDER BY id DESC");
							}
							*/


							
							$sql = "SELECT * FROM tenders_details_new WHERE status = 'sanctioned and distribution order done'  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					
						
						
						
				  	$count = 0;
					$tot = 0;
					if($totalInvoices > 0)
					{
				   //while($row = mysql_fetch_array($totalInvoices)) {
					$rows = $this->db->query($sql)->result_array();				  
					foreach($rows as $key=>$row){					 					   
				   $count++;
				   
				   
				   ?>
				  
              <tr>
               <td><?php echo $row['financial_year']; ?></td>
               <td><?php echo $row['tender_type']; ?></td>
               
                <td><?php echo date("d/m/Y", strtotime($row['tender_date'])); ?></td>
                
                  <td><?php echo $row['rc_number']; ?></td>
                   <td style='color:red'><?php echo $row['tender_number']; ?></td>
                    <td><?php echo $row['supply_order_number']; ?></td>
                <td><?php echo $row['title']; ?></td>
              <!--<td><?php echo $row['item_name']; ?></td>  
              <td><?php echo $row['qty']; ?></td>  -->
               <td>	<a target="_blank" href="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['e_tender_copy']; ?>" height="40" >--><img height="40"  src="<?php echo base_url()?>assets/img/download-icon.png"></a></td>
               
               <td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['final_spc_copy']; ?>" height="40" download>--><img height="40"  src="<?php echo base_url()?>assets/img/download-icon.png"></a></td>
               
              <!-- <td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['supply_order']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['supply_order']; ?>" height="40" download>download</a></td>-->
			   
			    <td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['sanction_order']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['sanction_order']; ?>" height="40" download>--><img height="40"  src="<?php echo base_url()?>assets/img/download-icon.png"></a></td>
				
				 <td>	<a target="_blank"  href="<?php echo base_url()?><?php echo $row['distribution_order']; ?>"><!--<img src="<?php echo base_url()?><?php echo $row['distribution_order']; ?>" height="40" download>--><img height="40"  src="<?php echo base_url()?>assets/img/download-icon.png"></a></td>
				 
				 
               <td><?php echo strtoupper($row['status']); ?></td> 
			<td><a href="<?php echo base_url()?>Tenderdetailsbyconew/view/<?php echo $row['id']; ?>" style="color:blue">View Items</a></td>
               
             
           </tr>
			  
			  	
            
            
            <?php 
				  }
				  }?>
            </tbody>
            
            
          </table></div> 
		  </div>

</div>
	  