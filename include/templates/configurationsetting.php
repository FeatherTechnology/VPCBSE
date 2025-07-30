<?php

// $getconfigurationsetting = $userObj->getconfigurationsetting($mysqli,$idupd); 
?>

<style type="text/css">
  .cardframe{
    border-top: 10px solid #1B6AAA;
    border-bottom: 30px solid #1B6AAA;
    border-left: 10px solid #1B6AAA;
    border-right: 10px solid #1B6AAA;
  }
  .tabtitle{
    width: 100%;
    font-weight: bold;
    color: white;
    padding: 15px 5px 5px 10px;
  }
</style>
<!-- Page header start -->
<div class="page-header">
<ol class="breadcrumb">
<li class="breadcrumb-item">Configuration Setting</li>
</ol>
</div>
<!-- Page header end -->

<!-- Main container start -->

<div class="main-container">


<!-- Edit Configuration -->
    <div id="configurationupdateok" class="successalert">Configuration Has been Updated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="configurationupdatenotok" class="unsuccessalert">Configuration Not Updated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>



<br />
<!-- Row start -->
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="card">
<div class="tab tabtitle">
<h4>Fees Master</h4>
</div>

<div class="card-body cardframe">
<div class="card-title">Select The Fees Model</div>
<center><table>
  <td><input type="radio"  tabindex="1" id="Model1" checked  name="Model" value="model1" <?php if(isset($billtype)){if($billtype == 'model1'){ echo 'checked'; } } ?> ></td>
  <td><label for="model1">Model 1</label></td>

  <td><input type="radio"  tabindex="2" id="Model2" name="Model" value="model2" <?php if(isset($billtype)){if($billtype == 'model2'){ echo 'checked'; } } ?> ></td>
  <td><label for="model2">Model 2</label></td>

  <td><input type="radio"  tabindex="2" id="Model3" name="Model" value="model3" <?php if(isset($billtype)){if($billtype == 'model3'){ echo 'checked'; } } ?> ></td>
  <td><label for="model3">Model 3</label></td>


  <td><input type="radio"  tabindex="2" id="Model4" name="Model" value="model4" <?php if(isset($billtype)){if($billtype == 'model4'){ echo 'checked'; } } ?> ></td>
  <td><label for="model4">Model 4</label></td>
</table></center>
<br><hr>

<center>
<button id="viewbill1"   tabindex="3" class="btn btn-primary">View Fees Model 1</button>
<button id="viewbill2"   tabindex="4" style="display: none;" class="btn btn-primary">View Fees Model 2</button>
<button id="viewbill3"   tabindex="4" style="display: none;" class="btn btn-primary">View Fees Model 3</button>
<button id="viewbill4"   tabindex="4" style="display: none;" class="btn btn-primary">View Fees Model 4</button>

</center><br><br>

