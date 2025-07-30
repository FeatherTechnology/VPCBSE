<?php
if(isset($_POST['submit_general_message']) && $_POST['submit_general_message'] !=''){
    $get_response = $userObj -> addGeneralMessage();
    $responseData = json_decode($get_response, true); // Decode the JSON response
    if ($responseData && isset($responseData['status']) && $responseData['status'] == 200) {
        // SMS sent successfully
        $response_sts = 1;
    } else {
        // Error occurred or SMS not sent
        $response_sts = 0;
    }
?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_general_message&msc=<?php echo $response_sts; ?>';</script>
<?php } ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Student General Message Details</li>
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
                                <label>Select Student Standards and Send SMS:</label>
                            </div>
                        </div>

                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-12">
                            <div class="form-group" style="display: flex !important; justify-content: space-evenly !important; align-items: center !important;">
                                <input type="checkbox" name="selectAll" id="selectAll" value="0"> Select All
                                <input type="checkbox" class="stdchkbx" name="prekg" id="prekg" value="1"> Pre K.G
                                <input type="checkbox" class="stdchkbx" name="lkg" id="lkg" value="2"> L.K.G
                                <input type="checkbox" class="stdchkbx" name="ukg" id="ukg" value="3"> U.K.G
                                <input type="checkbox" class="stdchkbx" name="first" id="first" value="4"> 1
                                <input type="checkbox" class="stdchkbx" name="second" id="second" value="5"> 2
                                <input type="checkbox" class="stdchkbx" name="third" id="third" value="6"> 3
                                <input type="checkbox" class="stdchkbx" name="fourth" id="fourth" value="7"> 4
                                <input type="checkbox" class="stdchkbx" name="fifth" id="fifth" value="8"> 5
                                <input type="checkbox" class="stdchkbx" name="sixth" id="sixth" value="9"> 6
                                <input type="checkbox" class="stdchkbx" name="seventh" id="seventh" value="10"> 7
                                <input type="checkbox" class="stdchkbx" name="eighth" id="eighth" value="11"> 8
                                <input type="checkbox" class="stdchkbx" name="ninth" id="ninth" value="12"> 9
                                <input type="checkbox" class="stdchkbx" name="tenth" id="tenth" value="13"> 10
                                <input type="checkbox" class="stdchkbx" name="eleventh" id="eleventh" value="14"> 11
                                <input type="checkbox" class="stdchkbx" name="twelveth" id="twelveth" value="19"> 12

                                <input type="hidden" name="selectedValues" id="selectedValues"><!--Here store select checkbox value in hidden field--->
                                <input type="hidden" name="selectedStudContanctNo" id="selectedStudContanctNo"> 
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
                        <button type="submit" id="submit_general_message" name="submit_general_message" value="Send SMS" class="btn btn-primary">Send SMS</button><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- Main container end -->