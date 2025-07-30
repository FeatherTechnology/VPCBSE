<?php
include '../../ajaxconfig.php';
session_start();

if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id']; 
} 
if(isset($_POST['section'])){
    $section = $_POST['section']; 
}
if(isset($_POST['standard'])){
    $standard = $_POST['standard']; 
}
if(isset($_POST['medium'])){
    $medium = $_POST['medium']; 
}
if(isset($_POST['student_name1'])){
    $student_name1 = $_POST['student_name1']; 
}
if(isset($_SESSION["academic_year"])){
   
    $academic_years = $_SESSION["academic_year"];
} 
$feeDetails = array();

if(isset($student_id)){

       
    // $currentYear = date("Y");
    // $currentAcademicYear = ($currentYear) . '-' .($currentYear + 1); 2023-2024
     $currentAcademicYear = $_SESSION["academic_year"];
    
    //fetch student Details
    $getct = "SELECT * FROM student_creation WHERE student_id = '".$student_id."' AND status=0";
    // print_r($getct);
    $result = $mysqli->query($getct);
    while($row=$result->fetch_assoc())
    {
        $student_id = $row['student_id'];
        $admission_number = $row['admission_number'];
        $section= $row['section'];
        $student_name= $row['student_name'];
        $studentrollno	= $row['studentrollno'];
        $student_type=$row['studentstype'];
        $transportId= $row['transportarearefid'];
        $extra_curriculars= $row['extra_curricular'];
        if($extra_curriculars == ''){
            $extra_curricular= '0';

        }else{
            $extra_curricular= $row['extra_curricular'];

        }

        //fetch fees master details
        $getct1="SELECT * FROM fees_master WHERE medium ='$medium' AND standard='$standard' AND student_type='$student_type' AND academic_year ='$currentAcademicYear' AND status=0"; 
        $result1 = $mysqli->query($getct1);
        $grp_amount = 0;
        // $extra_amount = 0;
        $amenity_amount = 0;
        if($result1->num_rows > 0){
            while($row1=$result1->fetch_assoc())
            {
                $fees_id = $row1['fees_id'];
                $sumgrp = $row1['grp_amount'];
                // $sumextra = $row1['extra_amount'];
                $sumamenity = $row1['amenity_amount'];
    
                $grp_amount += $sumgrp;
                // $extra_amount += $sumextra;
                $amenity_amount += $sumamenity;
            }
            $ctselect="SELECT * FROM fees_master WHERE medium ='$medium' AND  student_type='$student_type' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0 AND fees_id IN ($extra_curricular)"; 
            $result10 = $mysqli->query($ctselect);
            $extra_amount = 0;
            while($row10=$result10->fetch_assoc())
            {
            $sumextra = $row10['extra_amount'];
            $extra_amount += $sumextra;
    
            }
        }
    
        //fetch transport fees details
        $getct5 = "SELECT * FROM area_creation WHERE area_id = '".$transportId."' AND  status=0"; 
        $result1 = $mysqli->query($getct5);
    
        if($result1->num_rows > 0){
            while($row1=$result1->fetch_assoc())
            {
                $area_id = $row1['area_id'];
                $tranport_grp_amount = $row1['due_amount'];
                $amount_array = explode(",", $tranport_grp_amount);
                $trans_grp_amount = array_sum($amount_array);
            
            }
        }
        $getct1="SELECT grp_fees_total_received,extra_fees_total_received, amenity_fees_total_received, grp_concession_fees,extra_concession_fees,pay_fees.academic_year,
        amenity_concession_fees, amenity_fees_balance, extra_fees_balance, grp_fees_balance, standard, pay_fees_ref.student_id FROM pay_fees_ref JOIN pay_fees ON (pay_fees_ref.pay_fees_id = pay_fees.pay_fees_id)
         WHERE pay_fees.standard='$standard' AND pay_fees.academic_year ='".$currentAcademicYear."' AND pay_fees_ref.student_id = '".$student_id."' AND pay_fees_ref.status=0"; 
        $result1 = $mysqli->query($getct1);
        $grp_amountre = 0;
        $extra_amountre = 0;
        $amenity_amountre = 0;
        $grp_con = 0;
        $extra_con = 0;
        $amenity_con = 0;
        $grp_balance = 0;
        $extra_balance = 0;
        $amenity_balance = 0;
        if($result1->num_rows > 0){
            while($row1=$result1->fetch_assoc())
            {
                
                $sumgrp = $row1['grp_fees_total_received'];
                $sumextra = $row1['extra_fees_total_received'];
                $sumamenity = $row1['amenity_fees_total_received'];
                $sumgrpcon = $row1['grp_concession_fees'];
                $sumextracon = $row1['extra_concession_fees'];
                $sumamenitycon = $row1['amenity_concession_fees'];
                $sumgrpbalance = $row1['grp_fees_balance'];
                $sumextrabalance = $row1['extra_fees_balance'];
                $sumamenitybalance = $row1['amenity_fees_balance'];
                $academic_year = $row1['academic_year'];
                
                $grp_amountre += $sumgrp;
                $extra_amountre += $sumextra;
                $amenity_amountre += $sumamenity;
                $grp_con += $sumgrpcon;
                $extra_con += $sumextracon;
                $amenity_con += $sumamenitycon;
                $grp_balance += $sumgrpbalance;
                $extra_balance += $sumextrabalance;
                $amenity_balance += $sumamenitybalance;
            }
        }
    
        //pay transport detaisl
        $getct1 = "SELECT transport_concession_fees_total,transport_received_fees_total, transport_fees_ref.student_id FROM transport_fees_ref JOIN pay_transport_fees ON (transport_fees_ref.transport_fees_id = pay_transport_fees.pay_transport_fees_id)
         WHERE standard = '".$standard."' AND transport_fees_ref.student_id = '".$student_id."' AND pay_transport_fees.academic_year= '".$currentAcademicYear."' AND  transport_fees_ref.status=0";
        $result1 = $mysqli->query($getct1);
        $transport_concession_fees_total = 0;
        $transport_received_fees_total = 0;
       
        if($result1->num_rows > 0){
            while($row1=$result1->fetch_assoc())
            {
                
                $sumgrp = $row1['transport_concession_fees_total'];
                $sumextra = $row1['transport_received_fees_total'];
                
                $transport_concession_fees_total += $sumgrp;
                $transport_received_fees_total += $sumextra;
                
            }
        }
    
    
       
        
        //pay last year fees details 2023-2024 INTO 2022-2023
        $years = explode('-', $academic_years);
        $first_year = $years[0]; // 2023
        $second_year = $years[1]; // 2024
        $new_first_year = $first_year - 1; // SUB 1 to the second year
        $new_second_year = $second_year - 1; // SUB 1 to the second year
        $currentAcademicLastYear = $new_first_year . '-' . $new_second_year; // Combine the years with '-'
        // $currentYear = date("Y");
        // $currentAcademicLastYear = ($currentYear - 1) . '-' .($currentYear);2022-2023
        $getct1 = "SELECT grp_fees_total_received,grp_concession_fees, pay_last_year_fees.academic_year,grp_fees_balance, standard, pay_last_year_fees_ref.student_id FROM pay_last_year_fees_ref JOIN pay_last_year_fees ON (pay_last_year_fees_ref.pay_last_year_fees_id = pay_last_year_fees.pay_last_year_fees_id)
         WHERE standard = '".$standard."' AND pay_last_year_fees_ref.student_id = '".$student_id."' AND pay_last_year_fees.academic_year = '".$currentAcademicLastYear."' AND  pay_last_year_fees_ref.status=0";
        $result1 = $mysqli->query($getct1);
        $grp_amounlast= 0;
        $grp_conlast = 0;
        if($result1->num_rows > 0){
            while($row1=$result1->fetch_assoc())
            {
                
                $sumgrp = $row1['grp_fees_total_received'];
                $sumgrpcon = $row1['grp_concession_fees'];
               
                
                
                $grp_amounlast+= $sumgrp;
                $grp_conlast += $sumgrpcon;
            }
        }
    
           
            $ctselect = "SELECT * FROM pay_fees WHERE student_id = '$student_id' AND standard = '$standard' AND academic_year = '$currentAcademicLastYear' AND status = 0 AND amount_balance > 0";
            $ctresult = $mysqli->query($ctselect);
            if ($ctresult->num_rows > 0) {
            $i = 1;
            while ($ct = $ctresult->fetch_assoc()) {
            $s_array = explode(",", $ct['grp_particulars']);
            $s_array1 = explode(",", $ct['grp_amount']);
            $s_array2 = explode(",", $ct['amount_balance']);
            $s_array3 = explode(",", $ct['extra_particulars']);
            $s_array4 = explode(",", $ct['extra_amount']);
            $s_array5 = explode(",", $ct['amenity_particulars']);
            $s_array6 = explode(",", $ct['amenity_amount']);
            $s_array7 = explode(",", $ct['grp_fees_id']);
            $s_array8 = explode(",", $ct['extra_fees_id']);
            $s_array9 = explode(",", $ct['amenity_fees_id']);
            $last_academic_year = $ct['academic_year']; 
            }
            }
            $ctselect1 = "SELECT * FROM pay_transport_fees WHERE student_id = '$student_id' AND standard = '$standard' AND academic_year = '$currentAcademicYear' AND status = 0 AND amount_balance > 0";
            $ctresult1 = $mysqli->query($ctselect);
    
            if ($ctresult1->num_rows > 0) {
                $i = 1;
                while ($ct = $ctresult1->fetch_assoc()) {
                $s_array10 = explode(",", $ct['grp_particulars']);
                $s_array11 = explode(",", $ct['grp_amount']);
                $s_array12 = explode(",", $ct['amount_balance']);
                $s_array13 = explode(",", $ct['transport_fees_master_id']);
            }
                $mergedamountArray = array_merge($s_array1, $s_array4,$s_array6,$s_array11);
                $totalSum = array_sum($mergedamountArray);
            }
            }

    $feeDetails['student_id'] = isset($student_id) ? $student_id : '';
    $feeDetails['admission_number'] = isset($admission_number) ? $admission_number : '';
    $feeDetails['section'] = isset($section) ? $section : '';
    $feeDetails['student_name'] = isset($student_name) ? $student_name : '';
    $feeDetails['fees_id'] = isset($fees_id) ? $fees_id : '';
    $feeDetails['studentrollno'] = isset($studentrollno) ? $studentrollno : '';
    $feeDetails['grp_amountre'] = isset($grp_amountre) ? $grp_amountre : '';
    $feeDetails['extra_amountre'] = isset($extra_amountre) ? $extra_amountre : '';
    $feeDetails['amenity_amountre'] = isset($amenity_amountre) ? $amenity_amountre : '';
    $feeDetails['amenity_amount'] = isset($amenity_amount) ? $amenity_amount : '';
    $feeDetails['grp_amount'] = isset($grp_amount) ? $grp_amount : '';
    $feeDetails['extra_amount'] = isset($extra_amount) ? $extra_amount : '';
    $feeDetails['trans_grp_amount'] = isset($trans_grp_amount) ? $trans_grp_amount : '';
    $feeDetails['transport_concession_fees_total'] = isset($transport_concession_fees_total) ? $transport_concession_fees_total : '';
    $feeDetails['transport_received_fees_total'] = isset($transport_received_fees_total) ? $transport_received_fees_total : '';
    $feeDetails['grp_con'] = isset($grp_con) ? $grp_con : '';
    $feeDetails['extra_con'] = isset($extra_con) ? $extra_con : '';
    $feeDetails['amenity_con'] = isset($amenity_con) ? $amenity_con : '';
    $feeDetails['grp_balance'] = isset($grp_balance) ? $grp_balance : '';
    $feeDetails['extra_balance'] = isset($extra_balance) ? $extra_balance : '';
    $feeDetails['amenity_balance'] = isset($amenity_balance) ? $amenity_balance : '';
    $feeDetails['academic_year'] = isset($academic_year) ? $academic_year : '';
    $feeDetails['totalSum'] = isset($totalSum) ? $totalSum : '';
    $feeDetails['grp_amounlast'] = isset($grp_amounlast) ? $grp_amounlast : '';
    $feeDetails['grp_conlast'] = isset($grp_conlast) ? $grp_conlast : '';

} elseif(isset($student_name1)){ 
    
    // $currentYear = date("Y");
    // $currentAcademicYear = ($currentYear) . '-' .($currentYear + 1);2023-2024
     $currentAcademicYear = $_SESSION["academic_year"];
     //fetch student Details
    $getct3 = "SELECT * FROM student_creation WHERE student_id = '".$student_name1."' AND status=0"; 
    $result3 = $mysqli->query($getct3);
    while($row3=$result3->fetch_assoc())
    {
        $upd = $row3['student_id'];
        $student_id1 = $row3['student_id'];
        $admission_number = $row3['admission_number']; 
        $section= $row3['section']; 
        $studentrollno	= $row3['studentrollno'];
        $student_name= $row3['student_name'];
        $standard1= $row3['standard'];
        $medium1= $row3['medium'];
        $student_type= $row3['studentstype'];
        $transportId= $row3['transportarearefid'];
        $extra_curriculars= $row3['extra_curricular'];
        if($extra_curriculars == ''){
            $extra_curricular= '0';

        }else{
            $extra_curricular= $row3['extra_curricular'];

        }
      

//fetch fees master details


    $getct1="SELECT * FROM fees_master WHERE medium ='$medium1' AND standard='$standard1' AND academic_year ='$currentAcademicYear' AND student_type='$student_type' AND status=0"; 
    $result1 = $mysqli->query($getct1);
    $grp_amount = 0;
    $extra_amount = 0;
    $amenity_amount = 0;
    if($result1->num_rows > 0){
        while($row1=$result1->fetch_assoc())
        {
            $fees_id = $row1['fees_id'];
            $sumgrp = $row1['grp_amount'];
            // $sumextra = $row1['extra_amount'];
            $sumamenity = $row1['amenity_amount'];
            $grp_amount += $sumgrp;
            // $extra_amount += $sumextra;
            $amenity_amount += $sumamenity;
        }
        $ctselect="SELECT * FROM fees_master WHERE medium ='$medium1' AND standard='$standard1' AND student_type='$student_type' AND academic_year ='$currentAcademicYear' AND status=0 AND fees_id IN ($extra_curricular)"; 
        // echo "$ctselect".$ctselect; die;
        $result10 = $mysqli->query($ctselect);
        // $extra_amount = 0;
        while($row10=$result10->fetch_assoc())
        {
        $sumextra = $row10['extra_amount'];
        $extra_amount += $sumextra;

        }

    }

  
                                                                                                              
    //fetch transport fees details
    $getct5 = "SELECT * FROM area_creation WHERE area_id = '".$transportId."' AND  status=0"; 
    $result1 = $mysqli->query($getct5);

    if($result1->num_rows > 0){
        while($row1=$result1->fetch_assoc())
        {
            $area_id = $row1['area_id'];
            $tranport_grp_amount = $row1['due_amount'];
            $amount_array = explode(",", $tranport_grp_amount);
            $trans_grp_amount = array_sum($amount_array);
        
        }
    }
    $getct1="SELECT * FROM pay_fees WHERE standard='$standard1' AND academic_year ='".$currentAcademicYear."' AND student_id = '".$student_name1."' AND status=0"; 
    $result1 = $mysqli->query($getct1);
    $grp_amountre = 0;
    $extra_amountre = 0;
    $amenity_amountre = 0;
    $grp_con = 0;
    $extra_con = 0;
    $amenity_con = 0;
    $grp_balance = 0;
    $extra_balance = 0;
    $amenity_balance = 0;
    if($result1->num_rows > 0){
        while($row1=$result1->fetch_assoc())
        {
            
            // $sumgrp1 = $row1['amount_recieved'];
            // $sumextra2 = $row1['extra_amount_recieved'];
            // $sumamenity3 = $row1['amenity_amount_recieved'];
            // $sumgrpcon4 = $row1['grp_concession_amount'];
            // $sumextracon5 = $row1['extra_concession_amount'];
            // $sumamenitycon6 = $row1['amenity_concession_amount'];
            // $sumgrpbalance7 = $row1['amount_balance'];
            // $sumextrabalance8 = $row1['extra_amount_balance'];
            // $sumamenitybalance9 = $row1['amenity_amount_balance'];
            // $academic_year10 = $row1['academic_year'];
          
            $sumgrp = explode(',', $row1['amount_recieved']); // Extract the numbers as an array
            $sumextra = explode(',', $row1['extra_amount_recieved']);
            $sumamenity = explode(',', $row1['amenity_amount_recieved']);
            $sumgrpcon = explode(',', $row1['grp_concession_amount']);
            $sumextracon = explode(',',  $row1['extra_concession_amount']);
            $sumamenitycon = explode(',', $row1['amenity_concession_amount']);
            $sumgrpbalance = explode(',', $row1['amount_balance']);
            $sumextrabalance = explode(',', $row1['extra_amount_balance']);
            $sumamenitybalance = explode(',', $row1['amenity_amount_balance']);
            $academic_year = $row1['academic_year'];
          
            function calcu($numbers){

                $sum = 0;
                foreach ($numbers as $number) {
                    $sum += intval($number); // Convert each number to an integer and add it to the sum
                }
                return $sum;
            }
             
            $grp_amountre = calcu($sumgrp);
            $extra_amountre = calcu($sumextra);
            $amenity_amountre = calcu($sumamenity);
            $grp_con = calcu($sumgrpcon);
            $extra_con = calcu($sumextracon);
            $amenity_con = calcu($sumamenitycon);
            $grp_balance = calcu($sumgrpbalance);
            $extra_balance = calcu($sumextrabalance);
            $amenity_balance = calcu($sumamenitybalance);
            
            // $grp_amountre += $sumgrp;
            // $extra_amountre += $sumextra;
            // $amenity_amountre += $sumamenity;
            // $grp_con += $sumgrpcon;
            // $extra_con += $sumextracon;
            // $amenity_con += $sumamenitycon;
            // $grp_balance += $sumgrpbalance;
            // $extra_balance += $sumextrabalance;
            // $amenity_balance += $sumamenitybalance;
        }
    }

    //pay transport detaisl
    $getct1 = "SELECT * FROM pay_transport_fees WHERE standard = '".$standard1."' AND student_id = '".$student_name1."' AND academic_year= '".$currentAcademicYear."' AND  status=0";
    $result1 = $mysqli->query($getct1);
    $transport_concession_fees_total = 0;
    $transport_received_fees_total = 0;
   
    if($result1->num_rows > 0){
        while($row1=$result1->fetch_assoc())
        {
            
            $sumgrp = explode(',', $row1['transport_concession_amount']);
            $sumextra = explode(',', $row1['amount_recieved']);
            // $sumgrp = $row1['transport_concession_amount'];
            // $sumextra = $row1['amount_recieved'];
            function calc($numbers){

                $sum = 0;
                foreach ($numbers as $number) {
                    $sum += intval($number); // Convert each number to an integer and add it to the sum
                }
                return $sum;
            }
            $transport_concession_fees_total = calc($sumgrp);
            $transport_received_fees_total = calc($sumextra);
            // $transport_concession_fees_total += $sumgrp;
            // $transport_received_fees_total += $sumextra;
            
        }
    }


   
    
    //pay last year fees details
    $years = explode('-', $academic_years);
    $first_year = $years[0]; // 2023
    $second_year = $years[1]; // 2024
    $new_first_year = $first_year - 1; // SUB 1 to the second year
    $new_second_year = $second_year - 1; // SUB 1 to the second year
    $currentAcademicLastYear = $new_first_year . '-' . $new_second_year; // Combine the years with '-'
    // $currentYear = date("Y");
    // $currentAcademicLastYear = ($currentYear - 1) . '-' .($currentYear);2022-2023
    
    $getct1 = "SELECT grp_fees_total_received,grp_concession_fees, pay_last_year_fees.academic_year,grp_fees_balance, standard, pay_last_year_fees_ref.student_id FROM pay_last_year_fees_ref JOIN pay_last_year_fees ON (pay_last_year_fees_ref.pay_last_year_fees_id = pay_last_year_fees.pay_last_year_fees_id)
     WHERE standard = '".$standard1."' AND pay_last_year_fees_ref.student_id = '".$student_name1."' AND pay_last_year_fees.academic_year = '".$currentAcademicLastYear."' AND  pay_last_year_fees_ref.status=0";
    $result1 = $mysqli->query($getct1);
    $grp_amounlast= 0;
    $grp_conlast = 0;
    if($result1->num_rows > 0){
        while($row1=$result1->fetch_assoc())
        {
            
            $sumgrp = $row1['grp_fees_total_received'];
            $sumgrpcon = $row1['grp_concession_fees'];
           
            
            
            $grp_amounlast+= $sumgrp;
            $grp_conlast += $sumgrpcon;
        }
    }

       
        $ctselect = "SELECT * FROM pay_fees WHERE student_id = '$student_name1' AND standard = '$standard1' AND academic_year = '$currentAcademicLastYear' AND status = 0 AND amount_balance > 0";
        $ctresult = $mysqli->query($ctselect);
        if ($ctresult->num_rows > 0) {
        $i = 1;
        while ($ct = $ctresult->fetch_assoc()) {
        $s_array = explode(",", $ct['grp_particulars']);
        $s_array1 = explode(",", $ct['grp_amount']);
        $s_array2 = explode(",", $ct['amount_balance']);
        $s_array3 = explode(",", $ct['extra_particulars']);
        $s_array4 = explode(",", $ct['extra_amount']);
        $s_array5 = explode(",", $ct['amenity_particulars']);
        $s_array6 = explode(",", $ct['amenity_amount']);
        $s_array7 = explode(",", $ct['grp_fees_id']);
        $s_array8 = explode(",", $ct['extra_fees_id']);
        $s_array9 = explode(",", $ct['amenity_fees_id']);
        $last_academic_year = $ct['academic_year']; 
        }
        }
        $ctselect1 = "SELECT * FROM pay_transport_fees WHERE student_id = '$student_name1' AND standard = '$standard1' AND academic_year = '$currentAcademicYear' AND status = 0 AND amount_balance > 0";
        $ctresult1 = $mysqli->query($ctselect);

        if ($ctresult1->num_rows > 0) {
            $i = 1;
            while ($ct = $ctresult1->fetch_assoc()) {
            $s_array10 = explode(",", $ct['grp_particulars']);
            $s_array11 = explode(",", $ct['grp_amount']);
            $s_array12 = explode(",", $ct['amount_balance']);
            $s_array13 = explode(",", $ct['transport_fees_master_id']);
        }
            $mergedamountArray = array_merge($s_array1, $s_array4,$s_array6,$s_array11);
            $totalSum = array_sum($mergedamountArray);
        }
        }
    $feeDetails['student_id'] = isset($student_id) ? $student_id : '';
    $feeDetails['admission_number'] = isset($admission_number) ? $admission_number : '';
    $feeDetails['section'] = isset($section) ? $section : '';
    $feeDetails['student_name'] = isset($student_name) ? $student_name : '';
    $feeDetails['fees_id'] = isset($fees_id) ? $fees_id : '';
    $feeDetails['studentrollno'] = isset($studentrollno) ? $studentrollno : '';
    $feeDetails['grp_amountre'] = isset($grp_amountre) ? $grp_amountre : '';
    $feeDetails['extra_amountre'] = isset($extra_amountre) ? $extra_amountre : '';
    $feeDetails['amenity_amountre'] = isset($amenity_amountre) ? $amenity_amountre : '';
    $feeDetails['amenity_amount'] = isset($amenity_amount) ? $amenity_amount : '';
    $feeDetails['grp_amount'] = isset($grp_amount) ? $grp_amount : '';
    $feeDetails['extra_amount'] = isset($extra_amount) ? $extra_amount : '';
    $feeDetails['trans_grp_amount'] = isset($trans_grp_amount) ? $trans_grp_amount : '';
    $feeDetails['transport_concession_fees_total'] = isset($transport_concession_fees_total) ? $transport_concession_fees_total : '';
    $feeDetails['transport_received_fees_total'] = isset($transport_received_fees_total) ? $transport_received_fees_total : '';
    $feeDetails['grp_con'] = isset($grp_con) ? $grp_con : '';
    $feeDetails['extra_con'] = isset($extra_con) ? $extra_con : '';
    $feeDetails['amenity_con'] = isset($amenity_con) ? $amenity_con : '';
    $feeDetails['grp_balance'] = isset($grp_balance) ? $grp_balance : '';
    $feeDetails['extra_balance'] = isset($extra_balance) ? $extra_balance : '';
    $feeDetails['academic_year'] = isset($academic_year) ? $academic_year : '';
    $feeDetails['amenity_balance'] = isset($amenity_balance) ? $amenity_balance : '';
    $feeDetails['totalSum'] = isset($totalSum) ? $totalSum : '';
    $feeDetails['grp_amounlast'] = isset($grp_amounlast) ? $grp_amounlast : '';
    $feeDetails['grp_conlast'] = isset($grp_conlast) ? $grp_conlast : '';

}

echo json_encode($feeDetails);

?>

