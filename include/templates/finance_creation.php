<!-- Page header start -->
<div class="page-header">
<ol class="breadcrumb">
<li class="breadcrumb-item">GSM - Finance Creation</li>
</ol>
</div>
<!-- Page header end -->

<!-- Main container start -->

<div class="main-container">
<!-- Create Sub Group -->
    <div id="subgroupinsertok" class="successalert">Subgroup Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="subgroupinsertnotok" class="unsuccessalert">Sub-group Already Exists, Please Enter a Different Name!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Edit Sub Group -->
    <div id="subgroupupdateok" class="successalert">Subgroup Has been Updated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="subgroupupdatenotok" class="unsuccessalert">Sub-group Already Exists, Please Enter a Different Name!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!--  Delete Sub Group -->
    <div id="subgroupdeleteok" class="successalert">Subgroup Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="subgroupdeletenotok" class="unsuccessalert">You Don't Have Rights To Delete This Subgroup!
    <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Create Cost- centre -->
    <div id="costcentreinsertok" class="successalert">Cost Centre Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="costcentreinsertnotok" class="unsuccessalert">Cost Centre Already Exists, Please Enter a Different Name!
    <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Edit Cost centre -->
    <div id="costcentreupdateok" class="successalert">Cost Centre Has been Updated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="costcentreupdatenotok" class="unsuccessalert">Cost Centre Already Exists, Please Enter a Different Name!
    <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Edit Delete Group -->
    <div id="costcentredeleteok" class="successalert">Cost Centre Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="costcentredeletenotok" class="unsuccessalert">You Don't Have Rights To Delete This Cost Centre!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Create Ledger -->
    <div id="ledgerinsertok" class="successalert">Ledger Added Succesfully!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="ledgerinsertnotok" class="unsuccessalert">Ledger Already Exists, Please Enter a Different Name!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Edit Ledger -->
    <div id="ledgerupdateok" class="successalert">Ledger Has been Updated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

    <div id="ledgerupdatenotok" class="unsuccessalert">Ledger Already Exists, Please Enter a Different Name!
    <span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- Delete Ledger  -->
    <div id="ledgerdeleteok" class="successalert">Ledger Has been Inactivated!<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>
<!-- Sundary Creditors -->
<div id="Vendorsubtok" class="unsuccessalert ">Genernal Details For Not Filed In The Vendor Details<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>
<!-- Sundary Creditors -->
    <div id="customersubtok" class="unsuccessalert ">Genernal Details For Not Filed In The Customer Details<span class="custclosebtn" onclick="this.parentElement.style.display='none';"><span class="icon-squared-cross"></span></span>
    </div>

<!-- <div>
<div id="LedgerBulkUploadModal" class="modal">
  <div class="modal-content">
    <span class="bulkclose" style="width:4%;">&times;</span>
  <iframe src="financefiles/ledgerbulkupload.php" height="250px"></iframe>
  </div>
</div>
</div> -->


<br />
<!-- Row start -->
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">



<div class="tab">
  <button class="tablinks" onclick="openFinance(event, 'groupcreation');document.getElementById('createsubgrp').click();" id="defaultopen">Group Creation</button>
  <button class="tablinks" onclick="openFinance(event, 'costcentre');document.getElementById('createcostcentre').click();">Cost Centre</button>
  <button class="tablinks" onclick="openFinance(event, 'ledgercreation');updatesubgroupdropdown();document.getElementById('createledger').click();">Ledger Creation</button>
</div>


<!-- Group Creation -->
<div id="groupcreation" class="tabcontent">
<br /><br />

