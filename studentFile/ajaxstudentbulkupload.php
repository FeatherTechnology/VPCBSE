<?php
// error_reporting(0);
@session_start();
if(isset($_SESSION['userid'])){ 
    $userid = $_SESSION['userid'];
    $school_id = $_SESSION['school_id'];
    $academic_year = $_SESSION['academic_year'];
    $school_name = $_SESSION['school_name'];
}
require_once('../vendor/csvreader/php-excel-reader/excel_reader2.php');
require_once('../vendor/csvreader/SpreadsheetReader.php');
include("../ajaxconfig.php");

if(isset($_FILES["file"]["type"])){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["file"]["type"],$allowedFileType)){
        //set the directory path name
        $new_directory = ("../uploads/bulkimport/". $school_name);
        //make the directory
        if(file_exists($new_directory) == false){
            mkdir($new_directory, 0777);
        }
        $targetPath = "$new_directory/".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            foreach ($Reader as $Row){
			
                $admission_no = "";
                if(isset($Row[0])) {
                $admission_no = mysqli_real_escape_string($mysqli,$Row[0]);
                }

                $student_name = "";
                if(isset($Row[1])) {
                $student_name = mysqli_real_escape_string($mysqli,$Row[1]);
                }

                $sur_name = "";
                if(isset($Row[2])) {
                $sur_name = mysqli_real_escape_string($mysqli,$Row[2]);
                }
                
                $dob = "";
                if(isset($Row[3])) {
                $getdob = mysqli_real_escape_string($mysqli,$Row[3]);
                $dob = date('Y-m-d',strtotime($getdob));
                }

                $gender = "";
                if(isset($Row[4])) {
                $gender = mysqli_real_escape_string($mysqli,$Row[4]);
                }

                $mother_tongue = "";
                if(isset($Row[5])) {
                $mother_tongue = mysqli_real_escape_string($mysqli,$Row[5]);
                }

                $aadhar_number = "";
                if(isset($Row[6])) {
                $aadhar_number = mysqli_real_escape_string($mysqli,$Row[6]);
                }

                $blood_group = "";
                if(isset($Row[7])) {
                $blood_group = mysqli_real_escape_string($mysqli,$Row[7]);
                }

                $category = "";
                if(isset($Row[8])) {
                $category = mysqli_real_escape_string($mysqli,$Row[8]);
                }

                $caste_name = "";
                if(isset($Row[9])) {
                $caste_name = mysqli_real_escape_string($mysqli,$Row[9]);
                }

                $sub_caste = "";
                if(isset($Row[10])) {
                $sub_caste = mysqli_real_escape_string($mysqli,$Row[10]);
                }

                $nationality = "";
                if(isset($Row[11])) {
                $nationality = mysqli_real_escape_string($mysqli,$Row[11]);
                }

                $religion = "";
                if(isset($Row[12])) {
                $religion = mysqli_real_escape_string($mysqli,$Row[12]);
                }

                $filltoo = "";
                if(isset($Row[13])) {
                $filltoo = mysqli_real_escape_string($mysqli,$Row[13]);
                }

                $flat_no = "";
                if(isset($Row[14])) {
                $flat_no = mysqli_real_escape_string($mysqli,$Row[14]);
                }

                $flat_no1 = "";
                if(isset($Row[15])) {
                $flat_no1 = mysqli_real_escape_string($mysqli,$Row[15]);
                }

                $street = "";
                if(isset($Row[16])) {
                $street = mysqli_real_escape_string($mysqli,$Row[16]);
                }

                $street1 = "";
                if(isset($Row[17])) {
                $street1 = mysqli_real_escape_string($mysqli,$Row[17]);
                }

                $area_locality = "";
                if(isset($Row[18])) {
                $area_locality = mysqli_real_escape_string($mysqli,$Row[18]);
                }

                $area_locality1 = "";
                if(isset($Row[19])) {
                $area_locality1 = mysqli_real_escape_string($mysqli,$Row[19]);
                }

                $district = "";
                if(isset($Row[20])) {
                $district = mysqli_real_escape_string($mysqli,$Row[20]);
                }

                $district1 = "";
                if(isset($Row[21])) {
                $district1 = mysqli_real_escape_string($mysqli,$Row[21]);
                }

                $pincode = "";
                if(isset($Row[22])) {
                $pincode = mysqli_real_escape_string($mysqli,$Row[22]);
                }

                $pincode1 = "";
                if(isset($Row[23])) {
                $pincode1 = mysqli_real_escape_string($mysqli,$Row[23]);
                }

                $standard = "";
                if(isset($Row[24])) {
                    $standard_name = mysqli_real_escape_string($mysqli,$Row[24]);

                    if($standard_name == 'PRE.K.G'){
                        $standard = "1";
                    }else if($standard_name == 'L.K.G'){
                        $standard = "2";
                    }else if($standard_name == 'U.K.G'){
                        $standard = "3";
                    }else if($standard_name == 'I'){
                        $standard = "4";
                    }else if($standard_name == 'II'){
                        $standard = "5";
                    }else if($standard_name == 'III'){
                        $standard = "6";
                    }else if($standard_name == 'IV'){
                        $standard = "7";
                    }else if($standard_name == 'V'){
                        $standard = "8";
                    }else if($standard_name == 'VI'){
                        $standard = "9";
                    }else if($standard_name == 'VII'){
                        $standard = "10";
                    }else if($standard_name == 'VIII'){
                        $standard = "11";
                    }else if($standard_name == 'IX'){
                        $standard = "12";
                    }else if($standard_name == 'X'){
                        $standard = "13";
                    }else if($standard_name == 'XI_Maths_Biology'){
                        $standard = "14";
                    }else if($standard_name == 'XI_Maths_ComputerScience'){
                        $standard = "15";
                    }else if($standard_name == 'XI_Biology_ComputerScience'){
                        $standard = "16";
                    }else if($standard_name == 'XI_Commerce_ComputerScience'){
                        $standard = "17";
                    }else if($standard_name == 'XI_All'){
                        $standard = "18";
                    }else if($standard_name == 'XII_Maths_Biology'){
                        $standard = "19";
                    }else if($standard_name == 'XII_Maths_ComputerScience'){
                        $standard = "20";
                    }else if($standard_name == 'XII_Biology_ComputerScience'){
                        $standard = "21";
                    }else if($standard_name == 'XII_Commerce_ComputerScience'){
                        $standard = "22";
                    }else{
                        $standard = "23";
                    }

                }

                $previous_school_name = "";
                if(isset($Row[25])) {
                $previous_school_name = mysqli_real_escape_string($mysqli,$Row[25]);
                }

                $previous_school_place = "";
                if(isset($Row[26])) {
                $previous_place = mysqli_real_escape_string($mysqli,$Row[26]);
                }

                $previous_doj = "";
                if(isset($Row[27])) {
                $getprevious_doj = mysqli_real_escape_string($mysqli,$Row[27]);
                $previous_doj = date('Y-m-d',strtotime($getprevious_doj));
                }

                $previous_dol = "";
                if(isset($Row[28])) {
                $getprevious_dol = mysqli_real_escape_string($mysqli,$Row[28]);
                $previous_dol = date('Y-m-d',strtotime($getprevious_dol));
                }

                $time_of_tc_handed_over = "";
                if(isset($Row[29])) {
                $time_of_tc_handed_over = mysqli_real_escape_string($mysqli,$Row[29]);
                }

                $previous_school_class_attended = "";
                if(isset($Row[30])) {
                $previous_school_class_attended = mysqli_real_escape_string($mysqli,$Row[30]);
                }

                $section = "";
                if(isset($Row[31])) {
                $section = mysqli_real_escape_string($mysqli,$Row[31]);
                }

                $getMedium = "";
                if(isset($Row[32])) {
                $medium = mysqli_real_escape_string($mysqli,$Row[32]);

                    if($medium =='Tamil'){
                        $getMedium = '1';
                    }else{
                        $getMedium = '2';
                    }
                }

                $student_rollno = "";
                if(isset($Row[33])) {
                $student_rollno = mysqli_real_escape_string($mysqli,$Row[33]);
                }

                $emis_no = "";
                if(isset($Row[34])) {
                $emis_no = mysqli_real_escape_string($mysqli,$Row[34]);
                }

                $getStudentType = "";
                if(isset($Row[35])) {
                $student_type = mysqli_real_escape_string($mysqli,$Row[35]);

                    if($student_type =='New Student'){
                        $getStudentType = '1';

                    }else if($student_type =='Old Student'){
                        $getStudentType = '2';

                    }else if($student_type =='Vijayadashami'){
                        $getStudentType = '3';

                    }else if($student_type =='All[New&Old]'){
                        $getStudentType = '4';

                    }
                }

                $reference_category = "";
                if(isset($Row[36])) {
                $reference_category = mysqli_real_escape_string($mysqli,$Row[36]);
                }

                $ref_staff_id = "";
                if(isset($Row[37])) {
                $ref_staff_id = mysqli_real_escape_string($mysqli,$Row[37]);
                }

                $ref_student_id = "";
                if(isset($Row[38])) {
                $ref_student_id = mysqli_real_escape_string($mysqli,$Row[38]);
                }

                $ref_old_student_id = "";
                if(isset($Row[39])) {
                $ref_old_student_id = mysqli_real_escape_string($mysqli,$Row[39]);
                }

                $reference_category_name = "";
                if(isset($Row[40])) {
                $reference_category_name = mysqli_real_escape_string($mysqli,$Row[40]);
                }

                $concession_type = "";
                if(isset($Row[41])) {
                $concession_type = mysqli_real_escape_string($mysqli,$Row[41]);
                }

                $concession_type_details = "";
                if(isset($Row[42])) {
                $concession_type_details = mysqli_real_escape_string($mysqli,$Row[42]);
                }

                $getFacility = "";
                if(isset($Row[43])) {
                $facility = mysqli_real_escape_string($mysqli,$Row[43]);

                    if($facility =='Yes'){
                        $getFacility = 'Transport';
                    }else{
                        $getFacility = '';
                    }
                }

                $room_category_fee_id = "";
                if(isset($Row[44])) {
                $room_category_fee_id = mysqli_real_escape_string($mysqli,$Row[44]);
                }

                $advance_fee = "";
                if(isset($Row[45])) {
                $advance_fee = mysqli_real_escape_string($mysqli,$Row[45]);
                }

                $room_rent = "";
                if(isset($Row[46])) {
                $room_rent = mysqli_real_escape_string($mysqli,$Row[46]);
                }

                $transport_area_ref_id = "";
                if(isset($Row[47])) {
                $transport_area_ref_id = mysqli_real_escape_string($mysqli,$Row[47]);
                }

                $transport_stopping = "";
                if(isset($Row[48])) {
                $transport_stopping = mysqli_real_escape_string($mysqli,$Row[48]);
                }

                $bus_no = "";
                if(isset($Row[49])) {
                $bus_no = mysqli_real_escape_string($mysqli,$Row[49]);
                }

                $father_name = "";
                if(isset($Row[50])) {
                $father_name = mysqli_real_escape_string($mysqli,$Row[50]);
                }

                $mother_name = "";
                if(isset($Row[51])) {
                $mother_name = mysqli_real_escape_string($mysqli,$Row[51]);
                }

                $father_aadhar_number = "";
                if(isset($Row[52])) {
                $father_aadhar_number = mysqli_real_escape_string($mysqli,$Row[52]);
                }

                $mother_aadhar_number = "";
                if(isset($Row[53])) {
                $mother_aadhar_number = mysqli_real_escape_string($mysqli,$Row[53]);
                }

                $occupation = "";
                if(isset($Row[54])) {
                $occupation = mysqli_real_escape_string($mysqli,$Row[54]);
                }

                $monthly_income = "";
                if(isset($Row[55])) {
                $monthly_income = mysqli_real_escape_string($mysqli,$Row[55]);
                }

                $nature_business = "";
                if(isset($Row[56])) {
                $nature_business = mysqli_real_escape_string($mysqli,$Row[56]);
                }

                $position_held = "";
                if(isset($Row[57])) {
                $position_held = mysqli_real_escape_string($mysqli,$Row[57]);
                }

                $telephone_number = "";
                if(isset($Row[58])) {
                $telephone_number = mysqli_real_escape_string($mysqli,$Row[58]);
                }

                $getLivesGuardian = "";
                if(isset($Row[59])) {
                $lives_guardian = mysqli_real_escape_string($mysqli,$Row[59]);

                    if($lives_guardian =='Yes'){
                        $getLivesGuardian = 'lives_gaurdian';
                    }else{
                        $getLivesGuardian = '';
                    }
                }

                $guardian_name = "";
                if(isset($Row[60])) {
                $guardian_name = mysqli_real_escape_string($mysqli,$Row[60]);
                }

                $guardian_mobile = "";
                if(isset($Row[61])) {
                $guardian_mobile = mysqli_real_escape_string($mysqli,$Row[61]);
                }

                $guardian_aadhar_number = "";
                if(isset($Row[62])) {
                $guardian_aadhar_number = mysqli_real_escape_string($mysqli,$Row[62]);
                }

                $guardian_email_id = "";
                if(isset($Row[63])) {
                $guardian_email_id = mysqli_real_escape_string($mysqli,$Row[63]);
                }

                $father_mobile_no = "";
                if(isset($Row[64])) {
                $father_mobile_no = mysqli_real_escape_string($mysqli,$Row[64]);
                }

                $mother_mobile_no = "";
                if(isset($Row[65])) {
                $mother_mobile_no = mysqli_real_escape_string($mysqli,$Row[65]);
                }

                $father_email_id = "";
                if(isset($Row[66])) {
                $father_email_id = mysqli_real_escape_string($mysqli,$Row[66]);
                }

                $sms_sent_no = "";
                if(isset($Row[67])) {
                $sms_sent_no = mysqli_real_escape_string($mysqli,$Row[67]);
                }

                $extra_curricular = "";
                if(isset($Row[68])) {
                $extra_curricular = mysqli_real_escape_string($mysqli,$Row[68]);
                }

                $sibling_name = "";
                if(isset($Row[69])) {
                $sibling_name = mysqli_real_escape_string($mysqli,$Row[69]);
                }

                $sibling_school_name = "";
                if(isset($Row[70])) {
                $sibling_school_name = mysqli_real_escape_string($mysqli,$Row[70]);
                }

                $sibling_standard = "";
                if(isset($Row[71])) {
                $sibling_standard = mysqli_real_escape_string($mysqli,$Row[71]);
                }

                $sibling_name2 = "";
                if(isset($Row[72])) {
                $sibling_name2 = mysqli_real_escape_string($mysqli,$Row[72]);
                }

                $sibling_school_name2 = "";
                if(isset($Row[73])) {
                $sibling_school_name2 = mysqli_real_escape_string($mysqli,$Row[73]);
                }

                $sibling_standard2 = "";
                if(isset($Row[74])) {
                $sibling_standard2 = mysqli_real_escape_string($mysqli,$Row[74]);
                }

                $sibling_name3 = "";
                if(isset($Row[75])) {
                $sibling_name3 = mysqli_real_escape_string($mysqli,$Row[75]);
                }

                $sibling_school_name3 = "";
                if(isset($Row[76])) {
                $sibling_school_name3 = mysqli_real_escape_string($mysqli,$Row[76]);
                }

                $sibling_standard3 = "";
                if(isset($Row[77])) {
                $sibling_standard3 = mysqli_real_escape_string($mysqli,$Row[77]);
                }

                $any_extra_curricular = "";
                if(isset($Row[78])) {
                $any_extra_curricular = mysqli_real_escape_string($mysqli,$Row[78]);
                }
			

                if($admission_no!="" && $student_name !="" && $gender!="" && $mother_tongue !="" && $standard !="" && $section !="" && $getMedium !="" && $student_rollno !="" && $getStudentType !="" && $sms_sent_no !=""){ 
                    $StudentInsert="INSERT INTO student_creation(admission_number, student_name, sur_name, date_of_birth, gender, mother_tongue, aadhar_number,blood_group, category, castename, sub_caste, nationality, religion, filltoo, flat_no, flat_no1, street, street1, area_locatlity, area_locatlity1, district, district1, pincode, pincode1, standard, previouschoolname, previousplace, strpreviousdoj, strpreviousdol, timeoftchandedover, previousclassattended, section, medium, studentrollno, emisno, studentstype, referencecat, refstaffid, refstudentid, refoldstudentid, referencecatname, concession_type, concessiontypedetails, facility, roomcatogoryfeeid, advancefee, roomrent, transportarearefid, transportstopping, busno, father_name, mother_name, father_aadhar_number, mother_aadhar_number, occupation, monthly_income, nature_business, position_held, telephone_number, lives_gaurdian, gaurdian_name, gaurdian_mobile, gaurdian_aadhar_number, gaurdian_email_id, father_mobile_no, mother_mobile_no, father_email_id, sms_sent_no, extra_curricular, sibling_name, sibling_school_name, sibling_standard, sibling_name2, sibling_school_name2, sibling_standard2, sibling_name3, sibling_school_name3, sibling_standard3, anyextracurricular, insert_login_id, school_id,year_id) 
                    VALUES('".strip_tags($admission_no)."', '".strip_tags($student_name)."', '".strip_tags($sur_name)."', '".strip_tags($dob)."', '".strip_tags($gender)."', '".strip_tags($mother_tongue)."', '".strip_tags($aadhar_number)."', '".strip_tags($blood_group)."', '".strip_tags($category)."', '".strip_tags($caste_name)."', '".strip_tags($sub_caste)."', '".strip_tags($nationality)."', '".strip_tags($religion)."', '".strip_tags($filltoo)."', '".strip_tags($flat_no)."',	'".strip_tags($flat_no1)."', '".strip_tags($street)."', '".strip_tags($street1)."', '".strip_tags($area_locality)."', '".strip_tags($area_locality1)."', '".strip_tags($district)."', '".strip_tags($district1)."', '".strip_tags($pincode)."', '".strip_tags($pincode1)."', '".strip_tags($standard)."', '".strip_tags($previous_school_name)."', '".strip_tags($previous_school_place)."', '".strip_tags($previous_doj)."', '".strip_tags($previous_dol)."', '".strip_tags($time_of_tc_handed_over)."', '".strip_tags($previous_school_class_attended)."', '".strip_tags($section)."', '".strip_tags($getMedium)."', '".strip_tags($student_rollno)."', '".strip_tags($emis_no)."', '".strip_tags($getStudentType)."', '".strip_tags($reference_category)."', '".strip_tags($ref_staff_id)."', '".strip_tags($ref_student_id)."', '".strip_tags($ref_old_student_id)."', '".strip_tags($reference_category_name)."', '".strip_tags($concession_type)."',  '".strip_tags($concession_type_details)."', '".strip_tags($getFacility)."', '".strip_tags($room_category_fee_id)."', '".strip_tags($advance_fee)."', '".strip_tags($room_rent)."', '".strip_tags($transport_area_ref_id)."', '".strip_tags($transport_stopping)."', '".strip_tags($bus_no)."', '".strip_tags($father_name)."', '".strip_tags($mother_name)."', '".strip_tags($father_aadhar_number)."', '".strip_tags($mother_aadhar_number)."', '".strip_tags($occupation)."', '".strip_tags($monthly_income)."', '".strip_tags($nature_business)."', '".strip_tags($position_held)."', '".strip_tags($telephone_number)."', '".strip_tags($getLivesGuardian)."', '".strip_tags($guardian_name)."', '".strip_tags($guardian_mobile)."', '".strip_tags($guardian_aadhar_number)."', '".strip_tags($guardian_email_id)."', '".strip_tags($father_mobile_no)."', '".strip_tags($mother_mobile_no)."', '".strip_tags($father_email_id)."', '".strip_tags($sms_sent_no)."',  '".strip_tags($extra_curricular)."', '".strip_tags($sibling_name)."', '".strip_tags($sibling_school_name)."', '".strip_tags($sibling_standard)."', '".strip_tags($sibling_name2)."', '".strip_tags($sibling_school_name2)."', '".strip_tags($sibling_standard2)."', '".strip_tags($sibling_name3)."', '".strip_tags($sibling_school_name3)."', '".strip_tags($sibling_standard3)."', '".strip_tags($any_extra_curricular)."', '".strip_tags($userid)."', '".strip_tags($school_id)."', '".strip_tags($academic_year)."' ) ";
        
                    $insresult=$mysqli->query($StudentInsert) or die("Error ".$mysqli->error);
                    $stdLastInsertId = $mysqli->insert_id;
                    $StudentHistoryInsert = "INSERT INTO student_history (`student_id`, `standard`, `section`,`studentstype` ,`extra_curricular`, `transportarearefid`, `academic_year`,`insert_login_id`,`created_on`)VALUES('$stdLastInsertId','" . strip_tags($standard) . "','" . strip_tags($section) . "','" . strip_tags($getStudentType) . "','" . strip_tags($extra_curricular) . "','" . strip_tags($transport_area_ref_id) . "','" . strip_tags($academic_year) . "','$userid',now())";
                    $result = $mysqli->query($StudentHistoryInsert) or die("Error " . $mysqli->error);
                } 
            }//foreach
        }//for loop  

    if(!empty($insresult)) {
        $message = 0;
    }else{
        $message = 1;
    }
}
    }else{
        $message = 1;
    }
echo json_encode($message);
?>