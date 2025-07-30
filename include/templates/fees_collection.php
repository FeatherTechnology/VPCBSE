<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
    $academic_year = $_SESSION["academic_year"];
}

$StudentList = $userObj->getStudentList($mysqli, $school_id, $year_id);
?>
<style>
    * {
        box-sizing: border-box;
    }

    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .column {
        float: left;
        /* width: 30%; */
        padding-left: 105px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td input {
        border: none;
    }

    .responsive-table {
        width: 100%;
        border-collapse: collapse;
    }

    .responsive-table th,
    .responsive-table td {
        padding: 8px;
        border: 1px solid #ccc;
    }
</style>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Fees Collection </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="fees_collection_form" name="fees_collection_form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" value="<?php if (isset($fees_id)) echo $fees_id; ?>" id="id" name="id">
        <input type="hidden" class="form-control" name="admission_form_id" id="admission_form_id" value="<?php if(isset($_GET['studid'])) echo $_GET['studid']; ?>" >
        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- Fee collection data From ASP.NET to PHP  Bulk UPload START-->
                <!-- <div class="card">
                    <div class="card-header">
                        <div class="card-title">Bulk Import From ASP.NET to PHP<i class="icon-stars"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8"> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <button type="button" class="btn btn-primary" name="studentBulkDownload" id="studentBulkDownload" ><span class="icon-download"></span>Download</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentBulkUploadModal"><span class="icon-upload"></span>Upload</button>

                                        
                                        <div class="modal fade" id="studentBulkUploadModal" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="background-color: white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="vCenterModalTitle">ASP.NET to PHP Excel Upload</h5>
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
                                                                        <input type="file" name="stundentExcelfile" id="stundentExcelfile" class="form-control" >
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
                </div>  -->
                <!-- Fee collection data From ASP.NET to PHP  Bulk UPload END-->
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <!--Fields -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Medium</label>
                                            <select class="form-control select2" id="medium" name="medium">
                                                <option value="0">Select Medium</option>
                                                <option value="1" <?php if (isset($medium)) { if ($medium == "1") echo 'selected'; } ?>>Tamil</option>
                                                <option value="2" <?php if (isset($medium)) { if ($medium == "2") echo 'selected'; } ?>>English</option>
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
                                            <select class="form-control select2" id="student_id" name="student_id"> <!--onchange="paidFees()" -->
                                                <option value="0">Select a Student...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12"></div>

                                    <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    
                                    </div>
                                </div>   -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label style="display: block; text-align: center;"><b>OR</b></label>
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="form-control select2" id="student_name1" name="student_name1"> <!--onchange="paidFees()" -->
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
                                            <!-- <span id="studentstypeCheck" class="text-danger">Please Select Student Type</span>  if (isset($_GET['st'])) {  $dynamic_id = $_GET['st']; }  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <!--Fields -->
                            <div class="col-md-12">
                                <div id="feesCollectionDetailsDiv" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- column -->
                                            <div class="" style="overflow-x: auto;">
                                                <input type="hidden" id="getStudID" value='0'>
                                                <label>Click Here</label>&nbsp;
                                                    <button name="student_pay_fees" id="student_pay_fees" type="button" class="btn btn-primary" onclick="payFees()">
                                                        <span class="icon-keyboard_tab"></span>&nbsp;Pay Fees
                                                    </button>
                                                <br><br>
                                                <table class="responsive-table">
                                                    <tr style="border: 1px solid white;">
                                                        <th colspan="3" style="text-align:center">Student Details</th>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid white;">Admission No</td>
                                                        <td style="background-color: #2d5a7f6e;"><input type="text" style="background-color: transparent;color:#f6f8fa;" id="admission_number"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid white;">Roll Number</td>
                                                        <td style="background-color: #2d5a7f6e;"><input type="text" style="background-color: transparent;color:#f6f8fa;" id="roll_number"></td>
                                                    </tr>
                                                    <tr style="border-right: 1px solid white;">
                                                        <td style="border: 1px solid white;">Class-Section</td>
                                                        <td style="background-color: #2d5a7f6e;"><input type="text" style="background-color: transparent;color:#f6f8fa;" id="cls_section"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid white;">Student Name</td>
                                                        <td style="background-color: #2d5a7f6e;"><input type="text" style="background-color: transparent;color:#f6f8fa;" id="student_name"></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-xl-1 col-lg-4 col-md-6 col-sm-6 col-12"></div>
                                            <div class="" style="overflow-x: auto;">
                                                <label>Click Here</label>&nbsp;<a onclick="payTrasportFees();"><button type="button" class="btn btn-primary"><span class="icon-keyboard_tab"></span>&nbsp;Pay Transport Fees</button></a>
                                                &nbsp;<a onclick="payLastYearFees()"><button type="button" class="btn btn-primary"><span class="icon-keyboard_tab"></span>&nbsp;Pay Last Year Fees</button></a>
                                                <table style="border-bottom: 1px solid #5090c070;" class="responsive-table">
                                                    <tr>
                                                        <img style="visibility:hidden" src="img/Logo.png" height="50px" width="50px" alt="testing">
                                                        <th style="border-right: 1px solid white;">Fees Details</th>
                                                        <th style="border-right: 1px solid white;">Group Fees</th>
                                                        <th style="border-right: 1px solid white;">Extra Curricular Fees</th>
                                                        <th style="border-right: 1px solid white;">Amenity Fees</th>
                                                        <th style="border-right: 1px solid white;">Transport Fees</th>
                                                        <th>Last Year Fees</th>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid #5090c070;">Gross Payable</td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="grp_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="extra_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="amenity_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="tranport_grp_amount" value="0"></td>
                                                        <td style=" border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="last_year_amount" value="0"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid #5090c070;">Amount Paid</td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;" type="number" readonly id="paid_grp_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;" type="number" readonly id="paid_extra_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;" type="number" readonly id="paid_amenity_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;" type="number" readonly id="paid_tranport_amount" value="0"></td>
                                                        <td style=" border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;" type="number" readonly id="paid_last_year_amount" value="0"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid #5090c070;">Concession</td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="grp_concession_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="extra_concession_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="amenity_concession_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2;" type="number" readonly id="tranport_concession_amount" value="0"></td>
                                                        <td style=" border-right: 1px solid #5090c070;"><input style="background-color:#f2f2f2; " type="number" readonly id="last_year_concession_amount" value="0"></td>
                                                    </tr>
                                                    <tr style="border: 1px solid white;">
                                                        <td style="border-right: 1px solid #5090c070;font-style: italic;font-weight: bold;">Net Payable</td>
                                                        <td style="border-right: 1px solid #5090c070; border-bottom: 1px solid #5090c070;"><input style="background-color:#f6f8fa;font-style: italic;font-weight: bold;" type="number" readonly id="gross_balance_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070; border-bottom: 1px solid #5090c070;"><input style="background-color:#f6f8fa;font-style: italic;font-weight: bold;" type="number" readonly id="extra_balance_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070; border-bottom: 1px solid #5090c070;"><input style="background-color:#f6f8fa;font-style: italic;font-weight: bold;" type="number" readonly id="amenity_balance_amount" value="0"></td>
                                                        <td style="border-right: 1px solid #5090c070; border-bottom: 1px solid #5090c070;"><input style="background-color:#f6f8fa;font-style: italic;font-weight: bold;" type="number" readonly id="tranport_balance_amount" value="0"></td>
                                                        <td style=" border-bottom: 1px solid #5090c070; border-right: 1px solid #5090c070;"><input style="background-color:#f6f8fa;font-style: italic;font-weight: bold;" type="number" readonly id="last_year_balance_amount" value="0"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div id="paid_fees_details"></div>
                                </div><br><br>
                            </div>
                        </div>
                    </div>
    </form>
    <div id="poprintfield" style="display: none"></div>