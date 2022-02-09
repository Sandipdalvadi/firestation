
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Divisions <small>masters </small> </h1>
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
              <th>Divisions</th>
                <th> Status</th>
				<th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
			 
				  	$count = 0;
					$tot = 0;
					
					$sql = "SELECT * FROM divisions_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){					   
				   $count++;
				    //$tot = $tot+$row['total_income'];
				    
				   ?>
              <tr>
               
                <td><?php echo $row['divisions_name']; ?></td>
                <td><?php if($row['status'] == 1){ ?>
                <b>Active</b>
                  <?php }else{ ?>
                   <b>In-Active</b>
            
                  <?php } ?>
                </td>
			   <td><!--<a href="?id=<?php echo $row['id']; ?>&Action=Edit"><img src="icon-edit.png" height="20"></a> | --><a class="deletemecommon" href="<?php echo base_url()?>Vhdivision/delete/<?php echo $row['id']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a></td>
              
               
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
	<form action="<?php echo base_url()?>Vhdivision/save" method="post" enctype="multipart/form-data">
            	
				<div class="form-group row">&nbsp;</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-4 col-form-label">Vehicle Category</label>
				  <div class="col-sm-6">
					<input required  type="text" class="form-control" placeholder="Divisions" value="" required name="divisions_name">
				  </div>
				  <!--<div class="col-sm-2">
					<button name="divisions_masters" type="submit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="30"></button>
				  </div>-->
				  
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
