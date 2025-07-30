// Document is ready
$(document).ready(function () {

  $('[data-type="adhaar-number"]').keyup(function () {
    var value = $(this).val();
    values = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(value => value.length > 0).join("-");
    $(this).val(values);
    var aadhaarNumber = $(this).val();
    if (aadhaarNumber.length === 0) {

    } else if (aadhaarNumber.length > 14) {
      $(this).val(aadhaarNumber.slice(0, 14));
    }
  });

  $('#aadhar_number').blur(function () {
    appaadhaar();
  });
  $('#father_aadhar_number').blur(function () {
    dadaadhaar();
  });
  $('#mother_aadhar_number').blur(function () {
    momaadhaar();
  });
  $('#gaurdian_aadhar_number').blur(function () {
    gaurdaadhar();
  });

  $('#extra_curricular').select2();
  $('#extra_curricular').on('select2:opening select2:closing', function (event) {
    var $searchfield = $(this).parent().find('.select2-search__field');
    $searchfield.prop('disabled', true);
  });

  $(".concessiontypedetails").select2({
    // allowClear: true,
    width: "-webkit-fill-available"
  });

  $("#refstaffid").select2({
    // allowClear: true,
    width: "-webkit-fill-available"
  });
  $("#refstudentid").select2({
    // allowClear: true,
    width: "-webkit-fill-available"
  });
  $("#refoldstudentid").select2({
    // allowClear: true,
    width: "-webkit-fill-available"
  });

  $(".transportarearefid").select2({
    // allowClear: true,
    width: "-webkit-fill-available"
  });

  $("body").on("click", "#temp_admission_id", function () {
    var temp_admission_id = $(this).attr('value');

    $("#temp_admission_id").val(temp_admission_id);
    $.ajax({
      url: 'studentFile/ajaxEditTempStudent.php',
      type: 'post',
      data: { "temp_admission_id": temp_admission_id },
      dataType: 'json',
      success: function (response) {

        $("#temp_no").val(response['temp_no']);
        $("#student_name").val(response['temp_student_name']);
        $("#date_of_birth").val(response['temp_dob']);
        $("#flat_no").val(response['temp_flat_no']);
        $("#street").val(response['temp_street']);
        $("#area_locatlity").val(response['temp_area']);
        $("#district").val(response['temp_district']);
        $("#father_name").val(response['temp_father_name']);
        $("#mother_name").val(response['temp_mother_name']);
        $("#father_mobile_no").val(response['temp_fathercontact_number']);
        $("#mother_mobile_no").val(response['temp_mothercontact_number']);
        $("#temp_admission_id").val(response['temp_admission_id']);

        // Code to standard append a dropdown
        $('#standard').empty(); // clear existing options           
        $('#standard').append("<option value='" + response['temp_standard'] + "'>" + response['temp_standard_name'] + "</option>"); // add new option

        // Code to medium append a dropdown
        $('#medium').val(response['temp_medium']);
        $('#studentstype').val(response['temp_student_type']);

        // Code to gender append a radio button
        var gender_options = response.temp_gender;
        if (gender_options === 'Male') {
          $('#male').val('Male').prop('checked', true);
        } else if (gender_options === 'Female') {
          $('#female').val('Female').prop('checked', true);
        }

        // Code to category append a radio button
        var category_options = response.temp_category;
        if (category_options === 'OBC') {
          $('#obc').val('OBC').prop('checked', true);
        } else if (category_options === 'BC') {
          $('#bc').val('BC').prop('checked', true);
        } else if (category_options === 'MBC') {
          $('#mbc').val('MBC').prop('checked', true);
        } else if (category_options === 'SC') {
          $('#sc').val('SC').prop('checked', true);
        } else if (category_options === 'ST') {
          $('#st').val('ST').prop('checked', true);
        } else if (category_options === 'DNC') {
          $('#dnc').val('DNC').prop('checked', true);
        } else if (category_options === 'BCM') {
          $('#bcm').val('BCM').prop('checked', true);
        }
        
        extracur();
        $('#temp_no_empty').click(); //To close the modal box.
      }
    });
  });

  // the selector will match all input controls of type :checkbox
  // and attach a click event handler 
  $("input:checkbox").on('click', function () {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
      // the name of the box is retrieved using the .attr() method
      // as it is assumed and expected to be immutable
      var group = "input:checkbox[name='" + $box.attr("name") + "']";
      // the checked state of the group/box on the other hand will change
      // and the current value is retrieved using .prop() method
      $(group).prop("checked", false);
      $box.prop("checked", true);
    } else {
      $box.prop("checked", false);
    }
  });

  // Get Previous School Details
  $("#standard").change(function () {
    var standard = $("#standard").val();
    hide_show_standard(standard)
  });

  //hostel details show
  $('#hostel').change(function () {
    $('#transport_details').hide();
    if (this.checked)
      $('#room_details').show();
    else
      $('#room_details').hide();
  });

  //transport details show
  $('#transport').change(function () {
    $('#room_details').hide();
    if (this.checked)
      $('#transport_details').show();
    else
      $('#transport_details').hide();
  });

  //Gaurdian details show
  $('#lives_gaurdian').change(function () {
    if (this.checked)
      $('.gaurdian_details').show();
    else
      $('.gaurdian_details').hide();
  });

  //Conecssion type\

  $("#concession_types_det").show();

  $("#scholar").click(function () {
    $("#concession_types_det").hide();
  });

  $("#rte").click(function () {
    $("#concession_types_det").hide();
  });

  $("#general").click(function () {
    $("#concession_types_det").show();
  });

  // Get Reference Details
  $("#referencecat").change(function () {
    var referencecat = $("#referencecat").val();
    $('#referred_by').val('');
    hide_show_referenceCat(referencecat)
    setReferredByValue();
  });

  //form validation

  // Validate Admission number
  $('#admission_numberCheck').hide();
  let admission_numberError = true;
  $('#admission_number').change(function () {
    validateadmission_number();
  });

  // Validate student Name
  $('#student_nameCheck').hide();
  let student_nameError = true;
  $('#student_name').change(function () {
    validatestudent_name();
  });

  // Validate gender_status
  $('#genderCheck').hide();
  let gender_error = true;
  $('input[name="gender"]').click(function () {
    validategenderStatus();
  });
  function validategenderStatus() {

    let male = $("#male").prop("checked");
    let female = $("#female").prop("checked");

    if (male == false && female == false) {
      $('#genderCheck').show();
      gender_error = false;
      return '1';
    } else if (male == false && female == true) {
      $('#genderCheck').hide();
      gender_error = true;
      return '0';
    } else if (male == true && female == false) {
      $('#genderCheck').hide();
      return '0';
      gender_error = true;
    } else if (male == true || female == true) {
      $('#genderCheck').hide();
      gender_error = true;
      return '0';
    }
  }

  // Validate mother_tongue
  $('#mother_tongueCheck').hide();
  let mother_tongueError = true;
  $('#mother_tongue').change(function () {
    validateMotherTongue();
  });

  // Validate Statndard
  $('#standardCheck').hide();
  let standardError = true;
  $('#standard').change(function () {
    validateStandard();
  });

  // Validate section
  $('#sectionCheck').hide();
  let sectionError = true;
  $('#section').change(function () {
    validatesection();
  });

  // Validate medium
  $('#mediumCheck').hide();
  let mediumError = true;
  $('#medium').change(function () {
    validatemedium();
  });

  // Validate Roll number
  $('#studentrollnoCheck').hide();
  let studentrollnoError = true;
  $('#studentrollno').change(function () {
    validatestudentrollno();
  });

  // Validate studentstype
  $('#studentstypeCheck').hide();
  let studentstypeError = true;
  $('#studentstype').change(function () {
    validatestudentstype();
  });

  // Validate reason
  $('#reasonCheck').hide();
  let reasonError = true;
  $('#reason').change(function () {
    validatereason();
  });

  $("#myButton").on('click', '.delete', function () {
    var currentRow = $(this).closest("tr");
    var ponum = currentRow.find("td:eq(0)").text();
    $("#ponum").val(ponum);
    $.ajax({
      url: "purchaseorderfiles/printpo.php",
      data: { "ponum": ponum },
      cache: false,
      type: "post",
      success: function (html) {
        $("#poprintfield").html(html);
      }
    });
  });

  // Age Validation

  $('#date_of_birth').on('change', function () {
    var dob = $('#date_of_birth').val();
    var age = calculateAge(dob);
    if (age < 2) {
      $("#age-result").text('');
      $('#age-result1').text('You must be at least 2 years old to use this service.');
      $('#date_of_birth').val('');

    } else {
      $("#age-result1").text('');
      $('#age-result').text('Age validated: ' + age);
    }
  });

  // Modal Box for Reason Name
  $("#reasonCheck").hide();
  $(document).on("click", "#submitreasonBtn", function () {
    alert(student_id)
    var student_id = $("#student_id").val();
    var reason = $("#reason").val();
    if (reason != "") {
      $.ajax({
        url: 'studentFile/ajaxInsertReason.php',
        type: 'POST',
        data: { "reason": reason, "student_id": student_id },
        cache: false,
        success: function (response) {
          var insresult = response.includes("Exists");
          var updresult = response.includes("Updated");
          if (insresult) {
            $('#reasonInsertNotOk').show();
            setTimeout(function () {
              $('#reasonInsertNotOk').fadeOut('fast');
            }, 2000);
          } else if (updresult) {
            $('#reasonUpdateOk').show();
            setTimeout(function () {
              $('#reasonUpdateOk').fadeOut('fast');
            }, 2000);
            $("#reasonTable").remove();
            resetreasonTable();
            $("#reason").val('');
            $("#student_id").val('');
          }
          else {
            $('#reasonInsertOk').show();
            setTimeout(function () {
              $('#reasonInsertOk').fadeOut('fast');
            }, 2000);
            $("#reasonTable").remove();
            resetreasonTable();
            $("#reason").val('');
            $("#student_id").val('');
          }
        }
      });
    }
    else {
      $("#reasonnameCheck").show();
    }
  });

  $("#reason").keyup(function () {
    var CTval = $("#reason").val();
    if (CTval.length == '') {
      $("#reasonnameCheck").show();
      return false;
    } else {
      $("#reasonnameCheck").hide();
    }
  });

  $("body").on("click", "#edit_reason", function () {
    var student_id = $(this).attr('value');
    $("#student_id").val(student_id);
    $.ajax({
      url: 'studentFile/ajaxEditReason.php',
      type: 'POST',
      data: { "student_id": student_id },
      cache: false,
      success: function (response) {
        $("#reason").val(response);
      }
    });
  });

  $("body").on("click", "#delete_reason", function () {
    var isok = confirm("Do you want delete reason?");
    if (isok == false) {
      return false;
    } else {
      var student_id = $(this).attr('value');
      var c_obj = $(this).parents("tr");
      $.ajax({
        url: 'studentFile/ajaxDeleteReason.php',
        type: 'POST',
        data: { "student_id": student_id },
        cache: false,
        success: function (response) {
          var delresult = response.includes("Rights");
          if (delresult) {
            $('#reasonDeleteNotOk').show();
            setTimeout(function () {
              $('#reasonDeleteNotOk').fadeOut('fast');
            }, 2000);
          }
          else {
            c_obj.remove();
            $('#reasonDeleteOk').show();
            setTimeout(function () {
              $('#reasonDeleteOk').fadeOut('fast');
            }, 2000);
          }
        }
      });
    }
  });

  // Submit Button 
  $('#SubmitStudentCreation').click(function () {
    var admissionNoValidation = validateadmission_number();
    var stdNameValidation = validatestudent_name();
    var genderValidation = validategenderStatus();
    var mothertogueValidation = validateMotherTongue();
    var stdValidation = validateStandard();
    var sectionValidation = validatesection();
    var mediumValidation = validatemedium();
    var rollnoValidation = validatestudentrollno();
    var stdtypeValidation = validatestudentstype();
    // calculateAge();
    // validatereason();
    
    // var mobnoValidation = mobno();
      // var gudnoValidation = gaurdmobno();
      // var smsnoValidation = smsmobno();
    // var momnoValidation = mommobile();
    // var dadnoValidation = dadmobile();
    var smssentvalidation = smsmobile();
    // var dadaadharValidation = dadaadhaar();
    // var momaadharValidation = momaadhaar();
      // var guardianaadharValidation = gaurdaadhar();
    // var appaadharValidation = appaadhaar();
    
    if(admissionNoValidation == '1' || stdNameValidation == '1' || genderValidation == '1' || mothertogueValidation == '1' || stdValidation == '1' || sectionValidation == '1' || mediumValidation == '1' || rollnoValidation == '1' || stdtypeValidation == '1' || smssentvalidation == '1' ){
      event.preventDefault();
    }

  });

  $('#gaurdian_email_id').blur(function () {
    var email = $(this).val();
    if (email == '') {
      $('#gaurdemail').text('');
      $('#SubmitStudentCreation').prop('disabled', false);
    } else {
      if (validateEmail(email)) {
        $('#gaurdemail').text('');
        $('#SubmitStudentCreation').prop('disabled', false);
      } else {
        $('#gaurdemail').text('Enter Valid Email ID');
        $('#SubmitStudentCreation').prop('disabled', true);
      }
    }
  });
  
  $('#father_email_id').blur(function () {
    var email = $(this).val();
    if (email == '') {
      $('#dademail').text('');
      $('#SubmitStudentCreation').prop('disabled', false);
    } else {
      if (validateEmail(email)) {
        $('#dademail').text('');
        $('#SubmitStudentCreation').prop('disabled', false);
      } else {
        $('#dademail').text('Enter Valid Email ID');
        $('#SubmitStudentCreation').prop('disabled', true);
      }
    }
  });

  $("#studentstype").change(function () {
    extracur();
  });

  $('#refstaffid, #refstudentid, #refoldstudentid').change(function(){
      $('#referred_by').val($(this).find('option:selected').text().trim());
  });

  $('#standard, #medium, #studentstype').change(function(){
    extracur();
  });
  
}); //Document END.

