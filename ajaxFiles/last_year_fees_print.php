<?php
include "../ajaxconfig.php";
@session_start();
if(isset($_SESSION["userid"])){
    $school_id = $_SESSION["school_id"];
} 

//get school name by using session id.
$getschoolDetailsQry=$mysqli->query("SELECT sc.school_name, sc.district, sc.address1, sc.address2, sc.pincode, sc.contact_number, sc.email_id, sc.school_logo, stc.state FROM school_creation sc JOIN state_creation stc ON sc.state = stc.id WHERE sc.status = 0 AND school_id = '$school_id' ");
while ($schoolInfo=$getschoolDetailsQry->fetch_assoc()) {
	$school_name     =$schoolInfo["school_name"]; 
	$address1  =$schoolInfo["address1"];
	$address2  =$schoolInfo["address2"];
	$district  =$schoolInfo["district"];
	$state     =$schoolInfo["state"];
	$pincode  =$schoolInfo["pincode"];
	$contact_number  =$schoolInfo["contact_number"];
	$email_id     =$schoolInfo["email_id"];
    $school_logo     =$schoolInfo["school_logo"];
} 

if(isset($_POST['lastYearFeesid'])){
    $lastYearFeesid = $_POST['lastYearFeesid'];
}

$getTempFees = $connect->query("SELECT 
stdc.admission_number, 
stdc.student_name, 
sc.standard, 
lyf.receipt_no, 
lyf.receipt_date
FROM 
last_year_fees lyf 
JOIN 
student_creation stdc ON lyf.admission_id = stdc.student_id 
JOIN 
standard_creation sc ON stdc.standard = sc.standard_id 
JOIN 
last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id
WHERE lyf.id = '$lastYearFeesid' && lyfd.fee_received > 0");

$tempfeesDetails = $getTempFees->fetch();


function AmountInWords($amount)
{
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(
        0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
    );
    $here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($x < $count_length) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . ' 
        ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . ' 
        ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
        } else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
    " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
?>

<style type="text/css">
    @media print {
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        td {
            padding: 10px;
            text-align: left;
        }
    }

    #printReceiptTable td.first-row {
        line-height: 2.5;
    }
    
    #printReceiptTable tr.last-row td {
        line-height: 3.5;
        /* margin-top: 30px; */
    }
</style>

<div id="printReceiptTable">
    <table class="table table-bordered table-responsive">
    <tr>
        <td style="text-align: center;"> <img src="uploads/school_creation/<?php echo $school_logo; ?>" height="100px" width="100px" alt="Logo"> </td>
        <td style="text-align: center;"> <?php if(isset($school_name)) echo $school_name; ?> </br>
        <?php if(isset($address1)) echo $address1,', '; if(isset($address2)) echo $address2,', '; if(isset($district)) echo $district,', </br>'; if(isset($state)) echo $state,'-'; if(isset($pincode)) echo $pincode; ?> </br>
            <span style="margin-right: 5px;">&#x260E;</span> - <?php if(isset($contact_number)) echo $contact_number; ?>  <span style="margin-right: 5px;">&#x1F4E7;</span>- <?php if(isset($email_id)) echo $email_id; ?>
        </td>
        <td class="first-row"> Receipt No. <?php echo $tempfeesDetails['receipt_no'];?></br> 
            Manual Rcpt.No </br> 
            (Student copy)
        </td>
    </tr>
    <tr>
        <td colspan='2' style="border-bottom: none; border-right: none;">
            Admission Number: <?php echo $tempfeesDetails['admission_number'];?>
        </td>
        <td style="border-bottom: none; border-left: none;">
            Date: <?php echo date('d-m-Y',strtotime($tempfeesDetails['receipt_date']));?>
        </td>
    </tr>
    <tr>
        <td colspan='2' style="border-top: none; border-right: none;">
            Student Name: <?php echo $tempfeesDetails['student_name'];?>
        </td>
        <td style="border-top: none; border-left: none;">
            Standard: <?php echo $tempfeesDetails['standard'];?>
        </td>
    </tr>
    <tr>
        <th>
            Sl No. 
        </th>
        <th>
            Particulars
        </th>
        <th>
            Amount 
        </th>
    </tr>
    <?php   
    $getLastYearFeesQry = $connect->query("SELECT 
    lyfd.fee_received, 
    CASE 
        WHEN gcf.grp_particulars <> '' THEN gcf.grp_particulars
        WHEN ecaf.extra_particulars <> '' THEN ecaf.extra_particulars
        WHEN af.amenity_particulars <> '' THEN af.amenity_particulars
        WHEN acp.particulars <> '' THEN acp.particulars
        ELSE NULL
    END AS particulars
    FROM 
    last_year_fees lyf 
    JOIN 
    student_creation stdc ON lyf.admission_id = stdc.student_id 
    JOIN 
    standard_creation sc ON stdc.standard = sc.standard_id 
    JOIN 
    last_year_fees_details lyfd ON lyf.id = lyfd.admission_fees_ref_id 
    LEFT JOIN 
    group_course_fee gcf ON lyfd.fees_table_name = 'grptable' AND lyfd.fees_id = gcf.grp_course_id 
    LEFT JOIN 
    extra_curricular_activities_fee ecaf ON lyfd.fees_table_name = 'extratable' AND lyfd.fees_id = ecaf.extra_fee_id 
    LEFT JOIN 
    amenity_fee af ON lyfd.fees_table_name = 'amenitytable' AND lyfd.fees_id = af.amenity_fee_id 
       LEFT JOIN area_creation_particulars acp ON 
    lyfd.fees_table_name = 'transport' AND lyfd.fees_id = acp.particulars_id
    WHERE lyf.id = '$lastYearFeesid'  && lyfd.fee_received > 0"); 
    $i = 1;
    $totalAmnt = 0;
    while($getpayFeesDetails = $getLastYearFeesQry ->fetch()){
        $totalAmnt = $totalAmnt + $getpayFeesDetails['fee_received'];
        ?>
    <tr>
        <td> <?php echo $i++; ?> </td>
        <td> <?php echo $getpayFeesDetails['particulars'];?> </td>
        <td> <?php echo $getpayFeesDetails['fee_received'];?> </td>
    </tr>
    
    <?php
    } ?>
    <tr>
        <td> </td>
        <td> Total amount </td>
        <td> <?php echo $totalAmnt; ?> </td>
    </tr>
    <tr>
        <td colspan="3"> Amount in words: <?php echo AmountInWords($totalAmnt); ?> /- </td>
    </tr>
    <tr class="last-row">
        <td colspan="2" style="text-align: justify;">
            Seal 
        </td>
        <td style="text-align: center;"> 
            Signature 
        </td>
    </tr>
    </table>
</div>
