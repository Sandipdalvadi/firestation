<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block"> <b>Version</b> 1.0 </div>
    Copyright &copy; 2021-22 <a href="#">TELANGANA STATE DISASTER RESPONSE AND FIRE SERVICES</a>. All Rights Reserved. </footer>
	
	
	<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery/dist/jquery.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery-ui/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
<!-- popper -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/popper/dist/popper.min.js"></script>
<!-- Bootstrap 4.0-->
<script src="<?php echo base_url()?>assets/admin/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/chart-js/chart.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/admin/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery-knob/js/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assetsadmin//vendor_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/admin/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/admin/vendor_components/fastclick/lib/fastclick.js"></script>
<!-- fox_admin App -->
<script src="<?php echo base_url()?>assets/admin/template.js"></script>
<!-- fox_admin dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/admin/pages/dashboard.js"></script>
<!-- fox_admin for demo purposes -->
<script src="<?php echo base_url()?>assets/admin/demo.js"></script>
<!-- weather for demo purposes -->
<script src="<?php echo base_url()?>assets/admin/vendor_plugins/weather-icons/WeatherIcon.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>
</body>
<!-- Mirrored from fox-admin-templates.multipurposethemes.com/foxadmin-minimal/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 06:06:06 GMT -->
</html>

<script>
$(document).ready(function() {
	$(".select2").select2();
	
	 $('.treeview-menu:not(:has(li))').remove();
	 $('.treeview:not(:has(ul))').remove();
	  $('.treeview:not(:has(ul > li))').remove();
	$('.treeview:not(:has(ul > li))').remove();
	$('.treeview:not(:has(ul.treeview-menu > li))').remove();
	//$(".add_new_box").live('click',function(){
		$('.add_new_item').on('click', function() {

 //var clone = $('.attr:last').clone();
 
 

  
	/*$('.toollist').select2("destroy");
    var noOfDivs = $('.myselect').length;
    //var clonedDiv = $('.tooltest0').first().clone(true);
    //clonedDiv.insertBefore("#tool-placeholder");
    //clone.attr('id', 'tooltest' + noOfDivs);
    

    $('.toollist').select2({ //apply select2 to my element
        placeholder: "Search your Tool",
        allowClear: true
    });
   */
   
	$latest_tr 	= $('.attr:last');
  $('select.select2').select2('destroy');

	$clone 			= $latest_tr.clone();

	$latest_tr.after($clone);
	$('select.select2').select2();
	$clone.find(':text').val('');
	
	
	
	$clone.find("input").val("");

$clone.find('.add_new_item').removeClass('add_new_item').addClass('btn btn-danger remove_new_item').val('Remove');	
 //clone.appendTo('.attr:last');
$('.remove_new_item').last().val('Remove');
});


$(document).on("click", ".remove_new_item", function() {
  $(this).closest(".row").remove();
});



	 $(".myselect").select2();
	 
	 $('#example2').dataTable( {
  "scrollX": true
} );


$('#role_id').on('change', function() {
	//alert($(this).val())
	$("#fperm").submit();
})

$('.accessme').on('click', function() {
	//alert($(this).val())
	/*alert($(this).val())
	alert($('#role_id').val())
	if ($(this).is(":checked")) { 
		alert("YES")
	}
	else
	{
		alert("NO")
	}
	*/
	permission_id = $(this).val();
	role_id = $('#role_id').val();
	access = 0;
	if ($(this).is(":checked")) { 
		access = 1;
	}
	else
	{
		access = 0;
	}
	mode = $(this).data("mode");
	//alert(mode)
	$.ajax({
				url: "<?php echo base_url()?>CreateUserRole/setpermission",
				type: "POST",
				data: {
					role_id: role_id,
					permission_id: permission_id,
					mode: mode,
					access: access					
				},
				cache: false,
				success: function(dataResult){
					$("#vehicle_type_masters_id").html(dataResult);
				}
			});
			
			
})
	$('#vehicle_make_masters_id').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "<?php echo base_url()?>Vhtype/getlists",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#vehicle_type_masters_id").html(dataResult);
				}
			});
		
		
	});
	
	$('#district').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "<?php echo base_url()?>Vhtype/getFS",
				//url: "get-data-fs.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#vehicle_type_masters_id").html(dataResult);
				}
			});
		
		
	});
	
	$('#district_unit').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "<?php echo base_url()?>Vhtype/getFS",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#fs").html(dataResult);
				}
			});
		
		
	});
	
	$('#tender_number').on('change', function() {
			var tender_number = this.value;
			$.ajax({
				url: "Recivestockbytender/getstockdata",
				type: "POST",
				data: {
					tender_number: tender_number
				},
				cache: false,
				success: function(dataResult){
				    //alert(dataResult['qty']);
					$("#description").val(dataResult['item_description']);
					$("#item_name").val(dataResult['item_name']);
					$("#item_name_new").val(dataResult['item_name']);
					
					$("#qty_recieved").val(dataResult['qty']);
					$("#qty_new").val(dataResult['qty']);
					$("#tender_type").val(dataResult['tender_type']);
				}
			});
		
		
	});
	
});
</script>
