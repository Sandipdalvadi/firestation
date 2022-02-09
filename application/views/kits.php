
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1> Kit Items  <small>masters </small> </h1>
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
               <th>Name</th>
               <th>Available as per Norms</th>
              <th> Category</th>
              <th></th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 
				  	$count = 0;
					$tot = 0;
					
					$sql = "SELECT a.*,b.logistics_category as cname FROM logistics_kits_masters a LEFT JOIN logistics_category_masters b on a.logistics_category=.b.id  ORDER BY a.id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){					   
				   $count++;
				    //$tot = $tot+$row['total_income'];
				   
					
					 //$s2 = "select * from logistics_category_masters  WHERE  id = '".$row['logistics_category']."'";
					
					//$r2= $this->db->query($s2)->row_array();
				   ?>
              <tr>
               
              <td><?php echo $row['logistics_name']; ?></td>
                <td><?php echo $row['available_aspernorms']; ?></td>
                 <td><?php echo $row['cname']; ?></td>
                 <td><img src="<?php echo $row['image']; ?>" height="80"></td>
                 
			   <td><!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | --><a class="deletemecommon" href="<?php echo base_url()?>Kits/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
              
               
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
	<form action="<?php echo base_url()?>Kits/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				
				
				<label for="example-search-input" class="col-sm-4 col-form-label">Logisitics Category</label>
				  <div class="col-sm-6">
					<select required class="form-control show-tick select2" name="logistics_category">  
						<option value="">Select </option>		
						<?php 
						$sql = "SELECT * FROM logistics_category_masters  ORDER BY id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['logistics_category'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
				  
				  
				  
				  
				  
			<label for="example-search-input" class="col-sm-4 col-form-label margintop">Name</label>
				  <div class="col-sm-6 margintop">
					<input type="text" required class="form-control" placeholder="Name" value="" name="logistics_name">
				  </div>
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label margintop">Available as per Norms</label>
				  <div class="col-sm-6 margintop">
					<input type="text"  class="form-control" placeholder="Available as per Norms" value="" name="available_aspernorms">
				  </div>
				   <label for="example-search-input" class="col-sm-4 col-form-label margintop">Image</label>
				  <div class="col-sm-6 margintop">
					<input type="file"   class="form-control" placeholder="Name" value="" name="image">
					
					<?php 
					if(!empty($fetch222['image']))
					{
					?><img src="<?php echo $fetch222['image']; ?>" height="80">
					<?php } ?>
					<input type="hidden" name="image_old" value="<?php echo $row['image']; ?>">
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
