 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Division available stock</h1>
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
  
    
  <div class="box-body">
      <div class="col-sm-12">
            <form action="" method="post">
				         	<div class="form-group row">
				         	    
				 <label for="example-search-input" class="col-sm-4 col-form-label">Divison  </label>
				  <div class="col-sm-6">
				  <select class="form-control show-tick" name="district" id="district">  
						<option value=""> Division</option>		
						<?php 
						 if($_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 5)
              {
						$getAllmakes=mysql_query("SELECT * FROM divisions_masters WHERE unit_name = '".$_SESSION['name']."'");
              }else{
                  $getAllmakes=mysql_query("SELECT * FROM divisions_masters");
              }
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['divisions_name'];?>" <?php if(!empty($_POST['district'])) { if ($rowMakes['divisions_name']==$_POST['district']) { echo 'selected'; } } ?>><?php echo $rowMakes['divisions_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
				  </div>         	    
				         	    
				  
				   <div class="col-sm-1">
					<button name="search_unrecivable" type="submit"><img src="searchbtn.png" height="30"></button>
				  </div>
			</div>
				     </form>
				     </div>
				     <?php
				     if(isset($_POST['district']))
				     {
				     ?>
	     <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
              <td>Name of the Item</td>
               <td>Qty Received From C.O</td>
			  <!--<td>Procured By Unit</td>-->
                <!--<td> Previous Available Stock</td>-->
                <td>Dist Total Available(serviceable)</td>
                <td> Allotted to FS's</td>
                <!--<td>Available in <?php echo $_POST['district']; ?>

(serviceable) </td>-->
                <td>Unserviceable

Available in <?php echo $_POST['district']; ?> </td>
                
              
               
                
              
              </tr>
            </thead>
            
               
            <tbody>
              <?php
              //print_r($_SESSION);
              $totalInvoices = mysql_query("SELECT DISTINCT item_name FROM recivestockbytender  WHERE  updated_by = '".$_POST['district']."' ORDER BY stock_id DESC");
              
				  	$count = 0;
					$tot = 0;
					if(mysql_num_rows($totalInvoices) > 0)
					{
				   while($row = mysql_fetch_array($totalInvoices)) { 
				   $count++;
				    $tot = $tot+$row['total_income'];
				   
				   
				   //District balance
				   $qtyrecfromco = mysql_query("SELECT SUM(qty_recieved) AS qty_recieved,SUM(actual_qty) AS actual_qty FROM recivestockbytender WHERE  transfer = 1 AND item_name LIKE '%".$row['item_name']."%'");
				   $actual_qtyrec = mysql_fetch_array($qtyrecfromco);
				   
				   
				   //headQuaters balance
				    $qtyrecfromco2222 = mysql_query("SELECT SUM(qty_recieved) AS qty_recieved,SUM(actual_qty) AS actual_qty FROM recivestockbytender WHERE  transfer = 0 AND transfer_fs = 0 AND item_name LIKE '%".$row['item_name']."%'");
				   $actual_qtyrec222 = mysql_fetch_array($qtyrecfromco2222);
				   
				   /*
				    $qtyrecfromunit = mysql_query("SELECT SUM(actual_qty) AS qty_recieved FROM recivestockbytender WHERE item_name = '".$row['item_name']."'AND reieved_from = 'Procured By Unit' AND localpurchase = 1 ");
				        $feetchh = mysql_fetch_array($qtyrecfromunit);
				     $qtyrecfromcprvstock = mysql_query("SELECT SUM(actual_qty) AS qty_recieved FROM recivestockbytender WHERE item_name = '".$row['item_name']."' AND reieved_from = 'Previous Stock' AND localpurchase = 1 ");
				     $feetchh2222 = mysql_fetch_array($qtyrecfromcprvstock);*/
				     
				     //District records
				     $qtyrectotalstock = mysql_query("SELECT * FROM recivestockbytender WHERE item_name = '".$row['item_name']."' AND  district = '".$_POST['district']."'");
				     
				     //FS bal
				     $qtyrectotallotedtoFS = mysql_query("SELECT SUM(qty_recieved) AS qty_recieved FROM recivestockbytender WHERE transfer_fs = 1 AND  item_name = '".$row['item_name']."'");
				     $feetchh3333 = mysql_fetch_array($qtyrectotallotedtoFS);

//unserviceable
$qtyrectotalstockunre = mysql_query("SELECT SUM(qty) AS qty_recieved FROM unserviceable_list WHERE item_name = '".$row['item_name']."'  ");
//echo "SELECT SUM(qty) AS qty_recieved FROM unserviceable_list WHERE item_name = '".$row['item_name']."'  ";
$feetchh4444 = mysql_fetch_array($qtyrectotalstockunre);

//Total disct bal
 $qtyrectotalstockqtyy = mysql_query("SELECT SUM(qty_recieved) AS qty_recieved FROM recivestockbytender WHERE item_name = '".$row['item_name']."' AND  district = '".$_POST['district']."' ");
 $ftthch = mysql_fetch_array($qtyrectotalstockqtyy);
				   
				   
				   if(empty($actual_qtyrec['actual_qty']))
				   {
				       $actual_qtyrec['actual_qty'] = 0;
				   }
				   
				   if(empty($feetchh['qty_recieved']))
				   {
				       $feetchh['qty_recieved'] = 0;
				   }
				   
				   if(empty($feetchh2222['qty_recieved']))
				   {
				       $feetchh2222['qty_recieved'] = 0;
				   }
				   
				   if(empty($feetchh3333['qty_recieved']))
				   {
				       $feetchh3333['qty_recieved'] = 0;
				   }
				   
				   if(empty($feetchh4444['qty_recieved']))
				   {
				       $feetchh4444['qty_recieved'] = 0;
				   }
				   
				   ?>
				  
              <tr style="font-family:Geneva, Arial, Helvetica, sans-serif; font-weight:bold;"><form action="" method="post">  <input type="hidden" name="ID" value="<?php echo $row['stock_id']; ?>">
               <td><?php echo $row['item_name']; ?></td>
                
                <td><?php echo $actual_qtyrec['actual_qty']; ?></td> 
                <!--<td><?php echo $feetchh['qty_recieved']; ?></td>-->
                <!--<td><?php echo $feetchh2222['qty_recieved']; ?></td>-->
                <td><?php echo $actual_qtyrec['actual_qty']-$feetchh3333['qty_recieved']-$feetchh4444['qty_recieved'] ?></td> <!--//100-fs-unser-->
               <td><a href="fswiseDistribution?district=<?php echo $row['item_name']; ?>"><?php echo $feetchh3333['qty_recieved']; ?></a></td>
                 <!--<td><?php echo $disttotal - $feetchh4444['qty_recieved']; ?></td>-->
                  <td><?php echo $feetchh4444['qty_recieved']; ?></td>
                 
                
               
			 
               

               
               
               
               
             </form> </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="#666699">
              <td align="center" colspan="13"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
            </tbody>
            
            
          </table>
          <?php } ?>
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