$(function(){ //ONLOAD Function

    $('#reasonTable').DataTable({
      'iDisplayLength': 5,
      "language": {
        "lengthMenu": "Display _MENU_ Records Per Page",
        "info": "Showing Page _PAGE_ of _PAGES_",
      }
    });

    getStandardList(); //Get Standard List.
    getResetTempAdmTable();// Get Temp Admission Table/
    
    setTimeout(() => {
      extracur();

      var stdidOnEdit = $('#stdidOnEdit').val();
      if(stdidOnEdit > 0){
        //readonly on edit page.
        $('#standard').prop('disabled', true);
      }

    }, 1000);
});

function validateadmission_number() {
  let admission_numberValue = $('#admission_number').val();
  if (admission_numberValue.length == '') {
    $('#admission_numberCheck').show();
    admission_numberError = false;
    return '1';
  }
  else {
    $('#admission_numberCheck').hide();
    admission_numberError = true;
    return '0';
  }
}

function validatestudent_name() {
  let student_nameValue = $('#student_name').val();
  if (student_nameValue.length == '') {
    $('#student_nameCheck').show();
    student_nameError = false;
    return '1';
  }
  else {
    $('#student_nameCheck').hide();
    student_nameError = true;
    return '0';
  }
}

function validateMotherTongue() {
  let mother_tongueValue = $('#mother_tongue').val();
  if (mother_tongueValue.length == '') {
    $('#mother_tongueCheck').show();
    mother_tongueError = false;
    return '1';
  }
  else {
    $('#mother_tongueCheck').hide();
    mother_tongueError = true;
    return '0';
  }
}

