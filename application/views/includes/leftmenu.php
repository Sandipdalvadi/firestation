<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    
    <div class="user-panel">
      <div class="image float-left"> <img src="<?php echo base_url()?>assets/img/user2-160x160.jpg" class="rounded" alt="User Image"> </div>
      <div class="info float-left">
        <p></p>
        <a href="#"><i class="fa fa-circle text-success"></i> </a> </div>
      <!-- search form -->
      <!-- /.search form -->
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php //echo $this->session->userdata('login_role')?>
     <?php
	// $this->load->database();
	 /*function checkPermission($role_id,$permission_id)
	 {
		  $sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id='".$permission_id."' and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
				return true;
			}
			else
			{
				return false;
			}
	 }*/
	 $role_id = $this->session->userdata('login_role');
	 if($this->session->userdata('login_role') == 6 || true ){
?>	 
    <ul class="sidebar-menu tree" data-widget="tree" style="font-family:Arial Black; font-weight: bold; font-size:13px;">
      <li class="header">MAIN NAVIGATION </li>
      <li> <a href="<?php echo base_url()?>"> <i class="fa fa-dashboard"></i> <span style="font-weight: bold;">Dashboard</span> </a> </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-cube"></i> <span style="font-weight: bold;">Vehicle Masters</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu" >
		
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=5 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
		  
		  <li class=""> <a href="<?php echo base_url()?>Vhmake"> <i class="fa fa-circle"></i> <span>Make</span> </a> </li>
		  <?php }
		  ?>
		  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=6 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Vhtype"> <i class="fa fa-circle"></i> <span>Type</span> </a> </li><?php }
		  ?>
		   <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=7 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Vhvarient"> <i class="fa fa-circle"></i> <span>Varients</span> </a> </li><?php }
		  ?> <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=8 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Vhcategory"> <i class="fa fa-circle"></i> <span>Category</span> </a> </li><?php }
		  ?>
		  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=9 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Vhdescription"> <i class="fa fa-circle"></i> <span>Description</span> </a> </li><?php }
		  ?>
        <!--  <li class=""> <a href="vhbodytype" > <i class="fa fa-circle"></i> <span>Body Type</span> </a> </li> --><?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=10 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Condemnation"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li><?php }
		  ?>
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=11 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
           <li class=""> <a href="<?php echo base_url()?>Auctionsvehicle"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li>
          <!--<li class=""> <a href="vhserviceschedule" > <i class="fa fa-circle"></i> <span>Service Schedule</span> </a> </li> --><?php }
		  ?>
        </ul>
      </li>
      <li class="treeview menu"> <a href="#"> <i class="fa fa-cube"></i> <span style="font-weight: bold;">Logistics Masters</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <!--<ul class="treeview-menu" style="display: block;">-->
		<ul class="treeview-menu" >
		<?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=24 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
			<li class=""> <a href="<?php echo base_url()?>Vhdivision"> <i class="fa fa-circle"></i> <span>Divisions</span> </a> </li><?php } ?>
			<?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=25 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
         <li class=""> <a href="<?php echo base_url()?>Vhdistrict"> <i class="fa fa-circle"></i> <span>Districts</span> </a> </li><?php } ?>
		 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=26 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
         <li class=""> <a href="<?php echo base_url()?>Unserviceable"> <i class="fa fa-circle"></i> <span>Unserviceable</span> </a> </li><?php } ?>
         
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=27 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Fsstation"> <i class="fa fa-circle"></i> <span>Fire Stations</span> </a> </li><?php } ?>
		  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=28 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
  <li class="Fsstation"> <a href="<?php echo base_url()?>Ranks"> <i class="fa fa-circle"></i> <span>Ranks</span> </a> </li> <?php } ?>
  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=29 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
		   <li class=""> <a href="<?php echo base_url()?>Lcategory"> <i class="fa fa-circle"></i> <span>Category</span> </a> </li><?php } ?>
		   <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=30 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
		     <li class=""> <a href="<?php echo base_url()?>Kits"> <i class="fa fa-circle"></i> <span>Items</span> </a> </li><?php } ?>
		      <!-- <li class=""> <a href="kitseligibilty" > <i class="fa fa-circle"></i> <span>Kits eligibility</span> </a> </li>
		     <li class=""> <a href="employeesrole" > <i class="fa fa-circle"></i> <span>Employees Role</span> </a> </li>
		      <li class=""> <a href="employees" > <i class="fa fa-circle"></i> <span>Employees</span> </a> </li> -->
			  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=31 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
		       <li class=""> <a href="<?php echo base_url()?>Lciemployees"> <i class="fa fa-circle"></i> <span>L C I officers</span> </a> </li><?php } ?>
		       <!-- <li class=""> <a href="localpurchasefordistrict" > <i class="fa fa-circle"></i> <span> Local Purchase Item</span> </a> </li>
		        <li class=""> <a href="localpurchases" > <i class="fa fa-circle"></i> <span>Local Purchase </span> </a> </li>
		        -->
		        
        </ul>
      </li>
      
        <li class="treeview"> <a href="#"> <i class="fa fa-building"></i> <span style="font-weight: bold;">Tenders</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">

  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=1 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>

			<li class=""> <a href="<?php echo base_url()?>Tenderdetailsbyconew" style="color:red"> <i class="fa fa-circle"></i> <span>Details By C.O.</span> </a> </li><?php }
			?>

             <!--<li class=""> <a href="<?php echo base_url()?>Tenderdetailsbyco"> <i class="fa fa-circle"></i> <span>Details By C.O.</span> </a> </li>-->
			 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=3 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
         <li class=""> <a href="<?php echo base_url()?>Lcireportupdate"> <i class="fa fa-circle"></i> <span>LCI Report Update</span> </a> </li><?php }
			?>
		 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=4 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Tenderdistributiondetails"> <i class="fa fa-circle"></i> <span> Distribution Details</span> </a> </li><?php }
			?>
         
         
        </ul>
      </li>
    
      <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span style="font-weight: bold;">Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
		<?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=18 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>Vhlists"> <i class="fa fa-circle"></i> <span>Receive Vehicles </span> </a> </li><?php }
			?>
			
			
			
			  <?php
		  	 $sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=62 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
                               <li class=""> <a href="<?php echo base_url()?>Districtcostockupdatevehicle"> <i class="fa fa-circle"></i> <span>Dist. Vehicle Receive </span> </a> </li> <?php } ?>
          
          
          
          
          	  <?php
		  	 $sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=64 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
                               <li class=""> <a href="<?php echo base_url()?>Fscostockupdatevehicle"> <i class="fa fa-circle"></i> <span>FS Vehicle Receive </span> </a> </li> <?php } ?>
          
          
          
          
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=19 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
           <li class=""> <a href="<?php echo base_url()?>Exitingvhlists"> <i class="fa fa-circle"></i> <span>Existing Dist. Vehicles </span> </a> </li><?php }
			?>
			
			
			  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=65 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
           <li class=""> <a href="<?php echo base_url()?>Exitingvhlistsfs"> <i class="fa fa-circle"></i> <span>EXISTING FS VEHICLES </span> </a> </li><?php }
			?>
			
			
        
           <li class="treeview"> <a href="<?php echo base_url()?>vhtransfers"> <i class="fa fa-exchange"></i> <span>Vehicle Distribution</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
		 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=54 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?>
         <li class=""> <a href="<?php echo base_url()?>Allotment"> <i class="fa fa-circle"></i> <span> Allotment</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=55 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>UnittoUnitAllotment"> <i class="fa fa-circle"></i> <span>Unit To Unit</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=56 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>UnittofsAllotment"> <i class="fa fa-circle"></i> <span>Unit To FS TRANSFER</span> </a> </li><?php }
			?>
         
         
        </ul>
      </li>
      
        <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Fuel</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=57 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>Quotaallotment"> <i class="fa fa-circle"></i> <span>Quoata Allotment(V)</span> </a> </li><?php }
			?>
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=58 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>Quotaallotmentdistrict"> <i class="fa fa-circle"></i> <span>Quoata Allotment(U)</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=59 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?><li class=""> <a href="<?php echo base_url()?>Quotaallotmentadd"> <i class="fa fa-circle"></i> <span>Additional Quoata(V) </span> </a> </li><?php }
			?>
            <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=60 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?><li class=""> <a href="<?php echo base_url()?>Quotaallotmentdistrictadd"> <i class="fa fa-circle"></i> <span>Additional Quoata(U) </span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=61 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?><li class=""> <a href="<?php echo base_url()?>Fuelissues"> <i class="fa fa-circle"></i> <span>Fuel Issues</span> </a> </li><?php }
			?>
         
         
        </ul>
      </li>
            <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=22 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
			?><li class=""> <a href="<?php echo base_url()?>vhexpanses"> <i class="fa fa-circle"></i> <span> Vehicle Expenses</span> </a> </li><?php } ?>
       <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=23 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
			?>  
        <li class=""> <a href="<?php echo base_url()?>repairs"> <i class="fa fa-circle"></i> <span>Repairs</span> </a> </li>
       <?php } ?>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-truck"></i> <span style="font-weight: bold;">Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
