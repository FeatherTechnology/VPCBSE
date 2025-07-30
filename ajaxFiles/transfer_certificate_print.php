<?php
include "../ajaxconfig.php";
@session_start();
if(isset($_SESSION["userid"])){
    $school_id = $_SESSION["school_id"];
} 

//get school name by using session id.
$getschoolDetailsQry=$mysqli->query("SELECT sc.school_name, sc.district, sc.address1, sc.address2, sc.pincode, sc.contact_number, sc.email_id, sc.school_logo, stc.state FROM school_creation sc JOIN state_creation stc ON sc.state = stc.id WHERE sc.status = 0 AND school_id = '$school_id' ");
while ($schoolInfo=$getschoolDetailsQry->fetch_assoc()) {
	$session_school_name     =$schoolInfo["school_name"]; 
	$address1  =$schoolInfo["address1"];
	$address2  =$schoolInfo["address2"];
	$district  =$schoolInfo["district"];
	$state     =$schoolInfo["state"];
	$pincode  =$schoolInfo["pincode"];
	$contact_number  =$schoolInfo["contact_number"];
	$email_id     =$schoolInfo["email_id"];
    $school_logo     =$schoolInfo["school_logo"];
} 

if (isset($_POST['tcID'])) {
    $tcID = $_POST['tcID'];
}

    $getTCQry = $connect->query("SELECT * FROM transfer_certificate WHERE transfer_id = '$tcID' ");
    $getTCInfo = $getTCQry->fetch();
    $transfer_id                      = $getTCInfo['transfer_id'];
    $serial_number                    = $getTCInfo['serial_number'];
    $tmr_code                         = $getTCInfo['tmr_code'];
    $admission_number                 = $getTCInfo['admission_number'];
    $certificate_number               = $getTCInfo['certificate_number'];
    $transfer_date                    = $getTCInfo['transfer_date'];
    $school_name                      = $getTCInfo['school_name'];
    $district_educational             = $getTCInfo['district_educational'];
    $revenue_district                 = $getTCInfo['revenue_district'];
    $student_name                     = $getTCInfo['student_name'];
    $parents_name                     = $getTCInfo['parents_name'];
    $nationality                      = $getTCInfo['nationality'];
    $caste                            = $getTCInfo['caste'];
    $gender                           = $getTCInfo['gender'];
    $admission_date                   = $getTCInfo['admission_date'];
    $register_words                   = $getTCInfo['register_words'];
    $personal_identification          = $getTCInfo['personal_identification'];
    $date_first_admission             = $getTCInfo['date_first_admission'];
    $standard                         = $getTCInfo['standard'];
    $promotion                        = $getTCInfo['promotion'];
    $scholarship                      = $getTCInfo['scholarship'];
    $medical_inspection               = $getTCInfo['medical_inspection'];
    $date_school                      = $getTCInfo['date_school'];
    $conduct                          = $getTCInfo['conduct'];
    $date_parents                     = $getTCInfo['date_parents'];
    $date_of_transfer_certificate     = $getTCInfo['date_of_transfer_certificate'];
?>

<style>
tr td {
    padding-top: 8px;
    padding-bottom: 8px;
}

.Spcng td {
    padding-top: 15px;
    padding-bottom: 15px;
}

.Spce td {
    padding-top: 4px;
    padding-bottom: 50px;
}

.SignSpce td {
    padding-top: 2px;
    padding-bottom: 40px;
}

.TCHeadpre {
    padding-right: 5em;
}

.TCHeadaft {
    padding-left: 1em;
}
</style>


