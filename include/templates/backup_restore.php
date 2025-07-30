<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 

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
<style>.select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<link rel="stylesheet" href="css/select2.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Backup and Restore </li>
    </ol>

    <a href="edit_school_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
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
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="backup_date" id="backup_date">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                    </div>
                                </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <input style="margin-top:20px;" type="button" name="table_view" id="table_view" class="btn btn-primary" value="Save" tabindex="14">

                                        </div>
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
<!-- </div>   -->
<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Database List</li>
	</ol>
	<!-- <a href="school_creation">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp Add School</button>
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
						<div class="alert-text">School Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">School Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">School Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Title</th>
								<th>Date</th>
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

	


<script>
    var loadFile = function(event) {
        var image = document.getElementById("viewimage");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    $('.select2').select2();
</script>

