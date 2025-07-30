<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
}
?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Syllabus Master </li>
    </ol>
    <button class="btn btn-primary" id="backbtnid" style="display: none;"><span class="icon-arrow-left"></span>&nbsp; Back</button>
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
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Select standard</label>
                                            <select class="form-control select2" id="class_id" name="class_id">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary" id="table_view" name="table_view" style="margin-top:20px;" value="View">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="subjectDetailsdiv" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Subject Details</div>
                        </div>
                        <div class="card-body">
                            <!-- alert messages -->
                            <div id="subject_detailsInsertNotOk" class="unsuccessalert">Subject Details Already Exists, Please Enter a Different Name!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                            </div>

                            <div id="subject_detailsInsertOk" class="successalert">Subject Details Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                            </div>

                            <div id="subject_detailsUpdateOk" class="successalert">Subject Details Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                            </div>

                            <div id="subject_detailsDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Subject Details!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                            </div>

                            <div id="subject_detailsDeleteOk" class="successalert">Subject Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Paper Name</label>
                                        <input name="paper_name" id="paper_name" placeholder="Paper Name" value="" class="form-control" type="text">
                                        <input type="hidden" class="form-control" id="subject_id" name="subject_id">
                                        <span class="text-danger" id="papernameCheck" style="display: none;">Enter Subject Name</span>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Max Mark</label>
                                        <input name="max_mark" id="max_mark" placeholder="Max Mark" value="" class="form-control" type="number">
                                        <input name="insert_login_id" id="insert_login_id" class="form-control" value="<?php if (isset($userid)) echo $userid; ?>" type="hidden">
                                        <span class="text-danger" id="max_markCheck" style="display: none;">Enter Mark</span>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <button style="margin-top:20px;" type="button" name="ajaxAllocationBtn" id="ajaxAllocationBtn" class="btn btn-primary" value="submit" tabindex="10">Save</button>
                                    </div>
                                </div>
                            </div>

                            <div id="subjectTableDiv"> </div>
                        </div> <!-- card body END -->
                    </div> <!--card END -->
                </div>

            </div>
        </div>
    </form>
</div>