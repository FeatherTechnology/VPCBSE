<?php
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id =$_SESSION["school_id"];
    $log_year    = $_SESSION["academic_year"];
}

if(isset($_POST['submit_staff_general_message']) && $_POST['submit_staff_general_message'] !=''){
    $userObj -> addStaffGeneralMessage($mysqli, $userid, $school_id, $log_year);
?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_staff_general_message&msc=1';</script>
<?php } ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Staff General Message Details</li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
<!--form start-->
<form name="generalMessage" method="post" enctype="multipart/form-data"> 
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
<!-- Row start -->
    <div class="row gutters">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                            <div class="form-group">
                                <span class="required">*Note: Please edit comments only the "{#var#}" and within 30 character. If not, The SMS will be not send. </span>
                            </div>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Select Staff Designation and Send SMS:</label>
                            </div>
                        </div>

                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="selectAll" id="selectAll" value="0">
                                    <label class="form-check-label" for="selectAll">Select All</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input staffchkbx" type="checkbox" name="teaching" id="teaching" value="Teaching">
                                    <label class="form-check-label" for="teaching">Teaching</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input staffchkbx" type="checkbox" name="nonteaching" id="nonteaching" value="Non-Teaching">
                                    <label class="form-check-label" for="nonteaching">Non Teaching</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input staffchkbx" type="checkbox" name="driver" id="driver" value="Driver">
                                    <label class="form-check-label" for="driver">Driver</label>
                                </div>

                                <input type="hidden" name="selectedValues" id="selectedValues"> <!-- Here store select checkbox value in hidden field -->
                                <input type="hidden" name="selectedContanctNo" id="selectedContanctNo"> 
                            </div>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Template Type</label>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
                            <div class="form-group">
                                <select  class="form-control" name="templatetype" id="templatetype"></select>
                            </div>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Comments</label>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="general_comment" id="general_comment"></textarea>
                            </div>
                        </div>

                        <!-- <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Comments Char Count</label>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="char_count" id="char_count" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="sms_count" id="sms_count" readonly>
                            </div>
                        </div> -->

                    </div>
                </div>
                            
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="submit" id="submit_staff_general_message" name="submit_staff_general_message" value="Send SMS" class="btn btn-primary">Send SMS</button><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- Main container end -->