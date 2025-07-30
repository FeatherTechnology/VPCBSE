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
			
                $fees_academic_year = "";
                if(isset($Row[0])) {
                $fees_academic_year = mysqli_real_escape_string($mysqli,$Row[0]);
                }

                $getMedium = "";
                if(isset($Row[1])) {
                $medium = mysqli_real_escape_string($mysqli,$Row[1]);

                    if($medium =='Tamil'){
                        $getMedium = '1';
                    }else{
                        $getMedium = '2';
                    }
                }

                $getStudentType = "";
                if(isset($Row[2])) {
                $student_type = mysqli_real_escape_string($mysqli,$Row[2]);

                    if($student_type =='New Student'){
                        $getStudentType = '1';

                    }else if($student_type =='Old Student'){
                        $getStudentType = '2';

                    }else if($student_type =='Vijayadashami'){
                        $getStudentType = '3';

                    }else if($student_type =='All[NEW & OLD]'){
                        $getStudentType = '4';

                    }
                }

                $standard_list = "";
                if(isset($Row[3])) {
                    $standard_name = mysqli_real_escape_string($mysqli,$Row[3]);
                    if($standard_name == 'PRE.K.G'){
                        $standard_list = "1";
                    }else if($standard_name == 'L.K.G'){
                        $standard_list = "2";
                    }else if($standard_name == 'U.K.G'){
                        $standard_list = "3";
                    }else if($standard_name == 'I'){
                        $standard_list = "4";
                    }else if($standard_name == 'II'){
                        $standard_list = "5";
                    }else if($standard_name == 'III'){
                        $standard_list = "6";
                    }else if($standard_name == 'IV'){
                        $standard_list = "7";
                    }else if($standard_name == 'V'){
                        $standard_list = "8";
                    }else if($standard_name == 'VI'){
                        $standard_list = "9";
                    }else if($standard_name == 'VII'){
                        $standard_list = "10";
                    }else if($standard_name == 'VIII'){
                        $standard_list = "11";
                    }else if($standard_name == 'IX'){
                        $standard_list = "12";
                    }else if($standard_name == 'X'){
                        $standard_list = "13";
                    }else if($standard_name == 'XI_Maths_Biology'){
                        $standard_list = "14";
                    }else if($standard_name == 'XI_Maths_ComputerScience'){
                        $standard_list = "15";
                    }else if($standard_name == 'XI_Biology_ComputerScience'){
                        $standard_list = "16";
                    }else if($standard_name == 'XI_Commerce_ComputerScience'){
                        $standard_list = "17";
                    }else if($standard_name == 'XI_All'){
                        $standard_list = "18";
                    }else if($standard_name == 'XII_Maths_Biology'){
                        $standard_list = "19";
                    }else if($standard_name == 'XII_Maths_ComputerScience'){
                        $standard_list = "20";
                    }else if($standard_name == 'XII_Biology_ComputerScience'){
                        $standard_list = "21";
                    }else if($standard_name == 'XII_Commerce_ComputerScience'){
                        $standard_list = "22";
                    }else{
                        $standard_list = "23";
                    }
                }
                
                $particulars = "";
                if(isset($Row[4])) {
                $particulars = mysqli_real_escape_string($mysqli,$Row[4]);
                }

                $amount = "";
                if(isset($Row[5])) {
                $amount = mysqli_real_escape_string($mysqli,$Row[5]);
                }

                $date = "";
                if(isset($Row[6])) {
                $changedateformat = mysqli_real_escape_string($mysqli,$Row[6]);
                $date = date('Y-m-d', strtotime($changedateformat));
                }

                $getType = "";
                if(isset($Row[7])) {
                $type = mysqli_real_escape_string($mysqli,$Row[7]);

                    if($type =='Common'){
                        $getType = 'common';
                    }else{
                        $getType = 'standardwise';
                    }
                }
			
                if(isset($_POST['feesType'])){
                    $fees_type = $_POST['feesType'];
                }
                
                if($fees_type =='1'){ //Group Fees
                    if($fees_academic_year!="" && $getMedium !="" && $getStudentType!="" && $standard_list !="" && $particulars !="" && $amount !="" && $date !="" ){ 

                        $feeMasterrowcnt=$mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '".$fees_academic_year."' AND medium = '".$getMedium."' AND student_type = '".$getStudentType."' AND standard = '".$standard_list."' AND school_id = '".$school_id."' order by fees_id desc ");

                        if(mysqli_num_rows($feeMasterrowcnt) > 0){
                            $fee_master_last_id = $feeMasterrowcnt->fetch_assoc()['fees_id'];

                            $insertClass=$mysqli->query("UPDATE `fees_master` SET `grp_status`='1',`update_login_id`='$userid',`updated_date`= now() WHERE `fees_id`='$fee_master_last_id' ");
                            
                        }else{
                            $insertClass=$mysqli->query("INSERT INTO fees_master(academic_year, medium, student_type, standard, grp_status, insert_login_id, school_id) VALUES('".$fees_academic_year."','".$getMedium."', '".$getStudentType."','".$standard_list."','1','".$userid."', '".$school_id."')");
                            $fee_master_last_id = mysqli_insert_id($mysqli);
                        }

                        $insertFees = $mysqli->query("INSERT INTO `group_course_fee`(`fee_master_id`, `grp_particulars`, `grp_amount`, `grp_date`) VALUES ('".$fee_master_last_id."','".$particulars."','".$amount."','".$date."' )");
                    }
                }else if($fees_type =='2'){ //Extra Fees
                    if($fees_academic_year!="" && $getMedium !="" && $getStudentType!="" && $standard_list !="" && $particulars !="" && $amount !="" && $date !="" && $getType!="" ){ 
                        $feeMasterrowcnt=$mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '".$fees_academic_year."' AND medium = '".$getMedium."' AND student_type = '".$getStudentType."' AND standard = '".$standard_list."' AND school_id = '".$school_id."' order by fees_id desc ");

                        if(mysqli_num_rows($feeMasterrowcnt) > 0){
                            $fee_master_last_id = $feeMasterrowcnt->fetch_assoc()['fees_id'];

                            $insertClass=$mysqli->query("UPDATE `fees_master` SET `extra_status`='1',`update_login_id`='$userid',`updated_date`= now() WHERE `fees_id`='$fee_master_last_id' ");

                        }else{
                            $insertClass=$mysqli->query("INSERT INTO fees_master(academic_year, medium, student_type, standard, extra_status, insert_login_id, school_id) VALUES('".$fees_academic_year."','".$getMedium."', '".$getStudentType."','".$standard_list."','1','".$userid."','".$school_id."')");
                            $fee_master_last_id = mysqli_insert_id($mysqli);
                            
                        }

                        $insertFees = $mysqli->query("INSERT INTO `extra_curricular_activities_fee`( `fee_master_id`, `extra_particulars`, `extra_amount`, `extra_date`, `type`) VALUES ('".$fee_master_last_id."','".$particulars."','".$amount."','".$date."', '".$getType."' )");
                    }

                }else if($fees_type =='3'){ //Amenity Fees
                    if($fees_academic_year!="" && $getMedium !="" && $getStudentType!="" && $standard_list !="" && $particulars !="" && $amount !="" && $date !="" ){ 
                        $feeMasterrowcnt=$mysqli->query("SELECT fees_id FROM `fees_master` WHERE academic_year = '".$fees_academic_year."' AND medium = '".$getMedium."' AND student_type = '".$getStudentType."' AND standard = '".$standard_list."' AND school_id = '".$school_id."' order by fees_id desc ");

                        if(mysqli_num_rows($feeMasterrowcnt) > 0){
                            $fee_master_last_id = $feeMasterrowcnt->fetch_assoc()['fees_id'];
                
                            $insertClass=$mysqli->query("UPDATE `fees_master` SET `amenity_status`='1',`update_login_id`='$userid',`updated_date`=now() WHERE `fees_id`='$fee_master_last_id' ");
                
                        }else{
                            $insertClass=$mysqli->query("INSERT INTO fees_master(academic_year, medium, student_type, standard, amenity_status, insert_login_id, school_id) VALUES('".$fees_academic_year."','".$getMedium."', '".$getStudentType."','".$standard_list."','1','".$userid."','".$school_id."') ");
                            $fee_master_last_id = mysqli_insert_id($mysqli);
                        }
                
                        $insertFees = $mysqli->query("INSERT INTO `amenity_fee`( `fee_master_id`, `amenity_particulars`, `amenity_amount`, `amenity_date`) VALUES ('".$fee_master_last_id."','".$particulars."','".$amount."','".$date."' )");
                    }
                }
            }//foreach
        }//for loop  

    if(!empty($insertFees)) {
        $message = 0;
    }else{
        $message = 1;
    }
}
    }else{
        $message = 121;
    }
echo json_encode($message);
?>