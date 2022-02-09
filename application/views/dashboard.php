 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Dashboard  </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
	  <?php
	  if($this->session->userdata('fs_name') == '' || $this->session->userdata('fs_name') == NULL && !is_numeric($this->session->userdata('fs_name')) )	
		{
			?>
        <div class="col-xl-3 col-lg-6 col-12">
		<!--<a href="allvehiclesreportbydescription.php">-->
		<a href="javascript:void(0)">
          <!-- Widget: user widget style 1 -->
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#72b3cc;">
              <h4 class="widget-user-username"><b> Available Vehicles</b></h4>
               <h1><b><?php echo $cnt1?></b></h1>
            </div>
          
          </div>
		  </a>
          <!-- /.widget-user -->
        </div><?php } ?>

        <div class="col-xl-3 col-lg-6 col-12">
				<!--<a href="allotment.php">-->
		<a href="javascript:void(0)">
          <!-- Widget: user widget style 1 -->
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#32a852;">
              <h4 class="widget-user-username"><b>  Vehicles Allotments</b></h4>
               <h1><b><?php echo $cnt2?></b></h1>
            </div>
           
          </div>
          <!-- /.widget-user -->
		  		</a>
        </div>
		
		

        <!-- /.col -->
     
       
        <!-- /.col -->
		
		<div class="col-xl-3 col-lg-6 col-12">
          <!-- Widget: user widget style 1 -->
		  <!--<a href="vhexpanses.php">-->
		<a href="javascript:void(0)">
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#3f4d69;">
              <h4 class="widget-user-username"><b>Vehicle Expendtiure<br><!--(FY 2020-21)--></b></h4>
               <h1><b>Rs. <?php echo $cnt4?></b></h1>
            </div>
           
          </div>
		  </a>
          <!-- /.widget-user -->
        </div>
		 <div class="col-xl-3 col-lg-6 col-12" style="display:none">
		<!--<a href="repairs.php">-->
		<a href="javascript:void(0)">
          <!-- Widget: user widget style 1 -->
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#333024;">
              <h4 class="widget-user-username"><b>Vehicles Repair Expenses</b></h4>
               <h1><b>Rs. 0</b></h1>
            </div>
           
          </div>
		  </a>
          <!-- /.widget-user -->
        </div>
		<?php
		if($show3)
		{
		?>
		<div class="col-xl-3 col-lg-6 col-12">
          <!-- Widget: user widget style 1 -->
		  <!--<a href="costock.php">-->
		<a href="javascript:void(0)">
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#694646;">
              <h4 class="widget-user-username"><b>No. of Logistic Items <br>(Issued From C.O.)</b></h4>
               <h1><b><?php echo $cnt3?></b></h1>
            </div>
           
          </div>
		  </a>
          <!-- /.widget-user -->
        </div>
		<?php }
		?>
        
        
        <div class="col-xl-3 col-lg-6 col-12">
          <!-- Widget: user widget style 1 -->
		  <!--<a href="fswiseDistribution.php">-->
		<a href="javascript:void(0)">
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#d64e45;">
              <h4 class="widget-user-username"><b>No.of Items issued to FS's<br>(Issued From District)</b></h4>
               <h1><b><?php echo $cnt5?></b></h1>
            </div>
           
          </div>
		  </a>
          <!-- /.widget-user -->
        </div>
        
          <div class="col-xl-3 col-lg-6 col-12">
          <!-- Widget: user widget style 1 -->
		  <!--<a href="unserviceable.php">-->
		<a href="javascript:void(0)">
          <div align="center" class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active" style="background:#45d65d;">
              <h4 class="widget-user-username"><b>NO Of Unserviceable</b></h4>
               <h1><b><?php echo $cnt6?></b></h1>
            </div>
           
          </div>
		  </a>
          <!-- /.widget-user -->
        </div>
        
        <!-- /.col -->
        
        <!-- /.col -->
        <!-- /.col -->
        <!-- /.col -->
      </div>
    
          <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
	</div>


