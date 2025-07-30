<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Register of Admission Report </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="register_of_admission" name="register_of_admission" method="post" enctype="multipart/form-data">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Medium</label>
                                    <select class="form-control" id="medium" name="medium" tabindex="1">
                                        <option value="0">Select Medium</option>
                                        <option value="1" <?php if (isset($medium)) { if ($medium == "1") echo 'selected'; } ?>>Tamil</option>
                                        <option value="2" <?php if (isset($medium)) { if ($medium == "2") echo 'selected'; } ?>>English</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Standard List</label>
                                    <select class="form-control" id="standard" name="standard" tabindex="2">
                                        <option value="0">Select a Standard...</option>
                                    </select>
                                </div>
                            </div><br><br><br><br><br><br>

                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="button" name="admission_table_view" id="admission_table_view" class="btn btn-primary" value="View" tabindex="3">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="listCard" style="display: none;">
            <div class="card-body">
                <div id="showAdmissionRegister"></div>
            </div>
        </div>
    </form>
</div>