function validateStandard() {
  let standardValue = $('#standard').val();
  if (standardValue.length == '') {
    $('#standardCheck').show();
    standardError = false;
    return '1';
  }
  else {
    $('#standardCheck').hide();
    standardError = true;
    return '0';
  }
}

function validatesection() {
  let sectionValue = $('#section').val();
  if (sectionValue.length == '') {
    $('#sectionCheck').show();
    sectionError = false;
    return '1';
  }
  else {
    $('#sectionCheck').hide();
    sectionError = true;
    return '0';
  }
}

function validatemedium() {
  let mediumValue = $('#medium').val();
  if (mediumValue.length == '') {
    $('#mediumCheck').show();
    mediumError = false;
    return '1';
  }
  else {
    $('#mediumCheck').hide();
    mediumError = true;
    return '0';
  }
}

function validatestudentrollno() {
  let studentrollnoValue = $('#studentrollno').val();
  if (studentrollnoValue.length == '') {
    $('#studentrollnoCheck').show();
    studentrollnoError = false;
    return '1';
  }
  else {
    $('#studentrollnoCheck').hide();
    studentrollnoError = true;
    return '0';
  }
}

function validatestudentstype() {
  let studentstypeValue = $('#studentstype').val();
  if (studentstypeValue.length == '') {
    $('#studentstypeCheck').show();
    studentstypeError = false;
    return '1';
  }
  else {
    $('#studentstypeCheck').hide();
    studentstypeError = true;
    return '0';
  }
}

