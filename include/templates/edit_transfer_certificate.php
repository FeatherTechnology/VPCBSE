<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transfer Certificate List</li>
	</ol>
	<a href="transfer_certificate">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Transfer Certificate</button>
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
					$mscid=0;
					if(isset($_GET['msc']))
					{
					$mscid=$_GET['msc'];
					if($mscid==1)
					{?>
					<div class="alert alert-success" role="alert">
						<div class="alert-text">Transfer Certificate Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Transfer Certificate Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Transfer Certificate Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="transfer_certificate_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Serial Number</th>
								<th>TMR Code	</th>
								<th>Admission Number</th>
								<th>Certificate Number </th>
								<th>Transfer Date</th>
								<th>School Name</th>
								<th>District Educational</th>
								<th>Revenue District</th>
								<th>Status</th>
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

	

