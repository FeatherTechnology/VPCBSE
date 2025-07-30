
<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Student's List</li>
	</ol>
	<a href="student_creation">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Student</button>
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
						<div class="alert-text">Students Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Students Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Students Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="student_bonafide_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Student Name</th>
								<th>Standard</th>
								<th>Gender</th>
								<th>Address</th>
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
<!-- Modal -->
<div class="modal fade noscroll" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="basicModalLabel">Reason</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="background-color: white; color:black">
					<label>Student Id</label>
					<input type="text" name="student_id" id="student_id" readonly class="form-control">
					<label>Reason For Rejected Student</label>
					<textarea name="reason" id="reason"  class="form-control" placeholder="Enter Reason"></textarea>
					<span class="text-danger" id="reasonCheck">Enter Reason</span><br />
				</div>
				<div class="modal-footer">
					<button type="submit" id='rejectpobtn' name='rejectpobtn' class="btn btn-danger">Reject</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		.noscroll::-webkit-scrollbar {
			display: none;
		}
	</style>
<!-- Main container end -->

<script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>

<script src="https://getbootstrap.com/docs/5.0/assets/js/docs.min.js"></script>	

