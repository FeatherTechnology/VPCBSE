<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id    = $_SESSION["school_id"];
    $log_year    = $_SESSION["academic_year"];
} 

$id=0;
 if(isset($_POST['submit_hoilady_creation']) && $_POST['submit_hoilady_creation'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){		
        $id = $_POST['id']; 	
        $updateHolidayCreationmaster = $userObj->updateHolidayCreation($mysqli,$id,$userid,$school_id,$log_year);  
    ?>
   <script>location.href='<?php echo $HOSTPATH; ?>holiday_creation&msc=2';</script> 
    <?php	}
    else{   
        $addHolidayCreation = $userObj->addHolidayCreation($mysqli,$userid,$school_id,$log_year);   
        ?>
     <script>location.href='<?php echo $HOSTPATH; ?>holiday_creation&msc=1';</script>
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
	$deleteHolidayCreation = $userObj->deleteHolidayCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>holiday_creation&msc=3';</script>
<?php	
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
	$getHolidayCreation = $userObj->getHolidayCreation($mysqli,$idupd); 
	
	if (sizeof($getHolidayCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getHolidayCreation);$ibranch++)  {	
            $holiday_id                      = $getHolidayCreation['holiday_id'];
			$holiday_date                      = $getHolidayCreation['holiday_date'];
            $holiday_name                      = $getHolidayCreation['holiday_name']; 
            $comments                      = $getHolidayCreation['comments']; 
            
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
        <li class="breadcrumb-item">SM - Holiday Information </li>
    </ol>

    <a href="holiday_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				<!-- Page header end -->

				<!-- Main container start -->
<div class="main-container">
<!--------form start-->
    <form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
    <input type="hidden" class="form-control" value="<?php if(isset($holiday_id)) echo $holiday_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                    	 <div class="row ">
                            <!--Fields -->
                           <div class="col-md-12 "> 
                              <div class="row">
                              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Holiday Date</label>
                                        <input type="date" tabindex="1" class="form-control" name="holiday_date" id="holiday_date" value="<?php if(isset($holiday_date)) echo $holiday_date; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Holiday</label>
                                        <input type="text"  tabindex="2" class="form-control" name="holiday_name" id="holiday_name" placeholder="Enter Holiday" value="<?php if(isset($holiday_name)) echo $holiday_name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Comments</label>
                                        <input type="text" class="form-control"  tabindex="3" name="comments" id="comments" placeholder="Enter Comments" value="<?php if(isset($comments)) echo $comments; ?>">

                                    </div>
                                </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <button style="margin-top:20px;" type="submit"  tabindex="4" name="submit_hoilady_creation" id="submit_hoilady_creation" class="btn btn-primary" value="submit">Save</button>

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
		<li class="breadcrumb-item">Holiday List</li>
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
					<table id="holiday_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Holiday Name</th>
								<th>Holiday Date</th>
								<th>Comments</th>
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