function validatereason() {
  let reasonValue = $('#reason').val();
  if (reasonValue.length == '') {
    $('#reasonCheck').show();
    reasonError = false;
    return '1';
  }
  else {
    $('#reasonCheck').hide();
    reasonError = true;
    return '0';
  }
}

function calculateAge(dateString) {
  var today = new Date();
  var birthDate = new Date(dateString);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}

function resetreasonTable() {
  $.ajax({
    url: 'studentFile/ajaxResetReasonTable.php',
    type: 'POST',
    data: {},
    cache: false,
    success: function (html) {
      $("#updatedreasonTable").empty();
      $("#updatedreasonTable").html(html);
    }
  });
}

function hide_show_standard(standard) {
  if (standard == 'PRE.K.G') {
    $("#previous_school").hide();
  } else {
    $("#previous_school").show();
  }
}

function hide_show_referenceCat(referencecat) {
  if (referencecat == 'New Student') {
    $("#reference_newstudent").show();
    $("#reference_oldstudent").hide();
    $("#reference_staff").hide();
    $("#reference_agent").hide();

  } else if (referencecat == 'Old Student') {
    $("#reference_newstudent").hide();
    $("#reference_oldstudent").show();
    $("#reference_staff").hide();
    $("#reference_agent").hide();

  } else if (referencecat == 'Staff') {
    $("#reference_newstudent").hide();
    $("#reference_oldstudent").hide();
    $("#reference_staff").show();
    $("#reference_agent").hide();

  } else if (referencecat == 'Agent') {
    $("#reference_newstudent").hide();
    $("#reference_oldstudent").hide();
    $("#reference_staff").hide();
    $("#reference_agent").show();

  } else if (referencecat == 'Other') {
    $("#reference_newstudent").hide();
    $("#reference_oldstudent").hide();
    $("#reference_staff").hide();
    $("#reference_agent").show();

  } else{
    $("#reference_newstudent").hide();
    $("#reference_oldstudent").hide();
    $("#reference_staff").hide();
    $("#reference_agent").hide();
    
  }
}

