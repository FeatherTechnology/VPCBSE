<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION['school_id'];
}

$StudentAdmissionList = $userObj->getAdmissionNoDetails($mysqli);

$id = 0;
if (isset($_POST['SubmitTransferCertificate']) && $_POST['SubmitTransferCertificate'] != '') {
    if (isset($_POST['id']) && $_POST['id'] > 0 && is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        $updateTransferCertificateCreation = $userObj->updateTransferCertificateCreation($mysqli, $id, $userid, $school_id);
?>
        <script>
            location.href = '<?php echo $HOSTPATH; ?>edit_transfer_certificate&msc=2';
        </script>
    <?php
    } else {
        $addTransferCertificateCreation = $userObj->addTransferCertificateCreation($mysqli, $userid, $school_id);
    ?>
        <script>
            location.href = '<?php echo $HOSTPATH; ?>edit_transfer_certificate&msc=1';
        </script>
    <?php
    }
}

// $del = 0;
// if (isset($_GET['del'])) {
//     $del = $_GET['del'];
// }
// if ($del > 0) {
//     $deleteTransferCertificateCreation = $userObj->deleteTransferCertificateCreation($mysqli, $del, $userid);
//     ?>
     <script>
//         location.href = '<?php #echo $HOSTPATH; ?>edit_transfer_certificate&msc=3';
//     </script>
 <?php
// }

if (isset($_GET['upd'])) {
    $idupd = $_GET['upd'];
}
$status = 0;
if ($idupd > 0) {
    $getTransferCertificateCreation = $userObj->getTransferCertificateCreation($mysqli, $idupd);

    if (sizeof($getTransferCertificateCreation) > 0) {
        for ($ibranch = 0; $ibranch < sizeof($getTransferCertificateCreation); $ibranch++) {
            $transfer_id                      = $getTransferCertificateCreation['transfer_id'];
            $serial_number                    = $getTransferCertificateCreation['serial_number'];
            $tmr_code                         = $getTransferCertificateCreation['tmr_code'];
            $admission_number                 = $getTransferCertificateCreation['admission_number'];
            $certificate_number               = $getTransferCertificateCreation['certificate_number'];
            $transfer_date                    = $getTransferCertificateCreation['transfer_date'];
            $school_name                      = $getTransferCertificateCreation['school_name'];
            $district_educational             = $getTransferCertificateCreation['district_educational'];
            $revenue_district                 = $getTransferCertificateCreation['revenue_district'];
            $student_name                     = $getTransferCertificateCreation['student_name'];
            $parents_name                     = $getTransferCertificateCreation['parents_name'];
            $nationality                      = $getTransferCertificateCreation['nationality'];
            $caste                            = $getTransferCertificateCreation['caste'];
            $gender                           = $getTransferCertificateCreation['gender'];
            $admission_date                   = $getTransferCertificateCreation['admission_date'];
            $register_words                   = $getTransferCertificateCreation['register_words'];
            $personal_identification          = $getTransferCertificateCreation['personal_identification'];
            $date_first_admission             = $getTransferCertificateCreation['date_first_admission'];
            $standard                         = $getTransferCertificateCreation['standard'];
            $promotion                        = $getTransferCertificateCreation['promotion'];
            $scholarship                      = $getTransferCertificateCreation['scholarship'];
            $medical_inspection               = $getTransferCertificateCreation['medical_inspection'];
            $date_school                      = $getTransferCertificateCreation['date_school'];
            $conduct                          = $getTransferCertificateCreation['conduct'];
            $date_parents                     = $getTransferCertificateCreation['date_parents'];
            $date_of_transfer_certificate     = $getTransferCertificateCreation['date_of_transfer_certificate'];
        }
    }
}
?>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Transfer Certicate</li>
    </ol>

    <a href="edit_transfer_certificate">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    </a>
</div>

