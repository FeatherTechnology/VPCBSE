<?php
@session_start();
include '../../ajaxconfig.php';

if (isset($_POST["fees_ids"])) {
    $fees_ids = $_POST["fees_ids"];
}
if (isset($_POST["pay_fees_id"])) {
    $pay_fees_id = $_POST["pay_fees_id"];
}
if (isset($_POST["student_id"])) {
    $student_id = $_POST["student_id"];
}
if (isset($_POST["receipt_date"])) {
    $receipt_date = $_POST["receipt_date"];
}
if (isset($_POST["receipt_number"])) {
    $receipt_number = $_POST["receipt_number"];
}
if (isset($_POST["academic_year"])) {
    $academic_year = $_POST["academic_year"];
}
if (isset($_POST["mergedParticularsArray"])) {
    $mergedParticularsArray = $_POST["mergedParticularsArray"];
}
if (isset($_POST["mergedAmountArray"])) {
    $mergedAmountArray = $_POST["mergedAmountArray"];
}
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $school_id = $_SESSION["school_id"];
    $year_id = $_SESSION["academic_year"];
    // $academic_year = $_SESSION["academic_year"];
}
// Function to convert number to words
function AmountInWords($amount)
{
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
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

$qry = $mysqli->query("SELECT stdc.student_name, stdc.admission_number, stdc.section, sc.standard FROM student_creation stdc  
JOIN 
student_history sh ON sh.student_id = stdc.student_id  JOIN standard_creation sc ON sh.standard = sc.standard_id WHERE sh.student_id = '$student_id' AND stdc.status=0 AND stdc.school_id='$school_id' AND sh.academic_year='$year_id'");
// SELECT * FROM student_creation WHERE student_id = '$student_id' AND status=0
while ($row = $qry->fetch_assoc()) {
    $student_name = $row["student_name"];
    $admission_number = $row["admission_number"];
    $standard = $row["standard"];
    $section = $row["section"];
}

$getbrc = $mysqli->query("SELECT sc.school_name, sc.district, sc.address1, sc.address2, sc.pincode, sc.contact_number, sc.email_id, sc.school_logo, stc.state FROM school_creation sc JOIN state_creation stc ON sc.state = stc.id WHERE sc.status = 0 AND school_id = '$school_id'");
while ($schoolInfo = $getbrc->fetch_assoc()) {
    $school_name     = $schoolInfo["school_name"];
    $address1  = $schoolInfo["address1"];
    $address2  = $schoolInfo["address2"];
    $district  = $schoolInfo["district"];
    $state     = $schoolInfo["state"];
    $pincode  = $schoolInfo["pincode"];
    $contact_number  = $schoolInfo["contact_number"];
    $email_id     = $schoolInfo["email_id"];
    $school_logo     = $schoolInfo["school_logo"];
}
?>

<head>
    <style type="text/css">
        th {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<div class="approvedtablefield">
    <div id="dettable" style="border:1px solid black;margin: auto;">

        <table rules="all" style="width: 100%;border-style: double;border: 1px solid black;margin: auto;">
            <tr>

                <td><img src="uploads/school_creation/<?php echo $school_logo; ?>" height="50px" width="50px" alt="LOGO"></td>
                <td style="text-align: center;"> <?php if (isset($school_name)) echo $school_name; ?> </br>
                    <?php if (isset($address1)) echo $address1, ', ';
                    if (isset($address2)) echo $address2, ', ';
                    if (isset($district)) echo $district, ', </br>';
                    if (isset($state)) echo $state, '-';
                    if (isset($pincode)) echo $pincode; ?> </br>
                    <span style="margin-right: 5px;">&#x260E;</span> - <?php if (isset($contact_number)) echo $contact_number; ?> <span style="margin-right: 5px;">&#x1F4E7;</span>- <?php if (isset($email_id)) echo $email_id; ?>
                </td>
                <td>
                    Receipt Number: <?php echo $receipt_number; ?><br>
                    Manual Rcpt.No:<BR>
                    (Student Copy)
                </td>
            </tr>
        </table>
        <p style="float:right">Date: <?php echo $receipt_date; ?></p>
        <p>Admission Number: <?php echo $admission_number; ?></p>
        <p style="float:right">Standard & Section: <?php echo $standard ?> &amp; <?php echo $section; ?></p>
        <p>Student Name: <?php echo $student_name; ?></p>

        <br /><br />
        <table rules="all" style="width: 100%;border-style: double;border: 1px solid black;margin: auto;">
            <tr>
                <th style="background-color: white;color: black; text-align: left;">SI.No</th>
                <th style="background-color: white;color: black; text-align: left;">Particulars</th>
                <th style="background-color: white;color: black; text-align: left;">Amount</th>
            </tr>
            <?php
            if (isset($_POST["receipt_number"])) {
                $receipt_number = $_POST["receipt_number"];
                // Determine which query to use based on the receipt_number
                if (strpos($receipt_number, 'LAST') === 0) {
                    // Use getLastAdmissionFees query if receipt_number starts with "LAST"
                    $feesQuery = $connect->query("SELECT lf.id, lf.receipt_date, lf.receipt_no, lf.academic_year, 
            CASE 
                WHEN(lfd.fees_table_name = 'grptable') THEN gcf.grp_particulars 
                WHEN(lfd.fees_table_name = 'extratable') THEN ecaf.extra_particulars 
                WHEN(lfd.fees_table_name = 'amenitytable') THEN aff.amenity_particulars 
                 WHEN (lfd.fees_table_name = 'transport') THEN acp.particulars
            END as particulars, 
            lfd.fee_received 
        FROM last_year_fees lf 
        JOIN last_year_fees_details lfd ON lf.id = lfd.admission_fees_ref_id
        LEFT JOIN group_course_fee gcf ON lfd.fees_table_name = 'grptable' AND lfd.fees_id = gcf.grp_course_id 
        LEFT JOIN extra_curricular_activities_fee ecaf ON lfd.fees_table_name = 'extratable' AND lfd.fees_id = ecaf.extra_fee_id 
        LEFT JOIN amenity_fee aff ON lfd.fees_table_name = 'amenitytable' AND lfd.fees_id = aff.amenity_fee_id 
        LEFT JOIN area_creation_particulars acp ON 
    lfd.fees_table_name = 'transport' AND lfd.fees_id = acp.particulars_id
        WHERE lf.id = '$fees_ids' && lfd.fee_received != '0' ORDER BY lf.id DESC");
                } else {
                    // Use getAdmissionFees query if receipt_number doesn't start with "LAST"
                    $feesQuery = $connect->query("SELECT af.id, af.receipt_date, af.receipt_no, af.academic_year, 
            CASE 
                WHEN(afd.fees_table_name = 'grptable') THEN gcf.grp_particulars 
                WHEN(afd.fees_table_name = 'extratable') THEN ecaf.extra_particulars 
                WHEN(afd.fees_table_name = 'amenitytable') THEN aff.amenity_particulars 
            END as particulars, 
            afd.fee_received 
        FROM admission_fees af 
        JOIN admission_fees_details afd ON af.id = afd.admission_fees_ref_id
        LEFT JOIN group_course_fee gcf ON afd.fees_table_name = 'grptable' AND afd.fees_id = gcf.grp_course_id 
        LEFT JOIN extra_curricular_activities_fee ecaf ON afd.fees_table_name = 'extratable' AND afd.fees_id = ecaf.extra_fee_id 
        LEFT JOIN amenity_fee aff ON afd.fees_table_name = 'amenitytable' AND afd.fees_id = aff.amenity_fee_id 
        WHERE af.id = '$fees_ids' AND afd.fee_received != '0' 
        ORDER BY af.id DESC");
                }

                // Check if the query returned any results
                if ($feesQuery->rowCount() > 0) {
                    $a = 1;
                    $totalamnt = 0;
                    while ($feesInfo = $feesQuery->fetch()) {
            ?>
                        <tr>
                            <td style="margin-left: 5px;padding-left: 30px;text-align: left;"><?php echo $a++; ?></td>
                            <td style="margin-left: 5px;padding-left: 30px;text-align: left;"><?php echo $feesInfo['particulars']; ?></td>
                            <td style="margin-left: 5px;padding-left: 30px;text-align: left;"><?php echo $feesInfo['fee_received']; ?></td>
                        </tr>
            <?php
                        $totalamnt += $feesInfo['fee_received'];
                    }
                }
            }
            ?>

            <tr>
                <td style="margin-left: 5px;padding-left: 30px;text-align: left;"></td>
                <td style="margin-left: 5px;padding-left: 30px;text-align: left;">Total</td>
                <td style="margin-left: 5px;padding-left: 30px;text-align: left;"><?php echo $totalamnt; ?></td>
            </tr>
            <tr>
                <td colspan="3">Amount In Words: <span id="amountInWords"><?php echo AmountInWords($totalamnt) . ' Rupees Only/-'; ?></span></td>

            </tr>
        </table><br>
        <p style="float:right">Signature</p>
        <p>Seal</p>

    </div>
</div>

<button type="button" name="printpurchase" onclick="poprint()" id="printpurchase" class="btn btn-primary">Print</button>

<script type="text/javascript">
    function poprint() {
        var Bill = document.getElementById("dettable").innerHTML;
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write(Bill);
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
    document.getElementById("printpurchase").click()
</script>