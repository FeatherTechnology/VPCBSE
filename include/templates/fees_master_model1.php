<!--- 1= Tamil, 2= English, 1 = New Student, 2 = Old Student -->
<?php
// $FeesList = $userObj->getFeesMasterModel1Details($mysqli);
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Fees Master </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--------form start-->
    <form id="school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data">
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
                                            <label>Academic Year</label>
                                            <select tabindex="1" type="text" class="form-control select2 freezeFieldAfterClick" id="academic_year" name="academic_year">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Medium</label>
                                            <select class="form-control select2 freezeFieldAfterClick" id="medium" name="medium" tabindex="2"> <!--- 1= Tamil, 2= English -->
                                                <option>Select Medium</option>
                                                <option value="1">Tamil</option>
                                                <option value="2">English</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Students Type</label>
                                            <select class="form-control select2 freezeFieldAfterClick" id="student_type" name="student_type" tabindex="3"> <!--1 = New Student, 2 = Old Student, 3 = Vijayadashami, 4 = All -->
                                                <option value=''>Select Type</option>
                                                <option value="1">New Student</option>
                                                <option value="2">Old Student</option>
                                                <option value="3">Vijayadashami</option>
                                                <option value="4">All [NEW & OLD]</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Standard List</label>
                                            <select class="form-control select2 freezeFieldAfterClick" id="standard" name="standard" tabindex="4"> <!--From Ajax file --> </select>
                                        </div>
                                    </div><br><br><br><br><br><br>
                                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <input type="button" name="table_view" id="table_view" class="btn btn-primary table_view" value="View" tabindex="5">
                                            <input type="button" name="table_refresh" id="table_refresh" class="btn btn-danger" value="Refresh" tabindex="6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--- Group/Course Fees STARTS-->
                        <div id="grp_course_fee_Div" style="display: none;">
                            <div class="card">
                                <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                    <div class="card-title">Group/Course Fees</div>
                                </div>
                                <div class="card-body">
                                    <!-- alert messages -->
                                    <div id="fees_detailsInsertNotOk" class="unsuccessalert">Group/Course Fees Already Exists, Please Enter a Different Name!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_details_already_inserted" class="unsuccessalert">Student Type Already Exists
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsInsertOk" class="successalert">Group/Course Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsUpdateOk" class="successalert">Group/Course Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Group/Course Fees!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsInsertFailed" class="unsuccessalert">Group/Course Fees Insert Failed!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsDeleteOk" class="successalert">Group/Course Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Particulars</label>
                                                    <input type="hidden" name="grp_course_id" id="grp_course_id" class="grpTableField">
                                                    <input name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control grpTableField" type="text" tabindex="7">
                                                    <span class="text-danger" id="grp_particularsCheck" style="display: none;">Enter Particulars</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control grpTableField" type="number" tabindex="8">
                                                    <span class="text-danger" id="grp_amountCheck" style="display: none;">Enter Amount</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input name="grp_date" id="grp_date" class="form-control grpTableField" type="date" tabindex="9">
                                                    <span class="text-danger" id="grp_dateCheck" style="display: none;">Enter Due Date</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <button style="margin-top:20px;" type="button" name="Submit_Group" id="Submit_Group" class="btn btn-primary" value="submit" tabindex="10">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="updatedstockinfotable"> </div>
                                </div>
                            </div>
                        </div>
                        <!--- Group/Course Fees END-->
                        <!--- Extra Curricular Activities START-->
                        <div id="extra_curricular_Div" style="display: none;">
                            <div class="card">
                                <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                    <div class="card-title">Extra Curricular Activities</div>
                                </div>
                                <div class="card-body">
                                    <!-- alert messages -->
                                    <div id="fees_detailsextraInsertNotOk" class="unsuccessalert">Extra Curricular Activities Fees Already Exists, Please Enter a Different Name!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_details_already_inserted_extra" class="unsuccessalert">Student Type Already Exists
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsextraInsertOk" class="successalert">Extra Curricular Activities Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsextraUpdateOk" class="successalert">Extra Curricular Activities Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsextraDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Extra Curricular Activities Fees!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsextraInsertFailed" class="unsuccessalert">Extra Curricular Activities Fees Insert Failed!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsextraDeleteOk" class="successalert">Extra Curricular Activities Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                                                <div class="form-group">
                                                    <label>Particulars</label>
                                                    <input type="hidden" name="extra_fee_id" id="extra_fee_id" class="extraCurField">
                                                    <input name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control extraCurField" type="text" tabindex="11">
                                                    <span class="text-danger" id="extra_particularsCheck" style="display: none;">Enter Particulars</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control extraCurField" type="number" tabindex="12">
                                                    <span class="text-danger" id="extra_amountCheck" style="display: none;">Enter Amount</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input name="extra_date" id="extra_date" class="form-control extraCurField" type="date" tabindex="13">
                                                    <span class="text-danger" id="extra_dateCheck" style="display: none;">Enter Date</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select class="form-control extraCurField" name="extra_type" id="extra_type" tabindex="14">
                                                        <option value="">Select Type</option>
                                                        <option value="common">Common</option>
                                                        <option value="standardwise">Standard Wise</option>
                                                    </select>
                                                    <span class="text-danger" id="extra_typeCheck" style="display: none;">Select Type</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <button style="margin-top:20px;" type="button" name="Submit_Extra" id="Submit_Extra" class="btn btn-primary" value="submit" tabindex="15">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="updatedstockinfotableextra"> </div>
                                </div>
                            </div>
                        </div>
                        <!--- Extra Curricular Activities END-->

                        <!--- Amenity Fees START-->
                        <div id="amenity_fee_Div" style="display: none;">
                            <div class="card">
                                <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                    <div class="card-title">Amenity Fees</div>
                                </div>
                                <div class="card-body">
                                    <!-- alert messages -->
                                    <div id="fees_detailsamenityInsertNotOk" class="unsuccessalert">Amenity Fees Already Exists, Please Enter a Different Name!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_details_already_inserted_amenity" class="unsuccessalert">Student Type Already Exists
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsamenityInsertOk" class="successalert">Amenity Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsamenityUpdateOk" class="successalert">Amenity Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsamenityDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Amenity Fees!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsamenityInsertFailed" class="unsuccessalert">Amenity Fees Insert Failed!
                                        <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div id="fees_detailsamenityDeleteOk" class="successalert">Amenity Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Particulars</label>
                                                    <input type="hidden" name="amenity_fee_id" id="amenity_fee_id" class="amenityField">
                                                    <input name="amenity_particulars" id="amenity_particulars" placeholder="Particulars" class="form-control amenityField" type="text" tabindex="16">
                                                    <span class="text-danger" id="amenity_particularsCheck" style="display: none;">Enter Particulars</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input name="amenity_amount" id="amenity_amount" placeholder="Amount" class="form-control amenityField" type="number" tabindex="17">
                                                    <span class="text-danger" id="amenity_amountCheck" style="display: none;">Enter Amount</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input name="amenity_date" id="amenity_date" placeholder="Amount" class="form-control amenityField" type="date" tabindex="18">
                                                    <span class="text-danger" id="amenity_dateCheck" style="display: none;">Enter Date</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <button style="margin-top:20px;" type="button" name="Submit_Amenity" id="Submit_Amenity" class="btn btn-primary" value="submit" tabindex="19">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="updatedstockinfotableamenity"> </div>
                                </div>
                            </div>
                        </div>
                        <!--- Amenity Fees END-->

                    </div> <!-- card body END-->
                </div> <!-- Card END-->

                <!-- Bulk  Upload Documents START -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Bulk Import <i class="icon-stars"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--Fields -->
                            <div class="col-md-8"> 
                                <button  type="button" class="btn btn-primary" name="fees_master_bulk_upload"  id="fees_master_bulk_upload"> <span class="icon-download"></span> Download</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feesMasterBulkUploadModal"><span class="icon-upload"></span>Upload</button>

                                <!-- Modal -->
                                <div class="modal fade" id="feesMasterBulkUploadModal" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="background-color: white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="vCenterModalTitle">Fees Master Excel Upload</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <label for="feestype">Fees Type</label>
                                                                <select class="form-control" name="fees_type" id="fees_type">
                                                                    <option value=''>Select Fees Type</option>
                                                                    <option value='1'>Group Fees</option>
                                                                    <option value='2'>Extra Curricular Activities</option>
                                                                    <option value='3'>Amenity Fee</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <div id="insertsuccess" style="color: green; font-weight: bold; display:none;">Excel Data Added Successfully</div>
                                                                <div id="notinsertsuccess" style="color: red; font-weight: bold; display:none;">Problem Importing Excel Data or Duplicate Entry found</div>
                                                                <label class="label">Select Excel</label>
                                                                <input type="file" name="feesMasterExcelfile" id="feesMasterExcelfile" class="form-control" >
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" id="submitfeesMasterBulkUpload" name="submitfeesMasterBulkUpload">Upload</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal END -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bulk  Upload Documents END -->
            </div>
        </div>
    </form>
</div>