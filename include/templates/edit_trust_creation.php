<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id= $_SESSION["school_id"];
    $academic_year= $_SESSION["academic_year"];
} 
?>
<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Trust List</li>
	</ol>
<?php
//school_id=$school_id AND
$query = "SELECT * FROM trust_creation WHERE status = 0";
$statement = $mysqli->prepare($query);

$statement->execute();
$result = $statement->get_result();

$rowCount = $result->num_rows;
if($rowCount  <= 0){ ?>
	<a href="trust_creation" id ="tabtrust">
	<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp Add Trust</button>
	</a>
<?php } ?>
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
						<div class="alert-text">Trust Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Trust Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Trust Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="trustCreation_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Trust Name</th>
								<th>Contact Person</th>
								<th>Contact Number</th>
								<th>Address 1</th>
								<th>Place</th>
								<th>Pincode</th>
								<th>E-Mail Id</th>
								<th>Website</th>
								<th>PAN No</th>
								<th>TAN No</th>
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

	

