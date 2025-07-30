<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Student's List</li>
	</ol>
	<a href="student_creation">
		<button type="button" tabindex="1" class="btn btn-primary"><span class="icon-add"></span>&nbsp; Add Student</button>
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
					$mscid = 0;
					if (isset($_GET['msc'])) {
						$mscid = $_GET['msc'];
						if ($mscid == 1) { ?>
							<div class="alert alert-success" role="alert">
								<div class="alert-text">Students Added Successfully!</div>
							</div>
						<?php
						}
						if ($mscid == 2) { ?>
							<div class="alert alert-success" role="alert">
								<div class="alert-text">Students Updated Successfully!</div>
							</div>
						<?php
						}
						if ($mscid == 3) { ?>
							<div class="alert alert-danger" role="alert">
								<div class="alert-text">Students Inactive Successfully!</div>
							</div>
						<?php
						}
					}


					$getPayId = 0;
					if (isset($_GET['getPayId'])) {
						$getPayId = $_GET['getPayId'];
						if ($getPayId == 1) {
							$payfeesid = $_GET['payfeesid'];
						?>
							<script>
								setTimeout(() => {
									print_temp_fees(<?php echo $payfeesid; ?>);
								}, 1000);
								// print functionality
								function print_temp_fees(payFeesid) {
									$.ajax({
										url: 'ajaxFiles/pay_fees_print.php',
										cache: false,
										type: 'POST',
										data: {
											'payFeesid': payFeesid
										},
										success: function(html) {
											var printWindow = window.open('', '_blank', 'height=800,width=1200');

											if (printWindow) { // Check if the window is successfully opened
												printWindow.document.write(html);
												printWindow.document.close();
												printWindow.print();
												printWindow.close();
											} else {
												alert('Pop-up blocked. Please allow pop-ups for this site.');
											}
										},
										error: function() {
											alert('Error loading print content.');
										}
									});
								}
							</script>

							<div class="alert alert-success" role="alert">
								<div class="alert-text">Fees Paid Successfully!</div>
							</div>
						<?php
						}
						if ($getPayId == 2) { ?>
							<div class="alert alert-danger" role="alert">
								<div class="alert-text">Fees Pay Failed!</div>
							</div>
					<?php
						}
					}
					?>

					<table id="student_admission_info" class="table custom-table">
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
	<div class="card">
		<div class="card-header">
			<div class="card-title">Bulk Import <i class="icon-stars"></i>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<!--Fields -->
				<div class="col-md-8">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<button type="button" class="btn btn-primary" name="studentBulkDownload" id="studentBulkDownload"><span class="icon-download"></span>Download</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentBulkUploadModal"><span class="icon-upload"></span>Upload</button>

							<!-- Modal -->
							<div class="modal fade" id="studentBulkUploadModal" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content" style="background-color: white">
										<div class="modal-header">
											<h5 class="modal-title" id="vCenterModalTitle">Student Excel Upload</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											<form method="post" enctype="multipart/form-data" name="studnet_form_bulk" id="studnet_form_bulk">
												<div class="row">
													<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12"></div>
													<div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12">
														<div class="form-group">
															<div id="insertsuccess" style="color: green; font-weight: bold;">Excel Data Added Successfully</div>
															<div id="notinsertsuccess" style="color: red; font-weight: bold;">Problem Importing Excel Data or Duplicate Entry found</div>
															<label class="label">Select Excel</label>
															<input type="file" name="stundentExcelfile" id="stundentExcelfile" class="form-control">
														</div>
													</div>
												</div>
											</form>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-primary" id="submitstudentBulkUpload" name="submitstudentBulkUpload">Upload</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Modal -->
<div class="modal fade noscroll" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="basicModalLabel">Reason</h5>
				<button type="button" class="close" data-dismiss="modal" onclick="closeChartsModal()" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="deleted_student__creation" name="deleted_student__creation" action="" method="post" enctype="multipart/form-data">
				<div class="modal-body" style="background-color: white; color:black">
					<label>Student Id</label>
					<input type="text" name="student_id" id="student_id" readonly class="form-control"><br>
					<label>Reason For Rejected Student</label>
					<textarea name="reason" id="reason" class="form-control" placeholder="Enter Reason"></textarea>
					<span class="text-danger" id="reasonCheck">Enter Reason</span><br><br>
					<span class="text-danger" id="pending"></span><br><br>
					<label class="leaving_class">Student Leaving Term</label>
					<div class="form-group leaving_class">
						<select type="text" class="form-control" id="leaving_term" name="leaving_term">
							<option value="">Select Leaving Term</option>
							<option value="1">Early Leaving</option>
							<option value="2">I Term</option>
							<option value="3">II Term</option>
							<option value="4">III Term</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id='rejectpobtn' name='rejectpobtn' class="btn btn-danger rejectpobtn">Reject</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChartsModal()">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Add Attachment Modal -->
<div class="modal fade attachmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="background-color: white">
			<div class="modal-header">
				<h5 class="modal-title" id="myLargeModalLabel">Add Attachment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- alert messages -->
				<div id="attachmentInsertNotOk" class="unsuccessalert">Attachment Already Exists, Please Enter a Different Name!
					<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
				</div>

				<div id="attachmentInsertOk" class="successalert">Attachment Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
				</div>

				<div id="attachmentUpdateOk" class="successalert">Attachment Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
				</div>

				<div id="attachmentDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Attachment!
					<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
				</div>

				<div id="attachmentDeleteOk" class="successalert">Attachment Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
				</div>
				<br />
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="disabledInput">Title</label>&nbsp;&nbsp;
							<input type="hidden" class="form-control" name="admissionno" id="admissionno">
							<input type="hidden" class="form-control" name="studentid" id="studentid">
							<input type="hidden" class="form-control" name="attachment_id" id="attachment_id">
							<input type="text" class="form-control" name="title" id="title">
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
						<div class="form-group">
							<div class="card-title" style="visibility:hidden">Certificate</div>
							<input type="file" class="form-control" name="certificate" id="certificate"><br>

							<a href="" target="_blank" download id="attachedfile"> </a>
							<input type="hidden" name="updatecertificate" id="updatecertificate" value="<?php echo $certificate; ?>">
						</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-4 col-12">
						<label class="label" style="visibility: hidden;">Attachment</label>
						<button type="button" tabindex="2" name="submitAttachmentBtn" id="submitAttachmentBtn" class="btn btn-primary">Submit</button>
					</div>
				</div>
				</br></br>
				<div id="updatedAttachmentTable">
					<table class="table custom-table" id="attachmentTable">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Title</th>
								<th>Attachment</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Add Attachment Modal END -->

<style type="text/css">
	.noscroll::-webkit-scrollbar {
		display: none;
	}
</style>
<!-- Main container end -->