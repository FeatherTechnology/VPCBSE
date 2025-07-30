<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id =$_SESSION["school_id"];
    $year_id = $_SESSION["year_id"];
    $log_year    = $_SESSION["academic_year"];
}


$id=0;
if(isset($_POST['submitArea']) && $_POST['submitArea'] != '')
{
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $updateAreaCreationmaster = $userObj->updateAreaCreation($mysqli,$id,$userid,$school_id,$log_year);  
    ?>
    <script>location.href='<?php echo $HOSTPATH; ?>area_creation&msc=2';</script> 
    <?php	}
    else{   
		$addAreaCreation = $userObj->addAreaCreation($mysqli,$userid,$school_id,$log_year);   
        ?>
    <script>location.href='<?php echo $HOSTPATH; ?>area_creation&msc=1';</script>
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
	$deleteAreaCreation = $userObj->deleteAreaCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>area_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
$inputField = '';

if($idupd>0)
{
    $school_id = $_SESSION["school_id"];
    $academic_year = $_SESSION["academic_year"];

	$getAreaCreationDetails = $userObj->getAreaCreation($mysqli,$idupd,$school_id,$academic_year);
	if (sizeof($getAreaCreationDetails)>0) {
        for($a=0;$a<sizeof($getAreaCreationDetails);$a++)  {	
            $area_id              = $getAreaCreationDetails[$a]['area_id'];
			$area_name            = $getAreaCreationDetails[$a]['area_name'];
			$no_of_terms          = $getAreaCreationDetails[$a]['no_of_terms'];
            $transport_amount     = $getAreaCreationDetails[$a]['transport_amount'];     
		}
        for ($i = 0; $i < $no_of_terms; $i++) {
            $item      = $getAreaCreationDetails[$i]['particulars'];
            $due       = $getAreaCreationDetails[$i]['due_amount'];
            $due_date  = $getAreaCreationDetails[$i]['due_date'];
                
                $inputField .= '<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"> <input class="form-control" required="required" placeholder="Particulars" type="text" name="item_details[]" value="' . $item . '"> </div></div> <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"> <input class="form-control" placeholder="Amount" type="number" name="due_amount[]" value="' . $due . '" required="required"> </div></div> <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"> <input class="form-control" type="date" name="due_date[]" value="' . $due_date . '" required="required"></div></div> <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"><div class="form-group"></div></div><br><br>';
        }
    }
} 
?>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Area Creation</li>
    </ol>
<?php if(isset($idupd) && $idupd > 0){ ?>
    <a href="area_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
<?php } ?>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($area_id)) echo $area_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
<input type="hidden" class="form-control" value="<?php print_r($_SESSION["school_id"]); ?>"  id="school_id" name="school_id" >
<input type="hidden" class="form-control" value="<?php print_r($_SESSION["year_id"]); ?>"  id="year_id" name="year_id" >
<!-- Row start -->
    <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                            <!--Fields -->
                        <div class="col-md-12"> 
                            <div class="row">

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Area Name</label>
                                        <input type="text" class="form-control" name="area_name" id="area_name" placeholder="Enter Area Name" value="<?php if(isset($area_name)) echo $area_name; ?>">
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Transport Fee Amount (*Annual Fee)</label>
                                        <input type="number" class="form-control" placeholder="Enter Transport Fee Amount" name="transport_amount" id="transport_amount"  value="<?php if(isset($transport_amount)) echo $transport_amount; ?>">
                                    </div>
                                </div>
                            
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="select-number">No of Terms</label>
                                        <select class="form-control" name="no_of_terms" id="no_of_terms">
                                            <option value="0" <?php  if(isset($no_of_terms)) { if($no_of_terms == "0") echo 'selected'; }?>>Select Terms</option>
                                            <option value="1" <?php  if(isset($no_of_terms)) { if($no_of_terms == "1") echo 'selected'; }?>>Monthly</option>
                                            <option value="3" <?php  if(isset($no_of_terms)) { if($no_of_terms == "3") echo 'selected'; }?>>Quarterly</option>
                                            <option value="6" <?php  if(isset($no_of_terms)) { if($no_of_terms == "6") echo 'selected'; }?>>Half Yearly</option>
                                            <option value="12" <?php  if(isset($no_of_terms)) { if($no_of_terms == "12") echo 'selected'; }?>>Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12"> 
                            <!-- <div class="row" > -->
                                <?php if($idupd>0){ ?>
                                <div class="row" id="input-container"><?php echo $inputField; ?></div>
                                <?php }else{?>
                                <div class="row" id="input-container"></div>
                                <?php } ?>
                            <!-- </div>  -->
                        </div> 
                            
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="submit"  tabindex="29"  id="submitArea" name="submitArea" value="Submit" class="btn btn-primary">Submit</button>
                                <button type="reset"  tabindex="30"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>

<!-- Area List -->
<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Area List</li>
	</ol>
	<!-- <a href="area_creation">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Area</button>
	</a> -->
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
						<div class="alert-text">Area Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Area Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Area Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="areaCreation_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Area Name</th>
								<th>Transport Fee Amount</th>
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