// Address value get permanant address as same
function filladd() {
  if (filltoo.checked == true) {
    var flat_no11 = document.getElementById("flat_no").value;
    var street11 = document.getElementById("street").value;
    var area_locatlity11 = document.getElementById("area_locatlity").value;
    var district11 = document.getElementById("district").value;
    var pincode11 = document.getElementById("pincode").value;

    var copyflat_no = flat_no11;
    var copystreet = street11;
    var copyarea_locality = area_locatlity11;
    var copydist = district11;
    var copypin = pincode11;

    document.getElementById("flat_no1").value = copyflat_no;
    document.getElementById("street1").value = copystreet;
    document.getElementById("area_locatlity1").value = copyarea_locality;
    document.getElementById("district1").value = copydist;
    document.getElementById("pincode1").value = copypin;
  }
  else if (filltoo.checked == false) {
    document.getElementById("flat_no1").value = '';
    document.getElementById("street1").value = '';
    document.getElementById("area_locatlity1").value = '';
    document.getElementById("district1").value = '';
    document.getElementById("pincode1").value = '';
  }
}

function DropDownStock() {
  var temp_no = $("#temp_no").val();

  if (temp_no != '') {
    $('.image_div').show(); // show the image div
  } else {
    $('.image_div').hide(); // hide the image div
  }
}
$('#telephone_number').blur(function () {
  mobno();
});
$('#gaurdian_mobile').blur(function () {
  gaurdmobno();
  smsmobno();
});
$('#gaurdian_mobile').keyup(function () {
  smsmobno();
});
$('#mother_mobile_no').blur(function () {
  mommobile();
});
$('#father_mobile_no').blur(function () {
  dadmobile();
});
$('#sms_sent_no').blur(function () {
  smsmobile();
});