<center><table>
  <td><input type="radio" id="createsubgrp"  name="subgrp"  onclick="openFinanceinner(event, 'createsubgrpfield')"></td>
  <td><label for="createsubgrp">Create a Sub-Group</label></td>

  <td><input type="radio" id="editsubgrp" name="subgrp"  onclick="openFinanceinner(event, 'editsubgrpfield');"></td>
  <td><label for="editsubgrp">Edit a Sub-Group</label></td>

  <td><input type="radio" id="deletesubgrp" name="subgrp"  onclick="openFinanceinner(event, 'deletesubgrpfield')"></td>
  <td> <label for="deletesubgrp">Delete a Sub-Group</label></td>
</table></center>

<br /><br />

<!-- Create a Sub-Group -->
<div id="createsubgrpfield" class="tabcontentin">
<form name="subgrpaddform" id="subgrpaddform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <select id="groupname" name="groupname" class="form-control" tabindex="1" >
      <option value="">-- Select Group Name --</option>
      <option value="1">Capital Account</option>
      <option value="2">Current Liabilities</option>
      <option value="42">Fixed Assets</option>
      <option value="3">Current Assets</option>
      <option value="4">Purchase Accounts</option>
      <option value="5">Direct Income</option>
      <option value="6">Direct Expenses</option>
      <option value="7">Indirect Income</option>
      <option value="8">Indirect Expenses</option>
      <option value="9">Profit &amp; Loss A/c</option>
      <option value="10">Diff. in Opening Balances</option>
    </select>
    <span class="text-danger" id="groupnamecheck">Select Group Name</span>
  </div>
  </div>
  <div class="col-md-4">
  </div>
</div>

<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
    <label class="label" style="float: right">Sub-Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <select id="esubgroupname1" name="esubgroupname1" class="form-control" tabindex="2">
      <option value="">Select Subgroup</option>
    </select>
    <span class="text-danger" id="sub_subgroupnamecheck">Select Subgroup</span>
  </div>
  </div>
  <div class="col-md-4">
  </div>
</div>


<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
    <label class="label" style="float: right">Enter Sub-Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <input type="text" id="subgroupname" tabindex="3" name="subgroupname" class="form-control" placeholder="Enter Sub-Group Name">
    <span class="text-danger" id="subgroupnamecheck">Enter Sub-Group Name</span>
  </div>
  </div>
  <div class="col-md-4">
  </div>
</div>

<br />

<div class="row">
<div class="col-md-5">
 </div>
  <div class="col-md-2">
    <button type="button"  tabindex="4" id="createsubgroupsubmit" name="createsubgroupsubmit" value="Submit" class="btn btn-primary">Submit</button>
    <button type="reset"  tabindex="5" class="btn btn-outline-secondary">Cancel</button>
  </div>

  <div class="col-md-5">
  </div>
</div>
</form>
</div>



<!-- Edit a Sub-Group -->
<div id="editsubgrpfield" class="tabcontentin">

<form name="editsubgrpform" id="editsubgrpform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <input type="hidden" id="egroupid" name="egroupid" value="">
    <!-- <input type="hidden" id="esgroupid" name="esgroupid" value=""> -->

    <select id="egroupname" name="egroupname" class="form-control">
      <option value="">-- Select Group Name --</option>
      <option value="1">Capital Account</option>
      <option value="2">Current Liabilities</option>
      <option value="42">Fixed Assets</option>
      <option value="3">Current Assets</option>
      <option value="4">Purchase Accounts</option>
      <option value="5">Direct Income</option>
      <option value="6">Direct Expenses</option>
      <option value="7">Indirect Income</option>
      <option value="8">Indirect Expenses</option>
      <option value="9">Profit &amp; Loss A/c</option>
      <option value="10">Diff. in Opening Balances</option>
    </select>
    <span class="text-danger" id="egroupnamecheck">Select Group Name</span>
  </div>
  </div>

  <div class="col-md-4">
  </div>
</div>