<?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=2 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
			<li class=""> <a href="<?php echo base_url()?>Recivestockbytendernew" style="color:red"> <i class="fa fa-circle"></i> <span>Recieve Stock</span> </a> </li><?php } ?>


           <!-- <li class=""> <a href="<?php echo base_url()?>recivestockbytender"> <i class="fa fa-circle"></i> <span>Recieve Stock</span> </a> </li>
            <li class=""> <a href="<?php echo base_url()?>costockupdate"> <i class="fa fa-circle"></i> <span>C. O. Stock Update</span> </a> </li>
             <li class=""> <a href="<?php echo base_url()?>FScostockupdate"> <i class="fa fa-circle"></i> <span>FS Stock Update</span> </a> </li>-->
            <!--<li class=""> <a href="<?php echo base_url()?>localrecivestockbytender"> <i class="fa fa-circle"></i> <span>Existing  Stock</span> </a> </li>-->
        
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=13 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a style="color:red" href="<?php echo base_url()?>distributiontodist"> <i class="fa fa-circle"></i> <span>Distribution To Dist</span> </a> </li><?php } ?>
         <!--<li class=""> <a href="<?php echo base_url()?>districtcostockupdate"> <i class="fa fa-circle"></i> <span>District Stock Receive</span> </a> </li> 
          <li class=""> <a href="<?php echo base_url()?>distributiontofs"> <i class="fa fa-circle"></i> <span>Distribution To FS</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Condemnationlogistics"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li>
          
           <li class=""> <a href="<?php echo base_url()?>Auctionslogistics"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li>-->
		   
		   <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=14 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
		   
		      <li class=""> <a href="<?php echo base_url()?>localrecivestockbytender"> <i class="fa fa-circle"></i> <span>Existing  Stock Entry Dist. </span> </a> </li><?php } ?>
            
                                                                  
        <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=15 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
                               <li class=""> <a href="<?php echo base_url()?>districtcostockupdate"> <i class="fa fa-circle"></i> <span>District Stock Receive </span> </a> </li> <?php } ?>
                      
           
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=16 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          
                    <li class=""> <a href="distributiontofs"> <i class="fa fa-circle"></i> <span>Distribution To FS</span> </a> </li><?php } ?>
					
			
 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=17 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
 <li class=""> <a href="FScostockupdate"> <i class="fa fa-circle"></i> <span>FS Stock Update</span> </a> </li>
 <?php } ?>
 
                     <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=51 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>             <li class=""> <a href="<?php echo base_url()?>LocalrecivestockbytenderFs"> <i class="fa fa-circle"></i> <span>Existing  Stock Entry FS</span> </a> </li>
            	<?php } ?>
            	
            	
            	  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=68 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>Condemination"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li><?php } ?>
         
		 <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=69 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>Auctionslogistics"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li><?php } ?>
         			
         
        </ul>
      </li>
      
      
      
      
      
      <li class="treeview"> <a href="#"> <i class="fa fa-file"></i> <span style="font-weight: bold;">Reports</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
       <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span>Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
		   <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=32 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
		  
			<li class=""> <a href="<?php echo base_url()?>allvehiclesreport"> <i class="fa fa-circle"></i> <span>All Vehicles Report</span> </a> </li><?php }
			?>
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=33 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
         <li class=""> <a href="<?php echo base_url()?>vhdivisionwisereport"> <i class="fa fa-circle"></i> <span>Division Wise Report</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=34 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
            <li class=""> <a href="<?php echo base_url()?>vhstatewisereport"> <i class="fa fa-circle"></i> <span>State Wise Report</span> </a> </li><?php }
			?> <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=35 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 or true )
			{
				
		 
		  ?> 
		  
		  
		    <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=66 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
         <li class=""> <a href="<?php echo base_url()?>DistrictavailableStockveh"> <i class="fa fa-circle"></i> <span>Dist. stock Report</span> </a> </li><?php }
			?>
			
			
		  <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=67 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
         <li class=""> <a href="<?php echo base_url()?>FsavailableStockveh"> <i class="fa fa-circle"></i> <span>FS stock Report</span> </a> </li><?php }
			?>
			
				
         <li class=""> <a href="<?php echo base_url()?>transferstoDistr"> <i class="fa fa-circle"></i> <span>Transfer To Dist.</span> </a> </li><?php }
			?>
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=36 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>unittounitvehicletransfer"> <i class="fa fa-circle"></i> <span>Unit To Unit <br>Vehicle Transfer</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=37 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>unittofstransfers"> <i class="fa fa-circle"></i> <span>Unit To FS <br>Vehicle Transfer</span> </a> </li><?php }
			?>
         
          <li class="treeview"> <a href="#"> <i class="fa fa-circle"></i> <span>Quota Allot.</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=52 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>qallvhclewise"> <i class="fa fa-circle"></i> <span>Vehicle Wise</span> </a> </li><?php }
			?>
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=53 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>
          <li class=""> <a href="<?php echo base_url()?>qalldistrictewise"> <i class="fa fa-circle"></i> <span>District Wise</span> </a> </li><?php }
			?>
         </ul>
          </li>
        <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=39 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>    
         <li class=""> <a href="<?php echo base_url()?>allvehiclesrepairs"> <i class="fa fa-circle"></i> <span>All Vehicles Repairs</span> </a> </li><?php }
			?>
           <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=40 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>  <li class=""> <a href="<?php echo base_url()?>allvehiclesexpenses"> <i class="fa fa-circle"></i> <span>All Vehicles Expenses</span> </a> </li><?php }
			?>
          
            
          
         
         
         
         
        </ul>
      </li> 
         <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
		<?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=41 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?> 
			<li class="<?php echo base_url()?>receieveStockReport"> <a href="receieveStockReport"> <i class="fa fa-circle"></i> <span>Receive stock Report</span> </a> </li><?php } ?>
        <!--  <li class=""> <a href="costock" > <i class="fa fa-circle"></i> <span>C.O Stock </span> </a> </li> -->
          <!--<li class=""> <a href="districtStockLists" > <i class="fa fa-circle"></i> <span>District Stock Lists</span> </a> </li> -->
         
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=42 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>  <li class=""> <a href="districtavailableStock"> <i class="fa fa-circle"></i> <span>District Avlbl. stock</span> </a> </li><?php } ?>
         
         
         
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=63 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>  <li class=""> <a href="<?php echo base_url()?>FsavailableStock"> <i class="fa fa-circle"></i> <span>FS Avlbl. stock</span> </a> </li><?php } ?>
         
         
         
         
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=43 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 && false )
			{
		 
		  ?>  <li class=""> <a href="divisionavailableStock"> <i class="fa fa-circle"></i> <span>Division Avlbl. stock</span> </a> </li><?php } ?>
         
         
          <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=44 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 && false )
			{
		 
		  ?> <li class=""> <a href="divisionwisereport"> <i class="fa fa-circle"></i> <span>Division Wise Report</span> </a> </li><?php } ?>
          
            <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=45 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 && false )
			{
		 
		  ?> <li class=""> <a href="statewisereport"> <i class="fa fa-circle"></i> <span>State Wise Report</span> </a> </li><?php } ?>
         
         
         <!-- <li class=""> <a href="recievedStockFromCO" > <i class="fa fa-circle"></i> <span>Rec. stock from CO</span> </a> </li> -->
         
         
        
         <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=46 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?> <li class=""> <a href="<?php echo base_url()?>Unserviceablereport"> <i class="fa fa-circle"></i> <span>Unservicibles</span> </a> </li><?php } ?>
         
        <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=47 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>  <li class=""> <a href="fswiseDistribution"> <i class="fa fa-circle"></i> <span>FS Wise Distribution</span> </a> </li><?php } ?>
       
         
         
         
        </ul>
      </li>  
      
 
        </ul>
        
        
        
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span style="font-weight: bold;">Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         
		 
		   <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=48 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>   
		 <li class=""> <a href="<?php echo base_url()?>createUser"> <i class="fa fa-circle"></i> <span>Users Create</span> </a> </li><?php } ?>	
         
            <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=49 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1 )
			{
		 
		  ?>   <li class=""> <a href="<?php echo base_url()?>CreateUserRole"> <i class="fa fa-circle"></i> <span>Users Role</span> </a> </li><?php } ?>	
          
             <?php
		  	$sql = "select * from user_role_permissions where role_id='".$role_id."' and permission_id=50 and view=1";//die;
			$num = $this->db->query($sql)->num_rows();
			if($num >= 1  )
			{
		 
		  ?>   <li class=""> <a href="<?php echo base_url()?>CreateUserRole/permissions"> <i class="fa fa-circle"></i> <span>Users Role Access</span> </a> </li><?php } ?>	
        
         
        </ul>
      </li>
    </ul>
	 <?php }
	 ?>
	
         </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer"> </div>
</aside>