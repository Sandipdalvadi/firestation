<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Unserviceable Lists   </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <script>
				  function populateFS(unitId)
				  {
					  $.ajax({
				url: "<?php echo base_url()?>Unserviceable/getfs2",
				type: "POST",
				data: {
					unitId: unitId									
				},
				cache: false,
				success: function(dataResult){
					$("#sel_fs_id").html(dataResult);
				}
			});
				  }
				  
				  
				  function populateFSItems(fsid)
				  {
					 $.ajax({
				url: "<?php echo base_url()?>Unserviceable/getfsitems",
				type: "POST",
				data: {
					fsid: fsid									
				},
				cache: false,
				success: function(dataResult){
					$("#sel_item_id").html(dataResult);
				}
			});  
				  }
				  </script>
	  <div class="container-fluid">
	  <?php echo  $this->session->flashdata('message'); ?>
  <div class="row">
   
   
				
				
				 
				   
	   
	   
  
<form name="form" method="post" action="<?php echo base_url()?>Unserviceable/save">	

  <div class="form-group row">
			
				<?php
				$show = 0;
				if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			$show = 1;
			?>
					<label for="example-search-input" class="col-sm-4 col-form-label">District</label>
				  <div class="col-sm-6">
					
					<select class="form-control show-tick select2" name="sel_unit_id" onchange="populateFS(this.value)" >  
						
						
						
						
						<?php
if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
						}
else {						
					?>
						<option value="">All District</option>				
						<?php }
						?>
						<?php /*$getAllmakes=mysql_query("SELECT * FROM units_masters");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['unit_name'];?>" <?php if(!empty($row['unit_from'])) { if ($rowMakes['unit_name']==$row['unit_from']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        }*/

						$sql = "SELECT * FROM units_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					   
					   $selected = 0;
					   $selectedchk = "";
					foreach($rows as $key=>$rowMakes){
							



if($_SESSION['unit'] != '' && $_SESSION['unit'] != NULL && $_SESSION['unit'] != null  )
						{
							if( $rowMakes['id'] != $_SESSION['unit'] )
							{
								continue;
							}
							else
							{
								$selected++;
								$selectedchk = 'selected';
							}
						}
						else
						{
							//$selected++
							$selected = 0;
							$selectedchk = "";				   
					   
						}
						
						
						
							?>		 
						<option <?php echo $selectedchk?> value="<?php echo $rowMakes['id'];?>" <?php if(!empty($row['unit_to'])) { if ($rowMakes['unit_name']==$row['unit_to']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">District Not Available</option>';
                        } ?>
                        </select>
						
				  </div> 
					<?php }
					?>
					
					
						<?php
						//$_SESSION['fs_name']
				if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			
			$show = 1;
			?>
					<label for="example-search-input" class="col-sm-4 col-form-label">FS</label>
				  <div class="col-sm-6">
					
					<select class="form-control show-tick select2" required name="sel_fs_id" id="sel_fs_id" onchange="populateFSItems(this.value)" >  
						<option value="">Select FS</option>
<?php
if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )
{
}
else	
		{
		$sql = "select * from fsname_masters where unit_id='".$this->session->userdata('unit')."'";
	    $result = $this->db->query($sql)->result_array();	    
	    foreach($result as $key => $value)
	    {
?><option value="<?php echo $value['id']?>"><?php echo $value['fs_name']?></option>
		<?php }
		}
?>		
						
                        </select>
						
				  </div> 
					<?php }
					else
					{
					?>
					<label for="example-search-input" class="col-sm-4 col-form-label">FS</label>
				  <div class="col-sm-6">
					
					<select class="form-control show-tick select2" required name="sel_fs_id" id="sel_fs_id" onchange="populateFSItems(this.value)" > 
<?php


$sql = "select * from fsname_masters where id='".$this->session->userdata('fs_name')."'";
	    $result = $this->db->query($sql)->result_array();	    
	    foreach($result as $key => $value)
	    {
?><option value="<?php echo $value['id']?>"><?php echo $value['fs_name']?></option>
		<?php }
		
?>		
						
                        </select>
						 </div> 
					
					<?php }
					?>
					
				
					
					
					 <label for="example-search-input" class="col-sm-4 col-form-label">Item Name</label>
				  <div class="col-sm-6">
				    <select class="form-control show-tick select2" onchange="setMaxQty(this.value)"  required name="item_name" id="sel_item_id">  
						<option value=""> Item</option>	