function mobno() {
  var telephoneno = $('#telephone_number').val();
  if (telephoneno.length == '' || telephoneno.length < '10'){
    $('#mobile').text('');
    $('#mobile').text('Enter 10 Digit Mobile Number');
    return '1';

  }else{
    $('#mobile').text('');
    return '0';
  }
}

function gaurdmobno() {
  var gaurdianno = $('#gaurdian_mobile').val();
  if (gaurdianno.length == '' || gaurdianno.length < '10') {
    $('#gaurdmobile').text('');
    $('#gaurdmobile').text('Enter 10 Digit Mobile Number');
    return '1';

  } else {
    $('#gaurdmobile').text('');
    return '0';
  }
}

function smsmobno() {
  var guardiansmsno = $('#gaurdian_mobile').val();
  if (guardiansmsno == '') {
    $('#sms_sent_no').val('');
    return '1';
  } else {
    $('#sms_sent_no').val($('#gaurdian_mobile').val());
    return '0';
  }
}

function mommobile() {
  var mommbleno = $('#mother_mobile_no').val();
  if (mommbleno.length == '' || mommbleno.length < '10') {
    $('#mommobile').text('');
    $('#mommobile').text('Enter 10 Digit Mobile Number');
    return '1';

  } else {
    $('#mommobile').text('');
    return '0';
  }
}

function dadmobile() {
  var dadmobleno = $('#father_mobile_no').val();
  if (dadmobleno.length == '' || dadmobleno.length < '10') {
    $('#dadmobile').text('');
    $('#dadmobile').text('Enter 10 Digit Mobile Number');
    return '1';

  } else {
    $('#dadmobile').text('');
    return '0';
  }
}

function smsmobile() {
  var smssentno = $('#sms_sent_no').val();
  if (smssentno.length == '' || smssentno.length < '10') {
    $('#smsmobile').show();
    return '1';

  }else{
    $('#smsmobile').hide();
    return '0';
  }
}