<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
    <label class="label" style="float: right">Sub-Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <select id="esubgroupname" name="esubgroupname" class="form-control">
      <option value="">Select Subgroup</option>
    </select>
    <span class="text-danger" id="esubgroupnamecheck">Select Subgroup</span>
  </div>
  </div>
  <div class="col-md-3 edit_subSub" style="display: none;">
      <div class="form-group" >
          <select id="esub_subgroupname" name="esub_subgroupname" class="form-control">
            <option value="">Select Sub-Subgroup</option>
          </select>
          <span class="text-danger" id="esub_subgroupnamecheck">Select Sub Subgroup</span>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
    <label class="label" style="float: right">Enter New Sub-Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <input type="text" id="newsubgroupname" name="newsubgroupname" class="form-control" placeholder="Enter New Subgroup Name">
    <span class="text-danger" id="newsubgroupnamecheck">Enter New Subgroup Name</span>
  </div>
  </div>
  <div class="col-md-3 edit_subSub" style="display: none;">
     <div class="form-group">
        <input type="text" id="newsub_subgroupname" name="newsub_subgroupname" class="form-control" placeholder="Enter New Sub-Subgroup Name">
        <span class="text-danger" id="newsub_subgroupnamecheck">Enter New Sub-Subgroup Name</span>
      </div>
  </div>
</div>
<br />

<div class="row">
  <div class="col-md-5">
  </div>

  <div class="col-md-2">
    <button type="button" id="editsubgroupsubmit" name="editsubgroupsubmit" value="Submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
  </div>

  <div class="col-md-5">
  </div>
</div>
</form>
</div>

<!-- Delete a Sub-Group -->
<div id="deletesubgrpfield" class="tabcontentin">
<form name="subgrpdeleteform" id="subgrpdeleteform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <input type="hidden" id="dgroupid" name="dgroupid" value="">
    <select id="dgroupname" name="dgroupname" class="form-control">
      <option value="">-- Select Group Name --</option>
      <option value="1">Capital Account</option>
      <option value="2">Current Liabilities</option>
      <option value="42">Fixed Assets</option>
      <option value="3">Current Assets</option>
      <option value="4">Purchase Accounts</option>
      <option value="5">Direct Income</option>
      <option value="6">Direct Expenses</option>
      <option value="7">Indirect Income</option>
      <option value="8">Indirect Expenses</option>
      <option value="9">Profit &amp; Loss A/c</option>
      <option value="10">Diff. in Opening Balances</option>
    </select>
    <span class="text-danger" id="dgroupnamecheck">Select Group Name</span>
  </div>
  </div>
  <div class="col-md-4">
  </div>
</div>

<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
    <label class="label" style="float: right">Select Sub-Group Name :</label>
  </div>
  <div class="col-md-3">
    <div class="form-group">
    <select id="dsubgroupname" name="dsubgroupname" class="form-control">
      <option value="">Select Subgroup</option>
    </select>
    <span class="text-danger" id="dsubgroupnamecheck">Select Subgroup</span>
  </div>
  </div>
  <div class="col-md-4">
  </div>
</div>

<div class="row " >
  <div class="col-md-2">
  </div>
  <div class="col-md-3 del_subSub" style="display: none;">
    <label class="label" style="float: right">Select Sub Sub-Group Name :</label>
  </div>
    <div class="col-md-3 del_subSub" style="display: none;">
      <div class="form-group">
        <select id="dsub_subgroupname" name="dsub_subgroupname" class="form-control">
          <option value="">Select Sub Sub-Subgroup</option>
        </select>
        <span class="text-danger" id="dsub_subgroupnamecheck">Select Sub Sub Subgroup</span>
      </div>
    </div>
   <div class="col-md-4">
  </div>
</div>

<div class="row">
  <div class="col-md-5">
  </div>

  <div class="col-md-2">
    <button type="button" id="deletesubgroupbtn" name="deletesubgroupbtn" value="Submit" class="btn btn-primary">Delete</button>
    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
  </div>

  <div class="col-md-5">
  </div>
</div>
</form>
</div>
</div>



<!-- Cost centre -->
<div id="costcentre" class="tabcontent">
<br /><br />

