<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block"> <b>Version</b> 1.0 </div>
    Copyright &copy; 2021-22 <a href="#">TELANGANA STATE DISASTER RESPONSE AND FIRE SERVICES</a>. All Rights Reserved. </footer>
	
	
	<!-- ./wrapper -->
<!-- jQuery 3 -->
<!--<script src="<?php echo base_url()?>assets/admin/vendor_components/jquery/dist/jquery.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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


<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>
</body>
<style>
	@media only screen and (min-width: 575px)
	{
		.margintop
		{
			margin-top:14px;
		}
	}
	</style>
<!-- Mirrored from fox-admin-templates.multipurposethemes.com/foxadmin-minimal/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 06:06:06 GMT -->
</html>

<script>
jQuery(document).ready(function($) {
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
  //$('select.select2').select2('destroy');
  
  $("select.select2-hidden-accessible").select2('destroy');

	$clone 			= $latest_tr.clone();

	$latest_tr.after($clone);
	$('select.select2').select2();
	$clone.find(':text').val('');
	
	
	
	$clone.find("input").val("");

$clone.find('.add_new_item').removeClass('add_new_item').addClass('btn btn-danger remove_new_item').val('Remove');	
 //clone.appendTo('.attr:last');
$('.remove_new_item').last().val('Remove');
});
$(document).on("click", ".fidstype", function() {
	var val = $(this).val();
	this1 = $(this);
$.ajax({
				url: "<?php echo base_url()?>Tenderdetailsbyconew/ajaxitems",
				type: "POST",
				data: {
					val: val									
				},
				cache: false,
				success: function(dataResult){
					console.log(this1.parent().next())
					this1.parent().next().find(".fids").html(dataResult);
				}
			});
})
			

$(document).on("click", ".remove_new_item", function() {
  $(this).closest(".row").remove();
});

$(document).on("keyup", "#serqty1", function() {
  qty1 = $(this).val();
  qty2 = $("#unserqty1").val();
  if(qty2 == '' )
  {
	 qty2 = 0;
  }
   if(qty1 == '' )
  {
	 qty1 = 0;
  }
  total = parseInt(qty1) + parseInt(qty2) ;
  $("#totalqty1").html(total);
});

$(document).on("keyup", "#unserqty1", function() {
  qty2 = $(this).val();
  qty1 = $("#serqty1").val();
  if(qty2 == '' )
  {
	 qty2 = 0;
  }
   if(qty1 == '' )
  {
	 qty1 = 0;
  }
  total = parseInt(qty1) + parseInt(qty2) ;
  $("#totalqty1").html(total);
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
	
	$('#vehicle_type_masters_id').on('change', function() {
			var category_id = this.value;
			var vhmake = $("#vehicle_make_masters_id").val();
			//alert(vhmake);
			$.ajax({
				url: "<?php echo base_url()?>Vhtype/getDataVarient",
				type: "POST",
				data: {
					category_id: category_id,
					vhmake: vhmake
				},
				cache: false,
				success: function(dataResult){
					$("#vehicle_varient_masters_id").html(dataResult);
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





<!--
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>



<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
-->






   <!-- third party js -->
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url()?>assetscustom/libs/pdfmake/build/vfs_fonts.js"></script>
		 <script src="<?php echo base_url()?>assetscustom/js/pages/datatables.init.js"></script>
		 
		        <!-- third party css -->
        <link href="<?php echo base_url()?>assetscustom/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assetscustom/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assetscustom/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assetscustom/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- third party js ends -->
		
		
<style>
thead input {
        width: 100%;
    }
	
	/*.dataTables_filter, .dataTables_info { display: none !important; }*/
</style>
<script>
/*$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#examplecomOlds thead tr').clone(true).appendTo( '#examplecomOlds thead' );
    $('#examplecomOlds thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#examplecomOlds').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		"scrollX": true
    } );
} ); */


jQuery(document).ready(function($) {
	
	//$(document).on("click", ".deletemecommon", function(e) {
	 $('#examplecom').DataTable( {
        responsive: true,
		"aaSorting": []
		
    } );



if ( ! $.fn.DataTable.isDataTable( '#vhmake' ) ) {
$('#vhmaketbl').DataTable({
                
                
                createdRow: function( row, data, dataIndex ) {
        // Set the data-status attribute, and add a class
        if(data.is_urgent == 1 )
        {
            $( row ).addClass('urgent');
        }
        
        
    },
    
    
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "<?php echo base_url()?>Vhmake/allPosts",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                   { "data": "vehicle_make" },
                { "data": "status" },               
                 { "data": "options" }
            ],
			

        });
		
		//$('#vhmaketbl').DataTable().column( 1 ).search($("#colsearch1").val()).draw();
$(document).on("keyup", "#makecolsearch1", function(e) {
		console.log($(this).val());
		$('#vhmaketbl').DataTable().column( 1 ).search($("#makecolsearch1").val()).draw();
	})
 }        

 


    // Setup - add a text input to each footer cell
    $('#examplecomOlds thead tr')
        .clone(true)
        .addClass('filters')		
        .appendTo('#examplecomOlds thead');
 
    var table = $('#examplecomOlds').DataTable({
        orderCellsTop: true,
		responsive: true,
		 "asStripeClasses": [],
    
    
		columnDefs: [
   { orderable: false, targets: -1 }
],
        fixedHeader: false,
        initComplete: function (settings, json) {
			
			//$("#examplecomOlds").wrap("<div style='overflow:auto; width:140%;position:relative;'></div>");            

  
            var api = this.api();
			
			
		
 
            // For each column
            api
                .columns()
                .eq(0)				
                .each(function (colIdx) {
					// if (colIdx == 5) return;
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
					if ($(cell).text() == '') return;
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')						
                        .on('keyup change', function (e) {
                            e.stopPropagation();
							$(".deletemecommon").off("click");
							$(".deletemecommon").on("click");
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw()
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
	
	//$(".deletemecommon").off('click');
	//$(".deletemecommon").on('click');
	
	/*$('#examplecomOlds').on( 'click', 'tr td:last-child', function () {
// source code
alert("got it")
});


$(document).click(function() {
    alert("me");
});

/*$('#examplecomOlds').on( 'click', 'tr', function () {
// source code
$(".deletemecommon").on('click');

});
*/

	$(document).on("mousedown", ".deletemecommon", function(e){  
				e.preventDefault();
			  if(confirm('Are you sure to delete it'))
			  {
				  //alert('yeah'+$(this).attr('href'))
				  location.href= $(this).attr('href');
			  }
			  else
			  {
				  
			  }
		});
		
		/*$(document).on("keyup", "deletemecommon", function(e){  
				e.preventDefault();
			  if(confirm('KEY Are you sure to delete it'))
			  {
				  alert('yeah'+$(this).attr('href'))
			  }
			  else
			  {
				  alert('no')
			  }
		});
		*/
		
		
});
</script>


 <script>
$(document).ready(function() {
	$('#generatelotno').on('click', function() {
	    
	    var numberalloted = $("#allottid").val();
	    //alert(numberalloted);
			$("#generatelotno_op").css("display", "block");
			
			$("#generatelotno_op").val(numberalloted);
		
		
	});
});

    
</script>
