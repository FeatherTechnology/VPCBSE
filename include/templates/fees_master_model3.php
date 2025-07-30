<?php 
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
} 
$FeesList = $userObj->getFeesMasterModel1Details($mysqli);

?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Fees Master</li>
    </ol>

</div>
				<!-- Page header end -->

				<!-- Main container start -->
<div class="main-container">
<!--------form start-->
<form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" class="form-control" value="<?php if(isset($fees_id)) echo $fees_id; ?>"  id="id" name="id" aria-describedby="id" placeholder="Enter id">
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                    	 <div class="row ">
                            <!--Fields -->
                           <div class="col-md-12 "> 
                              <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Academic Year</label>
                                        <select tabindex="1" type="text" class="form-control select2" id="academic_year" name="academic_year" tabindex="1" >
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control select2" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option value="Tamil" <?php  if(isset($medium)) { if($medium == "Tamil") echo 'selected'; }?>>Tamil</option> 
                                        <option value="English" <?php  if(isset($medium)) { if($medium == "English") echo 'selected'; }?>>English</option>
                                    </select>
                                    </div>
                                </div>  
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control standard select2" id="standard" name="standard">
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
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                            <div id="stockinfotable">
                                <div class="card">
                                    <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                        <div class="card-title">Term II Fees</div>
                                    </div>
                                </div>
                                <!-- alert messages -->
                                <div id="fees_detailsInsertNotOk" class="unsuccessalert">Term II Fees Already Exists, Please Enter a Different Name!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsInsertOk" class="successalert">Term II Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsUpdateOk" class="successalert">Term II Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Term II Fees!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsDeleteOk" class="successalert">Term II Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>
                                
                                <div class="col-md-12 "> 
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Particulars</label>
                                                    <input  name="fees_id" id="fees_id" class="form-control" value="<?php if(isset($fees_id )) echo $fees_id ; ?>" type="hidden">
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
                                                        <a id="edit_grp" value="<?php echo $FeesList[$j]['fees_id'] ?>"><span class='icon-border_color'></span></a> &nbsp;
                                                        <a id="delete_grp" value="<?php echo $FeesList[$j]['fees_id'] ?>"><span class='icon-trash-2'>Delete</span></a>
                                                    </td>
                                                </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br><br>
                            <!-- grp Table End -->
                            <div id="stockinfotableextra">
                                <div class="card">
                                    <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                                        <div class="card-title">Term III Fees</div>
                                    </div>
                                </div>
                                <!-- alert messages -->
                                <div id="fees_detailsextraInsertNotOk" class="unsuccessalert">Term III Fees Already Exists, Please Enter a Different Name!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsextraInsertOk" class="successalert">Term III Fees Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsextraUpdateOk" class="successalert">Term III Fees Updated Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsextraDeleteNotOk" class="unsuccessalert">You Don't Have Rights To Delete This Term III Fees!
                                <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>

                                <div id="fees_detailsextraDeleteOk" class="successalert">Term III Fees Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
                                </div>
                                
                                <div class="col-md-12 "> 
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Particulars</label>
                                                   <input  name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control" <?php if(isset($extra_particulars)) echo $extra_particulars; ?>  type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input  name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control" <?php if(isset($extra_amount)) echo $extra_amount; ?>  type="number">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input  name="extra_date" id="extra_date"  class="form-control" <?php if(isset($extra_date)) echo $extra_date; ?> type="date">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                            <button style="margin-top:20px;" type="button" name="Submit_Extra" id="Submit_Extra" class="btn btn-primary" value="submit" tabindex="10">Save</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="updatedstockinfotableextra"> 
                                    <table class="table custom-table" id="updatedSyllabusTableextra"> 
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
                                                    <td><?php  echo $FeesList[$j]['extra_particulars']; ?></td>
                                                    <td><?php  echo $FeesList[$j]['extra_amount']; ?></td>
                                                    <td><?php  echo $FeesList[$j]['extra_date']; ?></td>
                                                    <td>
                                                        <a id="edit_fees" value="<?php echo $FeesList[$j]['fees_id'] ?>"><span class='icon-border_color'></span></a> &nbsp;
                                                        <a id="delete_fees" value="<?php echo $FeesList[$j]['fees_id'] ?>"><span class='icon-trash-2'></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br><br>
                            <!-- Extra Table End -->
                
                </div>
            </div>
        </div>  
    </form>