<center><table>
  <td><input type="radio" id="createcostcentre"  name="costcentretab"  onclick="openFinanceinner(event, 'createcostcentrefield')"></td>
  <td><label for="createcostcentre">Create a CostCentre</label></td>

  <td><input type="radio" id="editcostcentre" name="costcentretab"  onclick="openFinanceinner(event, 'editcostcentrefield');updatcostcenterdropdown();"></td>
  <td><label for="editcostcentre">Edit a CostCentre</label></td>

  <td><input type="radio" id="deletecostcentre" name="costcentretab"  onclick="openFinanceinner(event, 'deletecostcentrefield');updatcostcenterdropdown();"></td>
  <td> <label for="deletecostcentre">Delete a CostCentre</label></td>
</table></center>

<br /><br />

<!-- Create a Costcentre -->

<div id="createcostcentrefield" class="tabcontentin">
<form name="costcentrecreateform" id="costcentrecreateform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Cost Centre :</label>
  </div>
   <div class="col-md-4">
    <div class="form-group">
    <input type="text" id="costcentrename" name="costcentrename" class="form-control" placeholder="Enter Cost Centre">
    <span class="text-danger" id="costcentrenamecheck">Enter Cost Centre</span>
  </div>
  </div>
  <div class="col-md-3">
  </div>
</div>

<div class="row">
  <div class="col-md-5">
  </div>

  <div class="col-md-2">
    <button type="button" id="createcostcentrebtn" name="createcostcentrebtn" value="Submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
  </div>

  <div class="col-md-5">
  </div>
</div>
</form>
</div>

<!-- Edit a Costcentre -->

<div id="editcostcentrefield" class="tabcontentin">
<form name="costcentreeditform" id="costcentreeditform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Cost centre Name : </label>
  </div>
  <div class="col-md-4">
    <div class="form-group">

    <select id="ecostcentrename" name="ecostcentrename" class="form-control">
    <option value="">-- Select Cost centre --</option>   
    </select>
    <input type="hidden" id="costcentreid" name="costcentreid">
    <span class="text-danger" id="ecostcentrenamecheck">Select Cost centre</span>
  </div>
</div>
<div class="col-md-3">
</div>
</div>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Cost Centre New Name </label>
  </div>
  <div class="col-md-4">
    <input type="text" id="costcentrenewname" name="costcentrenewname" class="form-control" placeholder="Enter Cost Centre New Name">
    <span class="text-danger" id="costcentrenewnamecheck">Enter Cost Centre New Name</span>
  </div>
  <div class="col-md-3">
  </div>
</div>
<br />
<br />

<div class="row">
  <div class="col-md-5">
  </div>
    <div class="col-md-2">
    <button type="button" id="editcostcentrebtn" name="editcostcentrebtn" value="Submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
    <div class="col-md-5">
  </div>
  </div>
</div>

</form>
</div>

<!-- Delete a Costcentre -->

<div id="deletecostcentrefield" class="tabcontentin">

<form name="costcentredeleteform" id="costcentredeleteform" method="post">
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label class="label" style="float: right">Cost Centre Name : </label>
  </div>
  <div class="col-md-4">
    <div class="form-group">
    <input type="hidden" id="dcostcentreid" name="dcostcentreid">
    <select id="dcostcentre" name="dcostcentre" class="form-control">
    <option value="">-- Select Cost centre --</option>
    </select>
    <span class="text-danger" id="dcostcentrecheck">Select Cost centre</span>
  </div>
</div>
<div class="col-md-3">
</div>
</div>

<div class="row">
  <div class="col-md-5">
  </div>
    <div class="col-md-2">
    <button type="button" id="deletecostcentrebtn" name="deletecostcentrebtn" value="Submit" class="btn btn-primary">Delete</button>
    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
    <div class="col-md-5">
  </div>
  </div>
