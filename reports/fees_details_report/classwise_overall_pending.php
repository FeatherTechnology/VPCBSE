<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Class-wise Overall Pending Report </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="clswise_overall_pending_fee_form" name="clswise_overall_pending_fee_form" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Academic Year</label>
                            <select type="text" class="form-control" id="academic_year" name="academic_year" tabindex="1">
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Medium</label>
                            <select class="form-control" id="medium" name="medium" tabindex="2">
                                <option value="0">Select Medium</option>
                                <option value="1" <?php if (isset($medium)) { if ($medium == "1") echo 'selected'; } ?>>Tamil</option>
                                <option value="2" <?php if (isset($medium)) { if ($medium == "2") echo 'selected'; } ?>>English</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"></div>
                    
                    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Student Type</label>
                            <select class="form-control" id="student_type" name="student_type" tabindex="4">
                                <option value="0">Select Option</option>
                                <option value="1">New Student</option>
                                <option value="2">Old Student</option>
                                <option value="3">Vijayadashami</option>
                                <option value="4">All</option>
                            </select>
                        </div>
                    </div> -->
                    <br><br><br><br><br><br>

                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="button" name="classwise_overall_pending_list" id="classwise_overall_pending_list" class="btn btn-primary" value="View" tabindex="5">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card" id="listCard" style="display: none;">
            <div class="card-body">
                <div id="showclsOverallPendingList"></div>
            </div>
        </div>
    </form>
</div>