<?php
if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )
{
}
else	
		{
			
			$fsid = $this->session->userdata('fs_name');
		
		$s2 = "select MAX(b.stock_id), a.id as item_id,a.logistics_name,b.fs_current_stock from logistics_kits_masters a INNER JOIN recivestockbytender_new b ON a.id=b.item_id  WHERE  b.to_transfer_id = '".$fsid."' and b.to_transfer_type='FS' group by b.item_id  order by b.stock_id desc ";					
		$rows = $this->db->query($s2)->result_array();
		$array = [];
		$item_idsss = 0;
		foreach($rows  as $key => $value)
		{
			$item_idsss .= ",".$value["item_id"];
			
			//get local stock
			$sql = "select IFNULL(SUM(unservcableqty),0) as qqq from local_stock_fs where fs_id='".$fsid."' and  item_id='".$value["item_id"]."'";
			$rrr= $this->db->query($sql)->row_array();
			$array[] = array("item_id"=>$value["item_id"],"logistics_name"=>$value["logistics_name"],"maxstock"=>$value["fs_current_stock"]+$rrr["qqq"]);
		}
		
		
		//get loca stock  with no transfer from district at all.
		$sql_9 = "select SUM(a.unservcableqty) as stst,b.logistics_name,c.fs_name,b.id as item_id from local_stock_fs a ,logistics_kits_masters b  
				,fsname_masters c where a.item_id=b.id and c.id = a.fs_id and a.item_id NOT IN (".$item_idsss.") group by a.item_id,a.fs_id";
				$rows_9 = $this->db->query($sql_9)->result_array();
				foreach($rows_9 as $k1 => $value )
				{
					$array[] = array("item_id"=>$value["item_id"],"logistics_name"=>$value["logistics_name"],"maxstock"=>$value["stst"]);
				}
		
		//print_r($array);
		
		 $options = "";//"<option value=''>Select Item</option>";
		 
		 //get District
		 
		 $spp = "select * from fsname_masters where id='".$fsid."'";
		 $rd = $this->db->query($spp)->row_array();
		 //end district
	    foreach($array as $key => $value)
	    {
				//get old unservicable sum qty
				$sql_old = "select IFNULL(SUM(qty),0) as oldqty from unserviceable_list where fs_id='".$fsid."' and item_id='".$value['item_id']."'";
				$row_old = $this->db->query($sql_old)->row_array();
				$value['maxstock'] = $value['maxstock'] - $row_old["oldqty"];
				
    	        $ids = $value['item_id'].':'.$value['maxstock'].':'.$rd["unit_id"];
				$options .= "<option value='".$ids."'>".$value['logistics_name'].'('.$value['maxstock'].")</option>";
	    }
	    
	    echo $options;
		}
		?>
			
						
                        </select>
				  </div> 
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label">Qty</label>
				  <div class="col-sm-6">
				    <input type="number" min=1  required class="form-control qtyrecs" placeholder="Qty" value="<?php echo $fetch222['qty']; ?>" name="qty">
				  </div> 
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Date</label>
				  <div class="col-sm-6">
				    <input type="date" required class="form-control " placeholder="Date" value="<?php echo $fetch222['entry_date']; ?>" name="entry_date">
				  </div> 
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Remarks</label>
				  <div class="col-sm-6">
				    <input type="text" class="form-control" placeholder="Remarks" value="<?php echo $fetch222['remarks']; ?>" name="remarks">
				  </div> 
				  
				  <div class="col-sm-2">
					<button name="unserviceable_list" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				  
				  
						</div></form> 
						<script>
				  function setMaxQty(itemId)
				  {					 
					 const myArray = itemId.split(":");
					 $(".qtyrecs").attr({
						   "max" : myArray[1],        // substitute your own
						   "min" : 1          // values (or variables) here
						});
				  }
				  </script>
	   <div class="col-sm-12" style="background-color:#d8e1f0;"><div class="box-body">
	     <table id="examplecom" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Fire Staton Name </th>
                <th> Item Name</th>
				<th>Qty</th>
				<th>Date</th>
				<th>Remarks</th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
			
              <?php
              
                /*if($_SESSION["name"] == 'superadmin')
              {
              $totalInvoices = mysql_query("SELECT * FROM unserviceable_list  WHERE condemnation = 0 ORDER BY id DESC");    
              }else{
			  $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_SESSION["name"]."' AND condemnation = 0 ORDER BY id DESC");
              }
              
             if(isset($_POST['district'])) {
                 $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_POST["district"]."' AND condemnation = 0 ORDER BY id DESC");
             }
              */
			  	$count = 0;
					$tot = 0;
			  $sql = "SELECT a.*,b.logistics_name as itmnme,c.fs_name as fss FROM unserviceable_list a INNER JOIN logistics_kits_masters b  ON a.item_id=b.id INNER JOIN fsname_masters c ON c.id=a.fs_id  WHERE a.condemnation = 0 ORDER BY a.id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					
					
					
			 
				  
					///if(mysql_num_rows($totalInvoices) > 0)
					///{
				   //while($row = mysql_fetch_array($totalInvoices)) { 
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
               
			   <td align="center"> <a href="<?php echo base_url()?>Unserviceable/condm/<?php echo $row['id']; ?>"><b>Move To Condemnation</b></a></td>
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }?>
            </tbody>
            
            
          </table></div>
		  </div>

  </div></div>

	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->