</div>
</form>
</div>

</div>




<!-- Ledger Creation -->
<div id="ledgercreation" class="tabcontent">
<br /><br />

<center><table>
  <td><input type="radio" id="createledger" name="subgrp"  onclick="openFinanceinner(event, 'createledgerfield')"></td>
  <td><label for="createledger">Create a Ledger</label></td>

  <td><input type="radio" id="editledger" name="subgrp"  onclick="openFinanceinner(event, 'editcreateledgerfield');updateledgerdropdown();"></td>
  <td><label for="editledger">Edit a Ledger</label></td>

  <td><input type="radio" id="deleteledger" name="subgrp"  onclick="openFinanceinner(event, 'deleteledgerfield');updateledgerdropdown();"></td>
  <td><label for="deleteledger">Delete a Ledger</label></td>
</table></center>

<br /><br />

<!-- Create Ledger -->
<div id="createledgerfield" class="tabcontentin">
<form method="post" name="ledgercreationform" id="ledgercreationform">
  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Ledger Name<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" id="ledgername" tabindex="1" name="ledgername" class="form-control" placeholder="Enter Ledger Name">
      <span class="text-danger" id="ledgernamecheck">Enter Ledger Name</span>
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Group</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" readonly id="ledgergroup" tabindex="2" name="ledgergroup" class="form-control">
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Under Sub-Group<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">

      <select type="text" class="form-control" tabindex="3" id="ledgersubgroup" onchange="Getledgersubgroup(this)" name="ledgersubgroup">
 <option value="">Select Subgroupname</option>                                  
 <?php if (sizeof($getsubgroupnameelist)>0) { 
 for($j=0;$j<count($getsubgroupnameelist);$j++) { ?>
 <option <?php if(isset($Id)) { if($getsubgroupnameelist[$j]['Id'] == $Id ) echo 'selected'; }  ?> 
 value="<?php echo $getsubgroupnameelist[$j]['Id']; ?>">
 <?php echo $getsubgroupnameelist[$j]['AccountsName'];?></option>
 <?php }} ?>  
 </select>
 
 

      <span class="text-danger" id="ledgersubgroupcheck">Select Sub-Group</span>
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Opening Balance</label>
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <select id="openingbalancedr" tabindex="4" name="openingbalancedr" class="form-control">
        <option value="CR">CR</option>
        <option value="DR">DR</option>
      </select>
    
    </div>
    </div>
    <div class="col-md-2"> 
    <input type="number"  tabindex="5" id="openingbalance" value="0" name="openingbalance" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true"></div>
    <div class="col-md-2"> </div>
    <div class="col-md-2">
      <label for="inventory" style="float: right;">Inventory</label>
    </div>
    <div class="row">
    <div class="col-md-3">
      <div class="form-group">
      <input type="checkbox" tabindex="6" id="inventory" name="inventory">
    </div>
    </div>
  </div>



    <div class="col-md-2">
      <label for="ledgercostcentre" style="float: right;">Cost Centre</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input  type="checkbox" tabindex="7" id="ledgercostcentre" name="ledgercostcentre">
    </div>
    </div>
    <div class="col-md-2">
      
    </div>
    <div class="col-md-3">
   
    </div>
  </div>


  <div id="sundrycreditors">
    
  </div>

<br /><br />
  <div class="row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
    <button type="button" tabindex="8" id="createledgerbtn" name="createledgerbtn" value="Submit" class="btn btn-primary">Submit</button>
    <button type="reset" tabindex="9" class="btn btn-outline-secondary">Cancel</button>
  </div>
</div>

</form>
</div>


<!-- Edit Ledger -->
<div id="editcreateledgerfield" class="tabcontentin">
    <form method="post" name="ledgereditform" id="ledgereditform">

  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Select a Ledger<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <select name="selectledger"  tabindex="1" id="selectledger" class="form-control">
      <option value="">Select a Ledger</option> 
      </select>
      <span class="text-danger" id="selectledgercheck">Select Ledger</span>
    </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-3">
    </div>
  </div>