<div class="main-container">
    <!--form start-->
    <form id="transfer_certificate_form" name="transfer_certificate_form" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:'Bookman Old Style';font-size:12px">
    <tr>
        <td colspan="5">
            <table width="95%">
                <tr>
                    <td rowspan="3" width="15%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"><img height="100px" width="100px" src="uploads/school_creation/<?php echo $school_logo; ?>" alt="LOGO" /> </td>
                    <td width="85%" colspan="3" align="center" style="font-family:'Bookman Old Style';font-size:32px; color:black"><b><?php if(isset($session_school_name)) echo $session_school_name; ?></b></td>
                </tr>
                <tr>
                    <td width="85%" colspan="3" align="center" style="font-family:'Bookman Old Style';font-size:14px; color:black"> <?php if(isset($address1)) echo $address1,', '; if(isset($address2)) echo $address2,', '; if(isset($district)) echo $district,','; if(isset($state)) echo $state,'-'; if(isset($pincode)) echo $pincode; ?></td>
                </tr>
                <tr>
                    <td width="85%" colspan="3" align="center" style="font-family:'Bookman Old Style';font-size:24px; color:black;"><b style="border:2px black solid;">&nbsp;&nbsp; TRANSFER CERTIFICATE &nbsp;&nbsp;</b></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="Spcng">
        <td width="100%" colspan="3" align="left"><label class="TCHeadpre" style="font-family:'Bookman Old Style';font-size:16px; color:black;font-weight:bold">Serial No : <?php if (isset($serial_number)) echo $serial_number; ?></label></td>
        <td width="100%" colspan="2" align="right"><label class="TCHeadaft" style="font-family:'Bookman Old Style';font-size:16px; color:black;font-weight:bold">Reg.No : <?php if (isset($admission_number)) echo $admission_number; ?> </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">1. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Name of the Pupil(in Block letters)</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">:</td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><b><?php if (isset($student_name)) echo $student_name; ?></b></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">2. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Name of the Father or Mother of the Pupil</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="8%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($parents_name)) echo $parents_name; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">3. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Nationality</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="8%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($nationality)) echo $nationality; ?></td>

    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">4. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Caste</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if (isset($caste)) echo $caste; ?>  </td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">5. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> Gender</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if (isset($gender)) echo $gender; ?> </td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">6. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Date of Brith as entered in the Admission </td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($admission_date)) echo $admission_date; ?> </td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Register in figures and words </td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($register_words)) echo $register_words; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">7. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Personal marks of Identification  </td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($personal_identification)) echo $personal_identification; ?> </td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">8. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Date of first admission in the School with class</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">: </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><?php if (isset($date_first_admission)) echo $date_first_admission; ?></td>
    </tr>
    
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">9. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Standard in which the pupil was studying<br />at the time of leaving</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <br />: </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><br /><?php if (isset($standard)) echo $standard; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">10. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Whether qualified for promotion to Higher Standard</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">: </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if (isset($promotion)) echo $promotion; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">11. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Whether the pupil has in receipt of any <br />Scholarship (Nature of the Scholarship to be speified)</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <br />: </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><br /><?php if (isset($scholarship)) echo $scholarship; ?> </td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">12. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Whether the pupil has under gone Medical <br />inspection during last academic year </td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><br /> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><br /> <?php if (isset($medical_inspection)) echo $medical_inspection; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">13. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Date on which the pupil actually the school</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if (isset($date_school)) echo $date_school; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">14. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">The pupil conduct and  character</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if(isset($conduct)){ echo $conduct; }else{ echo 'GOOD';}?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">15. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Date on which application for Transfer Certificate Was made<br /> on behalf of the pupil by his parent of Guardian</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <br />: </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><br /> <?php if (isset($date_parents)) echo $date_parents; ?></td>
    </tr>
    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">16. </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">Date of the Transfer Certificate</td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> : </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> <?php if (isset($date_of_transfer_certificate)) echo $date_of_transfer_certificate; ?></td>
    </tr>

    <tr>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> </td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> </td>
        <td width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"> </td>
    </tr>
    <tr class="Spce">
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="48%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
    </tr>
    <tr>
        <td colspan="5">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:'Bookman Old Style';font-size:12px">
                <tr>
                    <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><b>School Seal with Date</b></td>
                    <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
                    <td colspan="2" width="48%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"><b>Signature of the Principal</b></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="Spce">
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="48%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:'Bookman Old Style';font-size:12px">

    <tr class="SignSpce">
        <td width="5%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="95%" valign="top" align="center" style="font-family:'Bookman Old Style';font-size:19px; color:black"><u>Declaration by the parent or guardian</u></td>
    </tr>
    <tr class="SignSpce">
        <td width="5%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="95%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black">I hereby declare that the particulars recorded are correct and no change will be demanded by me in future.</td>
    </tr>

</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:'Bookman Old Style';font-size:12px">
    <tr class="SignSpce">
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="48%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
    </tr>
    <tr>
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"><b>Signature of the Student</b></td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td colspan="2" width="48%" valign="top" align="right" style="font-family:'Bookman Old Style';font-size:16px; color:black"><b>Signature of the Parent / Guardian</b></td>
    </tr>
    <tr class="SignSpce">
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td width="2%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
        <td colspan="2" width="48%" valign="top" align="left" style="font-family:'Bookman Old Style';font-size:16px; color:black"></td>
    </tr>
</table>
    </form>
</div>