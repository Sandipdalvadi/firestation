<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> users <small>masters </small> </h1>
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
	  <style>
	  div.container {
        width: 80%;
    }
	  </style>
  <div class="row">
    <div class="col-md-8" >
<table id="examplecom" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <th>Name</th>
              <th> Mobile</th>
              <th>Role</th>
              <th>District</th>
              <th>FS</th>
				<th><!--Action--></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			  /*$totalInvoices = mysql_query("SELECT * FROM users WHERE id <> 1  ORDER BY id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { */
				   
				   
				   
				   	$sql = "SELECT * FROM users WHERE id <> 1   ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){				
					
					
					
				   $count++;
				    //$tot = $tot+$row['total_income'];
					
					
					 //$s2 = "select * from units_masters  WHERE  id = '".$row['district']."'";
					 
					 
					  $s2 = "select GROUP_CONCAT(unit_name) as un from units_masters a,users_districts b  WHERE a.id=b.district_id  and b.user_id = '".$row['id']."' group by b.user_id";
					
					$r2= $this->db->query($s2)->row_array();
					
					$s3 = "select * from fsname_masters  WHERE  id = '".$row['fs_name']."'";
					
					$r3= $this->db->query($s3)->row_array();
					
					$s4 = "select * from user_role_masters  WHERE  id = '".$row['login_role']."'";
					
					$r4= $this->db->query($s4)->row_array();
				    
				   ?>
              <tr>
               
                <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['mobile_no']; ?></td>
                 <td><?php echo $r4['name'] ?></td>
                  <td><?php echo $r2['un']; ?></td>
                   <td><?php echo $r3['fs_name']; ?></td>
                
			   <td>
			   <!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | -->
			   
			   
			  <a class="deletemecommon"  href="<?php echo base_url()?>CreateUser/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
			   
			   
			  
              
               
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
    <div class="col-sm-4" style="background-color:#d8e1f0;"><form action="<?php echo base_url()?>CreateUser/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class=" row">
				  
				  <label for="example-search-input" class="col-sm-4 col-form-label">Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Name" value="<?php echo $fetch222['name']; ?>" name="name">
				  </div> 
				 
				   <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">Phone No.</label>
				  <div class="col-sm-8" style="margin-top:10px">
					<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $fetch222['mobile_no']; ?>" name="mobile_no">
				  </div> 
				  <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">Password</label>
				  <div class="col-sm-8" style="margin-top:10px">
					<input type="password" class="form-control" placeholder="Password" value="<?php echo $fetch222['password']; ?>" name="password">
				  </div> 
				  <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">User Name (loginid)</label>
				  <div class="col-sm-8" style="margin-top:10px">
					<input type="text" class="form-control" placeholder="User Name" value="<?php echo $fetch222['loginid']; ?>" name="loginid">
				  </div>
				    <label for="example-search-input" class="col-sm-4 col-form-label">District</label>
				  <div class="col-sm-8">
					<select class="form-control show-tick  select2" multiple name="district[]" id="district_unit">  
						<option value="">Select District</option>		
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM units_masters ORDER BY id ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
*/

	$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){				


							?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['district'])) { if ($fetch222['district']==$rowMakes['unit_name']) { echo 'selected'; } } ?>><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">Fire Station</label>
				  <div class="col-sm-8" style="margin-top:10px">
					<select class="form-control show-tick select2" name="fs_name" id="fs">  
						
						
                        </select>
				  </div> 
				   <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">User Role</label>
				  <div class="col-sm-8" style="margin-top:10px">
					<select class="form-control show-tick select2" name="login_role">  
						<option value="">Select Role</option>		
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM user_role_masters ORDER BY id ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
						*/
						
						
						$sql = "SELECT * FROM user_role_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){	

						


							?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['login_role'])) { if ($fetch222['login_role']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  <label for="example-search-input" class="col-sm-4 col-form-label" style="margin-top:10px">&nbsp;</label>
				  <div class="col-md-8" style="float:right;margin-top:10px">
					<button name="users" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
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
  <!-- /.content-wrapper -->