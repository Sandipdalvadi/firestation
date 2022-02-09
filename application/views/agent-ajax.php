<?php
									
											$i=0;
											  //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
												  foreach($externaleclients as $key =>$row){
												  
												  $i++;
										?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['email_id']?></td>
												<td><?php echo $row['mobile']?></td>     												
                                                <td><?php echo $row['localityname']?></td>
												<td><a href="<?php echo base_url()?>Agent/edit/<?php echo $row['admin_id'];?>"><button class="btn btn-success btn-sm">Edit</button></a>  
												<a href="<?php echo base_url()?>Agent/status/<?php echo $row['admin_id'];?>" onclick="return confirm('Are you sure want to Delete?')"><button class="btn btn-danger btn-sm">Delete</button>
												</td>
                                            </tr>
                                        <?php }
										
										?>				