<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}
if(isset($_SESSION["school_id"])){
    $school_id = $_SESSION["school_id"];
}
$id=0;
 if(isset($_POST['submitpayfees']) && $_POST['submitpayfees'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){
        $id = $_POST['id']; 	
    $updatePayfeesCreationmaster = $userObj->updatePayfeesCreation($mysqli,$id,$userid,$school_id);
    // echo "updatePayfeesCreationmaster"; die;
    
    ?>
   <script>location.href='<?php echo $HOSTPATH; ?>pay_fees&upd='$upd'';</script> 
    <?php }
    else{  
		$addPayfeesCreation = $userObj->addPayfeesCreation($mysqli,$userid,$school_id);   
        //  echo "addPayfeesCreation"; die;
        ?>
     <script>location.href='<?php echo $HOSTPATH; ?>pay_fees&upd='$upd'';</script>
        <?php
    }
 }  

$del=0;
if(isset($_GET['del']))
{
$del=$_GET['del'];
}
if($del>0)
{
	$deletePayfeesCreation = $userObj->deletePayfeesCreation($mysqli,$del,$userid); 
	?>
	<script>location.href='<?php echo $HOSTPATH; ?>pay_fees&upd='$upd'';</script>
<?php	
}
if(isset($_GET['upd1']))
{
$idupd=$_GET['upd1']; 
} 
$status =0;
if($idupd>0)
{

	$getPayfeesCreation = $userObj->getPayfeesCreation($mysqli,$idupd); 
	if (sizeof($getPayfeesCreation)>0) {
        for($ibranch=0;$ibranch<sizeof($getPayfeesCreation);$ibranch++) {	
            $pay_fees_id                      = $getPayfeesCreation['pay_fees_id'];
			$student_id                	 = $getPayfeesCreation['student_id'];
			$grp_fees_id          		     = $getPayfeesCreation['grp_fees_id'];
			$extra_fees_id      			     = $getPayfeesCreation['extra_fees_id'];
			$amenity_fees_id		         = $getPayfeesCreation['amenity_fees_id'];
			$receipt_number    			         = $getPayfeesCreation['receipt_number'];
			$receipt_date                	 = $getPayfeesCreation['receipt_date'];
            $register_number                   = $getPayfeesCreation['register_number'];
			$academic_year       		     = $getPayfeesCreation['academic_year'];
			$standard     			     = $getPayfeesCreation['standard'];
			$grp_particulars     		             = $getPayfeesCreation['grp_particulars'];
			$grp_amount     			     = $getPayfeesCreation['grp_amount'];
			$amount_recieved                      = $getPayfeesCreation['amount_recieved'];
            $amount_balance	                      = $getPayfeesCreation['amount_balance']; 
            $amount_balance                      = $getPayfeesCreation['amount_balance']; 
            $extra_amount                      = $getPayfeesCreation['extra_amount']; 
            $extra_amount_recieved                      = $getPayfeesCreation['extra_amount_recieved']; 
            $extra_amount_balance                      = $getPayfeesCreation['extra_amount_balance']; 
            $amenity_particulars	                      = $getPayfeesCreation['amenity_particulars']; 
            $amenity_amount	                      = $getPayfeesCreation['amenity_amount']; 
            $amenity_amount_recieved	                      = $getPayfeesCreation['amenity_amount_recieved']; 
            $amenity_amount_balance	                      = $getPayfeesCreation['amenity_amount_balance']; 
            $other_charges_recieved	                      = $getPayfeesCreation['other_charges_recieved']; 
            $other_charges                      = $getPayfeesCreation['other_charges']; 
            $fees_total                      = $getPayfeesCreation['fees_total']; 
            $fees_scholarship                      = $getPayfeesCreation['fees_scholarship']; 
            $final_amount_recieved                      = $getPayfeesCreation['final_amount_recieved']; 
            $fees_collected	                      = $getPayfeesCreation['fees_collected']; 
            $fees_balance	                      = $getPayfeesCreation['fees_balance']; 
            $collection_info                      = $getPayfeesCreation['collection_info']; 
            $qty1	                      = $getPayfeesCreation['qty1']; 
            $qty2	                      = $getPayfeesCreation['qty2']; 
            $qty3	                      = $getPayfeesCreation['qty3']; 
            $qty4	                      = $getPayfeesCreation['qty4']; 
            $qty5                      = $getPayfeesCreation['qty5']; 
            $qty6                      = $getPayfeesCreation['qty6']; 
            $qty7                      = $getPayfeesCreation['qty7']; 
            $unit1                      = $getPayfeesCreation['unit1']; 
            $unit2                      = $getPayfeesCreation['unit2']; 
            $unit3	                      = $getPayfeesCreation['unit3']; 
            $unit4	                      = $getPayfeesCreation['unit4']; 
            $unit5	                      = $getPayfeesCreation['unit5']; 
            $unit6                      = $getPayfeesCreation['unit6']; 
            $unit7	                      = $getPayfeesCreation['unit7']; 
            $amount1	                      = $getPayfeesCreation['amount1']; 
            $amount2                      = $getPayfeesCreation['amount2']; 
            $amount3                      = $getPayfeesCreation['amount3']; 
            $amount4                      = $getPayfeesCreation['amount4']; 
            $amount5                      = $getPayfeesCreation['amount5']; 
            $amount6                      = $getPayfeesCreation['amount6']; 
            $amount7	                      = $getPayfeesCreation['amount7']; 
            $result                      = $getPayfeesCreation['result']; 
            $cheque_number	                      = $getPayfeesCreation['cheque_number']; 
            $cheque_amount                      = $getPayfeesCreation['cheque_amount']; 
            $cheque_date                      = $getPayfeesCreation['cheque_date']; 
            $cheque_bank_name                      = $getPayfeesCreation['cheque_bank_name']; 
            $cheque_ledger_name                      = $getPayfeesCreation['cheque_ledger_name']; 
            $neft_number                      = $getPayfeesCreation['neft_number']; 
            $neft_amount                      = $getPayfeesCreation['neft_amount']; 
            $neft_date                      = $getPayfeesCreation['neft_date']; 
            $neft_bank_name                      = $getPayfeesCreation['neft_bank_name']; 
            $neft_ledger_name                      = $getPayfeesCreation['neft_ledger_name']; 
           
		}
	}
}
$idupd1='';
$standard='';
if (isset($_GET['student_name'])) {
    $student_name = $_GET['student_name'];
    $getCustomerCreation = $userObj->getStudentListAll($mysqli, $student_name);
} elseif (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $getCustomerCreation = $userObj->getStudentListAll($mysqli, $student_id);
}elseif (isset($_GET['upd'])) {
    $upd = $_GET['upd'];
    $getCustomerCreation = $userObj->getStudentListAll($mysqli, $upd);
} 

