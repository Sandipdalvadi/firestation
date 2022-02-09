 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Vehicle - State Wise Report</h1>
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
  
         <div class="col-sm-12" style="background-color:#d8e1f0;">
  <div class="box-body">

				     <?php
				     
				         
				         //$getAllDistricts = mysql_query("SELECT * FROM units_masters WHERE divisions_name LIKE '%".$_POST['district']."%'");
				         $sql = "SELECT * FROM units_masters order by unit_name asc";
				         $getAllDistricts = $this->db->query($sql)->result_array();
				     ?>
	    <table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
			
			 <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
               <th>Vehicle Description </th>
			    <?php
				
				 foreach($getAllDistricts as $key=>$row)
              {
				  ?><th><?php echo $row['unit_name'];  ?></th>
			  <?php }
			  
              ?>
			  <th>Total</th>
			</tr>
			 <tbody>
			 <?php
			 $sql = "select * from description_by_vehicle_type_masters order by name asc";
			 $rows = $this->db->query($sql)->result_array();
			 foreach($rows as $key1=>$v1)
			 {
			 ?>
			 <tr>
			 <td><?php echo $v1['name'];  ?> </td>
			    <?php
				$rowtotal = 0;
				 foreach($getAllDistricts as $key=>$row3)
              {
				  ?><td><?php //echo $row['unit_name'];
						
						 $sql = "SELECT count(*) as cnt FROM vehicle_allotment a,vehicleD b WHERE a.vehicleno=b.vhno AND  a.unit_to = '".$row3['id']."' and b.vehicle_description='".$v1["id"]."'";
						
				$qtyrectotalstock = $this->db->query($sql)->row_array();
                $qtyrectotalstock["cnt"]; 
			   
			   echo $qtyrectotalstock["cnt"];
			   $rowtotal += $qtyrectotalstock["cnt"];
			   
			   
				  ?></td>
			  <?php }
			  
              ?>
			  <td><?php echo $rowtotal?></td>
			  </tr>
			 <?php }
             // while($row=mysql_fetch_array($getAllDistricts))
				 /*foreach($getAllDistricts as $key=>$row)
              {
              ?>
              <tr >
               <td><?php echo $row['unit_name'];  ?></td>
              <!--<th>Vehicle Make</th>
              <th>Vehicle Type</th>-->
             
               <td><?php 
			   
			    $sql = "SELECT count(*) as cnt FROM vehicleD WHERE 1 AND  allotedUnit = '".$row['id']."'";
				$qtyrectotalstock = $this->db->query($sql)->row_array();
                $qtyrectotalstock["cnt"]; 
			   
			   echo $qtyrectotalstock["cnt"] ?>
			   </td>
             </tr>  
			 
			 <?php } 
			 */
			 
			 ?>
			 
                <!--<td> Previous Available Stock</td>-->      
                
        
           
			 <td>Total </td>
			    <?php
				$rowtotalfooter = 0;
				 foreach($getAllDistricts as $key=>$row)
              {
				  ?><td><?php 
				  //echo $row['unit_name']; 
				  
				  
				   $sql = "SELECT count(*) as cnt FROM vehicle_allotment a,vehicleD b WHERE a.vehicleno=b.vhno AND  a.unit_to = '".$row['id']."' and b.vehicle_description > 0 and b.vehicle_description IS NOT NULL";
						
				$qtyrectotalstock2 = $this->db->query($sql)->row_array();
                echo $qtyrectotalstock2["cnt"]; 
				$rowtotalfooter = $rowtotalfooter + $qtyrectotalstock2["cnt"];
				
				

				  ?></td>
			  <?php }
			  
              ?>
			  <td><?php echo $rowtotalfooter?></td>
			
               
            </tbody>
			
            
            
            
          </table>
          
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