<div class="main-container">
    <!--form start-->
    <form id="transfer_certificate_form" name="transfer_certificate_form" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" value="<?php if (isset($transfer_id)) echo $transfer_id; ?>" id="id" name="id" >
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Transfer Certificate</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="label">Serial No :</label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                <div class="form-group">
                                    <input type="text" tabindex="1" name="serial_number" id="serial_number" class="form-control" value="<?php if (isset($serial_number)) echo $serial_number; ?>">
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12"></div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="label">T.M.R. Code No:</label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                <div class="form-group">
                                    <input type="text" tabindex="2" name="tmr_code" id="tmr_code" value="<?php if (isset($tmr_code)) echo $tmr_code; ?>" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="label">Admission No :</label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                <div class="form-group">
                                    <input type="text" tabindex="3" name="admission_number" id="admission_number" value="<?php if (isset($admission_number)) echo $admission_number; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12"></div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="label">Certification No :</label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                <div class="form-group">
                                    <input type="text" tabindex="4" name="certificate_number" id="certificate_number" class="form-control" value="<?php if (isset($certificate_number)) echo $certificate_number; ?>" >
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12"></div>
                            <div class="col-md-2"></div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="label">Date :</label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                                <div class="form-group">
                                    <input type="date" tabindex="5" name="transfer_date" id="transfer_date" class="form-control" value="<?php if (isset($transfer_date)) echo $transfer_date; ?>" >
                                </div>
                            </div>

                        </div><br><br><br><br>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>1.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>(a) Name of the School :</label><br><br>
                                            <label>(b) Name of the Educational District :</label><br><br>
                                            <label>(c) Name of the Revenue District :</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="6" name="school_name" id="school_name" class="form-control" value="<?php if (isset($school_name)) echo $school_name; ?>" >
                                            <input type="text" tabindex="7" name="district_educational" id="district_educational" class="form-control" value="<?php if (isset($district_educational)) echo $district_educational; ?>" >
                                            <input type="text" tabindex="8" name="revenue_district" id="revenue_district" class="form-control" value="<?php if (isset($revenue_district)) echo $revenue_district; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>2.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Name of the Pupil(in block letters) :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="9" name="student_name" id="student_name" class="form-control" value="<?php if (isset($student_name)) echo $student_name; ?>" oninput="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>3.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Name of the Father or Mother of the Puplil :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="10" name="parents_name" id="parents_name" class="form-control" value="<?php if (isset($parents_name)) echo $parents_name; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>4.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Nationality and Religion :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="11" name="nationality" id="nationality" class="form-control" value="<?php if (isset($nationality)) echo $nationality; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>5.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Caste :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="12" name="caste" id="caste" class="form-control" value="<?php if (isset($caste)) echo $caste; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>6.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Gender :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="13" name="gender" id="gender" class="form-control" value="<?php if (isset($gender)) echo $gender; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>7.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Date of Brith as entered in the Admission :</label><br><br>
                                            <label>Register in figures and words :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="date" tabindex="14" name="admission_date" id="admission_date" class="form-control" value="<?php if (isset($admission_date)) echo $admission_date; ?>" >
                                            <input type="text" tabindex="15" name="register_words" id="register_words" class="form-control" value="<?php if (isset($register_words)) echo $register_words; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>8.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Personal marks of Identification :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="16" name="personal_identification" id="personal_identification" class="form-control" value="<?php if (isset($personal_identification)) echo $personal_identification; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>9.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Date of first admission in the School with class :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="17" name="date_first_admission" id="date_first_admission" class="form-control" value="<?php if (isset($date_first_admission)) echo $date_first_admission; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>10.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Standard in which the pupil was studyingat the time of leaving :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="18" name="standard" id="standard" class="form-control" value="<?php if (isset($standard)) echo $standard; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>11.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Whether qualified for promotion to Higher Standard:</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="19" name="promotion" id="promotion" class="form-control" value="<?php if (isset($promotion)) echo $promotion; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>12.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Whether the pupil has in receipt of any Scholarship (Nature of the Scholarship to be speified) :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="20" name="scholarship" id="scholarship" class="form-control" value="<?php if (isset($scholarship)) echo $scholarship; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>13.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Whether the pupil has under gone Medicalinspection during last academic year :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="21" name="medical_inspection" id="medical_inspection" class="form-control" value="<?php if (isset($medical_inspection)) echo $medical_inspection; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>14.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Date on which the pupil actually the school :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="date" tabindex="22" name="date_school" id="date_school" class="form-control" value="<?php if (isset($date_school)) echo $date_school; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>15.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>The pupil conduct and character :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="text" tabindex="23" name="conduct" id="conduct" class="form-control" value="<?php if(isset($conduct)){ echo $conduct; }else{ echo 'GOOD';}?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>16.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Date on which application for Transfer Certificate Was made on behalf of the pupil by his parent of Guardian :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="date" tabindex="24" name="date_parents" id="date_parents" class="form-control" value="<?php if (isset($date_parents)) echo $date_parents; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>17.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12">
                                        <div class="form-group">
                                            <label>Date of the Transfer Certificate :</label><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group">
                                            <input type="date" tabindex="25" name="date_of_transfer_certificate" id="date_of_transfer_certificate" class="form-control" value="<?php if (isset($date_of_transfer_certificate)) echo $date_of_transfer_certificate; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                        <div class="text-right">
                                            <div>
                                                <button type="submit" tabindex="26" name="SubmitTransferCertificate" id="SubmitTransferCertificate" class="btn btn-primary" value="submit" tabindex="10">Submit</button>&nbsp;&nbsp;&nbsp;
                                                <button type="reset" tabindex="27" class="btn btn-outline-secondary">Cancel</button>
                                            </div> <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
    </form>
</div>
