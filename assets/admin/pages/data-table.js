//[Data Table Javascript]

//Project:  Fox Admin - Responsive Admin Template

//Primary use:   Used only for the Data Table

$(function () {
    "use strict";

    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	
	
	$('#example').DataTable( {
		dom: 'Bfrtip',
		pageLength:10,
		buttons: [
			'csv', 'excel', 'pdf', 'print'
		]
	} );
	
	
		$('#example222').DataTable( {
		dom: 'Bfrtip',
		pageLength:10,
		buttons: [
			'csv', 'excel', 'pdf', 'print'
		]
	} );
	
  }); // End of use strict