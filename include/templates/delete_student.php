<style>
    .dataTables_filter input {
        border: 1px solid #e4e4e4;
        padding: 7px;
    }
</style>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Deleted Student's List </li>
    </ol>
</div>
<div class="main-container">
    <!--form start-->
    <form id="school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data">
        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div id="stockinfotable">
                    <div class="card">
                        <div class="card-body">
                            <div id="updatedstockinfotable">
                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student Name</th>
                                            <th>Standard</th>
                                            <th>Section</th>
                                            <th>Gender</th>
                                            <th>Admission Number</th>
                                            <th>Address</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student Name</th>
                                            <th>Standard</th>
                                            <th>Section</th>
                                            <th>Gender</th>
                                            <th>Admission Number</th>
                                            <th>Address</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                        @session_start();
                                        if(isset($_SESSION['school_id'])){
                                            $school_id = $_SESSION['school_id'];
                                        }

                                        $ctselect = "SELECT * FROM student_creation WHERE status = 1 AND deleted_student = 1 AND school_id = '$school_id'";
                                        $ctresult = $mysqli->query($ctselect);
                                        if ($ctresult->num_rows > 0) {
                                            $i = 1;
                                            while ($ct = $ctresult->fetch_assoc()) {
                                                $sid = $ct["student_id"];
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php if (isset($ct["student_name"])) { echo $ct["student_name"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["standard"])) { echo $ct["standard"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["section"])) { echo $ct["section"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["gender"])) { echo $ct["gender"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["admission_number"])) { echo $ct["admission_number"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["flat_no"])) { echo $ct["flat_no"], $ct["street"], $ct["area_locatlity"], $ct["district"], $ct["pincode"];
                                                        } ?></td>
                                                    <td><?php if (isset($ct["reason"])) { echo $ct["reason"];
                                                        } ?></td>
                                                    <td><button type='button' class='btn btn-primary' title='student Restore' onclick="restoreStudent(<?php echo $sid; ?>)">Restore</button></td>
                                                </tr>
                                        <?php $i = $i + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>