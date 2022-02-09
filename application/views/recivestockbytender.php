<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Stock Entry</h1>
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
        
        <form action="<?php echo base_url()?>Recivestockbytender/save" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="item_name" id="item_name_new">
            	<input type="hidden" name="qty_recieved" id="qty_new">
				<div class="form-group row">&nbsp;</div>
			  <div class="form-group row">
			        <div class="col-sm-4">
				  Tender Number
				  
				    <select class="form-control show-tick" name="tender_number" id="tender_number">  
						<option value=""> Select tender number</option>		
						<?php /*$tenders_details=mysql_query("SELECT DISTINCT tender_number FROM tenders_details");
						if(!empty(mysql_num_rows($tenders_details)))
						 {
					
						while($rowMakes = mysql_fetch_array($tenders_details)){*/

					$sql = "SELECT DISTINCT tender_number FROM tenders_details";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){		

						?>		 
						<option value="<?php echo $rowMakes['tender_number'];?>" <?php if(!empty($row['tender_number'])) { if ($rowMakes['tender_number']==$row['tender_number']) { echo 'selected'; } } ?>><?php echo $rowMakes['tender_number'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
                    <div class="col-sm-4">
				  Item Name
				  
				    <select class="form-control show-tick" id="item_name" disabled>  
						<option value=""> Item</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						*/
						
						$sql = "SELECT * FROM logistics_kits_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){		
						
						?>		 
						<option value="<?php echo $rowMakes['logistics_name'];?>" <?php if(!empty($row['item_name'])) { if ($rowMakes['logistics_name']==$row['item_name']) { echo 'selected'; } } ?>><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  
				  </div>
				  <div class="col-sm-4">
				 Item Description
				  
				    <textarea class="form-control" name="description" id="description" cols="8" rows="2"></textarea>
				 
				  </div>
               
               
                    <div class="col-sm-4">
				  Purpose
				
				    <input type="text" class="form-control" placeholder="Purpose " value="<?php echo $fetch222['purpose']; ?>" name="purpose">
				  
				   </div>
				   <div class="col-sm-4">
				   Qty Recieved
				  
				    <input type="text" class="form-control" disabled placeholder="Qty Recieved" value="<?php echo $fetch222['qty_recieved']; ?>" id="qty_recieved">
				 
				    </div>
               
                    <div class="col-sm-4">
				  Amount
			
				    <input type="text" class="form-control" placeholder="amount " value="<?php echo $fetch222['amount']; ?>" name="amount">
				  </div> 
			
				   <div class="col-sm-4">
				   Purchase From
				
				    <input type="text" class="form-control" placeholder="Purchase From " value="<?php echo $fetch222['purchase_from']; ?>" name="purchase_from">
				 
                </div>
				  
                    <div class="col-sm-4">
				  Tender Type
				 
			        <select class="form-control" name="tender_type" id="tender_type">
			        <option value="Open Tender">Open Tender</option>
			        <option value="E Tender">E Tender</option>
			        <option value="Limited Tender">Limited Tender</option>
			        <option value="GEM">GEM</option>
			        </select>
				
				  </div>
				   
				   
				  
               
				
				       <div class="col-sm-4">
				  LCI Officer 1
				 
					<select class="form-control show-tick" name="lci_officer_1" id="lci_officer_1">  
						<option value="">LCI Officer 1</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

*/


$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){									?>		 
						<option value="<?php echo $rowMakes['lci_officer'];?>" <?php if(!empty($fetch222['lci_officer'])) { if ($fetch222['lci_officer_1']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
                    <div class="col-sm-4">
				   LCI Officer 2
				 
					<select class="form-control show-tick" name="lci_officer_2" id="lci_officer_2">  
						<option value="">LCI Officer 2</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
						*/
						$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){

							?>		 
						<option value="<?php echo $rowMakes['lci_officer'];?>" <?php if(!empty($fetch222['lci_officer'])) { if ($fetch222['lci_officer_2']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  

				  
				  
				 
				       <div class="col-sm-4">
				  
				  LCI Officer 3
				  
					<select class="form-control show-tick" name="lci_officer_3" id="lci_officer_3">  
						<option value="">LCI Officer 3</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_licofficers_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){

							*/
							$sql = "SELECT * FROM logistics_licofficers_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
							?>		 
						<option value="<?php echo $rowMakes['lci_officer'];?>" <?php if(!empty($fetch222['lci_officer'])) { if ($fetch222['lci_officer_3']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['lci_officer'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				   
                    <div class="col-sm-4">
				 Head of Account
				  
					<input type="text" class="form-control" placeholder=" Head of Account" value="<?php echo $fetch222['head_of_account']; ?>" name="head_of_account">
				  </div>
				
       
				   <div class="col-sm-4">
				    <b>Recieve In Good Condition and taken into stock</b><br>	<button name="recivestockbytender" value="approve" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30">Approve</button>  </div>
				    <div class="col-sm-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="text" class="form-control" placeholder="Reason for recject " value="<?php echo $fetch222['notes']; ?>" name="notes">	<button name="recivestockbytender" value="reject" type="submit"><img src="<?php echo base_url()?>assets/img/reject.png" height="30">Reject</button>
				  </div>
				  
				  </div>
                </div>
				   
				</div>
				
				
				
				
				
				
				</form>
				
			
				</div>
  <div class="box-body">
            
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Item Name</td>
               <td>Purchase From</td>
			  <td>Discription</td>
                <td> Purpose</td>
                <td> Qty Rec</td>
                <td> Amount</td>
                <td>Tender Type</td>
                <td>Tender No</td>
                <td> Approve / Reject</td>
                <td>Head of Account</td>
                <td> Sanction Order</td>
                                <td> Supply Order</td>
			                     <td> Current Stock</td>	
                
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
             /* if($_SESSION["name"] == 'SuperAdmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE transfer_fs = 0  AND transfer = 0 ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer = 0 ORDER BY stock_id DESC");
              }
				*/
				$count = 0;
					$tot = 0;
					//if(mysql_num_rows($totalInvoices) > 0)
					//{
				 //  while($row = mysql_fetch_array($totalInvoices)) { 
				 
				 $sql = "SELECT * FROM recivestockbytender  WHERE transfer_fs = 0  AND transfer = 0 ORDER BY stock_id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				    
					
					/*$totalInvoicestenders = mysql_query("SELECT * FROM tenders_details WHERE tender_number = '".$row["tender_number"]."'");
				    $fetchh222 = mysql_fetch_array($totalInvoicestenders);*/
					
					 $sql_inner = "SELECT * FROM tenders_details WHERE tender_number = '".$row["tender_number"]."'";
					$fetchh222 = $this->db->query($sql_inner)->row_array();
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['item_name']; ?></td>
                
                <td><?php echo $row['purchase_from']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['actual_qty']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                 <td><?php echo $row['tender_type']; ?></td>
                  <td><?php echo $row['tender_no']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['head_of_account']; ?></td>
                   <td align="center">	<a target="_blank" href="<?php echo $fetchh222['sanction_order']; ?>"><img src="download-icon.png" height="30"></a></td>
                    <td align="center">	<a target="_blank" href="<?php echo $fetchh222['supply_order']; ?>"><img src="download-icon.png" height="30"></a></td>
<td><?php echo $row['qty_recieved']; ?></td>
			 
               
             </form> </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="11"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table></div> 
  </div>
</div>
	  