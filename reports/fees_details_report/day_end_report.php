<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Day End Report </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="day_end_report_form" name="day_end_report_form" method="post" enctype="multipart/form-data">
        <!-- card start -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Fee Type</label>
                            <select class="form-control" id="fee_type" name="fee_type" tabindex="1">
                                <option value="0">Select Fee Type</option>
                                <option value="grptable">School</option>
                                <option value="extratable">Extra</option>
                                <option value="amenitytable">Book</option>
                                <option value="lastyear">Lastyear</option>
                                <option value="transport">Transport</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12 single" style="display: none;">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" id="single_date" name="single_date" tabindex="2">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12 multiple" style="display: none;">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" tabindex="3">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-12 multiple" style="display: none;">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" tabindex="4">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12"></div> 
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="radio" name="dateSelect" id="singledate" class="btn btn-primary" value="singledate" tabindex="5">Single Date &nbsp;&nbsp;
                            <input type="radio" name="dateSelect" id="multipledate" class="btn btn-primary" value="multipledate" tabindex="6">Multiple Date
                        </div>
                    </div>
                </div>

                <br><br><br><br><br><br>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12"></div> 
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="button" name="day_end_report_view_btn" id="day_end_report_view_btn" class="btn btn-primary" value="View" tabindex="7">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card END -->

        <div class="card" id="listCard" style="display: none;">
            <div class="card-body">
                <div id="showDayEndReportList"></div>
            </div>
        </div>
    </form>
    <!--form END-->
</div>
<!-- Main container END -->