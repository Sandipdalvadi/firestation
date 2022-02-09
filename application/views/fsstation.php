
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Fire Stations <small>masters </small> </h1>
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
    <div class="col-sm-6">
	 <div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Fire Staton Name </th>
			   <th>District/Unit </th>
                <th> Status</th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 
				  	$count = 0;
					$tot = 0;
					
					$sql = "SELECT a.*,b.unit_name as unitlbl FROM fsname_masters a LEFT JOIN units_masters b on a.unit_id=b.id   ORDER BY a.id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){					   
				   $count++;
				    //$tot = $tot+$row['total_income'];
				    
				   ?>
              <tr>
               
                <td><?php echo $row['fs_name']; ?></td>
				<td><?php echo $row['unitlbl']; ?></td>				
                <td><?php if($row['status'] == 1){ ?>
                <b>Active</b>
                  <?php }else{ ?>
                   <b>In-Active</b>
            
                  <?php } ?>
                </td>
			   <td><!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | --><a class="deletemecommon" href="<?php echo base_url()?>Fsstation/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
              
               
              </tr>
			  
			  	
            
            
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
    <div class="col-sm-6" style="background-color:#d8e1f0;">
	<form action="<?php echo base_url()?>Fsstation/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				
				<?php
				if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			?>
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
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
					<?php }
					?>
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Fire Station Name</label>
				  <div class="col-sm-6">
					<input type="text" class="form-control" placeholder="Fire Staton Name" value="" required name="fs_name">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop"></label>
				  <div class="col-md-6 margintop" style="float:right">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>
				</div>
				
				
				
				
				
				
				</form></div>

  </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
