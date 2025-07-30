<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 
// $SubjectList = $userObj->getSubjectDetails($mysqli);

$id=0;
 if(isset($_POST['submittrust_creation']) && $_POST['submittrust_creation'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
    $updateTrustCreationmaster = $userObj->updateTrustCreation($mysqli,$id,$userid);  
    ?>
   <script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=2';</script> 
    <?php	}
    else{   
		$addTrustCreation = $userObj->addTrustCreation($mysqli,$userid);   
        ?>
     <script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=1';</script>
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
	$deleteTrustCreation = $userObj->deleteTrustCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>edit_trust_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getTrustCreation = $userObj->getTrustCreation($mysqli,$idupd); 
	
	if (sizeof($getTrustCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getTrustCreation);$ibranch++)  {	
            $trust_id                      = $getTrustCreation['trust_id'];
			$trust_name                	 = $getTrustCreation['trust_name'];
			$school_login_name          		     = $getTrustCreation['school_login_name'];
			$contact_number      			     = $getTrustCreation['contact_number'];
			$address1		         = $getTrustCreation['address1'];
			$address2    			         = $getTrustCreation['address2'];
			$address3                	 = $getTrustCreation['address3'];
            $district                   = $getTrustCreation['district'];
			$pincode       		     = $getTrustCreation['pincode'];
			$email_id     			     = $getTrustCreation['email_id'];
			$website     		             = $getTrustCreation['website'];
			$pan_number     			     = $getTrustCreation['pan_number'];
			$tan_number                      = $getTrustCreation['tan_number'];
            $trust_logo                      = $getTrustCreation['trust_logo']; 
            
		}
	}
}
?>
<style>

    .dataTables_length {
        display: none;
    }
    .dataTables_filter {
        display: none;
    }
    /* .dataTables_info {
        display: none;
    } */
    /* .dataTables_paginate {
        display: none;
    } */
    div.dt-buttons {
    position: relative;
    float: right;
}
</style>
<!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">SM - Syllabus Report List </li>
        </ol>
    </div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($school_id)) echo $school_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                    	 <div class="row ">
                            <!--Fields -->
                           <div class="col-md-12 "> 
                              <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control select2" id="class_id" name="class_id">
                                        <option>Select</option> 
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary" id="table_view" name="table_view" style="margin-top:20px;" value="View List"> 
                                             <!-- <span class="text-danger" id="email_idcheck">Enter Valid E-mail Id</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div id="allocationReport" style="display: none;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">SM - Syllabus List </li>
                    </ol> 
                    <div class="card">
                        <div class="card-body">
                            <div id="updatedstockinfotable"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>