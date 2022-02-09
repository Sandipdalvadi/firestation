
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Vehicle Description <small>masters </small> </h1>
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
    <div class="col-sm-7">
	 <div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
             <th> Description</th>
              <th></th>  
              <th></th>  
             <th></th>  
              <th></th>  
                <th>Status</th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 
				  	$count = 0;
					$tot = 0;
					
					$sql = "SELECT * FROM description_by_vehicle_type_masters  ORDER BY id DESC";
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
               
                <td><?php echo $row['name']; ?></td>
                 <td><img src="<?php echo $row['image1']; ?>" height="40"></td>
                  <td><img src="<?php echo $row['image2']; ?>" height="40"></td>
                   <td><img src="<?php echo $row['image3']; ?>" height="40"></td>
                    <td><img src="<?php echo $row['image4']; ?>" height="40"></td>
                <td><?php if($row['status'] == 1){ ?>
                <b>Active</b>
                  <?php }else{ ?>
                   <b>In-Active</b>
            
                  <?php } ?>
                </td>
			   <td><!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | --><a class="deletemecommon" href="<?php echo base_url()?>Vhdescription/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
              
               
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
    <div class="col-sm-5" style="background-color:#d8e1f0;">
	<form action="<?php echo base_url()?>Vhdescription/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
					<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Description</label>
				  <div class="col-sm-6">
					<input type="text" class="form-control" placeholder="Vehicle Description" value="<?php echo $fetch222['name']; ?>" name="name">
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop"> Vehicle Image 1</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder="Name" value="<?php echo $fetch222['image1']; ?>" name="image1">
					
					<?php 
					if(!empty($fetch222['image1']))
					{
					?><img src="<?php echo $fetch222['image1']; ?>" height="80">
					<?php } ?>
					<input type="hidden" name="image1_old" value="<?php echo $row['image1']; ?>">
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Image 2</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder="Name" value="<?php echo $fetch222['image2']; ?>" name="image2">
					
					<?php 
					if(!empty($fetch222['image2']))
					{
					?><img src="<?php echo $fetch222['image2']; ?>" height="80">
					<?php } ?>
					<input type="hidden" name="image2_old" value="<?php echo $row['image2']; ?>">
				  </div>
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Image 3</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder="Name" value="<?php echo $fetch222['image3']; ?>" name="image3">
					
					<?php 
					if(!empty($fetch222['image3']))
					{
					?><img src="<?php echo $fetch222['image3']; ?>" height="80">
					<?php } ?>
					<input type="hidden" name="image3_old" value="<?php echo $row['image3']; ?>">
				  </div>
				  
				  
				  
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Vehicle Image 4</label>
				  <div class="col-sm-6 margintop">
					<input type="file" class="form-control" placeholder="Name" value="<?php echo $fetch222['image4']; ?>" name="image4">
					
					<?php 
					if(!empty($fetch222['image4']))
					{
					?><img src="<?php echo $fetch222['image4']; ?>" height="80">
					<?php } ?>
					<input type="hidden" name="image4_old" value="<?php echo $row['image4']; ?>">
				  </div>
				  
				  
				  
				  <!--<div class="col-sm-2">
					<button name="description_by_vehicle_type_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
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