<!-- Bill Model 1 -->
            <div id="feesmodel1field" style="width:90%; margin: auto; display: none;">
            <form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
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
                                        <select class="form-control" id="academic_year" name="academic_year">
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
                                        <select class="form-control" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option value="Tamil" <?php  if(isset($medium)) { if($medium == "Tamil") echo 'selected'; }?>>Tamil</option> 
                                        <option value="English" <?php  if(isset($medium)) { if($medium == "English") echo 'selected'; }?>>English</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Students Type</label>
                                        <select class="form-control" id="student_type" name="student_type">
                                        <option>Select Type</option> 
                                        <option value="New Student" <?php  if(isset($student_type)) { if($student_type == "New Student") echo 'selected'; }?>>New Student</option> 
                                        <option value="Old Student" <?php  if(isset($student_type)) { if($student_type == "Old Student") echo 'selected'; }?>>Old Student</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control" id="standard" name="standard">
                                              <option value="">Select a Standard...</option>
                                              <option value="1" <?php  if(isset($standard)) { if($standard == "1") echo 'selected'; }?>>PRE.K.G</option>
                                              <option value="2"<?php  if(isset($standard)) { if($standard == "2") echo 'selected'; }?>>L.K.G</option>
                                              <option value="3" <?php  if(isset($standard)) { if($standard == "3") echo 'selected'; }?>>U.K.G</option>
                                              <option value="4" <?php  if(isset($standard)) { if($standard == "4") echo 'selected'; }?>>I</option>
                                              <option value="5" <?php  if(isset($standard)) { if($standard == "5") echo 'selected'; }?>>II</option>
                                              <option value="6" <?php  if(isset($standard)) { if($standard == "6") echo 'selected'; }?>>III</option>
                                              <option value="7" <?php  if(isset($standard)) { if($standard == "7") echo 'selected'; }?>>IV</option>
                                              <option value="8" <?php  if(isset($standard)) { if($standard == "8") echo 'selected'; }?>>V</option>
                                              <option value="9" <?php  if(isset($standard)) { if($standard == "9") echo 'selected'; }?>>VI</option>
                                              <option value="10" <?php  if(isset($standard)) { if($standard == "10") echo 'selected'; }?>>VII</option>
                                              <option value="11" <?php  if(isset($standard)) { if($standard == "11") echo 'selected'; }?>>VIII</option>
                                              <option value="12" <?php  if(isset($standard)) { if($standard == "12") echo 'selected'; }?>>IX</option>
                                              <option value="13" <?php  if(isset($standard)) { if($standard == "13") echo 'selected'; }?>>X</option>
                                              <option value="14" <?php  if(isset($standard)) { if($standard == "14") echo 'selected'; }?>>XI_Maths_Biology</option>
                                              <option value="15" <?php  if(isset($standard)) { if($standard == "15") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                              <option value="16" <?php  if(isset($standard)) { if($standard == "16") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                              <option value="17" <?php  if(isset($standard)) { if($standard == "17") echo 'selected'; }?>>XII_Maths_Biology</option>
                                              <option value="18" <?php  if(isset($standard)) { if($standard == "18") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                              <option value="19" <?php  if(isset($standard)) { if($standard == "19") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                              <option value="20" <?php  if(isset($standard)) { if($standard == "20") echo 'selected'; }?>>XI_All</option>
                                              <option value="21" <?php  if(isset($standard)) { if($standard == "21") echo 'selected'; }?>>XII_All</option>
                                              <option value="22" <?php  if(isset($standard)) { if($standard == "22") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                              <option value="23" <?php  if(isset($standard)) { if($standard == "23") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                                                   
                                        </select>
                                    </div>
                                </div><br><br><br><br><br><br>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <input type="button" name="table_view" id="table_view" class="btn btn-primary" value="View" tabindex="14">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            <div class="table-container" style="display:none" id="subject_details">
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Group/Course Fees</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control" <?php if(isset($grp_particulars)) echo $grp_particulars; ?>  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control" <?php if(isset($grp_amount)) echo $grp_amount; ?>  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input  name="grp_date" id="grp_date" placeholder="Amount" class="form-control" <?php if(isset($grp_date)) echo $grp_date; ?> type="date">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <button style="margin-top:20px;" type="submit" name="Submit_Group" id="Submit_Group" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="groupTable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Extra Curricular Activities</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input  name="extra_date" id="extra_date" placeholder="Amount" class="form-control"  type="date">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                           <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="extra_curricularTable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Amenity Fees</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="amenity_particulars" id="amenity_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="amenity_amount" id="amenity_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input  name="amenity_date" id="amenity_date" placeholder="Amount" class="form-control"  type="date">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                             <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
                  <div class="table-responsive">
                      <table id="amenityTable" class="table custom-table">
                          <thead>
                              <tr>
                                  <th width="50">Particulars</th>
                                  <th>Fee Amount</th>
                                  <th>Due Date</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10"></div>
                      <div class="col-md-2">
                        <div class="text-right">
                          <button type="submit"  tabindex="5"  id="submitbillingconfigurationbtn1" name="submitbillingconfigurationbtn1" value="Submit" class="btn btn-primary">Submit</button>
                          <button type="reset"  tabindex="6"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
                        </div>
                    </div>	
                </div>
            </div>
          </div>  
        </form>
      </div>
<!-- Fees Model 2 -->
 <!-- Fees Model5 -->
 <div id="feesmodel2field" style="width:90%; margin: auto; display: none;">
            <form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
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
                                        <select class="form-control" id="academic_year" name="academic_year">
                                          <option>Select Year</option> 
                                          <option>2019 - 2020</option> 
                                          <option>2020 - 2021</option> 
                                          <option>2021 - 2022</option> 
                                          <option>2022 - 2023</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option>Tamil</option> 
                                        <option>English</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Students Type</label>
                                        <select class="form-control" id="student_type" name="student_type">
                                        <option>Select Type</option> 
                                        <option value="New Student" <?php  if(isset($student_type)) { if($student_type == "New Student") echo 'selected'; }?>>New Student</option> 
                                        <option value="Old Student" <?php  if(isset($student_type)) { if($student_type == "Old Student") echo 'selected'; }?>>Old Student</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control" id="standard5" name="standard5">
                                              <option value="">Select a Standard...</option>
                                              <option value="PRE.K.G" <?php  if(isset($standard)) { if($standard == "PRE.K.G") echo 'selected'; }?>>PRE.K.G</option>
                                              <option value="L.K.G"<?php  if(isset($standard)) { if($standard == "L.K.G") echo 'selected'; }?>>L.K.G</option>
                                              <option value="U.K.G" <?php  if(isset($standard)) { if($standard == "U.K.G") echo 'selected'; }?>>U.K.G</option>
                                              <option value="I" <?php  if(isset($standard)) { if($standard == "I") echo 'selected'; }?>>I</option>
                                              <option value="II" <?php  if(isset($standard)) { if($standard == "II") echo 'selected'; }?>>II</option>
                                              <option value="III" <?php  if(isset($standard)) { if($standard == "III") echo 'selected'; }?>>III</option>
                                              <option value="IV" <?php  if(isset($standard)) { if($standard == "IV") echo 'selected'; }?>>IV</option>
                                              <option value="V" <?php  if(isset($standard)) { if($standard == "V") echo 'selected'; }?>>V</option>
                                              <option value="VI" <?php  if(isset($standard)) { if($standard == "VI") echo 'selected'; }?>>VI</option>
                                              <option value="VII" <?php  if(isset($standard)) { if($standard == "VII") echo 'selected'; }?>>VII</option>
                                              <option value="VIII" <?php  if(isset($standard)) { if($standard == "VIII") echo 'selected'; }?>>VIII</option>
                                              <option value="IX" <?php  if(isset($standard)) { if($standard == "IX") echo 'selected'; }?>>IX</option>
                                              <option value="X" <?php  if(isset($standard)) { if($standard == "X") echo 'selected'; }?>>X</option>
                                              <option value="XI_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XI_Maths_Biology") echo 'selected'; }?>>XI_Maths_Biology</option>
                                              <option value="XI_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Maths_ComputerScience") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                              <option value="XI_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Biology_ComputerScience") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                              <option value="XII_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XII_Maths_Biology") echo 'selected'; }?>>XII_Maths_Biology</option>
                                              <option value="XII_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Maths_ComputerScience") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                              <option value="XII_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Biology_ComputerScience") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                              <option value="XI_All" <?php  if(isset($standard)) { if($standard == "XI_All") echo 'selected'; }?>>XI_All</option>
                                              <option value="XII_All" <?php  if(isset($standard)) { if($standard == "XII_All") echo 'selected'; }?>>XII_All</option>
                                              <option value="XI_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Commerce_ComputerScience") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                              <option value="XII_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Commerce_ComputerScience") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                                                   
                                        </select>
                                    </div>
                                </div><br><br><br><br><br><br>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <input type="button" name="table_view5" id="table_view5" class="btn btn-primary" value="View" tabindex="14">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            <div class="table-container" style="display:none" id="subject_details1">
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Group/Course Fees</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Select Ledger</label>
                            <select class="form-control" id="academic_year" name="academic_year">
                                <option>Select Year</option> 
                                <option value="uniform" <?php  if(isset($standard)) { if($standard == "Uniform") echo 'selected'; }?>>uniform</option> 
                                <option value="Bag" <?php  if(isset($standard)) { if($standard == "Bag") echo 'selected'; }?>>Bag</option> 
                                <option value="Sports Kits" <?php  if(isset($standard)) { if($standard == "Sports Kits") echo 'selected'; }?>>Sports Kits</option> 
                                <option value="Books" <?php  if(isset($standard)) { if($standard == "Books") echo 'selected'; }?>>Books</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="groupTable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Boys Uniform</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <label>Select Ledger</label>
                            <select class="form-control" id="academic_year" name="academic_year">
                                <option>Select Year</option> 
                                <option>2019 - 2020</option> 
                                <option>2020 - 2021</option> 
                                <option>2021 - 2022</option> 
                                <option>2022 - 2023</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                           <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="extra_curricularTable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Girls Uniform</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="amenity_particulars" id="amenity_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="amenity_amount" id="amenity_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <label>Select Ledger</label>
                            <select class="form-control" id="academic_year" name="academic_year">
                                <option>Select Year</option> 
                                <option>2019 - 2020</option> 
                                <option>2020 - 2021</option> 
                                <option>2021 - 2022</option> 
                                <option>2022 - 2023</option> 
                            </select>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                             <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
                  <div class="table-responsive">
                      <table id="amenityTable" class="table custom-table">
                          <thead>
                              <tr>
                                  <th width="50">Particulars</th>
                                  <th>Fee Amount</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10"></div>
                      <div class="col-md-2">
                        <div class="text-right">
                          <button type="submit"  tabindex="5"  id="submitbillingconfigurationbtn3" name="submitbillingconfigurationbtn3" value="Submit" class="btn btn-primary">Submit</button>
                          <button type="reset"  tabindex="6"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
                        </div>
                    </div>	
                </div>
            </div>
          </div>  
        </form>
      </div>
      <!-- Model 3 -->
    <div id="feesmodel3field" style="width:90%; margin: auto; display: none;">
            <form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
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
                                        <select class="form-control" id="academic_year" name="academic_year">
                                          <option>Select Year</option> 
                                          <option>2019 - 2020</option> 
                                          <option>2020 - 2021</option> 
                                          <option>2021 - 2022</option> 
                                          <option>2022 - 2023</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option>Tamil</option> 
                                        <option>English</option>
                                    </select>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Students Type</label>
                                            <select class="form-control" id="student_type" name="student_type">
                                            <option>Select Type</option> 
                                            <option value="New Student" <?php  if(isset($student_type)) { if($student_type == "New Student") echo 'selected'; }?>>New Student</option> 
                                            <option value="Old Student" <?php  if(isset($student_type)) { if($student_type == "Old Student") echo 'selected'; }?>>Old Student</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control" id="standard1" name="standard1">
                                              <option value="">Select a Standard...</option>
                                              <option value="PRE.K.G" <?php  if(isset($standard)) { if($standard == "PRE.K.G") echo 'selected'; }?>>PRE.K.G</option>
                                              <option value="L.K.G" <?php  if(isset($standard)) { if($standard == "L.K.G") echo 'selected'; }?>>L.K.G</option>
                                              <option value="U.K.G" <?php  if(isset($standard)) { if($standard == "U.K.G") echo 'selected'; }?>>U.K.G</option>
                                              <option value="I" <?php  if(isset($standard)) { if($standard == "I") echo 'selected'; }?>>I</option>
                                              <option value="II" <?php  if(isset($standard)) { if($standard == "II") echo 'selected'; }?>>II</option>
                                              <option value="III" <?php  if(isset($standard)) { if($standard == "III") echo 'selected'; }?>>III</option>
                                              <option value="IV" <?php  if(isset($standard)) { if($standard == "IV") echo 'selected'; }?>>IV</option>
                                              <option value="V" <?php  if(isset($standard)) { if($standard == "V") echo 'selected'; }?>>V</option>
                                              <option value="VI" <?php  if(isset($standard)) { if($standard == "VI") echo 'selected'; }?>>VI</option>
                                              <option value="VII" <?php  if(isset($standard)) { if($standard == "VII") echo 'selected'; }?>>VII</option>
                                              <option value="VIII" <?php  if(isset($standard)) { if($standard == "VIII") echo 'selected'; }?>>VIII</option>
                                              <option value="IX" <?php  if(isset($standard)) { if($standard == "IX") echo 'selected'; }?>>IX</option>
                                              <option value="X" <?php  if(isset($standard)) { if($standard == "X") echo 'selected'; }?>>X</option>
                                              <option value="XI_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XI_Maths_Biology") echo 'selected'; }?>>XI_Maths_Biology</option>
                                              <option value="XI_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Maths_ComputerScience") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                              <option value="XI_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Biology_ComputerScience") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                              <option value="XII_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XII_Maths_Biology") echo 'selected'; }?>>XII_Maths_Biology</option>
                                              <option value="XII_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Maths_ComputerScience") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                              <option value="XII_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Biology_ComputerScience") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                              <option value="XI_All" <?php  if(isset($standard)) { if($standard == "XI_All") echo 'selected'; }?>>XI_All</option>
                                              <option value="XII_All" <?php  if(isset($standard)) { if($standard == "XII_All") echo 'selected'; }?>>XII_All</option>
                                              <option value="XI_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Commerce_ComputerScience") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                              <option value="XII_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Commerce_ComputerScience") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                         </select>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group"> -->
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <!-- <input type="button" name="table_view" id="table_view" class="btn btn-primary" value="View" tabindex="14">
                                        </div>
                                    </div> -->
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            <div class="table-container" style="display:none" id="subject_details2">
                <div class="card">
                        <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                            <div class="card-title">Term II Fees</div>
                        </div>
                </div><br>
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input  name="grp_date" id="grp_date" placeholder="Amount" class="form-control"  type="date">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="TermIITable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Term III Fees</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input  name="extra_date" id="extra_date" placeholder="Amount" class="form-control"  type="date">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                           <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="TermIIITable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="row">
                  <div class="col-md-10"></div>
                      <div class="col-md-2">
                        <div class="text-right">
                          <button type="submit"  tabindex="5"  id="submitbillingconfigurationbtn2" name="submitbillingconfigurationbtn2" value="Submit" class="btn btn-primary">Submit</button>
                          <button type="reset"  tabindex="6"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
                        </div>
                    </div>	
                </div>
          </div>  
          </div>
        </form>
      </div>
