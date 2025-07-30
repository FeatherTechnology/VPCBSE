<?php
if(isset($_POST['submit_tamilbirthday_wishes']) && $_POST['submit_tamilbirthday_wishes'] !=''){
    $get_response = $userObj -> addBirthdayWishes();
    $responseData = json_decode($get_response, true); // Decode the JSON response
    if ($responseData && isset($responseData['status']) && $responseData['status'] == 200) {
        // SMS sent successfully
        $response_sts = 1;
    } else {
        // Error occurred or SMS not sent
        $response_sts = 0;
    }
?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_tamil_birthday_wishes&msc=<?php echo $response_sts; ?>';</script>
<?php } ?>

<script src="pramukhime/js/pramukhime.js"></script>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Tamil Birthday Wishes Details</li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
<!--form start-->
<form name="birthdayWishes" method="post" enctype="multipart/form-data"> 
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" name="birthday_comment" id="birthday_comment" readonly></textarea>
                                <input type="hidden" name="birthday_templateid" id="birthday_templateid">
                                <input type="hidden" name="student_mobile_no" id="student_mobile_no">
                                <script language="javascript" type="text/javascript">
                                    pramukhIME.setLanguage("tamil", "pramukhindic"); 
                                    pramukhIME.enable();
                                </script>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Comments Char Count</label>
                                <input type="number" class="form-control" name="char_count" id="char_count" readonly>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label id="sms_count" style="margin-top: 25px; color: red;"></label>
                            </div>
                        </div>
                    </div>
                </div>
                            
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="submit" id="submit_tamilbirthday_wishes" name="submit_tamilbirthday_wishes" value="Send SMS" class="btn btn-primary">Send SMS</button><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Birthday List -->
	<!-- Row start -->
    <form name="birthdayWishes" method="post" enctype="multipart/form-data"> 
	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="table-container">
                <h5>List of Student Celebrating Birthday in Next 7 days</h5>
				<div class="table-responsive">
                <?php
					$mscid=0;
					if(isset($_GET['msc']))
					{
					$mscid=$_GET['msc'];
					if($mscid==1)
					{?>
                    <div class="alert alert-success" role="alert">
						<div class="alert-text">Message Sent Successfully!</div>
					</div> 
					<?php
					}else{?>
                    <div class="alert alert-success" role="alert">
						<div class="alert-text">Message Failed!</div>
					</div>
					<?php
					}
					}
					?>
					<table id="tamil_birthday_details" class="table custom-table">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Birthday Date</th>
								<th>SMS Sent Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="birthday_info">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    </form>
	<!-- Row end -->
</div>
<!-- Main container end -->