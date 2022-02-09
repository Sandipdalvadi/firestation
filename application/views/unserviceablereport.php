 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	   Unserviceable Lists</h1>
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
     <div class="col-sm-12" style="background-color:#d8e1f0;">
    
  <div class="box-body">
      <?php  if($_SESSION["loginid"] == 'superadmin' && false)
              {
                  ?> <form action="" method="post">
				         	<div class="form-group row">
				         	    
				 <label for="example-search-input" class="col-sm-4 col-form-label">District  </label>
				  <div class="col-sm-6">
				  <select class="form-control show-tick" name="district" id="district">  
						<option value=""> District</option>		
						<?php 
						
              /*$getAllmakes=mysql_query("SELECT * FROM units_masters");
              
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['unit_name'];?>" <?php if(!empty($_POST['district'])) { if ($rowMakes['unit_name']==$_POST['district']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        }*/
						?>
                        </select>
				  </div>         	    
				         	    
				  
				   <div class="col-sm-1">
					<button name="search_unrecivable" type="submit"><img src="searchbtn.png" height="30"></button>
				  </div>
			</div>
				     </form>
				     <?php } ?>
  <table id="examplecom" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
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
              /*$qtytotal = 0;
                if(isset($_POST['district'])){
                   $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_POST["district"]."' ORDER BY id DESC");
              }else{
                  if($_SESSION["loginid"] === 'superadmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
						$totalInvoices=mysql_query("SELECT * FROM unserviceable_list");
              }else{
		$totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE updated_by = '".$_SESSION["name"]."'");
		          
              }
              }
              
              
                if($_SESSION['login_role'] == 4)
		            {
		                $fsname_masters = mysql_query("SELECT * FROM fsname_masters WHERE updated_by = '".$_SESSION['name']."'");
		                //echo "SELECT * FROM fsname_masters WHERE updated_by = '".$_SESSION['name']."'";
		                $fslist = array();
		                while($rowwewew=mysql_fetch_array($fsname_masters))
		                {
		                    array_push($fslist, $rowwewew['fs_name']);
		                }
		               // print_r($fslist);
		                $array = implode("','",$fslist);
		                $totalInvoices = mysql_query("SELECT * FROM unserviceable_list WHERE fs_name  IN ('".$array."')");
		            }
			 
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   $count++;
				    $qtytotal = $qtytotal+$row['qty'];
				    */
					
					$sql = "SELECT a.*,b.fs_name as fss,c.logistics_name FROM unserviceable_list a INNER JOIN  fsname_masters b on a.fs_id=b.id INNER JOIN logistics_kits_masters c on c.id=a.item_id ";
					if($_SESSION['fs_name'] != '' && $_SESSION['fs_name'] != NULL && $_SESSION['fs_name'] != null  )
						{
							$sql .= " and b.id ='".$_SESSION['fs_name']."'";
						}
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){
						
				   ?>
              <tr>
               
                <td><?php echo $row['fss']; ?></td>
                <td><?php echo $row['logistics_name']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo date("d/m/Y", strtotime($row['entry_date'])); ?></td>
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
            
            
          </table>
          
 </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->