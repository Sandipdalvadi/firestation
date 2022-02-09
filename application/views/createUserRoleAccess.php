 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> users role Access<small>masters </small> </h1>
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
                <h4><i class="icon fa fa-check"></i><b> users has Been updated Sucessfully !</b></h4>
               
              </div>
		<?php } ?>
  <div class="row">
    <div class="col-sm-12">
	 <div class="box-body"><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Role Name</td>
            
              <td>Roles</td>
				<td>Action</td>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 /* $totalInvoices = mysql_query("SELECT * FROM user_role_masters ORDER BY id DESC");
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   */
				   $count = 0;
					$tot = 0;
				     	$sql = "SELECT * FROM user_role_masters   ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){			
					
					
					
				   $count++;
				    $tot = $tot+$row['total_income'];
				    
				   ?>
              <tr>
               
                <td><?php echo $row['name']; ?></td>
               
                  <td><?php
                  $ids = explode(",",$row["access_pages"]);
                  
                  foreach($ids as $val)
                  {
                 // echo user_role_masters_with_name($val);
				 
				 /* $find = mysql_query("SELECT * FROM  page_access WHERE page_url = '".$id."'");
  
					$editres = mysql_fetch_array($find);               
				return($editres['page_title']);
				*/
				
				$sql_2 = "SELECT * FROM  page_access WHERE page_url = '".$val."'";
				$editres = $this->db->query($sql_2)->row_array();
				echo $editres['page_title'];




                  echo "<br>";
                   
                  }
                  ?></td>
                
			   <td><a href="<?php echo base_url()?>createUserRoleAccess/editpermission/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/icon-edit.png" height="20">add/update Role</a> </td>
              
               
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
   

  </div>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->