

<?php
//print("<pre>");;
//print_r($this->session->userdata());
//$sessiondata = $this->session->userdata();
//$role = $sessiondata["loginType"];
//echo $role;
  $activeclass = $this->router->fetch_class();
	 			$activemethod =  $this->router->fetch_method();
?>
 <div class="wrapper row-offcanvas row-offcanvas-left" >
 
   <aside class="left-side sidebar-offcanvas">      
                <!-- sidebar: style can be found in sidebar.less -->
				<?php
				$sessiondata = $this->session->userdata();
				//print("<pre>");
				//print_r($sessiondata);
				$role = $sessiondata["loginType"];
				if(1==1){
				?>
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <p>Hello, <?php echo $sessiondata["loginType"]?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if($activeclass =='Admin' && $activemethod =='index') echo "active";?>">
                            <a href="<?php echo base_url()?>">
                                <i class="fa fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
						
						  <li  class="<?php if($activeclass =='ChangePassword') echo "active";?>">
                            <a href="<?php echo base_url()?>ChangePassword">
                                <i class="fa fa-user"></i> <span>Change Password</span>
                            </a>
                        </li>
						
						
						
						<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=6 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Joinedmember' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Joinedmember">
                                <i class="fa fa-dashboard"></i> <span>Joined Member Records</span>
                            </a>
                        </li>
						
						
			<?php }
			?>
			
			
				<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=3 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Events' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Events">
                                <i class="fa fa-dashboard"></i> <span>Events</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Sponsershiptype' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Sponsershiptype">
                                <i class="fa fa-dashboard"></i> <span>Events Sponsership Type </span>
                            </a>
                        </li>
						
						
			<?php }
			?>
			
			
			<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=8 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						
						 <li class="<?php if($activeclass =='Gallertcat' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Gallertcat">
                                <i class="fa fa-dashboard"></i> <span>Gallery Category</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Gallertsubcat' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Gallertsubcat">
                                <i class="fa fa-dashboard"></i> <span>Gallery Sub Category</span>
                            </a>
                        </li>
						
						
						
						 <li class="<?php if($activeclass =='Galleryimage' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Galleryimage">
                                <i class="fa fa-dashboard"></i> <span>Gallery</span>
                            </a>
                        </li>
						
						
			<?php }
			?>
			
			
			<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=9 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Contactusdata' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Contactusdata">
                                <i class="fa fa-dashboard"></i> <span>Contact Us</span>
                            </a>
                        </li>
						
						
			<?php }
			?>
			
			
				
			<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=10 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Paymenthistory' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Paymenthistory">
                                <i class="fa fa-dollar"></i> <span>Payment History</span>
                            </a>
                        </li>
						
						
			<?php }
			?>
			
			
				<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=11 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Donationhistory' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Donationhistory">
                                <i class="fa fa-dashboard"></i> <span>Donation History</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Donationcause' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Donationcause">
                                <i class="fa fa-dashboard"></i> <span>Donation Causes</span>
                            </a>
                        </li>
						
			<?php }
			?>
			
		

<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module IN (1,2,4,5) and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>						<li class="<?php if($activeclass =='Internalusers' && $activemethod != 'room') echo "active";?>">
                            <a href="<?php echo base_url()?>Internalusers">
                                <i class="fa fa-user"></i> <span>Manage Intenal Users</span>
                            </a>
                        </li>
			<?php }
			?>

			
                        
						
<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=5 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 &&  1 ==2 )
			{
			
						?>						<li class="<?php if($activeclass =='Treasurer' && $activemethod != 'room') echo "active";?>">
                            <a href="<?php echo base_url()?>Treasurer">
                                <i class="fa fa-user"></i> <span>Manage Treasurer</span>
                            </a>
                        </li>
			<?php }
			?>
						
						 
						
						 
						 <?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=1 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1  &&  1 ==2  )
			{
			
						?><li class="<?php if($activeclass =='Staff') echo "active";?>">
                            <a href="<?php echo base_url()?>Staff">
                                <i class="fa fa-user"></i> <span>Manage Staff</span>
                            </a>
			</li><?php } 
			?>
						
						 <?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=2 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1  &&  1 ==2  )
			{
			
						?>
						 <li class="<?php if($activeclass =='Adminmember') echo "active";?>">
                            <a href="<?php echo base_url()?>Adminmember">
                                <i class="fa fa-user"></i> <span>Manage Admin</span>
                            </a>
			</li><?php }
			?>
						
						
						 <?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=4 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1  &&  1 ==2  )
			{
			
						?>
						<li class="<?php if($activeclass =='Superadmin') echo "active";?>">
                            <a href="<?php echo base_url()?>Superadmin">
                                <i class="fa fa-user"></i> <span>Manage Super Admin</span>
                            </a>
                        </li>
			<?php }
			?>
						
						
						
			
						
				
						<?php
						if ($role == "Superadmin" )
						{
						?>
						
						
						
					
						
						
						
						
						 <li class="<?php if($activeclass =='Permissions') echo "active";?>" >
                            <a href="<?php echo base_url()?>Permissions">
                                <i class="fa fa-tasks"></i><span>Roles & Permissions</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Paypal') echo "active";?>" >
                            <a href="<?php echo base_url()?>Paypal">
                                <i class="fa fa-dollar"></i><span>Paypal Settings</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Specialoffers') echo "active";?>" >
                            <a href="<?php echo base_url()?>Specialoffers">
                                <i class="fa fa-dollar"></i><span>Coupons</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Siteconfig') echo "active";?>" >
                            <a href="<?php echo base_url()?>Siteconfig">
                                <i class="fa fa-dollar"></i><span>Site Settings</span>
                            </a>
                        </li>
						<?php }
						?>
						  <!--<li class="treeview">
                            <a href="#">
                              <i class="fa fa-pill" style="font-size:16px; font-weight:bold"></i>
                                <span>Manage Drug Stocks</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><a href="<?php echo base_url()?>Drug"><i class="fa fa-angle-double-right"></i>Manage Drugs Items</a></li>
							<li><a href="<?php echo base_url()?>DrugHistory/drugadd"><i class="fa fa-angle-double-right"></i>Add Drug Stock</a></li>
							<li><a href="<?php echo base_url()?>DrugHistory"><i class="fa fa-angle-double-right"></i>Drugs History</a></li>							
									
                            </ul>	
                        </li>-->
                        
                    
                   <style>
				   .fa-pill{
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=.5);
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.fa-pill:before {
  content: "\f205";
}   
</style>				   
                       
                        
                    </ul>
                </section>
                <?php }
				else if( $role == 99   ) {
					
				?>
				   <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, User</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if($activeclass =='categories') echo "active";?>">
                            <a href="<?php echo base_url()?>">
                                <i class="fa fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
                       
						
						
						
						 <li class="<?php if($activeclass =='Patient' && $activemethod == 'camp' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Patient/camp">
                                <i class="fa fa-users"></i> <span>Manage Camp Patient</span>
                            </a>
                        </li>
						
						
					
                     
						
					
                        
                    
                   <style>
				   .fa-pill{
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=.5);
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.fa-pill:before {
  content: "\f205";
}   
</style>				   
                       
                        
                    </ul>
                </section>
              
			<?php }
				?>
				<!-- /.sidebar -->
            </aside>
			
