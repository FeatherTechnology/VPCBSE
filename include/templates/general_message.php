<?php 
$id=0;
if(isset($_POST['submitcustomer']))
{
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
        $updatecustomer = $userObj->updatecustomer($mysqli, $id);  
        ?>
        <script>location.href='<?php echo $HOSTPATH;  ?>editcustomer&msc=2';</script> 
    <?php }
    else{
        $addcustomer = $userObj->addcustomer($mysqli);   
        ?>
        <script>location.href='<?php echo $HOSTPATH;  ?>editcustomer&msc=1';</script> 
        <?php
    }
}  
 
$del=0;
if(isset($_GET['del']))
{
    $del=$_GET['del'];
}
if($del>0)
{
	$deletecustomer = $userObj->deletecustomer($mysqli,$del); 
	?>
	<script>location.href='<?php echo $HOSTPATH;  ?>editcustomer&msc=3';</script>
    <?php	
}

$cancel_upd=0;
if(isset($_GET['cancel_upd']))
{
    $cancel_upd=$_GET['cancel_upd'];
}
if($cancel_upd>0)
{
	$cancel_updetecustomer = $userObj->cancel_updetecustomer($mysqli,$cancel_upd); 
	?>
	<script>location.href='<?php echo $HOSTPATH;  ?>editcustomer&msc=2';</script>
    <?php	
}

if(isset($_GET['upd']))
{
    $idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getcustomer = $userObj->getcustomer($mysqli,$idupd); 
	
	if (sizeof($getcustomer)>0) {
        for($icustomer=0;$icustomer<sizeof($getcustomer);$icustomer++)  {

            $customer_id            = $getcustomer['customer_id'];
            $customer_sno           = $getcustomer['customer_sno'];
            $vendor_name            = $getcustomer['vendor_name'];
            $pbl_no                 = $getcustomer['pbl_no'];
            $customer_name          = $getcustomer['customer_name'];
            $alias_name             = $getcustomer['alias_name'];
            $flat_no                = $getcustomer['flat_no'];
            $street                 = $getcustomer['street'];
            $line_1                 = $getcustomer['line_1'];
            $line_2                 = $getcustomer['line_2'];
            $city                   = $getcustomer['city'];
            $state                  = $getcustomer['state'];
            $pincode                = $getcustomer['pincode'];
            $contact_no             = $getcustomer['contact_no'];

            $sno                   = $getcustomer['sno'];
            $customer_ref_id       = $getcustomer['customer_ref_id'];
            $item_name             = $getcustomer['item_name']; 
            $bill_no               = $getcustomer['bill_no'];
            $system_no             = $getcustomer['system_no'];
            $serial_no             = $getcustomer['serial_no']; 
            $gross_weight          = $getcustomer['gross_weight'];
            $net_weight            = $getcustomer['net_weight'];
            $loan_date             = $getcustomer['loan_date'];
            $value_of_garment      = $getcustomer['loan_amount'];
            $has_on_date_value     = $getcustomer['has_on_date_value'];
            $status                = $getcustomer['status'];
		}
	}
} 

if(isset($_GET['rem']))
{
    $idrem=$_GET['rem'];
}

if($idrem > 0){	
    $removecustomer = $userObj->removecustomer($mysqli, $idrem);  
    ?>
    <script>location.href='<?php echo $HOSTPATH;  ?>editcustomer&msc=2';</script> 
    <?php
}


?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">GSM - General Message </li>
    </ol>

    <a href="editcustomer">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<form action="" method="post" name="vendorcreation" id="vendorcreation" >
		<div class="row gutters">
		<!-- General Info -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
                    <div class="card-header">
                        <!-- <div class="card-header">General Info</div> -->
					</div>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php if(isset($customer_id)) echo $customer_id; ?>">
					<div class="card-body row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
							<div class="form-group">
								<label class="label">Comments</label>
                                <textarea tabindex="1" id="comments" name="comments" class="form-control" placeholder="Enter Comments" rows="4" cols="50"></textarea>
                            </div>
						</div> 

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"></div>

                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="disabledInput">Comments Char Count</label>
                                <input type="text" readonly id="comments_char_count" name="comments_char_count" class="form-control"  value="<?php if(isset($comments_char_count)) echo $comments_char_count; ?>">
                                <!-- <span id="employeenamecheck" class="text-danger" >Enter Employee Name</span> -->
                            </div>
                        </div>
				    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <div class="text-right">
                            <div>
                                <button type="submit" tabindex="2" name="submitcustomer" id="submitcustomer" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" tabindex="3" class="btn btn-outline-secondary">Cancel</button> 
                            </div> <br><br>
                        </div>
                    </div>

			    </div>
		    </div>
		</div>
	</form>
</div>
