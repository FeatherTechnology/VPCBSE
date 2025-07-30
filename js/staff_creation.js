// Document is ready
$(document).ready(function () {	

$('#firstnameCheck').hide();$('#lastnameCheck').hide();$('#dsgnCheck').hide();$('#genderCheck').hide();$('#qualificationCheck').hide();$('#adharnoCheck').hide();$('#contactCheck').hide();$('#dojCheck').hide();$('#emgcontactnoCheck').hide();$('#emgcontactpersonCheck').hide();
// $('#panCheck').hide();
$('#SubmitStaffCreation').click(function(){
    staffSubmit();
})

$('[data-type="adhaar-number"]').keyup(function() {
    var value = $(this).val();
    value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
    $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
    var value = $(this).val();
    var maxLength = $(this).attr("maxLength");
    if (value.length != maxLength) {
        $(this).addClass("highlight-error");
    } else {
        $(this).removeClass("highlight-error");
    }
});

$('#staff_pan').keyup(function () {     
    validatepan();
});

// Create new bidder
$("#SubmitStaffCreation").click(function(){ 
    validatepan();    
});

$('input[type="checkbox"]').change(function() {
    checkbox();
});

});// Document END.

$(function(){
    getstaffCode();//Autocall for request code

    // var idupd = $('#idupd').val();
    // if(idupd >'0'){
        checkbox(); //To show area field.
    // }
})

function staffSubmit(){
var first_name = $('#staff_first_name').val(); var lastName = $('#staff_last_name').val(); var dsgn = $('#staff_designation').val(); var gen = $('#male').val(); var gender = $('#female').val(); var qualification = $('#qualification').val(); var pan = $('#staff_pan').val(); var aadhar = $('#aadhar_number').val(); var contactNo = $('#contact_number').val(); var  doj = $('#staff_doj').val();  
// var contactPerson = $('#emg_contact_person').val();var emgcontactNo = $('#emg_contact_no').val();
if(first_name == ''){
    event.preventDefault();
    $('#firstnameCheck').show();
}else{
    $('#firstnameCheck').hide();
}

if(lastName == ''){
    event.preventDefault();
    $('#lastnameCheck').show();
}else{
    $('#lastnameCheck').hide();
}

if(dsgn == ''){
    event.preventDefault();
    $('#dsgnCheck').show();
}else{
    $('#dsgnCheck').hide();
}

if(qualification == ''){
    event.preventDefault();
    $('#qualificationCheck').show();
}else{
    $('#qualificationCheck').hide();
}

if(pan == ''){
    event.preventDefault();
    $('#panCheck').show();
}else{
    $('#panCheck').hide();
}

if(aadhar == ''){
    event.preventDefault();
    $('#adharnoCheck').show();
}else{
    $('#adharnoCheck').hide();
}

if(contactNo == ''){
    event.preventDefault();
    $('#contactCheck').show();
}else{
    $('#contactCheck').hide();
}

if(doj == ''){
    event.preventDefault();
    $('#dojCheck').show();
}else{
    $('#dojCheck').hide();
}

// if(contactPerson == ''){
//     event.preventDefault();
//     $('#emgcontactpersonCheck').show();
// }else{
//     $('#emgcontactpersonCheck').hide();
// }

if(emgcontactNo == ''){
    event.preventDefault();
    $('#emgcontactnoCheck').show();
}else{
    $('#emgcontactnoCheck').hide();
}

}

// $('#delete_staff').click(function(){
//     alert('delete STaff');
// })

//Get Request Code 
function getstaffCode(){
    let staffId = $('#id').val();
    $.ajax({
        url: 'staffFile/staff_autoGen_code.php',
        type: "post",
        dataType: "json",
        data: {"staffId": staffId},
        cache: false,
        success: function(response){
            var emp_code = response;
            $('#employee_no').val(emp_code);
        }
    })
}

function validatepan(){
    var staff_pan = $("#staff_pan").val();

    if (staff_pan.length == '0') {
        $('#panCheck').text('Enter PAN');
        $('#SubmitStaffCreation').prop('disabled', true);
        }
        else{
        var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
        if (regex.test(staff_pan)){
            
            $('#panCheck').text('');
            $('#SubmitStaffCreation').prop('disabled', false);
        } else {
            $('#panCheck').text('Enter PAN (ABCDE1234Z)');
            $('#SubmitStaffCreation').prop('disabled', true);
        }
        }      
}

function checkbox() {
    var checkoptionval= $('#checkoptionval').val();
    var checkedValue = $('input[type="checkbox"]:checked').val();   
    if(checkedValue == 'YES'){
        $('#areaname').show();
        var school_id = $('#school_id').val();
        var year_id = $('#year_id').val();
        $.ajax({
            url: "ajaxgetAreacreation.php",
            data: {
                "school_id":school_id,
                "year_id":year_id
            },
            cache: false,
            type: "post",
            dataType: "json",
            success: function (data) { 
                $("#areaname").css("display", "none");
                $('#area_name').text('');
                $('#area_name').val('');
                var option = $('<option></option>').val('').text('Select Area');
                $('#area_name').append(option);
                for(var a=0; a<=data.length-1; a++){
                
                $("#areaname").css("display", "");
                var selected = '';
                if(checkoptionval == data[a]['area_id']){
                    selected = 'selected';
                }
                
                var option = $('<option '+selected+' ></option>').val(data[a]['area_id']).text(data[a]['area_name']);
                $('#area_name').append(option);
                }
            }
        });

    }else{
        $('#areaname').hide();
    }   
}

function loadFile(event) {
    var image = document.getElementById("viewimage");
    image.src = URL.createObjectURL(event.target.files[0]);
};