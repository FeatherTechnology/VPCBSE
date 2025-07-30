<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
}

if (isset($_GET['typeid'])) {
    $typeid = $_GET['typeid'];
}

$StudentList = $userObj->getStudentList($mysqli, $school_id, $year_id);

if (isset($_POST['SubmitFeesConcession'])) {
    $updateConcessionmaster = $userObj->addFeesConcession($mysqli, $userid, $school_id, $year_id);
?>
    <script>
        alert("Concession Updated Successfully");
        location.href = '<?php echo $HOSTPATH; ?>fees_concession';
    </script>

<?php  } ?>
<style>
    .radiobtncls {
        display: flex;
        align-items: flex-start;
    }

    .dataTables_filter input {
        border: 1px solid #e4e4e4;
        padding: 7px;
    }

    .select2-container .select2-selection--single {
        height: 34px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
    }

    .select2 {
        width: 377%;
    }
</style>
<!-- <link rel="stylesheet" href="css/select2.min.css" /> -->
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Overall Concession Screen </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="fees_concession_form" name="fees_concession_form" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php if (isset($school_id)) echo $school_id; ?>" id="id" name="id">
        <input type="hidden" value="<?php if (isset($typeid)) echo $typeid; ?>" id="typeid" name="typeid">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group radiobtncls">
                                            <input type="radio" tabindex="1" class="general" name="concessiontype" id="concession_type" value="GeneralConcession"> &nbsp;&nbsp; <label for="general_concession">General Concession </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="2" class="referral" name="concessiontype" id="concession_type" value="ReferalConcession"> &nbsp;&nbsp; <label for="referal_concession">Referal Concession </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" tabindex="3" name="concessiontype" id="concession_type" value="ManualConcession"> &nbsp;&nbsp; <label for="manual_concession">Manual Concession </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row END-->

        <!-- General concession details START-->
        <!-- card start -->
        <div class="card" id="generalconcessionDiv" style="display:none;">
            <div class="card-header">
                <div class="card-title">General Concession Form</div>
            </div>
            <div class="card-body">
                <div id="general_concession"> </div>
            </div>
        </div>
        <!-- card END-->
        <!-- General concession details END-->

        <!-- Referral concession details START-->
        <!-- card start -->
        <div class="card" id="referralconcessionDiv" style="display:none;">
            <div class="card-header">
                <div class="card-title">Referral Concession Form</div>
            </div>
            <div class="card-body">
                <div id="referral_concession"> </div>
            </div>
        </div>
        <!-- card END-->
        <!-- Referral concession details END-->

        <!-- Manual concession fees details START-->
        <div id="manualconcessionDiv" style="display:none">
            <!-- card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Manual Concession Form</div>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <!--Fields -->
                        <div class="col-md-12 ">
                            <div class="row">

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control select2" id="medium" name="medium">
                                            <option value="0">Select Medium</option>
                                            <option value="1" <?php if (isset($medium)) {
                                                                    if ($medium == "1") echo 'selected';
                                                                } ?>>Tamil</option>
                                            <option value="2" <?php if (isset($medium)) {
                                                                    if ($medium == "2") echo 'selected';
                                                                } ?>>English</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control select2" id="standard" name="standard">
                                            <option value="0">Select a Standard...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Section</label>
                                        <select class="form-control select2" id="section" name="section">
                                            <option value="0">Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Select Students</label>
                                        <select class="form-control select2" id="student_id" name="student_id">
                                            <option value="0">Select a Student...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12"></div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label style="display: block; text-align: center;"><b>OR</b></label>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="form-control select2" id="student_name1" name="student_name1">
                                            <option value="0">Select a Student...</option>
                                            <?php
                                            if (sizeof($StudentList) > 0) {
                                                for ($j = 0; $j < count($StudentList); $j++) {
                                                    $selected = "";
                                                    if (isset($student_id) && $StudentList[$j]['student_id'] == $student_id || isset($_GET['st']) && $StudentList[$j]['student_id'] == $_GET['st']) {
                                                        $selected = "selected";
                                                    }
                                            ?>
                                                    <option value="<?php echo $StudentList[$j]['student_id']; ?>" <?php echo $selected; ?>>
                                                        <?php echo $StudentList[$j]['student_name'] . '-' . $StudentList[$j]['admission_number']; ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card END-->

            <div class="card">
                <div class="card-body">
                    <div id="showManualConcessionSTUDDetails"></div>
                </div>
            </div>
        </div>
        <!-- Manual concession fees details END-->

</div>
</form>
</div>

<form method="post" action="fees_concession">
    <div class="modal fade addGeneralConcession" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: white">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Concession Approval Screen</h5>
                    <button type="button" class="close" id="temp_no_empty" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="divtitle"> </h5>
                    <div id="showGeneralConcessionDiv"> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>