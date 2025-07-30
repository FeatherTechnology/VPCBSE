
<?php
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}
// $vendorarray = $userObj->getPurchaseVendor($mysqli);
// // $companyarray= $userObj->getPurchaseCompany($mysqli);
// $templearray = $userObj->getPurchaseTemple($mysqli);
// //$brancharray = $userObj->getPurchasebranch($mysqli);
 
// $polist=$userObj->getPoList($mysqli);


if(isset($_POST["submitpurchaseorder"])){
	$addpurchase=$userObj->addPurchaseOrder($mysqli);
	if(isset($addpurchase)){ ?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_purchase_order&msc=1'; </script>
<?php }}?>

<!-- Page header start -->
<div class="page-header">
<ol class="breadcrumb">
	<li class="breadcrumb-item">Stock Inward Form</li>
</ol>

<a href="edit_purchase_order">
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
<label class="label">Vendor<span class="text-danger">*</span></label>
<select  tabindex="1" name="vendor_name" id="vendor_name" class="form-control select2" value="">
	<option value="">-- Select Vendor --</option>
	<option value="Classic Book Distributors" <?php if (isset($vendor_name)) {
							if ($vendor_name == "Classic Book Distributors") echo 'selected';
						} ?>>Classic Book Distributors</option>
	<option value="Samsel Publications" <?php if (isset($vendor_name)) {
							if ($vendor_name == "Samsel Publications") echo 'selected';
						} ?>>Samsel Publications</option>
	<option value="Sunshine Publication" <?php if (isset($vendor_name)) {
							if ($vendor_name == "Sunshine Publication") echo 'selected';
						} ?>>Sunshine Publication</option>
	<option value="Tamilnadu Text Book" <?php if (isset($vendor_name)) {
											if ($vendor_name == "Tamilnadu Text Book") echo 'selected';
										} ?>>Tamilnadu Text Book</option>
</select>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
<div class="form-group">
<label class="label">Bill Number</label>
<input type="text" name="bill_number" id="bill_number" class="form-control" value='' placeholder="Enter Bill Number">

</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
<div class="form-group">
<label class="label">Bill Date</label>
<div class="custom-date-input">	
<input type="text" readonly tabindex="20"  name="bill_date" id="bill_date" value="<?php date_default_timezone_set('Asia/Kolkata');  echo date('d-m-Y'); ?>"  class="form-control">
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
				<th>Rate*</th>
				<th>Value</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<span style="color:green;font-weight: bold;">* Press enter on rate to add another item
	</span>
	<br /><br /><br />
	<div class="row">
	<div class="col-md-2">
	<label class="label">Sub Quantity</label>
	<div class="form-group">
	<input type="number" name="sub_quantity" id="sub_quantity" readonly class="form-control" tabindex="19">
	</div>
	</div>
	
	<div class="col-md-2">
	<label class="label">Total Unit Amount</label>
	<div class="form-group">
	<input type="number"   name="unit_amount" id="unit_amount" readonly class="form-control" tabindex="20">
	</div>
	</div>

	<div class="col-md-2">
	<label class="label">Total Value</label>
	<div class="form-group">
	<input type="number"   name="total_amount" id="total_amount" readonly class="form-control" tabindex="21">
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