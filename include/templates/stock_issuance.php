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
	<li class="breadcrumb-item">Stock Issuance Form</li>
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

<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
<div class="form-group">
<label class="label">Stock Issue To</label>
<input type="text" name="stock_issue" id="stock_issue" class="form-control" value='' placeholder="Enter Stock Issue To">

</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
<div class="form-group">
<label class="label">SI No</label>
<input type="text" readonly name="si_number" id="si_number" class="form-control" value='' placeholder="Enter Si Number">

</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
<div class="form-group">
<label class="label">SI Date</label>
<div class="custom-date-input">	
<input type="text" readonly tabindex="20"  name="si_date" id="si_date" value="<?php date_default_timezone_set('Asia/Kolkata');  echo date('d-m-Y'); ?>"  class="form-control">
</div>

</div>
</div>
</div>

</div>


<div class="card">
	<div class="card-header">Inventory Info</div>
	<div class="card-body">
	<label><span class="text-danger" id="po_item_check">Item Code, Quantity, Unit Price Are The Mandatory Fields</span></label>
	<div style="overflow-x:auto;">
		<table id="purchasetable" class="table custom-table">
			<thead>
				<tr>
				
				<th>Item Code*</th>
				<th>Item Description</th>
				<th>Quantity*</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<span style="color:green;font-weight: bold;">* Press enter on quntity to add another item
	</span>
	
	<div class="row">
	<div class="col-md-4"></div><div class="col-md-4"></div>
	<div class="col-md-3">
	<label class="label">Total Quantity</label>
	<div class="form-group">
	<input type="number"   name="unit_amount" id="unit_amount" readonly class="form-control" placeholder="0" tabindex="20" onkeydown="javascript: return event.keyCode == 69 ? false : true">
	</div>
	</div>
	</div>

	</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-10"></div>
<div class="col-md-2">	
<div class="text-right">					
<button type="submit" name="submitpurchaseorder" id="submitpurchaseorder" class="btn btn-primary" tabindex="26" value="Submit" tabindex="">Submit</button>
<button type="reset" class="btn btn-outline-secondary" tabindex="27">Cancel</button>
</div>
</div>
</div>

</div>
</div>

</div>

</div>
</div>
</form>
</div>