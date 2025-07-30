<style>
    .customizeTable{
        display: block !important;
        width: 100% !important;
        overflow-x: auto !important;
    }

    .highlightText{
        font-weight: bold;
    }
</style>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Student Strength -> Caste </li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!--form start-->
    <form id="caste_report_form" name="caste_report_form" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group" style="display: flex !important; justify-content: space-evenly !important; align-items: center !important;">
                            <label>Click and Get Separate Caste Deails:</label>
                            <input type="checkbox" name="BC" id ="BC" value="BC" >BC
                            <input type="checkbox" name="MBC" id ="MBC" value="MBC" >MBC
                            <input type="checkbox" name="SC" id ="SC" value="SC" >SC
                            <input type="checkbox" name="ST" id ="ST" value="ST" >ST
                            <input type="checkbox" name="OBC" id ="OBC" value="OBC" >OBC
                            <input type="checkbox" name="DNC" id ="DNC" value="DNC" >DNC
                            <input type="checkbox" name="BCM" id ="BCM" value="BCM" >BCM
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="customizeTable">
                    <table class="table table-bordered table-striped" id="getStdCasteReport">
                        <thead>
                            <tr>
                                <th rowspan="3" style="vertical-align: top;">Standard</th>
                                <th rowspan="3" style="vertical-align: top;">Total No of Student</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidebc">Total No of BC</th>
                                <th colspan="6" class="hidebc">BC</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidembc">Total No of MBC</th>
                                <th colspan="6" class="hidembc">MBC</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidesc">Total No of SC</th>
                                <th colspan="6" class="hidesc">SC</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidest">Total No of ST</th>
                                <th colspan="6" class="hidest">ST</th>
                                <th rowspan="3" style="vertical-align: top;" class="hideobc">Total No of OBC</th>
                                <th colspan="6" class="hideobc">OBC</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidednc">Total No of DNC</th>
                                <th colspan="6" class="hidednc">DNC</th>
                                <th rowspan="3" style="vertical-align: top;" class="hidebcm">Total No of BCM</th>
                                <th colspan="2" class="hidebcm">BCM</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="hidebc">Hindu</th>
                                <th colspan="2" class="hidebc">Christian</th>
                                <th colspan="2" class="hidebc">Muslim</th>
                                <th colspan="2" class="hidembc">Hindu</th>
                                <th colspan="2" class="hidembc">Christian</th>
                                <th colspan="2" class="hidembc">Muslim</th>
                                <th colspan="2" class="hidesc">Hindu</th>
                                <th colspan="2" class="hidesc">Christian</th>
                                <th colspan="2" class="hidesc">Muslim</th>
                                <th colspan="2" class="hidest">Hindu</th>
                                <th colspan="2" class="hidest">Christian</th>
                                <th colspan="2" class="hidest">Muslim</th>
                                <th colspan="2" class="hideobc">Hindu</th>
                                <th colspan="2" class="hideobc">Christian</th>
                                <th colspan="2" class="hideobc">Muslim</th>
                                <th colspan="2" class="hidednc">Hindu</th>
                                <th colspan="2" class="hidednc">Christian</th>
                                <th colspan="2" class="hidednc">Muslim</th>
                                <th colspan="2" class="hidebcm">Muslim</th>
                            </tr>
                            <tr>
                                <th class="hidebc">Boys</th>
                                <th class="hidebc">Girls</th>
                                <th class="hidebc">Boys</th>
                                <th class="hidebc">Girls</th>
                                <th class="hidebc">Boys</th>
                                <th class="hidebc">Girls</th>
                                <th class="hidembc">Boys</th>
                                <th class="hidembc">Girls</th>
                                <th class="hidembc">Boys</th>
                                <th class="hidembc">Girls</th>
                                <th class="hidembc">Boys</th>
                                <th class="hidembc">Girls</th>
                                <th class="hidesc">Boys</th>
                                <th class="hidesc">Girls</th>
                                <th class="hidesc">Boys</th>
                                <th class="hidesc">Girls</th>
                                <th class="hidesc">Boys</th>
                                <th class="hidesc">Girls</th>
                                <th class="hidest">Boys</th>
                                <th class="hidest">Girls</th>
                                <th class="hidest">Boys</th>
                                <th class="hidest">Girls</th>
                                <th class="hidest">Boys</th>
                                <th class="hidest">Girls</th>
                                <th class="hideobc">Boys</th>
                                <th class="hideobc">Girls</th>
                                <th class="hideobc">Boys</th>
                                <th class="hideobc">Girls</th>
                                <th class="hideobc">Boys</th>
                                <th class="hideobc">Girls</th>
                                <th class="hidednc">Boys</th>
                                <th class="hidednc">Girls</th>
                                <th class="hidednc">Boys</th>
                                <th class="hidednc">Girls</th>
                                <th class="hidednc">Boys</th>
                                <th class="hidednc">Girls</th>
                                <th class="hidebcm">Boys</th>
                                <th class="hidebcm">Girls</th>
                            </tr>
                        </thead>
                        <tbody id="studentCasteDetailsTBODY"> </tbody>
                    </table>
                </div>
            </div>
        </div>

    </form>
</div>