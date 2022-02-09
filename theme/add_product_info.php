 <div class="welcome-adminpro-area">
                <div class="container-fluid">
                       <div class="row">
					    <form action="<?php echo base_url(); ?>index.php/categories/add_product_info" method="POST" id="addCat" name="addCat" enctype="multipart/form-data" >
						<div class="basic-login-form-ad">
						   <div class="col-lg-12">
								<div class="sparkline10-list shadow-reset mg-t-30">
									<div class="sparkline10-hd">
										<div class="main-sparkline10-hd">
											 <h1><?php echo $breadcomeName; ?></h1>
											<div class="sparkline10-outline-icon">
												<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
												<span><i class="fa fa-wrench"></i></span>
												<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<div class="sparkline10-graph">
										<div class="basic-login-form-ad">
											<div class="row">
												<div class="col-lg-12">
													<div class="basic-login-inner inline-basic-form">
														<div class="form-group-inner col-lg-6">
																<div class="row">
																	<div class="col-lg-3">
																		<label class="login2 pull-right pull-right-pro">Category</label>
																	</div>
																	<div class="col-lg-9">
																		<div class="form-select-list">
																			<select class="form-control custom-select-value" id="cat_id" name="cat_id">
																			<option value="">Choose Category</option>
																			<?php foreach($getCat as $key => $getcategory){ ?>
																			 <option value="<?php echo $getcategory['cat_id']; ?>"><?php echo $getcategory['cat_name']; ?></option>
																			 <?php } ?>
																				
																			</select>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="form-group-inner col-lg-6">
																<div class="row">
																	<div class="col-lg-3">
																		<label class="login2 pull-right pull-right-pro">Sub Category</label>
																	</div>
																	<div class="col-lg-9">
																		<div class="form-select-list">
																		  <select class="form-control custom-select-value" id="sub_cat_id" name="sub_cat_id">
																			<option value="">Choose Sub Category</option>
																			<?php foreach($getSub_Cat as $key => $getsubcategory){ ?>
																			 <option value="<?php echo $getsubcategory['sub_cat_id']; ?>"><?php echo $getsubcategory['sub_cat_name']; ?></option>
																			 <?php } ?>
																				
																			</select>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="form-group-inner col-lg-6">
																<div class="row">
																	<div class="col-lg-3">
																		<label class="login2 pull-right pull-right-pro">Product Category</label>
																	</div>
																	<div class="col-lg-9">
																		<div class="form-select-list">
																			<select class="form-control custom-select-value" id="pro_cat_id" name="pro_cat_id">
																			<option value="">Choose Product Category</option>
																			<?php foreach($getpro_Cat as $key => $getprocategory){ ?>
																			 <option value="<?php echo $getprocategory['pro_cat_id']; ?>"><?php echo $getprocategory['pro_cat_name']; ?></option>
																			 <?php } ?>
																				
																			</select>
																		</div>
																	</div>
																</div>
															</div>
																									 
															<div class="form-group-inner col-lg-6">
																<div class="row">
																	<div class="col-lg-3">
																		<label class="login2 pull-right pull-right-pro">Language</label>
																	</div>
																	<div class="col-lg-9">
																		<div class="form-select-list">
																			<select class="form-control custom-select-value" id="lang_id" name="lang_id">
																				<option value="">Choose Language</option>
																				<option value="1">English</option>
																				<option value="2">Arab</option> 
																			</select>
																		</div>
																	</div>
																</div>
															</div>  
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                  
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
								
                                    <div class="main-sparkline12-hd">
                                        <h1>Technical Specification</h1>
                                        
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row"> 
											  <div class="col-lg-12">
											<div class="col-lg-6">
                                                <div class="all-form-element-inner"> 
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_name" name="pro_name" class="form-control"  placeholder="Enter Product Name"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Category</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_category" name="pro_category" class="form-control"  placeholder="Enter Product Category"/>
                                                                </div>
                                                            </div>
                                                        </div>
											        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Open Frame / Enclosed</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <select name="frame_type" id="frame_type" class="form-control">
																		<option value="">Select</option>
																		<option value="Open Frame">Open Frame</option>
																		<option value="Enclosed">Enclosed</option>
																		
																   </select>
																</div> 
															</div>
                                                        </div> 
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Brand</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_brand" name="pro_brand" class="form-control"  placeholder="Enter Product Brand"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Carton Dimension</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="carton_dim" name="carton_dim" placeholder="Carton Dimension"> 
																</div> 
															</div>
                                                        </div> 
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Grass Weight</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="gr_weight" name="gr_weight" class="form-control"  placeholder="Enter Grass Weight"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Input Volts</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="input_volt" name="input_volt" class="form-control"  placeholder="Enter Input Volts"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                          
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Model</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_model" name="pro_model" class="form-control"  placeholder="Enter Product Model"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Net Weight</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="nt_weight" name="nt_weight" class="form-control"  placeholder="Enter Net Weight"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Number of Outputs</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <select name="no_of_outputs" id="no_of_outputs" class="form-control">
																		<option value="">Select</option>
																		<option value="1 Output">1</option>
																		<option value="1 Output">2</option>
																		<option value="1 Output">3</option>
																		<option value="1 Output">4</option>
																		<option value="1 Output">5</option>
																   </select>
																</div> 
															</div>
                                                        </div> 
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Current Channel 1</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="output_current_chnl" name="output_current_chnl" class="form-control"  placeholder="Enter Output Current Channel 1"/>
                                                                </div>
                                                            </div>
                                                        </div>
														   <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Voltage Channel 2</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="output_volt_chnl2" name="output_volt_chnl2" class="form-control"  placeholder="Enter Output Voltage Channel 1"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Current Channel 2</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="output_current_chnl2" name="output_current_chnl2" class="form-control"  placeholder="Enter Output Current Channel 1"/>
                                                                </div>
                                                            </div>
                                                        </div>
														   <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Voltage Channel 1</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="output_volt_chnl" name="output_volt_chnl" class="form-control"  placeholder="Enter Output Voltage Channel 1"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
													   <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mounting Style</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="mounting_style" name="mounting_style" placeholder="Mounting Style">
																</div> 
															</div>
                                                        </div> 
														
														  <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Height</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_height" name="pro_height" class="form-control"  placeholder="Enter Product Height"/>
                                                                </div>
                                                            </div>
                                                        </div>
														  <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Length</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_length" name="pro_length" class="form-control"  placeholder="Enter Product Length"/>
                                                                </div>
                                                            </div>
                                                        </div>
														  <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Width</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_width" name="pro_width" class="form-control"  placeholder="Enter Product Width"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Dimensions</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_dim" name="pro_dim" class="form-control"  placeholder="Enter Product Dimensions"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Input Frequency</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="input_frequency" name="input_frequency" class="form-control"  placeholder="Enter Input Frequency"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														  <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Safty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="safty" name="safty" class="form-control"  placeholder="Enter Safty"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Series</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="series" name="series" class="form-control"  placeholder="Enter Series"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Specification</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="specification" name="specification" class="form-control"  placeholder="Enter Specification"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
                                                    
                                                        
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Price</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_price" name="pro_price" class="form-control"  placeholder="Enter Product Price"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                       <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Description</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <textarea class="form-control" id="pro_desc" name="pro_desc" placeholder="Description about Product"></textarea>
																</div> 
															</div>
                                                        </div> 
                                                        
                                                        
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Image</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <input type="file" id="pro_image" name="pro_image" class="form-control"  />
																</div> 
															</div>
                                                        </div>  
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Power</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="tot_power" name="tot_power" class="form-control"  placeholder="Enter Output Power"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
														   <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Factory Pack Quantity</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="factory_pack_qty" name="factory_pack_qty" class="form-control"  placeholder="Enter Factory Pack Quantity"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Load Regulation</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="load_regulation" name="load_regulation" class="form-control"  placeholder="Enter Load Regulation"/>
                                                                </div>
                                                            </div>
                                                        </div> 
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Isolation Voltage</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="isolation_volt" name="isolation_volt" class="form-control"  placeholder="Enter Isolation Voltage"/>
                                                                </div>
                                                            </div>
                                                        </div> 
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Approvals</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="approvals" name="approvals" class="form-control"  placeholder="Enter Approvals"/>
                                                                </div>
                                                            </div>
                                                        </div> 
														
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Weight</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_weight" name="pro_weight" class="form-control"  placeholder="Enter Product Weight"/>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                       
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Carton Weight</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="carton_weight" name="carton_weight" class="form-control"  placeholder="Enter Carton Weight"/>
                                                                </div>
                                                            </div>
                                                        </div>  
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Voltage</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="file" id="output_volt" name="output_volt" class="form-control"  placeholder="Output Voltage"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Power</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="file" id="output_power" name="output_power" class="form-control"  placeholder="Output Power"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Output Current</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="file" id="output_crnt" name="output_crnt" class="form-control"  placeholder="Output Current"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
                                                </div>
											 </div><!-- End of Col-lg-6 -->
											 <div class="col-lg-6">	  
                                                        
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Prices</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_prices" name="pro_prices" class="form-control"  placeholder="Enter Product Prices"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Available Qty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="qty" name="qty" class="form-control" placeholder="Enter Available Qty"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Prices</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_prices" name="pro_prices" class="form-control"  placeholder="Enter Product Prices"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Price for 1-7 Qty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_1_7_price" name="pro_1_7_price" class="form-control"  placeholder="Price for 1-7 Qty"/>
                                                                </div>
                                                            </div>
                                                        </div>
														
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Price for 8-18 Qty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_8_18_price" name="pro_8_18_price" class="form-control"  placeholder="Price for 8-18 Qty"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Price for 19-44 Qty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_19_44_price" name="pro_19_44_price" class="form-control"  placeholder="Price for 19-44 Qty"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Price for 45+ Qty</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="pro_45_price" name="pro_45_price" class="form-control"  placeholder="Price for 45 Qty"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Manuals</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="file" id="manual" name="manual" class="form-control"  placeholder="Choose File"/>
                                                                </div>
                                                            </div>
                                                        </div>
														 <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Datasheet</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="file" id="datasheet" name="datasheet" class="form-control"  placeholder="Choose Datasheet"/>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Product Catelog</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                 <textarea class="form-control" id="pro_catelog" name="pro_catelog" placeholder="Enter Product Catelog"></textarea>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Extra field</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="extra_fields" name="extra_fields" class="form-control"  placeholder="Enter"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
														
														 
                                                        
                                                        
                                                        
														  <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                          <!--  <button class="btn btn-white" type="submit">Cancel</button> -->
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
											 </div><!-- End of Col-lg-6 -->
                                             	</div> 
                                         </div> 		 
                                    </div> 
                               </div>
							
                        </div>
							<!-- Static Table Start -->
           
						<!-- Static Table End -->
						</div>
					 </form>
					<!-- Product List -->
				 <div class="data-table-area mg-b-15">
					<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Products <span class="table-project-n">List</span> </h1>
                                         <!-- <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                       <!-- <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div> -->
                                        <table id="table" data-toggle="table" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Product</th>
                                                    <th>Description</th>
                                                     <th>Image</th>  
                                                    <th>Language</th>  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php $i=1;foreach($getproinfo as $key =>$value) { ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $value['pro_name'];?></td>
                                                    <td><?php echo $value['pro_short_desc'];?></td>
                                                     <td><img src="<?php echo base_url(); ?>uploads/pro_info_images/<?php echo $value['pro_image'];?>" width="100" /></td>
                                                    <td><?php if($value['lang_id']==1){echo "English";}elseif($value['lang_id']==2){echo "Arab";}?></td>
                                                    
                                                    <td class="datatable-ct"><a href="<?php echo base_url(); ?>index.php/categories/edit_pro_info/<?php echo $value['prod_id'];?>"><i class="fa fa-pencil-square-o " title="Edit"></i></a> | <a href="<?php echo base_url(); ?>index.php/categories/delete_pro_info/<?php echo $value['prod_id'];?>" title="Delete"><i class="fa fa-trash-o "></i></a>
                                                    </td>
                                                </tr>
											<?php $i=$i+1;}?>  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
                </div>
            </div>