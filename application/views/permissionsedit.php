<div class="content-wrapper" style="min-height: 555px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> User Role <small>masters </small> </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <form action="<?php echo base_url()?>CreateUserRole/permissions" method="post" enctype="multipart/form-data" id="fperm"> 
	  <div class="container-fluid">
	    <div class="row">
    <div class="col-sm-12">
        
        
	 <div align="justify" class="box-body">
	   
              				  
							   
							
         
         <div class="container-fluid">
		 
		    <div class="col-sm-4">
				  Role
				  
				    <select class="form-control show-tick myselect" required name="role_id" id="role_id">  
						<option value=""> Select Role</option>		
						<?php /*$tenders_details=mysql_query("SELECT DISTINCT tender_number FROM tenders_details");
						if(!empty(mysql_num_rows($tenders_details)))
						 {
					
						while($rowMakes = mysql_fetch_array($tenders_details)){*/

					$sql = "SELECT * FROM user_role_masters where 1 order by id desc ";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){		

						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($_POST['role_id'])) { if ($rowMakes['id']==$_POST['role_id']) { echo 'selected'; } } ?>><?php echo $rowMakes['name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value=""> Not Available</option>';
                        } ?>
                        </select>
				  </div> 
				  
				  
				  
		 <?php
		 if(!empty($_POST['role_id']))
		 {
		 $sql = "select DISTINCT(groupname) as gp from user_permissions ";
		 $rows=$this->db->query($sql)->result_array();
		 foreach($rows as $key=>$value)
		 {
		 ?>
   <h3 align="justify"><?php echo $value["gp"]?></h3>
  <div class="row">           
         <?php
		 $sql = "select * from user_permissions where groupname='".$value["gp"]."'";
		 $rows2=$this->db->query($sql)->result_array();
		 foreach($rows2 as $key2=>$value2)
		 {   

				$sql = "select * from user_role_permissions where role_id='".$_POST['role_id']."' and permission_id='".$value2["id"]."'";
			$num = $this->db->query($sql)->num_rows();
			if($num < 1 )
			{
				$view = "";
				$add = "";
				$edit = "";
				$delete = "";
			}
			else
			{
				$row = $this->db->query($sql)->row_array();
				$view = "";
				$add = "";
				$edit = "";
				$delete = "";
				if($row["view"] == 1 ){
					$view = 'checked';
				}
				if($row["add"] == 1 ){
					$add = 'checked';
				}
				if($row["edit"] == 1 ){
					$edit = 'checked';
				}
				if($row["delete"] == 1 ){
					$delete = 'checked';
				}
				
			}
            ?> 
		
    <div class=" col-sm-12 col-md-3" >  <div class="checkbox">
                   
					<label for="basic_checkbox_<?php echo $value2["id"]?>"><b style="text-transform:uppercase;"> <?php echo $value2["name"]?></b></label>                  
                </div></div>
				 
				<div class=" col-md-2 col-sm-6" style="border-bottom: 1px solid #000">  <div class="checkbox">
                    <input type="checkbox" class="accessme" <?php echo $view?> data-mode="VIEW" value="<?php echo $value2["id"]?>" name="access[]" value="auctions_logistics" id="view_<?php echo $value2["id"]?>">
					<label for="view_<?php echo $value2["id"]?>"><b style="text-transform:uppercase;"> VIEW</b></label>                  
                </div></div>
				 <div class=" col-md-2 col-sm-6" style="border-bottom: 1px solid #000">  <div class="checkbox">
                    <input type="checkbox" class="accessme" <?php echo $add?> data-mode="ADD" value="<?php echo $value2["id"]?>" name="access[]" value="auctions_logistics" id="add_<?php echo $value2["id"]?>">
					<label for="add_<?php echo $value2["id"]?>"><b style="text-transform:uppercase;"> ADD</b></label>                  
                </div></div>
				 <div class=" col-md-2 col-sm-6" style="border-bottom: 1px solid #000">  <div class="checkbox">
                    <input type="checkbox" class="accessme" <?php echo $edit?>  data-mode="EDIT" value="<?php echo $value2["id"]?>" name="access[]" value="auctions_logistics" id="edit_<?php echo $value2["id"]?>">
					<label for="edit_<?php echo $value2["id"]?>"><b style="text-transform:uppercase;"> EDIT</b></label>                  
                </div></div>
				 
				 <div class=" col-md-2 col-sm-6" style="border-bottom: 1px solid #000">  <div class="checkbox">
                    <input type="checkbox" class="accessme" <?php echo $delete?> data-mode="DELETE" value="<?php echo $value2["id"]?>" name="access[]" value="auctions_logistics" id="delete_<?php echo $value2["id"]?>">
					<label for="delete_<?php echo $value2["id"]?>"><b style="text-transform:uppercase;"> DELETE</b></label>                  
                </div></div>
				
			
   
		 <?php }
		 
		 ?><div  style="width:100%;margin-bottom:20px"></div></div>
		 <?php
		 }
		 ?>
			
		 <?php
		 }	
		 ?>
                    
                                          
    
   
 
                    
                                         </div>
</div>
<!--<button type="submit" name="doSubmit"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="40"></button>-->
                					
            </form>
          </div>
		  </div>
   

  </div>

		</form>
</div>
	  
	 
	 
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>