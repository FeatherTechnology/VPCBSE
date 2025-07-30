<?php 
include "../ajaxconfig.php";
@session_start();
if(isset($_SESSION['academic_year'])){
    $academicyear = $_SESSION['academic_year'];
}
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}

///////////////////////////////////Total fee START///////////////////////////////////////
$totalamount=0;

$getgrpFeeTotalQry = $connect->query("SELECT COALESCE(SUM(gcf.grp_amount) * (SELECT COUNT(*) from student_creation where standard=fm.standard  AND medium=fm.medium AND year_id=fm.academic_year AND leaving_term!=1 AND leaving_term!=5 AND (
                    CASE
                        WHEN studentstype IN ('1', '2') THEN 
                            (fm.student_type = studentstype OR fm.student_type = '4')
                        ELSE
                            fm.student_type = studentstype
                    END
                ) ),0) AS totalgrpamnt 
FROM `fees_master` fm 
JOIN group_course_fee gcf ON gcf.fee_master_id = fm.fees_id 
WHERE fm.academic_year='$academicyear' && fm.status=0 && fm.school_id = '$school_id' && gcf.status=1 
GROUP BY 
fm.standard,
fm.medium,
fm.student_type");
while($grpFeeInfo = $getgrpFeeTotalQry->fetchObject()){
    $totalamount += $grpFeeInfo->totalgrpamnt;
}

$getExtraFeeTotalQry = $connect->query("SELECT COALESCE(SUM(ecaf.extra_amount), 0) AS extraAmnt
FROM `fees_master` fm
JOIN extra_curricular_activities_fee ecaf ON ecaf.fee_master_id = fm.fees_id
JOIN student_creation sc ON ecaf.extra_fee_id IN (sc.extra_curricular) 
WHERE fm.academic_year = '$academicyear' 
  AND fm.status = 0 
  AND fm.school_id = '$school_id' 
  AND sc.school_id = '$school_id' 
  AND ecaf.status = 1;
 ");
$extraFeeInfo = $getExtraFeeTotalQry->fetchObject();
    $totalamount += $extraFeeInfo->extraAmnt;

$getamenityFeeTotalQry = $connect->query("SELECT COALESCE(SUM(af.amenity_amount) * (SELECT COUNT(*) from student_creation where standard=fm.standard  AND medium=fm.medium AND year_id=fm.academic_year AND  leaving_term!=1 AND leaving_term!=5 AND (
                    CASE
                        WHEN studentstype IN ('1', '2') THEN 
                            (fm.student_type = studentstype OR fm.student_type = '4')
                        ELSE
                            fm.student_type = studentstype
                    END
                ) ),0) AS totalAmenityamnt 
FROM `fees_master` fm 
JOIN amenity_fee af ON af.fee_master_id = fm.fees_id 
WHERE fm.academic_year='$academicyear' && fm.status=0 && fm.school_id = '$school_id' && af.status=1 
GROUP BY 
fm.standard,
fm.medium,
fm.student_type");
while($amenityFeeInfo = $getamenityFeeTotalQry->fetchObject()){
    $totalamount += $amenityFeeInfo->totalAmenityamnt;
}

///////////////////////////// Total Fee END ///////////////////////////////////


/////////////////////Total fee collected START //////////////////////////////
$paidFee=0;
$getPaidFeeCount = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS paidFee FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE af.academic_year = '$academicyear' && af.school_id = '$school_id' ");
if($paidFeeInfo = $getPaidFeeCount->fetchObject()){
    $paidFee +=$paidFeeInfo->paidFee;
}
/////////////////// Total fee collected END ///////////////////////////////////
//////////////////////////////Total Concession/////////////////////////////////

$getConcessionFeeCount = $connect->query("SELECT COALESCE(SUM(scholarship_amount), 0) AS total_scholarship_amount
FROM `fees_concession`
WHERE  academic_year = '$academicyear' && school_id = '$school_id' ");
if($conFeeInfo = $getConcessionFeeCount->fetchObject()){
    $paidFee +=$conFeeInfo->total_scholarship_amount;
}
/////////////////////////////////////////////////////////////////////////////////
///////////////////// Today's Collection START //////////////////////////////
$todayFeeInfo = 0;
$getTodayFeeCount = $connect->query("SELECT COALESCE( (SUM(afd.fee_received) + SUM(afd.scholarship)),0) AS todayFeecollected FROM admission_fees_details afd JOIN admission_fees af ON afd.admission_fees_ref_id = af.id WHERE af.academic_year = '$academicyear' && af.receipt_date=CURDATE() && af.school_id = '$school_id' ");
if($todayFee = $getTodayFeeCount->fetchObject()){
    $todayFeeInfo += $todayFee->todayFeecollected;
}

$getTodayConFeeCount = $connect->query("SELECT  COALESCE(SUM(scholarship_amount), 0) AS today_scholarship_amount
FROM `fees_concession`  WHERE academic_year = '$academicyear' && created_date=CURDATE() && school_id = '$school_id' ");
if($todayConFee = $getTodayConFeeCount->fetchObject()){
    $todayFeeInfo += $todayConFee->today_scholarship_amount;
}
///////////////////// Today's Collection END////////////////////////////////

$getCountArr = array("totalFee"=>$totalamount, "paidFee"=>$paidFee, "todayscollection"=> $todayFeeInfo);

echo json_encode($getCountArr);
?>