<?php
// error_reporting(0);
@session_start();
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $school_id = $_SESSION['school_id'];
    $academic_year = $_SESSION['academic_year'];
    $school_name = $_SESSION['school_name'];
}
require_once('../vendor/csvreader/php-excel-reader/excel_reader2.php');
require_once('../vendor/csvreader/SpreadsheetReader.php');
include("../ajaxconfig.php");
if (isset($_FILES["file"]["type"])) {
    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        //set the directory path name
        $new_directory = ("../uploads/bulkimport/" . $school_name);
        //make the directory
        if (file_exists($new_directory) == false) {
            mkdir($new_directory, 0777);
        }
        $targetPath = "$new_directory/" . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for ($i = 0; $i < $sheetCount; $i++) {
            $Reader->ChangeSheet($i);
            $isHeader = true; // Flag to indicate if the current row is a header
            foreach ($Reader as $Row) {

                if ($isHeader) {
                    // Skip the header row
                    $isHeader = false;
                    continue;
                }

                // $admission_no = "";
                // if (isset($Row[0])) {
                //     $admission_no = mysqli_real_escape_string($mysqli, $Row[0]);
                // }

                // $student_name = "";
                // if (isset($Row[1])) {
                //     $student_name = mysqli_real_escape_string($mysqli, $Row[1]);
                // }

                // $sur_name = "";
                // if (isset($Row[2])) {
                //     $sur_name = mysqli_real_escape_string($mysqli, $Row[2]);
                // }

                // $dob = "";
                // if (isset($Row[3])) {
                //     $getdob = mysqli_real_escape_string($mysqli, $Row[3]);
                //     $dob = date('Y-m-d', strtotime($getdob));
                // }

                // $gender = "";
                // if (isset($Row[4])) {
                //     $get_gender = mysqli_real_escape_string($mysqli, $Row[4]);
                //     if ($get_gender == '1') {
                //         $gender = 'Male';
                //     } else if ($get_gender == '0') {
                //         $gender = 'Female';
                //     }
                // }

                // $mother_tongue = "";
                // if (isset($Row[5])) {
                //     $mother_tongue = mysqli_real_escape_string($mysqli, $Row[5]);
                // }

                // $aadhar_number = "";
                // if (isset($Row[6])) {
                //     $aadhar_number = mysqli_real_escape_string($mysqli, $Row[6]);
                // }

                // $blood_group = "";
                // if (isset($Row[7])) {
                //     $blood_group = mysqli_real_escape_string($mysqli, $Row[7]);
                // }

                // $category = "";
                // if (isset($Row[8])) {
                //     $category = mysqli_real_escape_string($mysqli, $Row[8]);
                // }

                // $caste_name = "";
                // if (isset($Row[9])) {
                //     $caste_name = mysqli_real_escape_string($mysqli, $Row[9]);
                // }

                // $sub_caste = "";
                // if (isset($Row[10])) {
                //     $sub_caste = mysqli_real_escape_string($mysqli, $Row[10]);
                // }

                // $nationality = "";
                // if (isset($Row[11])) {
                //     $nationality = mysqli_real_escape_string($mysqli, $Row[11]);
                // }

                // $religion = "";
                // if (isset($Row[12])) {
                //     $religion = mysqli_real_escape_string($mysqli, $Row[12]);
                // }

                // $filltoo = "";
                // if (isset($Row[13])) {
                //     $filltoo = mysqli_real_escape_string($mysqli, $Row[13]);
                // }

                // $flat_no = "";
                // if (isset($Row[14])) {
                //     $flat_no = mysqli_real_escape_string($mysqli, $Row[14]);
                // }

                // $flat_no1 = "";
                // if (isset($Row[15])) {
                //     $flat_no1 = mysqli_real_escape_string($mysqli, $Row[15]);
                // }

                // $street = "";
                // if (isset($Row[16])) {
                //     $street = mysqli_real_escape_string($mysqli, $Row[16]);
                // }

                // $street1 = "";
                // if (isset($Row[17])) {
                //     $street1 = mysqli_real_escape_string($mysqli, $Row[17]);
                // }

                // $area_locality = "";
                // if (isset($Row[18])) {
                //     $area_locality = mysqli_real_escape_string($mysqli, $Row[18]);
                // }

                // $area_locality1 = "";
                // if (isset($Row[19])) {
                //     $area_locality1 = mysqli_real_escape_string($mysqli, $Row[19]);
                // }

                // $district = "";
                // if (isset($Row[20])) {
                //     $district = mysqli_real_escape_string($mysqli, $Row[20]);
                // }

                // $district1 = "";
                // if (isset($Row[21])) {
                //     $district1 = mysqli_real_escape_string($mysqli, $Row[21]);
                // }

                // $pincode = "";
                // if (isset($Row[22])) {
                //     $pincode = mysqli_real_escape_string($mysqli, $Row[22]);
                // }

                // $pincode1 = "";
                // if (isset($Row[23])) {
                //     $pincode1 = mysqli_real_escape_string($mysqli, $Row[23]);
                // }

                // $standard = "";
                // if (isset($Row[24])) {
                //     $get_standard = mysqli_real_escape_string($mysqli, $Row[24]);

                //     //for hss
                //     // $standards = [
                //     //     "1" => "1",  // Pre.K.G
                //     //     "2" => "2",  // L.K.G
                //     //     "3" => "3",  // U.K.G
                //     //     "4" => "4",  // I
                //     //     "5" => "5",  // II
                //     //     "6" => "6",  // III
                //     //     "7" => "7",  // IV
                //     //     "8" => "8",  // V
                //     //     "9" => "9", // VI
                //     //     "10" => "10", // VII
                //     //     "11" => "11", // VIII
                //     //     "12" => "12", // IX
                //     //     "13" => "13", // X
                //     //     "14" => "14", // XI_maths_biology
                //     //     "15" => "15", // XI_maths_computerscience
                //     //     "16" => "16", // XI_biology_computerscience
                //     //     "17" => "19", // XII_maths_biology
                //     //     "18" => "20", // XII_maths_computerscience
                //     //     "19" => "21", // XII_biology_computerscience
                //     //     "20" => "18", // XI_All
                //     //     "21" => "23", // XII_All
                //     //     "22" => "17", // XI_commerce_computerscience
                //     //     "23" => "22", // XII_commerce_computerscience
                //     // ];
                
                //     //For CBSE
                //     $standards = [
                //         "2" => "1",  // Pre.K.G
                //         "3" => "2",  // L.K.G
                //         "4" => "3",  // U.K.G
                //         "5" => "4",  // I
                //         "6" => "5",  // II
                //         "7" => "6",  // III
                //         "8" => "7",  // IV
                //         "9" => "8",  // V
                //         "10" => "9", // VI
                //         "11" => "10", // VII
                //         "12" => "11", // VIII
                //         "13" => "12", // IX
                //         "14" => "13", // X
                //         "15" => "14", // XI_maths_biology
                //         "16" => "15", // XI_maths_computerscience
                //         "17" => "16", // XI_biology_computerscience
                //         "18" => "19", // XII_maths_biology
                //         "19" => "20", // XII_maths_computerscience
                //         "20" => "21", // XII_biology_computerscience
                //         "21" => "18", // XI_All
                //         "22" => "23", // XII_All
                //         "23" => "17", // XI_commerce_computerscience
                //         "24" => "22", // XII_commerce_computerscience
                //     ];

                //     $standard = isset($standards[$get_standard]) ? $standards[$get_standard] : "";
                // }

                // $previous_school_name = "";
                // if (isset($Row[25])) {
                //     $previous_school_name = mysqli_real_escape_string($mysqli, $Row[25]);
                // }

                // $previous_school_place = "";
                // if (isset($Row[26])) {
                //     $previous_place = mysqli_real_escape_string($mysqli, $Row[26]);
                // }

                // $previous_doj = "";
                // if (isset($Row[27])) {
                //     $getprevious_doj = mysqli_real_escape_string($mysqli, $Row[27]);
                //     $previous_doj = date('Y-m-d', strtotime($getprevious_doj));
                // }

                // $previous_dol = "";
                // if (isset($Row[28])) {
                //     $getprevious_dol = mysqli_real_escape_string($mysqli, $Row[28]);
                //     $previous_dol = date('Y-m-d', strtotime($getprevious_dol));
                // }

                // $time_of_tc_handed_over = "";
                // if (isset($Row[29])) {
                //     $time_of_tc_handed_over = mysqli_real_escape_string($mysqli, $Row[29]);
                // }

                // $previous_school_class_attended = "";
                // if (isset($Row[30])) {
                //     $previous_school_class_attended = mysqli_real_escape_string($mysqli, $Row[30]);
                // }

                // $section = "";
                // if (isset($Row[31])) {
                //     $get_section = mysqli_real_escape_string($mysqli, $Row[31]);
                //     if ($get_section == '1') {
                //         $section = 'A';
                //     } else if ($get_section == '2') {
                //         $section = 'B';
                //     } else if ($get_section == '3') {
                //         $section = 'C';
                //     } else if ($get_section == '4') {
                //         $section = 'D';
                //     }
                // }

                // $getMedium = "";
                // if (isset($Row[32])) {
                //     $getMedium = mysqli_real_escape_string($mysqli, $Row[32]);
                // }

                // $student_rollno = "";
                // if (isset($Row[33])) {
                //     $student_rollno = mysqli_real_escape_string($mysqli, $Row[33]);
                // }

                // $emis_no = "";
                // if (isset($Row[34])) {
                //     $emis_no = mysqli_real_escape_string($mysqli, $Row[34]);
                // }

                // $getStudentType = "";
                // if (isset($Row[35])) {
                //     $student_type = mysqli_real_escape_string($mysqli, $Row[35]);

                //     if ($student_type == 'NewStudent') {
                //         $getStudentType = '1';
                //     } else if ($student_type == 'OldStudent') {
                //         $getStudentType = '2';
                //     } else if ($student_type == 'Vijayadashami') {
                //         $getStudentType = '3';
                //     } else if ($student_type == 'All') {
                //         $getStudentType = '4';
                //     }
                // }

                // $concession_type = "";
                // if (isset($Row[36])) {
                //     $concession_type = mysqli_real_escape_string($mysqli, $Row[36]);
                // }

                // $concession_type_details = "";
                // if (isset($Row[37])) {
                //     $concession_type_details = mysqli_real_escape_string($mysqli, $Row[37]);
                // }

                // $getFacility = "";
                // if (isset($Row[38])) {
                //     $facility = mysqli_real_escape_string($mysqli, $Row[38]);

                //     if ($facility == '1') {
                //         $getFacility = 'Transport';
                //     } else {
                //         $getFacility = '';
                //     }
                // }

                // $area_last_id = "";
                // if (isset($Row[39])) {
                //     $area_last_id = mysqli_real_escape_string($mysqli, $Row[39]);
                // }
                // $transport_stopping = "";
                // if (isset($Row[40])) {
                //     $transport_stopping = mysqli_real_escape_string($mysqli, $Row[40]);
                // }

                // $bus_no = "";
                // if (isset($Row[41])) {
                //     $bus_no = mysqli_real_escape_string($mysqli, $Row[41]);
                // }

                // $father_name = "";
                // if (isset($Row[42])) {
                //     $father_name = mysqli_real_escape_string($mysqli, $Row[42]);
                // }

                // $mother_name = "";
                // if (isset($Row[43])) {
                //     $mother_name = mysqli_real_escape_string($mysqli, $Row[43]);
                // }

                // $father_aadhar_number = "";
                // if (isset($Row[44])) {
                //     $father_aadhar_number = mysqli_real_escape_string($mysqli, $Row[44]);
                // }

                // $mother_aadhar_number = "";
                // if (isset($Row[45])) {
                //     $mother_aadhar_number = mysqli_real_escape_string($mysqli, $Row[45]);
                // }

                // $occupation = "";
                // if (isset($Row[46])) {
                //     $occupation = mysqli_real_escape_string($mysqli, $Row[46]);
                // }

                // $monthly_income = "";
                // if (isset($Row[47])) {
                //     $monthly_income = mysqli_real_escape_string($mysqli, $Row[47]);
                // }

                // $nature_business = "";
                // if (isset($Row[48])) {
                //     $nature_business = mysqli_real_escape_string($mysqli, $Row[48]);
                // }

                // $position_held = "";
                // if (isset($Row[49])) {
                //     $position_held = mysqli_real_escape_string($mysqli, $Row[49]);
                // }

                // $telephone_number = "";
                // if (isset($Row[50])) {
                //     $telephone_number = mysqli_real_escape_string($mysqli, $Row[50]);
                // }

                // $getLivesGuardian = "";
                // if (isset($Row[51])) {
                //     $lives_guardian = mysqli_real_escape_string($mysqli, $Row[51]);

                //     if ($lives_guardian == '1') {
                //         $getLivesGuardian = 'lives_gaurdian';
                //     } else {
                //         $getLivesGuardian = '';
                //     }
                // }

                // $guardian_name = "";
                // if (isset($Row[52])) {
                //     $guardian_name = mysqli_real_escape_string($mysqli, $Row[52]);
                // }

                // $guardian_mobile = "";
                // if (isset($Row[53])) {
                //     $guardian_mobile = mysqli_real_escape_string($mysqli, $Row[53]);
                // }

                // $guardian_aadhar_number = "";
                // if (isset($Row[54])) {
                //     $guardian_aadhar_number = mysqli_real_escape_string($mysqli, $Row[54]);
                // }

                // $guardian_email_id = "";
                // if (isset($Row[55])) {
                //     $guardian_email_id = mysqli_real_escape_string($mysqli, $Row[55]);
                // }

                // $father_mobile_no = "";
                // if (isset($Row[56])) {
                //     $father_mobile_no = mysqli_real_escape_string($mysqli, $Row[56]);
                // }

                // $mother_mobile_no = "";
                // if (isset($Row[57])) {
                //     $mother_mobile_no = mysqli_real_escape_string($mysqli, $Row[57]);
                // }

                // $father_email_id = "";
                // if (isset($Row[58])) {
                //     $father_email_id = mysqli_real_escape_string($mysqli, $Row[58]);
                // }

                // $sms_sent_no = "";
                // if (isset($Row[59])) {
                //     $sms_sent_no = mysqli_real_escape_string($mysqli, $Row[59]);
                // }

                // $sibling_name = "";
                // if (isset($Row[60])) {
                //     $sibling_name = mysqli_real_escape_string($mysqli, $Row[60]);
                // }

                // $sibling_school_name = "";
                // if (isset($Row[61])) {
                //     $sibling_school_name = mysqli_real_escape_string($mysqli, $Row[61]);
                // }

                // $sibling_standard = "";
                // if (isset($Row[62])) {
                //     $sibling_standard = mysqli_real_escape_string($mysqli, $Row[62]);
                // }

                // $sibling_name2 = "";
                // if (isset($Row[63])) {
                //     $sibling_name2 = mysqli_real_escape_string($mysqli, $Row[63]);
                // }

                // $sibling_school_name2 = "";
                // if (isset($Row[64])) {
                //     $sibling_school_name2 = mysqli_real_escape_string($mysqli, $Row[64]);
                // }

                // $sibling_standard2 = "";
                // if (isset($Row[65])) {
                //     $sibling_standard2 = mysqli_real_escape_string($mysqli, $Row[65]);
                // }

                // $sibling_name3 = "";
                // if (isset($Row[66])) {
                //     $sibling_name3 = mysqli_real_escape_string($mysqli, $Row[66]);
                // }

                // $sibling_school_name3 = "";
                // if (isset($Row[67])) {
                //     $sibling_school_name3 = mysqli_real_escape_string($mysqli, $Row[67]);
                // }

                // $sibling_standard3 = "";
                // if (isset($Row[68])) {
                //     $sibling_standard3 = mysqli_real_escape_string($mysqli, $Row[68]);
                // }

                // $any_extra_curricular = "";
                // if (isset($Row[69])) {
                //     $any_extra_curricular = mysqli_real_escape_string($mysqli, $Row[69]);
                // }

                ///Fee master table
                $fm_std_id = "";
                if (isset($Row[0])) {
                    $fm_std_id = mysqli_real_escape_string($mysqli, $Row[0]);

                //     //for hss
                //     $standards = [
                //         "1" => "1",  // Pre.K.G
                //         "2" => "2",  // L.K.G
                //         "3" => "3",  // U.K.G
                //         "4" => "4",  // I
                //         "5" => "5",  // II
                //         "6" => "6",  // III
                //         "7" => "7",  // IV
                //         "8" => "8",  // V
                //         "9" => "9", // VI
                //         "10" => "10", // VII
                //         "11" => "11", // VIII
                //         "12" => "12", // IX
                //         "13" => "13", // X
                //         "14" => "14", // XI_maths_biology
                //         "15" => "15", // XI_maths_computerscience
                //         "16" => "16", // XI_biology_computerscience
                //         "17" => "19", // XII_maths_biology
                //         "18" => "20", // XII_maths_computerscience
                //         "19" => "21", // XII_biology_computerscience
                //         "20" => "18", // XI_All
                //         "21" => "23", // XII_All
                //         "22" => "17", // XI_commerce_computerscience
                //         "23" => "22", // XII_commerce_computerscience
                //     ];
                
                    //For CBSE
                    $standards = [
                        "2" => "1",  // Pre.K.G
                        "3" => "2",  // L.K.G
                        "4" => "3",  // U.K.G
                        "5" => "4",  // I
                        "6" => "5",  // II
                        "7" => "6",  // III
                        "8" => "7",  // IV
                        "9" => "8",  // V
                        "10" => "9", // VI
                        "11" => "10", // VII
                        "12" => "11", // VIII
                        "13" => "12", // IX
                        "14" => "13", // X
                        "15" => "14", // XI_maths_biology
                        "16" => "15", // XI_maths_computerscience
                        "17" => "16", // XI_biology_computerscience
                        "18" => "19", // XII_maths_biology
                        "19" => "20", // XII_maths_computerscience
                        "20" => "21", // XII_biology_computerscience
                        "21" => "18", // XI_All
                        "22" => "23", // XII_All
                        "23" => "17", // XI_commerce_computerscience
                        "24" => "22", // XII_commerce_computerscience
                    ];

                    $standard = isset($standards[$fm_std_id]) ? $standards[$fm_std_id] : "";
                }

                $fm_academic_yr = "";
                if (isset($Row[1])) {
                    $fm_academic_yr = mysqli_real_escape_string($mysqli, $Row[1]);
                }

                $fm_medium = "";
                if (isset($Row[2])) {
                    $fm_medium = mysqli_real_escape_string($mysqli, $Row[2]);
                }

                $fm_fee_particulars = "";
                if (isset($Row[3])) {
                    $fm_fee_particulars = mysqli_real_escape_string($mysqli, $Row[3]);
                }

                $fm_fee_amount = "";
                if (isset($Row[4])) {
                    $fm_fee_amount = mysqli_real_escape_string($mysqli, $Row[4]);
                }

                $fm_fee_type = "";
                if (isset($Row[5])) {
                    $fm_fee_type = mysqli_real_escape_string($mysqli, $Row[5]);
                }

                $fm_student_type = "";
                if (isset($Row[6])) {
                    $fmstudenttype = mysqli_real_escape_string($mysqli, $Row[6]);
                    if ($fmstudenttype == 'NewStudent') {
                        $fm_student_type = '1';
                    } else if ($fmstudenttype == 'OldStudent') {
                        $fm_student_type = '2';
                    } else if ($fmstudenttype == 'Vijayadashami') {
                        $fm_student_type = '3';
                    } else if ($fmstudenttype == 'All') {
                        $fm_student_type = '4';
                    }
                }

                $fm_due_date = "";
                if (isset($Row[7])) {
                    $get_due_date = mysqli_real_escape_string($mysqli, $Row[7]);
                    $fm_due_date = date('Y-m-d', strtotime($get_due_date));
                }

                // //Admission fee
                // $af_receipt_date = "";
                // if (isset($Row[78])) {
                //     $get_receipt_date = mysqli_real_escape_string($mysqli, $Row[78]);
                //     $af_receipt_date = date('Y-m-d', strtotime($get_receipt_date));
                // }

                // $af_academic_yr = "";
                // if (isset($Row[79])) {
                //     $af_academic_yr = mysqli_real_escape_string($mysqli, $Row[79]);
                // }

                // $af_other_charges = "";
                // if (isset($Row[80])) {
                //     $af_other_charges = mysqli_real_escape_string($mysqli, $Row[80]);
                // }

                // $af_othercharges_received = "";
                // if (isset($Row[81])) {
                //     $af_othercharges_received = mysqli_real_escape_string($mysqli, $Row[81]);
                // }

                // $af_scholarship = "";
                // if (isset($Row[82])) {
                //     $af_scholarship = mysqli_real_escape_string($mysqli, $Row[82]);
                // }

                // $af_total_feetobecollected = "";
                // if (isset($Row[83])) {
                //     $af_total_feetobecollected = mysqli_real_escape_string($mysqli, $Row[83]);
                // }

                // $af_final_amounttobecollected = "";
                // if (isset($Row[84])) {
                //     $af_final_amounttobecollected = mysqli_real_escape_string($mysqli, $Row[84]);
                // }

                // $af_collected = "";
                // if (isset($Row[85])) {
                //     $af_collected = mysqli_real_escape_string($mysqli, $Row[85]);
                // }

                // $af_balancetobepaid = "";
                // if (isset($Row[86])) {
                //     $af_balancetobepaid = mysqli_real_escape_string($mysqli, $Row[86]);
                // }

                // //Admission fee details
                // $afd_fee_received = "";
                // if (isset($Row[87])) {
                //     $afd_fee_received = mysqli_real_escape_string($mysqli, $Row[87]);
                // }

                // $afd_balancetobepaid = "";
                // if (isset($Row[88])) {
                //     $afd_balancetobepaid = mysqli_real_escape_string($mysqli, $Row[88]);
                // }

                // $afd_scholarship = "";
                // if (isset($Row[89])) {
                //     $afd_scholarship = mysqli_real_escape_string($mysqli, $Row[89]);
                // }

                // //Admission fee denomination
                // $afds_payment_mode = "";
                // if (isset($Row[90])) {
                //     $afds_payment_mode = mysqli_real_escape_string($mysqli, $Row[90]);
                // }

                // $afds_ledgerrefid = "";
                // if (isset($Row[91])) {
                //     $afds_ledgerrefid = mysqli_real_escape_string($mysqli, $Row[91]);
                // }

                // $afds_no_thousand = "";
                // if (isset($Row[92])) {
                //     $afds_no_thousand = mysqli_real_escape_string($mysqli, $Row[92]);
                // }

                // $afds_no_fivehundred = "";
                // if (isset($Row[93])) {
                //     $afds_no_fivehundred = mysqli_real_escape_string($mysqli, $Row[93]);
                // }

                // $afds_nohundred = "";
                // if (isset($Row[94])) {
                //     $afds_nohundred = mysqli_real_escape_string($mysqli, $Row[94]);
                // }

                // $afds_nofifty = "";
                // if (isset($Row[95])) {
                //     $afds_nofifty = mysqli_real_escape_string($mysqli, $Row[95]);
                // }

                // $afds_twenty = "";
                // if (isset($Row[96])) {
                //     $afds_twenty = mysqli_real_escape_string($mysqli, $Row[96]);
                // }

                // $afds_noten = "";
                // if (isset($Row[97])) {
                //     $afds_noten = mysqli_real_escape_string($mysqli, $Row[97]);
                // }

                // $afds_nofive = "";
                // if (isset($Row[98])) {
                //     $afds_nofive = mysqli_real_escape_string($mysqli, $Row[98]);
                // }

                // $afds_totalamnt = "";
                // if (isset($Row[99])) {
                //     $afds_totalamnt = mysqli_real_escape_string($mysqli, $Row[99]);
                // }

                // $afds_chequeno = "";
                // if (isset($Row[100])) {
                //     $afds_chequeno = mysqli_real_escape_string($mysqli, $Row[100]);
                // }

                // $afds_cheque_date = "";
                // if (isset($Row[101])) {
                //     $afds_cheque_date = mysqli_real_escape_string($mysqli, $Row[101]);
                // }

                // $afds_cheque_amnt = "";
                // if (isset($Row[102])) {
                //     $afds_cheque_amnt = mysqli_real_escape_string($mysqli, $Row[102]);
                // }

                // $afds_bank_name = "";
                // if (isset($Row[103])) {
                //     $afds_bank_name = mysqli_real_escape_string($mysqli, $Row[103]);
                // }

                // $afds_neft_ref_no = "";
                // if (isset($Row[104])) {
                //     $afds_neft_ref_no = mysqli_real_escape_string($mysqli, $Row[104]);
                // }

                // $afds_neft_tran_date = "";
                // if (isset($Row[105])) {
                //     $afds_neft_tran_date = mysqli_real_escape_string($mysqli, $Row[105]);
                // }

                // $afds_amnt = "";
                // if (isset($Row[106])) {
                //     $afds_amnt = mysqli_real_escape_string($mysqli, $Row[106]);
                // }

                // $afds_neft_bank_name = "";
                // if (isset($Row[107])) {
                //     $afds_neft_bank_name = mysqli_real_escape_string($mysqli, $Row[107]);
                // }

                //Transport area 
                // $ac_areaname = "";
                // if (isset($Row[0])) {
                //     $ac_areaname = mysqli_real_escape_string($mysqli, $Row[0]);
                // }

                // $ac_fee_amount = "";
                // if (isset($Row[1])) {
                //     $ac_fee_amount = mysqli_real_escape_string($mysqli, $Row[1]);
                // }

                // $ac_academic_yr = "";
                // if (isset($Row[2])) {
                //     $ac_academic_yr = mysqli_real_escape_string($mysqli, $Row[2]);
                // }

                // $acp_fee_particulars = "";
                // if(isset($Row[111])) {
                // $acp_fee_particulars = mysqli_real_escape_string($mysqli,$Row[111]);
                // }

                // $acp_feeAmnnt = "";
                // if(isset($Row[112])) {
                // $acp_feeAmnnt = mysqli_real_escape_string($mysqli,$Row[112]);
                // }

                // $acp_due_date = "";
                // if(isset($Row[113])) {
                // $acp_due_date = mysqli_real_escape_string($mysqli,$Row[113]);
                // }

                // $taf_receipt_date = "";
                // if (isset($Row[114])) {
                //     $taf_receipt_date = mysqli_real_escape_string($mysqli, $Row[114]);
                // }

                // $taf_totalfees = "";
                // if (isset($Row[115])) {
                //     $taf_totalfees = mysqli_real_escape_string($mysqli, $Row[115]);
                // }

                // $taf_finalAmnt = "";
                // if (isset($Row[116])) {
                //     $taf_finalAmnt = mysqli_real_escape_string($mysqli, $Row[116]);
                // }

                // $taf_fees_collected = "";
                // if (isset($Row[117])) {
                //     $taf_fees_collected = mysqli_real_escape_string($mysqli, $Row[117]);
                // }

                // $taf_balancetopaid = "";
                // if (isset($Row[118])) {
                //     $taf_balancetopaid = mysqli_real_escape_string($mysqli, $Row[118]);
                // }

                // $tafd_fees_recieved = "";
                // if (isset($Row[119])) {
                //     $tafd_fees_recieved = mysqli_real_escape_string($mysqli, $Row[119]);
                // }

                // $tafd_balancetodo = "";
                // if (isset($Row[120])) {
                //     $tafd_balancetodo = mysqli_real_escape_string($mysqli, $Row[120]);
                // }

                // $tafd_scholarship = "";
                // if (isset($Row[121])) {
                //     $tafd_scholarship = mysqli_real_escape_string($mysqli, $Row[121]);
                // }

                // $tafd_particulars = "";
                // if (isset($Row[122])) {
                //     $tafd_particulars = mysqli_real_escape_string($mysqli, $Row[122]);
                // }

                // $tafds_payment = "";
                // if (isset($Row[123])) {
                //     $tafds_payment = mysqli_real_escape_string($mysqli, $Row[123]);
                // }

                // $tafds_nothousond = "";
                // if (isset($Row[124])) {
                //     $tafds_nothousond = mysqli_real_escape_string($mysqli, $Row[124]);
                // }

                // $tafds_nofivehundred = "";
                // if (isset($Row[125])) {
                //     $tafds_nofivehundred = mysqli_real_escape_string($mysqli, $Row[125]);
                // }

                // $tafds_nohundred = "";
                // if (isset($Row[126])) {
                //     $tafds_nohundred = mysqli_real_escape_string($mysqli, $Row[126]);
                // }

                // $tafds_nofifty = "";
                // if (isset($Row[127])) {
                //     $tafds_nofifty = mysqli_real_escape_string($mysqli, $Row[127]);
                // }

                // $tafds_notwenty = "";
                // if (isset($Row[128])) {
                //     $tafds_notwenty = mysqli_real_escape_string($mysqli, $Row[128]);
                // }

                // $tafds_noten = "";
                // if (isset($Row[129])) {
                //     $tafds_noten = mysqli_real_escape_string($mysqli, $Row[129]);
                // }

                // $tafds_nofive = "";
                // if (isset($Row[130])) {
                //     $tafds_nofive = mysqli_real_escape_string($mysqli, $Row[130]);
                // }

                // $tafds_totalamnt = "";
                // if (isset($Row[131])) {
                //     $tafds_totalamnt = mysqli_real_escape_string($mysqli, $Row[131]);
                // }

                // $tafds_checqueno = "";
                // if (isset($Row[132])) {
                //     $tafds_checqueno = mysqli_real_escape_string($mysqli, $Row[132]);
                // }

                // $tafds_checquedate = "";
                // if (isset($Row[133])) {
                //     $tafds_checquedate = mysqli_real_escape_string($mysqli, $Row[133]);
                // }

                // $tafds_checqueamnt = "";
                // if (isset($Row[134])) {
                //     $tafds_checqueamnt = mysqli_real_escape_string($mysqli, $Row[134]);
                // }

                // $tafds_checquebank = "";
                // if (isset($Row[135])) {
                //     $tafds_checquebank = mysqli_real_escape_string($mysqli, $Row[135]);
                // }

                // $tafds_neftrefno = "";
                // if (isset($Row[136])) {
                //     $tafds_neftrefno = mysqli_real_escape_string($mysqli, $Row[136]);
                // }

                // $tafds_nefttransdate = "";
                // if (isset($Row[137])) {
                //     $tafds_nefttransdate = mysqli_real_escape_string($mysqli, $Row[137]);
                // }

                // $tafds_neftamnt = "";
                // if (isset($Row[138])) {
                //     $tafds_neftamnt = mysqli_real_escape_string($mysqli, $Row[138]);
                // }

                // $tafds_neftbank = "";
                // if (isset($Row[139])) {
                //     $tafds_neftbank = mysqli_real_escape_string($mysqli, $Row[139]);
                // }

/*
`1. Area creation
`2. Area creation particulars
`3. student_creation
4. Fee Master
`5. Admission fee
`6. Admission fee details
`7. Admission fee denomination
`8. Transport fee
`9. Transport fee details
`10. Transport fee denomination
*/

                //Area creation /// Area creation particulars  START/////
                // $getAreaCreationQry = $connect->query("SELECT area_id FROM area_creation WHERE area_name ='$ac_areaname' AND transport_amount = '$ac_fee_amount' AND school_id ='$school_id' AND year_id ='$academic_year' ");
                // if ($getAreaCreationQry->rowCount() == '0') {

                //     $insertAreaCreation = $mysqli->query("INSERT INTO area_creation(area_name, no_of_terms, transport_amount, school_id, year_id, insert_login_id ) VALUES('" . $ac_areaname . "', '3', '" . $ac_fee_amount . "', '" . $school_id . "', '" . $academic_year . "', '" . $userid . "')");
                //     $area_last_id = $mysqli->insert_id;

                //     $acp_fee_particulars = ['Bus Fee I Term', 'Bus Fee II Term', 'Bus Fee III Term'];
                //     $acp_feeAmnnt = intval($ac_fee_amount) / 3;
                //     $acp_due_date = ['2024-06-01', '2024-09-01', '2024-12-01'];

                //     for ($i = 0; $i < 3; $i++) {
                //         $insertacp = $mysqli->query("INSERT INTO `area_creation_particulars`( `area_creation_id`, `particulars`, `due_amount`, `due_date`) VALUES ('$area_last_id','$acp_fee_particulars[$i]','$acp_feeAmnnt','$acp_due_date[$i]')");
                //     }
                // } else {
                //     $area_last_id = $getAreaCreationQry->fetch()['area_id'];
                // }
                //Area creation /// Area creation particulars  END/////

                //Student creation START/////
                // $getStudentCreationQry = $connect->query("SELECT student_id FROM student_creation WHERE admission_number ='$admission_no' ");
                // if ($getStudentCreationQry->rowCount() == '0') {
                //     $sms_mobile_no = ($father_mobile_no != '') ? $father_mobile_no : $mother_mobile_no;
                //     $StudentInsert = "INSERT INTO student_creation(admission_number, student_name, sur_name, date_of_birth, gender, mother_tongue, aadhar_number, blood_group, category, castename, sub_caste, nationality, religion, filltoo, flat_no, flat_no1, street, street1, area_locatlity, area_locatlity1, district, district1, pincode, pincode1, standard, previouschoolname, previousplace, strpreviousdoj, strpreviousdol, timeoftchandedover, previousclassattended, section, medium, studentrollno, emisno, studentstype, concession_type, concessiontypedetails, facility, transportarearefid, transportstopping, busno, father_name, mother_name, father_aadhar_number, mother_aadhar_number, occupation, monthly_income, nature_business, position_held, telephone_number, lives_gaurdian, gaurdian_name, gaurdian_mobile, gaurdian_aadhar_number, gaurdian_email_id, father_mobile_no, mother_mobile_no, father_email_id, sms_sent_no, sibling_name, sibling_school_name, sibling_standard, sibling_name2, sibling_school_name2, sibling_standard2, sibling_name3, sibling_school_name3, sibling_standard3, anyextracurricular, insert_login_id, school_id, year_id) VALUES('" . $admission_no . "', '" . $student_name . "', '" . $sur_name . "', '" . $dob . "', '" . $gender . "', '" . $mother_tongue . "', '" . $aadhar_number . "', '" . $blood_group . "', '" . $category . "', '" . $caste_name . "', '" . $sub_caste . "', '" . $nationality . "', '" . $religion . "', '" . $filltoo . "', '" . $flat_no . "',	'" . $flat_no1 . "', '" . $street . "', '" . $street1 . "', '" . $area_locality . "', '" . $area_locality1 . "', '" . $district . "', '" . $district1 . "', '" . $pincode . "', '" . $pincode1 . "', '" . $standard . "', '" . $previous_school_name . "', '" . $previous_school_place . "', '" . $previous_doj . "', '" . $previous_dol . "', '" . $time_of_tc_handed_over . "', '" . $previous_school_class_attended . "', '" . $section . "', '" . $getMedium . "', '" . $student_rollno . "', '" . $emis_no . "', '" . $getStudentType . "', '" . $concession_type . "',  '" . $concession_type_details . "', '" . $getFacility . "',  '" . $area_last_id . "', '" . $transport_stopping . "', '" . $bus_no . "', '" . $father_name . "', '" . $mother_name . "', '" . $father_aadhar_number . "', '" . $mother_aadhar_number . "', '" . $occupation . "', '" . $monthly_income . "', '" . $nature_business . "', '" . $position_held . "', '" . $telephone_number . "', '" . $getLivesGuardian . "', '" . $guardian_name . "', '" . $guardian_mobile . "', '" . $guardian_aadhar_number . "', '" . $guardian_email_id . "', '" . $father_mobile_no . "', '" . $mother_mobile_no . "', '" . $father_email_id . "', '" . $sms_mobile_no . "', '" . $sibling_name . "', '" . $sibling_school_name . "', '" . $sibling_standard . "', '" . $sibling_name2 . "', '" . $sibling_school_name2 . "', '" . $sibling_standard2 . "', '" . $sibling_name3 . "', '" . $sibling_school_name3 . "', '" . $sibling_standard3 . "', '" . $any_extra_curricular . "', '" . $userid . "', '" . $school_id . "', '" . $academic_year . "' ) ";

                //     $insresult = $mysqli->query($StudentInsert) or die("Error " . $mysqli->error);
                //     $student_last_id = mysqli_insert_id($mysqli);
                // } else {
                //     $student_last_id = $getStudentCreationQry->fetch()['student_id'];
                // }
                // //Student creation END///

                // //Fees Master START///

                $feesMasterRowCnt = $mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '" . $academic_year . "' AND medium = '" . $fm_medium . "' AND student_type = '" . $fm_student_type . "' AND standard = '" . $standard . "' AND school_id = '" . $school_id . "' order by fees_id desc ");

                if (mysqli_num_rows($feesMasterRowCnt) > 0) {
                    $fee_master_last_id = $feesMasterRowCnt->fetch_assoc()['fees_id'];

                } else {
                    // if ($fm_fee_type == 'Group') {
                    //     $statusname = 'grp_status';
                    // } else if ($fm_fee_type == 'Extra') {
                    //     $statusname = 'extra_status';
                    // } else if ($fm_fee_type == 'Amenity') {
                    //     $statusname = 'amenity_status';
                    // }
                    if ($fm_fee_type == 'Group') {
                        $statusname = 'grp_status';
                    } else if ($fm_fee_type == 'Amenity') {
                        $statusname = 'extra_status';
                    } else if ($fm_fee_type == 'Extra') {
                        $statusname = 'amenity_status';
                    }

                    $insertClass = $mysqli->query("INSERT INTO fees_master(`academic_year`, `medium`, `student_type`, `standard`, `$statusname`, `insert_login_id`, `school_id`) VALUES('" . $academic_year . "','" . $fm_medium . "', '" . $fm_student_type . "','" . $standard . "','1','" . $userid . "', '" . $school_id . "')");
                    $fee_master_last_id = mysqli_insert_id($mysqli);
                }

                if ($fm_fee_type == 'Group') {
                    $getGrpCntQry = $connect->query("SELECT `grp_course_id` FROM `group_course_fee` WHERE `fee_master_id` ='$fee_master_last_id' AND `grp_particulars` ='$fm_fee_particulars' order by grp_course_id desc ");
                    if ($getGrpCntQry->rowCount() > 0) {
                        $feetype_last_id = $getGrpCntQry->fetch()['grp_course_id'];
                        $connect->query("UPDATE `group_course_fee` SET `status`='1' WHERE `grp_course_id`='$feetype_last_id'");
                    } else {
                        $insertGrpFees = $mysqli->query("INSERT INTO `group_course_fee`(`fee_master_id`, `grp_particulars`, `grp_amount`, `grp_date`) VALUES ('" . $fee_master_last_id . "','" . $fm_fee_particulars . "','" . $fm_fee_amount . "','" . $fm_due_date . "' )");
                        $feetype_last_id = mysqli_insert_id($mysqli);
                    }
                } else if ($fm_fee_type == 'Amenity') { //Because in ASP.NET they inserted all amenity in extra so here interchanging the record. 
                    $getExtraCntQry = $connect->query("SELECT `extra_fee_id` FROM `extra_curricular_activities_fee` WHERE `fee_master_id` ='$fee_master_last_id' AND `extra_particulars` ='$fm_fee_particulars' ORDER BY `extra_fee_id` DESC ");
                    if ($getExtraCntQry->rowCount() > 0) {
                        $feetype_last_id = $getExtraCntQry->fetch()['extra_fee_id'];
                        $connect->query("UPDATE `extra_curricular_activities_fee` SET `status`='1' WHERE `extra_fee_id` ='$feetype_last_id'");
                    } else {
                        $insertExtraFees = $mysqli->query("INSERT INTO `extra_curricular_activities_fee`( `fee_master_id`, `extra_particulars`, `extra_amount`, `extra_date`, `type`) VALUES ('" . $fee_master_last_id . "','" . $fm_fee_particulars . "','" . $fm_fee_amount . "','" . $fm_due_date . "', 'standardwise' )");
                        $feetype_last_id = mysqli_insert_id($mysqli);
                    }
                } else if ($fm_fee_type == 'Extra') {
                    $getAmenityCntQry = $connect->query("SELECT `amenity_fee_id` FROM `amenity_fee` WHERE `fee_master_id` ='$fee_master_last_id' AND `amenity_particulars` ='$fm_fee_particulars' ORDER BY amenity_fee_id DESC ");
                    if ($getAmenityCntQry->rowCount() > 0) {
                        $feetype_last_id = $getAmenityCntQry->fetch()['amenity_fee_id'];
                        $connect->query("UPDATE `amenity_fee` SET `status`='1' WHERE `amenity_fee_id` ='$feetype_last_id'");
                    } else {
                        $insertAmenityFees = $mysqli->query("INSERT INTO `amenity_fee`( `fee_master_id`, `amenity_particulars`, `amenity_amount`, `amenity_date`) VALUES ('" . $fee_master_last_id . "','" . $fm_fee_particulars . "','" . $fm_fee_amount . "','" . $fm_due_date . "' )");
                        $feetype_last_id = mysqli_insert_id($mysqli);
                    }
                }

                // //Fees Master END///

                // //Admission Fees START///
                // //The receipt no is in continues when insert admission_fees and temp_admission_fees so finding which receipt no is max and then increment the no.
                // $getPayFeesQry = $mysqli->query("SELECT receipt_no FROM admission_fees WHERE receipt_no != '' ORDER BY id DESC LIMIT 1 ");
                // if ($getPayFeesQry->num_rows > 0) {
                //     $row = $getPayFeesQry->fetch_assoc();
                //     $receipt_number = $row["receipt_no"];
                // } else {
                //     $receipt_number = 'GPR-1';
                // }

                // $getTempPayFeesQry = $mysqli->query("SELECT ReceiptNo FROM temp_admission_fees WHERE ReceiptNo != '' ORDER BY id DESC LIMIT 1  ");
                // if (mysqli_num_rows($getTempPayFeesQry) > 0) {
                //     $getdata = $getTempPayFeesQry->fetch_assoc();
                //     $receiptno = $getdata['ReceiptNo'];
                // } else {
                //     $receiptno = 'GPR-1';
                // }

                // $maxReceiptNo = max($receipt_number, $receiptno);
                // $splited = explode('-', $maxReceiptNo);
                // $numadded = $splited[1] + 1;
                // $newReceiptNo = $splited[0] . '-' . $numadded;

                // $getAdmissioncntQry = $connect->query("SELECT `id` FROM `admission_fees` WHERE `admission_id` ='$student_last_id' AND `receipt_date` ='$af_receipt_date' AND `academic_year` ='$academic_year' AND `balance_tobe_paid` = '$af_balancetobepaid' ");
                // if ($getAdmissioncntQry->rowCount() > 0) {
                //     $FeesLastInsertId = $getAdmissioncntQry->fetch()['id'];
                // } else {
                //     $insertPayFeesQry = $mysqli->query("INSERT INTO `admission_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `other_charges`, `other_charges_received`, `scholarship`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `created_on`) VALUES ('$student_last_id','$newReceiptNo','$af_receipt_date','$academic_year','$af_other_charges','$af_othercharges_received','$af_scholarship','$af_total_feetobecollected','$af_final_amounttobecollected','$af_collected','$af_balancetobepaid','$school_id','$userid',now())");

                //     $FeesLastInsertId = $mysqli->insert_id;
                // }
                // //Admission Fees END///


                // //Admission Fees Details START///
                // // $getAdmissionDetailscntQry = $connect->query("SELECT * FROM `admission_fees_details` WHERE `admission_fees_ref_id` ='$FeesLastInsertId' ");
                // // if ($afd_fee_received > '0') {

                //     if ($fm_fee_type == 'Group') {
                //         $tablename = 'grptable';
                //         $connect->query("UPDATE `group_course_fee` SET `grp_id_used`='1' WHERE `grp_course_id`='$feetype_last_id'");

                //     } else if ($fm_fee_type == 'Amenity') {
                //         $tablename = 'extratable';
                //         $connect->query("UPDATE `extra_curricular_activities_fee` SET `extra_id_used`='1' WHERE `extra_fee_id` ='$feetype_last_id'");

                //     } else if ($fm_fee_type == 'Extra') {
                //         $tablename = 'amenitytable';
                //         $connect->query("UPDATE `amenity_fee` SET `amenity_id_used`='1' WHERE `amenity_fee_id` ='$feetype_last_id'");

                //     }

                //     $insertFeesDetailsQry = $mysqli->query("INSERT INTO `admission_fees_details`(`admission_fees_ref_id`, `fees_master_id`, `fees_table_name`, `fees_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$FeesLastInsertId','$fee_master_last_id', '$tablename' ,'$feetype_last_id','$afd_fee_received','$afd_balancetobepaid','$afd_scholarship')");
                // // }
                // //Admission Fees Details END///

                // //Admission Fees Denomination START///
                // // $getAdmissionDenominationcntQry = $connect->query("SELECT * FROM `admission_fees_denomination` WHERE `admission_fees_ref_id` ='$FeesLastInsertId' ");
                // if ($afd_fee_received > '0') {
                //     if ($afds_payment_mode == 'Cash Payment') {
                //         $twothousondCnt = (intval($afds_no_thousand) * 2000) / 500;
                //         $get_fivehundred_count = $twothousondCnt + intval($afds_no_fivehundred);
                //         $insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId','$afds_payment_mode', '$academic_year', '$get_fivehundred_count', '0', '$afds_nohundred', '$afds_nofifty', '$afds_twenty', '$afds_noten', '$afds_nofive', '$afds_totalamnt', '$userid', now())");
                //     } else if ($afds_payment_mode == 'Cheque') {
                //         $insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId', '$afds_payment_mode', '$academic_year', '$afds_chequeno','$afds_cheque_date', '$afds_cheque_amnt', '$afds_bank_name', '$userid', now())");
                //     } else if ($afds_payment_mode == 'NEFT') {
                //         $insertCashDenomination = $mysqli->query("INSERT INTO `admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `created_on`) VALUES ('$FeesLastInsertId', '$afds_payment_mode', '$academic_year', '$afds_neft_ref_no','$afds_neft_tran_date', '$afds_amnt', '$afds_neft_bank_name', '$userid', now())");
                //     }
                // }
                // //Admission Fees Denomination END///


                // //Transport Fees START///
                // $selectIC = $mysqli->query("SELECT receipt_no FROM transport_admission_fees WHERE receipt_no != '' ORDER BY id DESC LIMIT 1");

                // if($selectIC->num_rows>0)
                // {
                //     $r_no = $selectIC->fetch_assoc()["receipt_no"];
                //     $splited = explode('-', $r_no);
                //     $rnosplit1 = $splited[1] + 1;
                //     $trans_receipt_number = $splited[0]. '-' . $rnosplit1;

                // }else{
                //     $trans_receipt_number = "TARC-1";
                // }


                // if($taf_receipt_date !=''){
                //     $getTransportcntQry = $connect->query("SELECT `id` FROM `transport_admission_fees` WHERE `admission_id` ='$student_last_id' AND `receipt_date` ='$taf_receipt_date' AND `academic_year` ='$academic_year' AND `balance_tobe_paid` = '$taf_balancetopaid' ");
                //     if ($getTransportcntQry->rowCount() > 0) {
                //         $transportLastInsertId = $getTransportcntQry->fetch()['id'];
                //     } else {
                //         $insertPayFeesQry = $mysqli->query("INSERT INTO `transport_admission_fees`(`admission_id`, `receipt_no`, `receipt_date`, `academic_year`, `total_fees_tobe_collected`, `final_amount_tobe_collect`, `fees_collected`, `balance_tobe_paid`, `school_id`, `insert_login_id`, `created_on`)VALUES ('$student_last_id','$trans_receipt_number','$taf_receipt_date','$academic_year','$taf_totalfees','$taf_finalAmnt','$taf_fees_collected','$taf_balancetopaid','$school_id','$userid',now())");
    
                //         $transportLastInsertId = $mysqli->insert_id;
                //     }
                // }
                // //Transport Fees END///


                // //Transport Fees Details START///
                // // $getAdmissionDetailscntQry = $connect->query("SELECT * FROM `transport_admission_fees_details` WHERE `admission_fees_ref_id` ='$transportLastInsertId' ");
                // // if ($afd_fee_received > '0') {

                //     $getAreaCreationQry = $mysqli->query("SELECT particulars_id FROM area_creation_particulars WHERE area_creation_id = '$area_last_id' AND particulars = '$tafd_particulars' ");
                //     if(mysqli_num_rows($getAreaCreationQry)>0){
                //         $area_particular_id = $getAreaCreationQry->fetch_assoc()['particulars_id'];
    
                //         $insertFeesDetailsQry = $mysqli->query("
                //         INSERT INTO `transport_admission_fees_details`(`admission_fees_ref_id`, `area_creation_id`, `area_creation_particulars_id`, `fee_received`, `balance_tobe_paid`, `scholarship`) VALUES ('$transportLastInsertId','$area_last_id','$area_particular_id','$tafd_fees_recieved','$tafd_balancetodo','$tafd_scholarship')");
                //     }
                // // }
                // //Transport Fees Details END///

                // //Transport Fees Denomination START///
                // if ($tafd_fees_recieved > '0') {
                //     if ($tafds_payment == 'Cash Payment') {
                //         $two_thousond_Cnt = (intval($tafds_nothousond) * 2000) / 500;
                //         $get_five_hundred_count = $two_thousond_Cnt + intval($tafds_nofivehundred);
                //         $insertCashDenomination = $mysqli->query("
                //         INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `no_five_hundred`, `no_two_hundred`, `no_hundred`, `no_fifty`, `no_twenty`, `no_ten`, `no_five`, `total_amount`, `insert_login_id`, `created_on`) VALUES ('$transportLastInsertId','$tafds_payment','$academic_year','$get_five_hundred_count', '0', '$tafds_nohundred','$tafds_nofifty', '$tafds_notwenty', '$tafds_noten', '$tafds_nofive', '$tafds_totalamnt', '$userid', now())");
                //     } else if ($tafds_payment == 'Cheque') {
                //         $insertCashDenomination = $mysqli->query("
                //         INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `cheque_number`, `cheque_date`, `cheque_amount`, `cheque_bank_name`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`,`created_on`) VALUES ('$transportLastInsertId', '$tafds_payment', '$academic_year', '$tafds_checqueno','$tafds_checquedate', '$tafds_checqueamnt', '$tafds_checquebank', '$userid', now())");
                //     } else if ($tafds_payment == 'NEFT') {
                //         $insertCashDenomination = $mysqli->query("
                //         INSERT INTO `transport_admission_fees_denomination`(`admission_fees_ref_id`, `payment_mode`, `ledger_ref_id`, `neft_ref_number`, `neft_tran_date`, `neft_amount`, `neft_bank_name`, `insert_login_id`, `update_login_id`, `created_on`, `updated_on`) VALUES ('$transportLastInsertId', '$tafds_payment', '$academic_year', '$tafds_neftrefno','$tafds_nefttransdate', '$tafds_neftamnt', '$tafds_neftbank', '$userid', now())");
                //     }
                // }
                //Transport Fees Denomination END///

            } //foreach
        } //for loop  

        if($insertClass){
            $message = 0;

        }else{
            $message = 1;
        }
    }
} else {
    $message = 1;
}

echo json_encode($message);
