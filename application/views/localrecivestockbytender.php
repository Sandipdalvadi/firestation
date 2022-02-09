<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Existing Stock Entry</h1>
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
  
    <div class="col-sm-12" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>Localrecivestockbytender/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
			  <div class="form-group row">
                    <div class="col-sm-6">
					
					
					<label for="example-search-input" class="col-sm-4 col-form-label">District</label>
				  <div class="col-sm-6">
					<select required class="form-control show-tick select2" name="unit_id">  
						<option value="">Select District</option>		
						<?php 
						//$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
						
											$sql = "SELECT * FROM units_masters where 1  ";
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							$sql .= " AND id in (".$idd.") ";
						}
						
						$sql .= " ORDER BY id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Item Name</label>
				  <div class="col-sm-8">
				    <select class="form-control show-tick select2" required name="item_id" id="item_id">  
						<option value=""> Item</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
*/
			$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						$idd = "";
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							//$sql .= " AND id in (".$idd.") ";
						}

					$sql = "SELECT * FROM logistics_kits_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){


				   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  </div>
			
                </div>
                <div class="form-group row">
                   
				   <div class="col-md-6">
				   <label for="example-search-input"  class="col-sm-6 col-form-label"><!--Qty Available-->
				   Servicable Quantity
				   </label>
				  <div class="col-md-6">
				    <input type="number" required class="form-control" placeholder="Qty Recieved" value="" id="serqty1" name="qty">
				  </div> 
				    </div>
					
					
					<div class="col-md-6">
				   <label for="example-search-input" class="col-sm-6 col-form-label"><!--Qty Available-->
				   Un Servicable Quantity
				   </label>
				  <div class="col-md-6">
				    <input type="number" required id="unserqty1"  class="form-control" placeholder="Qty Recieved" value="" name="unservcableqty" >
				  </div> 
				    </div>
					
					 <div class="col-md-6">
				   <label for="example-search-input" class="col-sm-4 col-form-label"><!--Qty Available-->
				   Total Quantity:<span id="totalqty1"></span>
				   </label>
				   </div>
					
					
					
                </div>
                
				  <div class="form-group row"><button name="recivestockbytender" value="approve" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button></div>
				  
                </div>
				   
				</div>
				
				
				
				
				
				
				</form></div>
  <div class="box-body">
            
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>District</td>
			  <td>Item Name</td>
              
			    <td> Servicable Qty </td>
        <td> Un Servicable Qty </td>
                	
                   <td> Date</td>	
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              /*if($_SESSION["name"] == 'SuperAdmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE existingstock = 1 ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND existingstock = 1 ORDER BY stock_id DESC");
              }
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				   	$sql = "SELECT a.*,b.logistics_name,c.unit_name as uu FROM local_stock_unit a,logistics_kits_masters b,units_masters c  where c.id=a.unit_id and a.item_id=b.id  ";
					if($idd != '')
					{
						$sql .= " AND a.unit_id in (".$idd.")";
					}
					
					$sql .= " order by  a.id DESC ";
					
					//echo $sql;die;
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
						
						
						
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				   ?>
				  
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
			  
			  
			  <td><?php echo $row['uu']; ?></td>
               <td><?php echo $row['logistics_name']; ?></td>
                
              
                <td><?php echo $row['qty']; ?></td>
                 <td><?php echo $row['unservcableqty']; ?></td> 
                 <td><?php echo $row['created_at']; ?></td>
			 
               
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
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->