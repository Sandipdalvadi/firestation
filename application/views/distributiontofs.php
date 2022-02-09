 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>Distribution To Fire Station <small>logistics </small> </h2>
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
	     <?php  if($_SESSION["loginid"] != 'superadmin' or true)
              {
                  ?>
				  
				  
				  
				   <script>
				  function setMaxQty(fsid,classno)
				  {
					  
					  itemId = $("#item_id"+classno).val();
					  //alert(itemId)
					  $.ajax({
				url: "<?php echo base_url()?>Distributiontofs/getavlqty",
				type: "POST",
				data: {fsid: fsid,itemId: itemId},
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
              <td>Item Name</td>
               <td>FS Name</td>
              
			  <td>Description</td>
                <td> Distribution Order No</td>
                <td> Qty</td>
               
                <td> IV Number</td>
                <td> IV Date</td>
               
				<td>Action</td>
                
              </tr>
            </thead>
            <tbody>
              <?php
			  /*if($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 5 || $_SESSION['login_role'] == 3)
              {
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE  updated_by = '".$_SESSION["name"]."' AND fs_name = '' ORDER BY stock_id DESC");
                //echo "SELECT * FROM recivestockbytender  WHERE  (updated_by = '".$_SESSION["name"]."') AND fs_name = '' ORDER BY stock_id DESC";
              }else{
                  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender  WHERE district <> '' ORDER BY stock_id DESC"); 
              }
				  	
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   $count = 0;
					$tot = 0;
				   //$sql = "SELECT * FROM recivestockbytender  WHERE district <> '' ORDER BY stock_id DESC";

 $sql = "SELECT a.*,b.logistics_name FROM recivestockbytender_new a,logistics_kits_masters b where a.item_id=b.id  ";
 
 if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			$sql .= " and a.to_transfer_id='".$this->session->userdata('unit')."'" ;
		}
		$sql .= " group by b.id";
		
 
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				    if($row['qty_recieved'] > 0)
				    {
				   ?>
              <tr><form action="<?php echo base_url()?>Distributiontofs/save" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
                <td><select required  style="width:200px;"  class="form-control show-tick" name="item_id" id="item_id<?php echo $count?>">  
					
						<?php /*$getAllmakes=mysql_query("SELECT * FROM logistics_kits_masters WHERE logistics_name LIKE '%".$row['item_name']."%'");
						if(empty(mysql_num_rows($getAllmakes)))
						 {
						    $getAllmakes=mysql_query("SELECT * FROM logistics_kits_for_local_masters WHERE logistics_name = '".$row['item_name']."'"); 
						 }
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						*/
						$sql = "SELECT * FROM logistics_kits_masters WHERE id = '".$row['item_id']."'";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
						
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['logistics_name'];?></option>			 
                        <?php  }
                        }?>
                        </select></td><td>
<select style="width:160px;" required class="form-control show-tick" name="fs_id" id="fs_id" onchange="setMaxQty(this.value,'<?php echo $count?>')">  
						<option value=""> FS Name</option>		
						<?php  /*if($_SESSION["name"] == 'superadmin')
              {
              $getAllmakes = mysql_query("SELECT * FROM fsname_masters  ORDER BY id DESC");    
              }else{
			  $getAllmakes = mysql_query("SELECT * FROM fsname_masters WHERE updated_by = '".$_SESSION["name"]."' ORDER BY id DESC");
              }
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ */
						$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						$sqlUn = "";
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							$sqlUn .= " and unit_id in(".$idd.")" ;
						}
						
						$sql = "SELECT * FROM fsname_masters where 1";//unit_id='".$_SESSION["unit"]."'";
						
						if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
		}
		else{
			//$sql .= " and unit_id='".$this->session->userdata('unit')."'" ;
			
		}
		
		$sql .= $sqlUn;
		
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['fs_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select></td>
                
               
               <td><input required type="text" class="form-control" placeholder="IV No" value="<?php echo $row['description']; ?>" id="description" name="description"></td>
               
               
                 <td><input required type="text" class="form-control" placeholder="Order No" value="<?php //echo $row['distribution_order_no']; ?>" name="distribution_order_no"></td>
                <td><input required style="width:70px" type="number" min=1 max=1 class="form-control qtyrec<?php echo $count?>" placeholder="Qty" value="<?php //echo $row['qty_recieved']; ?>" id="qty_recieved" name="qty_recieved" onchange="check()">
                
                <input type="hidden" class="form-control" placeholder="IV No" value="<?php echo $row['qty_recieved']; ?>" name="qty_recieved_old" id="qty_recieved_old">
                </td>
               
               
                  <td><input required type="text" class="form-control" placeholder="IV No" value="<?php //echo $row['iv_number_fs']; ?>"  name="iv_number_fs"></td>
                  <td>	<input required  type="date" class="form-control"  placeholder="IV Date" value="<?php //echo $row['iv_date_fs']; ?>" name="iv_date_fs"></td>
                   
               
			   <td><button type="submit"  name="doSubmit" id="doSubmit"><img src="<?php echo base_url()?>assets/img/save-icon.png" height="30"></button> </td>
              
               
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
              <td>District Name</td>
               <td>FS Name</td>
			  <td>Description</td>
                <td> Distribution Order No</td>
                
               <td> Qty</td>
                <td> IV Number</td>
                <td> IV Date</td>
               
			
                
              </tr>
            </thead>
            <tbody>
              <?php
               /*if($_SESSION["name"] == 'superadmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE district = ''   ORDER BY stock_id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM recivestockbytender WHERE updated_by = '".$_SESSION["name"]."'  ORDER BY stock_id DESC");
              }
              
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   $count = 0;
					$tot = 0;
				   //$sql = "SELECT * FROM recivestockbytender";
 $sql = "SELECT a.*,b.logistics_name,c.fs_name as fss,u.unit_name FROM recivestockbytender_new a,logistics_kits_masters b ,fsname_masters c,units_masters u  where u.id=a.from_transfer_id and  a.to_transfer_id=c.id and  a.item_id=b.id and a.from_transfer_id in (".$idd.") AND (transfer_fs = 1 or transfer_fs = 2) order by a.stock_id desc";

					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
						
						
				   $count++;
				    $tot = $tot+$row['total_income'];
				    $vehicle_make_masters_id = $row['vehicle_make_masters_id'];
				        if($row['qty_recieved'] > 0)
				    {
				   ?>
              <tr><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['logistics_name']; ?></td>
                 <td><?php echo $row['unit_name'];//getDistrictsDetails($row['fs_name']); ?></td>
                <td><?php echo $row['fss']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['distribution_order_no']; ?></td>
                  <td><?php echo $row['qty_recieved']; ?></td>
              
               
                  <td><?php echo $row['iv_number_fs']; ?></td>
                  <td><?php echo $row['iv_date_fs']; ?></td>
                   
               
			   
              
               
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