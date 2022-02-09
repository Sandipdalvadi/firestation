
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1> Vehicle Variant <small>masters </small> </h1>
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
	 <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
             <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
                <th>Vehicle Make</th>
               <th>Vehicle Type</th>
			  <th>Vehicle Variant</th>
               
                <th> Status</th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 
				  	$count = 0;
					$tot = 0;
					
					$sql = "SELECT * FROM vehicle_variant_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){					   
				   $count++;
				    //$tot = $tot+$row['total_income'];
				   
					
					 $s2 = "select * from vehicle_make_masters  WHERE  id = '".$row['vehicle_make_masters_id']."'";
					
					$r2= $this->db->query($s2)->row_array();
					
					
					$s3 = "select * from vehicle_type_masters  WHERE  id = '".$row['vehicle_type_masters_id']."'";
					
					$r3= $this->db->query($s3)->row_array();
				   ?>
              <tr>
               
               <td><?php echo $r2["vehicle_make"]; ?></td>
			   <td><?php echo $r3["vehicle_type"]; ?></td>
                <td><?php echo $row['vehicle_variant']; ?></td>
                <td><?php if($row['status'] == 1){ ?>
                <b>Active</b>
                  <?php }else{ ?>
                   <b>In-Active</b>
            
                  <?php } ?>
                </td>
			   <td><!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | --><a class="deletemecommon" href="<?php echo base_url()?>Vhvarient/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
              
               
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
		  
    <div class="col-sm-12" style="background-color:#d8e1f0;">
	<form action="<?php echo base_url()?>Vhvarient/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				
				
				<label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Make</label>
				  <div class="col-sm-6">
					<select required class="form-control show-tick select2" name="vehicle_make_masters_id" id="vehicle_make_masters_id">  
						<option value="">Select Make</option>		
						<?php 
						$sql = "SELECT * FROM vehicle_make_masters  ORDER BY id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['vehicle_make'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Type</label>
				  <div class="col-sm-6 margintop">
					<select required  class="form-control show-tick select2" name="vehicle_type_masters_id" id="vehicle_type_masters_id">  
					
						
                        </select>
				  </div> 
				  
				  
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Variant</label>
				  <div class="col-sm-6 margintop">
					<input required type="text" class="form-control" placeholder="Vehicle Variant" value="<?php echo $fetch222['vehicle_variant']; ?>" name="vehicle_variant">
				  </div>
				  <!--<div class="col-sm-2">
					<button name="vehicle_make_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>-->
				  
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
