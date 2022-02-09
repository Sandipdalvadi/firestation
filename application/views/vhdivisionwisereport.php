 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	    <?php
				     if(isset($_POST['district']))
				     {
						 $sql = "SELECT * FROM divisions_masters where id='".$_POST['district']."'";
						 $row = $this->db->query($sql)->row_array();
						 echo $row["divisions_name"]. " Division Vehicle Report";
					 }
					 else
					 {
						 echo "Vehicle - Division Wise Report";
					 }
	  ?></h1>
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
                <h4><i class="icon fa fa-check"></i><b> Record has Been updated Sucessfully !</b></h4>
               
              </div>
		<?php } ?>
  <div class="row">
  
  
  <div >
    
            <form action="" method="post">
				         	  <div class="col-sm-12">
							<div class="form-group row">
				         	    
				 <label for="example-search-input" class="col-sm-4 col-form-label">Divison  </label>
				  <div class="col-sm-6">
				  <select class="form-control show-tick" name="district" id="district">  
						<option value=""> Division</option>		
						<?php 
						/* if($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 5)
              {
						$getAllmakes=mysql_query("SELECT * FROM divisions_masters WHERE unit_name = '".$_SESSION['name']."'");
              }else{
                  $getAllmakes=mysql_query("SELECT * FROM divisions_masters");
              }
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
						*/


						$sql = "SELECT * FROM divisions_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){

							?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($_POST['district'])) { if ($rowMakes['id']==$_POST['district']) { echo 'selected'; } } ?>><?php echo $rowMakes['divisions_name'];?></option>			 
                        <?php  }
                        }?>
                        </select>
				  </div>         	    
				         	    
				  
				   <div class="col-sm-1">
					<button name="search_unrecivable" type="submit"><img src="<?php echo base_url()?>assets/img/searchbtn.png" height="30"></button>
				  </div>
			</div>
				     
				     </div>
					 </form>
				       </div>
					   
					   
					   
					   
					   
					   <?php
				     if(isset($_POST['district']))
				     {
				         
				       
				     ?> <div class="col-sm-12" style="background-color:#d8e1f0;">
<div class="box-body">					 
	  <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
               <th>Vehicle Number</th>
              <th>Vehicle Make</th>
              <th>Vehicle Type</th>
			  <th>Vehicle Variant</th>
			  <th>Description</th>             
               <th>Alloted Dist.</th>
			   <th>Alloted FS</th>
			   <th>Alloted Date</th>
            
			 
               
               
                
               
                
              
               
                
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              /*$totalInvoices = mysql_query("SELECT * FROM vehicleD");
              
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   $count++;
				*/

$count = 0;
					$tot = 0;
						$sql = "SELECT a.*,b.issue_date,b.unit_to as uuu,b.fs_to as fss FROM vehicleD a INNER JOIN vehicle_allotment b ON a.vhno=b.vehicleno and b.unit_to IN (select id from units_masters where division_id='".$_POST['district']."') ";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){				
				   
				
				
					 
				//make
					$rm1['vehicle_make'] = '';
					if($row['vhmake'] != '' && $row['vhmake'] != null )
					{
					$sql = "SELECT * FROM  vehicle_make_masters WHERE id = ".$row['vhmake']."";
					$rm1 = $this->db->query($sql)->row_array();
					}
				   
				   //model
					$rm2['vehicle_model'] = '';
					if($row['vhmodel'] != '' && $row['vhmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_variant_masters WHERE id = ".$row['vhmodel']."";
					$rm2 = $this->db->query($sql)->row_array();
					}
				   
				     
				   $rm3['vehicle_type'] = '';
					if($row['vhsubmodel'] != '' && $row['vhsubmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_type_masters WHERE id = ".$row['vhsubmodel']."";
					$rm3 = $this->db->query($sql)->row_array();
					}
				   
				 //make
					$rmdesc = '';
					if($row['vehicle_description'] != '' && $row['vehicle_description'] != null && is_numeric($row['vehicle_description']) )
					{
					$sql = "SELECT * FROM  description_by_vehicle_type_masters WHERE id = ".$row['vehicle_description']."";
					$rmdesc1 = $this->db->query($sql)->row_array();
					$rmdesc = $rmdesc1["name"];
					}


$s4 = "select * from units_masters  WHERE  id = '".$row['uuu']."'  ";				
					$row444 = $this->db->query($s4)->row_array();					
				
				   ?>
				  
              <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
               <td><?php echo $row['vhno']; ?></td>
                <td><?php echo $rm1['vehicle_make']; ?></td>
                 <td><?php echo $rm2['vehicle_model']; ?></td>
               <td><?php echo $rm3['vehicle_type']; ?></td>
				<td><?php echo $rmdesc;?></td>   
                <td><?php echo $row444['unit_name'];

				?></td>
				<td><?php 
				$s4 = "select * from fsname_masters  WHERE  id = '".$row['fss']."'  ";				
					$row444fs = $this->db->query($s4)->row_array();
				echo $row444fs['fs_name']; ?></td>
				<td><?php echo $row['issue_date']; ?></td>                 
            
               <?php } } ?>
              
                 
                
               
			 
               

               
               
               
               
             </tr>
			  
			  	
            
            
            <?php 
				 
				  }?>
            </tbody>
            
            
          </table>
         
          </div> 


	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->