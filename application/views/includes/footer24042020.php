
   
   <!-- Footer Start-->

	</body>
	</html>
    <!-- Footer End-->
   
  <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url()?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
				$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
				$(".no-print").hide();
               var table =  $("#example1").dataTable();
                /*$('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });*/
				/*$(document).on('change', '#country_id', function() {
				// Does some stuff and logs the event to the console					
					id = $(this).val();
					$.ajax({url: "populate_state_by_country_id.php",type: 'POST',
							data: { id: id} , success: function(result){
							$("#state_id").html(result);
					}});
				});
				
				$(document).on('change', '#state_id', function() {
				// Does some stuff and logs the event to the console					
					id = $(this).val();
					$.ajax({url: "populate_district_by_state_id.php",type: 'POST',
							data: { id: id} , success: function(result){
							$("#district_id").html(result);
					}});
				});*/
            });
        </script>		

    </body>
</html>