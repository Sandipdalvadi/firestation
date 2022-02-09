<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Payment History
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Payment History</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
							 <div class="box">
                                <div class="box-body table-responsive">
								
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR. NO.</th>
												<th>Paypal Desc.</th>	
												<th>Email</th>	
                                                <th>Reg. Amount (USD)</th>											
												<th>Donation  Amount(USD)</th>
												<th>Total Amount USD)</th>
												<th>Status</th>												
												<th>Paypal TXN ID</th>
												<th>DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
									
											$i=0;
											$grand_total = 0;
											$reg_amount = 0;
											$donate_amount = 0;
											 
												  foreach($data as $key =>$row){
												  
												  $i++;
												  if($row['status'] == "Success" )
												  {
												  $grand_total += $row['registration_amount'];
												  $grand_total += $row['donation_amount'];
												  $reg_amount+=$row['registration_amount'];
												  $donate_amount+=$row['donation_amount'];
												  }
										?>
                                            <tr>
                                                <td><?php echo $i;?></td>
												<td><?php echo $row['item_name']?></td>      
                                                <td><?php echo $row['email']?></td>                                               
												  <td><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $row['registration_amount']?></td>
												   <td><i class="fa fa-usd" aria-hidden="true"></i> <?php if($row['donation_amount'] != null ) echo $row['donation_amount']; else echo "0.00"; ?></td>                                               
												  <td><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $row['registration_amount']+$row['donation_amount']?></td>
												    <td>
													<?php
													if( $row['status'] == "Success")
													{
													?>
													  <button type="button" name="" class="btn btn-success"><?php echo $row['status']?></button>
													<?php }
													else{
													?>
													<button type="button" name="" class="btn btn-danger"><?php echo $row['status']?></button>
													<?php }
													?>
													</td>
												   <td><?php echo $row['txn_id']?></td>
												     <td><?php echo $row['created_at']?></td>
											
                                            </tr>
                                        <?php }
										
										?>										
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan='3'>Grand Total</th>
                                                <th style='color:green'><i class="fa fa-usd" aria-hidden="true"></i> <b><?php echo $reg_amount?></b></th>
                                                <th style='color:green'><i class="fa fa-usd" aria-hidden="true"></i> <b><?php echo $donate_amount?></b></th>
                                                <th style='color:green'><i class="fa fa-usd" aria-hidden="true"></i> <b><?php echo $grand_total?></b></th>
                                                <th colspan='3'></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        

 