
<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Staff's List</li>
	</ol>
	<a href="staff_creation">
		<button type="button" tabindex="1"  class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Staff</button>
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
						<div class="alert-text">Staff Added Successfully!</div>
					</div> 
					<?php
					}
					if($mscid==2)
					{?>
						<div class="alert alert-success" role="alert">
						<div class="alert-text">Staff Updated Successfully!</div>
					</div>
					<?php
					}
					if($mscid==3)
					{?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Staff Inactive Successfully!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="staff_info" class="table custom-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>First Name</th>
								<th>Last Name</th>
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
<!-- <div class="modal fade noscroll" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
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
					<input type="text" name="rejectponum" id="rejectponum" readonly class="form-control">
					<label>Reason For Rejected Student</label>
					<textarea name="rejectreason" id="rejectreason"  class="form-control" placeholder="Enter Reason"></textarea>
					<span class="text-danger" id="reasoncheck">Enter Reason</span><br />
				</div>
				<div class="modal-footer">
					<button type="button" id='rejectpobtn' name='rejectpobtn' class="btn btn-danger">Reject</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> -->
	<style type="text/css">
		.noscroll::-webkit-scrollbar {
			display: none;
		}
	</style>
<!-- Main container end -->

<!-- <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>

<script src="https://getbootstrap.com/docs/5.0/assets/js/docs.min.js"></script>	 -->

<!-- <script>
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 2000);
</script> -->

