<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    
    <div class="user-panel">
      <div class="image float-left"> <img src="<?php echo base_url()?>assets/img/user2-160x160.jpg" class="rounded" alt="User Image"> </div>
      <div class="info float-left">
        <p>SuperAdmin </p>
        <a href="#"><i class="fa fa-circle text-success"></i> (Director General) Online</a> </div>
      <!-- search form -->
      <!-- /.search form -->
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php //echo $this->session->userdata('login_role')?>
     <?php
	 function checkPermission($role_id,$permission_id)
	 {
		 
	 }
	 if($this->session->userdata('login_role') == 6 || true ){
?>	 
    <ul class="sidebar-menu tree" data-widget="tree" style="font-family:Arial Black; font-weight: bold; font-size:13px;">
      <li class="header">MAIN NAVIGATION </li>
      <li> <a href="<?php echo base_url()?>"> <i class="fa fa-dashboard"></i> <span style="font-weight: bold;">Dashboard</span> </a> </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-cube"></i> <span style="font-weight: bold;">Vehicle Masters</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu" >
		
          <?php
		  if(checkPermission($this->session->userdata('login_role'),'5'))  //check view permission
		  {
		  ?>
		  
		  <li class=""> <a href="<?php echo base_url()?>Vhmake"> <i class="fa fa-circle"></i> <span>Make</span> </a> </li>
		  <?php }
		  ?>
		  
          <li class=""> <a href="<?php echo base_url()?>Vhtype"> <i class="fa fa-circle"></i> <span>Type</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Vhvarient"> <i class="fa fa-circle"></i> <span>Varients</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Vhcategory"> <i class="fa fa-circle"></i> <span>Category</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Vhdescription"> <i class="fa fa-circle"></i> <span>Description</span> </a> </li>
        <!--  <li class=""> <a href="vhbodytype" > <i class="fa fa-circle"></i> <span>Body Type</span> </a> </li> -->
          <li class=""> <a href="<?php echo base_url()?>Condemnation"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li>
          
           <li class=""> <a href="auctions"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li>
          <!--<li class=""> <a href="vhserviceschedule" > <i class="fa fa-circle"></i> <span>Service Schedule</span> </a> </li> -->
        </ul>
      </li>
      <li class="treeview menu"> <a href="#"> <i class="fa fa-cube"></i> <span style="font-weight: bold;">Logistics Masters</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <!--<ul class="treeview-menu" style="display: block;">-->
		<ul class="treeview-menu" >
             <li class=""> <a href="<?php echo base_url()?>Vhdivision"> <i class="fa fa-circle"></i> <span>Divisions</span> </a> </li>
         <li class=""> <a href="<?php echo base_url()?>Vhdistrict"> <i class="fa fa-circle"></i> <span>Districts</span> </a> </li>
         <li class=""> <a href="<?php echo base_url()?>Unserviceable"> <i class="fa fa-circle"></i> <span>Unserviceable</span> </a> </li>
         
         
          <li class=""> <a href="<?php echo base_url()?>Fsstation"> <i class="fa fa-circle"></i> <span>Fire Stations</span> </a> </li>
  <li class="Fsstation"> <a href="<?php echo base_url()?>Ranks"> <i class="fa fa-circle"></i> <span>Ranks</span> </a> </li> 
		   <li class=""> <a href="<?php echo base_url()?>Lcategory"> <i class="fa fa-circle"></i> <span>Category</span> </a> </li>
		     <li class=""> <a href="<?php echo base_url()?>Kits"> <i class="fa fa-circle"></i> <span>Items</span> </a> </li>
		      <!-- <li class=""> <a href="kitseligibilty" > <i class="fa fa-circle"></i> <span>Kits eligibility</span> </a> </li>
		     <li class=""> <a href="employeesrole" > <i class="fa fa-circle"></i> <span>Employees Role</span> </a> </li>
		      <li class=""> <a href="employees" > <i class="fa fa-circle"></i> <span>Employees</span> </a> </li> -->
		       <li class=""> <a href="<?php echo base_url()?>Lciemployees"> <i class="fa fa-circle"></i> <span>L C I officers</span> </a> </li>
		       <!-- <li class=""> <a href="localpurchasefordistrict" > <i class="fa fa-circle"></i> <span> Local Purchase Item</span> </a> </li>
		        <li class=""> <a href="localpurchases" > <i class="fa fa-circle"></i> <span>Local Purchase </span> </a> </li>
		        -->
		        
        </ul>
      </li>
      
        <li class="treeview"> <a href="#"> <i class="fa fa-building"></i> <span style="font-weight: bold;">Tenders</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">



 <li class=""> <a href="<?php echo base_url()?>Tenderdetailsbyconew" style="color:red"> <i class="fa fa-circle"></i> <span>Details By C.O.</span> </a> </li>

             <!--<li class=""> <a href="<?php echo base_url()?>Tenderdetailsbyco"> <i class="fa fa-circle"></i> <span>Details By C.O.</span> </a> </li>-->
         <li class=""> <a href="<?php echo base_url()?>Lcireportupdate"> <i class="fa fa-circle"></i> <span>LCI Report Update</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Tenderdistributiondetails"> <i class="fa fa-circle"></i> <span> Distribution Details</span> </a> </li>
         
         
        </ul>
      </li>
    
      <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span style="font-weight: bold;">Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class=""> <a href="<?php echo base_url()?>Vhlists"> <i class="fa fa-circle"></i> <span>Receive Vehicles </span> </a> </li>
          
          
           <li class=""> <a href="exitingvhlist"> <i class="fa fa-circle"></i> <span>Existing Vehicles </span> </a> </li>
          
           <li class="treeview"> <a href="vhtransfers"> <i class="fa fa-exchange"></i> <span>Vehicle Distribution</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class=""> <a href="<?php echo base_url()?>Allotment"> <i class="fa fa-circle"></i> <span> Allotment</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>UnittoUnitAllotment"> <i class="fa fa-circle"></i> <span>Unit To Unit</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>UnittofsAllotment"> <i class="fa fa-circle"></i> <span>Unit To FS</span> </a> </li>
         
         
        </ul>
      </li>
      
        <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Fuel</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class=""> <a href="<?php echo base_url()?>Quotaallotment"> <i class="fa fa-circle"></i> <span>Quoata Allotment(V)</span> </a> </li>
         <li class=""> <a href="<?php echo base_url()?>Quotaallotmentdistrict"> <i class="fa fa-circle"></i> <span>Quoata Allotment(U)</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Quotaallotmentadd"> <i class="fa fa-circle"></i> <span>Additional Quoata(V) </span> </a> </li>
           <li class=""> <a href="<?php echo base_url()?>Quotaallotmentdistrictadd"> <i class="fa fa-circle"></i> <span>Additional Quoata(U) </span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Fuelissues"> <i class="fa fa-circle"></i> <span>Fuel Issues</span> </a> </li>
         
         
        </ul>
      </li>
           <li class=""> <a href="vhexpanses"> <i class="fa fa-circle"></i> <span> Vehicle Expenses</span> </a> </li>
        
        <li class=""> <a href="repairs"> <i class="fa fa-circle"></i> <span>Repairs</span> </a> </li>
       
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-truck"></i> <span style="font-weight: bold;">Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">

 <li class=""> <a href="<?php echo base_url()?>Recivestockbytendernew" style="color:red"> <i class="fa fa-circle"></i> <span>Recieve Stock</span> </a> </li>


           <!-- <li class=""> <a href="<?php echo base_url()?>recivestockbytender"> <i class="fa fa-circle"></i> <span>Recieve Stock</span> </a> </li>
            <li class=""> <a href="<?php echo base_url()?>costockupdate"> <i class="fa fa-circle"></i> <span>C. O. Stock Update</span> </a> </li>
             <li class=""> <a href="<?php echo base_url()?>FScostockupdate"> <i class="fa fa-circle"></i> <span>FS Stock Update</span> </a> </li>-->
            <!--<li class=""> <a href="<?php echo base_url()?>localrecivestockbytender"> <i class="fa fa-circle"></i> <span>Existing  Stock</span> </a> </li>-->
        
          
          <li class=""> <a style="color:red" href="<?php echo base_url()?>distributiontodist"> <i class="fa fa-circle"></i> <span>Distribution To Dist</span> </a> </li>
         <!--<li class=""> <a href="<?php echo base_url()?>districtcostockupdate"> <i class="fa fa-circle"></i> <span>District Stock Receive</span> </a> </li> 
          <li class=""> <a href="<?php echo base_url()?>distributiontofs"> <i class="fa fa-circle"></i> <span>Distribution To FS</span> </a> </li>
          <li class=""> <a href="<?php echo base_url()?>Condemnationlogistics"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li>
          
           <li class=""> <a href="<?php echo base_url()?>Auctionslogistics"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li>-->
         
        </ul>
      </li>
      
      
      
      
      
      <li class="treeview"> <a href="#"> <i class="fa fa-file"></i> <span style="font-weight: bold;">Reports</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
       <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span>Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class=""> <a href="allvehiclesreport"> <i class="fa fa-circle"></i> <span>All Vehicles Report</span> </a> </li>
         
         <li class=""> <a href="vhdivisionwisereport"> <i class="fa fa-circle"></i> <span>Division Wise Report</span> </a> </li>
          
            <li class=""> <a href="vhstatewisereport"> <i class="fa fa-circle"></i> <span>State Wise Report</span> </a> </li>
         <li class=""> <a href="transferstoDistr"> <i class="fa fa-circle"></i> <span>Transfer To Dist.</span> </a> </li>
         <li class=""> <a href="unittounitvehicletransfer"> <i class="fa fa-circle"></i> <span>Unit To Unit <br>Vehicle Transfer</span> </a> </li>
            <li class=""> <a href="unittofstransfers"> <i class="fa fa-circle"></i> <span>Unit To FS <br>Vehicle Transfer</span> </a> </li>
         
          <li class="treeview"> <a href="#"> <i class="fa fa-circle"></i> <span>Quota Allot.</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
         <li class=""> <a href="qallvhclewise"> <i class="fa fa-circle"></i> <span>Vehicle Wise</span> </a> </li>
         
          <li class=""> <a href="qalldistrictewise"> <i class="fa fa-circle"></i> <span>District Wise</span> </a> </li>
         </ul>
          </li>
            
         <li class=""> <a href="allvehiclesrepairs"> <i class="fa fa-circle"></i> <span>All Vehicles Repairs</span> </a> </li>
          <li class=""> <a href="allvehiclesexpenses"> <i class="fa fa-circle"></i> <span>All Vehicles Expenses</span> </a> </li>
          
            
          
         
         
         
         
        </ul>
      </li> 
         <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class=""> <a href="receieveStockReport"> <i class="fa fa-circle"></i> <span>Receive stock Report</span> </a> </li>
        <!--  <li class=""> <a href="costock" > <i class="fa fa-circle"></i> <span>C.O Stock </span> </a> </li> -->
          <!--<li class=""> <a href="districtStockLists" > <i class="fa fa-circle"></i> <span>District Stock Lists</span> </a> </li> -->
         
          <li class=""> <a href="districtavailableStock"> <i class="fa fa-circle"></i> <span>District Avlbl. stock</span> </a> </li>
         
         
          <li class=""> <a href="divisionavailableStock"> <i class="fa fa-circle"></i> <span>Division Avlbl. stock</span> </a> </li>
         
         
          <li class=""> <a href="divisionwisereport"> <i class="fa fa-circle"></i> <span>Division Wise Report</span> </a> </li>
          
            <li class=""> <a href="statewisereport"> <i class="fa fa-circle"></i> <span>State Wise Report</span> </a> </li>
         
         
         <!-- <li class=""> <a href="recievedStockFromCO" > <i class="fa fa-circle"></i> <span>Rec. stock from CO</span> </a> </li> -->
         
         <li class=""> <a href="unservicibles"> <i class="fa fa-circle"></i> <span>Unservicibles</span> </a> </li>
         
         <li class=""> <a href="fswiseDistribution"> <i class="fa fa-circle"></i> <span>FS Wise Distribution</span> </a> </li>
       
         
         
         
        </ul>
      </li>  
      
 
        </ul>
        
        
        
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span style="font-weight: bold;">Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class=""> <a href="<?php echo base_url()?>createUser"> <i class="fa fa-circle"></i> <span>Users Create</span> </a> </li>
         
          <li class=""> <a href="<?php echo base_url()?>CreateUserRole"> <i class="fa fa-circle"></i> <span>Users Role</span> </a> </li>
          
           <li class=""> <a href="<?php echo base_url()?>CreateUserRole/permissions"> <i class="fa fa-circle"></i> <span>Users Role Access</span> </a> </li>
        
         
        </ul>
      </li>
    </ul>
	 <?php }
	 ?>
	 <?php
	 if($this->session->userdata('login_role') == 4 || true ){
?>
<ul class="sidebar-menu tree" data-widget="tree" style="font-family:Aharoni; font-weight: bold; font-size:15px;">
      <li class="header">MAIN NAVIGATION</li>
      <li> <a href="<?php echo base_url()?>"> <i class="fa fa-dashboard"></i> <span style="font-weight: bold;">Dashboard</span> </a> </li>




  <li class="treeview menu-open"> <a href="<?php echo base_url()?>"> <i class="fa fa-truck"></i> <span style="font-weight: bold;">Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu" style="display: block;">
            
                         
                        <li class=""> <a href="localrecivestockbytender"> <i class="fa fa-circle"></i> <span>Existing  Stock Entry </span> </a> </li>
            
                                                                  
            <!-- <li class=""> <a href="condemnation_logistics.php"> <i class="fa fa-circle"></i> <span>Condemination</span> </a> </li>
                      <li class=""> <a href="auctions_logistics.php"> <i class="fa fa-circle"></i> <span>Auction</span> </a> </li>-->
           
                               <li class=""> <a href="districtcostockupdate"> <i class="fa fa-circle"></i> <span>District Stock Receive </span> </a> </li> 
                      
           
          
          
                    <li class=""> <a href="distributiontofs"> <i class="fa fa-circle"></i> <span>Distribution To FS</span> </a> </li>
                   
        </ul>
      </li>



   <li class="treeview" style="display:none"> <a href="#"> <i class="fa fa-car"></i> <span style="font-weight: bold;">Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                   
                <li class=""> <a href="vhlist"> <i class="fa fa-circle"></i> <span>Received Vehicles</span> </a> </li>
                            
        <li class=""> <a href="exitingvhlist"> <i class="fa fa-circle"></i> <span>Existing Vehicles </span> </a> </li>
                    
                      <li class=""> <a href="vhexpanses"> <i class="fa fa-circle"></i> <span> Vehicle Expenses</span> </a> </li>
                    
                      <li class=""> <a href="repairs"> <i class="fa fa-circle"></i> <span>Repairs</span> </a> </li>
                    
                    <li class=""> <a href="fuelissues"> <i class="fa fa-circle"></i> <span>Fuel Issues</span> </a> </li>
                    
                      <li class=""> <a href="quotaallotment"> <i class="fa fa-circle"></i> <span>Quoata Allotment(V)</span> </a> </li>
         <li class=""> <a href="quotaallotment_district.php"> <i class="fa fa-circle"></i> <span>Quoata Allotment(U)</span> </a> </li>
         
                  
                   
         
         
                    <li class=""> <a href="unittofs"> <i class="fa fa-circle"></i> <span>Unit To FS</span> </a> </li>
        
         
        
        
      
                
        </ul>
         
        
        
        
      </li>

<li class="treeview" style="display:none"> <a href="#"> <i class="fa fa-file"></i> <span style="font-weight: bold;">Reports</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                       <li class=""> <a href="districtavailableStock"> <i class="fa fa-circle"></i> <span>Dist Avlbl. stock</span> </a> </li>
                   <!--  <li class=""> <a href="recievedStockFromCO" > <i class="fa fa-circle"></i> <span>Rec. stock from CO</span> </a> </li> -->
                  <li class=""> <a href="unservicibles"> <i class="fa fa-circle"></i> <span>Unservicibles</span> </a> </li>
                  <li class=""> <a href="fswiseDistribution"> <i class="fa fa-circle"></i> <span>FS Wise Distribution</span> </a> </li>
                      <li class=""> <a href="diststockreceipt"> <i class="fa fa-circle"></i> <span>Stock Receipts</span> </a> </li>
                  
         
        </ul>
      </li>  
      
      
      <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span>Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                      <li class=""> <a href="allvehiclesreport"> <i class="fa fa-circle"></i> <span>All Vehicles Report</span> </a> </li>
                   <li class="treeview"> <a href="#"> <i class="fa fa-circle"></i> <span>Quoata Allot.</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
                        <li class=""> <a href="qallvhclewise"> <i class="fa fa-circle"></i> <span>Vehicle Wise</span> </a> </li>
                             <li class=""> <a href="qalldistrictewise"> <i class="fa fa-circle"></i> <span>District Wise</span> </a> </li>
                   </ul>
          </li>
                  <li class=""> <a href="allvehiclesrepairs"> <i class="fa fa-circle"></i> <span>All Vehicles Repairs</span> </a> </li>
        
                      <li class=""> <a href="allvehiclesexpenses"> <i class="fa fa-circle"></i> <span>All Vehicles Expenses</span> </a> </li>
                    <li class=""> <a href="unittofstransfers"> <i class="fa fa-circle"></i> <span>Unit To FS <br>Vehicle Transfer</span> </a> </li>
                 </ul>
      </li>  
        </ul>
      </li>






</ul>
<?php }
	 ?>	 

  <?php
	 if($this->session->userdata('login_role') == 8 || true ){
?> 
 <ul class="sidebar-menu tree" data-widget="tree" style="font-family:Aharoni; font-weight: bold; font-size:15px;">
      <li class="header">MAIN NAVIGATION</li>
      <li> <a href="<?php echo base_url()?>"> <i class="fa fa-dashboard"></i> <span style="font-weight: bold;">Dashboard</span> </a> </li>


  <li class="treeview"> <a href="<?php echo base_url()?>"> <i class="fa fa-truck"></i> <span style="font-weight: bold;">Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu" style="display: none;">
            
                         
                         
             <li class=""> <a href="FScostockupdate"> <i class="fa fa-circle"></i> <span>FS Stock Update</span> </a> </li>
                                 <li class=""> <a href="<?php echo base_url()?>LocalrecivestockbytenderFs"> <i class="fa fa-circle"></i> <span>Existing  Stock Entry</span> </a> </li>
            
                                                    
                      
          
          
                   
        </ul>
      </li>



   <li class="treeview" style="display:none"> <a href="#"> <i class="fa fa-car"></i> <span style="font-weight: bold;">Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                   
               
        <li class=""> <a href="exitingvhlist"> <i class="fa fa-circle"></i> <span>Existing Vehicles </span> </a> </li>
                 
                 
          
                      <li class=""> <a href="vhexpanses"> <i class="fa fa-circle"></i> <span> Vehicle Expenses</span> </a> </li>
                    
                      <li class=""> <a href="repairs"> <i class="fa fa-circle"></i> <span>Repairs</span> </a> </li>
                    
          
                     <li class=""> <a href="fuelissues"> <i class="fa fa-circle"></i> <span>Fuel Issues</span> </a> </li>
                    
          
          
                    
                   
         
         
                 
        </ul>
         
        
        
        
      </li>

<li class="treeview" style="display:none"> <a href="#"> <i class="fa fa-file"></i> <span style="font-weight: bold;">Reports</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class="treeview"> <a href="#"> <i class="fa fa-list"></i> <span>Logistics</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                      <li class=""> <a href="receieveStockReport"> <i class="fa fa-circle"></i> <span>Receive stock Report</span> </a> </li>
         
                   <li class=""> <a href="unservicibles"> <i class="fa fa-circle"></i> <span>Unservicibles</span> </a> </li>
                  
         
        </ul>
      </li>  
      
      
      <li class="treeview"> <a href="#"> <i class="fa fa-car"></i> <span>Vehicles</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
                      <li class=""> <a href="allvehiclesreport"> <i class="fa fa-circle"></i> <span>All Vehicles Report</span> </a> </li>
                   <li class="treeview"> <a href="#"> <i class="fa fa-circle"></i> <span>Quoata Allot.</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
                                  </ul>
          </li>
                  <li class=""> <a href="allvehiclesrepairs"> <i class="fa fa-circle"></i> <span>All Vehicles Repairs</span> </a> </li>
        
                      <li class=""> <a href="allvehiclesexpenses"> <i class="fa fa-circle"></i> <span>All Vehicles Expenses</span> </a> </li>
                  </ul>
      </li>  
        </ul>
      </li>






</ul>
<?php }
	 ?>	        </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer"> </div>
</aside>