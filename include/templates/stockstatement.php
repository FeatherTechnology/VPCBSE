<?php
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

if(isset($_POST["submitpurchaseorder"])){
	$addStockIssuance=$userObj->addStockIssuance($mysqli);
	if(isset($addStockIssuance)){ ?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_stock_issuance&msc=1'; </script>
<?php }}?>

<!-- Page header start -->
<div class="page-header">
<ol class="breadcrumb">
	<li class="breadcrumb-item">Stock Movement Form</li>
</ol>

<a href="edit_stock_issuance">
<button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
</a>
</div>
<!-- Main container start -->
<div class="main-container">
<!-- Row start -->
<form action="" method="post" name="mhepurchaseform" id="mhepurchaseform">
	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">	
			<div class="card">
				<div class="card-header">General Info</div>
					<div class="card-body">
						<div class="row" id="multiplefield">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label class="label">Period From</label>
									<div class="custom-date-input">	
										<input type="date" tabindex="4" name="startdate" id="startdate" placeholder="Start Date"  class="form-control datepicker-custom-buttons picker__input"  aria-haspopup="true" aria-readonly="false" aria-owns="startdate_root">
									</div>
								</div>
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label class="label">Period To</label>
									<div class="custom-date-input">	
										<input type="date" tabindex="5" name="enddate" id="enddate"  placeholder="End Date"  class="form-control datepicker-custom-buttons picker__input" aria-haspopup="true" aria-readonly="false" aria-owns="enddate_root">
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label class="label" style="visibility:hidden">Period To</label>
									<div class="form-group">	
									<button type="button" tabindex="6" id="getsohbtn" name="getsohbtn" class="btn btn-primary">View</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="stockinfotable"></div>
			</div>
		</div>
	</form>
</div>