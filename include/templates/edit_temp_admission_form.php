<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Temporary Student's List</li>
	</ol>
	<a href="temp_admission_form">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Temporary Student's</button>
	</a>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="table-container">

				<div class="table-responsive">
					<?php
					$tempgetid = 0;
					if(isset($_GET['tempgetid']))
					{
					$tempgetid = $_GET['tempgetid'];
					if($tempgetid == 1)
					{
					$tempfeesid = $_GET['tempfeesid'];
					?>
					<script>  
					setTimeout(() => {
        				print_temp_fees(<?php echo $tempfeesid; ?>);
    				}, 1000);
					// print functionality
					function print_temp_fees(tempFeesid){
					$.ajax({
						url: 'ajaxFiles/temp_pay_fees_print.php',
						cache: false,
						type: 'POST',
						data: {'tempFeesid': tempFeesid},
						success: function(html){
							var printWindow = window.open('', '_blank', 'height=800,width=1200');
							printWindow.document.write(html);
							printWindow.document.close();
							printWindow.print();
							printWindow.close();
						}
					});
					}
					</script>

					<div class="alert alert-success" role="alert">
						<div class="alert-text">Temporary Fees Paid Successfully!</div>
					</div> 
					<?php
					}
					if($tempgetid == 2)
					{?>
						<div class="alert alert-danger" role="alert">
						<div class="alert-text">Temporary Fees Pay Failed!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="temp_admission_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Student Name</th>
								<th>Standard</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Row end -->
</div>
<!-- Main container end -->

<!-- print div -->
<div id="printTempPayFees" style="display: none"></div>