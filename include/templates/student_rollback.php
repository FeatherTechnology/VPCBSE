<div?php
    @session_start();
    if (isset($_SESSION["userid"])) {
    $userid=$_SESSION["userid"];
    }
    ?>
    <style>
        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 0px !important;
        }

        .dataTables_length {
            display: none;
        }

        .dataTables_filter input {
            border: 1px solid #e4e4e4;
            padding: 7px;
        }
    </style>
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">SM -Student RollBack Form </li>
        </ol>
    </div>
    <!-- Page header end -->

    <!-- Main container start -->
    <div class="main-container">
        <!--form start-->
        <form id="student_rollback_form" name="student_rollback_form" action="" method="post" enctype="multipart/form-data">
            <!-- Row start -->
            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row ">
                                <!--Fields -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Standard List</label>
                                                <select class="form-control select2" id="standard" name="standard" tabindex="1">
                                                    <option value="">Select a Standard...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <select class="form-control select2" id="section" name="section" tabindex="2">
                                                    <option>Select Section</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>New Academic Year</label>
                                                <input type='text' class="form-control" id="academic_yr" name="academic_yr" tabindex="3" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 " style="margin-top: 18px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary modalBtnCss" style="width: 75px;" data-toggle="modal" data-target="#add_academic_modal" onclick="getAcademicTable()" tabindex="4"><span class="icon-add"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="student_rollback_info" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Pass / Fail<br><br><input type="checkbox" id="select-all"></th>
                                        <th>Admission No</th>
                                        <th>Name</th>
                                        <th>Standard Name</th>
                                        <th>Section Name</th>
                                        <th>Pass / Fail</th>
                                    </tr>
                                </thead>
                                <tbody id="studentRollBackList">
                                </tbody>
                            </table>
                            <!-- Second Table for Unselected Data -->
                            <table class="table custom-table" id="unselected_table" style="display:none">
                                <thead>
                                    <tr>
                                        <th>Admission No</th>
                                        <th>Name</th>
                                        <th>Standard Name</th>
                                        <th>Section Name</th>
                                    </tr>
                                </thead>
                                <tbody id="unselected_tbody">
                                </tbody>
                            </table>
                            <!-- Unselected data rows will be dynamically populated -->
                        </div>

                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="button" name="submitFailList" id="submitFailList" class="btn btn-danger" value="Submit" tabindex="3">Show Fail List</button>
                                <button type="submit" name="submitschool_creation" id="submitschool_creation" class="btn btn-success" value="Submit" tabindex="4">Submit</button>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--Academic Info Modal-->
    <div class="modal fade" id="add_academic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content" style="background-color: white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Academic Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="1">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="academic_form">
                            <div class="row">
                                <input type="hidden" name="acad_id" id='acad_id'>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="period_from">Period From</label><span class="text-danger">*</span>
                                        <input type="date" class="form-control" name="period_from" id="period_from" tabindex="1">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="period_to">Period To</label><span class="text-danger">*</span>
                                        <input type="date" class="form-control" name="period_to" id="period_to" tabindex="1">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="academic_period">Academic Period</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="academic_period" id="academic_period" tabindex="1" readonly>
                                    </div>
                                </div>

                                <div class="col-12 text-right">
                                    <div class="form-group">
                                        <label for="" style="visibility:hidden"></label><br>
                                        <button name="submit_academic" id="submit_academic" class="btn btn-primary" tabindex="1"><span class="icon-check"></span>&nbsp;Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12 overflow-x-cls" style="width: 100%;">
                            <table id="academic_creation_table" class="custom-table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="10%">S.No.</th>
                                        <th width="30%">Period From</th>
                                        <th width="30%">Period To</th>
                                        <th width="20%">Academic Year</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" tabindex="1">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Academic Modal End-->