if (isset($getCustomerCreation) && sizeof($getCustomerCreation) > 0) {
    foreach ($getCustomerCreation as $student) {
        $student_id = $student['student_id']; 
        $student_name = $student['student_name'];
        $standard = $student['standard'];
        $register_number = $student['studentrollno'];
        $medium = $student['medium']; 
        $studentstype = $student['studentstype'];
        // Rest of the code that uses the student data
    }
} 

?>
<?php
    
    if(isset($_SESSION["school_id"])){
        $school_id = $_SESSION["school_id"];
    }
    if(isset($_SESSION["academic_year"])){
        $academic_years = $_SESSION["academic_year"];
    }
    if (isset($_GET['upd'])) {
        $upd = $_GET['upd'];
    }
    $getyearfromschool = "SELECT year_id  FROM school_creation WHERE status = '0' AND school_id='$school_id'";
    $res1 = $mysqli->query($getyearfromschool) or die("Error in Get All Records".$mysqli->error);
    $row1 = $res1->fetch_object();
    
            $year = $row1->year_id;
            // print_r($year);
                // Split the string into individual years
            $yearsArray = explode(',', $year);
    
            // Iterate through the years and add single quotes
            $quotedYears = array();
            foreach ($yearsArray as $year) {
            $quotedYears = "'" . trim($year) . "'";
            $academic_year[] = str_replace("'", "", trim($quotedYears));
            }                                   
                                                         
