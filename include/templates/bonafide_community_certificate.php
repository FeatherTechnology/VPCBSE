
<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
}

$StudentAdmissionList = $userObj->getAdmissionNoDetails($mysqli);

$id=0;
 if(isset($_POST['SubmitConductCertificate']) && $_POST['SubmitConductCertificate'] != '')
 {
    if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])){     
        $id = $_POST['id'];     
        $updateCondutCertificateCreation = $userObj->updateCondutCertificateCreation($mysqli,$id,$userid);  
        ?>
         <script>location.href='<?php echo $HOSTPATH; ?>conduct_certificate&msc=2';</script> 
        <?php   
    }
    else{   
        $addCondutCertificateCreation = $userObj->addCondutCertificateCreation($mysqli,$userid);   
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>conduct_certificate&msc=1';</script>
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
        $deleteCondutCertificateCreation = $userObj->deleteCondutCertificateCreation($mysqli,$del,$userid); 
        ?>
        <script>location.href='<?php echo $HOSTPATH; ?>conduct_certificate&msc=3';</script>
    <?php	
    }
    
    if(isset($_GET['upd']))
    {
    $idupd=$_GET['upd'];
    }
    $status =0;
    if($idupd>0)
    {
        $getCondutCertificateCreation = $userObj->getCondutCertificateCreation($mysqli,$idupd); 
        
        if (sizeof($getCondutCertificateCreation)>0) {
            for($ibranch=0;$ibranch<sizeof($getCondutCertificateCreation);$ibranch++)  {	
                $conduct_id                      = $getCondutCertificateCreation['conduct_id'];
                $admission_number                = $getCondutCertificateCreation['admission_number'];
                $student_name                    = $getCondutCertificateCreation['student_name'];
                $school_name                     = $getCondutCertificateCreation['school_name']; 
                $school_name                     = $getCondutCertificateCreation['school_name']; 
                $studied_from                    = $getCondutCertificateCreation['studied_from']; 
                $studied_to                      = $getCondutCertificateCreation['studied_to']; 
                $academic_year_from              = $getCondutCertificateCreation['academic_year_from']; 
                $academic_year_to                = $getCondutCertificateCreation['academic_year_to']; 
                $place                           = $getCondutCertificateCreation['place']; 
                $student_character               = $getCondutCertificateCreation['student_character']; 
                $phone_number                    = $getCondutCertificateCreation['phone_number'];                 
            }
        }
    }
    if (isset($_GET['upd'])) {
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
            $data_of_birth = $student['data_of_birth']; 
            $category = $student['category']; 
            $father_name = $student['father_name']; 
            
            // Rest of the code that uses the student data
        }
    } 
?>
<style>
  span.top:before {
        content: "";
        position: absolute;
        left: 408px;
        top: 260px;
        height: 5px;
        width: 60%;
        border-top: 3px solid #000;
      }
      span.top1:before {
        content: "";
        position: absolute;
        left: 208px;
        top: 320px;
        height: 5px;
        width: 78%;
        border-top: 3px solid #000;
      }
      span.top2:before {
        content: "";
        position: absolute;
        left: 788px;
        top: 380px;
        height: 5px;
        width: 25%;
        border-top: 3px solid #000;
      }
      span.top3:before {
        content: "";
        position: absolute;
        left: 358px;
        top: 430px;
        height: 5px;
        width: 64%;
        border-top: 3px solid #000;
      }
      span.top4:before {
        content: "";
        position: absolute;
        left: 578px;
        top: 490px;
        height: 5px;
        width: 44%;
        border-top: 3px solid #000;
      }
</style>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Bonafide  Certicate Community</li>
    </ol>

    <a href="edit_student_bonafide">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
        <button class="btn btn-info printpo" onclick="printData()"><span class="icon-print"></span>&nbsp; Print</button>

    </a>
</div>
				
    <div class="main-container">
            <!--------form start-->
        <form id = "customer_master" name="customer_master" action="" method="post" enctype="multipart/form-data"> 
                <input type="hidden" class="form-control" value="<?php if(isset($transfer_id)) echo $transfer_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="">
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              
                        <div class="card">
                                <div class="card-header">Bonafide  Certificate </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <center><h2>VIDHYA PARTHI NATIONAL ACADEMY</h2><br> 
                                        <h6>Kallar Nagar, Kameshwaram, Nagapatinam - 611110 </h6><br>
                                        <u><hr></u>

                                                    <p style="float:right"><b>Date:</b><?php
                                                    $currentDate = date('d-m-Y'); 
                                                    echo $currentDate;
                                                    ?></p><br><br>
                                                    <h3><u> BONAFIDE CERTIFICATE</u></h3>  <br><br>
                                                    </center>

                                                    <h3 style="text-transform: capitalize;font-weight: lighter;">This Is To Certify That selvan / selvi <span class="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student_name; ?></span><br><br>
                                                    s/o. d/o. mr./mrs. <span class="top1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $father_name; ?></span> <br><br>
                                                     is a bonafide student of this school and he / she was Studying in std <span class="top2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $standard; ?></span><br><br>
                                                     see during The academic year <span class="top3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student_name; ?></span><br><br>
                                                     as per our school records his / her. community is  <span class="top4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category; ?></span><br><br>
                                                   </h3><br><br><br><br><br>

                                                    <h4 style="float:left"><b>Place</b>:Kameshwaram</h4><h4 style="float:right"><b>Principal Signature</b></h4><br><br><br>
                                                    <h6 style="float:right">with office seal</h6>
                                                    <h4 style="float:left"><b>Date</b>:<?php
                                                    $currentDate = date('d-m-Y'); 
                                                    echo $currentDate;
                                                    ?></h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <script>
                        function printData() {
  var printWindow = window.open('', '_blank');
  var htmlContent = document.getElementById('customer_master').innerHTML;
  printWindow.document.open();
  printWindow.document.write('<html><head><title>Print</title></head><body>' + htmlContent + '</body></html>');
  printWindow.document.close();
  printWindow.print();
  printWindow.onafterprint = function() {
    printWindow.close();
  };
}

                    </script>