<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Stock Issuance List</li>
	</ol>
	<a href="stock_issuance">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Stock Issuance</button>
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
						<div class="alert-text">Stock Issuance Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Stock Issuance Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Stock Issuance Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="stock_issuance_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Stock Issue To</th>
								<th>Si Number</th>
								<th>Si Date</th>
								<th>Status</th>
								<!-- <th>Action</th> -->
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

	