?>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Pay Fees</li>
    </ol>

    <a href="fees_collection&st=<?php echo $upd; ?>" > <!-- onclick="payFees();"fees_collection -->
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				
    <div class="main-container">
            <!--------form start-->
        <form id = "customer_master" name="customer_master" action="" method="post" enctype="multipart/form-data"> 
                <input type="hidden" class="form-control" value="<?php if(isset($pay_fees_id)) echo $pay_fees_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="">
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              
                        <div class="card">
                                <div class="card-header">School Fee Receipt</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Receipt Number</label>
                                                </div>
                                            </div>
                                        <?php if($idupd<=0){ ?>
                                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" readonly name="receipt_number" id="receipt_number" class="form-control" placeholder="Enter Receipt Number">

                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" name="receipt_number_edit" id="receipt_number_edit" readonly value="<?php if(isset($receipt_number)) echo $receipt_number; ?>"   class="form-control" placeholder="Enter Receipt Number">
                                            </div>
                                        </div>
                                    <?php } ?>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Receipt Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <input type="text" readonly tabindex="20"  name="receipt_date" id="receipt_date" value="<?php date_default_timezone_set('Asia/Kolkata');  echo date('d-m-Y'); ?>"  class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Reg Number</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" readonly tabindex="20"  name="register_number" id="register_number" value="<?php if(isset($register_number)) echo $register_number; ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Academic Year</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <?php if(isset($_SESSION["academic_year"])){
                                                            $ayear = $_SESSION["academic_year"];
                                                        } ?>
                                                    <select tabindex="1" type="text" class="form-control" id="academic_year" name="academic_year" readonly tabindex="1" >
                                                        <?php foreach($academic_year as $row){ ?>
                                                    <option value="<?php if(isset($row)) echo $row; ?>"<?php if($ayear == $row){echo "selected";} ?>><?php if(isset($row)){ echo $row; }?></option>
                                                    <?php } ?>
                                                    </select>        
                                                               
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Student Name</label>
                                                </div>
                                            </div>
                                             <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <input type="text" readonly tabindex="23"  name="student_name" id="student_name" class="form-control" value="<?php if(isset($student_name)) echo $student_name ; ?>" placeholder="">
                                                    <input type="hidden" readonly tabindex="23"  name="student_id" id="student_id" class="form-control" value="<?php if(isset($student_id)) echo $student_id; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="label">Standard</label>
                                                </div>
                                            </div>
                                             <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <input type="hidden" readonly id="stud_id" name="stud_id" class="form-control fee-input" value = "<?php if(isset($upd)){ echo $upd; }?>">

                                                    <input type="text" readonly tabindex="23"  name="standard" id="standard" class="form-control" value="<?php if(isset($standard)) echo $standard; ?>" placeholder="">
                                                </div>
                                            </div>
                                        </div>                    
                                  
                                    <div id="student_detailswithoutDiv">
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div id="stockinfotable">
                                                    <div id="updatedstockinfotable"> 
                                                    <table id="general_concessionTable" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>Group Fees</th>
                                                                    <th>Amount (In Rs)</th>
                                                                    <th>Fees Received</th>
                                                                    <th>Scholarship/Concession</th>
                                                                    <th>Balance to be Paid</th>
                                                                </tr>
                                                            </thead>
                                                            <!-- <tfoot>
                                                                
                                                                <th>Group Fees</th>
                                                                <th>Amount (In Rs)</th>
                                                                <th>Fees Received</th>
                                                                <th>Scholarship/Concession</th>
                                                                <th>Balance to be Paid</th>
                                                            </tfoot> -->
                                                            <tbody>
                                                            <?php

                                                                // $currentYear = date("Y"); 
                                                                // $currentAcademicYear = ($currentYear) . '-' .($currentYear + 1);
                                                                $currentAcademicYear = $_SESSION['academic_year']; 
                                                                $school_id =$_SESSION['school_id']; 
                                                                $ctselect="SELECT * FROM pay_fees WHERE student_id ='$upd' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0";
                                                                // print_r($ctselect);
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                    
                                                                    $s_array = explode(",", $ct['grp_particulars']);
                                                                    $s_array1 = explode(",", $ct['grp_amount']);
                                                                    $s_array2 = explode(",", $ct['amount_recieved']);
                                                                    $s_array3 = explode(",", $ct['grp_concession_amount']);
                                                                    $s_array4 = explode(",", $ct['amount_balance']);
                                                                    $s_array5 = explode(",", $ct['grp_fees_id']);

                                                                    if($ct["student_id"] == $upd){ 
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                             ?>
                                                                <tr>
                                                                <input type="hidden" readonly id="grp_fees_id" name="grp_fees_id[]" class="form-control fee-input" value = "<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>">
                                                                <td><input type="text" readonly id="grp_particulars" name="grp_particulars[]" class="form-control fee-input" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="grp_amount" name="grp_amount[]" class="form-control grp_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="amount_recieved" name="amount_recieved[]" class="form-control amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="amount_recieved12" name="amount_recieved12[]" class="form-control amount_recieved12 sum12" value="<?php if(isset($s_array2[$i])) {  if($s_array2[$i] == ''){ echo "0"; }else{ echo $s_array2[$i];} }else{echo "0";} ?>">
                                                                <input type="hidden" readonly id="amount_balance12" name="amount_balance12[]" class="form-control amount_balance12" value="<?php if(isset($s_array4)){ if($s_array4[$i] == ''){  echo $s_array1[$i]; }else{ echo $s_array4[$i]; } }?>">
                                                                </td>
                                                                <td><input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="grp_concession_amount12" name="grp_concession_amount12[]" class="form-control grp_concession_amount12 concession_amount" value="<?php if(isset($s_array3[$i])){ if($s_array3[$i] == ''){ echo "0"; }else{ echo $s_array3[$i];} }else{ echo "0"; }?>"> 
                                                               </td>
                                                                <td><input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array4)){ if($s_array4[$i] == ''){  echo $s_array1[$i]; }else{echo $s_array4[$i]; } }?>"></td>
                                                                </tr>
                                                                <?php } }
                                                                 else{
                                                                    echo "<p class='text-danger'>There is no record</p>";
                                                                } 
                                                             } }
                                                                else{ 
                                                                    $ctselect="SELECT * FROM fees_master WHERE medium ='$medium' AND standard='$standard' AND student_type ='$studentstype' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
                                                                    // print_r($ctselect);
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                    
                                                                    $s_array = explode(",", $ct['grp_particulars']);
                                                                    $s_array1 = explode(",", $ct['grp_amount']);
                                                                    // $s_array2 = explode(",", $ct['amount_recieved']);
                                                                    // $s_array3 = explode(",", $ct['grp_concession_amount']);
                                                                    // $s_array4 = explode(",", $ct['amount_balance']);
                                                                    $s_array5 = explode(",", $ct['fees_id']);

                                                                  
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                                ?>
                                                                <tr>
                                                                <input type="hidden" readonly id="grp_fees_id" name="grp_fees_id[]" class="form-control fee-input" value = "<?php if(isset($ct['fees_id'])){ echo $ct['fees_id']; }?>">
                                                                <td><input type="text" readonly id="grp_particulars" name="grp_particulars[]" class="form-control fee-input" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="grp_amount" name="grp_amount[]" class="form-control grp_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="amount_recieved" name="amount_recieved[]" class="form-control amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="amount_recieved12" name="amount_recieved12[]" class="form-control amount_recieved12 sum12" value="0">
                                                                <input type="hidden"  readonly id="amount_balance12" name="amount_balance12[]" class="form-control amount_balance12" value="0"></td>
                                                                <td><input type="number" id="grp_concession_amount" name="grp_concession_amount[]" class="form-control grp_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="grp_concession_amount12" name="grp_concession_amount12[]" class="form-control grp_concession_amount12 concession_amount" value="0">     
                                                                 </td>
                                                                <td><input type="number" readonly id="amount_balance" name="amount_balance[]" class="form-control amount_balance" value="<?php if(isset($s_array4[$i])){ echo $s_array4[$i]; }else{ echo $s_array1[$i];} ?>" ></td>
                                                                </tr>
                                                                <?php } }
                                                                
                                                             }  else{
                                                                echo "<p class='text-danger'>There is no record</p>";
                                                                
                                                            }  } ?>
                                                             

                                                            </tbody>
                                                        </table>

                                                        <table id="general_concessionTable1" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>Extra Curricular</th>
                                                                    <th>Amount (In Rs)</th>
                                                                    <th>Fees Received</th>
                                                                    <th>Scholarship/Concession</th>
                                                                    <th>Balance to be Paid</th>
                                                                </tr>
                                                            </thead>
                                                            <!-- <tfoot>
                                                                
                                                                <th>Extra Curricular</th>
                                                                <th>Amount (In Rs)</th>
                                                                <th>Fees Received</th>
                                                                <th>Scholarship/Concession</th>
                                                                <th>Balance to be Paid</th>
                                                            </tfoot> -->
                                                            <tbody>
                                                            <?php
                                                                $ctselect="SELECT * FROM pay_fees WHERE student_id ='$upd' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0"; 
                                                               
                                                                $ctresult=$mysqli->query($ctselect);
                                                                // print_r($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                    $s_array = explode(",", $ct['extra_particulars']);
                                                                    $s_array1 = explode(",", $ct['extra_amount']);
                                                                    $s_array2 = explode(",", $ct['extra_amount_recieved']);
                                                                    $s_array3 = explode(",", $ct['extra_concession_amount']);
                                                                    $s_array4 = explode(",", $ct['extra_amount_balance']);
                                                                    $s_array5 = explode(",", $ct['extra_fees_id']);
                                                                    if($ct["student_id"] == $upd){ 
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                                ?>
                                                                <tr>
                                                               <input type="hidden" readonly id="extra_fees_id" name="extra_fees_id[]" class="form-control" value = "<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>">
                                                                <td><input type="text" readonly id="extra_particulars" name="extra_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="extra_amount_recieved" name="extra_amount_recieved[]" class="form-control extra_amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="extra_amount_recieved12" name="extra_amount_recieved12[]" class="form-control extra_amount_recieved12 sum12" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>">
                                                                <input type="hidden" readonly id="extra_amount_balance12" name="extra_amount_balance12[]" class="form-control extra_amount_balance12" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>"></td>
                                                                <td><input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="extra_concession_amount12" name="extra_concession_amount12[]" class="form-control extra_concession_amount12 concession_amount12" value="<?php if(isset($s_array3)){ echo $s_array3[$i]; } ?>">
                                                                </td>
                                                                <td><input type="number" readonly id="extra_amount_balance" name="extra_amount_balance[]" class="form-control extra_amount_balance" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>"></td>
                                                                </tr>
                                                                <?php } }
                                                                 else{
                                                                    echo "<p class='text-danger' id='norec'>There is no record</p>";
                                                                    echo "<tr>
                                                                    <input type='hidden' readonly id='extra_fees_id' name='extra_fees_id[]' class='form-control' value = ''>
                                                                     <td><input type='hidden' readonly id='extra_particulars' name='extra_particulars[]' class='form-control' value = '0'></td>
                                                                     <td><input type='hidden' readonly id='extra_amount' name='extra_amount[]' class='form-control extra_amount total_amount' value='0'></td>
                                                                     <td><input type='hidden' id='extra_amount_recieved' name='extra_amount_recieved[]' class='form-control extra_amount_recieved sum1' value='0'>
                                                                     <input type='hidden' readonly id='extra_amount_recieved12' name='extra_amount_recieved12[]' class='form-control extra_amount_recieved12 sum12' value='0'>
                                                                     <input type='hidden' readonly id='extra_amount_balance12' name='extra_amount_balance12[]' class='form-control extra_amount_balance12' value='0'></td>
                                                                     <td><input type='hidden' id='extra_concession_amount' name='extra_concession_amount[]' class='form-control extra_concession_amount concession_amount' value='0'>
                                                                     <input type='hidden' readonly id='extra_concession_amount12' name='extra_concession_amount12[]' class='form-control extra_concession_amount12 concession_amount12' value='0'>
                                                                     </td>
                                                                     <td><input type='hidden' readonly id='extra_amount_balance' name='extra_amount_balance[]' class='form-control extra_amount_balance' value='0'></td>
                                                                     </tr>";
                                                                } 
                                                             } }else{ 

                                                                    $ctselect = "SELECT extra_curricular FROM student_creation WHERE student_id ='$upd' AND standard='$standard' AND status=0";
                                                                    // print_r($ctselect);
                                                                    
                                                                    $ctresult = $mysqli->query($ctselect);
                                                                    if ($ctresult->num_rows > 0) {
                                                                        $i = 1;
                                                                        while ($ct = $ctresult->fetch_assoc()) {
                                                                            $s_array = explode(",", $ct['extra_curricular']);
                                                                        }
                                                                    }
                                                                    
                                                                    // Construct the query with the exploded values
                                                                    $feesIdList = implode("', '", $s_array);
                                                                    $ctselect="SELECT * FROM fees_master WHERE fees_id IN ('$feesIdList') AND medium ='$medium' AND student_type='$studentstype' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
                                                                    // print_r($ctselect);


                                                                                                                                        
                                                                    // Execute the query and process the results
                                                                    $ctresult = $mysqli->query($ctselect);
                                                                    if ($ctresult->num_rows > 0) {
                                                                        $i = 1;
                                                                     
                                                                         while($ct=$ctresult->fetch_assoc()){
                                                                    
                                                                            $s_array = explode(",", $ct['extra_particulars']);
                                                                            $s_array1 = explode(",", $ct['extra_amount']);
                                                                            
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                                ?>
                                                                <tr>
                                                                <input type="hidden" readonly id="extra_fees_id" name="extra_fees_id[]" class="form-control fee-input" value = "<?php if(isset($ct['fees_id'])){ echo $ct['fees_id']; }?>">
                                                                <td><input type="text" readonly id="extra_particulars" name="extra_particulars[]" class="form-control fee-input" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="extra_amount" name="extra_amount[]" class="form-control extra_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="extra_amount_recieved" name="extra_amount_recieved[]" class="form-control extra_amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="extra_amount_recieved12" name="extra_amount_recieved12[]" class="form-control extra_amount_recieved12 sum12" value="0">
                                                                <input type="hidden" readonly id="extra_amount_balance12" name="extra_amount_balance12[]" class="form-control extra_amount_balance12" value="0">
                                                                </td>
                                                                <td><input type="number" id="extra_concession_amount" name="extra_concession_amount[]" class="form-control extra_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="extra_concession_amount12" name="extra_concession_amount12[]" class="form-control extra_concession_amount12 concession_amount12" value="0">
                                                                </td>
                                                                <td><input type="number" readonly id="extra_amount_balance" name="extra_amount_balance[]" class="form-control extra_amount_balance" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                </tr>
                                                                <?php } }
                                                                
                                                             }  else{
                                                                echo "<p class='text-danger' id='norec'>There is no record</p>";
                                                                echo "<tr>
                                                                    <input type='hidden' readonly id='extra_fees_id' name='extra_fees_id[]' class='form-control' value = ''>
                                                                     <td><input type='text' readonly id='extra_particulars' name='extra_particulars[]' class='form-control' value = '0'></td>
                                                                     <td><input type='number' readonly id='extra_amount' name='extra_amount[]' class='form-control extra_amount total_amount' value='0'></td>
                                                                     <td><input type='number' id='extra_amount_recieved' name='extra_amount_recieved[]' class='form-control extra_amount_recieved sum1' value='0'>
                                                                     <input type='hidden' readonly id='extra_amount_recieved12' name='extra_amount_recieved12[]' class='form-control extra_amount_recieved12 sum12' value='0'>
                                                                     <input type='hidden' readonly id='extra_amount_balance12' name='extra_amount_balance12[]' class='form-control extra_amount_balance12' value='0'></td>
                                                                     <td><input type='number' id='extra_concession_amount' name='extra_concession_amount[]' class='form-control extra_concession_amount concession_amount' value='0'>
                                                                     <input type='hidden' readonly id='extra_concession_amount12' name='extra_concession_amount12[]' class='form-control extra_concession_amount12 concession_amount12' value='0'>
                                                                     </td>
                                                                     <td><input type='number' readonly id='extra_amount_balance' name='extra_amount_balance[]' class='form-control extra_amount_balance' value='0'></td>
                                                                     </tr>";
                                                            }  } ?> 
                                                            </tbody>
                                                        </table>
                                                        <table id="general_concessionTable2" class="table custom-table" cellspacing="0" >
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>Amenity Fees</th>
                                                                    <th>Amount (In Rs)</th>
                                                                    <th>Fees Received</th>
                                                                    <th>Scholarship/Concession</th>
                                                                    <th>Balance to be Paid</th>
                                                                </tr>
                                                            </thead>
                                                            <!-- <tfoot>
                                                                
                                                                <th>Amenity Fees</th>
                                                                <th>Amount (In Rs)</th>
                                                                <th>Fees Received</th>
                                                                <th>Scholarship/Concession</th>
                                                                <th>Balance to be Paid</th>
                                                            </tfoot> -->
                                                            <tbody>
                                                            <?php
                                                                 $ctselect="SELECT * FROM pay_fees WHERE student_id ='$upd' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0"; 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                    $s_array = explode(",", $ct['amenity_particulars']);
                                                                    $s_array1 = explode(",", $ct['amenity_amount']);
                                                                    $s_array2 = explode(",", $ct['amenity_amount_recieved']);
                                                                    $s_array3 = explode(",", $ct['amenity_concession_amount']);
                                                                    $s_array4 = explode(",", $ct['amenity_amount_balance']);
                                                                    $s_array5 = explode(",", $ct['amenity_fees_id']);
                                                                    if($ct["student_id"] == $upd){ 
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                                ?>
                                                                <tr>
                                                                <input type="hidden" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control" value = "<?php if(isset($s_array5)){ echo $s_array5[$i]; }?>">
                                                                <td><input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="amenity_amount_recieved" name="amenity_amount_recieved[]" class="form-control amenity_amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="amenity_amount_recieved12" name="amenity_amount_recieved12[]" class="form-control amenity_amount_recieved12 sum12" value="<?php if(isset($s_array2)){ echo $s_array2[$i]; }?>">
                                                                <input type="hidden" readonly id="amenity_amount_balance12" name="amenity_amount_balance12[]" class="form-control amenity_amount_balance12" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>"></td>
                                                                <td><input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="amenity_concession_amount12" name="amenity_concession_amount12[]" class="form-control amenity_concession_amount12 concession_amount12" value="<?php if(isset($s_array3)){ echo $s_array3[$i]; }?>">
                                                                </td>
                                                                <td><input type="number" readonly id="amenity_amount_balance" name="amenity_amount_balance[]" class="form-control amenity_amount_balance" value="<?php if(isset($s_array4)){ echo $s_array4[$i]; }?>"></td>
                                                                </tr>
                                                                <?php } }
                                                                 else{
                                                                    echo "<p class='text-danger'>There is no record</p>";
                                                                } 
                                                             } }
                                                                else{ 
                                                                    $ctselect="SELECT * FROM fees_master WHERE medium ='$medium'  AND student_type='$studentstype' AND standard='$standard' AND academic_year ='$currentAcademicYear' AND status=0 AND school_id='$school_id'"; 
 
                                                                $ctresult=$mysqli->query($ctselect);
                                                                if($ctresult->num_rows>0){
                                                                $i=1;
                                                                while($ct=$ctresult->fetch_assoc()){
                                                                    
                                                                    $s_array = explode(",", $ct['amenity_particulars']);
                                                                    $s_array1 = explode(",", $ct['amenity_amount']);
                                                                    // $s_array2 = explode(",", $ct['amount_recieved']);
                                                                    // $s_array3 = explode(",", $ct['grp_concession_amount']);
                                                                    // $s_array4 = explode(",", $ct['amount_balance']);
                                                                    // $s_array5 = explode(",", $ct['fees_id']);

                                                                  
                                                                    if (end($s_array) === '') {
                                                                        array_pop($s_array); // remove last element if it's empty
                                                                    }

                                                                    for($i=0; $i< count($s_array); $i++){
                                                                                                                ?>
                                                                <tr>
                                                                <input type="hidden" readonly id="amenity_fees_id" name="amenity_fees_id[]" class="form-control fee-input" value = "<?php if(isset($ct['fees_id'])){ echo $ct['fees_id']; }?>">
                                                                <td><input type="text" readonly id="amenity_particulars" name="amenity_particulars[]" class="form-control fee-input" value = "<?php if(isset($s_array)){ echo $s_array[$i]; }?>"></td>
                                                                <td><input type="number" readonly id="amenity_amount" name="amenity_amount[]" class="form-control amenity_amount total_amount" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                <td><input type="number" id="amenity_amount_recieved" name="amenity_amount_recieved[]" class="form-control amenity_amount_recieved sum1" value="0">
                                                                <input type="hidden" readonly id="amenity_amount_recieved12" name="amenity_amount_recieved12[]" class="form-control amenity_amount_recieved12 sum12" value="0">
                                                                <input type="hidden" readonly id="amenity_amount_balance12" name="amenity_amount_balance12[]" class="form-control amenity_amount_balance12" value="0"></td>
                                                                <td><input type="number" id="amenity_concession_amount" name="amenity_concession_amount[]" class="form-control amenity_concession_amount concession_amount" value="0">
                                                                <input type="hidden" readonly id="amenity_concession_amount12" name="amenity_concession_amount12[]" class="form-control amenity_concession_amount12 concession_amount12" value="0"></td>
                                                                <td><input type="number" readonly id="amenity_amount_balance" name="amenity_amount_balance[]" class="form-control amenity_amount_balance" value="<?php if(isset($s_array1)){ echo $s_array1[$i]; }?>"></td>
                                                                </tr>
                                                                <?php } }
                                                                
                                                             }  else{
                                                                echo "<p class='text-danger'>There is no record</p>";
                                                            }  } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-12"> -->
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label class="label">Other Charges</label>
                                                        <input type="text"  tabindex="20"  name="other_charges" id="other_charges" value="<?php if(isset($other_charges)){echo $other_charges ; }else{ echo "0";} ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" style="visibility:hidden">
                                                <div class="form-group">
                                                    <input type="number"  tabindex="20"  name="" id="" value=""  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                <label class="label">Fees Received</label>
                                                    <input type="number"  tabindex="20"  name="other_charges_recieved" id="other_charges_recieved" value=""  class="form-control other_charges_recieved ">
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                    <div class="column">
                                            <table id="tottable" style="width:50%;">
                                            <tr>
                                                <td style="color:#66c2ff">Summary Details</td>
                                                <td style="color:#66c2ff">Amount (In Rs)</td>
                                            </tr>
                                            <tr>
                                                <td>Total fees to be collected</td>
                                                <td><input type="number" readonly tabindex="21" class="form-control fees_total"  id="fees_total" name="fees_total" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control final_fees_total"  id="final_fees_total" name="final_fees_total" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control grp_fees_total"  id="grp_fees_total" name="grp_fees_total" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control extra_fees_total"  id="extra_fees_total" name="extra_fees_total" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control amenity_fees_total"  id="amenity_fees_total" name="amenity_fees_total" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control grp_fees_total_received"  id="grp_fees_total_received" name="grp_fees_total_received" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control extra_fees_total_received"  id="extra_fees_total_received" name="extra_fees_total_received" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control amenity_fees_total_received"  id="amenity_fees_total_received" name="amenity_fees_total_received" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control grp_fees_balance"  id="grp_fees_balance" name="grp_fees_balance" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control extra_fees_balance"  id="extra_fees_balance" name="extra_fees_balance" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control amenity_fees_balance"  id="amenity_fees_balance" name="amenity_fees_balance" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control grp_concession_fees"  id="grp_concession_fees" name="grp_concession_fees" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control extra_concession_fees"  id="extra_concession_fees" name="extra_concession_fees" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control amenity_concession_fees"  id="amenity_concession_fees" name="amenity_concession_fees" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Scholarship/Concession</td>
                                                <td><input type="number" readonly class="form-control fees_scholarship" id="fees_scholarship" name="fees_scholarship" value=""></td>
                                                <td hidden><input type="number" readonly class="form-control final_concession_fees_total" value="0" id="final_concession_fees_total" name="final_concession_fees_total"></td>
                                            </tr>
                                            <tr>
                                                <td>Final amount to be collect</td>
                                                <td><input type="number" readonly class="form-control final_amount_recieved" id="final_amount_recieved" name="final_amount_recieved" value=""></td>
                                                <td hidden><input type="number" readonly class="form-control final_received_fees_total" id="final_received_fees_total" name="final_received_fees_total" value="0"> </td>
                                            </tr>
                                            <tr>
                                                <td>Fees collected</td>
                                                <td><input type="number" readonly class="form-control fees_collected" id="fees_collected" name="fees_collected" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control final_fees_collected" id="final_fees_collected" name="final_fees_collected" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Balance to be paid</td>
                                                <td><input type="number" readonly class="form-control fees_balance" id="fees_balance" name="fees_balance" value="0"></td>
                                                <td hidden><input type="number" readonly class="form-control final_fees_balance" id="final_fees_balance" name="final_fees_balance" value="0"></td>
                                            </tr>
                                            </table>
                                    </div><br><br>
                                    <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                        <div class="card-title">Payment Denomination</div></div><br><br>
                                            <div class="card-body row">
                                                <div id="comments" tabindex="11">
                                            <label>Payment Mode:</label></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input checked readonly type="radio" tabindex="10" name="collection_info" id="cash" value="Cash Payment" <?php if(isset($collection_info))
                                         echo ($collection_info=='Cash Payment ')?'checked':'' ?>> &nbsp;&nbsp; <label for="cash">Cash Payment </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" tabindex="10" name="collection_info" id="cheque" value="Cheque" <?php if(isset($collection_info))
                                         echo ($collection_info=='Cheque')?'checked':'' ?>> &nbsp;&nbsp; <label for="cheque">Cheque </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" tabindex="10" name="collection_info" id="neft" value="NEFT" <?php if(isset($collection_info))
                                         echo ($collection_info=='NEFT')?'checked':'' ?>> &nbsp;&nbsp; <label for="neft">Transfer (NEFT) </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div><br><br>

                                       <div id="cash_payment" style="display:none;" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Cash</th>
                                                <th>Receive</th>
                                                <th>Amount</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <tr>
                                        <td><input type="number" readonly id="qty" name="qty1" class="form-control qty" placeholder="Enter Event Fee" value="2000"></td>
                                        <td><input type="number" tabindex="13" class="form-control unit" id="unit" name="unit1" value="<?php if(isset($unit1)) echo $unit1; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount1" value="<?php if(isset($amount1)) echo $amount1; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly  id="qty" name="qty2" class="form-control qty" placeholder="Enter Event Fee" value="500"></td>
                                        <td><input type="number" tabindex="14" class="form-control unit" id="unit" name="unit2" value="<?php if(isset($unit2)) echo $unit2; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount2" value="<?php if(isset($amount2)) echo $amount2 ; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly id="qty" name="qty3" class="form-control qty" placeholder="Enter Event Fee" value="100"></td>
                                        <td><input type="number" tabindex="15" class="form-control unit" id="unit" name="unit3" value="<?php if(isset($unit3)) echo $unit3; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount3" value="<?php if(isset($amount3)) echo $amount3; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly id="qty" name="qty4" class="form-control qty" placeholder="Enter Event Fee" value="50"></td>
                                        <td><input type="number" tabindex="16" class="form-control unit" id="unit" name="unit4" value="<?php if(isset($unit4)) echo $unit4; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount4" value="<?php if(isset($amount4)) echo $amount4; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly id="qty" name="qty5" class="form-control qty" placeholder="Enter Event Fee" value="20"></td>
                                        <td><input type="number" tabindex="17" class="form-control unit" id="unit" name="unit5" value="<?php if(isset($unit5)) echo $unit5; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount5" value="<?php if(isset($amount5)) echo $amount5; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly  id="qty" name="qty6" class="form-control qty" placeholder="Enter Event Fee" value="10"></td>
                                        <td><input type="number" tabindex="18" class="form-control unit" id="unit" name="unit6" value="<?php if(isset($unit6)) echo $unit6; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount6" value="<?php if(isset($amount6)) echo $amount6; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" readonly  id="qty" name="qty7" class="form-control qty" placeholder="Enter Event Fee" value="5"></td>
                                        <td><input type="number" tabindex="18" class="form-control unit" id="unit" name="unit7" value="<?php if(isset($unit7)) echo $unit7; ?>"></td>
                                        <td><input type="number" readonly class="form-control amount" id="amount" name="amount7" value="<?php if(isset($amount7)) echo $amount7; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total:</td>
                                        <td><input type="number" readonly name="result" class="form-control result" value="<?php if(isset($result)) echo $result; ?>"></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                                    </div>
                                    <div id="cheque_payment" style="display:none" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <tbody>
                                    <tr>
                                        <td>Cheque Number</td>
                                        <td><input type="text" tabindex="13" class="form-control" id="cheque_number" name="cheque_number" value="<?php if(isset($cheque_number)) echo $cheque_number; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" tabindex="14" class="form-control" id="cheque_amount" name="cheque_amount" value="<?php if(isset($cheque_amount)) echo $cheque_amount ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Cheque Date</td>
                                        <td><input type="date" tabindex="15" class="form-control" id="cheque_date" name="cheque_date" value="<?php if(isset($cheque_date)) echo $cheque_date; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" tabindex="16" class="form-control" id="cheque_bank_name" name="cheque_bank_name" value="<?php if(isset($cheque_bank_name)) echo $cheque_bank_name; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Ledger</td>
                                        <td><div class="form-group">
                                                    <select tabindex="1" type="text" class="form-control" id="cheque_ledger_name" name="cheque_ledger_name" tabindex="1" >
                                                            <option value="">Select ledger</option>   
                                                            <option <?php  if(isset($cheque_ledger_name)) { if($cheque_ledger_name == "Yes" ) echo 'selected'; }?> value="Yes">2022 - 2023</option> 
                                                            <option <?php  if(isset($cheque_ledger_name)) { if($cheque_ledger_name == "No" ) echo 'selected'; }?> value="No">2023 - 2024</option> 
                                                    </select>             
                                                </div></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="neft_payment" style="display:none;" tabindex="11">
                                    <table id="eventdetail" class="table custom-table">
                                        <tbody>
                                    <tr>
                                        <td>NEFT Ref Number</td>
                                        <td><input type="text" tabindex="13" class="form-control" id="neft_number" name="neft_number" value="<?php if(isset($neft_number)) echo $neft_number; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" tabindex="14" class="form-control" id="neft_amount" name="neft_amount" value="<?php if(isset($neft_amount)) echo $neft_amount; ?>"></td>
                                       </tr>
                                    <tr>
                                        <td>Transaction Date</td>
                                        <td><input type="date" tabindex="15" class="form-control" id="neft_date" name="neft_date" value="<?php if(isset($neft_date)) echo $neft_date; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td><input type="text" tabindex="16" class="form-control" id="neft_bank_name" name="neft_bank_name" value="<?php if(isset($neft_bank_name)) echo $neft_bank_name; ?>"></td>
                                         </tr>
                                    <tr>
                                        <td>Ledger</td>
                                        <td><div class="form-group">
                                                    <select tabindex="1" type="text" class="form-control" id="neft_ledger_name" name="neft_ledger_name" tabindex="1" >
                                                            <option value="">Select Ledger</option>   
                                                            <option <?php  if(isset($neft_ledger_name)) { if($neft_ledger_name == "Yes" ) echo 'selected'; }?> value="Yes">2022 - 2023</option> 
                                                            <option <?php  if(isset($neft_ledger_name)) { if($neft_ledger_name == "No" ) echo 'selected'; }?> value="No">2023 - 2024</option> 
                                                    </select>             
                                                </div></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>            
                    

			    </div><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <div class="text-right">
                            <div>
                                <button type="submit" tabindex="19" name="submitpayfees" id="submitpayfees" class="btn btn-primary" value="submit" tabindex="10">Submit</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset"  tabindex="21" class="btn btn-outline-secondary">Cancel</button> 
                            </div> <br><br>
                        </div>
                    </div>
                                    </div>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </form>
                    </div>

<script>
    var loadFile = function(event) {
        var image = document.getElementById("viewimage");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
