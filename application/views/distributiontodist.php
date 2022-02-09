<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>Distribution To District <small>logistics </small> </h2>
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
    <div class="col-sm-12">
	 <div class="box-body">
	      <?php  if(1)
              {
                  ?>
				  <script>
				  function setMaxQty(itemId,classno)
				  {
					  $.ajax({
				url: "<?php echo base_url()?>distributiontodist/getavlqty",
				type: "POST",
				data: {
					itemId: itemId									
				},
				cache: false,
				success: function(dataResult){
					$(".qtyrec"+classno).attr({
       "max" : dataResult,        // substitute your own
       "min" : 1          // values (or variables) here
    });
				}
			});
				  }
				  </script>
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Item Name </td>
               <td> District</td>
			  <td>Discription</td>
                <td> Distribution Order No</td>
                <td> Qty</td>
               
                <td> IV Number</td>
                <td> IV Date</td>
               
				<td>Action</td>
                
              </tr>
            </thead>
            <tbody>
              <?php
			   /*if($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 3 || $_SESSION['login_role'] == 5)
              {
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE  updated_by = '".$_SESSION["name"]."' AND transfer = 0 AND item_name <> '' ORDER BY stock_id DESC");
               // echo "SELECT * FROM recivestockbytender  WHERE  updated_by = '".$_SESSION["name"]."' AND transfer = 0 AND item_name <> '' ORDER BY stock_id DESC";
              }else{
                  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE item_name <> '' AND district <> '' ORDER BY stock_id DESC"); 
              }
			  */
			
			  
			  
			  	  	$count = 0;
					$tot = 0;
					/*if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   	$sql = "SELECT MAX(item_id) as item_id,MAX(stock_id) as stock_id   FROM recivestockbytender_new  WHERE 1 group by item_id  ORDER BY stock_id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					  
					foreach($rows as $key=>$row){
				   $count++;
				   
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				    if(1)
				    {
				   ?>
              <tr><form action="<?php echo base_url()?>distributiontodist/save" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
                <td>	<select required style="width:140px;" class="form-control show-tick select2" name="item_id" onchange="setMaxQty(this.value,'<?php echo $count?>')" >  
					<option value=""> Select</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters WHERE logistics_name LIKE '%".$row['item_name']."%'");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ */

					$sql = "SELECT * FROM logistics_kits_masters WHERE id ='".$row['item_id']."'";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($row['item_name'])) { if ($rowMakes['logistics_name'] == $row['item_name']) { echo 'selected'; } } ?>><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Item Not Available</option>';
                        } ?>
                        </select>

</td>
<td>
<select style="width:140px;" required class="form-control show-tick select2" name="district" >  
						<option value=""> District</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM units_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ */
						
						$sql = "SELECT * FROM units_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($row['district'])) { if ($rowMakes['unit_name']==$row['district']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select></td>
            

                
     


   <td><input type="text" required class="form-control" placeholder="Discription" value="<?php echo $row['description']; ?>"  name="description"></td>
               
               
                 <td><input type="text"  required class="form-control " placeholder="D. ORDER NO" min="0" max="0" value="<?php //echo $row['distribution_order_no']; ?>" name="distribution_order_no"></td>
                <td><input type="number" style="width:70px;" required class="form-control qtyrec<?php echo $count?>" placeholder="Qty " value="" min="1" max="1" required name="qty_recieved" id="qty_recieved" > <!--onchange="check()"-->
                
                <input type="hidden" class="form-control" placeholder="IV No" value="<?php echo $row['qty_recieved']; ?>" name="qty_recieved_old" id="qty_recieved_old">
                </td>
               
               
                  <td><input required type="text" class="form-control" placeholder="IV No" value="<?php echo $row['iv_number']; ?>" required name="iv_number"></td>
                  <td>	<input required type="date" class="form-control" placeholder="IV Date" value="<?php echo $row['iv_date']; ?>" name="iv_date"></td>
                   
               
			   <td><button type="submit" ><img src="<?php echo base_url()?>assets/img/save-icon.png" height="30"></button> </td>
              
               
            </form>  </tr>
			  
			  	
            
            
            <?php 
				    }
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="9"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table>
          
          <?php } ?>
          </div>
          
          
           <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Item Name</td>
               <td>District</td>
			  <td>Discription</td>
                <td> Distribution Order No</td>
                <td>Qty</td>
               
                <td> IV Number</td>
                <td> IV Date</td>
               
			
                
              </tr>
            </thead>
            <tbody>
              <?php
              /*if($_SESSION["name"] == 'superadmin'  || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE district <> '' ORDER BY stock_id DESC"); 
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."' AND transfer = 1  ORDER BY stock_id DESC");
              }
              
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   */
				   $count = 0;
					$tot = 0;
				   	$sql = "SELECT a.*,b.unit_name,c.logistics_name FROM recivestockbytender_new a ,units_masters b  ,  logistics_kits_masters c where c.id=a.item_id and  a.to_transfer_id=b.id order by a.stock_id desc ";
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
               <td><?php echo $row['logistics_name']; ?></td>
                
                <td><?php echo $row['unit_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['distribution_order_no']; ?></td>
               <td><?php echo $row['qty_recieved']; ?></td>
               
                  <td><?php echo $row['iv_number']; ?></td>
                  <td><?php echo $row['iv_date']; ?></td>
                   
               
			   
              
               
            </form>  </tr>
			  
			  	
            
            
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