<br />
  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Ledger Name<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" tabindex="2" id="eledgername" name="eledgername" class="form-control" placeholder="Enter Ledger Name">
      <span class="text-danger" id="eledgernamecheck">Enter Ledger Name</span>
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Group</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" tabindex="3" readonly id="eledgergroup" name="eledgergroup" class="form-control">
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Under Sub-Group<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="hidden" name="ledgerid" id="ledgerid">
      
      <div id="eeledgersubgroupname44"></div>

      <span class="text-danger" id="eledgersubgroupcheck">Select Sub-Group</span>
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Opening Balance</label>
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <select id="openingbalancedr1" tabindex="5" name="openingbalancedr1" class="form-control">
        <option value="CR">CR</option>
        <option value="DR">DR</option>
      </select>
    </div>
    </div>
    <div class="col-md-2"> 
     <input type="number"  tabindex="6" id="eopeningbalance" value="0" name="eopeningbalance" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true"> 
    </div>
    <div class="col-md-2"> </div>
    <div class="col-md-2">
      <label for="einventory" style="float: right;">Inventory</label>
    </div>
    <div class="row">
    
    <div class="col-md-3">
      <div class="form-group">
      <input tabindex="7"  type="checkbox"  id="einventory" name="einventory">
    </div>
    </div>
  
    </div>

  
    <div class="col-md-2">
      <label for="eledgercostcentre" style="float: right;">Cost Centre</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input tabindex="8"  type="checkbox" id="eledgercostcentre" name="eledgercostcentre">
    </div>
    
    <div class="col-md-2">
           
    </div>
    <div class="col-md-3">
    
    </div>
  </div>
  </div>
  <div id="esundrycreditors">
    
  </div>
  
<br /><br />
  <div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    <button tabindex="9"  type="button" id="editledgerbtn" name="editledgerbtn" value="Submit" class="btn btn-primary">Update</button>
    <button tabindex="10"  type="reset" class="btn btn-outline-secondary">Cancel</button>
  </div>
  <div class="col-md-4">
  </div>
</div>
</form>
</div>

<!-- Delete Ledger -->
<div id="deleteledgerfield" class="tabcontentin">
<form method="post" name="ledgerdeleteform" id="ledgerdeleteform">

  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Select a Ledger<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="hidden" name="dledgerid" id="dledgerid">
      <select name="dselectledger" tabindex="1"  id="dselectledger" class="form-control">
      <option value="">Select a Ledger</option>
      </select>
      <span id="dselectledgercheck" class="text-danger">Select Ledger</span>
    </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-3">
    </div>
  </div>
<br />
  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Ledger Name</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" readonly tabindex="2" id="dledgername" name="dledgername" class="form-control">
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Group</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" readonly tabindex="3" id="dledgergroup" name="dledgergroup" class="form-control">
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <label class="label" style="float: right;">Under Sub-Group</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input type="text" readonly tabindex="4" id="dledgersubgroup" name="dledgersubgroup" class="form-control">
    </div>
    </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Opening Balance</label>
    </div>
    <div class="col-md-1">
      <div class="form-group">
      <select id="dopeningbalancedr1" tabindex="5" name="dopeningbalancedr1" class="form-control">
        <option value="CR">CR</option>
        <option value="DR">DR</option>
      </select>
    
    </div>
    </div>
    <div class="col-md-2"> 
    <input type="text" readonly tabindex="6" id="dopeningbalance" value="0" name="dopeningbalance" class="form-control"> </div>
    <div class="col-md-2"> </div>
    <div class="col-md-2">
      <label class="label" style="float: right;">Inventory</label>
    </div>
    <div class="row">
    
    <div class="col-md-3">
      <div class="form-group">
      <input tabindex="7"  type="checkbox"  id="dinventory" name="dinventory">
    </div>
    </div>
  
    </div>

  
    <div class="col-md-2">
      <label class="label" style="float: right;">Cost Centre</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <input tabindex="8"  type="checkbox" id="dledgercostcentre" name="dledgercostcentre">
    </div>
    
    <div class="col-md-2">
           
    </div>
    <div class="col-md-3">
    
    </div>
    </div>
  </div>

  <div id="dsundrycreditors">
    
  </div>

