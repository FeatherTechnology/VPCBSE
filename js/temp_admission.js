// Document is ready
$(document).ready(function () {	

// Age Validation
$('#temp_dob').on('change', function() {
  var dob = $('#temp_dob').val();
  var age = calculateAge(dob);
  if (age < 3) {
    $("#age-result").text('');
    $('#age-result').text('Age less for Admission.');
    $('#temp_dob').val('');
    $('#submittemp_admission_creation').prop("disabled", true);

  } else {
    $("#age-result").text('');
    $('#age-result').text('Age validated: ' + age);
    $('#submittemp_admission_creation').prop("disabled", false);
  }
});

// add event listener to select element
$('#temp_standard').change(function() {  
  var standard = $("#temp_standard :selected").text();
    $.ajax({
      type: 'POST',
      data: {"standard":standard},
      url: 'ajaxgetTempcode.php',
      dataType: 'json',
      success: function(response) {
        $('#temp_no').val(response);
      }
    });
});

$("#submittemp_admission_creation").click(function(event){  
   // Check if there are any required fields with missing values
  var invalidFields = $(this).find(':invalid');

  if (invalidFields.length > 0) {
      // Prevent form submission
      event.preventDefault();

      // Scroll up to the first invalid field
      $('html, body').animate({
          scrollTop: $(invalidFields[0]).offset().top
      }, 500);
  }
});

}); //Document END.

$(function(){
  getStandardList(); //Get Standard List.
});

function calculateAge(birthdate) {
  var today = new Date();
  var birthDate = new Date(birthdate);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
  age--;
  }
  return age;
}

function getStandardList(){ //Getting standard list from database.
  var upd_temp_std = $('#upd_temp_std').val();
  $.ajax({
    type: 'POST',
    data: {},
    url: 'ajaxFiles/getStandardList.php',
    dataType: 'json',
    success:function(response){
        $('#temp_standard').empty();
        $('#temp_standard').append("<option value=''>Select Standard</option>");
        for(var i=0; i <response.length; i++){ 
          var selected = '';
          if(upd_temp_std == response[i]['std_id']){
            selected = 'selected';
          } 
          $('#temp_standard').append("<option value='" +response[i]['std_id']+ "'"+selected+">" +response[i]['std']+ "</option>");
        }
    }
  })
}