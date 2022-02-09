  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Password Change</h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> Password Change</h3>
 <?php echo  $this->session->flashdata('message'); ?>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
			<form action="<?php echo base_url()?>Myprofile/save" method="post">
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
				  <div class="col-sm-6">
					<input class="form-control" type="text" value="<?php echo $_SESSION['name']; ?>" disabled="disabled" id="example-text-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-2 col-form-label">New Password</label>
				  <div class="col-sm-6">
					<input type="password" required class="form-control" placeholder="New Password" name="new_password">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-3">
					<input type="submit" class="myButton" value="Update Password" name="updatePassword">
				  </div>
				</div>
				
				</form>
				
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
</div>
<!-- ./wrapper -->