<!-- fees Model 2 end Field -->

     
   
<!-- Fees Model 2 -->
<div id="feesmodel4field" style="width:90%; margin: auto; display: none;">
            <form id = "school_creation" name="school_creation" action="" method="post" enctype="multipart/form-data"> 
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
                                        <select class="form-control" id="academic_year" name="academic_year">
                                          <option>Select Year</option> 
                                          <option>2019 - 2020</option> 
                                          <option>2020 - 2021</option> 
                                          <option>2021 - 2022</option> 
                                          <option>2022 - 2023</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Medium</label>
                                        <select class="form-control" id="medium" name="medium">
                                        <option>Select Medium</option> 
                                        <option>Tamil</option> 
                                        <option>English</option>
                                    </select>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Students Type</label>
                                            <select class="form-control" id="student_type" name="student_type">
                                            <option>Select Type</option> 
                                            <option value="New Student" <?php  if(isset($student_type)) { if($student_type == "New Student") echo 'selected'; }?>>New Student</option> 
                                            <option value="Old Student" <?php  if(isset($student_type)) { if($student_type == "Old Student") echo 'selected'; }?>>Old Student</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Standard List</label>
                                        <select class="form-control" id="standard6" name="standard6">
                                              <option value="">Select a Standard...</option>
                                              <option value="PRE.K.G" <?php  if(isset($standard)) { if($standard == "PRE.K.G") echo 'selected'; }?>>PRE.K.G</option>
                                              <option value="L.K.G" <?php  if(isset($standard)) { if($standard == "L.K.G") echo 'selected'; }?>>L.K.G</option>
                                              <option value="U.K.G" <?php  if(isset($standard)) { if($standard == "U.K.G") echo 'selected'; }?>>U.K.G</option>
                                              <option value="I" <?php  if(isset($standard)) { if($standard == "I") echo 'selected'; }?>>I</option>
                                              <option value="II" <?php  if(isset($standard)) { if($standard == "II") echo 'selected'; }?>>II</option>
                                              <option value="III" <?php  if(isset($standard)) { if($standard == "III") echo 'selected'; }?>>III</option>
                                              <option value="IV" <?php  if(isset($standard)) { if($standard == "IV") echo 'selected'; }?>>IV</option>
                                              <option value="V" <?php  if(isset($standard)) { if($standard == "V") echo 'selected'; }?>>V</option>
                                              <option value="VI" <?php  if(isset($standard)) { if($standard == "VI") echo 'selected'; }?>>VI</option>
                                              <option value="VII" <?php  if(isset($standard)) { if($standard == "VII") echo 'selected'; }?>>VII</option>
                                              <option value="VIII" <?php  if(isset($standard)) { if($standard == "VIII") echo 'selected'; }?>>VIII</option>
                                              <option value="IX" <?php  if(isset($standard)) { if($standard == "IX") echo 'selected'; }?>>IX</option>
                                              <option value="X" <?php  if(isset($standard)) { if($standard == "X") echo 'selected'; }?>>X</option>
                                              <option value="XI_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XI_Maths_Biology") echo 'selected'; }?>>XI_Maths_Biology</option>
                                              <option value="XI_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Maths_ComputerScience") echo 'selected'; }?>>XI_Maths_ComputerScience</option>
                                              <option value="XI_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Biology_ComputerScience") echo 'selected'; }?>>XI_Biology_ComputerScience</option>
                                              <option value="XII_Maths_Biology" <?php  if(isset($standard)) { if($standard == "XII_Maths_Biology") echo 'selected'; }?>>XII_Maths_Biology</option>
                                              <option value="XII_Maths_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Maths_ComputerScience") echo 'selected'; }?>>XII_Maths_ComputerScience</option>
                                              <option value="XII_Biology_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Biology_ComputerScience") echo 'selected'; }?>>XII_Biology_ComputerScience</option>
                                              <option value="XI_All" <?php  if(isset($standard)) { if($standard == "XI_All") echo 'selected'; }?>>XI_All</option>
                                              <option value="XII_All" <?php  if(isset($standard)) { if($standard == "XII_All") echo 'selected'; }?>>XII_All</option>
                                              <option value="XI_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XI_Commerce_ComputerScience") echo 'selected'; }?>>XI_Commerce_ComputerScience</option>
                                              <option value="XII_Commerce_ComputerScience" <?php  if(isset($standard)) { if($standard == "XII_Commerce_ComputerScience") echo 'selected'; }?>>XII_Commerce_ComputerScience</option>
                                         </select>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12"></div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group"> -->
                                            <!-- <input type="button" class="btn btn-primary" id="table_view" name="table_view"  value="View">  -->
                                            <!-- <input type="button" name="table_view" id="table_view" class="btn btn-primary" value="View" tabindex="14">
                                        </div>
                                    </div> -->
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            <div class="table-container" style="display:none" id="subject_details3">
                <div class="card">
                        <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                            <div class="card-title">Group/Course Fees</div>
                        </div>
                </div><br>
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="TermIITable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
					<div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
						<div class="card-title">Extra Curricular Activities</div>
					</div>
            </div><br>
            <div class="col-md-12 "> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="extra_particulars" id="extra_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="extra_amount" id="extra_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                           <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="TermIIITable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card">
                        <div class="card-header" style="background-image: linear-gradient(white, #e6d9cc);">
                            <div class="card-title">Book Fees</div>
                        </div>
                </div><br>
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Particulars</label>
                            <input  name="grp_particulars" id="grp_particulars" placeholder="Particulars" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input  name="grp_amount" id="grp_amount" placeholder="Amount" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                        <button style="margin-top:20px;" type="submit" onclick="submittrust_creation();" name="submittrust_creation" id="submittrust_creation" class="btn btn-primary" value="Submit" tabindex="14">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="TermIITable" class="table custom-table">
                    <thead>
                        <tr>
                            <th width="50">Particulars</th>
                            <th>Fee Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="row">
                  <div class="col-md-10"></div>
                      <div class="col-md-2">
                        <div class="text-right">
                          <button type="submit"  tabindex="5"  id="submitbillingconfigurationbtn4" name="submitbillingconfigurationbtn4" value="Submit" class="btn btn-primary">Submit</button>
                          <button type="reset"  tabindex="6"  id="cancelbtn" name="cancelbtn" class="btn btn-outline-secondary">Cancel</button><br /><br />
                        </div>
                    </div>	
                </div>
          </div>  
          </div>
        </form>
      </div>
</div>
    </div>
  </div>
</div>


</div>
</div>
<!-- Main Container End -->
</div>
