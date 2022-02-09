

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
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $sessiondata["loginType"]?></p>

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
                        <!--<li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>-->
						<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=6 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Appointment' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Appointment">
                                <i class="fa fa-dashboard"></i> <span>Appointments</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Billing' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Billing">
                                <i class="fa fa-dashboard"></i> <span>Billing</span>
                            </a>
                        </li>
						
						 <li class="<?php if($activeclass =='Pharmacy' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Pharmacy">
                                <i class="fa fa-dashboard"></i> <span>Pharmacy</span>
                            </a>
                        </li>
			<?php }
			?>
						
<?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=5 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>						<li class="<?php if($activeclass =='Doctor' && $activemethod != 'room') echo "active";?>">
                            <a href="<?php echo base_url()?>Doctor">
                                <i class="fa fa-user-md"></i> <span>Manage Doctors</span>
                            </a>
                        </li>
			<?php }
			?>
						
						 
						 <?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=7 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Doctor' && $activemethod == 'room') echo "active";?>">
                            <a href="<?php echo base_url()?>Doctor/room">
                                <i class="fa fa-home"></i> <span>Manage Doctors Room</span>
                            </a>
                        </li>
			<?php }
			?>
						 
						 <?php
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=1 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
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
			if($permissionsview_admin_1['view'] == 1 )
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
			if($permissionsview_admin_1['view'] == 1 )
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
						// check user has Admin VIEW PERMISSIONS
						//get permission from database			
			$sql_1 = "select * from lab_permissions where module=3 and role='".$this->session->userdata('loginType')."'";
			$permissionsview_admin_1 = $this->db->query($sql_1)->row_array();
			if($permissionsview_admin_1['view'] == 1 )
			{
			
						?>
						 <li class="<?php if($activeclass =='Patient' && $activemethod != 'camp' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Patient">
                                <i class="fa fa-users"></i> <span>Manage Patient</span>
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
						 <li class="<?php if($activeclass =='History' && $activemethod != 'camp' ) echo "active";?>">
                            <a href="<?php echo base_url()?>History">
                                <i class="fa fa-users"></i> <span>Patient Medical History</span>
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
						 <li class="<?php if($activeclass =='Patient' && $activemethod == 'camp' ) echo "active";?>">
                            <a href="<?php echo base_url()?>Patient/camp">
                                <i class="fa fa-users"></i> <span>Manage Camp Patient</span>
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
						 <li class="<?php if($activeclass =='Tvnotify') echo "active";?>">
                            <a href="<?php echo base_url()?>Tvnotify/addnote">
                                <i class="fa fa-music"></i> <span>TV SCREEN NOTIFICATIONS</span>
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
						<li class="treeview <?php if(in_array($activeclass,array('Room','Maritalstatus','Religion','Race','Country','State','District','Occupation','Relationship'))) echo "active";?>">
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span>Manage Master Data</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li style="<?php if($activeclass =='Room') echo "background-color:#00a65a";?>" ><a href="<?php echo base_url()?>Room"><i class="fa fa-angle-double-right"></i>Rooms</a></li>
							<li style="<?php if($activeclass =='Maritalstatus') echo "background-color:#00a65a";?>" ><a href="<?php echo base_url()?>Maritalstatus"><i class="fa fa-angle-double-right"></i>Marital Status</a></li>
							<li style="<?php if($activeclass =='Religion') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>Religion"><i class="fa fa-angle-double-right"></i>Religion</a></li>
							<li style="<?php if($activeclass =='Race') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>Race"><i class="fa fa-angle-double-right"></i>Race</a></li>
							<li style="<?php if($activeclass =='Country') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>Country"><i class="fa fa-angle-double-right"></i>Nationality</a></li>
						
								<li style="<?php if($activeclass =='State') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>State"><i class="fa fa-angle-double-right"></i>State</a></li>
									<li style="<?php if($activeclass =='District') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>District"><i class="fa fa-angle-double-right"></i>POSKOD</a></li>
									<li style="<?php if($activeclass =='Occupation') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>Occupation"><i class="fa fa-angle-double-right"></i>Occupation</a></li>
									<li style="<?php if($activeclass =='Relationship') echo "background-color:#00a65a";?>"><a href="<?php echo base_url()?>Relationship"><i class="fa fa-angle-double-right"></i>RELATIONSHIP</a></li>
									
                            </ul>	
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
						 <li class="<?php if($activeclass =='Notifications') echo "active";?>" >
                            <a href="<?php echo base_url()?>Notifications">
                                <i class="fa fa-bell"></i> <span>Notifications</span>
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
			