function validateEmail(email) {
  // Regular expression pattern for email validation
  var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function extracur() {
  var studentstype = $('#studentstype').val();
  var mediums = $('#medium').val();
  var standards = $('#standard').val();
  var extra_cur = $('#extra_cur').val();

  $.ajax({
    url: 'studentFile/ajaxextraactivity.php',
    type: 'post',
    data: { "mediums": mediums, "standards": standards, "studentstype": studentstype },
    dataType: 'json',
    success: function (response) {
      $('#extra_curricular').empty();

      for (var i = 0; i < response.length; i++) {
        var selected = (extra_cur && extra_cur.includes(response[i].extra_fee_id)) ? 'selected' : '';
        $('#extra_curricular').append("<option value='" + response[i].extra_fee_id + "' " + selected + ">" + response[i].extra_particulars + "</option>");
      }
    }
  })
}

function getStandardList() { //Getting standard list from database.
  var upd_std = $('#standardEdit').val();
  $.ajax({
    type: 'POST',
    data: {},
    url: 'ajaxFiles/getStandardList.php',
    dataType: 'json',
    success: function (response) {
      $('#standard').empty();
      $('#standard').append("<option value=''>Select Standard</option>");
      for (var i = 0; i < response.length; i++) {
        var selected = '';
        if (upd_std == response[i]['std_id']) {
          selected = 'selected';
        }
        $('#standard').append("<option value='" + response[i]['std_id'] + "'" + selected + ">" + response[i]['std'] + "</option>");
      }
    }
  })
}

// First loadFile function
function loadFile1(event) {
  var image1 = document.getElementById("viewimage1");
  image1.src = URL.createObjectURL(event.target.files[0]);
};

// Second loadFile function
function loadFile2(event) {
  var image2 = document.getElementById("viewimage2");
  image2.src = URL.createObjectURL(event.target.files[0]);
};

// Third loadFile function
function loadFile3(event) {
  var image3 = document.getElementById("viewimage3");
  image3.src = URL.createObjectURL(event.target.files[0]);
};

function appaadhaar() {
  var appaadhar_number = $('#aadhar_number').val();
  if (appaadhar_number.length == '' || appaadhar_number.length < 14) {
    $("#aadhar_chk").text('Enter valid Aadhaar number');
  } else {
    $("#aadhar_chk").text('');
  }
}


function dadaadhaar() {
  var dadaadhar_number = $('#father_aadhar_number').val();
  if (dadaadhar_number.length == '' || dadaadhar_number.length < 14) {
    $("#dadaadhar_chk").text('');
    $("#dadaadhar_chk").text('Enter valid Aadhaar number');
  } else {
    $("#dadaadhar_chk").text('');
  }
}

function momaadhaar() {
  var momaadhar_number = $('#mother_aadhar_number').val();
  if (momaadhar_number.length == '' || momaadhar_number.length < 14) {
    $("#momaadhar_chk").text('');
    $("#momaadhar_chk").text('Enter valid Aadhaar number');
  } else {
      $("#momaadhar_chk").text('');
  }
}

function gaurdaadhar() {
  var guardianaadhar_number = $('#gaurdian_aadhar_number').val();
  if (guardianaadhar_number.length == '' || guardianaadhar_number.length < 14) {
    $("#gaurdaadhar_chk").text('');
    $("#gaurdaadhar_chk").text('Enter valid Aadhaar number');
  } else {
      $("#gaurdaadhar_chk").text('');
  }
}

function setReferredByValue(){
  let referredBY = $('#referencecat').val();
  let referenceName;
  if(referredBY =='New Student'){
      referenceName = $('#refstudentid option:selected').text().trim();

  }else if(referredBY =='Old Student'){
      referenceName = $('#refoldstudentid option:selected').text().trim();

  }else if(referredBY =='Staff'){
      referenceName = $('#refstaffid option:selected').text().trim();

  }

  $('#referred_by').val(referenceName);
}

function getResetTempAdmTable(){
  // Modal Box 
  $.ajax({
    url: 'studentFile/ajaxResetTemporaryStudentTable.php',
    type: 'POST',
    data: {},
    cache: false,
    success: function(html){
      $("#updateddepartmentTable").empty();
      $("#updateddepartmentTable").html(html);
    }
  });
}