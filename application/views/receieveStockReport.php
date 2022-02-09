<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> <?php
				/*if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
		}else{
			$sql = "SELECT * FROM units_masters where id='".$this->session->userdata('unit')."' limit 1";
			$rowsname = $this->db->query($sql)->row_array();
			 echo $rowsname["unit_name"];
			?>
		<?php }*/
		
	?>Logistics Received Stock </h1>
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
					<div class="row">
						<div class="col-md-3">
							<input type="date" class="form-control" name="">
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="">
						</div>
						<div class="col-md-3">
								<?php 
									$logisticsKitsData = "select * from logistics_kits_masters  WHERE  status = '1' ";
								?>		
							<select class="form-control">
								<?php 
									$logisticsKitsRow = $this->db->query($logisticsKitsData)->num_rows();
									if($logisticsKitsRow > 0)
									{
										$rows = $this->db->query($logisticsKitsData)->result_array();
						   
										foreach($rows as $key=>$row)
										{
											?>
											<option value="<?php echo $row['id'] ?>"><?php echo $row['logistics_name'] ?></option>
											<?php 
										}
									}
								?>
							</select>
						</div>
						<div class="col-md-3">
							<input type="button" class="btn btn-primary" value="Filter" name="">
						</div>
					</div>
					<table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
						<thead>
							<tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
								<th >Item Name</th>

								<th >Purchase From</th>
								<!--<th >Discription</th>-->
								<th > Purpose</th>

								<th > Qty Rec</th>

								<th > Amount</th>
								<th >Tender Type</th>
								<th >Tender No</th>

								<th >Head of Account</th>

								<!--<td> Current Available Stock</td>	-->


							</tr>
						</thead>


						<tbody>
							<?php
              //print_r($_SESSION);
              /*if($_SESSION["name"] == 'SuperAdmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
              $totalInvoices = mysql_query("SELECT * FROM recivestockbytender    WHERE  transfer = 0 AND  transfer_fs = 0 ORDER BY stock_id DESC"); 
              //echo "SELECT * FROM recivestockbytender    WHERE  transfer = 0 AND  transfer_fs = 0 ORDER BY stock_id DESC";
              }else{
			  $totalInvoices = mysql_query("SELECT DISTINCT item_name FROM recivestockbytender WHERE (updated_by = '".$_SESSION["name"]."') AND fs_name = '' ORDER BY stock_id DESC");
			  //echo "SELECT DISTINCT item_name FROM recivestockbytender WHERE (updated_by = '".$_SESSION["name"]."') AND fs_name = '' ORDER BY stock_id DESC";
              }
			  
			  
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
						while($row222 = mysql_fetch_array($totalInvoices)) {*/


							$sql = "SELECT * FROM tenders_details_new a, tenders_details_new_details b where a.id=b.tenders_details_new_id and a.status='sanctioned and distribution order done' order by a.id desc ";
							$totalInvoices = $this->db->query($sql)->num_rows();
							if($totalInvoices > 0)
							{
								$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
								foreach($rows as $key=>$row){



									$count++;
									$tot = $tot+$row['total_income'];
				    /*if($_SESSION["name"] == 'SuperAdmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3)
              {
				     $totalInvoicesere =[];// mysql_query("SELECT * FROM recivestockbytender WHERE item_name = '".$row222['item_name']."' AND transfer = 0");
              }else{
                  $totalInvoicesere = [];//mysql_query("SELECT * FROM recivestockbytender WHERE item_name = '".$row222['item_name']."' AND updated_by = '".$_SESSION["name"]."' AND transfer = 0");
              }
                   */

				    // $row = [];//mysql_fetch_array($totalInvoicesere);

				     // tender no
				        $item_name = [];//mysql_query("SELECT tender_number FROM recivestockbytender WHERE item_name LIKE '%".$row222['item_name']."%'");
				        

				     $row24242 = [];//mysql_fetch_array($item_name);
				     
				      $item_name_rec = [];//mysql_query("SELECT actual_qty FROM recivestockbytender WHERE item_name LIKE '%".$row222['item_name']."%' AND actual_qty <> ''");


				     $row24121211 = [];//mysql_fetch_array($item_name_rec);

				     $s2 = "select * from logistics_kits_masters  WHERE  id = '".$row['item_id']."'";

				     $row222 = $this->db->query($s2)->row_array();


				     $s3 = "select * from tenders_details_new  WHERE  id = '".$row['tender_id']."'";

				     $row333 = $this->db->query($s3)->row_array();


				     ?>

				     <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;">
				     	<td ><?php echo $row222['logistics_name']; ?></td>

				     	<td ><?php echo $row['purchase_from']; ?></td>
				     	<!--<td ><?php echo $row['description']; ?></td>-->
				     	<td ><?php echo $row['purpose']; ?></td>

				     	<td ><?php echo $row['qty']; ?></td>


				     	<td ><?php echo $row['unit_price']; ?></td>
				     	<td ><?php echo $row['tender_type']; ?></td>
				     	<td ><?php echo $row['tender_number']; ?></td>

				     	<td ><?php echo $row['head_of_account']; ?></td>



				     </tr>




				     <?php 
				 }
				}else { ?>

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