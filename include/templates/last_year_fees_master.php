<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 
$FeesList = $userObj->getFeesMasterModel1Details($mysqli);

?>
<style>.select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>
<link rel="stylesheet" href="css/select2.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Last Year Fees Master </li>
    </ol>

    <a href="edit_school_creation">
        <button type="button" class="btn btn-primary"><span class="icon-arrow-left"></span>&nbsp; Back</button>
    <!-- <button type="button" class="btn btn-primary"><span class="icon-border_color"></span>&nbsp Edit Employee Master</button> -->
    </a>
</div>
				<!-- Page header end -->

				<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($last_year_fees_master_id)) echo $last_year_fees_master_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                    	 <div class="row ">
                            <!--Fields -->
                           <div class="col-md-12 "> 
                              <div class="row">
                              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Academic Year</label>
                                        <select class="form-control select2" id="academic_year" name="academic_year">
                                          <option>Select Year</option> 
                                          <option value="2019 - 2020" <?php  if(isset($academic_year)) { if($academic_year == "2019 - 2020") echo 'selected'; }?>>2019 - 2020</option> 
                                          <option value="2020 - 2021" <?php  if(isset($academic_year)) { if($academic_year == "2020 - 2021") echo 'selected'; }?>>2020 - 2021</option> 
                                          <option value="2021 - 2022" <?php  if(isset($academic_year)) { if($academic_year == "2021 - 2022") echo 'selected'; }?>>2021 - 2022</option> 
                                          <option value="2022 - 2023" <?php  if(isset($academic_year)) { if($academic_year == "2022 - 2023") echo 'selected'; }?>>2022 - 2023</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control select2" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option value="Tamil" <?php  if(isset($medium)) { if($medium == "Tamil") echo 'selected'; }?>>Tamil</option> 
                                        <option value="English" <?php  if(isset($medium)) { if($medium == "English") echo 'selected'; }?>>English</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Students Type</label>
                                        <select class="form-control select2" id="student_type" name="student_type">
                                        <option>Select Type</option> 
                                        <option value="New Student" <?php  if(isset($student_type)) { if($student_type == "New Student") echo 'selected'; }?>>New Student</option> 
                                        <option value="Old Student" <?php  if(isset($student_type)) { if($student_type == "Old Student") echo 'selected'; }?>>Old Student</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control select2" id="standard" name="standard">
                                        <option value="">Select a Standard...</option>
                                                <option value="PRE.K.G" <?php  if(isset($temp_standard)) { if($temp_standard == "PRE.K.G") echo 'selected'; }?>>PRE.K.G</option>
                                                <option value="L.K.G"<?php  if(isset($temp_standard)) { if($temp_standard == "L.K.G") echo 'selected'; }?>>L.K.G</option>
                                                <option value="U.K.G" <?php  if(isset($temp_standard)) { if($temp_standard == "U.K.G") echo 'selected'; }?>>U.K.G</option>
                                                <option value="I" <?php  if(isset($temp_standard)) { if($temp_standard == "I") echo 'selected'; }?>>I</option>
                                                <option value="II" <?php  if(isset($temp_standard)) { if($temp_standard == "II") echo 'selected'; }?>>II</option>
                                                <option value="III" <?php  if(isset($temp_standard)) { if($temp_standard == "III") echo 'selected'; }?>>III</option>
                                                <option value="IV" <?php  if(isset($temp_standard)) { if($temp_standard == "IV") echo 'selected'; }?>>IV</option>
                                                <option value="V" <?php  if(isset($temp_standard)) { if($temp_standard == "V") echo 'selected'; }?>>V</option>
                                                <option value="VI" <?php  if(isset($temp_standard)) { if($temp_standard == "VI") echo 'selected'; }?>>VI</option>
                                                <option value="VI" <?php  if(isset($temp_standard)) { if($temp_standard == "VI") echo 'selected'; }?>>VII</option>
                                                <option value="VIII" <?php  if(isset($temp_standard)) { if($temp_standard == "VIII") echo 'selected'; }?>>VIII</option>
                                                <option value="IX" <?php  if(isset($temp_standard)) { if($temp_standard == "IX") echo 'selected'; }?>>IX</option>
                                                <option value="X" <?php  if(isset($temp_standard)) { if($temp_standard == "X") echo 'selected'; }?>>X</option>
                                                <option value="XI_Maths_Biology" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Maths_Biology") echo 'selected'; }?>>XI_Maths_Biology</option>
                                                <option value="XI_Maths_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Maths_ComputerScience") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                                <option value="XI_Biology_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Biology_ComputerScience") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                                <option value="XII_Maths_Biology" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Maths_Biology") echo 'selected'; }?>>XII_Maths_Biology</option>
                                                <option value="XII_Maths_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Maths_ComputerScience") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                                <option value="XII_Biology_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Biology_ComputerScience") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                                <option value="XI_All" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_All") echo 'selected'; }?>>XI_All</option>
                                                <option value="XII_All" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_All") echo 'selected'; }?>>XII_All</option>
                                                <option value="XI_Commerce_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XI_Commerce_ComputerScience") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                                <option value="XII_Commerce_ComputerScience" <?php  if(isset($temp_standard)) { if($temp_standard == "XII_Commerce_ComputerScience") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                                              
                                        </select>
                                    </div>
                                </div><br><br><br><br><br><br>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <input type="button" name="table_view" id="table_view" class="btn btn-primary table_view" value="View" tabindex="14">

                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                            <div id="stockinfotable">
                                <div class="card">
                                    <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                        <div class="card-title">Last Year Fees</div>
                                    </div>
                                </div>
                                <!-- alert messages -->
                                <div id="fees_detailsInsertNotOk" class="unsuccessalert">Last Year Fees Already Exists, Please Enter a Different Name!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsInsertOk" class="successalert">Last Year Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsUpdateOk" class="successalert">Last Year Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Last Year Fees!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsDeleteOk" class="successalert">Last Year Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>
                                
                                <div class="col-md-12 "> 
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Particulars</label>
                                                <input  name="lastInsertId" id="cc" class="form-control" value="<?php if(isset($lastInsertId )) echo $lastInsertId ; ?>" type="hidden">
                                                    <input  name="last_year_fees_master_id" id="last_year_fees_master_id" class="form-control" value="<?php if(isset($last_year_fees_master_id )) echo $last_year_fees_master_id ; ?>" type="hidden">
                                                    <input  name="academic_year" id="academic_year" class="form-control" value="<?php if(isset($academic_year )) echo $academic_year ; ?>" type="hidden">
                                                    <input  name="medium" id="medium" class="form-control" value="<?php if(isset($medium )) echo $medium ; ?>" type="hidden">
                                                    <input  name="student_type" id="student_type" class="form-control" value="<?php if(isset($student_type )) echo $student_type ; ?>" type="hidden">
                                                    <input  name="standard" id="standard" class="form-control" value="<?php if(isset($standard )) echo $standard ; ?>" type="hidden">
                                                    <input  name="insert_login_id" id="insert_login_id" class="form-control" value="<?php if(isset($userid )) echo $userid ;?>" type="hidden">
                                                    <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control" <?php if(isset($grp_particulars)) echo $grp_particulars; ?>  type="text">
                                                    <span class="text-danger" tabindex="1" id="grp_particularsCheck">Enter Particulars</span>
                                                </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control" <?php if(isset($grp_amount)) echo $grp_amount; ?>  type="number">
                                                <span class="text-danger" tabindex="1" id="grp_amountCheck">Enter Amount</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input  name="grp_date" id="grp_date"  class="form-control" <?php if(isset($grp_date)) echo $grp_date; ?> type="date">
                                            <span class="text-danger" tabindex="1" id="grp_dateCheck">Enter Due Date</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                            <button style="margin-top:20px;" type="button" name="Submit_Group" id="Submit_Group" class="btn btn-primary" value="submit" tabindex="10">Save</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="updatedstockinfotable"> 
                                    <table class="table custom-table" id="updatedSyllabusTable"> 
                                    <thead>
                                        <tr>
                                            <th width="50">Particulars</th>
                                            <th>Fee Amount</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php if (sizeof($FeesList)>0) { 
                                                for($j=0;$j<count($FeesList);$j++) { ?>
                                                <tr>
                                                    <td class="col-md-2 col-xl-2"><?php echo $j+1; ?></td>
                                                    <td><?php  echo $FeesList[$j]['grp_particulars']; ?></td>
                                                    <td><?php  echo $FeesList[$j]['grp_amount']; ?></td>
                                                    <td><?php  echo $FeesList[$j]['grp_date']; ?></td>
                                                    <td>
                                                        <a id="edit_grp" value="<?php echo $FeesList[$j]['last_year_fees_master_id'] ?>"><span class='icon-border_color'></span></a> &nbsp;
                                                        <a id="delete_grp" value="<?php echo $FeesList[$j]['last_year_fees_master_id'] ?>"><span class='icon-trash-2'>Delete</span></a>
                                                    </td>
                                                </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br><br>
                            <!-- grp Table End -->
                        </div>
                    </div>
                </div>  
            </form>
<script>
    var loadFile = function(event) {
        var image = document.getElementById("viewimage");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    $('.select2').select2();
</script>