<br /><br />
  <div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
     <button type="button"  tabindex="9" id="deleteledgerbtn" name="deleteledgerbtn" value="Submit" class="btn btn-primary">Delete</button>
    <button type="reset"  tabindex="10" class="btn btn-outline-secondary">Cancel</button>
  </div>
  <div class="col-md-4">
  </div>
</div>
</form>
</div>


  <div class="row">
  <div class="col-md-4">
      <button type="button" tabindex="11" id="downloadledger" name="downloadledger"  class="btn btn-primary"><span class="icon-download"></span>Download</button>
      <button type="button" tabindex="12" id="uploadledger" data-toggle="modal" data-target="#ledgerBulkUploadModal" name="uploadledger1" class="btn btn-primary"><span class="icon-upload"></span>Upload</button>
  </div>
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="ledgerBulkUploadModal" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="background-color: white">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="vCenterModalTitle">Ledger Bulk Upload</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data" name="customerbulk" id="customerbulk">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12"></div>
                                                <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12">
                                                <div class="form-group">
                                                <div id="linsertsuccess" style="color: green; font-weight: bold;">Excel Data Added Successfully</div>
                                                <div id="lnotinsertsuccess" style="color: red; font-weight: bold;">Problem Importing Excel Data or Duplicate Entry found</div>
                                                <label class="label">Select Excel</label>
                                                <input type="file" name="file" id="file" class="form-control">
                                                </div>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="submitledgerbulkbtn" name="submitledgerbulkbtn">Upload</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

</div>
</div>
</div>






<script>

function Geteledgersubgroup() {

  var ledgersubgroup33=$("#eledgergroup").val(); 
		
    if (ledgersubgroup33 == 29)
    {
$('#openingbalance').attr('readonly', true);    	  
    }
    if (ledgersubgroup33 == 27) 
    {      
$('#openingbalance').attr('readonly', false); 	
    }  
if (ledgersubgroup33 == 26)
    {
$('#openingbalance').attr('readonly', true);    	  
    }
    if (ledgersubgroup33 == 17) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 
if (ledgersubgroup33 == 14)
    {
$('#openingbalance').attr('readonly', false);    	  
    }
    if (ledgersubgroup33 == 21) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 
if (ledgersubgroup33 == 20)
    {
$('#openingbalance').attr('readonly', true);    	  
    }
    if (ledgersubgroup33 == 16) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 
if (ledgersubgroup33 == 28)
    {
$('#openingbalance').attr('readonly', true);    	  
    }
    if (ledgersubgroup33 == 18) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 
if (ledgersubgroup33 == 13)
    {
$('#openingbalance').attr('readonly', false);    	  
    }
    if (ledgersubgroup33 == 19) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 

if (ledgersubgroup33 == 32) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 

if (ledgersubgroup33 == 33) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 

if (ledgersubgroup33 == 15) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 

if (ledgersubgroup33 == 22) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 

if (ledgersubgroup33 == 25) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 
if (ledgersubgroup33 == 11) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 

if (ledgersubgroup33 == 23) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 

if (ledgersubgroup33 == 24) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 

if (ledgersubgroup33 == 30) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 

if (ledgersubgroup33 == 12) 
    {      
$('#openingbalance').attr('readonly', false); 	
    } 
if (ledgersubgroup33 == 31) 
    {      
$('#openingbalance').attr('readonly', true); 	
    } 
  }
	</script>