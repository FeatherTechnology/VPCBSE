<?php $current_page = isset($_GET['page']) ? $_GET['page'] : null; ?>

<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/jspdf.js"></script>
<script src="js/xlsx.js"></script>
<script src="vendor/apex/apexcharts.min.js"></script>

<script src="vendor/bs-select/bs-select.min.js"></script>
<!-- Font -->
<script src="js/main.js"></script>
<script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
<script src="https://getbootstrap.com/docs/5.0/assets/js/docs.min.js"></script>	
<script type="text/javascript" src="jsd/datatables.min.js"></script>


<script type="text/javascript" language="javascript">

    $(document).ready(function() {

    	var school_info = $('#school_info').DataTable({
			"order": [[ 0, "desc" ]],
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			//'searching': false, // Remove default Search Control
			'ajax': {
				'url':'ajaxSchoolCreationFetch.php',
				'data': function(data){
					var search = $('#search').val();
					data.search = search;
				}
			},
			
			// dom: 'lBfrtip', 
			buttons: [		
				{
					extend: 'csv',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}
			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
		});

		// holiday Creation
		var holiday_info = $('#holiday_info').DataTable({
			"order": [[ 0, "desc" ]],
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			//'searching': false, // Remove default Search Control
			'ajax': {
				'url':'ajaxHolidayCreationFetch.php',
				'data': function(data){
					var search = $('#search').val();
					data.search = search;
				}
			},
			
			 dom: 'lBfrtip', 
			buttons: [
				{
					extend:  'copy',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},		
				{
					extend:  'pdf',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{
					extend:  'excel',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{
					extend:  'print',
					exportOptions: {
						columns: [ 0, 1, 2 ,3 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}

			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
		});
			
		// holiday Creation
		var temp_admission_info = $('#temp_admission_info').DataTable({
			"order": [[ 0, "desc" ]],
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			//'searching': false, // Remove default Search Control
			'ajax': {
				'url':'ajaxTempAdmissionCreationFetch.php',
				'data': function(data){
					var search = $('#search').val();
					data.search = search;
				}
			},
			
			dom: 'lBfrtip', 
			buttons: [
				{
					extend:  'copy',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},		
				{
					extend:  'pdf',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'excel',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'print',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}

			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
		});

		// Student Creation

		var student_admission_info = $('#student_admission_info').DataTable({
			"order": [[ 0, "desc" ]],
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			//'searching': false, // Remove default Search Control
			'ajax': {
				'url':'ajaxStudentCreationFetch.php',
				'data': function(data){
					var search = $('#search').val();
					data.search = search;
				}
			},
			
			dom: 'lBfrtip', 
			buttons: [
				{
					extend:  'copy',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},		
				{
					extend:  'pdf',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'excel',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'print',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}

			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
		});

		// Staff Creation
			var staff_info = $('#staff_info').DataTable({
			"order": [[ 0, "desc" ]],
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			//'searching': false, // Remove default Search Control
			'ajax': {
				'url':'ajaxStaffCreationFetch.php',
				'data': function(data){
					var search = $('#search').val();
					data.search = search;
				}
			},
			
			dom: 'lBfrtip', 
			buttons: [
				{
					extend:  'copy',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},		
				{
					extend:  'pdf',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'excel',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{
					extend:  'print',
					exportOptions: {
						columns: [ 0, 1, 2 ,3, 4 ]
					}
				},
				{		 
					extend:'colvis',
					collectionLayout: 'fixed four-column',
				}

			],	
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			]
		});
		

		//Trust Creation
	var trustCreation_info = $('#trustCreation_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxTrustCreationFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Area Creation
	var areaCreation_info = $('#areaCreation_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxAreaCreationFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Conduct Certificate Fetch
	var conduct_certificate_info = $('#conduct_certificate_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxConductCertificateFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	// bonafide certificate
	var student_bonafide_info = $('#student_bonafide_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxStudentBonafied.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Transfer Certificate
	var transfer_certificate_info = $('#transfer_certificate_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxTransferCertificateFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Item Fetch
	var item_info = $('#item_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxItemCreationFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});
	//Purchase Order Fetch
	var purchase_info = $('#purchase_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxPurchaseOrderFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Stock Issuance Data Fetch
	var stock_issuance_info = $('#stock_issuance_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxStockIssuanceFetch.php',
			'data': function(data){
                var search = $('#search').val();
		  		data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	//Manage User Data Fetch
	var user_info = $('#user_info').DataTable({
		"order": [[ 0, "desc" ]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		//'searching': false, // Remove default Search Control
		'ajax': {
			'url':'ajaxFiles/ajaxManageUsersInfo.php',
			'data': function(data){
                var search = $('#search').val();
				data.search = search;
			}
		},
		
		// dom: 'lBfrtip', 
		buttons: [		
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]
				}
			},
			{		 
				extend:'colvis',
				collectionLayout: 'fixed four-column',
			}

		],	
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});

	$('#search').change(function(){
		school_info.draw();
		holiday_info.draw();
		temp_admission_info.draw();
		student_admission_info.draw();
		staff_info.draw();
		syllabus_allocation.draw();
		trustCreation_info.draw();
		areaCreation_info.draw();
		concession_table_info.draw();
		conduct_certificate_info.draw();
		student_bonafide_info.draw();
		transfer_certificate_info.draw();
		item_info.draw();
		purchase_info.draw();
		stock_issuance_info.draw();
		student_rollback_info.draw();
		
    });

	setTimeout(function() {
		$('.alert').fadeOut('slow');
	}, 2000);
});	
</script>

<?php 
if($current_page == 'manage_users') { ?>
<script src="js/manage_users.js"></script>
<?php }

if($current_page == 'school_creation') { ?>
<script src="js/school_creation.js"></script>
<?php }

if($current_page == 'syllabus_allocation') { ?>
<script src="js/syllabus_allocation.js"></script>
<?php }

if($current_page == 'syllabus_report') { ?>
<script src="js/syllabus_report.js"></script>
<?php }

if($current_page == 'fees_master_model1') { ?>
<script src="js/fees_master_model1.js"></script>
<?php }

if($current_page == 'fees_master_model2') { ?>
<script src="js/fees_master_model2.js"></script>
<?php }

if($current_page == 'fees_master_model3') { ?>
<script src="js/fees_master_model3.js"></script>
<?php }

if($current_page == 'fees_master_model4') { ?>
<script src="js/fees_master_model4.js"></script>
<?php }

if($current_page == 'finance_creation') { ?>
<script src="js/finance_creation.js"></script>
<?php }

if($current_page == 'backup_restore') { ?>
<script src="js/backup_restore.js"></script>
<?php }

if($current_page == 'student_creation') { ?>
<script src="js/student_creation.js"></script>
<?php }

if($current_page == 'edit_student_creation') { ?>
<script src="js/edit_student_creation.js"></script>
<?php }

if($current_page == 'delete_student') { ?>
<script src="js/delete_student.js"></script>
<?php }

if($current_page == 'student_rollback') { ?>
<script src="js/student_rollback.js"></script>
<?php }

if($current_page == 'covid_concession') { ?>
<script src="js/covid_concession.js"></script>
<?php }

if($current_page == 'fees_concession') { ?>
<script src="js/fees_concession.js"></script>
<?php }

if($current_page == 'fees_collection') { ?>
<script src="js/fees_collection.js"></script>
<?php }

if($current_page == 'configurationsetting') { ?>
<script src="js/configuration.js"></script>
<?php }

if($current_page == 'trust_creation') { ?>
<script src="js/trust_creation.js"></script>
<?php }

if($current_page == 'area_creation') { ?>
<script src="js/area_creation.js"></script>
<?php }

if($current_page == 'item_creation') { ?>
<script src="js/item_creation.js"></script>
<?php }

if($current_page == 'staff_creation') { ?>
<script src="js/staff_creation.js"></script>
<?php }

if($current_page == 'temp_admission_form') { ?>
<script src="js/temp_admission.js"></script>
<?php }

if($current_page == 'pay_fees') { ?>
<script src="js/pay_fees.js"></script>
<?php }

if($current_page == 'transport_fees') { ?>
<script src="js/transport_fees.js"></script>
<?php }

if($current_page == 'last_year_fees') { ?>
<script src="js/last_year_fees.js"></script>
<?php }

if($current_page == 'conduct_certificate') { ?>
<script src="js/conduct_certificate.js"></script>
<?php }

if($current_page == 'transport_fees_master') { ?>
<script src="js/transport_fees_master.js"></script>
<?php }

if($current_page == 'last_year_fees_master') { ?>
<script src="js/last_year_fees_master.js"></script>
<?php }
	
if($current_page == 'last_year_fees_pay') { ?>
<script src="js/last_year_fees_pay.js"></script>
<?php }

if($current_page == 'purchase_order') { ?>
<script src="js/purchaseorder.js"></script>
<?php }

if($current_page == 'stock_issuance') { ?>
<script src="js/stock_issuance.js"></script>
<?php }

if($current_page == 'stock_movement') { ?>
<script src="js/stock_movement.js"></script>
<?php }

if($current_page == 'stockstatement') { ?>
<script src="js/stockstatement.js"></script>
<?php }

if($current_page == 'temp_admission_pay_fees') { ?>
<script src="js/temp_admission_pay_fees.js"></script>
<?php }

if($current_page == 'student_caste_report') { ?>
<script src="js/student_caste_report.js"></script>
<?php }

if($current_page == 'class_wise_list') { ?>
<script src="js/class_wise_list.js"></script>
<?php }

if($current_page == 'register_of_admission') { ?>
<script src="js/register_of_admission.js"></script>
<?php }

if($current_page == 'student_transport_list') { ?>
<script src="js/student_transport_list.js"></script>
<?php }

if($current_page == 'daily_fees_collection') { ?>
<script src="js/daily_fees_collection.js"></script>
<?php }

if($current_page == 'day_end_report') { ?>
<script src="js/day_end_report.js"></script>
<?php }

if($current_page == 'overall_scholarship_fee_details') { ?>
<script src="js/overall_scholarship_fee_details.js"></script>
<?php }

if($current_page == 'pending_fees_details') { ?>
<script src="js/pending_fees_details.js"></script>
<?php }

if($current_page == 'all_type_pending_fees') { ?>
<script src="js/all_type_pending_fees.js"></script>
<?php }

if($current_page == 'classwise_overall_pending') { ?>
<script src="js/classwise_overall_pending.js"></script>
<?php }

if($current_page == 'fees_summary') { ?>
<script src="js/fees_summary.js"></script>
<?php }

if($current_page == 'monthwise_fees_summary') { ?>
<script src="js/monthwise_fees_summary.js"></script>
<?php }

if($current_page == 'edit_transfer_certificate') { ?>
<script src="js/edit_transfer_certificate.js"></script>
<?php }

if($current_page == 'dashboard') { ?>
<script src="js/dashboard.js"></script>
<?php }

if($current_page == 'edit_birthday_wishes') { ?>
<script src="js/edit_birthday_wishes.js"></script>
<?php }

if($current_page == 'edit_tamil_birthday_wishes') { ?>
<script src="js/edit_tamil_birthday_wishes.js"></script>
<?php }

if($current_page == 'edit_general_message') { ?>
<script src="js/edit_general_message.js"></script>
<?php }

if($current_page == 'edit_staff_general_message') { ?>
<script src="js/edit_staff_general_message.js"></script>
<?php }

if($current_page == 'edit_home_work') { ?>
<script src="js/edit_home_work.js"></script>
<?php }

if($current_page == 'index' || $current_page == '' || $current_page == 'index.php'){ ?>
	<script src="js/logincreation.js"></script>
<?php } ?> 

<!-- Slimscroll JS -->
<script src="vendor/slimscroll/slimscroll.min.js"></script>
<script src="vendor/slimscroll/custom-scrollbar.js"></script>

<!-- Datepickers -->
<script src="vendor/datepicker/js/picker.js"></script>
<script src="vendor/datepicker/js/picker.date.js"></script>
<script src="vendor/datepicker/js/custom-picker.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
	// school delete
    $(document).on("click", '.delete_school', function(){
        var dlt = confirm("Do you want to delete this School ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

	// holiday delete
    $(document).on("click", '.delete_holiday', function(){
        var dlt = confirm("Do you want to delete this Holiday ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

	// Area delete
    $(document).on("click", '.delete_area', function(){
        var dlt = confirm("Do you want to delete this Area ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

	// Conduct Certificate delete
    $(document).on("click", '.delete_conduct', function(){
        var dlt = confirm("Do you want to delete this Conduct Certificate ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

	// Transfer Certificate delete
    $(document).on("click", '.delete_transfer', function(){
        var dlt = confirm("Do you want to delete this Transfer Certificate ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

	// Item delete
    $(document).on("click", '.delete_item', function(){
        var dlt = confirm("Do you want to delete this Item ?");
        if(dlt){
                return true;
            }else{
                return false;
            }
    });

    $('.select2').select2();

</script>


